<?php
Class teacher_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('teacher_model');
        $this->load->model('login_model');

    }
    public function teacher_login($login_data)
    {
    	$tch_email = $login_data['stf_email'];
    	$tch_password = $login_data['stf_password'];
    	$this->db->select('*');
    	$this->db->from('staff');
    	$this->db->where('stf_email',$tch_email);
    	$this->db->where('stf_password',$tch_password);
    	$query = $this->db->get();
      $abc = $query->result_array();
      return $abc;
    }
    public function stf_img_update($stf_img,$id)
    {
    $this->db->where('stf_id',$id);
    $this->db->update('staff',$stf_img);
    return;
    }

    public function stf_data_update($data,$stf_id)
    {
    $this->db->where('stf_id',$stf_id);
    $this->db->update('staff',$data);
    return;
    }
    public function stafff_detail($stff_id)
    {
    $this->db->select('*');
    $this->db->from('staff');
    $this->db->where('stf_id',$stff_id);
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
     }
//========================= teacher leave ====================//  
public function fetch_category()
   {
      $this->db->select('*');
      $this->db->from('add_category');
      $query = $this->db->get();
      $res = $query->result_array();
      return $res;
   }   

public function insert_teacher_leave($table,$data)
   {
     $this->db->insert($table,$data);
     return;
   }
public function fetch_teacher_leave($stf_id)
   {
     $this->db->select('*');
     $this->db->from('teacher_leave');
     $this->db->where('stf_id',$stf_id);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
   }
 public function fetch_student_leave_request($stf_id)
   {
    $this->db->select("*");
    $this->db->from('student_leave');
    $this->db->where('incharge_id',$stf_id);
    $query = $this->db->get();
    $res = $query->result_array();
     return $res;
   }
 
public function  role_autho($staff_analysis)
{
    $this->db->select("*");
    $this->db->from('role_assign');
    $this->db->where('staff_id',$staff_analysis);
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;

}

  
//==================== end 11-17-2017 work==================================//

public function get_teacher_id($class,$section)
{
   $this->db->select('class_incharge');
   $this->db->from('add_class');
   $this->db->where('class_section',$section);
   $this->db->where('class_name',$class);
   $query = $this->db->get();
   $res = $query->result_array();
  return $res;
   
}
public function sub_class($id)
{
   $this->db->select('*');
   $this->db->from('assign_sub_teacher');
   $this->db->where('tch_id',$id);
   $query = $this->db->get();
   $res = $query->result_array();
  return $res;
   
}
public function student_ddd($id_std)
{
   $this->db->select('*');
   $this->db->from('admission');
   $this->db->where('std_id',$id_std);
   $query = $this->db->get();
   $res = $query->result_array();
  return $res;
}

public function sub_sec($clss)
{
  $this->db->select('*');
   $this->db->from('assign_sub_teacher');
   $this->db->where('assign_class',$clss);
   $query = $this->db->get();
   $res = $query->result_array();
  return $res;
   
}
public function save_clas_sec($savin_id)
{
  $savin_1=$savin_id['class_id'];
  $savin_2=$savin_id['class_section'];
  $this->db->select('*');
   $this->db->from('admission');
   $this->db->where('std_class',$savin_1);
   $this->db->where('std_section',$savin_2);
   $query = $this->db->get();
   $res = $query->result_array();
  return $res;
   
}
public function chat_with_student($chatty,$std_id)
{
for($i=0;$i<count($std_id);$i++)
{
$this->db->set('std_id',$std_id[$i]); 
$result=$this->db->insert('messenger',$chatty);
}
return $result;
}


public function chat_with_parent($chatty,$arr1)
{
for($i=0;$i<count($arr1);$i++)
{
$this->db->set('parent_id',$arr1[$i]); 
$result=$this->db->insert('messenger',$chatty);
}
return $result;
}

  public function std_lev_req_count($stf_id)
  {

    $this->db->select('approval,count(*)');
    $this->db->from('student_leave');
    $this->db->where('incharge_id',$stf_id);
    $this->db->group_by('approval');
    $this->db->having('approval',0);
    $query = $this->db->get();
    $res = $query->result_array();

    return $res;
  }


  
//==================== end 11-17-2017 work==================================//



public function get_std_msg($std_id,$id_1)
{
   $this->db->select('*');
   $this->db->from('student_leave');
   $this->db->where('std_id',$std_id);
   $this->db->where('student_leave_id',$id_1);
   $query = $this->db->get();
   $res = $query->result_array();
   return $res;
   
}
public function id_parent($std_id){
for($i=0;$i<count($std_id);$i++)
{
$this->db->select('std_father_email,std_mother_email,std_guardian_email');
$this->db->from('admission');
$this->db->where('std_id',$std_id[$i]);
$query = $this->db->get();
$res[$i] = $query->result_array();
}

return $res;
   
}
public function id_parent_fetch($id_parent)
{

for($i=0;$i<count($id_parent['id_parent']);$i++){
  
$this->db->select('parent_id');
$this->db->from('parrent_detail');
if($id_parent['id_parent'][$i][0]['std_father_email']!=''){
$this->db->where('father_email',$id_parent['id_parent'][$i][0]['std_father_email']);
}
if($id_parent['id_parent'][$i][0]['std_mother_email']!=''){
$this->db->or_where('mother_email',$id_parent['id_parent'][$i][0]['std_mother_email']);
}
if($id_parent['id_parent'][$i][0]['std_guardian_email']!=''){
$this->db->or_where('guardian_email',$id_parent['id_parent'][$i][0]['std_guardian_email']);
}
$query = $this->db->get();
$res[$i] = $query->result_array();
}
return $res;
}
public function stf_student_msg($stff_id)
{
   $this->db->select('*');
   $this->db->from('messenger');
   $this->db->where('tch_id',$stff_id);
   $query = $this->db->get();
   $res = $query->result_array();
   return $res;

}
  public function stf_attendance_data($stf_designation,$month,$years,$stf_id)
        {
          $this->db->select('*');
          $this->db->from('staff_attandance_report');
          $this->db->where('stf_designation',$stf_designation);
          $this->db->where('month',$month);
          $this->db->where('year',$years);
           $this->db->where('stf_id',$stf_id);
          $query = $this->db->get();
          $result_all_stf  = $query->result_array();
          return $result_all_stf;
        }
//========================= end teacher leave====================// 

public function stf_total_lev($var_1,$var_2)
{
  $this->db->select('*');
  $this->db->from('add_leave');
  $this->db->where('leave_category',$var_2);
  $this->db->where('designation',$var_1);
  $query = $this->db->get();
  $res = $query->result_array();
  return $res;
}

public function remain_lev($stf_id,$leave_cate)
{

  $this->db->select_sum('request_leave');
  $this->db->from('teacher_leave');
  $this->db->where('stf_id',$stf_id);
  $this->db->where('leave_category',$leave_cate);
  $this->db->where('approval',1);
  $query = $this->db->get();
  $res = $query->result_array();
  return $res;
}
public function selectall($table,$stfrole){
  $this->db->select('*');
  $this->db->from($table);
  $this->db->where('designation',$stfrole);
  $query = $this->db->get();
  $res = $query->result_array();
  return $res;


}

public function remain_leave($table, $stf_id, $leave_category_name){
 
  foreach ($leave_category_name as $key) {
 
        $this->db->select_sum('request_leave');
        $this->db->select('leave_category');
        $this->db->select('total_leave');

        $this->db->from($table);
        $this->db->where('stf_id',$stf_id);
   
        $this->db->where('leave_category',$key);
        $this->db->where('approval',1);

        $query = $this->db->get();
        $resre[] = $query->result_array();
        }
        return $resre;
        }
       public function teacher_all_leave_fetch($i_d)
       {
       $this->db->select("*");
       $this->db->from('teacher_leave');
       $this->db->where('stf_id',$i_d);
       $this->db->where('approval',0);
       $query = $this->db->get();
       $res = $query->result_array();
       return $res;
       }
       public function delete_leave_request($table,$id)
       {
       $this->db->where('teacher_leave_id',$id);
       $this->db->delete($table);
       return;
       }
public function approve_std_leave($std_leav_id,$std_id,$aprovel)
  {

    $this->db->select('*');
    $this->db->from('student_leave');
    $this->db->where('std_id',$std_id);
    $this->db->where('student_leave_id',$std_leav_id);
    $query = $this->db->get();
    $res = $query->result_array();


if($aprovel == 1)
{
    foreach ($res as $key => $value)
     {
      $from_date = $value['from_date'];
      $to_date = $value['to_date'];
     } 
  
    $this->db->select('*');
    $this->db->from('admission');
    $this->db->where('std_id',$std_id);
    $query = $this->db->get();
    $res1 = $query->result_array();

      foreach ($res1 as $key => $value1)
     {
      $std_name = $value1['std_fname']." ".$value1['std_lname'];
      $std_class = $value1['std_class'];
      $std_section = $value1['std_section'];
      $std_roll = $value1['std_roll_no'];
     }  

   

  $date_from = strtotime($from_date); 
  $date_to = strtotime($to_date); 
  
  // from date
   $from_date1 = date_parse_from_format("Y-m-d", $from_date);
   $from_date1["month"];
   $from_date1["year"];

  // to date
   $to_date1 = date_parse_from_format("Y-m-d", $to_date);
   $to_date1["month"];
   $to_date1["year"];


        for ($i = $date_from; $i <= $date_to; $i += 86400)
       {   
     
           $io=date('Y-m-d', $i);
         
  
  
        $from_da = date_parse_from_format("Y-m-d", $io);
     $from_da["month"];
        $from_da["year"];
    

   if($from_da["month"]== $from_date1["month"])
   {

 $orignal[] = 'd'.date("d", strtotime(date("Y-m-d", $i))); 

         
         $Y='update';
       }
       else
       {
         $orignal1[] = 'd'.date("d", strtotime(date("Y-m-d", $i))); 
        
         $x='insert';
       }
      }
    
    if($Y=='update'){
      for($rt=0;$rt<count($orignal);$rt++){
      $this->db->set($orignal[$rt],'L');
    }
  }
    $this->db->where('std_id',$std_id) ;
    $this->db->where('year',$from_date1["year"]);
    $this->db->where('month',$from_date1["month"]);
    $this->db->update('attandance_report');
 
    }
  
  
 if($x=='insert'){
   for($rt1=0;$rt1<count($orignal1);$rt1++){
      $this->db->set($orignal1[$rt1],'L');
    }
        $this->db->set('std_id',$std_id) ;
    $this->db->set('std_name',$std_name) ;
    $this->db->set('std_class',$std_class) ;
    $this->db->set('std_section',$std_section) ;
    $this->db->set('std_roll_no',$std_roll) ;
    $this->db->set('year',$to_date1["year"]);
    $this->db->set('month',$to_date1["month"]);
    $this->db->insert('attandance_report');
    }
 
    $this->db->set('approval',$aprovel);
    $this->db->where('std_id',$std_id);
    $this->db->where('student_leave_id',$std_leav_id);
    $this->db->update('student_leave');
    return;
  }
public function  updateeeee($black,$stf_id)
{
$this->db->where('stf_id',$stf_id);
$this->db->set('stf_header',$black);
$this->db->update('staff');
return $data_record;
}

public function  updateeees($black,$stf_id)
{
$this->db->where('stf_id',$stf_id);
$this->db->set('stf_sidebar',$black);
$this->db->update('staff');
return $data_record;
}
public function  updateeees2($black,$stf_id)
{
$this->db->where('stf_id',$stf_id);
$this->db->set('stf_body',$black);
$this->db->update('staff');
return $data_record;
}

public function  admin_color($std_id)
    {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('stf_id',$std_id);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;
    }

}
?>