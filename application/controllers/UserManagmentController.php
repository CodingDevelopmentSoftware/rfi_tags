    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class UserManagmentController extends MY_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->checkUserSessionExist();
        }

        public function index()
        {
            $this->data['title'] = 'Add User';
            $this->load->view('web/includes/header', $this->data);
            $this->load->view('web/usermanagement/add_user');
            $this->load->view('web/includes/footer');
        }

        public function saveUser()
        {
            if (!postAllowed()) {
                redirect('UserManagment');
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|exact_length[10]|numeric');
            if ($this->form_validation->run() == FALSE) {
                $this->index();
                return;
            }

            $phone_number = postDataFilterhtml($this->input->post('phone_number'));

            $whereData = [
                'phone_number' => $phone_number
            ];

            $response = $this->UserManagmentModel->getCount('user_management', $whereData);

            if ($response == 0) {
                $insertData = [
                    'first_name' => postDataFilterhtml($this->input->post('first_name')),
                    'last_name' => postDataFilterhtml($this->input->post('last_name')),
                    'phone_number' => $phone_number,
                    'user_type' => postDataFilterhtml($this->input->post('user_type')),
                    'password' => md5('123456'),
                    'status' => 1,
                    'created_by' => $this->getLoggedInUser()->user_id,
                    'created_dt' => getCurrentTime(),
                ];
                $response = $this->UserManagmentModel->insertData('user_management', $insertData);

                if ($response > 0) {
                    $color = 'success';
                    $message = "User with Phone Number $phone_number Created Successfully";
                } else {
                    $color = 'danger';
                    $message = "Database Problem";
                }
            } else {
                $color = 'warning';
                $message = "User with Phone Number $phone_number already Created";
            }
            $this->redirectWithMessage($color, $message, 'add_user');
        }

        public function viewUsers()
        {
            $this->data['title'] = 'View Users';
            $this->data['page_data'] = $this->UserManagmentModel->getByTableName('user_management');
            $this->load->view('web/includes/header', $this->data);
            $this->load->view('web/usermanagement/view_users');
            $this->load->view('web/includes/footer');
        }
        public function viewUserProfile($id)
        {
            $id = (int)base64_decode($id);
            $response = $this->UserManagmentModel->getCount('user_management', ['user_id' => $id]);

            if ($response != 1) {
                $color = 'danger';
                $message = "User does not exist";
                $this->redirectWithMessage($color, $message, 'view_users');
            }

            $this->data['title'] = 'View User';
            $this->data['page_data'] = $this->UserManagmentModel->getUserProfileWithWhere($id);
            $this->load->view('web/includes/header', $this->data);
            $this->load->view('web/usermanagement/view_user_profile');
            $this->load->view('web/includes/footer');
        }
        public function resetPassword(string $id)
        {
            $id = (int)base64_decode($id);
            $response = $this->UserManagmentModel->getCount('user_management', ['user_id' => $id]);

            if ($response != 1) {
                $color = 'danger';
                $message = "User does not exist";
            } else {
                $response = $this->UserManagmentModel->updateData(
                    'user_management',
                    ['user_id' => $id],
                    ['password' =>  md5('123456')]
                );
                if ($response == 1) {
                    $color = 'success';
                    $message = "Password Reset Successfully";
                } else {
                    $color = 'danger';
                    $message = "Database Problem";  
                }
            }
            $this->redirectWithMessage($color, $message, 'view_users');
        }

        public function view($id)
        {

            ifPermissions('users_view');

            $this->page_data['User'] = $this->users_model->getById($id);
            $this->page_data['User']->role = $this->roles_model->getByWhere([
                'id' => $this->page_data['User']->role
            ])[0];
            $this->page_data['User']->activity = $this->activity_model->getByWhere([
                'user' => $id
            ], ['order' => ['id', 'desc']]);
            $this->load->view('users/view', $this->page_data);
        }

        public function edit($id)
        {

            ifPermissions('users_edit');

            $this->page_data['User'] = $this->users_model->getById($id);
            $this->load->view('users/edit', $this->page_data);
        }


        public function update($id)
        {

            ifPermissions('users_edit');

            postAllowed();

            $data = [
                'role' => post('role'),
                'name' => post('name'),
                'username' => post('username'),
                'email' => post('email'),
                'phone' => post('phone'),
                'address' => post('address'),
            ];

            $password = post('password');

            if (logged('id') != $id)
                $data['status'] = post('status') == 1;

            if (!empty($password))
                $data['password'] = hash("sha256", $password);

            $id = $this->users_model->update($id, $data);

            if (!empty($_FILES['image']['name'])) {

                $path = $_FILES['image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $this->uploadlib->initialize([
                    'file_name' => $id . '.' . $ext
                ]);
                $image = $this->uploadlib->uploadImage('image', '/users');

                if ($image['status']) {
                    $this->users_model->update($id, ['img_type' => $ext]);
                }
            }

            $this->activity_model->add("User #$id Updated by User:" . logged('name'));

            $this->session->set_flashdata('alert-type', 'success');
            $this->session->set_flashdata('alert', 'Client Profile has been Updated Successfully');

            redirect('users');
        }

        public function check()
        {
            $email = !empty(get('email')) ? get('email') : false;
            $username = !empty(get('username')) ? get('username') : false;
            $notId = !empty($this->input->get('notId')) ? $this->input->get('notId') : 0;

            if ($email)
                $exists = count($this->users_model->getByWhere([
                    'email' => $email,
                    'id !=' => $notId,
                ])) > 0 ? true : false;

            if ($username)
                $exists = count($this->users_model->getByWhere([
                    'username' => $username,
                    'id !=' => $notId,
                ])) > 0 ? true : false;

            echo $exists ? 'false' : 'true';
        }

        public function delete($id)
        {

            ifPermissions('users_delete');

            if ($id !== 1 && $id != logged($id)) {
            } else {
                redirect('/', 'refresh');
                return;
            }

            $id = $this->users_model->delete($id);

            $this->activity_model->add("User #$id Deleted by User:" . logged('name'));

            $this->session->set_flashdata('alert-type', 'success');
            $this->session->set_flashdata('alert', 'User has been Deleted Successfully');

            redirect('users');
        }

        public function change_status($id)
        {
            $this->users_model->update($id, ['status' => get('status') == 'true' ? 1 : 0]);
            echo 'done';
        }
    }
