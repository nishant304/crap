<?php
Class parent_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function parent_login($login_data)
    {
    	$parent_email=$login_data['parent_email'];
        $parent_password=$login_data['parent_password'];
        $email[0]='father_email';
        $email[1]='mother_email';
        $email[2]='guardian_email';
        $password[0]='father_password';
        $password[1]='mother_password';
        $password[2]='guardian_password';
        for($i=0;$i<=2;$i++){
        $this->db->select('*');
        $this->db->from('parrent_detail');
        $this->db->where($email[$i],$parent_email);
        $this->db->where($password[$i],$parent_password);
       $query = $this->db->get();
       $result[$i] = $query->result_array(); 
       
   }
  return $result;
   }
   public function stu_login_data($login_from,$std_id)
   {
   	    $this->db->select('*');
        $this->db->from('admission');
        $this->db->where('std_id',$std_id);
        $this->db->where($login_from."!=",'NULL');
        $query = $this->db->get();
        $result = $query->result_array(); 

        return $result;

   }

 public function request_data_form($request_data)
   {
   
       $this->db->select('*');
       $this->db->from('admission');
       foreach ($request_data as $key => $value) {
       $this->db->where($key,$value);
       }
       $query = $this->db->get();
       $result = $query->result_array(); 
       return $result;

   }
 public function insert_data($table,$data)
   {
   $result=$this->db->insert($table,$data);
   return $result;
   }
public function notify($email)
   {
        $this->db->select('*');
        $this->db->from('parent_request');
        $this->db->where('status',0);
        $this->db->where('request_received',$email);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
   }
public function request_id($id)
   {
      $this->db->set('received_date',date("Y-m-d H:i:s"));
      $this->db->set('status','1');
      $this->db->where('request_id',$id);
      $result=$this->db->update('parent_request');
      return $result;
   }
public function request_apprv_detailed($id,$status,$parent_portal)
   {
        $this->db->select('*');
        $this->db->from('parent_request');
        $this->db->where('status',1);
        $this->db->where('request_received',$parent_portal);
        $this->db->where('request_id',$id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
   }
public function update_email_by_apprv($std_id,$relation,$update_email,$received_email,$parent_mail2)
  {
      $this->db->set($relation,$update_email);
      $this->db->where('std_id',$std_id);
      $this->db->where($parent_mail2,$received_email);
      $result=$this->db->update('admission');
  }
public function approved_child($stu_idd,$parent_portal3,$parent_mail){
        $this->db->select('*');
        $this->db->from('admission');
        $this->db->where($parent_mail,$parent_portal3);
        $this->db->where('std_id!=',$stu_idd);
        $this->db->where('std_promoted!=','promoted');
        $this->db->where('std_promoted!=','unpromoted');
        $query = $this->db->get();
        $result = $query->result_array(); 
        return $result;

  }
 public function delete_request($id)
  {
        $this->db->where('request_id',$id);
        $this->db->delete('parent_request');
        return;
  }
  public function update_mail($parent_id,$relationn_email,$relationn_password,$add_email,$email_active,$passwordd)
  {
     $parent_curr = $this->session->userdata('parent').'_email';
    
      $this->db->set($relationn_password,$passwordd);
      $this->db->set($relationn_email,$add_email);
      $this->db->where($parent_curr,$email_active);
      $this->db->where('parent_id',$parent_id);
      $result=$this->db->update('parrent_detail');
      return $result;

  }
  public function update_mail_student_table($std_id,$add_email,$parent)
  {
      $this->db->set($parent,$add_email);
      $this->db->where('std_id',$std_id);
      $result=$this->db->update('admission');
      return $result;
  }
public function parent_msg($parent_id){
     $this->db->select('*');
     $this->db->from('messenger');
     $this->db->where('parent_id',$parent_id);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;

}
public function parent_detail($parent_id)
{
     $this->db->select('*');
     $this->db->from('parrent_detail');
     $this->db->where('parent_id',$parent_id);
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;

}
public function std_id($parent_detail)
{
$this->db->select('*');
$this->db->from('admission');
if($parent_detail[0]['father_email']!=''){
$this->db->or_where('std_father_email',$parent_detail[0]['father_email']);
}
if($parent_detail[0]['mother_email']!=''){
$this->db->or_where('std_mother_email',$parent_detail[0]['mother_email']);
}
if($parent_detail[0]['guardian_email']!=''){
$this->db->or_where('std_guardian_email',$parent_detail[0]['guardian_email']);
}
$query = $this->db->get();
$res = $query->result_array();
return $res;
}
public function msg_id_update($table,$msg_id)
{
      $this->db->set('status',1);
      $this->db->where('msg_id',$msg_id);
      $result=$this->db->update($table);
      return $result;
}
public function del_msg($table,$message_id)
{
        $this->db->where('msg_id',$message_id);
        $this->db->delete($table);
        return;
}
public function parent_img_update($parent_img,$parent_id)
    {
    $this->db->where('parent_id',$parent_id);
    $this->db->update('parrent_detail',$parent_img);
    return;
    }
public function parent_data_update($data,$parent_id)
    {
    $this->db->where('parent_id',$parent_id);
    $this->db->update('parrent_detail',$data);

    $this->db->set('std_father_name',$data['father_name']);
    $this->db->set('std_father_email',$data['father_email']);
    $this->db->set('std_mother_name',$data['mother_name']);
    $this->db->set('std_guardian_email',$data['guardian_email']);
    $this->db->set('std_guardian_name',$data['guardian_name']);
    $this->db->set('std_mother_email',$data['mother_email']);  
    $this->db->set('std_guardian_mob',$data['guardian_phone']);
    $this->db->where('std_id', $data['std_id']);
    $this->db->update('admission');
    return;
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

public function fetch_student($id_allses)
   {
       $this->db->select('*');
       $this->db->from('admission');
       foreach ($id_allses as $key => $value) {
       $this->db->or_where('std_id',$value);
    }
       $query = $this->db->get();
       $result_all  = $query->result_array();
      return $result_all;
    }
public function fetch_student_leave($id_allses) 
   {
     $this->db->select('*');
     $this->db->from('student_leave');
     foreach ($id_allses as $key => $value) {
            
          $this->db->or_where('std_id',$value);
          }
     $query = $this->db->get();
     $res = $query->result_array();
     return $res;
   }

   public function  updateeeee($black,$std_id)
{
$this->db->where('parent_id',$std_id);
$this->db->set('parent_header',$black);
$this->db->update('parrent_detail');
return $data_record;
}

public function  updateeees($black,$std_id)
{
$this->db->where('parent_id',$std_id);
$this->db->set('parent_sidebar',$black);
$this->db->update('parrent_detail');
return $data_record;
}
public function  updateeees2($black,$std_id)
{
$this->db->where('parent_id',$std_id);
$this->db->set('parent_body',$black);
$this->db->update('parrent_detail');
return $data_record;
}

  public function  admin_color($std_id)
    {
        $this->db->select('*');
        $this->db->from('parrent_detail');
        $this->db->where('parent_id',$std_id);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;
    }
   
}
?>