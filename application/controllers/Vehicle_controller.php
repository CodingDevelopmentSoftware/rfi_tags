<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_controller extends MY_Controller
{
	
	public function in_vehicle_transaction_report()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$this->load->library('pagination');
		
		$config=array(
			'base_url' => base_url('Vehicle_controller/in_vehicle_transaction_report'),
			'per_page'	=>100,
			'total_rows'=> $this->Vehicle_admin->in_vehicle_transaction_rows_model(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'first_tag_open'=>"<li>",
			'first_tag_close'=>"</li>",
			'first_link'=>"FIRST PAGE",
			'last_link'=>"LAST PAGE",
			'last_tag_open'=>"<li>",
			'last_tag_close'=>"</li>",
			'next_tag_open'=>"<li>",
			'next_tag_close'=>"</li>",
			'prev_tag_open'=>"<li>",
			'prev_tag_close'=>"</li>",
			'num_tag_open'=>"<li>",
			'num_tag_close'=>"</li>",
			'cur_tag_open'=>"<li class='active'><a>",
			'cur_tag_close'=>"</a></li>"
		);

		$this->pagination->initialize($config);

		$offset=($this->uri->segment(3))?$this->uri->segment(3):0;

		$data=array(
			'title'=>'In Vehicle Transaction',
			'page_data'=>$this->Vehicle_admin->in_vehicle_transaction_report_model($config['per_page'],$offset),
			);
		$this->load->view('web/in_vehicle_transaction',$data);
	}
	public function out_vehicle_transaction_report()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$this->load->library('pagination');
		
		$config=array(
			'base_url' => base_url('Vehicle_controller/out_vehicle_transaction_report'),
			'per_page'	=>100,
			'total_rows'=> $this->Vehicle_admin->out_vehicle_transaction_rows_model(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'first_tag_open'=>"<li>",
			'first_tag_close'=>"</li>",
			'first_link'=>"FIRST PAGE",
			'last_link'=>"LAST PAGE",
			'last_tag_open'=>"<li>",
			'last_tag_close'=>"</li>",
			'next_tag_open'=>"<li>",
			'next_tag_close'=>"</li>",
			'prev_tag_open'=>"<li>",
			'prev_tag_close'=>"</li>",
			'num_tag_open'=>"<li>",
			'num_tag_close'=>"</li>",
			'cur_tag_open'=>"<li class='active'><a>",
			'cur_tag_close'=>"</a></li>"
		);

		$this->pagination->initialize($config);

		$offset=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data=array(
			'title'=>'Out Vehicle Transaction',
			'page_data'=>$this->Vehicle_admin->out_vehicle_transaction_report_model($config['per_page'],$offset),
			);
		$this->load->view('web/in_vehicle_transaction',$data);
	}
	public function add_management_user()
	{
		echo "<pre>";
		print_r(checkUserSession());
		exit;

		if(!$this->session->userdata('user_id') || $this->session->userdata('type')!='s')
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['add']))
		{
			$this->Vehicle_admin->add_management_user_model();
		}
		$data=array(
			'title'=>'Add Management User'
			);
		$this->load->view('web/add_management_user',$data);
	}
	public function view_management_user()
	{
		if(!$this->session->userdata('user_id') || $this->session->userdata('type')!='s')
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'View Management Users',
			'all_management_user'=>$this->Vehicle_admin->get_all_management_user()
			);
		$this->load->view('web/view_management_user',$data);
	}
	public function reset_password()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		if(isset($_POST['change']))
		{
			$this->Vehicle_admin->reset_password_model();	
		}	
		
		$data=array(
			'title'=>'Reset Password of User Id : '.$this->Vehicle_admin->get_management_user($id)->email_id,
			);
		$this->load->view('web/reset_password_user_management',$data);
	}
	public function view_user_account_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'View Details of Management User',
			'management_user'=>$this->Vehicle_admin->get_management_user($id)
			);
		$this->load->view('web/view_user_account_detail',$data);
	}
	public function edit_user_account_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['update']))
		{
			$this->Vehicle_admin->edit_user_account_detail_model();
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'Edit Details of Management User',
			'management_user'=>$this->Vehicle_admin->get_management_user($id)
			);
		$this->load->view('web/edit_user_account_detail',$data);
	}
	public function add_area()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['add']))
		{
			$this->Vehicle_admin->add_area_model();
		}
		$data=array(
			'title'=>'Add Area'
			);
		$this->load->view('web/add_area',$data);
	}
	public function view_area()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'All Areas',
			'page_data'=>$this->Vehicle_admin->get_all_area(),
			);
		$this->load->view('web/view_all_area',$data);
	}
	public function view_area_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'View Details of Area',
			'page_data'=>$this->Vehicle_admin->get_single_area($id)
			);
		$this->load->view('web/view_area_detail',$data);
	}
	public function edit_area_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['update']))
		{
			$this->Vehicle_admin->edit_area_detail_model();
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'Edit Details of Area',
			'page_data'=>$this->Vehicle_admin->get_single_area($id)
			);
		$this->load->view('web/edit_area_detail',$data);
	}

	public function add_vehicle()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['add']))
		{
			$this->Vehicle_admin->add_vehicle_model();
		}
		$data=array(
			'title'=>'Add Vehicle'
			);
		$this->load->view('web/add_vehicle',$data);
	}

	public function view_all_vehicle()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$this->load->library('pagination');
		
		$config=array(
			'base_url' => base_url('Vehicle_controller/view_all_vehicle'),
			'per_page'	=>100,
			'total_rows'=> $this->Vehicle_admin->total_rows(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'first_tag_open'=>"<li>",
			'first_tag_close'=>"</li>",
			'first_link'=>"FIRST PAGE",
			'last_link'=>"LAST PAGE",
			'last_tag_open'=>"<li>",
			'last_tag_close'=>"</li>",
			'next_tag_open'=>"<li>",
			'next_tag_close'=>"</li>",
			'prev_tag_open'=>"<li>",
			'prev_tag_close'=>"</li>",
			'num_tag_open'=>"<li>",
			'num_tag_close'=>"</li>",
			'cur_tag_open'=>"<li class='active'><a>",
			'cur_tag_close'=>"</a></li>"
		);

		$this->pagination->initialize($config);

		$offset=($this->uri->segment(3))?$this->uri->segment(3):0;


		$data=array(
			'title'=>'All Vehicles',
			'vehicle'=>$this->Vehicle_admin->get_all_vehicle($config['per_page'],$offset),
			);
		$this->load->view('web/view_all_vehicle',$data);
	}
	public function search_vehicle()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		
		$data=array(
			'title'=>'Search Vehicle'
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->search_vehicle_model();
		}

		$this->load->view('web/serach_vehicle',$data);
	}
	public function view_vehicle_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'View Details of Vehicle',
			'page_data'=>$this->Vehicle_admin->get_single_vehcile($id)
			);
		$this->load->view('web/view_vechile_detail',$data);
	}
	public function edit_vehicle_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['update']))
		{
			$this->Vehicle_admin->edit_user_vehicle_detail_model();
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'Edit Details of Vehicle',
			'page_data'=>$this->Vehicle_admin->get_single_vehcile_details($id)
			);
		$this->load->view('web/edit_vehicle_detail',$data);
	}
	public function add_device()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['add']))
		{
			$this->Vehicle_admin->add_device_model();
		}
		$data=array(
			'title'=>'Add Device',
			);
		$this->load->view('web/add_device',$data);
	}
	public function view_device()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'View All Devices',
			'page_data'=>$this->Vehicle_admin->get_all_devices(),
			);
		$this->load->view('web/view_all_devices',$data);
	}
	public function view_device_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'View Details of Device',
			'page_data'=>$this->Vehicle_admin->get_single_device($id)
			);
		$this->load->view('web/view_device_detail',$data);
	}
	public function edit_device_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['update']))
		{
			$this->Vehicle_admin->edit_device_detail_model();
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'Edit Details of Device',
			'page_data'=>$this->Vehicle_admin->get_single_device_details($id)
			);
		$this->load->view('web/edit_device_detail',$data);
	}
	public function connect_device()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['connect']))
		{
			$this->Vehicle_admin->connect_device_model();
		}
		$data=array(
			'title'=>'Mapping Device',
			'page_data'=>$this->Vehicle_admin->get_all_active_device_and_vehicle_details()
			);
		$this->load->view('web/connect_device',$data);
	}
	public function remove_connect_device()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$device_id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(4)))));
		$location_id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(5)))));
		$this->Vehicle_admin->remove_connect_device_model($id,$device_id,$location_id);

	}
	public function add_location()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['add']))
		{
			$this->Vehicle_admin->add_location_model();
		}
		$data=array(
			'title'=>'Add Location',
			'page_data'=>$this->Vehicle_admin->get_all_area_active(),
			);
		$this->load->view('web/add_location',$data);
	}
	public function view_location()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'View All Location',
			'page_data'=>$this->Vehicle_admin->get_all_locations(),
			);
		$this->load->view('web/view_all_locations',$data);
	}
	public function view_location_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'View Details of Location',
			'page_data'=>$this->Vehicle_admin->get_single_location($id)
			);
		$this->load->view('web/view_location_detail',$data);
	}
	public function edit_location_detail()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		if(isset($_POST['update']))
		{
			$this->Vehicle_admin->edit_location_detail_model();
		}
		$id=(int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));
		$data=array(
			'title'=>'Edit Details of Location',
			'area'=>$this->Vehicle_admin->get_all_area_active(),
			'page_data'=>$this->Vehicle_admin->get_single_location_details($id)
			);
		$this->load->view('web/edit_location_detail',$data);
	}

	public function area_wise()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'Area Wise',
			'page_data'=>$this->Vehicle_admin->get_all_area(),
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->report_area_wise();
		}
		$this->load->view('web/area_wise',$data);
	}
	
	public function device_wise()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		
		$data=array(
			'title'=>'Device Wise',
			'page_data'=>$this->Vehicle_admin->get_all_devices(),
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->report_device_wise();
		}
		$this->load->view('web/device_wise',$data);
	}
	public function location_wise()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehiclew_controller');
		}
		$data=array(
			'title'=>'Location Wise',
			'page_data'=>$this->Vehicle_admin->get_all_locations(),
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->report_location_wise();
		}
		$this->load->view('web/location_wise',$data);
	}
	public function vehicle_wise()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'Vehicle Wise',
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->report_vehicle_wise();
		}
		$this->load->view('web/vehicle_wise',$data);
	}
	public function plant_in()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'Plant In',
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->report_plant_in();
		}
		$this->load->view('web/plant_in',$data);
	}
	public function plant_out()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'Plant Out',
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->report_plant_out();
		}
		$this->load->view('web/plant_out',$data);
	}
	public function total_count()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Vehicle_controller');
		}
		$data=array(
			'title'=>'Summary Report',
			);
		if(isset($_POST['submit']))
		{
			$data['report_page_data']=$this->Vehicle_admin->total_count();
		}


		$this->load->view('web/total_count',$data);
	}
	public function get_device_status()
	{
		$ok=$this->Vehicle_admin->get_device_status();
		echo json_encode($ok);
	}
	public function dashboard_live_count()
	{
		$ok=$this->Vehicle_admin->get_live_count();
		echo json_encode($ok);
	}
	public function dashboard_live_transaction_in()
	{
		$ok=$this->Vehicle_admin->live_transaction_in();
		echo json_encode($ok);
	}
	public function dashboard_live_transaction_out()
	{
		$ok=$this->Vehicle_admin->live_transaction_out();
		echo json_encode($ok);
	}
	public function dashboard_get_live_tag()
	{
		$ok=$this->Vehicle_admin->get_live_tag();
		echo json_encode($ok);
	}

}	