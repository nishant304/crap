<?php
error_reporting(0);
class login_controller extends CI_Controller
{
	
	function __construct()
	{
			parent::__construct();
			$this->load->helper('form','url');
			$this->load->database();
			$this->load->model('login_model');
			$this->load->library('session');
	}
	function index()
	{
			$this->load->view('student/login');
	}

	public function student_login_function()
	{
			$user_email = $this->input->post('user_email');
			$user_password = $this->input->post('user_password');
		    $data_student = $this->login_model->student_login($user_email,$user_password);
	    foreach ($data_student as $data_student_new) 
	    {
	    	$data_student_new['std_email'];
	    	$data_student_new['std_password'];
	    	$data_student_new['std_fname'];
	    	$data_student_new['std_lname'];
	    	$data_student_new['std_class'];
	    	$data_student_new['std_guardian_email'];
	    	$data_student_new['std_father_name'];
	    	$data_student_new['std_dob'];
	    	$data_student_new['std_address'];
	    	$data_student_new['std_mobile'];
	    	$data_student_new['std_image'];
	    	
	    }
	 
	    	if($data_student_new['std_email'] == '')
	    	{
	    		redirect('login_controller/');

	    	}
	    	
	    	else
	    	{
			    $this->student_info($data_student_new);
			    redirect('login_controller/student_info');	
	    	}
	}

		public function student_info($data_student_new = '')
		{
			$data_student_new1['myarray'] = $data_student_new;
			$this->load->view('student/student_header',$data_student_new1);
			$this->load->view('student/stu_profile');
		}
		public function student_dashboard()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/student_dashboard');
		}
		public function upload_profile_image()
		{
			$config = array(
			'upload_path' => "application/assets/uploads",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "204800",
			'max_height' => "768",
			'max_width' => "1024"
			);
		if(! is_dir($config['upload_path'])) die("path not exits");
			{
			$this->load->library('upload', $config);
			$this->upload->do_upload('user_image');
			$data =$this->upload->data();

			$user_email=$this->session->userdata('user_email'); 
			
			$update_data = array(
			'user_address' => $this->input->post('user_address'),
			'user_mobile' => $this->input->post('user_mobile'),
			);
			$img_u = $data['file_name'];
			}
	       $update_data = $this->login_model->student_update($user_email,$update_data,$img_u);
	
		foreach ($update_data as $data_student_new) 
	    {
	    	$data_student_new['std_email'];
	    	$data_student_new['std_address'];
	    	$data_student_new['std_mobile'];
	    	$data_student_new['user_image'];
	    }

			if($data_student_new['std_email'] == '')
	    	{
	    		redirect('login_controller/');
	    	}
	    	
	    	else
	    	{
			    $this->student_info($data_student_new);
			    redirect('login_controller/student_info');	
	    	}

		}
		public function logout()
		{
			$this->session->unset_userdata('std_email');
			$this->session->unset_userdata('std_password');
			$this->session->sess_destroy();
			redirect('login_controller/index');
		}

		public function student_note()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/student_notes');
		}
		public function student_assignment()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/student_assignment');
		}
		public function student_mark()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/student_mark');
		}
		public function student_exam_schdule()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/exam_schdule');
		}
		public function student_paid_list()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/paid_list');
		}
		public function student_event()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/student_event');
		}
		public function student_attend()
		{
			$this->load->view('student/student_header');
		    $this->load->view('student/student_attendance');
		}


		
}
 ?>