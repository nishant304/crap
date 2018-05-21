<?php
error_reporting(0);
class admission extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->database();
		$this->load->model('login_model');
    $this->load->model('student_model');
    $this->load->model('teacher_model');
    $this->load->model('parent_model');
		$this->load->library('session');
		$this->load->helper('string');
    $this->load->library('form_validation');
    $this->load->helper('directory');
    $this->load->library("pagination");
	}
     
  public function pagination() {
 
       $config = array();
 
       $config["base_url"] = base_url() . "index.php/admission/pagination";
 
       $config["total_rows"] = $this->login_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["results"] = $this->login_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
 
       $this->load->view("admin/pagination", $data);
   }

public function index()
{

  $this->load->view('admin/admin_login');
  // $this->load->view('admin/admin_footer');
}
public function register()
{
$register_count= $this->login_model->register_count();


if($register_count==0)
{
$this->load->view('admin/register');
}
else
{
  redirect('admission/index');
}
            
}
public function login_page()
{
$this->load->view('admin/login_page');
}




public function admin_insert()
{
$admin_insert = array(
    'admin_name' => $this->input->post('admin_name'),
    'admin_email' => $this->input->post('admin_email'),
    'admin_address' => $this->input->post('admin_address'),
    'admin_password' => $this->input->post('admin_password'),
    'admin_mobile' => $this->input->post('admin_mobile'));
$admin_insert = $this->login_model->insert_data('admin',$admin_insert);
redirect('admission/admin_signup');
}
public function admin_dashboard()
 {

  
       $this->load->view('admin/admin_header');
       $this->load->view('admin/admin_sidebar');
       $this->load->view('admin/index');
       $this->load->view('admin/admin_footer');

}
public function front_page()
     {
     	 $this->load->view('index.php');
     }
public function admin_login_function()
 {
  $user_email = $this->input->post('admin_email');
  $user_password = $this->input->post('admin_password');
  $data_admin = $this->login_model->admin_login($user_email,$user_password);
  foreach ($data_admin['result'] as $data_admin_new) 
    {
        $data_admin_new['admin_email'];
        $data_admin_new['admin_password'];
        $data_admin_new['admin_name']; 
          
  $this->session->set_userdata('admin_id',$data_admin_new['admin_id']);

    if($data_admin_new['admin_email'] ==  $user_email && $data_admin_new['admin_password'] == $user_password)
    {
     
      $this->admin_info($data_admin);
      redirect('admission/admin_info');
    }else{
      redirect('admission/');
    }
    }
    }
public function admin_info($data_admin = '')
{  
   $dass['grop_subj']=$this->login_model->grop_subj();
   for($ool=0;$ool<count($dass['grop_subj']);$ool++)
   {
    $sub_per[]=$dass['grop_subj'][$ool]['subject'];
   }
   for($lm=0;$lm<count($sub_per);$lm++)
   {
   $dass['grop_subj_per'][$dass['grop_subj'][$lm]['subject']]=$this->login_model->grop_subj_per($sub_per[$lm]);
   }

   $birthday = $this->login_model->admin_color();

      $this->session->set_userdata('admin_sidebar',$birthday[0]['admin_sidebar']);
      $this->session->set_userdata('admin_background',$birthday[0]['admin_background']);
      $this->session->set_userdata('admin_header',$birthday[0]['admin_header']);
      $birthday['dob'] = $this->login_model->stu_birthday();
      $birthday['df'] =$this->login_model->message_create($birthday);
      $birthday =  $this->login_model->class_fetch();
      $birthday['stff_fetch']=$this->login_model->stff_fetch();
      $dass['all_rows'] = $this->login_model->dash_data();
      $this->session->set_userdata($data_admin,'data_admin');
      $this->session->set_userdata($dass);
      $this->load->view('admin/admin_header',$data_admin);
      $this->load->view('admin/admin_sidebar',$dass);
      $this->load->view('admin/index',$birthday);
      $this->load->view('admin/admin_footer');
      
}
public function student_admission()
{
	 	$this->load->view('admin/admin_header');
	 	$this->load->view('admin/admin_sidebar');
	 	$this->load->view('admin/student_reg');
	 	$this->load->view('admin/admin_footer');
}
public function  staff_timr()
{
 $staff_analysis=$this->input->post('staff_timr');
 $staff_analy['staff']=$this->login_model->staff_timr($staff_analysis);

for($xz=0;$xz<count($staff_analy['staff']);$xz++)
{
 $tch_class['sub_name'][]=$staff_analy['staff'][$xz]['sub_name'];
 $tch_class['assign_class'][]=$staff_analy['staff'][$xz]['assign_class'];
 $tch_class['assign_section'][]=$staff_analy['staff'][$xz]['assign_section'];
}
for($jk=0;$jk<count($tch_class['sub_name']);$jk++)
{
$staff_table['staff_table']=$this->login_model->staff_table($tch_class['assign_class'][$jk],$tch_class['assign_section'][$jk]);      
}
// print_r($staff_table);       
?>
<table>
<tr>       
<th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
</tr>
<tr>       
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
</tr>
</table>       
<?php        
}
public function  staff_analysis()
{
$staff_analysis=$this->input->post('staff_analysis');
$staff_tch['staff_analysis']=$this->login_model->staff_analysis($staff_analysis);
$staff_ana=$this->input->post('staff_analysis');
$staff_subject=$this->login_model->staff_ana($staff_ana);
for($dh=0;$dh<count($staff_subject);$dh++)
{
$subjj[]=$staff_subject[$dh]['sub_name'];
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
}

?>
<table class="table-bordered">
<tr>
  <th>Class</th>
  <th>Section</th>
  <th>Subject</th>
</tr>
<?php  for($jhg=0;$jhg<count($staff_tch['staff_analysis']);$jhg++){   ?>
<tr>
  <td><?php echo $staff_tch['staff_analysis'][$jhg]['assign_class'];   ?></td>
   <td><?php echo $staff_tch['staff_analysis'][$jhg]['assign_section'];   ?></td>
    <td><?php echo $staff_tch['staff_analysis'][$jhg]['sub_name'];   ?></td>
</tr>
<?php } ?>
</table>
<div id="chart-container"></div>

<script type="text/javascript">
FusionCharts.ready(function() {
  var salesChart = new FusionCharts({
      type: 'msline',
      renderAt: 'chart-container',
      width: '1000',
      height: '400',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "caption": "Marks Performance",
          "subcaption": "",
          "linethickness": "5",
          "numberPrefix": "",
          "showvalues": "0",
          "formatnumberscale": "1",
          "labeldisplay": "ROTATE",
          "slantlabels": "1",
          "divLineAlpha": "40",
          "anchoralpha": "0",
          "animation": "1",
          "legendborderalpha": "20",
          "drawCrossLine": "1",
          "crossLineColor": "#0d0d0d",
          "crossLineAlpha": "100",
          "tooltipGrayOutColor": "#80bfff",
          "theme": "zune"
        },
        "categories": [{
          "category": [
           <?php for($ewrt=0;$ewrt<count($subjj);$ewrt++){ ?>
          {
            "label": <?php echo json_encode($subjj[$ewrt]);  ?>
          }
          <?Php if($ewrt!=count($subjj)-1) { ?>
          , 
          <?php  }  ?>

           <?php } ?>  ]
        }],
        "dataset": [
        {
          "seriesname": ''
          ,
          "data": [
<?php $er=0; for($ewi=0;$ewi<count($average);$ewi++){    ?>
 {  
  <?php   if(!empty($average[$subjj[$ewi]])) {      ?>
  "value": <?php echo json_encode($average[$subjj[$er]]);?>
  <?php   } else {  ?>
  "value": 0
  <?php }  ?>
          }
<?Php if($ewi!=count($average)-1) { ?>
          , 
     <?php  } $er++;  }  ?> ]}, ]
 }
    })
    .render();
});
</script>
<?php
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

	function admin_logout()
	{
  	$this->session->unset_userdata('admin_email');
  	$this->session->unset_userdata('admin_password');
  	$this->session->sess_destroy();
	  redirect('admission/index');
	}

	function student_record()
	{
  	$all_data = $this->login_model->all_student();
    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/student_record',$all_data);
  	$this->load->view('admin/admin_footer');
	}
	function student_delete()
	{
		$student_id = $this->uri->segment(3);
		$data_admin = $this->login_model->student_remove($student_id);
		redirect('admission/user_listed');
	}
	function ebook_delete()
	{
		$ebook_id = $this->uri->segment(3);
		$data_admin = $this->login_model->ebook_remove($ebook_id);
		redirect('admission/student_file_upload');
	}

	
	public function student_data_update()
	{
	 $student_id = $this->uri->segment(3);
	 $data_stu['data1'] = $this->login_model->student_record_update($student_id);
    $this->load->view('admin/admin_header');
	  $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/update_student_record',$data_stu);
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
	   redirect('admission/student_record');
	}


    public function subject_delete()
    {
    	$sub_id = $this->uri->segment(3);	
    	$this->login_model->subject_remove($sub_id);
    	redirect('admission/add_subject');
    }

    public function upload_assignment()
    {

    $config = array(
    	'upload_path' => "application/assets/uploads",
    	'allowed_types' => "gif|jpg|png|jpeg|pdf|ppt|pptx",
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
   'assign_desc' => $this->input->post('assign_desc'),
   'assign_file' => $upload_data['file_name']);

   if($add_assignment != '')
   {
   $this->login_model->insert_data('assignment',$add_assignment);
   redirect('admission/add_assignment');
   }
   redirect('admission/add_assignment');
   }
   }
   public function assignment_delete()
   {
   $assignment_id = $this->uri->segment(3);	
   $this->login_model->assignment_remove($assignment_id);
   redirect('admission/add_assignment');
   }
 
 public function do_upload()
   {
   $config = array(
'upload_path' => "application/assets/uploads",
'allowed_types' => "gif|jpg|png|jpeg|pdf|pptx|ppt",
'overwrite' => 'TRUE',
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
      'notes_batch' => $this->input->post('notes_batch'),
      'notes_for_class' => $this->input->post('notes_for_class'),
      'notes_for_section' => $this->input->post('notes_for_section'),
      'notes_subject' => $this->input->post('notes_subject'),
      'submitted_by' => $this->input->post('submitted_by'),
      'notes_file' => $upload_data['file_name']);

 $this->login_model->insert_data('notes',$data_post);
   redirect("admission/student_file_upload");
 
}
}
public function student_file_upload(){
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/student_file_upload";
  $config["total_rows"] = $this->login_model->record_count('notes');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'notes');
  $data["links"] = $this->pagination->create_links();
	$upload_data['class_data'] = 	$this->login_model->class_fetch();
    $upload_data['ebook_data'] = $this->login_model->get_all_file();
    	$this->load->view('admin/admin_header');
    	$this->load->view('admin/admin_sidebar',$data);
    	$this->load->view('admin/add_notes',$upload_data);
    	$this->load->view('admin/admin_footer');
    }
  public function add_staff(){

      $this->load->view('admin/admin_header');
  	  $this->load->view('admin/admin_sidebar');
      $this->load->view('admin/staff_details');
      $this->load->view('admin/admin_footer');
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
      redirect('admission/add_user');
    }
  public function fees_detail(){
      $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar');
    	$this->load->view('admin/fees_detail');
    	$this->load->view('admin/admin_footer');
    }
  public function add_subject($message='')
    {
  $msg['msg']=$message;
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/add_subject";
  $config["total_rows"] = $this->login_model->record_count('add_subject');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'add_subject');
  $data["links"] = $this->pagination->create_links();
 $class['class_data'] = 	$this->login_model->class_fetch();
    // $all_subject['subject'] = $this->login_model->all_subject();
      $this->load->view('admin/admin_header',$class);
      $this->load->view('admin/admin_sidebar',$msg);
      $this->load->view('admin/add_subject',$data);
     	$this->load->view('admin/admin_footer');
    }
  public function add_new_subject(){
 $all_subject['subject'] = $this->login_model->all_subject();
 $this->form_validation->set_rules('sub_name','Subject name','required');
 $this->form_validation->set_rules('class_id','Class','required');
 $this->form_validation->set_rules('class_section','Class section','required');
      if($this->form_validation->run()==FALSE)
      {

        $this->add_subject();
      }
      else
      {


      $add_subject = array(
        'sub_name' => $this->input->post('sub_name'),
        'class_id' => $this->input->post('class_id'),
        'class_section' => $this->input->post('class_section')
        );
         $ion=0;
        foreach ($all_subject['subject'] as $key) {
          if($add_subject['sub_name'] == $key['sub_name'] && $add_subject['class_id'] == $key['class_id']){
          $ion++;
          }
        }
if($ion == 0)
{
    $this->login_model->insert_data('add_subject',$add_subject);
}
    $message = "already exist";
    $this->add_subject($message);

}
}
public function add_class($message='')
    { 
  $msg['msg']=$message;
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/add_class";
  $config["total_rows"] = $this->login_model->record_count('add_class');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'add_class');
  $data["links"] = $this->pagination->create_links();

 // $class['all_class']=$this->login_model->all_class();
    	$this->load->view('admin/admin_header',$msg);
    	$this->load->view('admin/admin_sidebar');
  		$this->load->view('admin/add_class',$data);
  		$this->load->view('admin/admin_footer');
      }
      public function assign_teacher(){
    	$this->load->view('admin/admin_header');
    	$this->load->view('admin/admin_sidebar');
  		$this->load->view('admin/assign_teacher');
  		$this->load->view('admin/admin_footer');
      }
      public function assign_class_teacher(){
      $assign_class_teacher = array(
	    'tch_id' => $this->input->post('tch_id'),
      'assign_class' => $this->input->post('assign_class'),
      'sub_name' => $this->input->post('sub_name'),
      'assign_by' => $this->input->post('assign_by'),
      'assign_date' => $this->input->post('assign_date')
      );
      $this->login_model->insert_data('assign_sub_teacher',$assign_class_teacher);
	    redirect('admission/assign_teacher');
      } 
  
      public function marks()
      {
      $class['class_data']=$this->login_model->class_fetch();
      $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar');
      $this->load->view('admin/admin_footer');
      $this->load->view('admin/marks',$class);
      }
    
       public function test_marks(){
      $class['class_data']=$this->login_model->class_fetch();
      $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar');
      $this->load->view('admin/admin_footer');
      $this->load->view('admin/test_marks',$class);
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
echo form_open('admission/fetchname'); 
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

      $this->load->view('admin/admin_footer');
      return $result_std;
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

      $this->load->view('admin/admin_footer');
      return $result_std;
      }

    public function fetchname()
    {
        $name = $this->input->post();
        $fet_names=$this->login_model->fetch_names($name['nameid']);
        $this->session->set_userdata('fet_name',$fet_names);
        redirect('admission/marks');
    }
    public function add_classes()
    {

      $this->form_validation->set_rules('class_name',' class name','required');
      $this->form_validation->set_rules('class_section','class section','required');
      if ($this->form_validation->run() == FALSE) { 
      
         $this->add_class();
         } 
         else 
         {

	     $add_classes = array(
       'class_name' => $this->input->post('class_name'),
	     'class_section' => $this->input->post('class_section')
	   );
	
      $class_name=$this->input->post('class_name');
      $class_section=$this->input->post('class_section');
      $class_exist=$this->login_model->class_exist($class_name,$class_section);
      if($class_exist==0){
      $this->login_model->insert_data('add_class',$add_classes);
	     redirect('admission/add_class');
      }
      else{
	        $massage = "class is already esist";
           $this->add_class($massage);
          } 	
      }
    }
  public function add_class_incharge($message='')
  {
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/add_class_incharge";
  $config["total_rows"] = $this->login_model->record_count('add_class');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'add_class');
  $data["links"] = $this->pagination->create_links();
  $class['teacher'] = $this->login_model->all_staff();
  $class['all_class']=$this->login_model->all_class();
  $msg['msg']=$message;
  $this->load->view('admin/admin_header',$msg);
  $this->load->view('admin/admin_sidebar',$data);
  $this->load->view('admin/add_class_incharge',$class);
  $this->load->view('admin/admin_footer');
 }
 public function insert_class_incharge()
 {
      $this->form_validation->set_rules('class_name','class name','required');
      $this->form_validation->set_rules('class_section','class section','required');
      $this->form_validation->set_rules('class_incharge','class incharge','required');
      if($this->form_validation->run()==FALSE)
      {
        $this->add_class_incharge();
      }
      else
      {




          $add_class_incharge = array(
          'class_incharge' => $this->input->post('class_incharge')
    );
	
      $class_name=$this->input->post('class_name');
      $class_section=$this->input->post('class_section');
      $class_incharge=$this->input->post('class_incharge');

      $class_incharge_exist=$this->login_model->class_incharge_exist($class_name,$class_section,$class_incharge);

      foreach ($class_incharge_exist as $key => $value) {
	     $class_incharge_exist =$value['class_incharge'];

	 
    if($class_incharge_exist==''){
      $this->login_model->update_data('add_class',$add_class_incharge,$class_name,$class_section,$class_incharge);
	     redirect('admission/add_class_incharge');
        }
        else
            {
	         $message = "Incharge already exist for this class/section firstly remove this then assign new";
            $this->add_class_incharge($message);
	         }
	} 	
}
}
public function class_remove()
{
 $cls_id = $this->uri->segment(3);
$this->login_model->delete_class($cls_id);
redirect('admission/add_class');
}
public function remove_incharge($id='')
    {
    	$remove=$this->login_model->remove_class($id);
    	redirect('admission/add_class_incharge');

}
public function assign_rol_sec()
    {
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/assign_rol_sec";
  $config["total_rows"] = $this->login_model->record_count('admission');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'admission');
  $data["links"] = $this->pagination->create_links();

	$all_data = $this->login_model->all_student();
  $class['all_class']=$this->login_model->all_class();
    	$this->load->view('admin/admin_header',$class);
    	$this->load->view('admin/admin_sidebar',$data);
	  	$this->load->view('admin/assign_rol_sec',$all_data);
	  	$this->load->view('admin/admin_footer');
    }

    public function section()
{
  $evnt_clas = $this->input->post('value');
  $evnt_nm = $this->input->post('evnt_nm');
   $all_evnt_data['evnt_section'] = $this->login_model->evnt_nm_fetch('class',$evnt_clas,'event_name',$evnt_nm,'add_event');


  $all_evnt_data['evnt_clas'] = $this->login_model->detail_fetch('event_name',$evnt_nm);
  $evtcls = $all_evnt_data['evnt_clas'][0]['section'];
   if($evtcls=='all')
   {
     $clas['cla_all'] = $this->login_model->class_all_section_fetch($evnt_clas);?>
      <select class="form-control" >  
              <option value="">Select</option>
              <?php foreach ($clas['cla_all'] as $key => $sec) { print_r($sec);?>
                <option value="<?php echo $sec['class_section'];?>"><?php echo $sec['class_section']; ?></option>
         <?php } }
      else { ?>
              </select>

    
           <select class="form-control" >  
              <option value="">Select</option>
              <?php foreach ($all_evnt_data['evnt_section'] as $key => $section) { ?>
                <option value="<?php echo $section['section']; ?>"><?php echo $section['section']; ?></option>
                <?php } ?>
              </select>

<?php }}
public function participate_stu()
     {
         
      $clss = $this->input->post('clas');
      $section = $this->input->post('section');
      $all_std_name['name'] = $this->login_model->evnt_nm_fetch('std_class',$clss,'std_section',$section,'admission');
     
       ?>
          <select class="form-control">
          <option value="None">select</option> 
          <?php
          foreach ($all_std_name['name'] as $key) {
          ?>
          <option value="<?php echo $key['std_fname'];?> <?php echo $key['std_lname'];?>/<?php echo $key['std_roll_no'];?>">
          <?php echo $key['std_fname'];?> <?php echo $key['std_lname'];?>/<?php echo $key['std_roll_no'];?></option>
          <?php } ?>
          </select> 
          <?php 
      }
public function assign_roll_section()
    {

    	echo $section=$this->input->post('section');
    	echo $std_id=$this->input->post('std_id');

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
}
}
 public function exam_detail()
    {
   	$class['class_data'] = 	$this->login_model->class_fetch();
   	$result_exam['exam_data'] =	$this->login_model->exam_fetch();
    $all_subject['subject'] = $this->login_model->all_subject();

  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/exam_detail";
  $config["total_rows"] = $this->login_model->record_count('exam_detail');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'exam_detail');
  $data["links"] = $this->pagination->create_links();



    	$this->load->view('admin/admin_header',$all_subject);
    	$this->load->view('admin/admin_sidebar',$data);
      $this->load->view('admin/admin_footer');
      $this->load->view('admin/exam_detail1',$class);
    }

public function daily_basis()
    {
    $class['class_data'] =  $this->login_model->class_fetch();
    // $result_exam['exam_data'] = $this->login_model->test_exam_fetch();
    $all_subject['subject'] = $this->login_model->all_subject();

  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/daily_basis";
  $config["total_rows"] = $this->login_model->record_count('test_detail');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'test_detail');
  $data["links"] = $this->pagination->create_links();




      $this->load->view('admin/admin_header',$all_subject);
      $this->load->view('admin/admin_sidebar',$data);
      $this->load->view('admin/admin_footer');
      $this->load->view('admin/daily_basis',$class);
    }
public function date_sheet()
    {
    $class['class_data'] =  $this->login_model->class_fetch();
    $result_exam['exam_data'] = $this->login_model->exam_fetch();
    $all_subject['subject'] = $this->login_model->all_subject();

      $this->load->view('admin/admin_header',$all_subject);
      $this->load->view('admin/admin_sidebar',$result_exam);
      $this->load->view('admin/exam_detail',$class);
      $this->load->view('admin/admin_footer');
    }

public function test_date_sheet()
    {



    $result_exam['exam_data'] = $this->login_model->test_exam_fetch();
      $this->load->view('admin/admin_header',$all_subject);
      $this->load->view('admin/admin_sidebar',$result_exam);
      $this->load->view('admin/test_detail',$class);
      $this->load->view('admin/admin_footer');
    }




public function time_table()
{
echo $class_name=$this->input->post('class_name');
echo $class_section=$this->input->post('class_section');

$table_fetch['table_fetch']=$this->login_model->time_table_fetch($class_name,$class_section);
$table_fetch['dtable_fetch']=array(
  'class_name'=>$this->input->post('class_name'),
  'class_section'=>$this->input->post('class_section')
  );


 
$class['all_class']=$this->login_model->all_class();
    $this->load->view('admin/admin_header',$fetch);
    $this->load->view('admin/admin_sidebar',$table_fetch);
		$this->load->view('admin/time_table',$class);
		$this->load->view('admin/admin_footer');
}

public function  fet_cls_tim()
{
 $class= $this->input->post('clsd');
 $class_sec= $this->input->post('uristring');
 $fet_cls_tim=$this->login_model->time_table_fetchww($class,$class_sec);
?>
<table>
<tr>
  <th>Start Time</th>
    <th>End Time</th>
      <th>Monday</th>
        <th>Tuesday</th>
          <th>Wednesday</th>
            <th>Thrusday</th>
              <th>Friday</th> 
                 <th>Saturday</th>

</tr> 
<?php for($vb=0;$vb<count($fet_cls_tim);$vb++){    ?> 
<tr>
  <td><?php  echo $fet_cls_tim[$vb]['class_start_time']   ?></td>
   <td><?php  echo $fet_cls_tim[$vb]['class_end_time']   ?></td>
    <td><?php  echo $fet_cls_tim[$vb]['monday']   ?></td>
     <td><?php  echo $fet_cls_tim[$vb]['tuesday']  ?></td>
      <td><?php  echo $fet_cls_tim[$vb]['wednesday']   ?></td>
       <td><?php  echo $fet_cls_tim[$vb]['thursday']   ?></td>
        <td><?php  echo $fet_cls_tim[$vb]['friday']   ?></td>
         <td><?php  echo $fet_cls_tim[$vb]['saturday']   ?></td>
</tr>
<?php   }   ?>

</table>

<?php
} 	
public function time_table_select()
{
 $class_sel= $this->input->post('class');
 $class_id['class_sub']=$this->login_model->all_sub_section($class_sel);

       ?>
<select class="form-control">
<option value="">select</option> 
<?php
foreach ($class_id['class_sub'] as $key) {
	?>
	<option value="<?php echo $key['class_section'];?>">
	<?php echo $key['class_section'];?></option><?php
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

public function time_table_subject_fetch()
{
echo $sec=$this->input->post('sec');
echo $cls=$this->input->post('clas');
$class_idt['class_subt']=$this->login_model->time_table_subject_fetch($cls,$sec);
?>
<select class="form-control">
<option value="">select</option> 
<?php
foreach ($class_idt['class_subt'] as $key) {
  ?>
  <option value="<?php echo $key['sub_name'];?>">
  <?php echo $key['sub_name'];?></option><?php
}
?>
</select>
<?php
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

echo 'inserted'; 
if($count_exist!='')
{
	$subject=$this->input->post('subject');
 $clas=$this->input->post('clas');
 $section=$this->input->post('section');
 $end=$this->input->post('end');
 $start=$this->input->post('start');
 $day=$this->input->post('day');

$this->login_model->update_dat('class_time_table',$subject,$day,$start,$end,$clas,$section);




}
else{
	$time_table_insert = array(
   'class_end_time' => $this->input->post('end'),
   'class' => $this->input->post('clas'),
	'class_section' => $this->input->post('section'),
	'class_start_time' => $this->input->post('start')
	);

$this->login_model->insert_data('class_time_table',$time_table_insert);
}
}

public function assign_subject_class($error_message = '')
    {
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/assign_subject_class";
  $config["total_rows"] = $this->login_model->record_count('assign_sub_teacher');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'assign_sub_teacher');
  $data["links"] = $this->pagination->create_links();
 $all_teacher['teacher'] = $this->login_model->all_staff();
 $all_subject['subject'] = $this->login_model->all_subject();
 $class['class_data'] = 	  $this->login_model->class_fetch();
 $class['assign_teacher'] = $this->login_model->all_assign_sub();
 $this->load->view('admin/admin_header',$all_teacher);
 $this->load->view('admin/admin_sidebar',$all_subject);
 $this->load->view('admin/admin_footer',$data);
 $this->load->view('admin/subject_teacher',$class);
    }	
 public function assign_subject_teacher()
    {
    	
    	$date = date('Y-m-d H:i:s');
    $tch_name=$this->input->post('tch_name');
$techo=explode('/', $tch_name);
    	$assign_sub = array(
'tch_name' => $techo[1],
'tch_id' => $techo[0],
'assign_class' => $this->input->post('assign_class'),
'assign_section' => $this->input->post('assign_section'),
'sub_name' => $this->input->post('sub_name'),
// 'assign_by' => $this->input->post('assign_by'),
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
redirect('admission/assign_subject_class');	
}
    }

public function assign_sub_delete()
{
$assign_id = $this->uri->segment(3);
$data_assign = $this->login_model->assign_remove($assign_id);
redirect('admission/assign_subject_class');

}



public function add_notice()
      { 
      $notice_data['teacher'] = $this->login_model->all_staff();
    	$notice_data['notice'] = $this->login_model->notice_get();

  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/add_notice";
  $config["total_rows"] = $this->login_model->record_count('add_notice');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'add_notice');
  $data["links"] = $this->pagination->create_links();


       for($oi=0;$oi<count($notice_data['notice']);$oi++)
      {
      if(date('Y-m-d')==$notice_data['notice'][$oi]['remove_date'])
      {
        $id=$notice_data['notice'][$oi]['notice_id'];
      $this->login_model->update_data_notice('add_notice',$id);
      }
      }
      $this->load->view('admin/admin_header');
   	  $this->load->view('admin/admin_sidebar',$data);
    	$this->load->view('admin/add_notice',$notice_data);
   	  $this->load->view('admin/admin_footer');
     }
    public function add_new_notice()
    {
      $notice_data['notice'] = $this->login_model->notice_get();

    	$date = date('Y-m-d H:i:s');
    	$insert_notice = array(
'notice_name' => $this->input->post('notice_name'),
'notice_date' => $this->input->post('notice_date'),
'remove_date' => $this->input->post('remove_date'),
'notice_desc' => $this->input->post('notice_desc'),
'submit_by' => $this->input->post('submit_by'),
'submit_date' =>$date);
    $this->login_model->insert_data('add_notice',$insert_notice);
    redirect('admission/add_notice/');
    }
    public function notice_delete()
    {
    	$notice_id = $this->uri->segment(3);
    	$this->login_model->notice_remove($notice_id);
    	redirect('admission/add_notice');
    }


    
public function all_staff()
    {
    	 $all_teacher['teacher'] = $this->login_model->all_staff();
    	 $this->load->view('admin/admin_header');
   	 $this->load->view('admin/admin_sidebar');
    	$this->load->view('admin/staff_record',$all_teacher);
   	 $this->load->view('admin/admin_footer');

    }

public function staff_delete()
    {
      $staff_id = $this->uri->segment(3);


      $this->login_model->staff_remove($staff_id);
      redirect('admission/all_staff');
    }
public function update_asn_tec()
    {
    $value=$this->input->post('value');
    $hid=$this->input->post('hid');
    $id=$this->input->post('ids');

    $this->login_model->update_asn_tec($value,$hid,$id);
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
$subbj =$this->login_model->all_sub($class_id,$class_section);
$this->session->set_userdata('subbj',$subbj);
redirect('admission/exam_detail');
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
redirect('admission/daily_basis');
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
redirect('admission/exam_detail');

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
  'description' => $this->input->post('description'),
  'test_end_time' => $this->input->post('test_end_time')
  );

$sub=$this->input->post('subject');
foreach ($examm_insert as $key => $value) {
 $arr_insert[$key]=$value;
}
// print_r($arr_insert);
$this->login_model->insert_data_test('test_detail',$test_insert,$sub);
redirect('admission/daily_basis');

}
    
public function exam_delete()
    {
      $exam_id = $this->uri->segment(3);
      $this->login_model->exam_remove($exam_id);
      redirect('admission/date_sheet');
    }
    public function test_delete()
    {
      $exam_id = $this->uri->segment(3);
      $this->login_model->test_remove($exam_id);
      redirect('admission/test_date_sheet');
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
public function class_record_sub()
    {  
    $classs =$this->input->post('classs');
    $section =$this->input->post('section');
     $value_sub1['value_sub1']=$this->login_model->value_subject($classs,$section);
?>
       <select class="form-control">
<option value="">Select</option> 
<option value="all">All</option> 
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

public function class_record_xam_typp()
    {  
    $classs =$this->input->post('classs');
    $section =$this->input->post('section');

     $value_s['value_s']=$this->login_model->value_xam_tpp($classs,$section);
?>
       <select class="form-control">
<option value="">Select</option> 
<?php
foreach ($value_s['value_s'] as $key) {
?>
<option value="<?php echo $key['exam_type'];?>">
<?php echo $key['exam_type'];?></option><?php
}
?>
</select>
<?php

}


public function class_exam_type()
{
$uristring1 =$this->input->post('uristring');
$value_sub2['value_sub2']=$this->login_model->value_exam_type($uristring1);
?>
<select class="form-control">
<option value="">select</option> 
<?php
foreach ($value_sub2['value_sub2'] as $key) {
?>
<option value="<?php echo $key['exam_type'];?>">
<?php echo $key['exam_type'];?></option><?php
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

echo json_encode($value_sub6['value_sub6']);

if($secc!='all'){
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
}

public function student_month()
{

$type =$this->input->post('type');
$clss =$this->input->post('clss');
$secc =$this->input->post('secc');
$monthe =$this->input->post('monthe');
$yearr =$this->input->post('yearr');
$val['val']=$this->login_model->student_month($type,$clss,$secc,$monthe);
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
public function class_record_exam_typee()
    {
$sub =$this->input->post('sub');
$clss =$this->input->post('clss');
$secc =$this->input->post('secc');

$value_su['value_su']=$this->login_model->class_record_exam_typee($sub,$clss,$secc);

print_r($value_su['value_su']);


?>
       <select class="form-control">
<option value="">select</option> 
<?php
foreach ($value_su['value_su'] as $key) {
?>
<option value="<?php echo $key['exam_date'];?>">
<?php echo $key['exam_date'];?></option><?php
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

public function class_record_exam_idd()
{
$clss =$this->input->post('clss');
$secc =$this->input->post('secc');
$xam =$this->input->post('xam');
$dat =$this->input->post('dat');
$mon =$this->input->post('mon');
$value_sub8['value_sub8']=$this->login_model->class_record_exam_idd($clss,$secc,$xam,$dat,$mon);
for($vb=0;$vb<count($value_sub8['value_sub8']);$vb++)
{
$arr_subject[]=$value_sub8['value_sub8'][$vb]['subject'];

}
for($cv=0;$cv<count($arr_subject);$cv++)
{
$subject_group[$cv]=$this->login_model->subject_group($clss,$secc,$xam,$dat,$mon,$arr_subject[$cv]);
}
$rt=0;
for($vv=0;$vv<count($subject_group);$vv++)
{
for($oo=0;$oo<count($subject_group[$vv]);$oo++)
{
$std_iddd[]=$subject_group[$vv][$oo]['std_id'];
$grop_id[$arr_subject[$vv]][]=$subject_group[$vv][$oo]['std_id'];
$grop_marks[$arr_subject[$vv]][]=$subject_group[$vv][$oo]['marks_obtain'];
$grop_out_of[$arr_subject[$vv]][]=$subject_group[$vv][$oo]['max_mark'];

$grop_per[$arr_subject[$vv]][]=$subject_group[$vv][$oo]['marks_obtain']*100/$subject_group[$vv][$oo]['max_mark'];

$grop_batch[$arr_subject[$vv]][]=$subject_group[$vv][$oo]['batch'];
$grop_sub[$arr_subject[$vv]][]=$subject_group[$vv][$oo]['subject'];
} 
}
$std_name['std_name']=$this->login_model->std_iddd($std_iddd);
?>
<div id="chart-container"></div>
<script type="text/javascript">
FusionCharts.ready(function() {
  var salesChart = new FusionCharts({
      type: 'msline',
      renderAt: 'chart-container',
      width: '1000',
      height: '490',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "caption": "Marks Performance",
          "subcaption": "",
          "linethickness": "2",
          "numberPrefix": "",
          "showvalues": "0",
          "formatnumberscale": "1",
          "labeldisplay": "ROTATE",
          "slantlabels": "1",
          "divLineAlpha": "40",
          "anchoralpha": "0",
          "animation": "1",
          "legendborderalpha": "20",
          "drawCrossLine": "1",
          "crossLineColor": "#0d0d0d",
          "crossLineAlpha": "100",
          "tooltipGrayOutColor": "#80bfff",
          "theme": "zune"
        },
        "categories": [{
          "category": [
           <?php for($ew=0;$ew<count($arr_subject);$ew++){ ?>
          {
            "label": <?php echo json_encode($arr_subject[$ew]);  ?>
          }
          <?Php if($ew!=count($arr_subject)-1) { ?>
          , 
          <?php  }  ?>

           <?php } ?>  ]
        }],
        "dataset": [
<?php   for($ewi=0;$ewi<100;$ewi++){     ?>
        {
          "seriesname": <?php echo json_encode($std_name['std_name'][$grop_id[$arr_subject[0]][$ewi]][0]['std_fname']);  ?>,
          "data": [
<?php   for($ewio=0;$ewio<count($arr_subject);$ewio++){     ?>
          {
            "value": <?php echo json_encode($grop_per[$arr_subject[$ewio]][$ewi]);  ?>
          }, 
      <?php  }   ?>
          
          ]

  }, 
        <?Php  }   ?>




 ]

 
      }
    })
    .render();
});
</script>















<?php
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
  $description =$value_sub8['value_sub8']['description'];
 $name6 = $this->session->set_userdata('description',$description);
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
$month = $this->input->post('month');
$year = $this->input->post('year');
if ($marks_obtain > 100)
{ 
echo "Number is greater than out of number";
 return false;
}
else
{
$add_class_marks = array(
'class_id' => $this->input->post('class_id'),
'class_section' => $this->input->post('class_section'),
'marks_obtain' => $this->input->post('marks_obtain'),
'std_id' => $this->input->post('std_id'),
'exam_type' => $this->input->post('exam_type'),
'exam_id' => $this->input->post('exam_id'),
'batch' => $this->input->post('batch'),
'subject' => $this->input->post('subject'),
'max_mark' => $this->input->post('max_mark'),
'month' => $this->input->post('month'),
'year' => $this->input->post('year')
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
$description = $this->input->post('description');
$month = $this->input->post('month');
$year = $this->input->post('year');
$add_class_marks = array(
'class_id' => $this->input->post('class_id'),
'class_section' => $this->input->post('class_section'),
'marks_obtain' => $this->input->post('marks_obtain'),
'std_id' => $this->input->post('std_id'),
'test_type' => $this->input->post('exam_type'),
'test_id' => $this->input->post('exam_id'),
'batch' => $this->input->post('batch'),
'subject' => $this->input->post('subject'),
'max_mark' => $this->input->post('max_mark'),
'description' => $this->input->post('description'),
'month' => $this->input->post('month'),
'year' => $this->input->post('year')
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

    // $this->session->set_userdata($data_admin);
     
      redirect('admission/marks');
     
    }


  public function index_marks_stored()
    {
     
     
      $data_mak = array(
              'class_id'=>$this->input->post('class_id'),
              'class_section'=>$this->input->post('class_section'),
              'subject'=>$this->input->post('subject'),
              'exam_type'=>$this->input->post('exam_type'),
              'exam_date'=>$this->input->post('exam_date'),
              'exam_id'=>$this->input->post('exam_id')
              
               );
      $this->session->set_userdata('makks1',$data_mak); 

    // $this->session->set_userdata($data_admin);
     
      redirect('admission/admin_info');
     
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
    $this->session->set_userdata('test_makks',$data_mak); 
    redirect('admission/test_marks');
    }

    //sachin
public function attendance_report()
{
$sellect_date = $this->input->post('date_select1');
$this->session->set_userdata('date_flash',$sellect_date);
$select_class = $this->session->userdata('cls');
$select_sec = $this->session->userdata('sect');
$class['class_data'] = $this->login_model->class_fetch1($sellect_date,$select_class,$select_sec);
$this->load->view('admin/admin_header');
$this->load->view('admin/admin_sidebar',$sellect_date);
$this->load->view('admin/attendance_report',$class);
$this->load->view('admin/admin_footer');
}

public function check()
{
$this->load->view('admin/admin_header');
$this->load->view('admin/admin_sidebar');
$this->load->view('admin/check');
$this->load->view('admin/admin_footer');
}
public function stu_ajx_fetch()
{
$cls_all = $this->input->post('class3');
$sec_all = $this->input->post('sec3');
$data_stu['all_std'] = $this->login_model->all_std($cls_all,$sec_all);
$this->session->set_flashdata('in',$data_stu);
$this->session->set_userdata('cls',$cls_all);
$this->session->set_userdata('sect',$sec_all);
$this->load->view('admin/attendance_report');
}
public function stu_attandance_set()
{ 
$select_date = $this->session->userdata('date_flash');
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
redirect('admission/attendance_report');
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


 public function all_std($cls_all,$sec_all)
      {
        $this->db->select('*');
        $this->db->from('admission');
        $this->db->where('std_class',$cls_all);
        $this->db->where('std_section',$sec_all);
       $query = $this->db->get();
       $result_std  = $query->result_array();
       return $result_std;
      }
public function all_sec($cls_all)
{
$this->db->select('*');
$this->db->from('add_class');
$this->db->where('class_name',$cls_all);
$query = $this->db->get();
$result_sec  = $query->result_array();
return $result_sec;
}

public function std_fetch($uristring,$clss)
{
 $this->db->select('*');
 $this->db->from('admission');
 $this->db->where('std_class',$clss);
 $this->db->where('std_section',$uristring);
 $query = $this->db->get();
 $result_std  = $query->result_array();
 return $result_std;
}

public function authority()
{
$all_teacher['teacher'] = $this->login_model->all_staff();
$this->load->view('admin/admin_header');
$this->load->view('admin/admin_sidebar');
$this->load->view('admin/admin_footer');
$this->load->view('admin/authorities',$all_teacher);
}

public function role_permission()
{
// $all_teacher['role_perm'] = $this->login_model->role_perm();  
$all_teacher['teacher'] = $this->login_model->all_staff();
$this->load->view('admin/admin_header');
$this->load->view('admin/admin_sidebar');
$this->load->view('admin/admin_footer');
$this->load->view('admin/role_permission',$all_teacher);
}
public function role_staff()
{
  $role_staff=$this->input->post('role_staff');
  $this->session->set_userdata('role_staff',$role_staff);
  $all_teacher['role_perm'] = $this->login_model->role_perm($role_staff);  
  echo "refresh";
  $this->session->set_userdata('role_perm',$all_teacher['role_perm']);
}
public function assign_authority()
{
$this->input->post('stf_id');
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
$this->login_model->authority_set($authority_data);
redirect('admission/authority');

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
redirect('admission/authority');
}
    



public function fee_detail()
      {
        $id = $this->uri->segment(3); 
          $all_subject['subject'] = $this->login_model->all_subject();
          $class['class_data'] =   $this->login_model->class_fetch();
          $class1['fetch_fees'] =  $this->login_model->fetch_fee_data();
          $class1['fetch_fees_id'] =  $this->login_model->fetch_fee_data_id($id);

        $this->load->view('admin/admin_header',$all_subject);
        $this->load->view('admin/admin_sidebar',$class);
      $this->load->view('admin/fees_detail',$class1);
      $this->load->view('admin/admin_footer');
    }

     public function fee_info_add()
    {

         $data = array(
                       'class'=>$this->input->post('class'),
                       'fees_type'=>$this->input->post('fees_type'), 
                       'fees_category'=>$this->input->post('fees_category'), 
                       'ammount'=>$this->input->post('ammount'),
                       'late_payment'=>$this->input->post('late_payment')
                      );
           

            $this->form_validation->set_rules('class','Class','required');
      $this->form_validation->set_rules('fees_type','fess type','required');
      $this->form_validation->set_rules('fees_category','Fees category','required');
      $this->form_validation->set_rules('ammount','Ammount','required');
      $this->form_validation->set_rules('late_payment','Late payment','required');
          if($this->form_validation->run() == FALSE)
              {
                 $this->fee_detail();
              }
           
          else 
             {  
      $this->login_model->insert_data('fees_detail',$data);
                 redirect('admission/fee_detail');
         }
        }

    public function fee_update()
    {
          $data_id = $this->uri->segment(3);
          $data = array(
                        'class'=>$this->input->post('class'),
                        'fees_type'=>$this->input->post('fees_type'), 
                        'fees_category'=>$this->input->post('fees_category'), 
                        'ammount'=>$this->input->post('ammount'),
                        'late_payment'=>$this->input->post('late_payment')
                       );

                 $this->login_model->data_update('fees_detail','fees_id',$data_id,$data);
                 redirect('admission/fee_detail');
   }
   
    public function fee_delete()
           {
                 $data_id = $this->uri->segment(3);
                 $this->login_model->data_remove('fees_detail','fees_id',$data_id);
                 redirect('admission/fee_detail');
           }

 public function student_fee_detail()
           {
                 $id = $this->uri->segment(3); 
                 $class['class_data'] = $this->login_model->class_fetch();
                 $class['fetch_sfee_data'] = $this->login_model->fetch_std_fee_data();
                 $class['fetch_std_data'] = $this->login_model->fetch_std_fee_data_id($id);

                 $this->load->view('admin/admin_header');
                 $this->load->view('admin/admin_sidebar',$class);
                 $this->load->view('admin/student_fee_detail');
                 $this->load->view('admin/admin_footer');

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

                   $this->form_validation->set_rules('std_id','Std id','required');
                   $this->form_validation->set_rules('month','Month','required');
                   $this->form_validation->set_rules('year','Year','required');
                   $this->form_validation->set_rules('paid','Paid','required');
                   $this->form_validation->set_rules('pending','Pending','required');
                   $this->form_validation->set_rules('fees','Fees','required');
                   $this->form_validation->set_rules('class','Class','required');
             if($this->form_validation->run() == FALSE)
                 {
                     $this->student_fee_detail();
                 }
             else
                 {
                   $this->login_model->insert_data('student_fees_detail',$data);
                   redirect('admission/student_fee_detail');
              }    
    }

       public function student_fee_update()
             {
                $data_id = $this->uri->segment(3);
                $data = array(
                             'std_id'=>$this->input->post('std_id'),
                             'month'=>$this->input->post('month'),
                             'year'=>$this->input->post('year'),
                             'paid'=>$this->input->post('paid'),
                             'pending'=>$this->input->post('pending'),
                             'fees'=>$this->input->post('fees'),
                             'class'=>$this->input->post('class')
                            );

                   $this->login_model->data_update('student_fees_detail','std_id',$data_id,$data);
               redirect('admission/student_fee_detail');
            }

     public function std_fee_delete()
           {
                $data_id = $this->uri->segment(3); 
                $this->login_model->data_remove('student_fees_detail','std_id',$data_id);
                redirect('admission/student_fee_detail');
           }



  public function leave_detail()
    {
      $leave_data['leave_dtl'] = $this->login_model->leave_detail_fetch();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/leave_detail',$leave_data);
        $this->load->view('admin/admin_footer');

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
       $this->form_validation->set_rules('std_id','Std id','required');
       $this->form_validation->set_rules('stf_id','Stf id','required');
       $this->form_validation->set_rules('leave_message','Leave message','required');
       // $this->form_validation->set_rules('approve_status','Std id','required');
       $this->form_validation->set_rules('from_date','from date','required');
       $this->form_validation->set_rules('to_date','to date','required');
       $this->form_validation->set_rules('leave_type','leave type','required');
         if($this->form_validation->run() == FALSE)
         {
          $this->leave_detail();
         }
         else
         {
          $this->login_model->insert_data('leave_detail',$data);
        redirect('admission/leave_detail');
         }

  }

 public function leave_delete()
    {
      $data_id = $this->uri->segment(3);
      $this->login_model->data_remove('leave_detail','std_id',$data_id);
      redirect('admission/leave_detail');
    }



   public function staff_sailary_detail()
       { 
       $id = $this->uri->segment(3);
        $data['fetch_salary_detail'] = $this->login_model->fetch_stf_salary_data_id($id);
       
       $sailary_data['sailary_dtl'] = $this->login_model->staff_sailary_fetch();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar',$data);
        $this->load->view('admin/staff_sailary_detail',$sailary_data);
        $this->load->view('admin/admin_footer');

    }
public function staff_sailary_add()
    {
         $data = array(

                              'stf_id'=>$this->input->post('stf_id'),
                              'sailary_month'=>$this->input->post('sailary_month'),
                              'sailary_year'=>$this->input->post('sailary_year'),
                              'pay_mode'=>$this->input->post('pay_mode'),
                             );
                $this->form_validation->set_rules('stf_id','stf id','required');
                $this->form_validation->set_rules('sailary_month','salary month','required');
                $this->form_validation->set_rules('sailary_year','salary year','required');
                $this->form_validation->set_rules('pay_mode','pay mode','required');
             if($this->form_validation->run() == FALSE)
             {
              $this->staff_sailary_detail();
             }
             else
             {
              $this->login_model->insert_data('staff_sailary_detail',$data);
        redirect('admission/staff_sailary_detail');
             } 

    }

    public function staff_sal_update()
       {
               $data_id = $this->uri->segment(3);
               $stf_data = $this->input->post('stf_id');
               $stf_data1 = explode('/', $stf_data);
               $data = array(
                'stf_id'=>$stf_data1[0],
                'sailary_month'=>$this->input->post('sailary_month'),
                'sailary_year'=>$this->input->post('sailary_year'),
                'pay_mode'=>$this->input->post('pay_mode'),
               );
      $this->login_model->data_update('staff_sailary_detail','stf_id',$data_id,$data);
      redirect('admission/staff_sailary_detail');
    }

    public function staff_sal_delete()
    {
      $data_id = $this->uri->segment(3);
      $this->login_model->data_remove('staff_sailary_detail','stf_id',$data_id);
      redirect('admission/staff_sailary_detail');
    }

  //========= navita data payroll 16/11/2017 end===================================================//

//*** for leave management 16/11/2017 ***//
public function category()
    {
        $category_data['fetch_cat'] = $this->login_model->fetch_category();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/add_category',$category_data);
        $this->load->view('admin/admin_footer');
   
    }
public function add_category()
{
$data = array('category'=>$this->input->post('category')
          );
 $this->login_model->insert_category($data);
 $this->category();

}

 public function designation()
    {
        $designation_data['fetch_designation'] = $this->login_model->fetch_designation();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/add_designation',$designation_data);
        $this->load->view('admin/admin_footer');

    }

public function add_designation()
{
$data = array('designation'=>$this->input->post('designation')
          );
$this->login_model->insert_designation($data);
 $this->designation();

}

public function leave()
    {
      $category_data['fetch_cat'] = $this->login_model->fetch_category();
      $designation_data['fetch_designation'] = $this->login_model->fetch_designation();
        $leave_data['fetch_leave_data'] = $this->login_model->fetch_leave_data();
        $this->load->view('admin/admin_header',$category_data);
        $this->load->view('admin/admin_sidebar',$designation_data);
        $this->load->view('admin/add_leave',$leave_data);
        $this->load->view('admin/admin_footer');
   
    }
public function add_leave()
{
$data = array(
          'leave_category'=>$this->input->post('leave_category'),
                   'designation'=>$this->input->post('designation'),
                   'leave'=>$this->input->post('leave')
          );
 $this->login_model->insert_leave($data);
 $this->leave();

}

public function leave_approval()
{   $data = $this->login_model->leave_request_count();
    $count1 = $data[0]['count(*)'];
    $this->session->set_userdata('count',$count1);
    $teacher_leave_data['teacher_leave'] = $this->login_model->fetch_teacher_leave();
    $leave_data['fetch_leave_data'] = $this->login_model->fetch_leave_data();
    $this->load->view('admin/admin_header',$teacher_leave_data);
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/leave_approval',$leave_data);
    $this->load->view('admin/admin_footer');
}
 public function approve_leave()
 {
   $staff_id = $this->input->post('stf_id_hidden');
   $teacher_id = $this->input->post('teacher_id_hidden');
   $submit_type = $this->input->post('submit');
   if($submit_type == 'approve'){
   $aprovel = 1;
   }
   else
   {
   $aprovel = 2;
   }
  
   $this->login_model->approve_leave($staff_id,$teacher_id,$aprovel);
   $this-> leave_approval();
         
 }

// *** end code 16/11/2017 ***//
public function payhead_type()
    {
      $payhead['payhead_fetc'] = $this->login_model->fetch_payhead();
      $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar');
      $this->load->view('admin/payhead_add',$payhead);
      $this->load->view('admin/admin_footer');
    }
    public function add_payhead_type()
    {
      $payhead_data = array(
     'pay_head_name' => $this->input->post('pay_head_name'),
     'pay_head_type' => $this->input->post('pay_head_type'),
     'description' => $this->input->post('description'));
     $this->login_model->insert_data('add_payhead', $payhead_data);
     redirect('admission/payhead_type');
    }

    public function salary_set()
    {
      $all_teacher['teacher'] = $this->login_model->all_staff();
      $data['fetch_designation'] = $this->login_model->fetch_designation();
      $payhead['payhead'] = $this->login_model->fetch_payhead();
       $data['set_salary']   =$this->login_model->fetch_set_salary();

      $this->load->view('admin/admin_header',$all_teacher);
      $this->load->view('admin/admin_sidebar',$data);
      $this->load->view('admin/staff_salary_set',$payhead);
      $this->load->view('admin/admin_footer');
    }

    public function staff_salary_set()
    {

      $set_salary_data = array(
     'desigination' => $this->input->post('desigination'),
     'staff_id' => $this->input->post('staff_id'),
     'pay_head' => $this->input->post('pay_head'),
     'unit' => $this->input->post('unit'),
     'type' => $this->input->post('type'),
     );
     $this->login_model->insert_data('staff_salary_set',$set_salary_data);
     redirect('admission/salary_set');
    }

    public function salary_pay()
    {

      $all_teacher['teacher'] = $this->login_model->all_staff();
      $designation_data['fetch_designation'] = $this->login_model->fetch_designation();
      $data['salary'] = $this->login_model->fetch_staff_salary_paid();
      $this->load->view('admin/admin_header',$all_teacher);
      $this->load->view('admin/admin_sidebar',$data);
      $this->load->view('admin/staff_salary',$designation_data);
      $this->load->view('admin/admin_footer');
    }
    public function staff_salary_pay() 
    {
      $pay_salary_data = array(
     'designation' => $this->input->post('designation'),
     'staff_id' => $this->input->post('staff_id'),
     'year' => $this->input->post('year'),
     'month' => $this->input->post('month'),
     'start_date' => $this->input->post('start_date'),
     'issue_date' => $this->input->post('issue_date'),
     'payhead' => $this->input->post('payhead'),
     'amount' => $this->input->post('amount')
     );
     $this->login_model->insert_data('staff_salary_paid', $pay_salary_data);
     redirect('admission/salary_pay');
    }
     // end salary detail
public function select_designation()
      {
           $stf_d =  $this->input->post('uristring'); 
           $data11['data1'] = $this->login_model->fetch_deg_name($stf_d);
  
?>
          <select class="form-control" id="stf_name">
           <option>select</option> 
           <?php
               foreach($data11['data1'] as $key) {
           ?>
           <option value="<?php echo $key['stf_fname']." ".$key['stf_lname'];?>">
              <?php echo $key['stf_fname']." ".$key['stf_lname'];?></option>
              <?php } ?>
           </select> 
           <?php 
  }
 public function cls_value()
   {
      $cls = $this->input->post('value');
      $clases['cls_no'] = $this->login_model->clas_find($cls);
    ?>
    <select class="form-control" name="to_class">
  <option value="">select class</option>
  <?php foreach ($clases['cls_no'] as $key ){?>
  <option value="<?php echo $key['class_name']?>"><?php echo $key['class_name']?></option>
 <?php }?>
</select>
  <?php  }
   public function evnt_date()
{
  $evnt_nm = $this->input->post('value');
  $date['evnt_date'] = $this->login_model->detail_fetch('event_name',$evnt_nm);
  ?>
  <select class="form-control" >  
              <option value="">Select</option>
              <?php foreach ($date['evnt_date'] as $key => $date) { ?>
                <option value="<?php echo $date['event_date'];?>"><?php echo $date['event_date']; ?></option>
                <?php } ?>
              </select>
<?php }
// event module start
public function detail_event()
 {
$evnt_nm = $this->input->post('value');
  $nm = $this->input->post('evnt_nm');
  $all_evnt_data['evnt_clas'] = $this->login_model->fetch_enm_dt('event_date',$evnt_nm,'event_name',$nm);

  // $all_evnt_data['evnt_clas'] = $this->login_model->detail_fetch('event_date',$evnt_nm);
  $evtcls = $all_evnt_data['evnt_clas'][0]['class'];
  $explod = explode('-', $evtcls);
  $cl_1 = $explod[0];
  $cl_2 = $explod[1];
  
if($evtcls=='all')
   {
     $clas['cla_all'] = $this->login_model->class_all_fetch();?>
      <select class="form-control" >  
              <option value="">Select</option>
              <?php foreach ($clas['cla_all'] as $key => $cls) { ?>
                <option value="<?php echo $cls['class_name']; ?>"><?php echo $cls['class_name']; ?></option>
                <?php } ?>
              </select>

    
 <?php }
 elseif($cl_1 != ' ' && $cl_2 != ''){
    
         $all_evnt_data['evnt_clas'] = $this->login_model->student_between($cl_1,$cl_2);
  ?>
         <select class="form-control" >  
              <option value="">Select</option>
              <?php foreach ($all_evnt_data['evnt_clas'] as $key => $class_name) { ?>
                <option value="<?php echo $class_name['std_class']; ?>"><?php echo $class_name['std_class']; ?></option>
                <?php } ?>
              </select>

        <?php } 
else {?>
     <select class="form-control" >  
              <option value="">Select</option>
              <?php foreach ($all_evnt_data['evnt_clas'] as $key => $class_name) { ?>
                <option value="<?php echo $class_name['class']; ?>"><?php echo $class_name['class']; ?></option>
                <?php } ?>
              </select>
<?php
}}
    public function add_event()
    {
       $event_data['cls_sec']  = $this->login_model->class_fetch();
      $all_teacher['teacher'] = $this->login_model->all_staff();
      $event_data['event']    = $this->login_model->event_get();
      $data['name_event']     = $this->login_model->fetch_all('event_name');
      $data['all_class']      = $this->login_model->all_class();
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/add_event";
  $config["total_rows"] = $this->login_model->record_count('add_event');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'add_event');
  $data["links"] = $this->pagination->create_links();

      $this->load->view('admin/admin_header',$data);
      $this->load->view('admin/admin_sidebar',$all_teacher);
      $this->load->view('admin/add_event',$event_data);
      $this->load->view('admin/admin_footer');

    }
    //  public function add_new_event()
    // {
    // $add_event = array(
    //   'event_name' => $this->input->post('event_name'),
    //   'event_date' => $this->input->post('event_date'),
    //   'event_start_time' => $this->input->post('event_start_time'),
    //   'event_end_time' => $this->input->post('event_end_time'),
    //   'event_for' => $this->input->post('event_for'),
    //   'class' => $this->input->post('class'),
    //   'section' => $this->input->post('section'),
    //   'staff_id' => $this->input->post('staff_id'));
    //    $class_id = $add_event['class'];
    //    $section_id = $add_event['section'];
    //   if($add_event['class'] == 'all')
    //   {
    //   $all_data['std_all'] = $this->login_model->student_id();    
    //   }
    //   else
    //   {
    //   $all_data['std_all'] = $this->login_model->student_id1($class_id,$section_id);
    //   }

    //   $this->login_model->insert_data('add_event',$add_event);
    //   $this->login_model->participation($all_data);
    //   redirect('admission/add_event');
    //  }

     

public function event_detail()
     {
      $event_data['cls_sec'] = $this->login_model->class_fetch();
      $event_data['event'] = $this->login_model->event_get();
       $event_data['event_details'] = $this->login_model->event_details();
    $config = array();
  $config["base_url"] = base_url() . "index.php/admission/event_detail";
  $config["total_rows"] = $this->login_model->record_count('event_details');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'event_details');
  $data["links"] = $this->pagination->create_links();



      $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar',$data);
      $this->load->view('admin/event_detail',$event_data);
      $this->load->view('admin/admin_footer');
     }
   

  public function participate_list()
  {
  $participation_list_detail['partilist'] = $this->login_model->participation_list();
   $config = array();
  $config["base_url"] = base_url() . "index.php/admission/participate_list";
  $config["total_rows"] = $this->login_model->record_count('event_participation');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'event_participation');
  $data["links"] = $this->pagination->create_links();


  $this->load->view('admin/admin_header');
  $this->load->view('admin/admin_sidebar',$data);
  $this->load->view('admin/admin_footer');
  $this->load->view('admin/participate_list',$participation_list_detail);
  }

 public function student_info($data_student_new = '')
  {
    $std_i = $this->uri->segment(3);
    $dec = base64_decode($std_i);
    $num=substr($dec, 5);
    $std_id= substr($num, 0, -3);
  
   
    $this->session->set_userdata('std_id_ses',$std_id);
    $std_id_ses =$this->session->userdata('std_id_ses');
    $std_pro_data['data'] = $this->student_model->std_fetch($std_id_ses);
    $data_student_new1['myarray'] = $data_student_new;
    $std_pro_data['all_class'] = $this->login_model->all_class();

    $this->load->view('admin/admin_header',$data_student_new1);
    $this->load->view('admin/admin_sidebar');
      $this->load->view('admin/admin_footer');
    $this->load->view('admin/std_profile',$std_pro_data);
  
     }
    public function std_pro_img_update()
    {
         $std_i = $this->uri->segment(3);
         $dec = base64_decode ($std_i);
         $num=substr($dec, 5);
         $std_id= substr($num, 0, -3);

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
            $this->upload->do_upload('std_image');
            $data =$this->upload->data();
            $img = array('std_image' => $data['file_name']);
           
           
           }
            $this->student_model->std_pro_update($img,$std_id);
            redirect('admission/student_info/'.$std_i);

   }

    public function std_profile_data($idd='')
      {
         $idd = $this->uri->segment(3);
         $dec = base64_decode ($idd);
         $num=substr($dec, 5);
         $id= substr($num, 0, -3);
         $stu_pare_data['data_per'] = $this->login_model->student_record_update($id);       foreach ($stu_pare_data['data_per'] as $key => $value) {
      $father_email = $value['std_father_email'];
      $mother_email = $value['std_mother_email'];
      $guardian_email = $value['std_guardian_email'];
    }

      $std_name=$this->input->post('std_name');
      $std_fname=explode(' ', $std_name);
      $std_data = array(
     'std_fname'=>$std_fname[0],
     'std_lname'=>$std_fname[1],
     'std_roll_no'=>$this->input->post('std_roll_no'),
     'std_mobile'=>$this->input->post('std_mobile'),
     'std_dob'=>$this->input->post('std_dob'),
     'std_father_name'=>$this->input->post('std_father_name'),
     'std_father_email'=>$this->input->post('std_father_email'),
     'std_mother_name'=>$this->input->post('std_mother_name'),
     'std_guardian_email'=>$this->input->post('std_guardian_email'),
     'std_email'=>$this->input->post('std_email'),
     'std_gender'=>$this->input->post('std_gender'),
     'std_class'=>$this->input->post('std_class'),
     'std_section'=>$this->input->post('std_section'),
     'std_guardian_name'=>$this->input->post('std_guardian_name'),
     'std_mother_email'=>$this->input->post('std_mother_email'),
     'std_category'=>$this->input->post('std_category'),
     'std_reg_date'=>$this->input->post('std_reg_date'),
     'std_batch'=>$this->input->post('std_batch'),
     'std_nationality'=>$this->input->post('std_nationality'),
     'std_status'=>$this->input->post('std_status'),
     'std_address'=>$this->input->post('std_address'),
     'std_permanent_address'=>$this->input->post('std_permanent_address')
    );

if($father_email !=  $std_data['std_father_email'])
    {

    $to_email = $father_email;
    $subject = "Email Changed";
    $message = 'Your Email Was Changed<br><table>
    <tr><td>Your Username:</td><td>'.$std_data['std_father_email'].'</td></tr></table>';
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
    }

    if($mother_email !=  $std_data['std_mother_email'])
    {
    $to_email = $mother_email;
    $subject = "Email Changed";
    $message = 'Your Email Was Changed<br><table>
    <tr><td>Your Username:</td><td>'.$std_data['std_mother_email'].'</td></tr></table>';
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
    }
    if($guardian_email !=  $std_data['std_guardian_email'])
    {
    $to_email = $guardian_email;
    $subject = "Email Changed";
    $message = 'Your Email Was Changed<br><table>
    <tr><td>Your Username:</td><td>'.$std_data['std_guardian_email'].'</td></tr></table>';
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
    }
$this->student_model->std_pro_update($std_data,$id);
redirect('admission/student_info/'.$idd);
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
  $config["base_url"] = base_url() . "index.php/admission/user_listed";
  $config["total_rows"] = $this->login_model->record_count1($num[$i],$arr_name['a'][$i]);
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results".$i] = $this->login_model->fetch_departments1($config["per_page"],$page,$num[$i],$arr_name['a'][$i]);
  $data["links".$i] = $this->pagination->create_links();
 }
 $class['fetch_designation'] = $this->login_model->fetch_designation();
$class['class_data'] =   $this->login_model->class_fetch();

  $this->load->view('admin/admin_header',$class);
  $this->load->view('admin/admin_sidebar',$arr_name);
  $this->load->view('admin/admin_footer');
  $this->load->view('admin/user_listed',$data);
  }
public function add_user()
{
$class['fetch_designation'] = $this->login_model->fetch_designation();
$class['class_data'] =   $this->login_model->class_fetch();
$this->load->view('admin/admin_header');
$this->load->view('admin/admin_sidebar');
$this->load->view('admin/admin_footer');
$this->load->view('admin/add_user',$class);

}
public function academic_gap()
{
  $academic_gap=$this->input->post('academic_gap');

  ?>
<select name="std_batch" class="form-control student_prsnl_acdmic">
                  <option  selected>Select Academic Year</option>
                  <option><?php echo date('Y');   ?>-<?php echo date('Y')+$academic_gap;   ?></option>
                  <option><?php echo date('Y')+1;   ?>-<?php echo date('Y')+1+$academic_gap;   ?></option>
                  <option><?php echo date('Y')+2; ?>-<?php echo date('Y')+2+$academic_gap;   ?></option>
                  <option><?php echo date('Y')+3;   ?>-<?php echo date('Y')+3+$academic_gap;   ?></option>
                  <option><?php echo date('Y')+4;   ?>-<?php echo date('Y')+4+$academic_gap;   ?></option>
                 </select>
  <?php
}
  
public function add_assignment()
{
  $config = array();
  $config["base_url"] = base_url() . "index.php/admission/add_assignment";
  $config["total_rows"] = $this->login_model->record_count('assignment');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'assignment');
  $data["links"] = $this->pagination->create_links(); 

$class['assign_get'] = $this->login_model->assign_get();
$class['class_data'] = $this->login_model->class_fetch();
$class['subject'] = $this->login_model->all_subject();
$class['assignment'] = $this->login_model->assign_get();  
$this->load->view('admin/admin_header');
$this->load->view('admin/admin_sidebar',$data);
$this->load->view('admin/add_assignment',$class);
$this->load->view('admin/admin_footer');

}  

/*  start lession planning  */
 
  public function lession_planning()
  {
   $config = array();
  $config["base_url"] = base_url() . "index.php/admission/lession_planning";
  $config["total_rows"] = $this->login_model->record_count('lession_plan');
  $config["per_page"] = 10;
  $config["uri_segment"] = 3;
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data["results"] = $this->login_model->fetch_departments($config["per_page"],$page,'lession_plan');
  $data["links"] = $this->pagination->create_links(); 

    $class['plan'] = $this->login_model->lession_plan_all();
    $class['all_class'] = $this->login_model->all_class();
    $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar',$data);
      $this->load->view('admin/lession_plan',$class);
      $this->load->view('admin/admin_footer');
  }
  public function subject_lession()
  {
     $class_id = $this->input->post('class_name');
     $class_section = $this->input->post('section');

    $sub_data['sub'] = $this->login_model->all_sub($class_id,$class_section); 
    ?>

      <select class="form-control" id="sub_section">
    <option>select</option> 
    <?php
    foreach ($sub_data['sub'] as $key) {
    ?>
    <option value="<?php echo $key['sub_name'];?>">
    <?php echo $key['sub_name'];?></option>
    <?php } ?>
    </select> 
    <?php 
  }

  public function lession_plan_add()
  {
    $lession_data = array(
    'class_id' => $this->input->post('class_id'),
    'section_id' => $this->input->post('section_id'),
    'sub_id' => $this->input->post('sub_id'),
    'description' => $this->input->post('description'),
    'to_date' => $this->input->post('to_date'),
    'from_date' => $this->input->post('from_date')
    );
    $this->login_model->insert_data('lession_plan', $lession_data);
    redirect('admission/lession_planning');
  }
  
     public function lession_delete()
  {
        $lession_id = $this->uri->segment(3);
        $this->login_model->lession_remove($lession_id);
        redirect('admission/lession_planning');
  
  }
    public function test_exam()
  {
   $class['class_data']=$this->login_model->class_fetch();
      $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar');
      $this->load->view('admin/test_exam',$class);
      $this->load->view('admin/admin_footer');
  
  }

  // end lession plann

public function subject_class($error_message = '')
    {
 $all_teacher['teacher'] = $this->login_model->all_staff();
 $all_subject['subject'] = $this->login_model->all_subject();
 $class['class_data'] =     $this->login_model->class_fetch();
 $class['assign_teacher'] = $this->login_model->all_assign_sub();
 $this->load->view('admin/admin_header',$all_teacher);
 $this->load->view('admin/admin_sidebar',$all_subject);
 $this->load->view('admin/assign_teacher',$class);
 $this->load->view('admin/admin_footer',$class);
    } 
// attendance view function with ajax
public function attendance_view()
      {
        $class_ajx = $this->input->post('class4');
        $sec_ajx = $this->input->post('sec4');
        $month = $this->input->post('month');
        $years = $this->input->post('year3');
        $attendance_fetch['attendance'] = $this->login_model->attendance_data($class_ajx,$sec_ajx,$month,$years);
        ?>
        <table class=" table responsive table table-bordered table table-striped">
          <thead>
          <tr class="hr_tbll">
          <th>Name</th>
          <!-- date data from 1 to 30 -->
          <?php for($i = 01 ; $i <= 31 ;$i++) { ?>
          <th><?php echo $i; ?></th>
          <?php } ?>
          </tr>
      </thead>
        <tbody>        
          <?php
          foreach ($attendance_fetch['attendance'] as $key => $value) { $d1 = 0; ?>
          <tr><td><?php echo $value['std_name']; ?></td>

          <?php for($d = 1 ; $d <= 31 ; $d++) { 
          if($d<10)
            {  ?>
          <td><?php echo $value['d'.$d1.$d]; ?></td> 
          <?php  }  else {  ?>
           <td><?php echo $value['d'.$d]; ?></td> 
          <?php }  } }?>
          </tr>
          </tbody>
          </table>
        <?php
}
public function staff_profile()
{
$staff_data_id['fetch_designation'] = $this->login_model->fetch_designation();

       $stff_i = $this->uri->segment(3);
         $dec = base64_decode ($stff_i);
         $num=substr($dec, 5);
         $stff_id= substr($num, 0, -3);


$staff_data_id['pro_stf'] = $this->teacher_model->stafff_detail($stff_id);
foreach ($staff_pro as $key => $value) {
$stf_id1 = $value['stf_id']; 
}
$stf_id = $this->session->set_userdata('stfdata',$stf_id1);
$staf_auth_data['data_stf'] = $this->login_model->authority_check($stf_id1);

$stff_id_msg['stff_id_msg'] = $this->teacher_model->stf_student_msg($stff_id);
$stff_id_msg = $this->session->set_userdata('stff_id_msg',$stff_id_msg);
$this->load->view('admin/admin_header',$staff_data_id);
$this->load->view('admin/admin_sidebar');
$this->load->view('admin/admin_footer');
$this->load->view('admin/teacher_profile',$staf_auth_data);

}
  public function stf_pro_img_update()
{   
        $stff_i = $this->uri->segment(3);
         $dec = base64_decode ($stff_i);
         $num=substr($dec, 5);
         $stff_id= substr($num, 0, -3);
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
      
        $this->teacher_model->stf_img_update($stf_img,$stff_id);
        redirect('admission/staff_profile/'.$stff_i);
           
}
}
public function stf_data()
{  
         $stff_i = $this->uri->segment(3);
         $dec = base64_decode ($stff_i);
         $num=substr($dec, 5);
         $stff_id= substr($num, 0, -3);
         $stf_email['email_data'] = $this->login_model->stf_name($stff_id);
         foreach ($stf_email['email_data'] as $key => $value) {
         $stf_emailid = $value['stf_email'];
         }
$stf_name=$this->input->post('stf_name');
$stf_fname=explode(' ', $stf_name);
$data  = array(
  'stf_fname' => $stf_fname[0],
  'stf_lname' => $stf_fname[1],
  'stf_designation' => $this->input->post('stf_designation'), 
  'stf_qualification' => $this->input->post('stf_qualification'), 
  'stf_experience' => $this->input->post('stf_experience'), 
  'stf_email' => $this->input->post('stf_email'), 
  'stf_phone' => $this->input->post('stf_phone'), 
  'stf_mobile' => $this->input->post('stf_mobile'), 
  'stf_dob' => $this->input->post('stf_dob'), 
  'stf_doj' => $this->input->post('stf_doj'), 
  'stf_gender' => $this->input->post('stf_gender'), 
  'stf_register_date' => $this->input->post('stf_register_date'), 
  'stf_city' => $this->input->post('stf_city'), 
  'stf_country' => $this->input->post('stf_country'), 
  'stf_pres_address' => $this->input->post('stf_pres_address'), 
  'stf_perm_address' => $this->input->post('stf_perm_address'));
if($stf_emailid != $data['stf_email'])
{
  $to_email = $stf_emailid;
    $subject = "Email Changed";
    $message = 'Your Email Was Changed<br><table>
    <tr><td>Your Username:</td><td>'.$data['stf_email'].'</td></tr></table>';
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
}
$this->teacher_model->stf_data_update($data,$stff_id);
redirect('admission/staff_profile/'.$stff_i);

}

public function parent_update()
{
        $parent_i = $this->uri->segment(3);
         $dec = base64_decode ($parent_i);
         $num=substr($dec, 5);
         $parent_id= substr($num, 0, -3);

$parent_data['parent_data1'] = $this->login_model->parent_fetch($parent_id);

       $this->load->view('admin/admin_header');
       $this->load->view('admin/admin_sidebar');
       $this->load->view('admin/admin_footer');
       $this->load->view('admin/parent_update',$parent_data);
      }
      public function parent_data()
        {
        $parent_i = $this->uri->segment(3);
         $dec = base64_decode ($parent_i);
         $num=substr($dec, 5);
         $parent_id= substr($num, 0, -3);
        $parrent_data['data_parent1'] = $this->login_model->parent_fetch($parent_id);
        foreach ($parrent_data['data_parent1'] as $key => $value)
       {
       $father_email = $value['father_email'];
       $mother_email = $value['mother_email'];
       $guardian_email = $value['guardian_email'];
       }

    $data  = array(
    'father_name' => $this->input->post('father_name'), 
    'mother_name' => $this->input->post('mother_name'), 
    'father_email' => $this->input->post('father_email'), 
    'std_id' => $this->input->post('std_id'), 
    'father_address' => $this->input->post('father_address'), 
    'father_phone' => $this->input->post('father_phone'), 
    'mother_address' => $this->input->post('mother_address'), 
    'mother_phone' => $this->input->post('mother_phone'), 
    'father_occupation' => $this->input->post('father_occupation'), 
    'guardian_address' => $this->input->post('guardian_address'), 
    'guardian_phone' => $this->input->post('guardian_phone'), 
    'mother_occupation' => $this->input->post('mother_occupation'), 
    'mother_email' => $this->input->post('mother_email'), 
    'guardian_email' => $this->input->post('guardian_email'), 
    'guardian_name' => $this->input->post('guardian_name'),
  'guardian_occupation' => $this->input->post('guardian_occupation')
    );
    if($father_email !=  $data['father_email'])
    {
    $to_email = $father_email;
    $subject = "Email Changed";
    $message = 'Your Email Was Changed<br><table>
    <tr><td>Your Username:</td><td>'.$data['father_email'].'</td></tr></table>';
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
    }
    if($mother_email !=  $data['mother_email'])
    {
    $to_email = $mother_email;
    $subject = "Email Changed";
    $message = 'Your Email Was Changed<br><table>
    <tr><td>Your Username:</td><td>'.$data['mother_email'].'</td></tr></table>';
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
    }
    if($guardian_email !=  $data['guardian_email'])
    {
    $to_email = $guardian_email;
    $subject = "Email Changed";
    $message = 'Your Email Was Changed<br><table>
    <tr><td>Your Username:</td><td>'.$data['guardian_email'].'</td></tr></table>';
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
    }

  $this->parent_model->parent_data_update($data,$parent_id);
  redirect('admission/parent_update/'.$parent_i);
  }

public function prnt_pro_img_update()
{   
        $parent_i = $this->uri->segment(3);
         $dec = base64_decode ($parent_i);
         $num=substr($dec, 5);
         $parent_id= substr($num, 0, -3);
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
        $this->upload->do_upload('profile_images');
        $img = $this->upload->data();
     
        $parent_img = array('profile_images' => $img['file_name']);
      
        $this->parent_model->parent_img_update($parent_img,$parent_id);
        redirect('admission/parent_update/'.$parent_i);       
       }
}


// staff attendance
public function staff_attendance()
    {
        $sellect_date1 = $this->input->post('date_select1');
       
        $desg = $this->input->post('stf_desg');
        $this->session->set_userdata('date_flash1',$sellect_date1);
        $this->session->set_userdata('desg_flash',$desg);
      
       $designation_data['fetch_designation'] = $this->login_model->fetch_designation();

        $designation_data['fetch_chkdata'] = $this->login_model->fetch_attendance_data($sellect_date1,$desg);

       $this->load->view('admin/admin_header');
       $this->load->view('admin/admin_sidebar');
       $this->load->view('admin/admin_footer');
       $this->load->view('admin/staff_attendance',$designation_data);
  
    }
    public function staff_ajx_fetch()
      {

       $desigination = $this->input->post('desig');

      $data_staff['all_staff'] = $this->login_model->all_stf($desigination);
      print_r($data_staff['all_staff']);
 
      $this->session->set_flashdata('in_staff',$data_staff);
      $this->session->set_userdata('desgni',$desigination);

        $this->load->view('admin/staff_attendance');
      }

      public function stff_attandance_set()
     { 
    $slct_date = $this->session->userdata('date_flash1');
    $stf_id = $this->input->post('stf_id');
    $design = $this->input->post('stf_designation');
    $stf_name = $this->input->post('stf_name');

    foreach ($stf_id as $key => $value) {

    $chk_data[] = $this->input->post('chk'.$value);
    }
    $stat_stf = array_combine($stf_id, $chk_data);

    $this->login_model->setstf_attendance($stf_name,$stf_id,$stat_stf,$design,$slct_date);

    redirect('admission/staff_attendance');
    }

    public function stf_attendance_view()
      {
        $stf_desgination = $this->input->post('desg');
        $month = $this->input->post('month');
        $years = $this->input->post('year1');
      $stf_attendance_fetch['stf_attendance'] = $this->login_model->stf_attendance_data($stf_desgination,$month,$years);
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
          <td><?php echo $value['d'.$d1.$d]; ?></td> 
          <?php  }  else {  ?>
           <td><?php echo $value['d'.$d]; ?></td> 
          <?php }  } }?>
          </tr>
          </tbody>
          </table>
        <?php
      }


//end staff attendance

public function school_profile()
        {
  $admin_id=$this->session->userdata('admin_id');
 $school_info['data_info'] = $this->login_model->school_info_fetch($admin_id);
            $this->load->view('admin/admin_header');
            $this->load->view('admin/admin_sidebar');
            $this->load->view('admin/admin_footer');
            $this->load->view('admin/school_profile',$school_info);
            
        }
  public function school_profile_info()
        {
  $admin_id=$this->session->userdata('admin_id');

 
$school_info['data_info'] = $this->login_model->school_info_fetch($admin_id);
foreach ($school_info['data_info'] as $key => $value) {
$admin_id = $value['admin_id'];
$admin_email = $value['admin_email'];

}
   $confirm_code=random_string('alnum',5);
    $info_add  = array(
      'admin_name' => $this->input->post('admin_name'), 
    'admin_email' => $this->input->post('admin_email'), 
    'admin_password' =>$confirm_code,
    'institute_name' => $this->input->post('institute_name'), 
    'institute_email' => $this->input->post('institute_email'), 
    'institute_address' => $this->input->post('institute_address'), 
    'institute_phone' => $this->input->post('institute_phone'), 
    'institute_mobile' => $this->input->post('institute_mobile'), 
    'institute_fax' => $this->input->post('institute_fax'), 
    'admin_contact_person' => $this->input->post('admin_contact_person'), 
    'institute_country' => $this->input->post('institute_country'), 
    'language' => $this->input->post('language'), 
    'institute_code' => $this->input->post('institute_code'));

      if(empty($school_info['data_info']))
      {
    $this->login_model->insert_data('admin',$info_add);
   

    $to_email=$this->input->post('admin_email');
    $from_email = 'sachinraajvijay@gmail.com';
    $subject = 'Verify Your Email Address';
    $message = 'WELCOME TO BECOME A ADMIN<br><table>
    <tr><td>Admin Username:</td><td>'.$to_email.'</td></tr>
    <tr> <td>Admin password: </td><td>'.$confirm_code.'</td></tr></table>';
    if($to_email!=''){
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
        $this->email->to($to_email);
        $this->email->send();
        }
   redirect('admission/school_profile');
      }
      else
      {
    $this->login_model->update_info($info_add,$admin_id);
  $to_email=$admin_email;
    $from_email = 'sachinraajvijay@gmail.com';
    $subject = 'Verify Your Email Address';
    $message = 'Your Email Has been Changed'.$this->input->post('admin_email');
    if($to_email!=''){
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
        $this->email->to($to_email);
        $this->email->send();
        }


    redirect('admission/school_profile');
      }
   
  }
  public function school_logo_img()
  {

    $admin_id = $this->uri->segment(3);
    $config = array(
          'upload_path' => "application/assets/uploads",
          'allowed_types' => "gif|jpg|png|jpeg",
          'overwrite' => 'TRUE',
          'max_size' => "204800",
          'max_height' => "768",
          'max_width' => "1024");


  if(! is_dir($config['upload_path'])) die("path not exits");
  {
    $this->load->library('upload', $config);
    $this->upload->do_upload('institute_logo');
    $upload_logo = $this->upload->data();

    $img_update = array(
    'admin_image' => $upload_logo['file_name']);
  
    $this->login_model->update_logo($img_update,$admin_id);
    redirect('admission/school_profile');
  }
}
public function admin_notify()
{
  $this->load->view('admin/admin_header');
  $this->load->view('admin/admin_sidebar');
  $this->load->view('admin/admin_footer');
  $this->load->view('admin/admin_notify');

}
public function admin_message_send()
{
$notify=$this->input->post('notify');
$message_title=$this->input->post('message_title');
$message_body=$this->input->post('message_body');
$this->login_model->admin_message_send($message_title,$message_body,$notify); 
redirect('admission/admin_notify'); 
}
public function rd_student()
{
$rd_student_name=$this->input->post('rd_student');
$rd_student=$this->login_model->rd_student();
if($rd_student_name=='admission'){
?>
<table class="table table-striped">
<tr>
<th><input type="checkbox" ></th>
<th>Student Name</th>
</tr>
<?php
for($i=0;$i<count($rd_student);$i++)
{ ?>
<tr>
<td><input type="checkbox" name="std_id[]" value="<?php  echo $rd_student[$i]['std_id'];?>"></td>
<td><?php  echo $rd_student[$i]['std_fname'];   ?></td>
</tr>
<?php
}
?>
</table>
<?Php
}

}
public function rd_teacher()
{
$rd_teacher_name=$this->input->post('rd_teacher');
$rd_teacher=$this->login_model->rd_teacher();
if($rd_teacher_name=='staff'){
?>
<table class="table table-striped">
<tr>
<th><input type="checkbox"   ></th>
<th>Teacher Name</th>
</tr>
<?php
for($i=0;$i<count($rd_teacher);$i++)
{ ?>
<tr>
<td><input type="checkbox" name="stf_id[]" value="<?php  echo $rd_teacher[$i]['stf_id'];?>"></td>
<td><label for="<?php  echo $rd_teacher[$i]['stf_id'];?>"><?php  echo $rd_teacher[$i]['stf_fname'];   ?></label></td>
</tr>
<?php
}
?>
</table>
<?Php
}

}
public function rd_parent()
{
$rd_parent_name=$this->input->post('rd_parent');
$rd_parent=$this->login_model->rd_parent();
if($rd_parent_name=='parrent_detail'){
?>
<table class="table table-striped">
<tr>
<th><input type="checkbox"  ></th>
<th>Parent Name</th>
</tr>
<?php
for($i=0;$i<count($rd_parent);$i++)
{ ?>
<tr>
<td><input type="checkbox" name="parent_id[]" value="<?php  echo $rd_parent[$i]['parent_id'];?>"></td>
<td><?php  echo $rd_parent[$i]['father_name'];   ?></td>
</tr>
<?php
}
?>
</table>
<?Php
}

}
public function  admin_message_send_particular()
{
  $msg=array(
  'subject' => $this->input->post('message_title'),
  'message' => $this->input->post('message_body')
   );
  $message_title=$this->input->post('message_title');
  $message_body=$this->input->post('message_body');

  $notify_particular=$this->input->post('notify_particular');
for($i=0;$i<count($notify_particular);$i++)
{
  if($notify_particular[$i]=='parrent_detail')
  {
    $parent_id=$this->input->post('parent_id');
    $this->login_model->insert_messenger('parent_id',$parent_id,$msg);
  }
   if($notify_particular[$i]=='staff')
  {
      $stf_id=$this->input->post('stf_id');
       $this->login_model->insert_messenger('tch_id',$stf_id,$msg);
  }
   if($notify_particular[$i]=='admission')
  {
     $std_id=$this->input->post('std_id');
       $this->login_model->insert_messenger('std_id',$std_id,$msg);
  }
}
redirect('admission/admin_notify');
}
public function promote()
 {

 
  $class['unpromote'] =   $this->login_model->unpromote();
  $class['promote'] =   $this->login_model->promote();
  $class['class_data'] =   $this->login_model->class_fetch();
       $this->load->view('admin/admin_header');
       $this->load->view('admin/admin_sidebar');
       $this->load->view('admin/admin_footer');
       $this->load->view('admin/promote',$class);

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
redirect('admission/promote');
}
// transport details
public function add_vehicle()
        {
        $v_id = $this->uri->segment(3);
        $vehicle_data['vehicle_update'] = $this->login_model->select_update_data('vehicle_detail','vehicle_id',$v_id);

        $vehicle_data['vehicle'] = $this->login_model->vehicle_details_fetch();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/add_vehicle',$vehicle_data);
        $this->load->view('admin/admin_footer');
        }
        public function add_vehicle_detail()
        {

          $v1_id = $this->uri->segment(3);
          $vehicle_add  = array(
          'vehicle_no' => $this->input->post('vehicle_no'), 
          'no_of_seat' => $this->input->post('no_of_seat'), 
          'maximum_allowed' => $this->input->post('maximum_allowed'), 
          'vehicle_type' => $this->input->post('vehicle_type'), 
          'contact_person' => $this->input->post('contact_person'));

          if($v1_id == '')
          {
          $this->login_model->insert_data('vehicle_detail',$vehicle_add);
         
          }
          else
          {

          $this->login_model->update_value('vehicle_detail','vehicle_id',$v1_id,$vehicle_add);

          }
          redirect('admission/add_vehicle');
        }
         public function add_rute()
        {
        $r_id = $this->uri->segment(3);
        $rute_data['rute_update'] = $this->login_model->select_update_data('rute_detail','rute_id',$r_id);

        $rute_data['vehicle'] = $this->login_model->vehicle_details_fetch();
        $rute_data['rute'] = $this->login_model->rute_details_fetch();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/add_rute',$rute_data);
        $this->load->view('admin/admin_footer');
        }
        public function add_rute_detail()
        {
          $r1_id = $this->uri->segment(3);
          $vehicle_add  = array(
          'vehicle_no' => $this->input->post('vehicle_no'), 
          'pickup_place' => $this->input->post('pickup_place'), 
          'drop_place' => $this->input->post('drop_place'));
          if($r1_id == '')
          {
          $this->login_model->insert_data('rute_detail',$vehicle_add);

          }
          else
          {
         $this->login_model->update_value('rute_detail','rute_id',$r1_id,$vehicle_add);
          }
          redirect('admission/add_rute');
        }

        public function add_destination()
        {
          $dest_id = $this->uri->segment(3);
        $destination['destination_update'] = $this->login_model->select_update_data('add_destination','destination_id',$dest_id);

        $destination['vehicle'] = $this->login_model->vehicle_details_fetch();
        $destination['rute'] = $this->login_model->rute_details_fetch();
        $destination['fees_type'] =  $this->login_model->fetch_fee_data();
        $destination['destination'] =  $this->login_model->destination_details_fetch();

        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/add_destination',$destination);
        $this->load->view('admin/admin_footer');
        }
        public function add_destination_detail()
        {
          $desti_id = $this->uri->segment(3);
          $vehicle_add  = array(
          'rute_code' => $this->input->post('rute_code'), 
          'pickup_drop' => $this->input->post('pickup_drop'), 
          'stop_time' => $this->input->post('stop_time'), 
          'ammount' => $this->input->post('ammount'), 
          'fees_type' => $this->input->post('fees_type'));

          if($desti_id == '')
          {
          $this->login_model->insert_data('add_destination',$vehicle_add);    
          }
          else
          {
         $this->login_model->update_value('add_destination','destination_id',$desti_id,$vehicle_add);
          }
          redirect('admission/add_destination');
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
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/admin_footer');
        $this->load->view('admin/allocate_transport',$transport);
        }

        public function stu_transport_fetch()
        {
          $class_trns = $this->input->post('class_data');
          $sec_trns = $this->input->post('sec_data');
          $std_data_trns['std_data_trn'] = $this->login_model->std_fetch($sec_trns,$class_trns);

          ?>
         
            <div class="multiselect">
              <label class="empll_labell">Student Select&nbsp;<span class="alloct_sub_strs ">*</span></label> 
            <input type="checkbox"  name="select_all" value="" />Select all
           Select start
             <input class="slct_difft" type="number"  name="">Select diff<input class="slct_difft" type="number" name="">
            <?php foreach ($std_data_trns['std_data_trn'] as $key) {?>
           <label>
            <input type="checkbox"  name="std_name[]" value="<?php echo $key['std_fname']." ".$key['std_lname']; ?>" /><?php echo $key['std_fname']." ".$key['std_lname']; ?>
          </label>
            <?php } ?>
             </div>

              <?php
        }

        public function staff_transport_fetch()
        {
          $desg_trns = $this->input->post('desg_data');
          $stf_data_trns['stf_data_trn'] = $this->login_model->fetch_deg_name($desg_trns);

          ?>
        
          <div class="multiselect">
              <label class="empll_labell">Staff Select&nbsp;<span class="alloct_sub_strs ">*</span></label> 

            <?php foreach ($stf_data_trns['stf_data_trn'] as $key) {?>
           <label><input type="checkbox" name="stf_name[]" value="<?php echo $key['stf_fname']." ".$key['stl_lname']; ?>" /><?php echo $key['stf_fname']." ".$key['stf_lname']; ?></label>
      <?php } ?>
        </div>
          <?php
        }

        public function transport_insert()
        {
           $t1_id = $this->uri->segment(3);

          if(!empty($this->input->post('std_name')))
          {
            $passenger_name = $this->input->post('std_name');
          }
          else
          {
            $passenger_name = $this->input->post('stf_name');
          }

          $transport_add  = array(
          'rute_code' => $this->input->post('rute_code'), 
          'destination' => $this->input->post('destination'), 
          'type' => $this->input->post('type'), 
          'student_class' => $this->input->post('student_class'), 
          'student_section' => $this->input->post('student_section'), 
          'designation' => $this->input->post('designation'), 
          'start_date' => $this->input->post('start_date'), 
          'end_date' => $this->input->post('end_date'));
          if($t1_id == '')
          {
          $this->login_model->insert_allocation($transport_add,$passenger_name);
         
          }
          else
          {
         $this->login_model->update_allocation($transport_add,$passenger_name,$t1_id);
          }
          redirect('admission/transport_allocate');
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

        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/admin_footer');
        $this->load->view('admin/add_driver',$driver_data);
        }

        public function driver_detail()
        {
          $d_id = $this->uri->segment(3);
          $stf_id = $this->input->post('stf_id');

          
          $stf_name = $this->login_model->stf_name($stf_id);
          $name = $stf_name[0]['stf_fname']." ".$stf_name[0]['stf_lname'];
       
          $driver_add  = array(
          'driver_name' => $name, 
          'stf_id' => $this->input->post('stf_id'), 
          'vehicle_no' => $this->input->post('vehicle_no'), 
          'rute_code' => $this->input->post('rute_code'), 
          'iecence_no' => $this->input->post('iecence_no'));

          if($d_id == '')
          {
          $this->login_model->insert_data('add_driver',$driver_add);
          }
          else
          {
          $this->login_model->update_value('add_driver','driver_id',$d_id,$driver_add);
          }
          redirect('admission/add_driver');
        }
         

          public function driver_del()
          {
            $driver_id = $this->uri->segment(3);
            $this->login_model->driver_del($driver_id);
             redirect('admission/add_driver');
          }
  
    public function stf_salary_delete()
    {
      $pay_id = $this->uri->segment(3);
      $this->login_model->remove_data('staff_salary_set','pay_id',$pay_id);
      redirect('admission/salary_set');
    }
    public function salary_pay_delete()
    {
      $pay_salary_id = $this->uri->segment(3);
      $this->login_model->remove_data('staff_salary_paid','paid_id',$pay_salary_id);
      redirect('admission/salary_pay');
    }
    public function vehicle_delete()
    {
      $vehicle_id = $this->uri->segment(3);
      $this->login_model->remove_data('vehicle_detail','vehicle_id',$vehicle_id);
      redirect('admission/add_vehicle');
    }
     public function rute_delete()
    {
      $rute_id = $this->uri->segment(3);
      $this->login_model->remove_data('rute_detail','rute_id',$rute_id);
      redirect('admission/add_rute');
    }
      public function driver_delete()
    {
      $driver_id = $this->uri->segment(3);
      $this->login_model->remove_data('add_driver','driver_id',$driver_id);
      redirect('admission/add_driver');
    }
     public function destination_delete()
    {
      $destination_id = $this->uri->segment(3);
      $this->login_model->remove_data('add_destination','destination_id',$destination_id);
      redirect('admission/add_destination');
    }
     public function transport_delete()
    {
      $transport_id = $this->uri->segment(3);
      $this->login_model->remove_data('transport_allocation','t_allocation_id',$transport_id);
      redirect('admission/transport_allocate');
    }
     public function evnt_detail_delete()
    {
      $evnt_id = $this->uri->segment(3);
      $this->login_model->remove_data('event_details','event_details_id',$evnt_id);
      redirect('admission/event_detail');
    }
     public function participate_list_delete()
    {
      $list_id = $this->uri->segment(3);
      $this->login_model->remove_data('event_participation','participation_id',$list_id);
      redirect('admission/participate_list');
    }


     //==================== GALLERY WORK=============================//
public function photo_gallery()
{
        $a['photo'] = $this->login_model->gallery_data_fetch();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/admin_footer');
        $this->load->view('admin/Photo_Gallery',$a);
}

public function create_album_name()
{

  $directory = FCPATH . 'application/assets/gallery' . $this->input->get('directory');
  if (is_dir($directory)) 
  {
     mkdir($directory . '/' . $this->input->post('folder_name'), 0777);
  }

   $create_date = date('Y-m-d');
   $data = array(
                  'folder_name' => $this->input->post('folder_name'),
                  'create_date'=>$create_date
                );
     if($data != '')
        {
           $this->login_model->insert_data('gallery',$data);
           redirect('admission/photo_gallery');
        }
     else
        {
           redirect('admission/photo_gallery');
        }   
}

public function photo_upload()
{ 
        $na = $this->input->post('folder_name');
       
        $number_of_files = sizeof($_FILES['image']['tmp_name']);
        
        for ($i = 0; $i < $number_of_files; $i++) {
         $_FILES['images']['name'] = $_FILES['image']['name'][$i]; 
         $_FILES['images']['type'] = $_FILES['image']['type'][$i];
         $_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'][$i]; 
         $_FILES['images']['error'] = $_FILES['image']['error'][$i];
         $_FILES['images']['size'] = $_FILES['image']['size'][$i];

        $config['upload_path'] = "application/assets/gallery/".$na;
        $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|ppt|pptx";
        $this->load->library('upload', $config);
        //now we initialize the upload library
        $this->upload->initialize($config);
        // we retrieve the number of files that were uploaded
        if ($this->upload->do_upload('images'))
        {
          $data['images'][$i] = $this->upload->data();
        }
        else
        {
          $data['upload_errors'][$i] = $this->upload->display_errors();
        }
      }

        $photo = $this->login_model->image_fetch($na);
        $photo1 = $photo[0]['image'];
        $image = $_FILES['image']['name'];
        $image1 = implode(',',$image);
        $all_images = $photo1.",".$image1;
        
        if($photo1!='')
        {
          $data = array('image'=>$all_images);
        }
        else
        {
          $data = array('image'=>$image1);
        }

        $this->login_model->update_photo('gallery',$data,$na);
        redirect('admission/photo_gallery');
   }

   public function fetch_images()
   {
   $folder_name= $this->login_model->gallery_data_fetch();
   $na = $this->input->post('name_f');
   $dir = "application/assets/gallery/".$na;
   $map = directory_map($dir);
       
        foreach ($map as $key => $value) {?>
       

       <div class="col-lg-3 img_path_bigss_margin">
       <a href="<?php echo site_url('admission/delete_image/'.$na."/".$value);?>">
        <span title="close" class="glyphicon glyphicon-remove"></span>
      </a>
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
 //=========== end gallery..//
// Library controllers  start///
public function Add_category_library(){
    $data['librarycategory'] = $this->login_model->all_data_all('librarycategory');
    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/Library/library_category',$data);
    $this->load->view('admin/admin_footer');
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
    $this->load->view('admin/admin_header', $data);
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/Library/add_books', $combine_data);
    $this->load->view('admin/admin_footer');
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
    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/Library/book_request' , $combine_data);
    $this->load->view('admin/admin_footer');
}

public function Books_return(){
    $classes = $this->login_model->all_data_all('add_class');
    $rollno = $this->login_model->all_data_all('addrequest');
    $combine_data['all'] = array(
            'class' => $classes,
            'RollNo' => $rollno,
            
    );

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/Library/book_return', $combine_data);
    $this->load->view('admin/admin_footer');
}

public function Import_library(){

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/Library/import_libb');
    $this->load->view('admin/admin_footer');
}


public function Library_reports(){

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sidebar');
    $this->load->view('admin/Library/reports');
    $this->load->view('admin/admin_footer');
}

public function insertcatogory(){
 $insert = array(
    'Categoryname' => $this->input->post('Category_name'),
    'SectionCode'   => $this->input->post('Section_code')

  );
  $this->login_model->insert_data('librarycategory',$insert);
  
 redirect('admission/Add_category_library');


}
public function addlibrarybooks(){

  $insert = array(
    'Class' => $this->input->post('Class'),
    'Title' => $this->input->post('Title'),
    'Author' => $this->input->post('Author'),
    'BookISBNNo' => $this->input->post('Book_ISBN_No'),
    'Bookcost' => $this->input->post('Book_cost'),
    'Edition' => $this->input->post('Edition'),
    'BookCategory' => $this->input->post('Course'),
    'Publisher' => $this->input->post('Publisher'),
    'NoofCopies' => $this->input->post('No_of_Copies'),
    'ShelfNo' => $this->input->post('Shelf_No'),
    'BookCondition' => $this->input->post('Book_Condition'),
    'Language' => $this->input->post('Language')
  );


 $this->login_model->insert_data('addbooks',$insert);

redirect('admission/Add_books');

}


public function addrequestbooks()
{


    $title = $this->input->post('Title');
    $book_auth = $this->input->post('Author');
    $book_cat = $this->input->post('Book_Category');
    $Publisher = $this->input->post('Publisher');
    $Edition = $this->input->post('Edition');
    $issue = '0';




$book_count = $this->login_model->count_book_detail('addbooks',$book_cat,$book_auth,$title,$Publisher,$Edition,'BookCategory','Author','Title','Publisher','Edition');

$issue_book_count =$this->login_model->count_book_detail_issue('addrequest',$book_cat,$book_auth,$title,$Publisher,$Edition,$issue,'BookCategory','Author','Title','Publisher','Edition','issue');

foreach ($book_count as $key => $value) {
  $count_copies = $value['NoofCopies'];
}
$issue_count = count($issue_book_count);
if($issue_count >= $count_copies){
  $message_book = "book has not in library";
}
else{
 $insert = array(
    'Class' => $this->input->post('Class'),
    'Section' => $this->input->post('Section'),
    'RollNo' => $this->input->post('Roll_No'),
    'Title' => $this->input->post('Title'),
    'Author' => $this->input->post('Author'),
    'BookCategory' => $this->input->post('Book_Category'),
    'Publisher' => $this->input->post('Publisher'),
    'Edition' => $this->input->post('Edition'),
    'Date' => $this->input->post('Date'),
    'Day' => $this->input->post('Day'),
    'issue' => '0'
  );

$this->login_model->insert_data('addrequest',$insert);
redirect('admission/Books_request');
}
 $this->Books_request($message_book);

  
}


public function book_return(){

  $insert = array(
'Class' => $this->input->post('Class'),
'Section' => $this->input->post('Section'),
'RollNo' => $this->input->post('Roll_No'),

  );


  $this->login_model->fetch_data('addrequest',$insert);
redirect('admission/Books_return');
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
// Library controllers  end///
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

        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/gate_reciving_timing',$gate_time);
        $this->load->view('admin/admin_footer');
        }
      
        public function Gate_entry_timming()
        {
          $indiatimezone = new DateTimeZone("Asia/Kolkata" );
          $date = new DateTime();
          $date->setTimezone($indiatimezone);
           $entry_time = $date->format( 'H:i:s A  ' );
           $entry_date = $date->format( ' D, M jS, Y' );

          
           $gate_tim  = array(
          'Token' => $this->input->post('Token'), 
          'VisitorName' => $this->input->post('visitor_name'), 
          'Category' => $this->input->post('Category'), 
          'Class' => $this->input->post('Class'), 
          'department' => $this->input->post('department'), 
          'To_Meet' => $this->input->post('To_Meet'), 
          'Reason' => $this->input->post('Reason'), 
          'EntryTimming' => $entry_time, 
          'GatekeeperName' => $this->input->post('Gatekeeper_Name'), 
          'entry_date' => $entry_date, 
          
          );
          $this->login_model->insert_data('gate_timing',$gate_tim);
          redirect('admission/Gate_reciving_timing');

        }


        public function getclassgate(){
          $class_value = $this->input->post('click_value');
          if($class_value == 2){
          $gate_classes = $this->login_model->all_data_all('add_class');
           foreach ($gate_classes as $key => $value) {
            $class_unique[] =$value['class_name'];
          }
          $gate_classes = array_unique($class_unique);
          }else{
          $gate_classes = $this->login_model->all_data_all('staff');

          }
         
            echo json_encode($gate_classes);
        }

         public function gatetimimg(){
            $class_value = $this->input->post('class');
            $department_staff = $this->input->post('department_staff');
           if($department_staff == 2){

          $gate_time = $this->login_model->all_dep_stf('admission',$class_value,'std_class');
           }else{
          $gate_time = $this->login_model->all_dep_stf('staff',$department_staff,'stf_dept');
            
           }

            echo json_encode($gate_time);
        }
        public function gatetimming_update(){
           $indiatimezone = new DateTimeZone("Asia/Kolkata" );
          $date = new DateTime();
          $date->setTimezone($indiatimezone);
           $outing_time = $date->format( 'H:i:s A  ' );
           $entry_date = $date->format( ' D, M jS, Y' );

          $id = base64_decode($this->input->post('Visitor'));
          $name = array(
            'status' => '1',
            'outtime'=> $outing_time
          );
          $this->login_model->update_single_id('gate_timing','id',$id, $name);
             redirect('admission/Gate_reciving_timing');
          
        }

public function feedback()
{
        $addmin['admin'] = $this->login_model->admin_feed();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_sidebar');
        $this->load->view('admin/feedback',$addmin);
        $this->load->view('admin/admin_footer');
}
//...............event name....//
 public function event_name()
  {
     $current_date = date('Y-m-d');

     
     $data = array('event_name' => $this->input->post('event_name'),
                    'current_date'=> $current_date

                   );
     $this->login_model->insert_data('add_event',$data);
     redirect('admission/insert_add_event');
     
  }
public function color_feed()
{
  $black=$this->input->post('black');
  $ad=$this->login_model->updateeeee($black);
  print_r($ad);

}
public function color_feed1()
{
  echo $black=$this->input->post('black');
  $ad=$this->login_model->updateeees($black);
  print_r($ad);

}
public function color_feed2()
{
  echo $black=$this->input->post('black2');
  $ad=$this->login_model->updateeees2($black);
  print_r($ad);

}

  public function add_new_event()
    {
      
      $event_for = $this->input->post('event_for');
      $section   =  $this->input->post('section');

      $class_1 = $this->input->post('class');
      $from = $this->input->post('from_class');
      $to= $this->input->post('to_class');
      $from_to = $from."-". $to;
     if($event_for == 'selected_class')
          {
              $class = $class_1;
              $section_1 = $section;
          }
     elseif($event_for == 'Class')
          {
            $class = $from_to;
            $section_1 = 'all';
          }
     else
          {
            $class = 'all';
            $section_1 = 'all';
          }
  

      // $this->form_validation->set_rules('event_name','Notice name','required');
      // $this->form_validation->set_rules('event_date','Notice date','required');
      // $this->form_validation->set_rules('event_start_time','Notice remove date','required');
      // $this->form_validation->set_rules('event_end_time','Notice description','required');
      // $this->form_validation->set_rules('event_for','Notice submit by','required');
      // // $this->form_validation->set_rules('class','Notice submit by','required');
      // // $this->form_validation->set_rules('section','Notice submit by','required');
      // $this->form_validation->set_rules('staff_id','Staff id','required');
     
      // if($this->form_validation->run()==FALSE)
      // {
      //   $this->add_event();
      // }
      // else
      // {

        $add_event = array(
                         'event_name' => $this->input->post('event_name'),
                         'description' => $this->input->post('description'),
                         'event_date' => $this->input->post('event_date'),
                         'end_date' => $this->input->post('end_date'),
                         'event_start_time' => $this->input->post('event_start_time'),
                         'event_end_time' => $this->input->post('event_end_time'),
                         'event_for' => $this->input->post('event_for'),
                         'class' => $class,
                         'section' => $section_1,
                         'staff_id' => $this->input->post('staff_id')
                       );
       $class_id  = $add_event['class'];
       $class_for = $add_event['event_for'];
       $section_id = $add_event['section'];

       $class_ids = explode('-', $class_id);
     

      if($add_event['class'] == 'all' || $add_event['class'] == 'selected_class')
      {
       $all_data['std_all'] = $this->login_model->student_id(); 
      }
      elseif ($class_ids[0] != ' ' && $class_ids[1] != ''){
         $all_data['std_all'] = $this->login_model->student_between($class_ids[0],$class_ids[1]);
        
      }
        
      else
      {
        
      $all_data['std_all'] = $this->login_model->student_id1($class_id,$section_id);
     
      }
   
      $this->login_model->insert_data('add_event',$add_event);
      $this->login_model->participation($all_data);
      redirect('admission/add_event');
     }

     public function event_name_delete()
    {
    $event_name_id = $this->uri->segment(3);
    $data_admin = $this->login_model->event_remove('event_name','event_name_id',$event_name_id);
      redirect('admission/insert_event_name');
    }
     public function event_delete()
     {
      $event_id = $this->uri->segment(3);
      $data_admin = $this->login_model->event_remove('add_event','event_id',$event_id);
      redirect('admission/add_event');
     }
     public function update_event()
     {
      $data = $this->input->post('value');
      $col = $this->input->post('col_nam');
      $id = $this->input->post('evt_id');
      $this->login_model->update_event_data('add_event','event_id',$id,$col,$data);
      redirect('admission/add_event');
     }

    public function event_detail_delete()
     {
      $detail_id = $this->uri->segment(3);

      $this->login_model->event_remove('event_details','event_details_id',$detail_id);
      redirect('admission/event_detail');
     }

  public function update_event_detail()
  {
    $val = $this->input->post('value');
    $col = $this->input->post('colname');
    $id = $this->input->post('id');
    $this->login_model->update_event_data('event_details','event_details_id',$id,$col,$val);
    redirect('admission/event_detail');
   }

 
    public function event_detail_insert()
     {
       $e_name = $this->input->post('event_name');
       $e_date = $this->input->post('event_date');

       // $this->form_validation->set_rules('event_name','Event name','required');
       // $this->form_validation->set_rules('class_name','Class name','required');
       // $this->form_validation->set_rules('section_name','section name','required');
       //  $this->form_validation->set_rules('winner1st','winner 1st','required');
       //  $this->form_validation->set_rules('winner2nd','winner 2nd','required');
       //  $this->form_validation->set_rules('winner3rd','winner 3rd','required');
       
       // if($this->form_validation->run()==FALSE)
       // {
       //  $this->event_detail();
       // }
       // else
       // {

       $add_event = array(
      'event_id' => $this->input->post('event_name'),

      'class_name' => $this->input->post('class_name'),
      'section_name' => $this->input->post('section_name'),
      'winner1st' => $this->input->post('winner1st'),

      'class_name_2' => $this->input->post('class_name_2'),
      'section_name_2' => $this->input->post('section_name_2'),
      'winner2nd' => $this->input->post('winner2nd'),

      'class_name_3' => $this->input->post('class_name_3'),
      'section_name_3' => $this->input->post('section_name_3'),
      'winner3rd' => $this->input->post('winner3rd')
     );
      $this->login_model->insert_data('event_details',$add_event);


       $winner = array(
      'class_name' => $this->input->post('class_name'),
      'section_name' => $this->input->post('section_name'),
      'winner1st' => $this->input->post('winner1st'),

      'class_name_2' => $this->input->post('class_name_2'),
      'section_name_2' => $this->input->post('section_name_2'),
      'winner2nd' => $this->input->post('winner2nd'),

      'class_name_3' => $this->input->post('class_name_3'),
      'section_name_3' => $this->input->post('section_name_3'),
      'winner3rd' => $this->input->post('winner3rd')
     );
        
      $data['a_std'] = $this->login_model->std_id_fetch();
      $this->login_model->insert_winner($winner,$e_name,$e_date,$data);
      redirect('admission/event_detail');
       }
     public function insert_event_name()
  {
      $data['event_name'] = $this->login_model->fetch_all('event_name');
      $this->load->view('admin/admin_header');
      $this->load->view('admin/admin_sidebar');
      $this->load->view('admin/insert_event_name',$data);
      $this->load->view('admin/admin_footer');

  }
  public function participation_delete()
     {
      $parti_id = $this->uri->segment(3);
      $this->login_model->event_remove('event_participation','participation_id',$parti_id );
      redirect('admission/participate_list');
     }
public function  role_auth()
{

  $staff_id=$this->input->post('staff_id');
  $role_auth=array(
  'add_user'=>$this->input->post('add_user'),
  'manage_user'=>$this->input->post('manage_user'),
  'add_class'=>$this->input->post('add_class'),
  'add_subject'=>$this->input->post('add_subject'),
  'add_incharge'=>$this->input->post('add_incharge'),
  'add_exam'=>$this->input->post('add_exam'),
  'add_daily_basis'=>$this->input->post('add_daily_basis'),
  'add_time_table'=>$this->input->post('add_time_table'),
  'add_notice'=>$this->input->post('add_notice'),
  'insert_event'=>$this->input->post('insert_event'),
  'add_event'=>$this->input->post('add_event'),
  'event_detail'=>$this->input->post('event_detail'),
  'participate_list'=>$this->input->post('participate_list'),
  'add_notes'=>$this->input->post('add_notes'),
  'assignment'=>$this->input->post('assignment'),
  'lesson_plan'=>$this->input->post('lesson_plan'),
  'staff_attendance'=>$this->input->post('staff_attendance'),
  'class_attendance'=>$this->input->post('class_attendance'),
  'exam_marks'=>$this->input->post('exam_marks'),
  'test_marks'=>$this->input->post('test_marks'),
  'assign_subject_teacher'=>$this->input->post('assign_subject_teacher'),
  'assign_sec_roll'=>$this->input->post('assign_sec_roll'),
  'add_vehicle'=>$this->input->post('add_vehicle'),
  'add_routes'=>$this->input->post('add_routes'),
  'add_driver'=>$this->input->post('add_driver'),
  'add_destination'=>$this->input->post('add_destination'),
  'transport'=>$this->input->post('transport'),
  'transport_allocation'=>$this->input->post('transport_allocation'),
  'gallery'=>$this->input->post('gallery'),
  'library_category'=>$this->input->post('library_category'),
  'add_books'=>$this->input->post('add_books'),
  'add_request'=>$this->input->post('add_request'),
  'books_request'=>$this->input->post('books_request'),
  'promotion'=>$this->input->post('promotion'),
  'authority'=>$this->input->post('authority'),
  'visitor_entry'=>$this->input->post('visitor_entry'),
  'feedback'=>$this->input->post('feedback')
  );
 $auth = $this->login_model->fetch_role($staff_id);
 print_r($auth);
 if($auth==1)
 {
$auth['role'] = $this->login_model->auth_role_update($role_auth,$staff_id);
 }
else
{
$auth['role'] = $this->login_model->auth_role($role_auth,$staff_id);
}
redirect('admission/role_permission');
}

//...............event name end....//
public function admin_feedback()
{
     echo $admin= $this->input->post('admin');
     $addmin['admin'] = $this->login_model->admin_feed();
     print_r($addmin['admin']);
     $fed=array(
        'feedback_access' => $this->input->post('admin')
          );

if($addmin['admin'][0]!='')
{
   $this->login_model->update_data_auth('admin_auth',$fed);
}
else
{
  $this->login_model->insert_data('admin_auth',$fed);
}     
}


}
?>