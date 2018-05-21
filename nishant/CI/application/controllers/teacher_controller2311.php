<?php
error_reporting(0);

class teacher_controller extends CI_Controller
{
        public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model('teacher_model');
        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->model('student_model');
    }
        public function index()
    {
        $this->load->view('teacher/login');
    }
    

        public function teacher_login()
    {

        
          $login_data = array(
            'stf_email'=>$this->input->post('user_email'),
            'stf_password'=>$this->input->post('user_password')
            );
        
           $staff_data = $this->teacher_model->teacher_login($login_data);
         
          $this->session->set_userdata('stf_data',$staff_data);
          redirect('teacher_controller/staff_profile');
     
        
    }
        public function staff_profile()
    {
         $staff_pro = $this->session->userdata('stf_data');
         $stff_id = $staff_pro[0]['stf_id'];
         $staff_data_id['pro_stf'] = $this->teacher_model->stafff_detail($stff_id);

        foreach ($staff_pro as $key => $value) {
        $stf_id1 = $value['stf_id']; 
        }
        $stf_id = $this->session->set_userdata('stfdata',$stf_id1);
        $staf_auth_data['data_stf'] = $this->login_model->authority_check($stf_id1);

      $staff_data_id['request'] = $this->teacher_model->fetch_student_leave_request($stff_id);
      $req_count = $this->teacher_model->std_lev_req_count($stff_id);
      $count = $req_count[0]['count(*)'];
      $this->session->set_userdata('count',$count);


        $this->load->view('teacher/teacher_header',$staff_data_id);
        $this->load->view('teacher/teacher_profile',$staf_auth_data);
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/teacher_footer');
        
    }


        public function staff_logout()
    {
        $this->session->unset_userdata('stf_email');
        $this->session->unset_userdata('stf_password');
        $this->session->sess_destroy();
        redirect('teacher_controller/index');
    }   
      public function student_admission()
    {
            $this->load->view('teacher/teacher_header');
            $this->load->view('teacher/teacher_sidebar');
            $this->load->view('teacher/student_reg');
            $this->load->view('teacher/teacher_footer');

    }
      
     
        public function savingdata()
{
    if($this->input->post('std_email')!=''){
    $confirm_code[0]=random_string('alnum',6);
        }
        if($this->input->post('std_father_email')!=''){
    $confirm_code[1]=random_string('alnum',7);
        }
    if($this->input->post('std_mother_email')!=''){
    $confirm_code[2]=random_string('alnum',7); 
    }
        if($this->input->post('std_guardian_email')!=''){
    $confirm_code[3]=random_string('alnum',7); 
    }
        $data = array(
    'std_fname' => $this->input->post('std_fname'),
    'std_lname' => $this->input->post('std_lname'),
    'std_email' => $this->input->post('std_email'),
    'std_class' => $this->input->post('std_class'),
    'std_father_name' => $this->input->post('std_father_name'),
    'std_mother_name' => $this->input->post('std_mother_name'),
    'std_guardian_name' => $this->input->post('std_guardian_name'),
        'std_father_email' => $this->input->post('std_father_email'),
    'std_mother_email' => $this->input->post('std_mother_email'),
    'std_guardian_email' => $this->input->post('std_guardian_email'),
    'std_dob' => $this->input->post('std_dob'),
    'std_address' => $this->input->post('std_address'),
    'std_mobile' => $this->input->post('std_mobile'),
    'std_batch' => $this->input->post('std_batch'),
    'std_password'=>$confirm_code[0]);
    $sql=$this->login_model->insert_data('admission',$data);
        if($sql!=''){
        $email_exist[0]=$this->input->post('std_father_email');
    $email_table_name[0]='father_email';
        $email_exist[1]=$this->input->post('std_mother_email');
    $email_table_name[1]='mother_email';
    $email_exist[2]=$this->input->post('std_guardian_email');
    $email_table_name[2]='guardian_email';

    $parent_exist=$this->login_model->parent_exist($email_exist,$email_table_name);
    $exist=0;
    print_r($parent_exist);
    for($i=0;$i<=2;$i++)
    {
    if(!empty($parent_exist[$i]))
    {  
    $exist++;
    echo 'already exist';
    }
    }

    if($exist==0){
    $std_id_inserted=$this->login_model->fetch_std_data();
    $data_parent = array(
    'std_id' => $std_id_inserted[0]['std_id'],
    'father_name' => $this->input->post('std_father_name'),
    'mother_name' => $this->input->post('std_mother_name'),
    'guardian_name' => $this->input->post('std_guardian_name'),
        'father_email' => $this->input->post('std_father_email'),
    'mother_email' => $this->input->post('std_mother_email'),
    'guardian_email' => $this->input->post('std_guardian_email'),
    'father_password' => $confirm_code[1],
    'mother_password' => $confirm_code[2],
    'guardian_password' => $confirm_code[3]
    );
    $this->login_model->insert_data('parrent_detail',$data_parent);
    $to_email[0]=$data['std_email'];
    $to_email[1]=$data['std_father_email'];
    $to_email[2]=$data['std_mother_email'];
    $to_email[3]=$data['std_guardian_email'];
    $from_email = 'sachinraajvijay@gmail.com';
    $subject = 'Verify Your Email Address';

    for($i=0;$i<=3;$i++){
    $message = 'WELCOME TO BECOME A MEMBER<br><table>
    <tr><td>Your Username:</td><td>'.$to_email[$i].'</td></tr>
    <tr> <td>Your password: </td><td>'.$confirm_code[$i].'</td></tr></table>';
    if($to_email[$i]!=''){
    $config = Array(
    'mailpath'=>'/usr/sbin/sendmail',
    'useragent' => 'CodeIgniter',
    'protocol' => 'mail', 
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => '465',
    'smtp_user' => 'anandsekhartecinso@gmail.com',
    'smtp_pass' => 'anand12345',
    'mailtype' => 'html', 
    'smtp_timeout' => '5', 
    'charset' => 'iso-8859-1',
    'newline' => "\r\n",
    'wordwrap' => 'TRUE' );
    $this ->load->library('email',$config);
    $this->email->set_newline("\r\n");
    $this->email->from($from_email,'Anand');
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->to($to_email[$i]);
    $this->email->send();
    }
    }
    } 
    else{
    for($i=0;$i<=3;$i++){
    if($email_exist[$i]){
    $to_email=$email_exist[$i];
    }
    }
    $message = 'please check your update child '.$this->input->post('std_fname').'...!';
    $from_email = 'sachinraajvijay@gmail.com';
    $subject = 'Verify Your Email Address';
    $config = Array(
    'mailpath'=>'/usr/sbin/sendmail',
    'useragent' => 'CodeIgniter',
    'protocol' => 'mail', 
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => '465',
    'smtp_user' => 'anandsekhartecinso@gmail.com',
    'smtp_pass' => 'anand12345',
    'mailtype' => 'html', 
    'smtp_timeout' => '5', 
    'charset' => 'iso-8859-1',
    'newline' => "\r\n",
    'wordwrap' => 'TRUE' );
    $this ->load->library('email',$config);
    $this->email->set_newline("\r\n");
    $this->email->from($from_email,'Anand');
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->to($to_email);
    $this->email->send();

    }
    }
    redirect('teacher_controller/student_admission');
}

   

        public function student_record()
    {
        $all_data = $this->login_model->all_student();

        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/student_record',$all_data);
        $this->load->view('teacher/teacher_footer');

    }
        public function student_delete()
    {
        $student_id = $this->uri->segment(3);
        $data_admin = $this->login_model->student_remove($student_id);
        redirect('teacher_controller/student_record');
    }
        public function ebook_delete()
    {
        $ebook_id = $this->uri->segment(3);
        $data_admin = $this->login_model->ebook_remove($ebook_id);
        redirect('teacher_controller/student_file_upload');
    }
    
        public function student_data_update()
    {
        $student_id = $this->uri->segment(3);
        $data_stu['data1'] = $this->login_model->student_record_update($student_id);
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/update_student_record',$data_stu);
        $this->load->view('teacher/teacher_footer');

    }
        public function student_update_data()
    {

        $student_id = $this->input->post('student_id');
            
        $data_record = array(
        'std_fname' => $this->input->post('std_fname'),
        'std_lname' => $this->input->post('std_lname'),
        'std_email' => $this->input->post('std_email'),
        'std_class' => $this->input->post('std_class'),
        'std_father_name' => $this->input->post('std_father_name'),
        'std_guardian_email' => $this->input->post('std_guardian_email'),
        'std_dob' => $this->input->post('std_dob'),
        'std_address' => $this->input->post('std_address'),
        'std_mobile' => $this->input->post('std_mobile'),
        );
        $stu_data['data'] = $this->login_model->student_finle_update($data_record, $student_id);
        redirect('teacher_controller/student_record');
    }


        public function do_upload()
    {
        $config = array(
        'upload_path' => "application/assets/uploads",
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "204800",
        'max_height' => "768",
        'max_width' => "1024"
        );
        if(! is_dir($config['upload_path'])) die("path not exits");
        {
        $this->load->library('upload', $config);
        $this->upload->do_upload('notes_file');
        $upload_data = $this->upload->data();

        $data_post = array(
        'notes_title' => $this->input->post('notes_title'),
        'notes_desc' => $this->input->post('notes_desc'),
        'notes_course' => $this->input->post('notes_course'),
        'notes_batch' => $this->input->post('notes_batch'),
        'notes_subject' => $this->input->post('notes_subject'),
        'notes_for_class' => $this->input->post('notes_for_class'),
        'submitted_by' => $this->input->post('submitted_by'),
        'notes_file' => $upload_data['file_name']);     
        $this->login_model->insert_data('notes',$data_post);
        $this->student_file_upload();
    }
    }

       public function student_file_upload()
    {
        $class['class_data'] =  $this->login_model->class_fetch();

        $upload_data['ebook_data'] = $this->login_model->get_all_file();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar',$class);
        $this->load->view('teacher/notes',$upload_data);
        $this->load->view('teacher/teacher_footer');

    }


        public function add_staff()
    {
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/staff_details');
        $this->load->view('teacher/teacher_footer');

    }
        public function add_new_staff()
    {
        $staff_data = array(
        'stf_fname' => $this->input->post('stf_fname'),
        'stf_lname' => $this->input->post('stf_lname'),
        'stf_email' => $this->input->post('stf_email'),
        'stf_password' => $this->input->post('stf_password'),
        'stf_dob' => $this->input->post('stf_dob'),
        'stf_address' => $this->input->post('stf_address'),
        'stf_mobile' => $this->input->post('stf_mobile'),
        'stf_mobile' => $this->input->post('stf_mobile'),
        'stf_role' => $this->input->post('stf_role'));
        $this->login_model->insert_data('staff',$staff_data);
            redirect('teacher_controller/add_staff');
    }
   
        public function add_event()
    {
        $all_teacher['teacher'] = $this->login_model->all_staff();
        $event_data['event'] = $this->login_model->event_get();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar',$all_teacher);
        $this->load->view('teacher/add_event',$event_data);
        $this->load->view('teacher/teacher_footer');

    }
        public function add_new_event()
    {
            $add_event = array(
        'event_name' => $this->input->post('event_name'),
        'event_date' => $this->input->post('event_date'),
        'event_start_time' => $this->input->post('event_start_time'),
        'event_end_time' => $this->input->post('event_end_time'),
        'staff_id' => $this->input->post('staff_id'));
            $this->login_model->insert_data('add_event',$add_event);
            redirect('teacher_controller/add_event');
    }
        public function event_delete()
    {
        $event_id = $this->uri->segment(3);
        $data_admin = $this->login_model->event_remove($event_id);
        redirect('teacher_controller/add_event');
     }
        public function fees_detail()
    {
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/fees_detail');
        $this->load->view('teacher/teacher_footer');

    }
        public function dashboard_data()
    {
        $dash['all_rows'] = $this->login_model->dash_data();
        $this->session->set_userdata($dash);
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/index',$dash);
        $this->load->view('teacher/teacher_footer');

    }
        public function add_subject()
    {
        $class['class_data'] =  $this->login_model->class_fetch();
        $all_subject['subject'] = $this->login_model->all_subject();
        $this->load->view('teacher/teacher_header',$class);
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/add_subject',$all_subject);
        $this->load->view('teacher/teacher_footer');

    }
        public function add_new_subject()
    {
        $all_subject['subject'] = $this->login_model->all_subject();

        $add_subject = array(
        'sub_name' => $this->input->post('sub_name'),
        'class_id' => $this->input->post('class_id'));
         $ion=0;
        foreach ($all_subject['subject'] as $key) {

        if($add_subject['sub_name'] == $key['sub_name'] && $add_subject['class_id'] == $key['class_id'])
            {
                $ion++;
            }
            

        }
        if($ion == 0)
        {
        
        $this->login_model->insert_data('add_subject',$add_subject);
        }
        
        redirect('teacher_controller/add_subject');
    }
        public function subject_delete()
    {
             $sub_id = $this->uri->segment(3);  
            $this->login_model->subject_remove($sub_id);
            redirect('teacher_controller/add_subject');
    }
   
    
    
        public function add_class($message = '')
    {
        if($message != '')
        {
            $msg['error_message'] = "Class And Section Already Define";
        }
        $class_data['class_all'] = $this->login_model->all_class();
        $this->load->view('teacher/teacher_header',$msg);
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/add_class',$class_data);
        $this->load->view('teacher/teacher_footer');

    }
 
        public function class_remove()
    {
         $cls_id = $this->uri->segment(3);
        $this->login_model->delete_class($cls_id);
        redirect('teacher_controller/add_class');
    }
        public function add_assignment()
    {
        $class['class_data'] = $this->login_model->class_fetch();
        $all_subject['subject'] = $this->login_model->all_subject();
        $assign_data['assignment'] = $this->login_model->assign_get();
        $this->load->view('teacher/teacher_header',$assign_data);
        $this->load->view('teacher/teacher_sidebar',$all_subject);
        $this->load->view('teacher/Assignment',$class);
        $this->load->view('teacher/teacher_footer');
    }
        public function upload_assignment()
    {

        $config = array(
        'upload_path' => "application/assets/uploads",
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => 'TRUE',
        'max_size' => "204800",
        'max_height' => "768",
        'max_width' => "1024"
        );


        if(! is_dir($config['upload_path'])) die("path not exits");
        {
        $this->load->library('upload', $config);
        $this->upload->do_upload('assign_file');
        $upload_data = $this->upload->data();

           $add_assignment = array(
        'assign_title' => $this->input->post('assign_title'),
        'assign_for_class' => $this->input->post('assign_for_class'),
        'assign_for_section' => $this->input->post('assign_for_section'),
        'assign_subject' => $this->input->post('assign_subject'),
        'date_of_submission' => $this->input->post('date_of_submission'),
        'submitted_by' => $this->input->post('submitted_by'),
        'assign_desc' => $this->input->post('assign_desc'),
        'assign_file' => $upload_data['file_name']);

           if($add_assignment != '')
        {
        $this->login_model->insert_data('assignment',$add_assignment);
        redirect('teacher_controller/add_assignment');
        }
        $this->student_file_upload();
        }
    }
        public function assignment_delete()
    {
             $assignment_id = $this->uri->segment(3);   
            $this->login_model->assignment_remove($assignment_id);
            redirect('teacher_controller/add_assignment');
    }
        public function add_class_incharge($err='')
    {
        $class['all_class'] = $this->login_model->all_class();
        
        if($err!='')
        {
         $er['msgn'] = "Incharge already exist for this class/section firstly remove this then assign new";
         $this->load->view('teacher/teacher_header',$er);
         $this->load->view('teacher/teacher_sidebar');
         $this->load->view('teacher/add_class_incharge',$class);
         $this->load->view('teacher/teacher_footer');
        }

        else
        {
         $this->load->view('teacher/teacher_header');
         $this->load->view('teacher/teacher_sidebar');
         $this->load->view('teacher/add_class_incharge',$class);
        }
         $this->load->view('teacher/teacher_footer');
    }
        public function insert_class_incharge()
    {
        $add_class_incharge = array(
        'class_incharge' => $this->input->post('class_incharge')
         );

        $class_name = $this->input->post('class_name');
        $class_section = $this->input->post('class_section');
        $class_incharge = $this->input->post('class_incharge');

        $class_incharge_exist = $this->login_model->class_incharge_exist($class_name,$class_section,$class_incharge);

            foreach ($class_incharge_exist as $key => $value) 
        {
            $class_incharge_exist = $value['class_incharge'];

     
            if($class_incharge_exist =='')
         {
            $this->login_model->update_data('add_class',$add_class_incharge,$class_name,$class_section,$class_incharge);
     
            redirect('teacher_controller/add_class_incharge');
              }
              else
              {
            redirect('teacher_controller/add_class_incharge/4');
              }
             } 
    }

        public function remove_incharge($id='')
    {
        $remove = $this->login_model->remove_class($id);
        redirect('teacher_controller/add_class_incharge');

    }
    

        public function assign_subject_class($error_message = '')
    {
        
        
        $all_teacher['teacher'] = $this->login_model->all_staff();
        $all_subject['subject'] = $this->login_model->all_subject();
        $class['class_data'] =    $this->login_model->class_fetch();
        $class['assign_teacher'] = $this->login_model->all_assign_sub();
        
        $this->load->view('teacher/teacher_header',$all_teacher);
        $this->load->view('teacher/teacher_sidebar',$all_subject);
        $this->load->view('teacher/assign_teacher',$class);
        $this->load->view('teacher/teacher_footer',$class);
    }   
        public function assign_subject_teacher()
    {
        
        $date = date('Y-m-d H:i:s');
        $assign_sub = array(
        'tch_name' => $this->input->post('tch_name'),
        'assign_class' => $this->input->post('assign_class'),
        'assign_section' => $this->input->post('assign_section'),
        'sub_name' => $this->input->post('sub_name'),
        'assign_by' => $this->input->post('assign_by'),
        'assign_date' => $date
        );
        $class1['assign'] = $this->login_model->all_assign($assign_sub);
        // print_r($assign);
        
         foreach ($class1['assign'] as $key) {
         $tch_name1 = $key['tch_name'];
         $assign_class1 = $key['assign_class'];
         $assign_section1 = $key['assign_section'];
         $sub_name = $key['sub_name'];
    
      }

        if($assign_class1 == $assign_sub['assign_class'] && $assign_section1 == $assign_sub['assign_section'] && $sub_name == $assign_sub['sub_name'])
        {
            $error_message = "teacher for this subject already define";
            echo '<script type="text/javascript">alert("Data has been submitted to ' . $error_message . '");</script>';
            $this->assign_subject_class($error_message);
        }
        else
        {
        $this->login_model->insert_data('assign_sub_teacher',$assign_sub);
        redirect('teacher_controller/assign_subject_class');     
        }
    }



        public function assign_sub_delete()
    {
        $assign_id = $this->uri->segment(3);
        $data_assign = $this->login_model->assign_remove($assign_id);
        redirect('teacher_controller/assign_subject_class');
    }
        public function assign_rol_sec()
    {
        $all_data = $this->login_model->all_student();
        $class['all_class']=$this->login_model->all_class();
        $this->load->view('teacher/teacher_header',$class);
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/assign_rol_sec',$all_data);
        $this->load->view('teacher/teacher_footer');
    }

        public function assign_roll_section()
    {

         $section = $this->input->post('section');
         $std_id = $this->input->post('std_id');

         $this->login_model->update_section('admission',$section,$std_id);
    }

        public function assign_roll()
    {
        $roll=$this->input->post('roll');
        $std_id=$this->input->post('std_id');
        $all_data= $this->login_model->std_detail($std_id);
        $sec_std=$all_data[0]['std_section'];
        $sec_class=$all_data[0]['std_class'];
        $all_detail= $this->login_model->std_compare_detail($sec_std,$sec_class);
        $i=0;
        foreach ($all_detail as $key) {

        if($roll==$key['std_roll_no'] && $roll!='')
        {
        $i++;
        }
        }

        if($i!=0 && $roll!='')
        {
        echo "already exist";
        }
         else       
        {
          $this->login_model->update_roll('admission',$roll,$std_id);
          echo "inserted";


        }
    }
        public function exam_detail()
    {
        $class['class_data'] =  $this->login_model->class_fetch();
        $result_exam['exam_data'] = $this->login_model->exam_fetch();
        $all_subject['subject'] = $this->login_model->all_subject();

        $this->load->view('teacher/teacher_header',$all_subject);
        $this->load->view('teacher/teacher_sidebar',$result_exam);
        $this->load->view('teacher/exam_detail',$class);
        $this->load->view('teacher/teacher_footer');
    }
        public function exam_add()
    {

        $add_exam = array(
        'class_section' => $this->input->post('class_section'),
        'subject' => $this->input->post('subject'),
        'exam_type' => $this->input->post('exam_type'),
        'exam_date' => $this->input->post('exam_date'),
        'exam_start_time' => $this->input->post('exam_start_time'),
        'exam_end_time' => $this->input->post('exam_end_time'),
        'class_id' => $this->input->post('class_id'),
        'max_mark' => $this->input->post('max_mark'));
        $this->login_model->insert_data('exam_detail',$add_exam);
        redirect('teacher_controller/exam_detail');
    }
        public function exam_delete()
    {
        $exam_id = $this->uri->segment(3);
        $this->login_model->exam_remove($exam_id);
        redirect('teacher_controller/exam_detail');
    }
        public function add_notice()
    {
            $notice_data['notice'] = $this->login_model->notice_get();
            $this->load->view('teacher/teacher_header');
            $this->load->view('teacher/teacher_sidebar');
            $this->load->view('teacher/add_notice',$notice_data);
            $this->load->view('teacher/teacher_footer');
        }
        public function add_new_notice()
    {
        $date = date('Y-m-d H:i:s');
            $insert_notice = array(
        'notice_name' => $this->input->post('notice_name'),
        'notice_date' => $this->input->post('notice_date'),
        'remove_date' => $this->input->post('remove_date'),
        'notice_desc' => $this->input->post('notice_desc'),
        'submit_by' => $this->input->post('submit_by'),
        'submit_date' =>$date);
        $this->login_model->insert_data('add_notice',$insert_notice);
        redirect('teacher_controller/add_notice/');
        }
        public function notice_delete()
    {
            $notice_id = $this->uri->segment(3);
            $this->login_model->notice_remove($notice_id);
            redirect('teacher_controller/add_notice');
    }
        public function all_staff()
    {
        $all_teacher['teacher'] = $this->login_model->all_staff();
            $this->load->view('teacher/teacher_header');
            $this->load->view('teacher/teacher_sidebar');
            $this->load->view('teacher/staff_record',$all_teacher);
            $this->load->view('teacher/teacher_footer');

    }
        public function staff_delete()
    {
            $staff_id = $this->uri->segment(3);
            $this->login_model->staff_remove($staff_id);
            redirect('teacher_controller/all_staff');
    }
        public function time_table()
    {
            $class_name=$this->input->post('class_name');
            $class_section=$this->input->post('class_section');

            $table_fetch['table_fetch']=$this->login_model->time_table_fetch($class_name,$class_section);
            
            $class['all_class']=$this->login_model->all_class();
            $this->load->view('teacher/teacher_header',$fetch);
            $this->load->view('teacher/teacher_sidebar',$table_fetch);
            $this->load->view('teacher/time_table',$class);
            $this->load->view('teacher/teacher_footer');
    }

        
     
        public function time_table_select()
    {
            $class_sel= $this->input->post('class');
            $class_id['class_sub']=$this->login_model->all_sub($class_sel);
            ?>
            <select class="form-control">
            <option value="">select</option> 
            <?php
            foreach ($class_id['class_sub'] as $key) {
            ?>
            <option value="<?php echo $key['sub_name'];?>">
            <?php echo $key['sub_name'];?></option><?php
            }
            ?>
            </select>
            <?php
    }


        public function time_table_insert()
    {

            $time_table_insert = array(
            'subject' => $this->input->post('subject'),
            'class' => $clas=$this->input->post('clas'),
            'class_section' => $this->input->post('section'),
            'class_end_time' => $clas=$this->input->post('end'),
            'class_start_time' => $this->input->post('start'),
            'day' => $clas=$this->input->post('day')
            );

            $this->login_model->insert_data('class_time_table',$time_table_insert);
    }



        public function time_table_end()
    {

             $subject=$this->input->post('subject');
             $clas=$this->input->post('clas');
             $section=$this->input->post('section');
             $end=$this->input->post('end');
             $start=$this->input->post('start');
             $day=$this->input->post('day');

            $count_exist=$this->login_model->select_time_table_fetch($clas,$section,$end,$start);

            print_r($count_exist);
            if($count_exist!='')
        {
            $subject=$this->input->post('subject');
            $clas=$this->input->post('clas');
            $section=$this->input->post('section');
            $end=$this->input->post('end');
            $start=$this->input->post('start');
            $day=$this->input->post('day');
            $this->login_model->update_dat('class_time_table',$subject,$day,$start,$end);

        }
        else
        {
            $time_table_insert = array(
            'class_end_time' => $this->input->post('end'),
            'class' => $this->input->post('clas'),
            'class_section' => $this->input->post('section'),
            'class_start_time' => $this->input->post('start')
            );

            $this->login_model->insert_data('class_time_table',$time_table_insert);
        }
    }

        public function update_exam_detail()
    {
            $value=$this->input->post('value');
            $hid=$this->input->post('hid');
            $ids=$this->input->post('ids');
            $this->login_model->update_exam_detail($value,$hid,$ids);
    }
        public function value_subject()
    {
            $class_value=$this->input->post('value');
            $value_sub['value_sub']=$this->login_model->value_subject($class_value);
            ?>
            <select class="form-control">
            <option value="">select</option> 
            <?php
            foreach ($value_sub['value_sub'] as $key) {
            ?>
            <option value="<?php echo $key['sub_name'];?>">
            <?php echo $key['sub_name'];?></option><?php
            }
            ?>
            </select>
            <?php
    }

        public function update_asn_tec()
    {
            $value=$this->input->post('value');
            $hid=$this->input->post('hid');
            $id=$this->input->post('ids');
            $this->login_model->update_asn_tec($value,$hid,$id);
    }
        public function class_record_sub()
    {
            $uristring1 =$this->input->post('uristring');
            $value_sub1['value_sub1']=$this->login_model->value_subject($uristring1);
            ?>
            <select class="form-control">
            <option value="">select</option> 
            <?php
            foreach ($value_sub1['value_sub1'] as $key) {
            ?>
            <option value="<?php echo $key['sub_name'];?>">
            <?php echo $key['sub_name'];?></option><?php
            }
            ?>
            </select>
            <?php

    }

        public function class_record_section()
    {
            $uristring1 =$this->input->post('uristring');
            $value_sub5['value_sub5']=$this->login_model->value_class_sec($uristring1);
            ?>
            <select class="form-control">
            <option value="">select</option> 
            <?php
            foreach ($value_sub5['value_sub5'] as $key) {
            ?>
            <option value="<?php echo $key['class_section'];?>">
            <?php echo $key['class_section'];?></option><?php
            }
            ?>
            </select>
            <?php

    }

        public function class_record_exam_type()
    {
            $sub =$this->input->post('sub');
            $clss =$this->input->post('clss');
            $secc =$this->input->post('secc');
            $value_sub6['value_sub6']=$this->login_model->class_record_exam_type($sub,$clss,$secc);
            ?>
            <select class="form-control">
            <option value="">select</option> 
            <?php
            foreach ($value_sub6['value_sub6'] as $key) {
            ?>
            <option value="<?php echo $key['exam_type'];?>">
            <?php echo $key['exam_type'];?></option><?php
            }
            ?>
            </select>
            <?php

    }
        public function class_record_exam_date()
    {
     
            $clss =$this->input->post('clss');
            $secc =$this->input->post('secc');
            $sub =$this->input->post('sub');
            $xam =$this->input->post('xam');

            $value_sub7['value_sub7']=$this->login_model->class_record_exam_date($clss,$secc,$sub,$xam);
            ?>
                   <select class="form-control">
            <option value="">select</option> 
            <?php
            foreach ($value_sub7['value_sub7'] as $key) {
            ?>
            <option value="<?php echo $key['exam_date'];?>">
            <?php echo $key['exam_date'];?></option><?php
            }
            ?>
            </select>
            <?php

    }
        public function class_record_exam_id()
    {
   
            $clss =$this->input->post('clss');
            $secc =$this->input->post('secc');
            $sub =$this->input->post('sub');
            $xam =$this->input->post('xam');
            $dat =$this->input->post('dat');

            $value_sub8['value_sub8']=$this->login_model->class_record_exam_id($clss,$secc,$sub,$xam,$dat);

             echo $value_sub8['value_sub8']['exam_id'];
     
    }
    
    
        public function all_section()
    {
            $cls_all = $this->input->post('class3');
            $data_sec['sec'] = $this->login_model->all_sec($cls_all);
            ?>
            <select class="form-control" id="sec_get">
            <option>Select</option>
            <?php foreach ($data_sec['sec'] as $key) {?>
            <option value="<?php echo $key['class_section']; ?>"><?php echo $key['class_section']; ?></option> <?php } ?>
            </select>
            <?php

    }

        public function attendance_report()
    {
        
        $sellect_date = $this->input->post('date_select');
        $this->session->set_userdata('date_flash',$sellect_date);

        $select_class = $this->session->userdata('cls');
        $select_sec = $this->session->userdata('sect');

        $stf_id = $this->session->userdata('stfdata');
         $class['incharge_data']=$this->login_model->class_fetch3($stf_id);
         $class['all_class'] = $this->login_model->all_class();
        $class['class_data'] = $this->login_model->class_fetch1($sellect_date,$select_class,$select_sec,$stf_id);

        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar',$sellect_date);
        $this->load->view('teacher/attendance_report',$class);
        $this->load->view('teacher/teacher_footer');
      
    }
        public function stu_ajx_fetch()
        {
            $cls_all = $this->input->post('class3');
            
            $sec_all = $this->input->post('sec3');
            $data_stu['all_std'] = $this->login_model->all_std($cls_all,$sec_all);
            $this->session->set_flashdata('in',$data_stu);
            $this->session->set_userdata('cls',$cls_all);
            $this->session->set_userdata('sect',$sec_all);
            $this->load->view('teacher/attendance_report');
            
            
        }
        public function stu_attandance_set()
        { 
            $select_date = $this->session->userdata('date_flash',$sellect_date);
            $classs = $this->session->userdata('cls');
            $section = $this->session->userdata('sect');
            $id = $this->input->post('id');
            $name = $this->input->post('std_name');
            $roll_no = $this->input->post('std_roll_no');
        
            foreach ($id as $key => $value) {
        
            $chk_data[] = $this->input->post('chk'.$value);
            }
            $stat = array_combine($id, $chk_data);

            $this->login_model->set_attendance($name,$roll_no,$id,$classs,$section,$stat,$select_date);

            redirect('teacher_controller/attendance_report');
        }

        public function marks()
        {
           $stf_id = $this->session->userdata('stfdata');

           $class['class_data']=$this->login_model->class_fetch();
           $class['incharge_data']=$this->login_model->class_fetch3($stf_id);
           foreach ($class['incharge_data'] as $key => $value)
            {
                $incharge_id = $value[0]['class_incharge'];
               $class_name = $value[0]['class_name'];
               $class_section = $value[0]['class_section'];
            }

            $class['subject_name'] = $this->login_model->class_fetch4($class_name,$class_section);

           $this->load->view('teacher/teacher_header');
           $this->load->view('teacher/teacher_sidebar');
           $this->load->view('teacher/marks',$class);
           $this->load->view('teacher/teacher_footer');
        }

        public function class_record()
        {
           $uristring = $this->input->post('secc');
           $clss = $this->input->post('clss');
           $this->session->set_userdata('sec',$uristring);
           $this->session->set_userdata('cls',$clss);
           $result_std["result_std"] = $this->login_model->std_fetch($uristring,$clss);
           $this->session->set_userdata('all_student',$result_std);
               
           $class_id = $this->input->post('clss');
           $class_section = $this->input->post('secc');
           $xam_date = $this->input->post('xam_date');
           $exam_type = $this->input->post('xam');
           $subject = $this->input->post('sub');

           foreach ($result_std["result_std"] as $key)
        {
           $std_id=$key['std_id'];
           $result_mark["result_mark"]=$this->login_model->std_marks($class_id,$class_section,$subject,$exam_type,$xam_date,$std_id);
        // print_r($result_mark["result_mark"][0]['marks_obtain']);
           $result['marks']=$result_mark["result_mark"][0]['marks_obtain'];
           $row[] = $result_mark["result_mark"];    
        } 
           $this->session->set_userdata('markss',$row); 

           $this->load->view('teacher/admin_footer');
           return $result_std;

        }

        public function fetchname()
        {
           $name = $this->input->post();
           $fet_names=$this->login_model->fetch_names($name['nameid']);
           $this->session->set_userdata('fet_name',$fet_names);
            // print_r($fet_names);
           redirect('teacher_controller/marks');
        }
        public function add_classes()
        {
            $add_classes = array(
               'class_name' => $this->input->post('class_name'),
            'class_section' => $this->input->post('class_section')

            );

            $class_name=$this->input->post('class_name');
            $class_section=$this->input->post('class_section');
            $class_exist=$this->login_model->class_exist($class_name,$class_section);
            if($class_exist==0)
              {
            $this->login_model->insert_data('add_class',$add_classes);
             
              redirect('teacher_controller/add_class');
              }
              else
                {
                redirect('teacher_controller/add_class/error');
                }   
        }
        public function marks_stored()
        {  
              $data_mak = array(
              'class_id'=>$this->input->post('class_id'),
              'class_section'=>$this->input->post('class_section'),
              'subject'=>$this->input->post('subject'),
              'exam_type'=>$this->input->post('exam_type'),
              'exam_date'=>$this->input->post('exam_date'),
              'exam_id'=>$this->input->post('exam_id')
              
               );
            $markss= $this->session->set_userdata('makks',$data_mak);

            // $this->session->set_userdata($data_admin);
     
            redirect('teacher_controller/marks');
     
        }

        public function class_marks_insert()
        {
            $class_id = $this->input->post('class_id');
            $class_section = $this->input->post('class_section');
            $marks_obtain = $this->input->post('marks_obtain');
            $std_id = $this->input->post('std_id');
            $exam_type = $this->input->post('exam_type');
            $exam_id = $this->input->post('exam_id');
            $batch = $this->input->post('batch');
            $subject = $this->input->post('subject');

            $add_class_marks = array(
            'class_id' => $this->input->post('class_id'),
            'class_section' => $this->input->post('class_section'),
            'marks_obtain' => $this->input->post('marks_obtain'),
            'std_id' => $this->input->post('std_id'),
            'exam_type' => $this->input->post('exam_type'),
            'exam_id' => $this->input->post('exam_id'),
            'batch' => $this->input->post('batch'),
            'subject' => $this->input->post('subject')
            );

            $select_marks=$this->login_model->select_marks($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject);
            if($select_marks!='')
            {
                $this->login_model->update_marks($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject,$marks_obtain);
            echo "updated";
            }
            else
            {
            $this->login_model->insert_marks('student_marks',$add_class_marks);
            echo "inserted";

            }
        }
        public function authority()
        {
           $all_teacher['teacher'] = $this->login_model->all_staff();
           $this->load->view('teacher/teacher_header');
           $this->load->view('teacher/teacher_sidebar');
           $this->load->view('teacher/authorities',$all_teacher);
           $this->load->view('teacher/teacher_footer');
        }
        public function assign_authority()
        {
             $this->input->post('stf_id');
            // die();
            $authority_data=array(
            'staff_id'=>$this->input->post('selected_staff'),
            'notes'=>$this->input->post('notes'),
            'assignment'=>$this->input->post('assignment'),
            'attendance'=>$this->input->post('attendance'),
            'subject'=>$this->input->post('subject'),
            'add_class'=>$this->input->post('add_class'),
            'class_incharge'=>$this->input->post('class_incharge'),
            'marks'=>$this->input->post('marks'),
            'assign_sub_class'=>$this->input->post('assign_sub_class'),
            'assign_sec_roll_no'=>$this->input->post('assign_sec_roll_no'),
            'exam'=>$this->input->post('exam'),
            'time_table'=>$this->input->post('time_table'),
            'notice'=>$this->input->post('notice'),
            'event'=>$this->input->post('event'),
            'student'=>$this->input->post('stu_detail'),
            'student'=>$this->input->post('stf_detail'),
            'fees'=>$this->input->post('fees'),
            'leave_detail'=>$this->input->post('leave_detail'),
            'sailary'=>$this->input->post('sailary'),
                );
            $this->login_model->authority_set($authority_data);
            redirect('teacher_controller/authority');
            
        }
        public function authority_stf()
        {
             $stf_id = $this->input->post('stf_id');

            $stf_name = $this->login_model->stf_name($stf_id);
            $this->session->set_flashdata('stf_name',$stf_name);

            $stf_auth = $this->login_model->authority_check($stf_id);
            $this->session->set_flashdata('stf_data',$stf_auth);

        }
        public function authority_change()
        {
            echo $stf_id = $this->uri->segment(3);

            $authority_data=array(
            'staff_id'=>$this->input->post('selected_staff'),
            'notes'=>$this->input->post('notes'),
            'assignment'=>$this->input->post('assignment'),
            'attendance'=>$this->input->post('attendance'),
            'subject'=>$this->input->post('subject'),
            'add_class'=>$this->input->post('add_class'),
            'class_incharge'=>$this->input->post('class_incharge'),
            'marks'=>$this->input->post('marks'),
            'assign_sub_class'=>$this->input->post('assign_sub_class'),
            'assign_sec_roll_no'=>$this->input->post('assign_sec_roll_no'),
            'exam'=>$this->input->post('exam'),
            'time_table'=>$this->input->post('time_table'),
            'notice'=>$this->input->post('notice'),
            'event'=>$this->input->post('event'),
            'student'=>$this->input->post('stu_detail'),
            'staff'=>$this->input->post('stf_detail'),
            'fees'=>$this->input->post('fees'),
            'leave_detail'=>$this->input->post('leave_detail'),
            'sailary'=>$this->input->post('sailary'),
                );
            $this->login_model->authority_update($authority_data,$stf_id);
            redirect('teacher_controller/authority');
        }


        // navita data teacher profile update start
        public function stf_pro_img_update()
{   
         
        $stf_id = $this->uri->segment(3);

        $config = array(
        'upload_path' => "application/assets/uploads",
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => 'TRUE',
        'max_size' => "204800",
        'max_height' => "768",
        'max_width' => "1024"
        );
       if(! is_dir($config['upload_path'])) die("path not exits");
        {
        $this->load->library('upload', $config);
        $this->upload->do_upload('stf_image');
        $img = $this->upload->data();
     
        $stf_img = array('stf_image' => $img['file_name']);
      
        $this->teacher_model->stf_img_update($stf_img,$stf_id);
        redirect('teacher_controller/staff_profile');
           
}
}

        public function stf_data()
{  
        
         $stf_id = $this->uri->segment(3);
         $data  = array('stf_mobile' => $this->input->post('stf_mobile'),
                    'stf_address' => $this->input->post('stf_address') 
                   );

          $this->teacher_model->stf_data_update($data,$stf_id);
          redirect('teacher_controller/staff_profile');

}
        // end
        // navita data start HR PAYROLL
        public function fee_detail()
    {
        $all_subject['subject'] = $this->login_model->all_subject();
      $class['class_data'] =   $this->login_model->class_fetch();
      $class1['fetch_fees'] =  $this->login_model->fetch_fee_data();
        $this->load->view('teacher/teacher_header',$all_subject);
        $this->load->view('teacher/teacher_sidebar',$class);
        $this->load->view('teacher/fees_detail',$class1);
        $this->load->view('teacher/teacher_footer');
    }
         public function student_fee_detail()
    {
      $class['class_data'] = $this->login_model->class_fetch();
      $class['fetch_sfee_data'] = $this->login_model->fetch_std_fee_data();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar',$class);
        $this->load->view('teacher/student_fee_detail');
        $this->load->view('teacher/teacher_footer');

    }
         public function leave_detail()
    {
        $leave_data['leave_dtl'] = $this->login_model->leave_detail_fetch();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/leave_detail',$leave_data);
        $this->load->view('teacher/teacher_footer');

    }
         public function staff_sailary_detail()
    {
        $sailary_data['sailary_dtl'] = $this->login_model->staff_sailary_fetch();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/staff_sailary_detail',$sailary_data);
        $this->load->view('teacher/teacher_footer');

    }

        public function fee_info_add()
    {

        $data = array(
           'class'=>$this->input->post('class'),
           // 'course'=>$this->input->post('course'),
           'fees_type'=>$this->input->post('fees_type'), 
           'fees_category'=>$this->input->post('fees_category'), 
           'ammount'=>$this->input->post('ammount'),
           'late_payment'=>$this->input->post('late_payment')

          );
        $this->login_model->insert_data('fees_detail',$data);
        redirect('teacher_controller/fee_detail');
    }


        public function student_fee_add()
    {
                $data = array(
              'std_id'=>$this->input->post('std_id'),
              'month'=>$this->input->post('month'),
              'year'=>$this->input->post('year'),
              'paid'=>$this->input->post('paid'),
              'pending'=>$this->input->post('pending'),
              'fees'=>$this->input->post('fees'),
              'class'=>$this->input->post('class')
              

                 );
          $this->login_model->insert_data('student_fees_detail',$data);
          redirect('teacher_controller/student_fee_detail');
    }


        public function staff_sailary_add()
    {
                $data = array(

                'stf_id'=>$this->input->post('stf_id'),
                'stf_sailary'=>$this->input->post('stf_sailary'),
                'sailary_month'=>$this->input->post('sailary_month'),
                'sailary_year'=>$this->input->post('sailary_year'),
                'pay_mode'=>$this->input->post('pay_mode'),
               );

               $this->login_model->insert_data('staff_sailary_detail',$data);
               redirect('teacher_controller/staff_sailary_detail');

    }


        public function leave_info_add()
   {
    
            $data = array(
            'std_id'=> $this->input->post('std_id'),
             'stf_id'=> $this->input->post('stf_id'),
             'leave_message'=> $this->input->post('leave_message'),
             'approve_status'=>$this->input->post('approve_status'),
             'from_date'=>$this->input->post('from_date'),
             'to_date'=>$this->input->post('to_date'),
             
             'leave_type'=>$this->input->post('leave_type')
              );
            $this->login_model->insert_data('leave_detail',$data);
            redirect('teacher_controller/leave_detail');

    }
 // navita data end

//====================== for teacher leave =============//

public function teacher_leave()
    {  

         $id = $this->session->userdata('stf_data');
         $stf_id = $id[0]['stf_id'];
         $teacher_leave_data['teacher_leave'] = $this->teacher_model->fetch_teacher_leave($stf_id);
        $category_data['fetch_cat'] = $this->teacher_model->fetch_category();
       $request_data['request'] = $this->teacher_model->fetch_student_leave_request($stf_id);
  
        $this->load->view('teacher/teacher_header',$request_data);
         $this->load->view('teacher/teacher_sidebar',$teacher_leave_data);
         $this->load->view('teacher/teacher_leave',$category_data);
         $this->load->view('teacher/teacher_footer');
    }
public function add_teacher_leave()

{     
           $id_std =$this->uri->segment(3);

          
  //=== =========17-11-2107 work=======================================//
            $strt_date = new DateTime($this->input->post('from_date'));
            $end_date = new DateTime($this->input->post('to_date'));
            $end_date->modify('+1 day');
            $diff = $strt_date->diff($end_date);
            $total = $diff->days;
  //====================== end 17-11-2107==================//


          
             $sf_id = $this->session->userdata('stf_data');
             $id = $this->session->userdata('std_array');

             $roll_no = $id['data'][0]['std_roll_no'];
             $name  = $id['data'][0]['std_fname'];
             $last  = $id['data'][0]['std_lname'];
             $class = $id['data'][0]['std_class'];
             $section = $id['data'][0]['std_section'];
             $t_id = $this->teacher_model->get_teacher_id($class,$section); 
             $get_id =  $t_id[0]['class_incharge'];
             

           

          $submit_type = $this->input->post('submit');
          if($submit_type == 'teacher')  
             {  
                $table = 'teacher_leave';
                $staff_id = 'stf_id';
                $stf_id = $sf_id[0]['stf_id'];

              $data = array(
                         'leave_category'=>$this->input->post('leave_category'),
                        'designation'=>$this->input->post('designation'),
                        'from_date'=>$this->input->post('from_date'),
                        'to_date'=>$this->input->post('to_date'),
                         
                        'message'=>$this->input->post('message'),
                         $staff_id => $stf_id
                           );
             }
            elseif($submit_type == 'student')
             {
                $table = 'student_leave';
                $staff_id = 'std_id';
                $stf_id = $id_std;

                
             
            
              $data = array(
                         'roll_no'=> $roll_no,
                         'name'=>$name." ".$last,
                         'class'=> $class,
                         'section'=> $section,
                         'incharge_id'=> $get_id,
                         'leave_category'=>$this->input->post('leave_category'),
                        'designation'=>$this->input->post('designation'),
                        'from_date'=>$this->input->post('from_date'),
                        'to_date'=>$this->input->post('to_date'),
                        'leave_count'=>$total, //=== 17-11-2107 work=====//
                        'message'=>$this->input->post('message'),
                         $staff_id => $stf_id
                           );
         }
                  

                   $url_redirect = $this->input->post('url');
                 
                   $this->teacher_model->insert_teacher_leave($table,$data);
                   redirect($url_redirect );
//====================== end teacher leave ===================================//
}
      public function student_leave_request_form()
              {

                 $st_id = $this->session->userdata('stf_data');
                 $stf_id = $st_id[0]['stf_id'];
                 $leave_req['request'] = $this->teacher_model->fetch_student_leave_request($stf_id);
                 $this->session->set_userdata('message',$leave_req['request']);
                 $req_count = $this->teacher_model->std_lev_req_count($stf_id);
                 $count = $req_count[0]['count(*)'];
                 $this->session->set_userdata('count',$count);
                  

                 $this->load->view('teacher/teacher_header',$leave_req);
                 $this->load->view('teacher/teacher_sidebar');
                 $this->load->view('teacher/student_leave_request_form');
                 $this->load->view('teacher/teacher_footer');
              }
         public function std_leave_approval()
         {
            $std_leav_id = $this->input->post('student_leave_id');
            $std_id = $this->input->post('std_id');
            $submit_type = $this->input->post('submit');
            if($submit_type == 'approve'){
                $aprovel = 1;
            }
            else
            {
                $aprovel = 2;
            }
           
           
            $this->teacher_model->approve_std_leave($std_leav_id,$std_id,$aprovel);
            $this->student_leave_request_form();
         }     

}


 ?>