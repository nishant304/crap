<?php
class parent_controller extends CI_Controller
{
public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->database();
		$this->load->model('parent_model');
    $this->load->model('student_model');
		$this->load->library('session');
    $this->load->helper('string');
	}

public function index()
	{
        $this->load->view('parent/login');
    }
public function parent_login_function()
    {
$parent_data = array(
'parent_email'=>$this->input->post('parent_email'),
'parent_password'=>$this->input->post('parent_password')
       );

$parent_login=$this->parent_model->parent_login($parent_data);

    $logout=0;
    for($i=0;$i<=2;$i++){
    
    if(!empty($parent_login[$i])){
      print_r($parent_login[$i]);
  
        $logout++;
        echo "hii";
        
         if($i==0){
     echo $login_from='std_father_email';
    }
    elseif($i==1){
     echo $login_from='std_mother_email';
    }
    else{
     echo  $login_from='std_guardian_email';  
    }
    echo $std_id=$parent_login[$i][0]['std_id'];
     echo $parent_id=$parent_login[$i][0]['parent_id'];
    $this->session->set_userdata('parent_id',$parent_id);
$stu_login_data=$this->parent_model->stu_login_data($login_from,$std_id);

}

 }
 if($logout==0)
 {
   
    redirect('parent_controller/');
 }
 else{

$this->session->set_userdata('login_from',$login_from);
$this->session->set_userdata('parent_detailed',$parent_login);
$this->session->set_userdata('student_detailed',$stu_login_data);

redirect('parent_controller/dashboard');

 }
 }
public function dashboard()
{
 echo $parent_mail3=$this->session->userdata('login_from');

$student_detailed3=$this->session->userdata('student_detailed');
$stu_idd=$student_detailed3[0]['std_id'];
$parent_portal3=$student_detailed3[0][$parent_mail3];
$approved_child['access_child']=$this->parent_model->approved_child($stu_idd,$parent_portal3,$parent_mail3);



$parent_id=$this->session->userdata('parent_id');
$parent_msg = $this->parent_model->parent_msg($parent_id);
 $birthday = $this->parent_model->admin_color($parent_id);
$this->session->set_userdata('parent_sidebar',$birthday[0]['parent_sidebar']);
$this->session->set_userdata('parent_background',$birthday[0]['parent_body']);
$this->session->set_userdata('parent_header',$birthday[0]['parent_header']);
$this->session->set_userdata('parent_msg',$parent_msg);
$this->load->view('parent/parent_sidebar');
$this->load->view('parent/parent_dashboard',$approved_child);
$this->load->view('parent/parent_header');
$this->load->view('parent/parent_footer');
}
public function request()
{
  $this->load->view('parent/parent_header');
  $this->load->view('parent/parent_sidebar');
$this->load->view('parent/request_form');
$this->load->view('parent/parent_footer');

}
public function request_form_responce()
{
$parent_mail=$this->session->userdata('parent');
$request_data = array(
      'std_fname'=>$this->input->post('std_fname'),
      'std_class'=>$this->input->post('std_class'),
      'std_'.$this->input->post('request_email').'_email'=>$this->input->post('std_parent_email'),
      'std_email'=>$this->input->post('std_email')
       );
$request_data_pro=$this->parent_model->request_data_form($request_data);
print_r($request_data_pro[0]["std_id"]);
if(!empty($request_data_pro))
{
$request_data_insert = array(
'request_send'=>$this->input->post('request_send'),  
 'request_received'=>$this->input->post('std_parent_email'),
 'request_std_id'=>$request_data_pro[0]["std_id"],
 'relation'=>$parent_mail
  );

$request_data_pro1=$this->parent_model->insert_data("parent_request",$request_data_insert);    
if($request_data_pro1=='1'){
$to_email=$request_data_pro[0]['std_'.$this->input->post('request_email').'_email'];
$from_email = 'sachinraajvijay@gmail.com';
$subject = 'Verify Your Email Address';
$message = 'Please check your login portal to give the permission to access your child.';
if($to_email!=''){
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
}
else
{
echo "invalid_student";
}
redirect('parent_controller/request');
}
public function notification()
{
$student_detailed1 = $this->session->userdata('student_detailed');  
$parent_mail1=$this->session->userdata('login_from');
$parent_portal=$student_detailed1[0][$parent_mail1];
$notification['noti']=$this->parent_model->notify($parent_portal);
$this->load->view('parent/parent_header');
$this->load->view('parent/parent_sidebar');
$this->load->view('parent/notification',$notification);
$this->load->view('parent/parent_footer');
}
 public function approved($id='')
{
$student_detailed2 = $this->session->userdata('student_detailed');
$parent_mail2=$this->session->userdata('login_from');
$approved=$this->parent_model->request_id($id);
if($approved=='1')
{
$parent_portal=$student_detailed2[0][$parent_mail2];
$status=1;
$approved_detailed=$this->parent_model->request_apprv_detailed($id,$status,$parent_portal);

$update_email=$approved_detailed[0]['request_send'];
$received_email=$approved_detailed[0]['request_received'];
$std_id=$approved_detailed[0]['request_std_id'];
$approved_detailed[0]['relation'];
if($approved_detailed[0]['relation']=='father')
{
    $relation='std_father_email';
}
elseif($approved_detailed[0]['relation']=='mother')
{
    $relation='std_mother_email';
}
else{
    $relation='std_guardian_email'; 
} 
$update_email_by_approved=$this->parent_model->update_email_by_apprv($std_id,$relation,$update_email,$received_email,$parent_mail2);
redirect('parent_controller/notification');
}
}
 public function request_del($id='')
 {
$delete_request=$this->parent_model->delete_request($id);
redirect('parent_controller/notification');
 }
public function add_form_responce()
{

$parent = $this->input->post('to_email');
$add_email = $this->input->post('add_email');
$email_active = $this->input->post('email_active');

if($parent=='father')
{
$relationn_email='father_email';
$relationn_password='father_password';
}
elseif($parent=='mother')
{
$relationn_email='mother_email';
$relationn_password='mother_password';
}
else{
$relationn_email='guardian_email';
$relationn_password='guardian_password';
}
$parent_det=$this->session->userdata('parent_detailed');
for($i=0;$i<=3;$i++)
{
 if(!empty($parent_det[$i])) 
 {
 $parent = 'std_'.$this->input->post('to_email').'_email';
 $add_email = $this->input->post('add_email');
 $std_id=$parent_det[$i][0]["std_id"];
 $parent_id=$parent_det[$i][0]["parent_id"];
// die();
$passwordd=random_string('alnum',6);
$update_mail=$this->parent_model->update_mail($parent_id,$relationn_email,$relationn_password,$add_email,$email_active,$passwordd);
if($update_mail==1){
$update_mail1=$this->parent_model->update_mail_student_table($std_id,$add_email,$parent);
}
if($update_mail1==1)
{

$from_email = 'sachinraajvijay@gmail.com';
$subject = 'Verify Your Email Address';

 $to_email=$this->input->post('add_email');

$message = 'WELCOME TO BECOME A MEMBER<br><table>
<tr><td>Your Username:</td><td>'.$to_email.'</td></tr>

   <tr> <td>Your password: </td><td>'.$passwordd.'</td></tr></table>'; 
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
}
}
public function logout()
    {
            $this->session->unset_userdata('std_array');
            $this->session->sess_destroy();
            redirect('parent_controller/index');
    }
public function msg()
{
$parent_id=$this->session->userdata('parent_id');
$parent_detail=$this->parent_model->parent_detail($parent_id);
$std_id_det=$this->parent_model->std_id($parent_detail);
for($io=0;$io<count($std_id_det);$io++)
{
$std_array['id'][$io]=$std_id_det[$io]['std_id'];
$std_array['name'][$io]=$std_id_det[$io]['std_fname'];
$std_array['class'][$io]=$std_id_det[$io]['std_class'];
$std_array['section'][$io]=$std_id_det[$io]['std_section'];
}
$std_array=$this->session->set_userdata('std_array',$std_array);
$this->load->view('parent/parent_header');
$this->load->view('parent/parent_sidebar');
$this->load->view('parent/msg');
$this->load->view('parent/parent_footer');
}    
public function class_section_sub_teacher()
{
$id=$this->input->post('id');
$classs=$this->input->post('classs');
$section=$this->input->post('section');
$sub_class_teacher= $this->student_model->sub_class_teacher($classs,$section);
?><select>
<option>Select</option>
<?php 
foreach ($sub_class_teacher as $key) { ?>

<option value="<?php echo $key['tch_id'];?>">[<?php echo $key['sub_name'];?>] Teacher</option>
</select>   
<?php }
}
public function chat_with_parent()
{
  $student=$this->input->post('student');
  $std_det=explode('/', $student);

$parent_id=$this->session->userdata('parent_id');
$parent_teacher=array(
'regarding_student'=>$std_det[0],
'tch_id'=>$this->input->post('subject_teacher'),
'subject'=>$this->input->post('subject'),
'message'=>$this->input->post('message'),
'class_sub'=>$std_det[1],
'section_sub'=>$std_det[2],
'send_by_parent'=>$parent_id);
$parent_teacher=$this->parent_model->insert_data("messenger",$parent_teacher); 
redirect('parent_controller/msg');
}
public function msg_id()
{

$msg_id=$this->input->post('msg_id');
$msg_id_update=$this->parent_model->msg_id_update("messenger",$msg_id); 
}
public function del_msg()
{
$this->parent_model->del_msg('messenger',$msg_del); 
redirect('parent_controller/msg');
}
 public function student_view()
  {
     error_reporting(0);
     $ip = $this->uri->segment(3);
         $dec = base64_decode ($ip);
         $num=substr($dec, 5);
         $id= substr($num, 0, -3);


     $this->session->set_userdata('ids',$id);
     $data = $this->student_model->std_fetch($id);
     $this->session->set_userdata('std1_array',$data);
     $std_class = $data[0]['std_class'];
     $std_section = $data[0]['std_section'];
     $exam_view['mark'] = $this->student_model->subject_marks($std_class,$std_section);
     $exam_view['class_data'] = $this->student_model->class_fetch1($std_class,$std_section);
     $exam_view['exam_get'] = $this->student_model->exam_view_data($std_class,$std_section);
     $exam_view['test_exam_get'] = $this->student_model->test_exam_view($std_class,$std_section);
     $exam_view['time_table_data'] = $this->student_model->time_table_view($std_class,$std_section);
     $this->load->view('parent/parent_header');
     $this->load->view('parent/parent_sidebar');
     $this->load->view('parent/child_data',$exam_view);
     $this->load->view('parent/parent_footer');

  }


  
 public function attendance_view()
      {
       
        $std_id = $this->input->post('stdiddd');
        $class_ajx = $this->input->post('stdcls');
        $sec_ajx = $this->input->post('stdscn');

        $month = $this->input->post('month');
        $years = $this->input->post('year3');

        $attendance_fetch['attendance'] = $this->parent_model->attendance_data($class_ajx,$sec_ajx,$month,$years,$std_id);
        ?>
        <table class=" table responsive table table-bordered table table-striped">
          <thead>
          <tr class="hr_tbll">
          <th>Name</th>
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
          <td <?Php if($value['d'.$d1.$d]=='A'){ ?> style='background:rgb(67, 67, 72);color:white';  <?php   } elseif($value['d'.$d1.$d]=='P'){ ?> style='background:rgb(99, 156, 211);color:white';   <?php } elseif($value['d'.$d1.$d]=='HD'){   ?>  style='background:rgb(247, 163, 92);color:white';   <?php } elseif($value['d'.$d1.$d]=='L'){ ?> style='background:rgb(144, 237, 125);color:white';   <?php }    ?> ><?php echo $value['d'.$d1.$d]; ?></td> 
          <?php 
         $attent[]=$value['d'.$d1.$d];
           }  else {  ?>
           <td <?Php if($value['d'.$d]=='A'){ ?> style='background:rgb(67, 67, 72);color:white';  <?php   } elseif($value['d'.$d]=='P'){ ?> style='background:rgb(99, 156, 211);color:white';   <?php } elseif($value['d'.$d]=='HD'){   ?>  style='background:rgb(247, 163, 92);color:white';   <?php } elseif($value['d'.$d]=='L'){ ?> style='background:rgb(144, 237, 125);color:white';   <?php }    ?>     ><?php echo $value['d'.$d];
         $attent[]=$value['d'.$d];
            ?></td> 
          <?php }  } }
 if(!empty($attent)){    
 $count_A = 0;
for($i = 0; $i < count($attent);$i++){
    if($attent[$i] == 'A')
        $count_A++;
}
 $count_P = 0;
for($i = 0; $i < count($attent);$i++){
    if($attent[$i] == 'P')
        $count_P++;
}


 $count_L = 0;
for($i = 0; $i < count($attent);$i++){
    if($attent[$i] == 'L')
        $count_L++;
}
 $count_H = 0;
for($i = 0; $i < count($attent);$i++){
    if($attent[$i] == 'HD')
        $count_H++;
}
 }
?>
</tr>
</tbody>
</table>
<div>
<?php if(!empty($attent)){    ?>
<table>

<h3 style='background:black;color:white';>TOTAL WORkING DAY:<?php echo $count_P+$count_A+$count_H+$count_L ; ?></h3>
<h3 style='background:rgb(99, 156, 211);color:white';>TOTAL PRESENT:<?php echo $count_P; ?></h3>
<h3 style='background:rgb(67, 67, 72);color:white';>TOTAL ABSENT:<?php echo $count_A;?></h3>
<h3 style='background:rgb(247, 163, 92);color:white';>TOTAL HALF ATTENDANCE:<?php echo $count_H; ?></h3>
<h3 style='background:rgb(144, 237, 125);color:white';>TOTAL LEAVE:<?php echo $count_L;?></h3>
          <?php }   ?>
</div>

<script type="text/javascript">
var sub_obj = <?php echo json_encode($attent) ?>;
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
            ['Leave',count_A],
            ['Half Day',count_H]
        ]
    }]
});
</script>
 <?php
}
public function marks_analytic()
{ 
$std_marks_sess = array(
             'basis_of'=>$this->input->post('basis_of'),
             'subject'=>$this->input->post('subject'),
             'month'=>$this->input->post('month'),
             'year'=>$this->input->post('year')
            );
//student;
 $basis_of = $this->input->post('basis_of');
 $subject = $this->input->post('subject');
 $month = $this->input->post('month');
 $year = $this->input->post('year');
if($basis_of == 'Exam Basis'){
$exam_type = $this->input->post('exam_type');
$this->session->unset_userdata('test_type1');
 $name = $this->session->set_userdata('exam_type1',$exam_type);
 $this->session->set_userdata('std_marks_sess1',$std_marks_sess);
 $stu_iddd = $this->input->post('std_id');
$own_mark = $this->student_model->marks_analytics($stu_iddd,$subject,$exam_type,$month,$year);
foreach ($own_mark as $key => $value) {
 $exam_id[]=$value['exam_id'];
}

$max_min_mark = $this->student_model->max_min_avg_analytics($exam_id);


$total_mark = $this->student_model->total_analytics($stu_iddd,$subject,$exam_type,$month,$year);
}
if($basis_of == 'Daily Basis'){
 $test_type=$this->input->post('test_type');
$this->session->unset_userdata('exam_type1');
$this->session->set_userdata('test_type1',$test_type);
$this->session->set_userdata('std_marks_sess1',$std_marks_sess);
 $stu_iddd =$this->input->post('std_id');

$own_mark = $this->student_model->test_marks_analytics($stu_iddd,$subject,$test_type,$month,$year);
foreach ($own_mark as $key => $value) {
  $test_id[]=$value['test_id'];

}

$max_min_mark = $this->student_model->test_max_min_avg_analytics($test_id);
$total_mark = $this->student_model->test_total_analytics($stu_iddd,$subject,$test_type,$month,$year);
}
$id = $this->uri->segment(3);
$this->session->set_userdata('max_min_mark1',$max_min_mark);
$this->session->set_userdata('total_mark1',$total_mark);
$this->session->set_userdata('own_mark1',$own_mark);
redirect('parent_controller/student_view/'.$id);
}  
public function student_leave_parent()
{    
$id_allses = $this->session->userdata('id');
$student_leave_data['fetch_student'] = $this->parent_model->fetch_student($id_allses);
$student_leave_data['fetch_student_leave'] = $this->parent_model->fetch_student_leave($id_allses);
$this->load->view('parent/parent_header');
$this->load->view('parent/parent_sidebar');
$this->load->view('parent/student_leave_parent',$student_leave_data);

}
public function color_feed()
{
 $parent_id=$this->session->userdata('parent_id');
$black=$this->input->post('black');
$ad=$this->parent_model->updateeeee($black,$parent_id);
print_r($ad);

}
public function color_feed1()
{
    $parent_id=$this->session->userdata('parent_id');
  echo $black=$this->input->post('black');
  $ad=$this->parent_model->updateeees($black,$parent_id);
  print_r($ad);

}
public function color_feed2()
{
  $parent_id=$this->session->userdata('parent_id');
  echo $black=$this->input->post('black2');
  $ad=$this->parent_model->updateeees2($black,$parent_id);
  print_r($ad);

}

} 
?>