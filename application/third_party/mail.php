	public function add_user_byadmin()
	{	
		$password=time();
		$email=$this->input->post('email');
		$firstname=htmlspecialchars(ucfirst(trim($this->input->post('firstname'))));
		$data=array(
					'dept_id'=>$this->input->post('department'),
					'user_type'=>$this->input->post('usertype'),
					'roleid'=>$this->input->post('role'),
					'loc_id'=>$this->input->post('location'),
					'check_email'=>0,
					'password'=>$password,
					'email'=>base64_encode($email),
					'first_name'=>$firstname,
					'middle_name'=>htmlspecialchars(ucfirst(trim($this->input->post('middlename')))),
					'last_name'=>htmlspecialchars(ucfirst(trim($this->input->post('lastname')))),
					'created_by'=>$this->session->userdata('admin_id'),
					'created_dt'=>$this->get_time(),
					'emp_status'=>1
					);
				$admin='Deepinder999@gmail.com';
				$pass='Deepu9915099247';
				$this->db->trans_begin();
				$this->db->insert('employee', $data);
				
				$m=new PHPMailer;
				$m->isSMTP();
				$m->SMTPAuth=true;
				$m->SMTPDebug=2;
				$m->Host='ssl://smtp.gmail.com';
				$m->Username=$admin;
				$m->Password=$pass;
				$m->SMTPSecure='ssl';
				$m->Port=465;

				$m->From=$admin;
				$m->FromName='JDA Asset Management System';
				$m->addReplyTo('JDA Asset Management',$admin);
				$m->addAddress($email,$firstname);
				$m->isHTML(true);
				$m->Subject='Account Confirmation JDA';
				$m->Body="Hi <b>$firstname</b><br/>
							<ins>JDA Asset Management System</ins> (JDA) Thank You Being a Part of us.<br/>
							Email-id : $email<br/>Password : $password <br/> Please Don't Share with any Body";

			if ($this->db->affected_rows() && ($m->send()))
				{
						;
					$this->db->trans_commit();
					$this->session->set_flashdata('succ_msg','Employee Registed Successfully');
					redirect('Asset_controller/user');
				}
				else
				{  
					$this->db->trans_rollback();
					$this->session->set_flashdata('err_msg','DataBase Problem');
					redirect('Asset_controller/user');
				}
				
	}