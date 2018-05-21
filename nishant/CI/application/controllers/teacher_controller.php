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
  $this->load->helper('directory');
  $this->load->library("pagination");
  $this->load->helper('string');
}
public function index()
{
$this->load->view('teacher/login');
}
public function add_user()
{
$class['fetch_designation'] = $this->login_model->fetch_designation();
$class['class_data'] =   $this->login_model->class_fetch();
$staff_pro = $this->session->userdata('stf_data');
$staff_analysis = $staff_pro[0]['stf_id'];
$class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
$add_userr=explode(',',$class['role_autho'][0]['add_user']);
$this->session->set_userdata('add_userrr',$add_userr);

$this->load->view('teacher/teacher_header',$class);
$this->load->view('teacher/teacher_sidebar',$class);
$this->load->view('teacher/teacher_footer');
$this->load->view('teacher/add_user',$class);
}
public function user_listed()
{
$num[0]='admission';
$num[1]='staff';
$num[2]='parrent_detail';
$arr_name['a'][0]=array(
  'std_fname' => $this->input->post('std_fname'),
   'std_class' => $this->input->post('std_class'),
   'std_section' => $this->input->post('std_section'),
   'std_roll_no' => $this->input->post('std_roll_no'),
    'std_email' => $this->input->post('std_email')
  );
$arr_name['a'][1]=array(
  'stf_fname' => $this->input->post('stf_fname'),
   'stf_email' => $this->input->post('stf_email'),
   'stf_mobile' => $this->input->post('stf_mobile'),
   'stf_designation' => $this->input->post('stf_designation')
  );
$arr_name['a'][2]=array(
  'father_name' => $this->input->post('father_name'),
   'mother_name' => $this->input->post('mother_name'),
   'father_email' => $this->input->post('father_email'),
   'mother_email' => $this->input->post('mother_email'),
   'std_id' => $this->input->post('std_id')
  );
$arr_name['active'] =  $this->input->post('active');
$arr_name['active1'] = $this->uri->segment(3);

for($i=0;$i<count($num);$i++)
{
  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/user_listed";
  $config["total_rows"] = $this->login_model->record_count1($num[$i],$arr_name['a'][$i]);
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results".$i] = $this->login_model->fetch_departments1($config["per_page"],$page,$num[$i],$arr_name['a'][$i]);
  $data["links".$i] = $this->pagination->create_links();
 }
$staff_pro = $this->session->userdata('stf_data');
$staff_analysis = $staff_pro[0]['stf_id'];
$data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
  $this->load->view('teacher/teacher_header',$data);
  $this->load->view('teacher/teacher_sidebar',$arr_name);
  $this->load->view('teacher/teacher_footer');
  $this->load->view('teacher/user_listed',$data);
  }
// transport details
public function add_vehicle()
        {
        $v_id = $this->uri->segment(3);
        $vehicle_data['vehicle_update'] = $this->login_model->select_update_data('vehicle_detail','vehicle_id',$v_id);

        $vehicle_data['vehicle'] = $this->login_model->vehicle_details_fetch();
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $vehicle_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/add_vehicle',$vehicle_data);
        $this->load->view('teacher/teacher_footer');
        }
    public function add_driver()
        {
 $driver_id = $this->uri->segment(3);
 $driver_data['driver_update'] = $this->login_model->select_update_data('add_driver','driver_id',$driver_id);
 $driver_data['particular'] = $this->login_model->particular_driver($driver_id);
 $driver_data['driver'] = $this->login_model->all_driver();
 $driver_data['vehicle'] = $this->login_model->vehicle_details_fetch();
 $driver_data['driver_detl'] = $this->login_model->driver_fetch();
 $driver_data['rute'] = $this->login_model->rute_details_fetch();
 $staff_pro = $this->session->userdata('stf_data');
 $staff_analysis = $staff_pro[0]['stf_id'];
 $driver_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/teacher_footer');
        $this->load->view('teacher/add_driver',$driver_data);
        }  
         public function add_rute()
        {
        $r_id = $this->uri->segment(3);
        $rute_data['rute_update'] = $this->login_model->select_update_data('rute_detail','rute_id',$r_id);
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $rute_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        $rute_data['vehicle'] = $this->login_model->vehicle_details_fetch();
        $rute_data['rute'] = $this->login_model->rute_details_fetch();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/add_rute',$rute_data);
        $this->load->view('teacher/teacher_footer');
        }  
        public function add_destination()
        {
          $dest_id = $this->uri->segment(3);
        $destination['destination_update'] = $this->login_model->select_update_data('add_destination','destination_id',$dest_id);
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $destination['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        $destination['vehicle'] = $this->login_model->vehicle_details_fetch();
        $destination['rute'] = $this->login_model->rute_details_fetch();
        $destination['fees_type'] =  $this->login_model->fetch_fee_data();
        $destination['destination'] =  $this->login_model->destination_details_fetch();

        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/add_destination',$destination);
        $this->load->view('teacher/teacher_footer');
        }

    public function Add_category_library()
    {
    $staff_pro = $this->session->userdata('stf_data');
    $staff_analysis = $staff_pro[0]['stf_id'];
    $data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
    $data['librarycategory'] = $this->login_model->all_data_all('librarycategory');
    $this->load->view('teacher/teacher_header');
    $this->load->view('teacher/teacher_sidebar');
    $this->load->view('teacher/Library/library_category',$data);
    $this->load->view('teacher/teacher_footer');
    }
   public function Add_books(){

    $data['book_add'] = $this->login_model->fetch_data_book();
    $data['librarycategory'] = $this->login_model->all_data_all('librarycategory');
    $classes = $this->login_model->all_data_all('add_class');
    $bookcategory = $this->login_model->all_data_all('librarycategory');
    $combine_data['all'] = array(
            'class' => $classes,
            'category' => $bookcategory
    );
    $staff_pro = $this->session->userdata('stf_data');
    $staff_analysis = $staff_pro[0]['stf_id'];
    $data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
    $this->load->view('teacher/teacher_header', $data);
    $this->load->view('teacher/teacher_sidebar');
    $this->load->view('teacher/Library/add_books', $combine_data);
    $this->load->view('teacher/teacher_footer');
}
public function Books_request($Books_request=''){
    $librarycategory = $this->login_model->all_data_all('librarycategory');
    $classes = $this->login_model->all_data_all('add_class');
    $book_add = $this->login_model->all_data_all('addbooks');
    $book_issued_student = $this->login_model->all_data_all('addrequest');
    $combine_data['all'] = array(
            'class' => $classes,
            'Title' => $book_add,
            'category' => $librarycategory,
            'msg' => $Books_request,
            'book_issued_student' => $book_issued_student
    );
    $staff_pro = $this->session->userdata('stf_data');
    $staff_analysis = $staff_pro[0]['stf_id'];
    $combine_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
    $this->load->view('teacher/teacher_header');
    $this->load->view('teacher/teacher_sidebar');
    $this->load->view('teacher/Library/book_request' , $combine_data);
    $this->load->view('teacher/teacher_footer');
}
public function Books_return(){
    $classes = $this->login_model->all_data_all('add_class');
    $rollno = $this->login_model->all_data_all('addrequest');
    $combine_data['all'] = array(
            'class' => $classes,
            'RollNo' => $rollno,
            
    );
    $staff_pro = $this->session->userdata('stf_data');
    $staff_analysis = $staff_pro[0]['stf_id'];
    $combine_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
    $this->load->view('teacher/teacher_header');
    $this->load->view('teacher/teacher_sidebar');
    $this->load->view('teacher/Library/book_return', $combine_data);
    $this->load->view('teacher/teacher_footer');
}
public function book_return(){

  $insert = array(
'Class' => $this->input->post('Class'),
'Section' => $this->input->post('Section'),
'RollNo' => $this->input->post('Roll_No'),

  );


  $this->login_model->fetch_data('addrequest',$insert);
redirect('teacher_controller/Books_return');
}

public function getcalsslibrary(){
    $class = $this->input->post('click_value');
    $classvalue = $this->login_model->all_dep_stf('add_class' ,$class, 'class_name');

      echo json_encode($classvalue);
}

public function getcatgorylibrary(){
    $class = $this->input->post('author');
    $classvalue1 = $this->login_model->all_dep_stf('addbooks' ,$class, ' BookCategory');

      echo json_encode($classvalue1);
}

public function getrolllibrary(){
   $section = $this->input->post('class_section');
   $class = $this->input->post('class');
   $class_data_section = $this->login_model->class_roll_lib('admission' ,$class, $section, 'std_class', 'std_section');
      echo json_encode($class_data_section);

}

public function getauthorlibrary(){
   $section = $this->input->post('catgory');
   $class = $this->input->post('class');
   $class_data_section1 = $this->login_model->class_roll_lib('addbooks' ,$class, $section, 'BookCategory', 'Author');
      echo json_encode($class_data_section1);

}


public function getbooklibrary(){
   $section = $this->input->post('section');
   $class = $this->input->post('class');
   $roll_no = $this->input->post('RollNo');

   $class_data_section2 = $this->login_model->issue_roll_book('addrequest' ,$class, $section, $roll_no, 'Class', 'Section' , 'RollNo');

      echo json_encode($class_data_section2);

}
public function get_publisher(){
   $book_cat = $this->input->post('book_cat');
   $book_auth = $this->input->post('book_auth');
   $title = $this->input->post('title');
   $data = $this->login_model->issue_roll_book('addbooks' ,$book_cat, $book_auth, $title,'BookCategory', 'Author' , 'Title');

      echo json_encode($data);

}
public function getbookedition(){
   $book_cat = $this->input->post('book_cat');
   $book_auth = $this->input->post('book_auth');
   $title = $this->input->post('title');
   $Publisher = $this->input->post('publisher');
   $data = $this->login_model->editiondet('addbooks' ,$book_cat, $book_auth, $title,$Publisher,'BookCategory', 'Author' , 'Title', 'Publisher');

      echo json_encode($data);

}
public function Import_library(){

    $this->load->view('teacher/teacher_header');
    $this->load->view('teacher/teacher_sidebar');
    $this->load->view('teacher/Library/import_libb');
    $this->load->view('teacher/teacher_footer');
}
public function Library_reports(){

    $this->load->view('teacher/teacher_header');
    $this->load->view('teacher/teacher_sidebar');
    $this->load->view('teacher/Library/reports');
    $this->load->view('teacher/teacher_footer');
}
    public function transport_allocate()
        {
        $t_id = $this->uri->segment(3);
        $transport['trans_update'] = $this->login_model->select_update_data('transport_allocation','t_allocation_id',$t_id);

        $transport['rute'] = $this->login_model->rute_details_fetch();

        $transport['destination'] = $this->login_model->destination_details_fetch();

        $transport['cls_sec'] = $this->login_model->class_fetch();

        $transport['fetch_designation'] = $this->login_model->fetch_designation();

        $transport['allocate_fetch'] = $this->login_model->allocate_fetch();
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $transport['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/teacher_footer');
        $this->load->view('teacher/allocate_transport',$transport);
        }

  public function add_new_staff(){
    $confirm_code = random_string('alnum',7);
    $staff_data = array(
      'stf_doj' => $this->input->post('stf_doj'),
      'stf_dept' => $this->input->post('stf_dept'),
      'stf_designation' => $this->input->post('stf_designation'),
      'stf_qualification' => $this->input->post('stf_qualification'),
      'stf_experience' => $this->input->post('stf_experience'),
      'stf_fname' => $this->input->post('stf_fname'),
      'stf_lname' => $this->input->post('stf_lname'),
      'stf_dob' => $this->input->post('stf_dob'),
      'stf_gender' => $this->input->post('stf_gender'),
      'stf_pres_address' => $this->input->post('stf_pres_address'),
      'stf_perm_address' => $this->input->post('stf_perm_address'),
      'stf_city' => $this->input->post('stf_city'),
      'stf_phone' => $this->input->post('stf_phone'),
      'stf_mobile' => $this->input->post('stf_mobile'),
      'stf_email' => $this->input->post('stf_email'),
      'stf_password' => $confirm_code,
      'stf_country' => $this->input->post('stf_country')
      );
    $to_email = $staff_data['stf_email'];
    $subject = "WELCOME MEMBER";
    $message = 'WELCOME TO BECOME A MEMBER<br><table>
    <tr><td>Your Username:</td><td>'.$to_email.'</td></tr>
    <tr> <td>Your password: </td><td>'.$confirm_code.'</td></tr></table>';
    $from_email = 'er.sachingaun@gmail.com';
    $config = Array(
      'mailpath'=>'/usr/sbin/sendmail',
      'useragent' => 'CodeIgniter',
      'protocol' => 'mail', 
      'smtp_host' => 'ssl://smtp.gmail.com',
      'smtp_port' => '465',
      'smtp_user' => 'er.sachingaun@gmail.com',
      'smtp_pass' => 'sachin_150390',
      'mailtype' => 'html', 
      'smtp_timeout' => '5', 
      'charset' => 'iso-8859-1',
      'newline' => "\r\n",
      'wordwrap' => 'TRUE' 
      );
      $this->load->library('email',$config);
      $this->email->set_newline("\r\n");
      $this->email->from($from_email,'Anand');
      $this->email->subject($subject);
      $this->email->message($message);
      $this->email->to($to_email);
      $this->email->send();
      
      $this->login_model->insert_data('staff',$staff_data);
      redirect('teacher_controller/add_user');
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
'std_gender' => $this->input->post('std_gender'),
'std_nationality' => $this->input->post('std_nationality'),
'std_category' => $this->input->post('std_category'),
'std_religion' => $this->input->post('std_religion'),
'std_permanent_address' => $this->input->post('std_permanent_address'),
'std_father_name' => $this->input->post('std_father_name'),
'std_mother_name' => $this->input->post('std_mother_name'),
'std_guardian_name' => $this->input->post('std_guardian_name'),
'std_father_email' => $this->input->post('std_father_email'),
'std_mother_email' => $this->input->post('std_mother_email'),
'std_reg_date' => $this->input->post('std_reg_date'),
'std_guardian_email' => $this->input->post('std_guardian_email'),
'std_dob' => $this->input->post('std_dob'),
'std_address' => $this->input->post('std_address'),
'std_mobile' => $this->input->post('std_mobile'),
'std_batch' => $this->input->post('std_batch'),
'std_password'=>$confirm_code[0]);
$sql=$this->login_model->insert_data('admission',$data);
if($sql!=''){

   $authKey = "192400AYp4YbpPeO5a559dc6";
   $mobileNumber = $this->input->post('std_mobile');
   $senderId = "MSGIND";
    
    //Your message to send, Add URL encoding here.
    $message = urlencode("USERNAME=".$this->input->post('std_email').' && PASSWORD='.$confirm_code[0]);
    
    //Define route 
    $route = "4";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    
    //API URL
    $url="https://control.msg91.com/api/sendhttp.php";
    
    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    

    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    
    //get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    
    curl_close($ch);
    
    echo $output;


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
   'father_occupation' => $this->input->post('father_occupation'),
   'mother_occupation' => $this->input->post('mother_occupation'),
   'guardian_occupation' => $this->input->post('guardian_occupation'),
   'father_phone' => $this->input->post('father_phone'),
   'mother_phone' => $this->input->post('mother_phone'),
   'guardian_phone' => $this->input->post('guardian_phone'),
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
      'smtp_user' => 'er.sachingaun@gmail.com',
      'smtp_pass' => 'sachin_150390',
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
       $to_email[$i]=$email_exist[$i];
      }
    }

    for($i=0;$i<=3;$i++){
    $message = 'please check your update child '.$this->input->post('std_fname').'...!';
    $from_email = 'sachinraajvijay@gmail.com';
    $subject = 'Verify Your Email Address';
    $config = Array(
      'mailpath'=>'/usr/sbin/sendmail',
      'useragent' => 'CodeIgniter',
      'protocol' => 'mail', 
      'smtp_host' => 'ssl://smtp.gmail.com',
      'smtp_port' => '465',
      'smtp_user' => 'er.sachingaun@gmail.com',
      'smtp_pass' => 'sachin_150390',
      'mailtype' => 'html', 
      'smtp_timeout' => '5', 
      'charset' => 'iso-8859-1',
      'newline' => "\r\n",
      'wordwrap' => 'TRUE' 
      );
        $this ->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from($from_email,'Anand');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->to($to_email[$i]);
        $this->email->send();
}
 $to_email[0]=$data['std_email'];

  $message1 = 'WELCOME TO BECOME A MEMBER<br><table>
    <tr><td>Your Username:</td><td>'.$to_email[0].'</td></tr>
    <tr> <td>Your password: </td><td>'.$confirm_code[0].'</td></tr></table>';
    if($to_email[0]!=''){
      $config = Array(
      'mailpath'=>'/usr/sbin/sendmail',
      'useragent' => 'CodeIgniter',
      'protocol' => 'mail', 
      'smtp_host' => 'ssl://smtp.gmail.com',
      'smtp_port' => '465',
      'smtp_user' => 'er.sachingaun@gmail.com',
      'smtp_pass' => 'sachin_150390',
      'mailtype' => 'html', 
      'smtp_timeout' => '5', 
      'charset' => 'iso-8859-1',
      'newline' => "\r\n",
      'wordwrap' => 'TRUE' );
        $this ->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from($from_email,'Anand');
        $this->email->subject($subject);
        $this->email->message($message1);
        $this->email->to($to_email[0]);
        $this->email->send();
        }


        }
      }
      redirect('admission/add_user');
    }

   public function event_detail()
     {
  $event_data['cls_sec'] = $this->login_model->class_fetch();
  $event_data['event'] = $this->login_model->event_get();
  $event_data['event_details'] = $this->login_model->event_details();
  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/event_detail";
  $config["total_rows"] = $this->login_model->record_count('event_details');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'event_details');
  $data["links"] = $this->pagination->create_links();
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $event_data['role_autho'] = $this->teacher_model->role_autho($staff_analysis);
  $this->load->view('teacher/teacher_header');
  $this->load->view('teacher/teacher_sidebar',$data);
  $this->load->view('teacher/event_detail',$event_data);
  $this->load->view('teacher/teacher_footer');
     }
   
  public function participate_list()
  {
  $participation_list_detail['partilist'] = $this->login_model->participation_list();
   $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/participate_list";
  $config["total_rows"] = $this->login_model->record_count('event_participation');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'event_participation');
  $data["links"] = $this->pagination->create_links();
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $data['role_autho'] = $this->teacher_model->role_autho($staff_analysis);

  $this->load->view('teacher/teacher_header');
  $this->load->view('teacher/teacher_sidebar',$data);
  $this->load->view('teacher/teacher_footer');
  $this->load->view('teacher/participate_list',$participation_list_detail);
  }
public function role_permission()
{
$staff_pro = $this->session->userdata('stf_data');
$staff_analysis = $staff_pro[0]['stf_id'];
$all_teacher['role_autho'] = $this->teacher_model->role_autho($staff_analysis);
// $all_teacher['role_perm'] = $this->login_model->role_perm();  
$all_teacher['teacher'] = $this->login_model->all_staff();
$this->load->view('teacher/teacher_header');
$this->load->view('teacher/teacher_sidebar',$all_teacher);
$this->load->view('teacher/teacher_footer');
$this->load->view('teacher/role_permission',$all_teacher);
}
public function promote()
 {
    $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $class['role_autho'] = $this->teacher_model->role_autho($staff_analysis);
  $class['unpromote'] =   $this->login_model->unpromote();
  $class['promote'] =   $this->login_model->promote();
  $class['class_data'] =   $this->login_model->class_fetch();
       $this->load->view('teacher/teacher_header');
       $this->load->view('teacher/teacher_sidebar',$class);
       $this->load->view('teacher/teacher_footer');
       $this->load->view('teacher/promote',$class);

}
public function promote_student()
 {
      $uristring = $this->input->post('section');
      $clss = $this->input->post('classs');
      $result_std["result_std"] = $this->login_model->std_fetch($uristring,$clss);  ?>

<table class="table table-bordered marg_top ser_tblsa" id="checkkk">
      <thead>
           <tr>
                <td><input type="checkbox" name=""> #</td>
                <th>Batch</th>
                <th>Name</th>
                <th>Class</th>
          </tr>
      </thead>
<tbody>
        <?php 
          foreach ($result_std["result_std"] as $key) {  ?>
                   <tr class="sd<?php echo  $key['std_id'];   ?>">
                    <td><input type="checkbox" name="chk[]" value="<?php echo $key['std_id']; ?>"> </td>
                    <td><?php echo  $key['std_batch']; ?></td>
                    <td><?php echo $key['std_fname']; ?></td>
                    <td><?php echo $key['std_class']; ?></td>
                  </tr>

            <?php }  ?>      
                  
</tbody>
</table>
<?php
}
public function promoted_verify()
{
 $std_det_all=array(
      'std_old_class'=>$this->input->post('std_old_class'),
      'std_section'=>$this->input->post('std_section'),
      'promote_batch'=>$this->input->post('promote_batch'),
      'promote_class'=>$this->input->post('promote_class')
  );
$chk = $this->input->post('chk');
$std_promote["std_promote"] = $this->login_model->std_promote($chk,$std_det_all); 
redirect('teacher_controller/promote');
}

    //.................ankit end........//

  public function teacher_login()
    {

        
          $login_data = array(
            'stf_email'=>$this->input->post('user_email'),
            'stf_password'=>$this->input->post('user_password')
            );
        
           $staff_data = $this->teacher_model->teacher_login($login_data);
          
           $this->session->set_userdata('stf_data',$staff_data);
         if(count($staff_data) == 1){
      
          redirect('teacher_controller/dashboard_data');
            }
            else
            {
          redirect('teacher_controller/index');

            }
        
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
 $staf_auth_data['dob'] = $this->login_model->stu_birthday();
 $staf_auth_data['incharge_data'] = $this->login_model->class_fetch3($stff_id);

$staf_auth_data['data_stf'] = $this->login_model->authority_check($stf_id1);

$stff_id_msg['stff_id_msg'] = $this->teacher_model->stf_student_msg($stff_id);
$stff_id_msg = $this->session->set_userdata('stff_id_msg',$stff_id_msg);
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
        'notes_subject' => $this->input->post('notes_subject'),
        'notes_for_class' => $this->input->post('notes_for_class'),
        'notes_for_section' => $this->input->post('notes_for_section'),
        'submitted_by' => $this->input->post('submitted_by'),
        'notes_file' => $upload_data['file_name']);     
        $this->login_model->insert_data('notes',$data_post);
        redirect('teacher_controller/student_file_upload');
    }
    }

public function student_file_upload(){
  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/student_file_upload";
  $config["total_rows"] = $this->login_model->record_count('notes');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'notes');
  $data["links"] = $this->pagination->create_links();
  $upload_data['class_data'] =  $this->login_model->class_fetch();
  $upload_data['ebook_data'] = $this->login_model->get_all_file();
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $data['role_autho'] = $this->teacher_model->role_autho($staff_analysis);

      $this->load->view('teacher/teacher_header');
      $this->load->view('teacher/teacher_sidebar',$data);
      $this->load->view('teacher/add_notes',$upload_data);
      $this->load->view('teacher/teacher_footer');
    }
public function add_staff()
    {
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/staff_details');
        $this->load->view('teacher/teacher_footer');

    }

public function add_event()
    {
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $event_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);

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
    $stf_data=$this->session->userdata('stf_data');
     $stf_idd=$stf_data[0]['stf_id'];
  
   $dass['grop_subj']=$this->login_model->grop_subj();
   for($ool=0;$ool<count($dass['grop_subj']);$ool++)
   {
    $sub_per[]=$dass['grop_subj'][$ool]['subject'];
   }
   for($lm=0;$lm<count($sub_per);$lm++)
   {
   $dass['grop_subj_per'][$dass['grop_subj'][$lm]['subject']]=$this->login_model->grop_subj_per($sub_per[$lm]);
   }
$staff_pro = $this->session->userdata('stf_data');
$staff_analysis = $staff_pro[0]['stf_id'];
$staff_tch['staff_analysis']=$this->login_model->staff_analysis($staff_analysis);
$staff_ana=$staff_pro[0]['stf_id'];
$staff_subject=$this->login_model->staff_ana($staff_ana);
for($dh=0;$dh<count($staff_subject);$dh++)
{
$subjj[]=$staff_subject[$dh]['sub_name'];
$staff_tch['subjj'][]=$staff_subject[$dh]['sub_name'];
}


for($nnm=0;$nnm<count($staff_tch['staff_analysis']);$nnm++)
{
      $assign_class[]=$staff_tch['staff_analysis'][$nnm]['assign_class'];
      $assign_section[]=$staff_tch['staff_analysis'][$nnm]['assign_section'];
      $sub_name[]=$staff_tch['staff_analysis'][$nnm]['sub_name'];
}
// print_r($assign_class[0]);
// print_r($assign_section);
for($mo=0;$mo<count($sub_name);$mo++)
{
$assign_sectio[$sub_name[$mo]]=$this->login_model->assign_sectio($assign_class[$mo],$assign_section[$mo],$sub_name[$mo]);  
}
for($pop=0;$pop<count($assign_sectio);$pop++)
{
for($po=0;$po<count($assign_sectio[$sub_name[$pop]]);$po++)
{ 
 $asg_sub[]=$assign_sectio[$sub_name[$pop]][$po]['subject'];
 $asg_marks_obtain[$assign_sectio[$sub_name[$pop]][$po]['subject']][]=$assign_sectio[$sub_name[$pop]][$po]['marks_obtain'];
 $asg_total_marks[$assign_sectio[$sub_name[$pop]][$po]['subject']][]=$assign_sectio[$sub_name[$pop]][$po]['max_mark'];
 $asg_class[$assign_sectio[$sub_name[$pop]][$po]['subject']][]=$assign_sectio[$sub_name[$pop]][$po]['class_id'];
 $asg_section[$assign_sectio[$sub_name[$pop]][$po]['subject']][]=$assign_sectio[$sub_name[$pop]][$po]['class_section'];
}
}

for($wer=0;$wer<count($subjj);$wer++)
{
$average[$subjj[$wer]] = array_sum($asg_marks_obtain[$subjj[$wer]])/count($asg_marks_obtain[$subjj[$wer]]); 
$average['average'][$subjj[$wer]] = array_sum($asg_marks_obtain[$subjj[$wer]])/count($asg_marks_obtain[$subjj[$wer]]);
}


   // $birthday['dob'] = $this->login_model->stu_birthday();
   // $birthday['df'] =$this->login_model->message_create($birthday);
   // $birthday =  $this->login_model->class_fetch();
   // $birthday['stff_fetch']=$this->login_model->stff_fetch();
   // $dash['all_rows'] = $this->login_model->dash_data();

$staff_data_id['pro_stf'] = $this->teacher_model->stafff_detail($stff_id);
foreach ($staff_pro as $key => $value) {
$stf_id1 = $value['stf_id']; 
}
$stf_id = $this->session->set_userdata('stfdata',$stf_id1);
 $staf_auth_data['dob'] = $this->login_model->stu_birthday();
 $staf_auth_data['incharge_data'] = $this->login_model->class_fetch3($stff_id);

$staf_auth_data['data_stf'] = $this->login_model->authority_check($stf_id1);

$stff_id_msg['stff_id_msg'] = $this->teacher_model->stf_student_msg($stff_id);
$stff_id_msg = $this->session->set_userdata('stff_id_msg',$stff_id_msg);

 $birthday = $this->teacher_model->admin_color($stf_idd);




$this->session->set_userdata('teacher_sidebar',$birthday[0]['stf_sidebar']);
$this->session->set_userdata('teacher_background',$birthday[0]['stf_body']);
$this->session->set_userdata('teacher_header',$birthday[0]['stf_header']);

$class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
$add_userr=explode(',',$class['role_autho'][0]['add_user']);
$this->session->set_userdata('add_userrr',$add_userr);

$manage_user=explode(',',$class['role_autho'][0]['manage_user']);
$this->session->set_userdata('manage_user',$manage_user);


$authority=explode(',',$class['role_autho'][0]['authority']);
$this->session->set_userdata('authority',$authority);



   $this->session->set_userdata($dash);
   $this->load->view('teacher/teacher_header',$staff_tch);
   $this->load->view('teacher/teacher_sidebar',$average);
   $this->load->view('teacher/teacher_footer',$staf_auth_data);
   $this->load->view('teacher/index',$stff_id_msg);

    }
public function add_subject()
    {
        // $stf_id = $this->session->userdata('stfdata');
        // $class['incharge_data']=$this->login_model->class_fetch3($stf_id);
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
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
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $class_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);

        $this->load->view('teacher/teacher_header',$msg);
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/add_class',$class_data);
        $this->load->view('teacher/teacher_footer');

    }

public function insert_event_name()
  {
      $staff_pro = $this->session->userdata('stf_data');
      $staff_analysis = $staff_pro[0]['stf_id'];
      $data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
      $data['event_name'] = $this->login_model->fetch_all('event_name');
      $this->load->view('teacher/teacher_header');
      $this->load->view('teacher/teacher_sidebar');
      $this->load->view('teacher/insert_event_name',$data);
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
  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/add_assignment";
  $config["total_rows"] = $this->login_model->record_count('assignment');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'assignment');
  $data["links"] = $this->pagination->create_links(); 
        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
$class['assign_get'] = $this->login_model->assign_get();
$class['class_data'] = $this->login_model->class_fetch();
$class['subject'] = $this->login_model->all_subject();
$class['assignment'] = $this->login_model->assign_get(); 


$this->load->view('teacher/teacher_header');
$this->load->view('teacher/teacher_sidebar',$data);
$this->load->view('teacher/add_assignment',$class);
$this->load->view('teacher/teacher_footer');

}  
public function lession_planning()
  {
   $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/lession_planning";
  $config["total_rows"] = $this->login_model->record_count('lession_plan');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'lession_plan');
  $data["links"] = $this->pagination->create_links(); 
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
    $class['plan'] = $this->login_model->lession_plan_all();
    $class['all_class'] = $this->login_model->all_class();
    $this->load->view('teacher/teacher_header');
      $this->load->view('teacher/teacher_sidebar',$data);
      $this->load->view('teacher/lession_plan',$class);
      $this->load->view('teacher/teacher_footer');
  }
public function staff_attendance()
  {
        $sellect_date1 = $this->input->post('date_select1');
        $desg = $this->input->post('stf_desg');
        $this->session->set_userdata('date_flash1',$sellect_date1);
        $this->session->set_userdata('desg_flash',$desg);
        $designation_data['fetch_designation'] = $this->login_model->fetch_designation();
        $designation_data['fetch_chkdata'] = $this->login_model->fetch_attendance_data($sellect_date1,$desg);
       $staff_pro = $this->session->userdata('stf_data');
       $staff_analysis = $staff_pro[0]['stf_id'];
       $designation_data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
       $this->load->view('teacher/teacher_header');
       $this->load->view('teacher/teacher_sidebar');
       $this->load->view('teacher/teacher_footer');
       $this->load->view('teacher/staff_attendance',$designation_data);
  }

public function attendance_report()
{
$sellect_date = $this->input->post('date_select1');
$this->session->set_userdata('date_flash',$sellect_date);
$select_class = $this->session->userdata('cls');
$select_sec = $this->session->userdata('sect');
$class['class_data'] = $this->login_model->class_fetch1($sellect_date,$select_class,$select_sec);
$staff_pro = $this->session->userdata('stf_data');
$staff_analysis = $staff_pro[0]['stf_id'];
$class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
$this->load->view('teacher/teacher_header');
$this->load->view('teacher/teacher_sidebar',$sellect_date);
$this->load->view('teacher/attendance_report',$class);
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

  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/add_class_incharge";
  $config["total_rows"] = $this->login_model->record_count('add_class');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $class["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'add_class');
  
  $class["links"] = $this->pagination->create_links();
  $class['teacher'] = $this->login_model->all_staff();
  $class['all_class']=$this->login_model->all_class();
  $msg['msg']=$message;

        $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        
        if($err!='')
        {
         $er['msgn'] = "Incharge already exist for this class/section firstly remove this then assign new";
         $this->load->view('teacher/teacher_header');
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
  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/assign_subject_class";
  $config["total_rows"] = $this->login_model->record_count('assign_sub_teacher');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'assign_sub_teacher');
  $data["links"] = $this->pagination->create_links();
 $all_teacher['teacher'] = $this->login_model->all_staff();
 $all_subject['subject'] = $this->login_model->all_subject();
 $class['class_data'] =     $this->login_model->class_fetch();
 $class['assign_teacher'] = $this->login_model->all_assign_sub();
$staff_pro = $this->session->userdata('stf_data');
$staff_analysis = $staff_pro[0]['stf_id'];
$class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);

 $this->load->view('teacher/teacher_header',$all_teacher);
 $this->load->view('teacher/teacher_sidebar',$all_subject);
 $this->load->view('teacher/teacher_footer',$data);
 $this->load->view('teacher/subject_teacher',$class);
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
  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/assign_rol_sec";
  $config["total_rows"] = $this->login_model->record_count('admission');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'admission');
  $data["links"] = $this->pagination->create_links();
  $all_data = $this->login_model->all_student();
  $class['all_class']=$this->login_model->all_class();
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);

      $this->load->view('teacher/teacher_header',$class);
      $this->load->view('teacher/teacher_sidebar',$data);
      $this->load->view('teacher/assign_rol_sec',$all_data);
      $this->load->view('teacher/teacher_footer');
    }

public function Gate_reciving_timing()
{
      $indiatimezone = new DateTimeZone("Asia/Kolkata" );
      $date = new DateTime();
      $date->setTimezone($indiatimezone);
      $entry_time = $date->format( 'H:i:s A  ' );
      $date = $date->format( ' D, M jS, Y' );
      $status_in = '0';
      $status_out = '1';
      $gate_time['visitor_status'] = $this->login_model->all_dep_stf('gate_timing',$status_in,'status');
      $gate_time['visitor_out_status'] = $this->login_model->class_roll_lib('gate_timing',$status_out,$date , 'status','entry_date');
      $staff_pro = $this->session->userdata('stf_data');
      $staff_analysis = $staff_pro[0]['stf_id'];
      $gate_time['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/gate_reciving_timing',$gate_time);
        $this->load->view('teacher/teacher_footer');
        }

      public function feedback()
      {
      $staff_pro = $this->session->userdata('stf_data');
      $staff_analysis = $staff_pro[0]['stf_id'];
      $addmin['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
      $addmin['admin'] = $this->login_model->admin_feed();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/feedback',$addmin);
        $this->load->view('teacher/teacher_footer');
       }
public function photo_gallery()
{
       $staff_pro = $this->session->userdata('stf_data');
       $staff_analysis = $staff_pro[0]['stf_id'];
        $a['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
        $a['photo'] = $this->login_model->gallery_data_fetch();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/teacher_footer');
        $this->load->view('teacher/Photo_Gallery',$a);
}

   public function fetch_images()
   {
   $folder_name= $this->login_model->gallery_data_fetch();
   $na = $this->input->post('name_f');
   $dir = "application/assets/gallery/".$na;
   $map = directory_map($dir);
       
        foreach ($map as $key => $value) {?>
<?php 
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $role_autho =   $this->teacher_model->role_autho($staff_analysis);

$user_listedd=explode(',',$role_autho[0]['gallery']);
 $user_listedd1=$user_listedd[0];
 $user_listedd2=$user_listedd[1];
$user_listedd3=$user_listedd[2];
   ?>
 
       <div class="col-lg-3 img_path_bigss_margin">
        <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
       <a href="<?php echo site_url('teacher_controller/delete_image/'.$na."/".$value);?>">
        <span title="close" class="glyphicon glyphicon-remove"></span>
      </a>
      <?php  }  ?>
        <img id="<?php echo $value;?>" src="<?php  echo base_url($dir)."/".$value;?>" alt="" class="img_path_bigss" >
      </div>
      <?php
    
       }
  }   
 public function delete_image($na='',$value='')
   {
        $dir = "application/assets/gallery/".$na."/".$value;

        unlink($dir);
        redirect('admission/photo_gallery');
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
    //     public function exam_detail()
    // {
    //     $class['class_data'] =  $this->login_model->class_fetch();
    //     $result_exam['exam_data'] = $this->login_model->exam_fetch();
    //     $all_subject['subject'] = $this->login_model->all_subject();

    //     $this->load->view('teacher/teacher_header',$all_subject);
    //     $this->load->view('teacher/teacher_sidebar',$result_exam);
    //     $this->load->view('teacher/exam_detail',$class);
    //     $this->load->view('teacher/teacher_footer');
    // }
    //     public function exam_add()
    // {

    //     $add_exam = array(
    //     'class_section' => $this->input->post('class_section'),
    //     'subject' => $this->input->post('subject'),
    //     'exam_type' => $this->input->post('exam_type'),
    //     'exam_date' => $this->input->post('exam_date'),
    //     'exam_start_time' => $this->input->post('exam_start_time'),
    //     'exam_end_time' => $this->input->post('exam_end_time'),
    //     'class_id' => $this->input->post('class_id'),
    //     'max_mark' => $this->input->post('max_mark'));
    //     $this->login_model->insert_data('exam_detail',$add_exam);
    //     redirect('teacher_controller/exam_detail');
    // }
public function add_notice()
    {
  $notice_data['teacher'] = $this->login_model->all_staff();
  $notice_data['notice'] = $this->login_model->notice_get();

  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/add_notice";
  $config["total_rows"] = $this->login_model->record_count('add_notice');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'add_notice');
  $data["links"] = $this->pagination->create_links();
       $staff_pro = $this->session->userdata('stf_data');
        $staff_analysis = $staff_pro[0]['stf_id'];
        $data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);

       for($oi=0;$oi<count($notice_data['notice']);$oi++)
      {
      if(date('Y-m-d')==$notice_data['notice'][$oi]['remove_date'])
      {
        $id=$notice_data['notice'][$oi]['notice_id'];
      $this->login_model->update_data_notice('add_notice',$id);
      }
      }


            $this->load->view('teacher/teacher_header',$data);
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
             $staff_pro = $this->session->userdata('stf_data');
            $staff_analysis = $staff_pro[0]['stf_id'];
            $class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
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

    //     public function update_exam_detail()
    // {
    //         $value=$this->input->post('value');
    //         $hid=$this->input->post('hid');
    //         $ids=$this->input->post('ids');
    //         $this->login_model->update_exam_detail($value,$hid,$ids);
    // }
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
    $classs =$this->input->post('classs');
    $section =$this->input->post('section');
    $value_sub1['value_sub1']=$this->login_model->value_subject($classs,$section);
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
            $uristring =$this->input->post('uristring');
            $value_sub5['value_sub5']=$this->login_model->value_class_sec($uristring);
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

       
    //     public function class_record_exam_id()
    // {
   
    //         $clss =$this->input->post('clss');
    //         $secc =$this->input->post('secc');
    //         $sub =$this->input->post('sub');
    //         $xam =$this->input->post('xam');
    //         $dat =$this->input->post('dat');

    //         $value_sub8['value_sub8']=$this->login_model->class_record_exam_id($clss,$secc,$sub,$xam,$dat);

    //          echo $value_sub8['value_sub8']['exam_id'];
     
    // }
    
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
// public function attendance_report()
//     {
        
//         $sellect_date = $this->input->post('date_select');
//         $this->session->set_userdata('date_flash',$sellect_date);

//         $select_class = $this->session->userdata('cls');
//         $select_sec = $this->session->userdata('sect');

//         $stf_id = $this->session->userdata('stfdata');
//          $class['incharge_data']=$this->login_model->class_fetch3($stf_id);

//          $class['all_class'] = $this->login_model->all_class();
//         $class['class_data'] = $this->login_model->class_fetch1($sellect_date,$select_class,$select_sec,$stf_id);

//         $this->load->view('teacher/teacher_header');
//         $this->load->view('teacher/teacher_sidebar',$sellect_date);
//         $this->load->view('teacher/attendance_report',$class);
//         $this->load->view('teacher/teacher_footer');
      
//     }
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

     

       
     public function class_record()
      {
      $uristring = $this->input->post('secc');
      $clss = $this->input->post('clss');
      $result_std["result_std"] = $this->login_model->std_fetch($uristring,$clss);
      $this->session->set_userdata('all_student',$result_std);


?>
 <table class="table table-bordered" >

<tr>
  <th>ROLL No.</th>
  <th>STUDENT</th>
  <th>MARKS OBTAINED(Out Of <?Php echo  $name5;   ?>)</th>
  </tr>   <?Php
 echo form_close();  
echo form_open('teacher_controller/fetchname'); 
foreach ($result_std["result_std"] as $key => $value222) {
 ?><tr><td><?php print_r($value222['std_roll_no']); ?></td>
 <td><?php print_r($value222['std_fname']); ?></td>
<td>
<input type="hidden" name="std_id"  id="std_id<?Php echo $value222['std_id']; ?>"  value="<?Php echo $value222['std_id']; ?>">
<input type="hidden" name="nameid[]" value="<?php print_r($value222['std_id']); ?>"  >
  
<input type="text" name="marks_obtain" <?php   foreach ($name1 as $key => $value99) {
 if($value99[0]['std_id']==$value222['std_id'])
 { ?> value="<?php echo $value99[0]['marks_obtain'];  ?>" <?php } } ?> id="std_std<?Php echo $value222['std_id']; ?>"  class="marks_obtained"  onblur="marks_obtained<?Php echo $value222['std_id']; ?>(this.value);"></td>
 </tr>
  
<script type="text/javascript">
function marks_obtained<?Php echo $value222['std_id']; ?>(value)
{
var sstd_id=document.getElementById("std_id<?Php echo $value222['std_id']; ?>").value;
var std_classs=document.getElementById("std_classs").value;
var tabbb_section=document.getElementById("tabbb_section").value;
var std_sub=document.getElementById("tabbb1").value;
var xam_typ=document.getElementById("tabbb23").value;
var xam_date=document.getElementById("tabbb231").value;
var exam_id_sec=document.getElementById("exam_id_sec").value;
var max_mark=document.getElementById("max_mark").value;
var fields = xam_date.split('-');
var month = fields[1];
var fieldy = xam_date.split('-');
var year = fieldy[0];

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_marks_insert/"+value+"/"+sstd_id+"/"+std_classs+"/"+tabbb_section+"/"+std_sub+"/"+xam_typ+"/"+xam_date+"/"+exam_id_sec+"/"+max_mark+"/"+month+"/"+year+"/",  
    data    : {'marks_obtain':value,'class_id':std_classs,'class_section':tabbb_section,'subject':std_sub,'exam_type':xam_typ,'batch':xam_date,'exam_id':exam_id_sec,'std_id':sstd_id,'max_mark':max_mark,'month':month,'year':year},
    success : function(data){
       
        if(data){
          
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    // run ajax request
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
  }, 1000);
  }
  });
  }
  }
  });
  }
</script> 

 <?php 
}
 ?> 


<input type="submit" name="submit" id="submitty">
<?php
echo form_close();
?>
 </table>


<?Php





















       
      $class_id = $this->input->post('clss');
      $class_section = $this->input->post('secc');
      $xam_date = $this->input->post('xam_date');
      $exam_type = $this->input->post('xam');
      $subject = $this->input->post('sub');

      foreach ($result_std["result_std"] as $key){
        $std_id=$key['std_id'];
        $result_mark["result_mark"]=$this->login_model->std_marks($class_id,$class_section,$subject,$exam_type,$xam_date,$std_id);
        // print_r($result_mark["result_mark"][0]['marks_obtain']);
        $result['marks']=$result_mark["result_mark"][0]['marks_obtain'];
        $row[] = $result_mark["result_mark"];    
      } 
      $this->session->set_userdata('markss',$row); 

      $this->load->view('teacher/teacher_footer');
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



public function exam_detail()
    {
  $class['class_data'] =   $this->login_model->class_fetch();
  $result_exam['exam_data'] = $this->login_model->exam_fetch();
  $all_subject['subject'] = $this->login_model->all_subject();
  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/exam_detail";
  $config["total_rows"] = $this->login_model->record_count('exam_detail');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'exam_detail');
  $data["links"] = $this->pagination->create_links();
  $staff_pro = $this->session->userdata('stf_data');
$staff_analysis = $staff_pro[0]['stf_id'];
$data['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);

      $this->load->view('teacher/teacher_header',$all_subject);
      $this->load->view('teacher/teacher_sidebar',$data);
      $this->load->view('teacher/exam_detail1',$class);
      $this->load->view('teacher/teacher_footer');
    }
public function daily_basis()
    {
       $class['class_data'] =  $this->login_model->class_fetch();
    // $result_exam['exam_data'] = $this->login_model->test_exam_fetch();
    $all_subject['subject'] = $this->login_model->all_subject();

  $config = array();
  $config["base_url"] = base_url() . "index.php/teacher_controller/daily_basis";
  $config["total_rows"] = $this->login_model->record_count('test_detail');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'test_detail');
  $data["links"] = $this->pagination->create_links();
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $class['role_autho'] =   $this->teacher_model->role_autho($staff_analysis);
      $this->load->view('teacher/teacher_header',$all_subject);
      $this->load->view('teacher/teacher_sidebar',$data);
      $this->load->view('teacher/teacher_footer');
      $this->load->view('teacher/daily_basis',$class);
    }

public function date_sheet()
    {
    $class['class_data'] =  $this->login_model->class_fetch();
    $result_exam['exam_data'] = $this->login_model->exam_fetch();
    $all_subject['subject'] = $this->login_model->all_subject();

      $this->load->view('teacher/teacher_header',$all_subject);
      $this->load->view('teacher/teacher_sidebar',$result_exam);
      $this->load->view('teacher/exam_detail',$class);
      $this->load->view('teacher/teacher_footer');
    }

public function test_date_sheet()
    {
    $result_exam['exam_data'] = $this->login_model->test_exam_fetch();
      $this->load->view('teacher/teacher_header',$all_subject);
      $this->load->view('teacher/teacher_sidebar',$result_exam);
      $this->load->view('teacher/test_detail',$class);
      $this->load->view('teacher/teacher_footer');
    }
    public function marks()
      {
      $staff_pro = $this->session->userdata('stf_data');
      $staff_analysis = $staff_pro[0]['stf_id'];
      $data['role_autho'] = $this->teacher_model->role_autho($staff_analysis);  
      $class['class_data']=$this->login_model->class_fetch();
      $this->load->view('teacher/teacher_header');
      $this->load->view('teacher/teacher_sidebar',$data);
      $this->load->view('teacher/teacher_footer');
      $this->load->view('teacher/marks',$class);
      }
    
   public function test_marks()
   { 
      $staff_pro = $this->session->userdata('stf_data');
      $staff_analysis = $staff_pro[0]['stf_id'];
      $class['role_autho'] = $this->teacher_model->role_autho($staff_analysis); 
      $class['class_data']=$this->login_model->class_fetch();
      $this->load->view('teacher/teacher_header');
      $this->load->view('teacher/teacher_sidebar');
      $this->load->view('teacher/teacher_footer');
      $this->load->view('teacher/test_marks',$class);
      }

public function exam_add()
        {
        $arr_sec_class=array(
        'class_id' => $this->input->post('class_id'),
        'class_section' => $this->input->post('class_section')
        );
        $this->session->set_userdata('arr_sec_class',$arr_sec_class);
          $class_id = $this->input->post('class_id');
         $class_section = $this->input->post('class_section');
        $this->session->set_userdata('cls',$class_id);
        $this->session->set_userdata('sect',$class_section);

        $subbj =$this->login_model->all_sub($class_id,$class_section);
        $this->session->set_userdata('subbj',$subbj);
        redirect('teacher_controller/exam_detail');
        }
public function exam_insert()
        {
        $examm_insert=array(
          'class_id' => $this->input->post('class_id'),
          'class_section' => $this->input->post('class_section'),
          'subject' => $this->input->post('subject'),
          'exam_type' => $this->input->post('exam_type'),
          'exam_date' => $this->input->post('exam_date'),
          'max_mark' => $this->input->post('max_mark'),
          'exam_start_time' => $this->input->post('exam_start_time'),
          'exam_end_time' => $this->input->post('exam_end_time')
          );

        $sub=$this->input->post('subject');
        foreach ($examm_insert as $key => $value) {
         $arr_insert[$key]=$value;
        }
        // print_r($arr_insert);
        $this->login_model->insert_data_exam('exam_detail',$arr_insert,$sub);
        redirect('teacher_controller/exam_detail');

        }
public function test_insert()
        {
        $test_insert=array(
          'class_id' => $this->input->post('class_id'),
          'class_section' => $this->input->post('class_section'),
          'subject' => $this->input->post('subject'),
          'test_type' => $this->input->post('test_type'),
          'test_date' => $this->input->post('test_date'),
          'max_mark' => $this->input->post('max_mark'),
          'test_start_time' => $this->input->post('test_start_time'),
          'test_end_time' => $this->input->post('test_end_time')
          );


        $sub=$this->input->post('subject');
        foreach ($examm_insert as $key => $value) {
         $arr_insert[$key]=$value;
        }
        // print_r($arr_insert);
        $this->login_model->insert_data_test('test_detail',$test_insert,$sub);
        redirect('teacher_controller/daily_basis');

        }
public function exam_delete()
    {
      $exam_id = $this->uri->segment(3);
      $this->login_model->exam_remove($exam_id);
      redirect('teacher_controller/date_sheet');
    }

public function test_delete()
    {
      $exam_id = $this->uri->segment(3);
      $this->login_model->test_remove($exam_id);
      redirect('teacher_controller/test_date_sheet');
    }
public function update_exam_detail()
     {
      $value=$this->input->post('value');
      $hid=$this->input->post('hid');
      $ids=$this->input->post('ids');
      $this->login_model->update_exam_detail($value,$hid,$ids); 
      }
public function update_test_detail()
     {
      $value=$this->input->post('value');
      $hid=$this->input->post('hid');
      $ids=$this->input->post('ids');
      $this->login_model->update_test_detail($value,$hid,$ids); 
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
public function class_record_test_type()
    {
     $sub =$this->input->post('sub');
    $clss =$this->input->post('clss');
    $secc =$this->input->post('secc');
    $value_sub6['value_sub6']=$this->login_model->class_record_test_type($sub,$clss,$secc);
    ?>
       <select class="form-control">
        <option value="">select</option> 
        <?php
        foreach ($value_sub6['value_sub6'] as $key) {
        ?>
        <option value="<?php echo $key['test_type'];?>">
        <?php echo $key['test_type'];?></option><?php
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
public function class_record_test(){
      $uristring = $this->input->post('secc');
      $clss = $this->input->post('clss');
      $result_std["result_std"] = $this->login_model->std_fetch($uristring,$clss);
      $this->session->set_userdata('all_student',$result_std);
       
      $class_id = $this->input->post('clss');
      $class_section = $this->input->post('secc');
      $xam_date = $this->input->post('xam_date');
      $exam_type = $this->input->post('xam');
      $subject = $this->input->post('sub');

      foreach ($result_std["result_std"] as $key){
        $std_id=$key['std_id'];
        $result_mark["result_mark"]=$this->login_model->std_marks_test($class_id,$class_section,$subject,$exam_type,$xam_date,$std_id);
        // print_r($result_mark["result_mark"][0]['marks_obtain']);
        $result['marks']=$result_mark["result_mark"][0]['marks_obtain'];
        // die();
        $row1[] = $result_mark["result_mark"];    
      } 
      $this->session->set_userdata('markss_test',$row1); 

      $this->load->view('teacher/teacher_footer');
      return $result_std;
      }

public function class_record_test_date()
    {
             
        $clss =$this->input->post('clss');
        $secc =$this->input->post('secc');
        $sub =$this->input->post('sub');
        $xam =$this->input->post('xam');

        $value_sub7['value_sub7']=$this->login_model->class_record_test_date($clss,$secc,$sub,$xam);
        ?>
       <select class="form-control">
        <option value="">select</option> 
        <?php
        foreach ($value_sub7['value_sub7'] as $key) {
        ?>
        <option value="<?php echo $key['test_date'];?>">
        <?php echo $key['test_date'];?></option><?php
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
         $max_mark =$value_sub8['value_sub8']['max_mark'];
        $name5 = $this->session->set_userdata('max_mark',$max_mark);
         
}
public function class_record_test_id()
{
        $clss =$this->input->post('clss');
        $secc =$this->input->post('secc');
        $sub =$this->input->post('sub');
        $xam =$this->input->post('xam');
        $dat =$this->input->post('dat');

        $value_sub8['value_sub8']=$this->login_model->class_record_test_id($clss,$secc,$sub,$xam,$dat);

         echo $value_sub8['value_sub8']['test_id'];
         $max_mark =$value_sub8['value_sub8']['max_mark'];
        $name5 = $this->session->set_userdata('max_mark',$max_mark);
 
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
        $max_mark = $this->input->post('max_mark');

        $add_class_marks = array(
        'class_id' => $this->input->post('class_id'),
        'class_section' => $this->input->post('class_section'),
        'marks_obtain' => $this->input->post('marks_obtain'),
        'std_id' => $this->input->post('std_id'),
        'exam_type' => $this->input->post('exam_type'),
        'exam_id' => $this->input->post('exam_id'),
        'batch' => $this->input->post('batch'),
        'subject' => $this->input->post('subject'),
        'max_mark' => $this->input->post('max_mark')
        );

        $select_marks=$this->login_model->select_marks($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject);
        if($select_marks!='')
        {
            $this->login_model->update_marks($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject,$marks_obtain);
        echo "updated";
        }
        else{
        $this->login_model->insert_marks('student_marks',$add_class_marks);
        echo "inserted";

        }


}
public function class_marks_test_insert()
                {
            $class_id = $this->input->post('class_id');
            $class_section = $this->input->post('class_section');
            $marks_obtain = $this->input->post('marks_obtain');
            $std_id = $this->input->post('std_id');
            $exam_type = $this->input->post('exam_type');
            $exam_id = $this->input->post('exam_id');
            $batch = $this->input->post('batch');
            $subject = $this->input->post('subject');
            $max_mark = $this->input->post('max_mark');

            $add_class_marks = array(
            'class_id' => $this->input->post('class_id'),
            'class_section' => $this->input->post('class_section'),
            'marks_obtain' => $this->input->post('marks_obtain'),
            'std_id' => $this->input->post('std_id'),
            'test_type' => $this->input->post('exam_type'),
            'test_id' => $this->input->post('exam_id'),
            'batch' => $this->input->post('batch'),
            'subject' => $this->input->post('subject'),
            'max_mark' => $this->input->post('max_mark')
            );

            $select_marks=$this->login_model->select_marks_test($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject);
            if($select_marks!='')
            {
                $this->login_model->update_marks_test($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject,$marks_obtain);
            echo "updated";
            }
            else{
            $this->login_model->insert_marks_test('test_marks',$add_class_marks);
            echo "inserted";

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
      $this->session->set_userdata('makks',$data_mak); 
      $this->session->set_userdata('cls',$data_mak['class_id']); 
      $this->session->set_userdata('sec',$data_mak['class_section']); 
     
      redirect('teacher_controller/marks');
     
    }
public function test_marks_stored()
    {
      $data_mak = array(
              'class_id'=>$this->input->post('class_id'),
              'class_section'=>$this->input->post('class_section'),
              'subject'=>$this->input->post('subject'),
              'test_type'=>$this->input->post('test_type'),
              'test_date'=>$this->input->post('test_date'),
              'test_id'=>$this->input->post('test_id')
              
               );
    $this->session->set_userdata('cls',$data_mak['class_id']);
    $this->session->set_userdata('sec',$data_mak['class_section']);
    $this->session->set_userdata('test_makks',$data_mak); 
     
    redirect('teacher_controller/test_marks');
     
    }
public function test_add()
{
        $arr_sec_class=array(
        'class_id' => $this->input->post('class_id'),
        'class_section' => $this->input->post('class_section')
        );
        $this->session->set_userdata('arr_sec_class',$arr_sec_class);
          $class_id = $this->input->post('class_id');
         $class_section = $this->input->post('class_section');

        $subbj =$this->login_model->all_sub($class_id,$class_section);
        $this->session->set_userdata('subbj',$subbj);
        redirect('teacher_controller/daily_basis');
}


  // ankit data 15-11-2017 end

// teacher lession plan start
public function teacher_lession_plan()
        {
          $stf_id = $this->session->userdata('stfdata');
          $class['plan_class'] = $this->login_model->teacher_lession_plan_data($stf_id);
          $this->load->view('teacher/teacher_header');
          $this->load->view('teacher/teacher_sidebar');
          $this->load->view('teacher/teacher_lession_plan',$class);
          $this->load->view('teacher/teacher_footer');
        }
public function section_lession()
        {
          $class_name = $this->input->post('class_name');
          $section['plan_section'] = $this->login_model->section_lession($class_name);
          ?>

        <select class="form-control" id="section_tab">
        <option>select</option> 
        <?php
        foreach ($section['plan_section'] as $key) {
        ?>
        <option value="<?php echo $key['assign_section'];?>">
        <?php echo $key['assign_section'];?></option>
        <?php } ?>
        </select> 
        <?php   } 

public function section_subject()
        {
          $class_name = $this->input->post('class_name');
          $section_name = $this->input->post('section_name');
          $section['plan_subject'] = $this->login_model->sub_lession($class_name,$section_name);
          ?>

        <select class="form-control" id="subject_tab">
        <option>select</option> 
        <?php
        foreach ($section['plan_subject'] as $key) {
        ?>
        <option value="<?php echo $key['sub_name'];?>">
        <?php echo $key['sub_name'];?></option>
        <?php } ?>
        </select> 
        <?php   } 

public function all_plan()
     {
          $subject_name = $this->input->post('subject');
          $class_name = $this->input->post('class_name');
          $section_name = $this->input->post('section_name');
          $all_lession_plan['plan_all'] = $this->login_model->all_lession($subject_name,$class_name,$section_name);
          $this->session->set_userdata('lession_data',$all_lession_plan);
     }

public function msg(){
$staff_pro = $this->session->userdata('stf_data');
$stff_id = $staff_pro[0]['stf_id'];
$sub_class['sub_class']= $this->teacher_model->sub_class($stff_id);
         
          $this->load->view('teacher/teacher_sidebar');
      $this->load->view('teacher/teacher_footer');
           $this->load->view('teacher/teacher_header');
          $this->load->view('teacher/msg',$sub_class);
              
     }
public function class_section(){
echo $clss=$this->input->post('classs');
$sub_sec['sub_sec']= $this->teacher_model->sub_sec($clss);
$this->session->set_userdata('sub_sec',$sub_sec);
// echo '<pre>';
print_r($this->session->userdata('sub_sec'));?>
<select>
<option>Select</option>
<?Php foreach ($sub_sec['sub_sec'] as $key) { 
$arr12[]=$key['assign_section'];
}
$arr21=array_unique($arr12);
    foreach ($arr21 as $key) { 
        ?>

 <option><?php print_r($key);?> </option>
<?Php  }   ?>
</select>
<?Php
}
public function save_clas_sec()
{

$save_clas_sec=array(
'class_id'=>$this->input->post('class_id'),
'class_section'=>$this->input->post('class_section'),
);
$this->session->set_userdata('save_clas_sec',$save_clas_sec);
$save_clas_sec1['save_clas_sec1']= $this->teacher_model->save_clas_sec($save_clas_sec);
$this->session->set_userdata('save_clas_sec1',$save_clas_sec1);
redirect('teacher_controller/msg');
}
public function chat_with_student()
{
$staff_pro = $this->session->userdata('stf_data');
$stff_id = $staff_pro[0]['stf_fname'];
$chatty=array(
'class_sub'=>$this->input->post('class_sub'),
'section_sub'=>$this->input->post('section_sub'),
'message'=>$this->input->post('message'),
'subject'=>$this->input->post('subject'),
'stf_id'=>$stff_id
        );
$sent_to=$this->input->post('send_to');
$rent=0;
$dent=0;
for($v=0;$v<=count($sent_to);$v++) {
if($sent_to[$v]=='student')
{
$dent++;
}
if($sent_to[$v]=='parent')
{
$rent++;
}
}
if($dent==1){
$std_id=$this->input->post('std_id');   
$chat_with_student['chat_with_student'] = $this->teacher_model->chat_with_student($chatty,$std_id);
}
if($rent==1){
$std_id=$this->input->post('std_id');
$id_parent['id_parent'] = $this->teacher_model->id_parent($std_id);
$id_parent_fetch['id_parent_fetch'] = $this->teacher_model->id_parent_fetch($id_parent);
for($i=0;$i<count($id_parent_fetch['id_parent_fetch']);$i++){
for($j=0;$j<count($id_parent_fetch['id_parent_fetch'][$i]);$j++){
$arr[]=$id_parent_fetch['id_parent_fetch'][$i][$j]['parent_id'];
}
}
$arr1=array_unique($arr);
$chat_with_parent['chat_with_parent'] = $this->teacher_model->chat_with_parent($chatty,$arr);
}
redirect('teacher_controller/msg');
}
public function teacher_leave()
    {  
         
         $id = $this->session->userdata('stf_data');
         $stf_id = $id[0]['stf_id'];
         
         $category_data['pro_stf'] = $this->teacher_model->stafff_detail($stf_id);
      // print_r($category_data['pro_stf']);
     
         $stfrole = $category_data['pro_stf'][0]['stf_designation'];
    
         $teacher_leave_data['teacher_leave'] = $this->teacher_model->fetch_teacher_leave($stf_id);

         
         $teacher_leave_data['detail_leave_catagory'] = $this->teacher_model->selectall('add_leave',$stfrole);
       

         foreach ($teacher_leave_data['detail_leave_catagory'] as $key => $value) {
           $leave_category_name[] = $value['leave_category'];
         }
          $teacher_leave_data['lev_req'] = $this->teacher_model->remain_leave('teacher_leave', $stf_id, $leave_category_name);

          $request_data['request'] = $this->teacher_model->fetch_student_leave_request($stf_id);
         $request_data = $this->session->flashdata('error');

         
         $this->load->view('teacher/teacher_header',$request_data);
         $this->load->view('teacher/teacher_sidebar',$teacher_leave_data);
         $this->load->view('teacher/teacher_leave',$category_data);
         $this->load->view('teacher/teacher_footer');
    }

public function stf_total_lev()
{
    $var_1 = $this->input->post('uristring');
    $var_2 = $this->input->post('uristring1');
    $this->session->set_flashdata('var_2',$var_2);
    $total_lev['lev'] = $this->teacher_model->stf_total_lev($var_1,$var_2);
    $this->session->set_flashdata('lev',$total_lev);
    echo $total_lev['lev'][0]['leave'];
  }
public function add_teacher_leave()
{
        $id_st = $this->uri->segment(3);

        $dec = base64_decode ($id_st);
         $num=substr($dec, 5);
         $id_std= substr($num, 0, -3);

        if($id_std == '')
        {

       $id_std = $this->input->post('child');
        }
        else
        {
        $id_st = $this->uri->segment(3);

        $dec = base64_decode ($id_st);
         $num=substr($dec, 5);
         $id_std= substr($num, 0, -3);
            
        }
        $std_detail = $this->teacher_model->student_ddd($id_std); 
      

        $teacher_id = $this->input->post('teacher_leave_id');
        $id_stf = $this->session->userdata('stf_data');
        $i_d = $id_stf[0]['stf_id'];
        $strt_date = new DateTime($this->input->post('from_date'));
        $end_date = new DateTime($this->input->post('to_date'));
        $end_date->modify('+1 day');
        $diff = $strt_date->diff($end_date);
        $day  = $diff->days;

        $a = $this->session->flashdata('lev');
        $total_leave =  $a['lev'][0]['leave'];
        $leave_cate =   $a['lev'][0]['leave_category'];
            
        $request_lev = $this->teacher_model->teacher_all_leave_fetch($i_d);
        $pending = $request_lev[0]['approval'];
 


        $lev_req['leave'] = $this->teacher_model->remain_lev($i_d,$leave_cate);
        $request =  $lev_req['leave'][0]['request_leave'];
        $remain_leave = $total_leave - $request ;

            $sf_id = $this->session->userdata('stf_data');
              $id_std12 = $this->uri->segment(3);

        if($id_std12 != '')
        {
            $id = $this->session->userdata('std_array');
            $roll_no = $id['data'][0]['std_roll_no'];
            $name  = $id['data'][0]['std_fname'];
            $last  = $id['data'][0]['std_lname'];
            $class = $id['data'][0]['std_class'];
            $section = $id['data'][0]['std_section'];
        }
        else
        {
             $roll_no = $std_detail[0]['std_roll_no'];
            $name  = $std_detail[0]['std_fname'];
          $last  = $std_detail[0]['std_lname'];
            $class = $std_detail[0]['std_class'];
            $section = $std_detail[0]['std_section'];

        }
            $t_id = $this->teacher_model->get_teacher_id($class,$section); 
            $get_id = $t_id[0]['class_incharge'];
            $submit_type = $this->input->post('submit');
            $stf_detail = $this->teacher_model->stafff_detail($i_d);
            $rolename = $stf_detail[0]['stf_role'];
             
             if($submit_type == $rolename){  
              if($day > $remain_leave){
                   $massage['error'] = "You selected more leave than you have";
                   $this->session->set_flashdata('error',$massage);
                     }
                 elseif($pending == 0 && $pending !='')
                 {
                    $massage['error'] = "your previous leave is not approve.";
                    $this->session->set_flashdata('error',$massage);
                 }
                 else
                    {
                       $staff_id = 'stf_id';
                       $stf_id = $sf_id[0]['stf_id'];
                       $data = array(
                        'leave_category'=>$this->input->post('leave_category'),
                        'designation'=>$this->input->post('designation'),
                        'total_leave'=>$this->input->post('total_leave'),
                        'from_date'=>$this->input->post('from_date'),
                        'request_leave'=>$day,
                        'to_date'=>$this->input->post('to_date'),
                        'message'=>$this->input->post('message'),
                         $staff_id => $stf_id
                           );

              $this->teacher_model->insert_teacher_leave('teacher_leave',$data);
              }
             $url_redirect = $this->input->post('url');
             redirect($url_redirect);
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
                        'leave_count'=>$day, //=== 17-11-2107 work=====//
                        'message'=>$this->input->post('message'),
                         $staff_id => $id_std
                    );
                  }

                  $url_redirect = $this->input->post('url');
                  $this->teacher_model->insert_teacher_leave($table,$data);
                  redirect($url_redirect);
                  }

        public function cencel_leave_request()
        {
        $id = $this->uri->segment(3);
        $this->teacher_model->delete_leave_request('teacher_leave',$id);
        redirect("teacher_controller/teacher_leave");
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
         public function attendance()
        {
 $designation_data['fetch_designation'] = $this->login_model->fetch_designation();

        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/teacher_attendance',$designation_data);
        $this->load->view('teacher/teacher_footer');


        }   
public function stf_attendance_view()
      {
         $id = $this->session->userdata('stf_data');
         $stf_id = $id[0]['stf_id'];
        $stf_desgination = $this->input->post('desg');
        $month = $this->input->post('month');
        $years = $this->input->post('year1');
      $stf_attendance_fetch['stf_attendance'] = $this->teacher_model->stf_attendance_data($stf_desgination,$month,$years,$stf_id);
        ?>
        <table class="table responsive table table-bordered table table-striped">
      <thead>
          <tr class="hr_tbll">
          <th>Name</th>
          <!-- date data from 1 to 30 -->
          <?php for($i = 01 ; $i <= 30 ;$i++) { ?>
          <th><?php echo $i; ?></th>
          <?php } ?>
          </tr>
</thead>
<tbody>        
<?php
foreach ($stf_attendance_fetch['stf_attendance'] as $key => $value) { $d1 = 0; ?>
 <tr><td><?php echo $value['stf_name']; ?></td>
<?php for($d = 1 ; $d <= 31 ; $d++) { 
if($d<10)
{  ?>
<td  <?Php if($value['d'.$d1.$d]=='A'){ ?> style='background:rgb(67, 67, 72);color:white';  <?php   } elseif($value['d'.$d1.$d]=='P'){ ?> style='background:rgb(99, 156, 211);color:white';   <?php } elseif($value['d'.$d1.$d]=='HD'){   ?>  style='background:rgb(247, 163, 92);color:white';   <?php } elseif($value['d'.$d1.$d]=='L'){ ?> style='background:rgb(144, 237, 125);color:white';   <?php }    ?>><?php 
$attend_teacher[]=$value['d'.$d1.$d];
          echo $value['d'.$d1.$d]; ?></td> 
          <?php  }  else {  ?>
           <td <?Php if($value['d'.$d]=='A'){ ?> style='background:rgb(67, 67, 72);color:white';  <?php   } elseif($value['d'.$d]=='P'){ ?> style='background:rgb(99, 156, 211);color:white';   <?php } elseif($value['d'.$d]=='HD'){   ?>  style='background:rgb(247, 163, 92);color:white';   <?php } elseif($value['d'.$d]=='L'){ ?> style='background:rgb(144, 237, 125);color:white';   <?php }    ?>>
<?php 
$attend_teacher[]=$value['d'.$d];
echo $value['d'.$d]; ?></td> 
          <?php }  } }?>
          </tr>
          </tbody>
          </table>
          <div>
<?php 
 if(!empty($attend_teacher)){    
 $count_A = 0;
for($i = 0; $i < count($attend_teacher);$i++){
    if($attend_teacher[$i] == 'A')
        $count_A++;
}
 $count_P = 0;
for($i = 0; $i < count($attend_teacher);$i++){
    if($attend_teacher[$i] == 'P')
        $count_P++;
}
 $count_L = 0;
for($i = 0; $i < count($attend_teacher);$i++){
    if($attend_teacher[$i] == 'L')
        $count_L++;
}
 $count_H = 0;
for($i = 0; $i < count($attend_teacher);$i++){
    if($attend_teacher[$i] == 'HD')
        $count_H++;
}
 }



if(!empty($attend_teacher)){    ?>
<table>

<h3 style='background:black;color:white';>TOTAL WORkING DAY:<?php echo $count_P+$count_A+$count_H+$count_L ; ?></h3>
<h3 style='background:rgb(99, 156, 211);color:white';>TOTAL PRESENT:<?php echo $count_P; ?></h3>
<h3 style='background:rgb(67, 67, 72);color:white';>TOTAL ABSENT:<?php echo $count_A;?></h3>
<h3 style='background:rgb(247, 163, 92);color:white';>TOTAL HALF ATTENDANCE:<?php echo $count_H; ?></h3>
<h3 style='background:rgb(144, 237, 125);color:white';>TOTAL LEAVE:<?php echo $count_L;?></h3>
          <?php }   ?>
</div>

<script type="text/javascript">
var sub_obj = <?php echo json_encode($attend_teacher) ?>;
var count_A = 0;
for(var i = 0; i < sub_obj.length; ++i){
    if(sub_obj[i] == 'A')
        count_A++;
}
var count_P = 0;
for(var i = 0; i < sub_obj.length; ++i){
    if(sub_obj[i] == 'P')
        count_P++;
} 
var count_H = 0;
for(var i = 0; i < sub_obj.length; ++i){
    if(sub_obj[i] == 'HD')
        count_H++;
}
var count_L = 0;
for(var i = 0; i < sub_obj.length; ++i){
    if(sub_obj[i] == 'L')
        count_L++;
} 
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Attendance on the basic of month and year'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Attendance',
        data: [
            ['Present', count_P],
            ['Absent', count_A],
            ['Leave',count_L],
            ['Half Day',count_H]
        ]
    }]
});
</script>



<?php
}

public function color_feed()
{
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  $black=$this->input->post('black');
  $ad=$this->teacher_model->updateeeee($black,$staff_analysis);
  print_r($ad);

}
public function color_feed1()
{
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  echo $black=$this->input->post('black');
  $ad=$this->teacher_model->updateeees($black,$staff_analysis);
  print_r($ad);

}
public function color_feed2()
{
  $staff_pro = $this->session->userdata('stf_data');
  $staff_analysis = $staff_pro[0]['stf_id'];
  echo $black=$this->input->post('black2');
  $ad=$this->teacher_model->updateeees2($black,$staff_analysis);
  print_r($ad);

}

   public function pickup_drop()
        {
         $teacher_data = $this->session->userdata('stf_data');
         $stfid = $teacher_data[0]['stf_id'];
         $pickup_drop = $this->login_model->rutecode_fetch($stfid);
         $rute_code = $pickup_drop[0]['rute_code'];
         $pickup_drop['pass'] = $this->login_model->passenger_fetch($rute_code);
         $pickup_drop['button_chng'] = $this->login_model->passenger_fetch_button();
        $this->load->view('teacher/teacher_header');
        $this->load->view('teacher/teacher_sidebar');
        $this->load->view('teacher/teacher_footer');
        $this->load->view('teacher/pickup_drop',$pickup_drop);
        }
        
         public function pickup_drop_detail()
        {
          
        $ui=$this->input->post('pickup');
           $lat1 = $this->input->post('lat1'.$ui);      
           $long1 = $this->input->post('long1'.$ui);  

            $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat1.",".$long1."&sensor=false";
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            $address = '';

            if($status == "OK")
            {
            echo $address = $data->results[0]->formatted_address;
            }
            else
            {
            echo "No Data Found Try Again";
            }     
                
          $pickup = date("h:i:sa");
          $pickup  = array(
          'pass_name' => $this->input->post('pass_name'.$ui), 
          'class' => $this->input->post('class'.$ui), 
          'section' => $this->input->post('section'.$ui), 
          'pick_up_from' => $address, 
          'drop_place' => $this->input->post('drop_place'.$ui), 
          'pick_time' => $pickup);      
          $this->login_model->pickup_data('pickup_drop',$pickup,$ui);

          redirect('teacher_controller/pickup_drop');
        }

        public function drop_detail()
        {

          $ui1 = $this->input->post('drop');      
          $lat = $this->input->post('lat'.$ui1);      
          $long = $this->input->post('long'.$ui1);  
          $this->login_model->update_drop($ui1,$lat,$long);
          redirect('teacher_controller/pickup_drop');
        }

}
?>

