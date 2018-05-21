<?php
Class student_model extends CI_Model
{
public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
public function student_login($login_data)
    {
       $std_email = $login_data['std_email'];
       $std_password = $login_data['std_password'];
       $this->db->select('*');
       $this->db->from('admission');
       $this->db->where('std_email',$std_email);
       $this->db->where('std_password',$std_password);
      $query = $this->db->get();
         $total_rows['data'] = $query->result_array(); 
        $total_rows['count']=$query->num_rows();
        print_r($total_rows);
        

        if($total_rows['count'] == 1)
        {
         

          return $total_rows;
        }

        
    }
public function evnt_all_data_fetch($std_class)
    {
     $this->db->select('*');
     $this->db->from('add_event');
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
    }

public function evnt_all_data($std_class)
    {
     $this->db->select('*');
     $this->db->from('event_participation');
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
     }

public function coming_event_fetch($clss)
     {
     $this->db->where('std_class',$clss);
     // $this->db->where('section',$section);
     $query = $this->db->get('admission');
     $res   = $query->result_array();
     return $res;
     }     
public function winner_fetch()
     {
        $this->db->select('*');
        $this->db->from('event_winner');
        $query = $this->db->get();
        $res   = $query->result_array();
        return $res;
      }
public function winner_noti_delete($table,$evntid,$win_id,$stdid,$s_id)
      {
        
        $this->db->where($evntid,$win_id);
        $this->db->where($stdid,$s_id);
        $this->db->delete($table);
        return;
      }

public function std_fetch($id)
    {
      $this->db->select('*');
      $this->db->from('admission');
      $this->db->where('std_id',$id);
      $query = $this->db->get();
      return $query->result_array();

    }

    public function std_pro_update($std_data,$id)
    {
      $this->db->where('std_id',$id);
      $this->db->update('admission',$std_data);
      return;

    }

public function subject_marks($std_class,$std_section)
    {
      $this->db->select('*');
      $this->db->from('add_subject');
      $this->db->where('class_id',$std_class);
        $this->db->where('class_section',$std_section);
      $query = $this->db->get();
      return $query->result_array();

    }
public function marks_analytics($stu_iddd,$subject,$exam_type,$date,$year)
   {
    $this->db->select('*');
    $this->db->from('student_marks');
    $this->db->where('std_id',$stu_iddd);
    if($subject!='all'){
    $this->db->where('subject',$subject);
    }
    if($exam_type!='all'){
    $this->db->where('exam_type',$exam_type);
    }
    if($date!='all'){
    $this->db->where('month',$date);
    }
     $this->db->where('year',$year);
    $query = $this->db->get();

    return $query->result_array();
  }
public function total_analytics($stu_iddd,$subject,$exam_type,$date,$year)
   {
    $this->db->select('SUM(marks_obtain) as total_marks_obtained,SUM(max_mark) as total_marks,SUM(marks_obtain)*100/SUM(max_mark) as percentage');
    $this->db->from('student_marks');
    $this->db->where('std_id',$stu_iddd);
    if($subject!='all'){
    $this->db->where('subject',$subject);
    }
    if($exam_type!='all'){
    $this->db->where('exam_type',$exam_type);
    }
     if($date!='all'){
    $this->db->where('month',$date);
    }
     $this->db->where('year',$year);
    $query = $this->db->get();
    return $query->result_array();

  }
    
public function test_marks_analytics($stu_iddd,$subject,$exam_type,$date,$year)
   {
    $this->db->select('*');
    $this->db->from('test_marks');
    $this->db->where('std_id',$stu_iddd);
    if($subject!='all'){
    $this->db->where('subject',$subject);
    }
    if($exam_type!='all'){
    $this->db->where('test_type',$exam_type);
    }
     if($date!='all'){
    $this->db->where('month',$date);
    }
     $this->db->where('year',$year);
    $query = $this->db->get();
    return $query->result_array();
  }
public function test_total_analytics($stu_iddd,$subject,$exam_type,$date,$year)
   {
    $this->db->select('SUM(marks_obtain) as total_marks_obtained,SUM(max_mark) as total_marks,SUM(marks_obtain)*100/SUM(max_mark) as percentage');
    $this->db->from('test_marks');
    $this->db->where('std_id',$stu_iddd);
    if($subject!='all'){
    $this->db->where('subject',$subject);
    }
    if($exam_type!='all'){
    $this->db->where('test_type',$exam_type);
    }
     if($date!='all'){
    $this->db->where('month',$date);
    }
     $this->db->where('year',$year);
    $query = $this->db->get();
    return $query->result_array();
  }
//..  navita 17/11  .>
 public function fetch_student_leave($std_id) 
   {
     $this->db->select('*');
     $this->db->from('student_leave');
      $this->db->where('std_id',$std_id);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
   }
//..  navita 17/11 end .>

public function max_min_avg_analytics($exam_id){
  for($i=0; $i < count($exam_id); $i++){

 $this->db->select("MAX(marks_obtain)*100/max_mark as max_marks, MIN(marks_obtain)*100/max_mark as min_marks, AVG(marks_obtain)*100/max_mark as avg_marks");
 
 $this->db->from('student_marks');
 $this->db->where('exam_id',$exam_id[$i]);
    $query = $this->db->get();
    $n[] = $query->result_array();
}
return $n;

}
public function test_max_min_avg_analytics($test_id){
  for($i=0; $i < count($test_id); $i++){

 $this->db->select("MAX(marks_obtain)*100/max_mark as max_marks, MIN(marks_obtain)*100/max_mark as min_marks, AVG(marks_obtain)*100/max_mark as avg_marks");
 
 $this->db->from('test_marks');
 $this->db->where('test_id',$test_id[$i]);
    $query = $this->db->get();
    $n[] = $query->result_array();
}
return $n;
}
public function student_msg($std_id){
  $this->db->select('*');
     $this->db->from('messenger');
      $this->db->where('std_id',$std_id);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;

}
public function student_msg_read($std_id){
  $this->db->select('*');
     $this->db->from('messenger');
      $this->db->where('std_id',$std_id);
      $this->db->where('status',1);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;

}
public function student_msg_unread($std_id){
  $this->db->select('*');
     $this->db->from('messenger');
      $this->db->where('std_id',$std_id);
      $this->db->where('status',0);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;

}
// event notification status change start 
          public function agree_participate($std_id,$event_id)
          {
            $this->db->where('std_id',$std_id);
            $this->db->where('event_id',$event_id);
            $this->db->set('read_status',1); 
            $this->db->set('participate_status',1);
            $this->db->update('event_participation');
            return;
          }
          public function decline_participate($std_id,$event_id)
          {
            $this->db->where('std_id',$std_id);
            $this->db->where('event_id',$event_id);
            $this->db->delete('event_participation');
            return;
          }
public function sub_class($std_data)
          {
     $this->db->select('*');
     $this->db->from('admission');
     $this->db->where('std_id',$std_data);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
          }
public function sub_class_teacher($clss,$section)
{
     $this->db->select('*');
     $this->db->from('assign_sub_teacher');
     $this->db->where('assign_class',$clss);
     $this->db->where('assign_section',$section);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
}
public function insert_data($table,$chatty)
{
   $this->db->insert($table,$chatty);
     return;
}
public function insert_data_fed($table,$chatty,$set,$id,$class,$section)
{    
    $this->db->set('class',$class);
    $this->db->set('section',$section);
    $this->db->set('student_id',$id);
    $this->db->set('overall_rate',$set); 
    $this->db->insert($table,$chatty);
     return;
}
public function class_fetch1($select_class,$select_sec)
      {
        $this->db->select('class_name');
        $this->db->from('add_class');
        $this->db->group_by('class_name');
        $query = $this->db->get();
        $result_all['class'] = $query->result_array();

        $this->db->select('class_section');
        $this->db->from('add_class');
        $this->db->group_by('class_section');
        $query = $this->db->get();
        $result_all['section'] = $query->result_array();
        return $result_all;
      }
 public function attendance_data($class_ajx2,$sec_ajx2,$month,$years,$std_id)
        {
          $this->db->select('*');
          $this->db->from('attandance_report');
          $this->db->where('std_class',$class_ajx2);
          $this->db->where('std_section',$sec_ajx2);
          $this->db->where('month',$month);
          $this->db->where('year',$years);
           $this->db->where('std_id',$std_id);
          $query = $this->db->get();
          $result_all5  = $query->result_array();
          return $result_all5;
        }
public function msg_read($msg_read)
{
            $this->db->where('msg_id',$msg_read);
            $this->db->set('status',1); 
            $this->db->update('messenger');
            return;



}
// student notes view fetch by sachin
public function notes_view_data($std_class,$std_section)
{
     $this->db->select('*');
     $this->db->from('notes');
     $this->db->where('notes_for_class',$std_class);
     $this->db->where('notes_for_section',$std_section);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
}
public function assignment_view_data($std_class,$std_section)
{
     $this->db->select('*');
     $this->db->from('assignment');
     $this->db->where('assign_for_class',$std_class);
     $this->db->where('assign_for_section',$std_section);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
}
public function exam_view_data($std_class,$std_section)
{
     $this->db->select('*');
     $this->db->from('exam_detail');
     $this->db->where('class_id',$std_class);
     $this->db->where('class_section',$std_section);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
}
public function test_exam_view($std_class,$std_section)
{
     $this->db->select('*');
     $this->db->from('test_detail');
     $this->db->where('class_id',$std_class);
     $this->db->where('class_section',$std_section);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
}
public function time_table_view($std_class,$std_section)
{
    $this->db->select('*');
     $this->db->from('assign_sub_teacher');
     $this->db->where('assign_class',$std_class);
     $this->db->where('assign_section',$std_section);
     $query = $this->db->get();
     $res['subject_teacher'] = $query->result_array();

     $this->db->select('*');
     $this->db->from('class_time_table');
     $this->db->where('class',$std_class);
     $this->db->where('class_section',$std_section);
     $query = $this->db->get();
     $res['time_table'] = $query->result_array();
     return $res;
}
public function lession_plan_get($std_class,$std_section)
{
     $this->db->select('*');
     $this->db->from('lession_plan');
     $this->db->where('class_id',$std_class);
     $this->db->where('section_id',$std_section);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
}

public function  student_feedback($staff_id,$std_id,$session)
{
     $this->db->select('*');
     $this->db->from('student_feedback');
     $this->db->where('staff_id',$staff_id);
     $this->db->where('student_id',$std_id);
       $this->db->where('current_session',$session);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res; 
 }
public function  teacher_sub($class,$section,$staff_id)
{
     $this->db->select('AVG(overall_rate) as avg_class');
     $this->db->from('student_feedback');
     $this->db->where('class',$class);
     $this->db->where('section',$section);
     $this->db->where('staff_id',$staff_id);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res; 
}
public function  updateeeee($black,$std_id)
{
$this->db->where('std_id',$std_id);
$this->db->set('std_header',$black);
$this->db->update('admission');
return $data_record;
}

public function  updateeees($black,$std_id)
{
$this->db->where('std_id',$std_id);
$this->db->set('std_sidebar',$black);
$this->db->update('admission');
return $data_record;
}
public function  updateeees2($black,$std_id)
{
$this->db->where('std_id',$std_id);
$this->db->set('std_body',$black);
$this->db->update('admission');
return $data_record;
}

  public function  admin_color($std_id)
    {
        $this->db->select('*');
        $this->db->from('admission');
        $this->db->where('std_id',$std_id);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;
    }
 
}

?>