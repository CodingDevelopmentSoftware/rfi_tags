    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserManagment extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExist();
    }

    public function index()
    {
        $data['title']='Add User';
        $this->load->view('web/includes/header',$data);
        $this->load->view('web/usermanagement/adduser');
        $this->load->view('web/includes/footer');
    }

    public function save()
    {
        if(!postAllowed()) {
            redirect('UserManagment');
        }
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[10]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[10]');
        $this->form_validation->set_rules('phone_no', 'Phone Number', 'required|exact_length[10]|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        $data = [
            'first_name' => postDataFilterhtml($this->input->post('first_name')),
            'last_name' => postDataFilterhtml($this->input->post('last_name')),
            'phone_no' => postDataFilterhtml($this->input->post('phone_no')),
        ];
        


    }

    public function add()
    {
        ifPermissions('users_add');
        $this->load->view('users/add', $this->page_data);
    }



    public function view($id)
    {

        ifPermissions('users_view');

        $this->page_data['User'] = $this->users_model->getById($id);
        $this->page_data['User']->role = $this->roles_model->getByWhere([
            'id'=> $this->page_data['User']->role
        ])[0];
        $this->page_data['User']->activity = $this->activity_model->getByWhere([
            'user'=> $id
        ], [ 'order' => ['id', 'desc'] ]);
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

        if(logged('id')!=$id)
            $data['status'] = post('status')==1;

        if(!empty($password))
            $data['password'] = hash( "sha256", $password );

        $id = $this->users_model->update($id, $data);

        if (!empty($_FILES['image']['name'])) {

            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $this->uploadlib->initialize([
                'file_name' => $id.'.'.$ext
            ]);
            $image = $this->uploadlib->uploadImage('image', '/users');

            if($image['status']){
                $this->users_model->update($id, ['img_type' => $ext]);
            }

        }

        $this->activity_model->add("User #$id Updated by User:".logged('name'));

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'Client Profile has been Updated Successfully');
        
        redirect('users');

    }

    public function check()
    {
        $email = !empty(get('email')) ? get('email') : false;
        $username = !empty(get('username')) ? get('username') : false;
        $notId = !empty($this->input->get('notId')) ? $this->input->get('notId') : 0;

        if($email)
            $exists = count($this->users_model->getByWhere([
                    'email' => $email,
                    'id !=' => $notId,
                ])) > 0 ? true : false;

        if($username)
            $exists = count($this->users_model->getByWhere([
                    'username' => $username,
                    'id !=' => $notId,
                ])) > 0 ? true : false;

        echo $exists ? 'false' : 'true';
    }

    public function delete($id)
    {

        ifPermissions('users_delete');

        if($id!==1 && $id!=logged($id)){ }else{
            redirect('/','refresh');
            return;
        }

        $id = $this->users_model->delete($id);

        $this->activity_model->add("User #$id Deleted by User:".logged('name'));

        $this->session->set_flashdata('alert-type', 'success');
        $this->session->set_flashdata('alert', 'User has been Deleted Successfully');
        
        redirect('users');

    }

    public function change_status($id)
    {
        $this->users_model->update($id, ['status' => get('status') == 'true' ? 1 : 0 ]);
        echo 'done';
    }

    }
