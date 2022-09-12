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
                redirect('add_user');
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

        public function changeStatus(string $id = '', string $status = '')
        {
            $id = (int)base64_decode($id);
            $status = (int)base64_decode($status);
            $response = $this->UserManagmentModel->getCount('user_management', ['user_id' => $id]);

            if ($response != 1) {
                $color = 'danger';
                $message = "User does not exist";
            } else {
                $response = $this->UserManagmentModel->updateData(
                    'user_management',
                    ['user_id' => $id],
                    ['status' =>  !$status]     // making active or inactive by adding not condtion
                );
                if ($response == 1) {
                    $color = 'success';
                    $message = "User Status Changed Successfully";
                } else {
                    $color = 'danger';
                    $message = "Database Problem";
                }
            }
            $this->redirectWithMessage($color, $message, 'view_users');
        }

        public function editUserProfile($id)
        {
            $id = (int)base64_decode($id);
            $response = $this->UserManagmentModel->getCount('user_management', ['user_id' => $id]);

            if ($response != 1) {
                $color = 'danger';
                $message = "User does not exist";
                $this->redirectWithMessage($color, $message, 'view_users');
            }

            $this->data['title'] = 'Edit User';
            $this->data['page_data'] = $this->UserManagmentModel->getSingleRowWithWhere('*', 'user_management', ['user_id' => $id]);
            $this->load->view('web/includes/header', $this->data);
            $this->load->view('web/usermanagement/edit_user_profile');
            $this->load->view('web/includes/footer');
        }
        public function saveUpdateUser()
        {
            if (!postAllowed()) {
                redirect('view_users');
            }
            $id = $this->input->post('user_id');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|exact_length[10]|numeric');
            if ($this->form_validation->run() == FALSE) {
                $this->index();
                return redirect("edit_user_profile/" . base64_encode($id));
            }

            $updateData = [
                'first_name' => postDataFilterhtml($this->input->post('first_name')),
                'last_name' => postDataFilterhtml($this->input->post('last_name')),
                'phone_number' => postDataFilterhtml($this->input->post('phone_number')),
                'user_type' => postDataFilterhtml($this->input->post('user_type')),
                'modified_by' => $this->getLoggedInUser()->user_id,
                'modified_dt' => getCurrentTime(),
            ];
            $response = $this->UserManagmentModel->updateData('user_management', ['user_id' => $id], $updateData);

            if ($response > 0) {
                $color = 'success';
                $message = "User Profile updated Successfully";
            } else {
                $color = 'danger';
                $message = "Database Problem";
            }
            $this->redirectWithMessage($color, $message, 'view_users');
        }
        public function loginActivities($id)
        {
            $id = (int)base64_decode($id);
            $response = $this->UserManagmentModel->getCount('user_management', ['user_id' => $id]);

            if ($response != 1) {
                $color = 'danger';
                $message = "User does not exist";
                $this->redirectWithMessage($color, $message, 'view_users');
            }
            $fullName = $this->UserManagmentModel->getSingleRowWithWhere('*', 'user_management', ['user_id' => $id]);
            $this->data['title'] = 'Activities Of ' . $fullName->first_name . ' ' . $fullName->last_name;
            $this->data['page_data'] = $this->UserManagmentModel->getUserActivitiesWithWehere($id);
            $this->load->view('web/includes/header', $this->data);
            $this->load->view('web/usermanagement/login_activities');
            $this->load->view('web/includes/footer');
        }
    }
    ?>
