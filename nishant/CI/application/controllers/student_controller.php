<?php
class student_controller extends CI_Controller
{
public function __construct()
{
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model('student_model');
        $this->load->model('login_model');
        $this->load->library('session');
          $this->load->helper('string');

}
public function index()
{
        $this->load->view('student/login');
}
public function student_login_function()
{
$login_data = array(
            'std_email'=>$this->input->post('std_email'),
            'std_password'=>$this->input->post('std_password')
            );
$std_login = $this->student_model->student_login($login_data);
if($std_login['count']==1){
$myarray['data']=$std_login['data'];
// print_r($myarray['data']);
$this->session->set_userdata('std_array',$myarray);
redirect('student_controller/dashboard/');
}
else{
redirect('student_controller/');
}
}

public function dashboard()
{
$stuu=$this->session->userdata('std_array');
$std_class=$stuu['data'][0]['std_class'];
$std_section=$stuu['data'][0]['std_section'];
$subject_marks['mark'] = $this->student_model->subject_marks($std_class,$std_section);
$std_email = $this->session->userdata('std_array'); 
foreach ($std_email['data'] as $key => $value1)
{
             $std_id2 = $value1['std_id'];
}
$event_notic['partici_data'] = $this->login_model->notification_data($std_id2);
$std_id1['id_all'] = $this->login_model->std_id_all($std_id2);
$event_notic['event_data'] = $this->login_model->event_of_student($std_id1);
$this->session->set_userdata('event_notic',$event_notic);   
$std_data = $this->session->userdata('std_array');
$std_id = $std_data['data'][0]['std_id'];
$std_class = $std_data['data'][0]['std_class'];
$std_section = $std_data['data'][0]['std_section'];
$std_data['std_data'] = $this->student_model->sub_class($std_id);
$student_msg['student_msg'] = $this->student_model->student_msg($std_id);
$this->session->set_userdata('student_msg',$student_msg);
$student_msg=$this->session->userdata('student_msg');
$event['all_event_data'] = $this->student_model->evnt_all_data_fetch($std_class);
$event['all_event'] = $this->student_model->evnt_all_data($std_id);
$event['coming_event'] = $this->student_model->coming_event_fetch($std_class);
$event['notification_count']= $this->login_model->count_notification($std_id);
$event['winner_name'] = $this->student_model->winner_fetch();
$dass['grop_subj']=$this->login_model->grop_subj();

for($ool=0;$ool<count($dass['grop_subj']);$ool++)
{
    $sub_per[]=$dass['grop_subj'][$ool]['subject'];
}
for($lm=0;$lm<count($sub_per);$lm++)
{
   $dass['grop_subj_per'][$dass['grop_subj'][$lm]['subject']]=$this->login_model->grop_subj_per($sub_per[$lm]);
}

      $birthday = $this->student_model->admin_color($std_id);

      $this->session->set_userdata('std_sidebar',$birthday[0]['std_sidebar']);
      $this->session->set_userdata('std_background',$birthday[0]['std_body']);
      $this->session->set_userdata('std_header',$birthday[0]['std_header']);


$this->load->view('student/student_header',$event);
$this->load->view('student/student_sidebar',$dass);
$this->load->view('student/student_footer');
$this->load->view('student/student_dashboard',$std_data);
}

public function logout()
{
            $this->session->unset_userdata('std_array');
            $this->session->sess_destroy();
            redirect('student_controller/index');
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
            redirect('student_controller/student_info');

}

public function student_info($data_student_new = '')
{
$std_data = $this->session->userdata('std_array');
$id = $std_data['data'][0]['std_id'];
$std_pro_data['data'] = $this->student_model->std_fetch($id);
$data_student_new1['myarray'] = $data_student_new;
$this->load->view('student/student_header',$data_student_new1);
$this->load->view('student/std_profile',$std_pro_data);
$this->load->view('student/student_sidebar');
$this->load->view('student/student_footer');
}
public function std_profile_data($id='')
{
  $idd = $this->uri->segment(3);
         $dec = base64_decode ($idd);
         $num=substr($dec, 5);
         $id= substr($num, 0, -3);
$std_data = array(
             'std_mobile'=>$this->input->post('std_mobile'),
             'std_address'=>$this->input->post('std_address'),
             'std_religion'=>$this->input->post('std_religion')
            );


$this->student_model->std_pro_update($std_data,$id);
redirect('student_controller/student_info');
}
public function marks_analyse()
{
$stuu=$this->session->userdata('std_array');
$std_class=$stuu['data'][0]['std_class'];
$std_section=$stuu['data'][0]['std_section'];
$subject_marks['mark'] = $this->student_model->subject_marks($std_class,$std_section);
$this->load->view('student/student_sidebar');
$this->load->view('student/student_footer');
$this->load->view('student/student_header');  
$this->load->view('student/marks_analyse',$subject_marks);     
}

public function marks_analytic()
{ 
$std_marks_sess = array(
             'basis_of'=>$this->input->post('basis_of'),
             'subject'=>$this->input->post('subject'),
             'month'=>$this->input->post('month'),
             'year'=>$this->input->post('year')
            );
$std_marks_id = $this->session->userdata('std_array');
$basis_of = $this->input->post('basis_of');
$subject = $this->input->post('subject');
$month = $this->input->post('month');
$year = $this->input->post('year');
if($basis_of == 'Exam Basis'){
$exam_type = $this->input->post('exam_type');
$this->session->unset_userdata('test_type');
 $name = $this->session->set_userdata('exam_type',$exam_type);
 $this->session->set_userdata('std_marks_sess',$std_marks_sess);
$stu_iddd = $std_marks_id['data'][0]['std_id'];
$own_mark = $this->student_model->marks_analytics($stu_iddd,$subject,$exam_type,$month,$year);
foreach ($own_mark as $key => $value) {
 $exam_id[]=$value['exam_id'];
}

$max_min_mark = $this->student_model->max_min_avg_analytics($exam_id);


$total_mark = $this->student_model->total_analytics($stu_iddd,$subject,$exam_type,$month,$year);
}
if($basis_of == 'Daily Basis'){
echo $test_type=$this->input->post('test_type');
$this->session->unset_userdata('exam_type');
$this->session->set_userdata('test_type',$test_type);
$this->session->set_userdata('std_marks_sess',$std_marks_sess);
$stu_iddd = $std_marks_id['data'][0]['std_id'];
$own_mark = $this->student_model->test_marks_analytics($stu_iddd,$subject,$test_type,$month,$year);
foreach ($own_mark as $key => $value) {
 echo $test_id[]=$value['test_id'];

}

$max_min_mark = $this->student_model->test_max_min_avg_analytics($test_id);
$total_mark = $this->student_model->test_total_analytics($stu_iddd,$subject,$test_type,$month,$year);
}

$this->session->set_userdata('max_min_mark',$max_min_mark);
$this->session->set_userdata('total_mark',$total_mark);
$this->session->set_userdata('own_mark',$own_mark);
redirect('student_controller/marks_analyse');
}  
//..  navita 17/11  .>

public function color_feed()
{
$stuu=$this->session->userdata('std_array');
$std_id=$stuu['data'][0]['std_id']; 
$black=$this->input->post('black');
$ad=$this->student_model->updateeeee($black,$std_id);
print_r($ad);

}
public function color_feed1()
{
  $stuu=$this->session->userdata('std_array');
  $std_id=$stuu['data'][0]['std_id'];  
  echo $black=$this->input->post('black');
  $ad=$this->student_model->updateeees($black,$std_id);
  print_r($ad);

}
public function color_feed2()
{
  $stuu=$this->session->userdata('std_array');
  $std_id=$stuu['data'][0]['std_id']; 
  echo $black=$this->input->post('black2');
  $ad=$this->student_model->updateeees2($black,$std_id);
  print_r($ad);

}



public function student_leave()
    {    
        $id = $this->session->userdata('std_array'); 
        $std_id = $id['data'][0]['std_id'];
        $student_leave_data['fetch_student_leave'] = $this->student_model->fetch_student_leave($std_id);
        $this->load->view('student/student_header',$student_leave_data);
        $this->load->view('student/student_leave');
        $this->load->view('student/student_sidebar');
        
         $this->load->view('student/student_footer');
          
    }

 
    public function agree()
    {
     $std_id = $this->uri->segment(3);
     $event_id = $this->uri->segment(4);
     $this->student_model->agree_participate($std_id,$event_id);
     redirect('student_controller/student_event');
    }
    public function decline()
    {
     $std_id = $this->uri->segment(3);
     $event_id = $this->uri->segment(4);
     $this->student_model->decline_participate($std_id,$event_id);
     redirect('student_controller/dashboard');
    }

    public function student_event()
    {
        $std_email = $this->session->userdata('std_array'); 
            foreach ($std_email['data'] as $key => $value1)
             {
             $std_id = $value1['std_id'];
             }
             // all notification data based on std_id and status
         $event_notic['partici_data'] = $this->login_model->notification_data($std_id);

        // all std_id of participation table 
        $std_id1['id_all'] = $this->login_model->std_id_all($std_id);

         // all data fetch  from participatio table based on std id 
        $all_event['event_data'] = $this->login_model->event_of_student($std_id1);

        $this->load->view('student/student_header',$event_notic);
        $this->load->view('student/student_sidebar');
        $this->load->view('student/student_event_detail',$all_event);
        $this->load->view('student/student_footer');
    }


public function msg(){
$std_data = $this->session->userdata('std_array');
echo $id = $std_data['data'][0]['std_id'];
$sub_class= $this->student_model->sub_class($id);
$clss=$sub_class[0]['std_class'];
$section=$sub_class[0]['std_section'];
$sub_class_teacher['sub_class_teacher']= $this->student_model->sub_class_teacher($clss,$section);
$sub_class_teacher['student_msg_read'] = $this->student_model->student_msg_read($id);
$sub_class_teacher['student_msg_unread'] = $this->student_model->student_msg_unread($id);
$this->load->view('student/student_sidebar');
$this->load->view('student/student_footer');
$this->load->view('student/student_header');
$this->load->view('student/msg',$sub_class_teacher);
}
public function chat_with_student()
{ 
    $std_data = $this->session->userdata('std_array');
    $std_id = $std_data['data'][0]['std_id'];
    $std_class = $std_data['data'][0]['std_class'];
    $std_section = $std_data['data'][0]['std_section'];
    $chatty=array(
   'class_sub'=>$std_class,
   'section_sub'=>$std_section,
   'message'=>$this->input->post('message'),
   'subject'=>$this->input->post('subject'),
   'tch_id'=>$this->input->post('subject_teacher'),
   'send_by_student'=>$std_id
        );
$chat_teacher['chat_teacher'] = $this->student_model->insert_data('messenger',$chatty);
redirect('student_controller/msg');

}
public function attendance(){

    $std_data = $this->session->userdata('std_array');
    $std_id = $std_data['data'][0]['std_id'];
    $std_class = $std_data['data'][0]['std_class'];
    $std_section = $std_data['data'][0]['std_section'];
 $class['class_data'] = $this->student_model->class_fetch1($std_class,$std_section);
$this->load->view('student/student_sidebar');
$this->load->view('student/student_header');
$this->load->view('student/std_attendance',$class);
$this->load->view('student/student_footer');
}

public function attendance_view()
      {
        $std_data = $this->session->userdata('std_array');
        $std_id = $std_data['data'][0]['std_id'];
        $class_ajx = $std_data['data'][0]['std_class'];
        $sec_ajx = $std_data['data'][0]['std_section'];
        $month = $this->input->post('month');
        $years = $this->input->post('year3');

        $attendance_fetch['attendance'] = $this->student_model->attendance_data($class_ajx,$sec_ajx,$month,$years,$std_id);
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
public function msg_read()
{
$msg_read=$this->input->post('msg_read');
$msg_read = $this->student_model->msg_read($msg_read);
}
// student notes view start by sachin
public function notes_view()
{
  $std_data = $this->session->userdata('std_array');
  $std_id = $std_data['data'][0]['std_id'];
  $std_class = $std_data['data'][0]['std_class'];
  $std_section = $std_data['data'][0]['std_section'];
  $notes_view['notes_data'] = $this->student_model->notes_view_data($std_class,$std_section);
  $this->load->view('student/student_header');
  $this->load->view('student/student_sidebar');
  $this->load->view('student/notes_view',$notes_view);
  $this->load->view('student/student_footer');
 }
public function assignment_view()
{
  $std_data = $this->session->userdata('std_array');
  $std_id = $std_data['data'][0]['std_id'];
  $std_class = $std_data['data'][0]['std_class'];
  $std_section = $std_data['data'][0]['std_section'];
  $assign_view['assign_get'] = $this->student_model->assignment_view_data($std_class,$std_section);
  $this->load->view('student/student_header');
  $this->load->view('student/student_sidebar');
  $this->load->view('student/assignment_view',$assign_view);
  $this->load->view('student/student_footer');
}
public function exam_view()
{
  $std_data = $this->session->userdata('std_array');
  $std_id = $std_data['data'][0]['std_id'];
  $std_class = $std_data['data'][0]['std_class'];
  $std_section = $std_data['data'][0]['std_section'];
  $exam_view['exam_get'] = $this->student_model->exam_view_data($std_class,$std_section);
  $this->load->view('student/student_header');
  $this->load->view('student/student_sidebar');
  $this->load->view('student/exam_view',$exam_view);
  $this->load->view('student/student_footer');
}
public function test_exam_view()
  {
  $std_data = $this->session->userdata('std_array');
  $std_id = $std_data['data'][0]['std_id'];
  $std_class = $std_data['data'][0]['std_class'];
  $std_section = $std_data['data'][0]['std_section'];
  $test_exam_view['test_exam_get'] = $this->student_model->test_exam_view($std_class,$std_section);
  $this->load->view('student/student_header');
  $this->load->view('student/student_sidebar');
  $this->load->view('student/test_exam_view',$test_exam_view);
  $this->load->view('student/student_footer');
  }
  public function time_table()
  {
  $std_data = $this->session->userdata('std_array');
  $std_id = $std_data['data'][0]['std_id'];
  $std_class = $std_data['data'][0]['std_class'];
  $std_section = $std_data['data'][0]['std_section'];
  $time_table['time_table_data'] = $this->student_model->time_table_view($std_class,$std_section);
           
  $this->load->view('student/student_header');
  $this->load->view('student/student_sidebar');
  $this->load->view('student/time_table_view',$time_table);
  $this->load->view('student/student_footer');
  }
  public function lession_plan_view()
  {
  $std_data = $this->session->userdata('std_array');
  $std_id = $std_data['data'][0]['std_id'];
  $std_class = $std_data['data'][0]['std_class'];
  $std_section = $std_data['data'][0]['std_section'];
  $lession_plan_view['lession_plan_data'] = $this->student_model->lession_plan_get($std_class,$std_section);
           
  $this->load->view('student/student_header');
  $this->load->view('student/student_sidebar');
  $this->load->view('student/lession_plan_view',$lession_plan_view);
  $this->load->view('student/student_footer');
  }

public function feedback($mesg='')
{     
$sub_class_teacher['msg']=$mesg;
$std_data = $this->session->userdata('std_array');
$id = $std_data['data'][0]['std_id'];
$sub_class= $this->student_model->sub_class($id);
$clss=$sub_class[0]['std_class'];
$section=$sub_class[0]['std_section'];





$sub_class_teacher['sub_class_teacher']= $this->student_model->sub_class_teacher($clss,$section);


 $sub_class_teacher['admin'] = $this->login_model->admin_feed();
 $this->load->view('student/student_header');
 $this->load->view('student/student_sidebar',$sub_class_teacher);
 $this->load->view('student/feedback',$sub_class_teacher);
 $this->load->view('student/student_footer');
} 

public function student_feedback()
{
$std_data = $this->session->userdata('std_array');
 $id = $std_data['data'][0]['std_id'];
 $class = $std_data['data'][0]['std_class'];
 $section = $std_data['data'][0]['std_section'];  
$staff_i = $this->input->post('staff_id');
$staff_id=explode('/', $staff_i);
$date_feedback = $this->input->post('date_feedback');
$fed_date=explode('-',$date_feedback);
$student_feedback['student_feedback']= $this->student_model->student_feedback($staff_id[0],$id,$fed_date[0]);


if(count($student_feedback['student_feedback'])!=0)
{
$msg='already exist';
$this->feedback($msg);
}
else
{
$feedback=array(
'staff_id' => $staff_id[0],
'date_feedback' => $this->input->post('date_feedback'),
'communication' => $this->input->post('communication'),
'knowledge' => $this->input->post('knowledge'),
'discipline' => $this->input->post('discipline'),
'punctuality' => $this->input->post('punctuality'),
'coverage' => $this->input->post('coverage'),
'respect' => $this->input->post('respect'),
'ask_question' => $this->input->post('ask_question'),
'sufficient_time' => $this->input->post('sufficient_time'),
'lecture' => $this->input->post('lecture'),
'Suggestion' => $this->input->post('Suggestion'),
'additional_comment' => $this->input->post('additional_comment'),
'staff_name' => $staff_id[1],
'current_session'=>$fed_date[0]
);
$overall=$feedback['communication']+$feedback['knowledge']+$feedback['discipline']+$feedback['punctuality']+$feedback['coverage']+$feedback['respect']+$feedback['ask_question']+$feedback['sufficient_time'];

$overall_rate=$overall/8;
$std_data = $this->session->userdata('std_array');
 $id = $std_data['data'][0]['std_id'];
 $class = $std_data['data'][0]['std_class'];
 $section = $std_data['data'][0]['std_section'];

 if($feedback['staff_id']!=''){
$feedback['feedback']= $this->student_model->insert_data_fed('student_feedback',$feedback,$overall_rate,$id,$class,$section);
}
redirect('student_controller/feedback');
}
}
public function delete_winner_noti()
  {
    $s_id = $this->uri->segment(3);
    $win_id = $this->uri->segment(4);
    $this->student_model->winner_noti_delete('event_winner','win_id',$win_id,'std_id', $s_id);
    redirect('student_controller/dashboard');
  }

}
?>