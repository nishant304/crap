<?php
class login_model extends CI_Model
{
  	function __construct()
      {
          parent::__construct();
          $this->load->library('session');
      }

public function insert_data($table_name,$data)
     { 
     $result=$this->db->insert($table_name, $data);
     return $result;

     }
public function all_data_all($table){
      $this->db->select('*');
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->result_array(); 
      return $result;
      }
public function all_dep_stf($table,$class,$class_name){
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($class_name, $class);
      $query = $this->db->get();
      $result = $query->result_array(); 
      return $result;

      }
public function class_roll_lib($table,$class,$section, $class_where,$section_where){
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($class_where, $class);
      $this->db->where($section_where, $section);
      $query = $this->db->get();
      $result = $query->result_array(); 
      return $result;

      }
public function count_notification($std_id)
      {
        
         $this->db->select('participate_status,count("*")');
         $this->db->group_by('participate_status');
         $this->db->having('participate_status',0);
         $this->db->where('std_id',$std_id);
         $query = $this->db->get('event_participation');
         $res   = $query->result_array();
         return $res;
      }
public function fetch_enm_dt($data,$fetch,$a,$b)
      {
        $this->db->select('*');
        $this->db->from('add_event');
        $this->db->where($data,$fetch);
        $this->db->where($a,$b);
        $query = $this->db->get();
        $res   = $query->result_array();
        return $res;
      }
public function staff_table($tch_class,$tch_classs)
        {
        $this->db->select('*');
        $this->db->from('class_time_table');
        $this->db->where('class',$tch_class);
        $this->db->where('class_section',$tch_classs);
        $query = $this->db->get();
        $res  = $query->result_array();
        return $res;
        }
public function issue_roll_book($table,$class,$section,$roll_no, $class_where,$section_where,$rollno_where)
      {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($class_where, $class);
      $this->db->where($section_where, $section);
      $this->db->where($rollno_where, $roll_no);
      $query = $this->db->get();
      $result = $query->result_array(); 
      return $result;
      }
public function std_di($std_id)
      {
        $this->db->select('*');
      $this->db->from('admission');
      $this->db->where('std_id', $std_id);
      $query = $this->db->get();
      $result = $query->result_array(); 
   
      return $result;
      }
public function  grop_subj()
      {
      $this->db->select('*');
      $this->db->from('student_marks');
      $this->db->group_by('subject');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
      }

 public function grop_subj_per($sub_per)
      {
      $this->db->select('avg(marks_obtain) as marks');
      $this->db->from('student_marks');
      $this->db->where('subject',$sub_per);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
      }
 public function  staff_timr($staff_analysis)
      {
      $this->db->select('*');
      $this->db->from('assign_sub_teacher');
      $this->db->where('tch_id',$staff_analysis);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
      }
public function editiondet($addbooks,$book_cat,$book_auth,$title,$Publisher,$whereBookCategory,$whereAuthor,$whereTitle,$wherePublisher){
     
      $this->db->select('*');
      $this->db->from($addbooks);
      $this->db->where($whereBookCategory, $book_cat);
      $this->db->where($whereAuthor,$book_auth);
      $this->db->where($whereTitle,$title);
      $this->db->where($wherePublisher,$Publisher);
      $query = $this->db->get();
      $result = $query->result_array(); 
   
      return $result;

      }

      public function count_book_detail($addbooks,$book_cat,$book_auth,$title,$Publisher,$Edition,$whereBookCategory,$whereAuthor,$whereTitle,$wherePublisher,$whereEdition){
     
      $this->db->select('*');
      $this->db->from($addbooks);
      $this->db->where($whereBookCategory, $book_cat);
      $this->db->where($whereAuthor,$book_auth);
      $this->db->where($whereTitle,$title);
      $this->db->where($wherePublisher,$Publisher);
      $this->db->where($whereEdition,$Edition);
      $query = $this->db->get();
      $result = $query->result_array(); 
   
      return $result;

      }
       public function fetch_data($table_name,$data)
      {

      $this->db->select('*'); 
      $this->db->from($table_name);
      $this->db->where('Class',$data['Class']);
      $this->db->where('Section',$data['Section']);
      $this->db->where('RollNo',$data['RollNo']);
      $query = $this->db->get();
      $result = $query->result_array(); 
      // print_r($result);
      // die();
      return $result;
      }


      public function fetch_data_book()
      {
      $this->db->select('*');
      $this->db->from('addbooks');
   
      $query = $this->db->get();
      $result = $query->result_array(); 
      // print_r($result);
      // die();
      return $result;
      }

      public function count_book_detail_issue($addbooks,$book_cat,$book_auth,$title,$Publisher,$Edition,$issue,$whereBookCategory,$whereAuthor,$whereTitle,$wherePublisher,$whereEdition,$whereissue){
     
      $this->db->select('*');
      $this->db->from($addbooks);
      $this->db->where($whereBookCategory, $book_cat);
      $this->db->where($whereAuthor,$book_auth);
      $this->db->where($whereTitle,$title);
      $this->db->where($wherePublisher,$Publisher);
      $this->db->where($whereEdition,$Edition);
      $this->db->where($whereissue,$issue);
      $query = $this->db->get();
      $result = $query->result_array(); 
   
      return $result;

      }
     public function  staff_ana($staff_ana)
      {
        $this->db->select('*');
        $this->db->from('assign_sub_teacher');
        $this->db->where('tch_id',$staff_ana);
        $this->db->group_by('sub_name');
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;
      }
    public function  admin_color()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;
    }
   public function time_table_fetchww($class,$class_sec)
      {
        $this->db->select('*');
        $this->db->from('class_time_table');
        $this->db->where('class',$class);
        $this->db->where('class_section',$class_sec);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;


      }
   public function update_single_id($table,$where_id,$id,$data)
   {
      $this->db->where($where_id, $id);
      $this->db->update($table, $data);
      return;
   }
   public function record_count1($table,$col)
    {
   if(isset($col))
     {
      foreach ($col as $key => $value) 
      {
      if($value!=''){
      $this->db->like($key, $value);
      }
      }
     }
    $query = $this->db->get($table);
    return  $query->num_rows();
     
  }
  
  public function fetch_departments1($limit,$start,$table,$col) 
     {
     $this->db->limit($limit,$start);
     if(isset($col))
     {
      foreach ($col as $key => $value) 
      {
      if($value!=''){
      $this->db->like($key, $value);
      }
      }
      }
     $query = $this->db->get($table);
     $result = $query->result_array(); 
     return $result;
     }


public function record_count($table)
{
  
    $query = $this->db->get($table);
    return  $query->num_rows();
     
  }
  
  public function fetch_departments($limit,$start,$table) 
     {
     $this->db->limit($limit,$start);
    
     $query = $this->db->get($table);
     $result = $query->result_array(); 
     return $result;
     }
  
     public function all_parent()
     {
      $this->db->select('*');
      $this->db->from('parrent_detail');
      $query = $this->db->get();
      $result = $query->result_array(); 
      return $result;
     }
   
     public function student_login($user_email,$user_password)
      {
      $this->db->select('*');
      $this->db->from('admission');
      $this->db->where('std_email',$user_email);
      $this->db->where('std_password',$user_password);
      $query = $this->db->get();
      $result = $query->result_array(); 
      return $result;
      }
     public function student_update($user_email,$update_data,$img_u)
     {
     $a=$update_data['std_address'];
     $b=$update_data['std_mobile'];
     $arrayName = array('std_address' => $a ,
                        'std_mobile' => $b ,
                        'std_image' => $img_u);
     if($img_u != '')   
     {
      $this->db->where('std_email', $user_email);
      $this->db->update('admission', $arrayName);
     }
      else
     {
      $this->db->where('std_email', $user_email);
      $this->db->update('admission', $update_data);
     }
      $this->db->select('*');
      $this->db->from('admission');
      $this->db->where('std_email',$user_email);
      $query = $this->db->get();
      $result = $query->result_array(); 
      return $result;

    }
     public function admin_login($admin_email,$user_password)
      {
      $this->db->select('*');
      $this->db->from('admin');
      $this->db->where('admin_email',$admin_email);
       $this->db->where('admin_password',$user_password);
      $query = $this->db->get();
      $result = $query->result_array();
      

      $this->db->select('*');
      $this->db->from('admission');
      $query = $this->db->get();
      $result_all = $query->result_array(); 

      $total_rows=$query->num_rows();
      $data['result'] = $result;
      $data['num_rows'] = $total_rows;
      return $data;
      }
      public function all_student()
      {
      $this->db->select('*');
      $this->db->from('admission');
      $query = $this->db->get();
      $result_all = $query->result_array(); 
      $total_rows=$query->num_rows();
       $data1['num_rows'] = $total_rows;
      $data1['all_student'] = $result_all;
      return $data1;

      }
      public function student_remove($student_id)
      {
        $this->db->where('std_id', $student_id);
        $this->db->delete('admission');
        return;
      }
      public function ebook_remove($ebook_id)
      {
        $this->db->where('notes_id', $ebook_id);
        $this->db->delete('notes');
        return;
      }
      public function assign_remove($assign_id)
      {
        $this->db->where('assign_id', $assign_id);
        $this->db->delete('assign_sub_teacher');
        return;
      }
       public function assignment_remove($assign_id)
      {
        $this->db->where('assign_id', $assign_id);
        $this->db->delete('assignment');
        return;
      }
   public function assign_get()
      {
        $this->db->select('*');
        $this->db->from('assignment');
        $query = $this->db->get();
        $result_assign = $query->result_array(); 
        return $result_assign;
      }

     
      public function student_record_update($student_id)
      {
      $this->db->where('std_id',$student_id);
      $this->db->select('*');
      $this->db->from('admission');
      $query1 = $this->db->get();
      $result_student = $query1->result_array(); 
      return $result_student;
      }
      public function student_finle_update($data_record, $student_id)
      {
      $this->db->where('std_id', $student_id);
      $this->db->update('admission', $data_record);
      return $data_record;

      }
      public function updateeeee($student_id)
      {
      $this->db->set('admin_header',$student_id);
      $this->db->update('admin');
      return $data_record;

      }

      public function updateeees($student_id)
      {
      $this->db->set('admin_sidebar',$student_id);
      $this->db->update('admin');
      return $data_record;

      }
      public function updateeees2($student_id)
      {
      $this->db->set('admin_background',$student_id);
      $this->db->update('admin');
      return $data_record;

      }
      public function get_all_file()
      {

        $this->db->select('*');
        $this->db->from('notes');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
      }

      public function class_fetch()
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

      public function delete_class($cls_id)
      {
         $this->db->where('id', $cls_id);
        $this->db->delete('add_class');
        return;
      }
      public function class_exist($class_name,$class_section)
      {
        $this->db->select('*');
        $this->db->from('add_class');
        $this->db->where('class_name',$class_name);
        $this->db->where('class_section',$class_section);
        $query = $this->db->get();
        $result  = $query->num_rows();
        return $result;
      }
public function all_class()
      {
        $this->db->select('*');
        $this->db->from('add_class');
       $query = $this->db->get();
       $result  = $query->result_array();
       return $result;
      }
public function std_fetch($uristring,$clss)
      {
        $this->db->select('*');
        $this->db->from('admission');
        $this->db->where('std_class',$clss);
        $this->db->where('std_section',$uristring);
       $query = $this->db->get();
       $result_std  = $query->result_array();
       // print($result_std);
       return $result_std;
      } 
public function remove_class($id)
      {
      $this->db->set('class_incharge','');
      $this->db->where('id', $id);
      $this->db->update('add_class');
      return;
      }
public function class_incharge_exist($class_name,$class_section,$class_incharge)
      {
        $this->db->select('*');
        $this->db->from('add_class');
        $this->db->where('class_name',$class_name);
        $this->db->where('class_section',$class_section);
        // $this->db->where('class_incharge',$class_incharge);
      $query = $this->db->get();
      $result  = $query->result_array();
      return $result;
      }

public function update_data($table_name,$add_class_incharge,$class_name,$class_section,$class_incharge)
      {
      $this->db->where('class_name', $class_name);
      $this->db->where('class_section', $class_section);
      $this->db->update($table_name, $add_class_incharge);
      return $data_record;

      }
public function update_section($table_name,$section,$std_id)
      {
      $this->db->set('std_section',$section);
      $this->db->where('std_id', $std_id);
      $this->db->update($table_name);
      return $data_record;

      }
public function update_roll($table_name,$roll,$std_id)
      {
        $this->db->set('std_roll_no',$roll);
      $this->db->where('std_id', $std_id);
        $this->db->update($table_name);
      return $data_record;

      }
public function std_detail($std_id){
      $this->db->select('*');
      $this->db->from('admission');
      $this->db->where('std_id',$std_id);
      $query = $this->db->get();
     $result=$query->result_array(); 
  return $result;
	}
public function std_compare_detail($sec_std,$sec_class){
      $this->db->select('*');
      $this->db->from('admission');
      $this->db->where('std_section',$sec_std);
      $this->db->where('std_class',$sec_class);
      $query = $this->db->get();
     $result=$query->result_array(); 
  return $result;
  }
public function all_subject()
      {
        $this->db->select('*');
        $this->db->from('add_subject');
        $query = $this->db->get();
        $result_subject  = $query->result_array();
        return $result_subject;
        
      }
public function exam_fetch()
      {
        $this->db->select('*');
        $this->db->from('exam_detail');
        $query = $this->db->get();
        $result_exam=$query->result_array(); 
        return $result_exam;
      }
public function test_exam_fetch()
      {
        $this->db->select('*');
        $this->db->from('test_detail');
        $query = $this->db->get();
        $result_exam=$query->result_array(); 
        return $result_exam;
      }

public function all_sub($class_id,$class_section)
      {
        $this->db->select('*');
        $this->db->from('add_subject');
        $this->db->where('class_id',$class_id);
        $this->db->where('class_section',$class_section);
        $query = $this->db->get();
        $result_class=$query->result_array(); 
        return $result_class;
      }  
public function all_sub_section($class_sel)
{
        $this->db->select('DISTINCT(class_section)');
        $this->db->from('add_class');
        $this->db->where('class_name',$class_sel);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function time_table_subject_fetch($clas,$sec)
{
        $this->db->select('*');
        $this->db->from('add_subject');
        $this->db->where('class_id',$clas);
        $this->db->where('class_section',$sec);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;

}

public function time_table_fetch($class_name,$class_section)
      {
     
        $this->db->select('*');
        $this->db->from('class_time_table');
        $this->db->where('class',$class_name);
        $this->db->where('class_section',$class_section);
        $query = $this->db->get();


        $result_class=$query->result_array();

       
        return $result_class;
}

public function select_time_table_fetch($clas,$section,$end,$start)
      {
        $this->db->select('*');
        $this->db->from('class_time_table');
        $this->db->where('class_start_time',$start);
        $this->db->where('class_end_time',$end);
        $this->db->where('class',$clas);
        $this->db->where('class_section',$section);
        $query = $this->db->get();
        $result_subject1 = $query->num_rows();
        return $result_subject1;
      }

 public function update_dat($table_name,$subject,$day,$start,$end,$clas,$section)
      {
        $this->db->set($day,$subject);
      $this->db->where('class_start_time', $start);
     $this->db->where('class_end_time', $end);
     $this->db->where('class', $clas);
     $this->db->where('class_section', $section);
        $this->db->update($table_name);
      return $data_record;

      }
     
public function subject_remove($sub_id)
      {
        $this->db->where('sub_id', $sub_id);
        $this->db->delete('add_subject');
        return;
      }
public function all_assign($assign_sub)
      {
        // $assign_tch = $assign_sub['tch_name'];
        $assign_cls = $assign_sub['assign_class'];
        $assign_section1 = $assign_sub['assign_section'];
        $sub_name1 = $assign_sub['sub_name'];
        $this->db->select('*');
        $this->db->from('assign_sub_teacher');
        // $this->db->where('tch_name',$assign_tch);
        $this->db->where('assign_class',$assign_cls);
        $this->db->where('assign_section',$assign_section1);
        $this->db->where('sub_name',$sub_name1);
        $query = $this->db->get();
         $result1  = $query->result_array();
        return $result1;
      }

public function all_assign_sub()
{
        $this->db->select('*');
        $this->db->from('assign_sub_teacher');
        $query = $this->db->get();
        $result_all_data  = $query->result_array();
        return $result_all_data;
        
}
public function all_staff()
{
        $this->db->select('*');
        $this->db->from('staff');
        $query = $this->db->get();
        $result_staff  = $query->result_array();
        return $result_staff; 
}
     public function exam_remove($exam_id)
      {
        $this->db->where('exam_id', $exam_id);
        $this->db->delete('exam_detail');
        return;
      } 

      public function test_remove($exam_id)
      {
        $this->db->where('test_id', $exam_id);
        $this->db->delete('test_detail');
        return;
      }   
  

       public function notice_get()
      {
        $this->db->select('*');
        $this->db->from('add_notice');
        $query = $this->db->get();
        $result_notice = $query->result_array(); 
        return $result_notice;
      }
public function notice_remove($notice_id)
      {
        $this->db->where('notice_id', $notice_id);
        $this->db->delete('add_notice');
        return;
      }
public function event_get()
      {
        $this->db->select('*');
        $this->db->from('add_event');
        $query = $this->db->get();
        $result_event = $query->result_array(); 
        return $result_event;
      }
      
      public function event_details()
      {
        $this->db->select('*');
        $this->db->from('event_details');
        $query = $this->db->get();
        $result_event = $query->result_array(); 
        return $result_event;
      }

    public function staff_remove($staff_id)
      {
        $this->db->where('stf_id', $staff_id);
        $this->db->delete('staff');
        return;
      }
   public function update_asn_tec($value,$hid,$id)
      {
     $this->db->set($hid,$value);
     $this->db->where('assign_id', $id);
     $this->db->update('assign_sub_teacher');
      return $data_record; 
      }

public function update_exam_detail($value,$hid,$ids)
 {
      $this->db->set($hid,$value);
      $this->db->where('exam_id', $ids);
      $this->db->update('exam_detail');
      return $data_record;


 }
 public function update_test_detail($value,$hid,$ids)
 {
      $this->db->set($hid,$value);
      $this->db->where('test_id', $ids);
      $this->db->update('test_detail');
      return $data_record;


 }

public function value_subject($classs,$section)
{
        $this->db->select('*');
        $this->db->from('add_subject');
        $this->db->where('class_id',$classs);
        $this->db->where('class_section',$section);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function value_xam_tpp($classs,$section)
{
        $this->db->select('*');
        $this->db->from('exam_detail');
        $this->db->where('class_id',$classs);
        $this->db->where('class_section',$section);
        $this->db->group_by('exam_type');
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}


 public function stf_name($stf_id)
   {
      $this->db->select('*');
      $this->db->from('staff');
      $this->db->where('stf_id',$stf_id);
      $query = $this->db->get();
      $result=$query->result_array();
      return $result;
   }
public function value_exam_type($id)
{
        $this->db->select('*');
        $this->db->from('exam_detail');
        $this->db->where('class_id',$id);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function value_class_sec($id)
{
        $this->db->select('*');
        $this->db->from('add_class');
        $this->db->where('class_name',$id);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function class_record_exam_type($sub,$clss,$secc)
{
        $this->db->select('*');
        $this->db->from('exam_detail');
        $this->db->where('subject',$sub);
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function class_record_exam_typee($sub,$clss,$secc)
{
        $this->db->select('*');
        $this->db->from('exam_detail');
        $this->db->where('exam_type',$sub);
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);

        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function class_record_test_type($sub,$clss,$secc)
{
        $this->db->select('*');
        $this->db->from('test_detail');
        $this->db->where('subject',$sub);
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function class_record_exam_date($clss,$secc,$sub,$xam)
{
        $this->db->select('*');
        $this->db->from('exam_detail');
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $this->db->where('subject',$sub);
        $this->db->where('exam_type',$xam);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function class_record_test_date($clss,$secc,$sub,$xam)
{
        $this->db->select('*');
        $this->db->from('test_detail');
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $this->db->where('subject',$sub);
        $this->db->where('test_type',$xam);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}

public function class_record_exam_id($clss,$secc,$sub,$xam,$dat)
{
        $this->db->select('*');
        $this->db->from('exam_detail');
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $this->db->where('subject',$sub);
        $this->db->where('exam_type',$xam);
        $this->db->where('exam_date',$dat);
        $query = $this->db->get();
        $result_class=$query->row_array();
        return $result_class;
}

public function class_record_exam_idd($clss,$secc,$xam,$dat,$mon)
{
        $this->db->select('*');
        $this->db->from('student_marks');
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $this->db->where('exam_type',$xam);
        if($mon!=''){
        $this->db->where('month',$mon);
        }
        if($dat!=''){
        $this->db->where('year',$dat);
         }
        $this->db->group_by('subject'); 
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}

public function subject_group($clss,$secc,$xam,$dat,$mon,$arr_subject)
{
        $this->db->select('*');
        $this->db->from('student_marks');
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $this->db->where('exam_type',$xam);
        if($mon!=''){
        $this->db->where('month',$mon);
        }
        if($dat!=''){
        $this->db->where('year',$dat);
         }
        $this->db->where('subject',$arr_subject);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;
}
public function class_record_test_id($clss,$secc,$sub,$xam,$dat)
{
        $this->db->select('*');
        $this->db->from('test_detail');
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $this->db->where('subject',$sub);
        $this->db->where('test_type',$xam);
        $this->db->where('test_date',$dat);
        $query = $this->db->get();
        $result_class=$query->row_array();
        return $result_class;
}
 public function insert_marks($table_name,$data)
{
     $this->db->insert($table_name, $data);
}
 public function insert_marks_test($table_name,$data)
{
     $this->db->insert($table_name, $data);
}

 public function select_marks($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject)
 {

        $this->db->select('*');
        $this->db->from('student_marks');
        $this->db->where('class_id',$class_id);
        $this->db->where('class_section',$class_section);
        $this->db->where('subject',$subject);
        $this->db->where('std_id',$std_id);
        $this->db->where('batch',$batch);
        $this->db->where('exam_id',$exam_id);
        $this->db->where('exam_type',$exam_type);
        $query = $this->db->get();
        $result_class=$query->row_array();
        return $result_class;


 }  
  public function select_marks_test($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject)
 {

        $this->db->select('*');
        $this->db->from('test_marks');
        $this->db->where('class_id',$class_id);
        $this->db->where('class_section',$class_section);
        $this->db->where('subject',$subject);
        $this->db->where('std_id',$std_id);
        $this->db->where('batch',$batch);
        $this->db->where('test_id',$exam_id);
        $this->db->where('test_type',$exam_type);
        $query = $this->db->get();
        $result_class=$query->row_array();
        return $result_class;


 }  
public function update_marks($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject,$marks_obtain)
 {
      $this->db->set('marks_obtain',$marks_obtain);
      $this->db->where('class_id', $class_id);
      $this->db->where('class_section', $class_section);
      $this->db->where('std_id', $std_id);
      $this->db->where('exam_type', $exam_type);
      $this->db->where('batch', $batch);
      $this->db->where('exam_id', $exam_id);
      $this->db->where('subject', $subject);
      $this->db->update('student_marks');
      return $data_record;


 }

 public function update_marks_test($class_id,$class_section,$std_id,$exam_type,$exam_id,$batch,$subject,$marks_obtain)
 {
      $this->db->set('marks_obtain',$marks_obtain);
      $this->db->where('class_id', $class_id);
      $this->db->where('class_section', $class_section);
      $this->db->where('std_id', $std_id);
      $this->db->where('test_type', $exam_type);
      $this->db->where('batch', $batch);
      $this->db->where('test_id', $exam_id);
      $this->db->where('subject', $subject);
      $this->db->update('test_marks');
      return $data_record;


 }
 public function std_marks($class_id,$class_section,$subject,$exam_type,$xam_date,$std_id)
   {

        $this->db->select('*');
        $this->db->from('student_marks');
        $this->db->where('class_id',$class_id);
        $this->db->where('class_section',$class_section);
        $this->db->where('subject',$subject);
        $this->db->where('batch',$xam_date);
        $this->db->where('exam_type',$exam_type);
        $this->db->where('std_id',$std_id);
        $query = $this->db->get();
        $result_class=$query->result_array();
        return $result_class;

   }

   public function std_marks_test($class_id,$class_section,$subject,$exam_type,$xam_date,$std_id)
   {

        $this->db->select('*');
        $this->db->from('test_marks');
        $this->db->where('class_id',$class_id);
        $this->db->where('class_section',$class_section);
        $this->db->where('subject',$subject);
        $this->db->where('batch',$xam_date);
        $this->db->where('test_type',$exam_type);
        $this->db->where('std_id',$std_id);
        $query = $this->db->get();
        $result_class=$query->result_array();
        print_r($result_class);
        
        return $result_class;


   }

   public function leave_info_insert($data)
   {
  
     $this->db->insert('leave_detail',$data);

   }

   public function fee_info_insert($data)
   {
    $this->db->insert('fees_detail',$data);
   }

    public function student_fee_insert($data)
    {
      $this->db->insert('student_fees_detail',$data);
    }
    public function staff_sailary_insert($data)
    {
      $this->db->insert('staff_sailary_detail',$data);
    }
   public function fetch_names($name)
    {
        $this->db->select('*');
        $this->db->from('admission');
        $where = "std_id='-23'";
  foreach ($name as $key => $value) {
          $where.= " OR std_id='$value'";
    }
       $this->db->where($where);
       $query = $this->db->get();
       $result_class = $query->result_array();
       return $result_class;
    }

public function set_attendance($name,$roll_no,$id,$classs,$section,$stat,$select_date)
      {
       
         $month = date('m');
         $month_slct = date_parse_from_format("Y-m-d", $select_date);
         $month_slct["month"];
         $month_slct["year"];

         $year1 = date('Y', strtotime($select_date));

        $this->db->select('*');
        $this->db->from('admission');
        $this->db->where('std_class',$classs);
        $this->db->where('std_section',$section);
        $query = $this->db->get();
        $result_std  = $query->result_array();

        // total rows for table attendance report
        $this->db->select('*');
        $this->db->from('attandance_report');
        $this->db->where('std_class',$classs);
        $this->db->where('std_section',$section);
        $query = $this->db->get();
        $result_std1  = $query->result_array();
        $total_rows=$query->num_rows();

        $this->db->select('*');
        $this->db->from('attandance_report');
       
         $this->db->where('month',$month_slct["month"]);
         $this->db->where('year',$month_slct["year"]);
      
        $query = $this->db->get();
        $result_stf_s  = $query->result_array();
        // print_r($result_stf_d);
        foreach ($result_stf_s as $key => $value) {
           $month_ftch = $value['month'];
           $year_ftch = $value['year'];
        }


        $result = array();
        $month = date("M");
        if($year_ftch != $month_slct["year"] && $month_ftch != $month_slct["month"] || $total_rows == 0)
        {
      foreach ($roll_no as $key => $value)
       {
        $result= array(
        'std_id' =>$id[$key],  
        'std_name'=>$name[$key],
        'std_roll_no'=> $roll_no[$key],
        'std_class' =>$classs,
        'std_section' => $section,
        'year' =>$year1,
        'month' =>$month_slct["month"]      
         );
         $this->db->insert('attandance_report',$result);
         $orignal = 'd'.date("d", strtotime($select_date));
         
          foreach ($stat as $key => $value)
         {

           if(empty($value))
            {
              $value1 = 'A';
              $attendance = array(
              $orignal => $value1);
            }
            else
            {
              $attendance = array(
              $orignal => $value);
            }


          $this->db->where('std_id',$key) ;
          $this->db->where('year',$year1);
          $this->db->where('month',$month_slct["month"]);
          $this->db->update('attandance_report',$attendance);

         }

        }

   
         $orignal = 'd'.date("d", strtotime($select_date));
        foreach ($stat as $key => $value)
         {
          
          if(empty($value))
            {
              $value1 = 'A';
              $attendance = array(
              $orignal => $value1);
            }
            else
            {
              $attendance = array(
              $orignal => $value);
            }

          $this->db->where('std_id',$key) ;
          $this->db->where('year',$year1);
          $this->db->where('month',$month_slct["month"]);
          $this->db->update('attandance_report',$attendance);
         }

        }
        else
        {
       // insert and update attendance of new record start
        $diff = array_diff_assoc($result_std, $result_std1);

        foreach ($diff as $key => $value) 
        {
          if($value != '')
          {
          $result= array(
        'std_id' =>$value['std_id'],  
        'std_name'=>$value['std_fname']." ".$value['std_lname'],
        'std_roll_no'=> $value['std_roll_no'],
        'std_class' =>$value['std_class'],
        'std_section' => $value['std_section'],
        'year' =>$year1,
        'month' =>$month_slct["month"]     
         );
         $this->db->insert('attandance_report',$result);
       }
        }
        // end
          $orignal = 'd'.date("d", strtotime($select_date));
         
          foreach ($stat as $key => $value)
         {

           if(empty($value))
            {
              $value1 = 'A';
              $attendance = array(
              $orignal => $value1);
            }
            else
            {
              $attendance = array(
              $orignal => $value);
            }

          $this->db->where('std_id',$key) ;
          $this->db->where('year',$year1);
          $this->db->where('month',$month_slct["month"]);
          $this->db->update('attandance_report',$attendance);

         }
        }
          $this->session->unset_userdata('cls');
          $this->session->unset_userdata('sect');
          $this->session->unset_userdata('date_flash');
       
      }


public function class_fetch1($sellect_date,$select_class,$select_sec)
      {
        $month_slct = date_parse_from_format("Y-m-d", $sellect_date);
         $month_slct["month"];
         $month_slct["year"];

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

        $this->db->select('class_incharge');
        $this->db->from('add_class');
        $this->db->where('class_name',$select_class);
        $this->db->where('class_section',$select_sec);
        $query = $this->db->get();
        $result_all['incharge'] = $query->result_array();

        $this->db->select('*');
        $this->db->from('add_class');
        $this->db->where('class_incharge',$stf_id);
        $query = $this->db->get();
        $result_all['incharge_data'] = $query->result_array();

        $sellect_date = 'd'.date("d", strtotime($sellect_date));
        $this->db->select('*');
        $this->db->from('attandance_report');
        $this->db->where('std_class',$select_class);
        $this->db->where('std_section',$select_sec);
        $this->db->where('year',$month_slct["year"]);
        $this->db->where('month',$month_slct["month"]);
        // $this->db->where($sellect_date.'!=','NULL');
        $query = $this->db->get();
        $result_all['attendance_data']  = $query->result_array();
        return $result_all;
      }
 public function  role_perm($role_perm)
  {
        $this->db->select('*');
        $this->db->from('role_assign');
        $this->db->where('staff_id',$role_perm);
        $query = $this->db->get();
        $result_sec  = $query->result_array();
        return $result_sec;
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

 public function fetch_std_data()
      {
      $this->db->select('std_id');
      $this->db->from('admission');
      $this->db->order_by("std_id","desc");
      $this->db->limit(1,0);
      $query = $this->db->get();
      $result_std  = $query->result_array();
      return $result_std;
      }
public function parent_exist($email_exist,$email_table_name)
      {
       
      for($i=0;$i<=2;$i++){
        if($email_exist[$i]){
      $this->db->select('*');
      $this->db->from('parrent_detail');
      $this->db->where($email_table_name[$i],$email_exist[$i]);
      $query = $this->db->get();
      $result_std[$i]  = $query->result_array();
      }
      }
      // print_r($result_std);
 
      return $result_std;
      }
public function authority_check($stf_id)
   {
      $this->db->select('*');
      $this->db->from('authority');
      $this->db->where('staff_id',$stf_id);
      $query = $this->db->get();
      $result=$query->result_array();
      return $result;
   }
public function class_fetch3($stf_id)
      {
        $this->db->select('*');
        $this->db->from('add_class');
        $this->db->where('class_incharge',$stf_id);
        $query = $this->db->get();
        $result_all['incharge'] = $query->result_array();
        return $result_all;
      }
public function authority_set($authority_data)
   {
      
      foreach ($authority_data as $key => $value)
       { 
        $value2[$key] = $value;
        $value3[$key] = implode(',', $value2[$key]); 
        }
       $this->db->insert('authority', $value3);
       return ;
   }
   public function authority_update($authority_data,$stf_id)
   {
     foreach ($authority_data as $key => $value)
       { 
        $value2[$key] = $value;
        $value3[$key] = implode(',', $value2[$key]); 
        }
       $this->db->update('authority', $value3);
       $this->db->where('staff_id',$stf_id);
       
       return ;
   }


public function dash_data()
      {
      $this->db->select('*');
      $query = $this->db->get('admission');
      $num[0] = $query->num_rows();
      $this->db->select('*');
      $query1 = $this->db->get('staff');
      $num[1] = $query1->num_rows();
      $this->db->select('*');
      $query1 = $this->db->get('parrent_detail');
      $num[2] = $query1->num_rows();
      return $num;
      }
public function insert_data_exam($table,$examm_insert,$sub)
{

foreach ($examm_insert as $key=> $value){
  for($i=0;$i<count($sub);$i++){
  $examm_insert1[$i]=array(
  'class_id' =>$examm_insert['class_id'][$i],
  'class_section' =>$examm_insert['class_section'][$i],
  'subject' => $examm_insert['subject'][$i],
  'exam_type' =>$examm_insert['exam_type'][$i],
  'exam_date' => $examm_insert['exam_date'][$i],
  'max_mark' => $examm_insert['max_mark'][$i],
  'exam_start_time' =>$examm_insert['exam_start_time'][$i],
  'exam_end_time' => $examm_insert['exam_end_time'][$i]
  );

}
}
for($i=0;$i<count($sub);$i++){
$result=$this->db->insert($table,$examm_insert1[$i]);
}
}
public function insert_data_test($table,$examm_insert,$sub)
{

foreach ($examm_insert as $key=> $value){
  for($i=0;$i<count($sub);$i++){
  $examm_insert1[$i]=array(
  'class_id' =>$examm_insert['class_id'][$i],
  'class_section' =>$examm_insert['class_section'][$i],
  'subject' => $examm_insert['subject'][$i],
  'test_type' =>$examm_insert['test_type'][$i],
  'test_date' => $examm_insert['test_date'][$i],
  'max_mark' => $examm_insert['max_mark'][$i],
  'description' => $examm_insert['description'][$i],
  'test_start_time' =>$examm_insert['test_start_time'][$i],
  'test_end_time' => $examm_insert['test_end_time'][$i]
  );

}
}
for($i=0;$i<count($sub);$i++){
$result=$this->db->insert($table,$examm_insert1[$i]);
}
}
public function class_fetch4($class_name,$class_section)
      {
        $this->db->select('*');
        $this->db->from('add_subject');
        $this->db->where('class_id',$class_name);
        $query = $this->db->get();
        $result_all1['cls_name'] = $query->result_array();

        $this->db->select('*');
        $this->db->from('exam_detail');
        $this->db->where('class_id',$class_name);
        $this->db->where('class_section',$class_section);
        $query = $this->db->get();
        $result_all1['exm_typ_date'] = $query->result_array();
        return $result_all1;
      }
//====================== navita data HRPAYROLL===========================//
 
public function data_update($table_name,$id,$data_id,$data)
{
          
          $this->db->where($id,$data_id);
          $this->db->update($table_name,$data);
          return;
       }


 public function data_remove($table_name,$id,$data_id)
      {
        $this->db->where($id,$data_id);
        $this->db->delete($table_name);
        return;
      }

  public function fetch_fee_data()
    {
        $this->db->select('*');
        $this->db->from('fees_detail');
         $query = $this->db->get();
        $result_class=$query->result_array();
       return $result_class;
    }

   public function fetch_fee_data_id($id)
       {
        $this->db->select('*');
        $this->db->from('fees_detail');
        $this->db->where('fees_id',$id);
         $query = $this->db->get();
         $result = $query->result_array();

        return $result;
      }

   public function fetch_std_fee_data()
    {
        $this->db->select('*');
        $this->db->from('student_fees_detail');
         $query = $this->db->get();
        $result_class = $query->result_array();
       return $result_class;
    }

    public function fetch_std_fee_data_id($id)
    {

      $this->db->select('*');
      $this->db->from('student_fees_detail');
      $this->db->where('std_id',$id);
      $query = $this->db->get();
      $res = $query->result_array();
  
      return $res;
    }  
public function clas_find($clas)
      {
        $this->db->select('class_name');
        $this->db->from('add_class');
        $this->db->where('class_name>',(int)$clas);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
      }

   
    public function leave_detail_fetch()
    {
       $this->db->select('*');
        $this->db->from('leave_detail');
         $query = $this->db->get();
        $result_class=$query->result_array();
       return $result_class;
    }
    public function detail_fetch($data,$fetch)
      {
        $this->db->select('*');
        $this->db->from('add_event');
        $this->db->where($data,$fetch);
        $query = $this->db->get();
        $res   = $query->result_array();
        return $res;
      }

       public function evnt_nm_fetch($data,$cls,$col_name,$name,$table)
      {
       
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($data,$cls);
        $this->db->where($col_name,$name);
        $query = $this->db->get();
        $res   = $query->result_array();
        return $res;
      }

      public function class_all_fetch()
      {
        $this->db->select('*');
        $this->db->from('add_class');
        $query = $this->db->get();
        $res   = $query->result_array();
        return $res;
      }

   public function class_all_section_fetch($evnt_clas)
      {
        $this->db->select('*');
        $this->db->from('add_class');
        $this->db->where('class_name',$evnt_clas);

        $query = $this->db->get();
        $res   = $query->result_array();
        return $res;
      }
      public function staff_sailary_fetch()
    {
       $this->db->select('*');
        $this->db->from('staff_sailary_detail');
         $query = $this->db->get();
        $result_class=$query->result_array();
       return $result_class;
    }

    public function fetch_stf_salary_data_id($id)
    {
      $this->db->select('*');
      $this->db->from('staff_sailary_detail');
      $this->db->where('stf_id',$id);
      $query = $this->db->get();
      $result = $query->result_array();

      return $result;
    }
//=======================end navita code ==================================//

//================ for leave management ===============================//
public function insert_designation($data)
{
  $this->db->insert('add_designation',$data);
   return;
}

public function fetch_designation()
{
  $this->db->select('*');
  $this->db->from('add_designation');
  $query = $this->db->get();
  $res = $query->result_array();
 return $res;
}

public function insert_category($data)
{
  $this->db->insert('add_category',$data);
   return;
}

public function fetch_category()
{
  $this->db->select('*');
  $this->db->from('add_category');
  $query = $this->db->get();
  $res = $query->result_array();
 return $res;
}

public function insert_leave($data)
{
  $this->db->insert('add_leave',$data);
   return;
}

public function fetch_leave_data()
{
  $this->db->select('*');
  $this->db->from('add_leave');
  $query = $this->db->get();
  $res = $query->result_array();
 return $res;
}

public function fetch_teacher_leave() //data from teacher_leave table//
{
  $this->db->select('*');
  $this->db->from('teacher_leave');
  $query = $this->db->get();
  $res = $query->result_array();
 return $res;
}
 public function approve_leave($staff_id,$teacher_id,$aprovel)
  {
    $this->db->set('approval',$aprovel);
    $this->db->where('stf_id',$staff_id);
    $this->db->where('teacher_leave_id',$teacher_id);
    $this->db->update('teacher_leave');
    return;
  }
 public function leave_request_count()
 {
    $this->db->select('approval,count(*)');
    $this->db->from('teacher_leave'); 
    $this->db->group_by('approval');
    $this->db->having('approval',0);
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
 }
 
//=======================end  code ==================================//
// lession plan start 23/11
 public function lession_plan_all()
      {
         $this->db->select('*');
        $this->db->from('lession_plan');
        $query = $this->db->get();
        $lession_plan=$query->result_array(); 
        return $lession_plan;
      }
public function lession_remove($lession_id)
    {
      $this->db->where('lession_id', $lession_id);
        $this->db->delete('lession_plan');
        return;
    }
    public function teacher_lession_plan_data($stf_id)
    {
        $this->db->select('assign_class');
        $this->db->from('assign_sub_teacher');
        $this->db->where('tch_name',$stf_id);
        $query = $this->db->get();
         $result1  = $query->result_array();
        return $result1;
    }
    public function section_lession($class_name)
    {
      $this->db->select('assign_section');
        $this->db->from('assign_sub_teacher');
        $this->db->where('assign_class',$class_name);
        $query = $this->db->get();
         $result_section  = $query->result_array();
        return $result_section;
    }
    public function sub_lession($class_name,$section_name)
    {
      $this->db->select('sub_name');
        $this->db->from('assign_sub_teacher');
        $this->db->where('assign_class',$class_name);
        $this->db->where('assign_section',$section_name);
        $query = $this->db->get();
         $result_section  = $query->result_array();
        return $result_section;
    }
     public function all_lession($subject_name,$class_name,$section_name)
    {
        $this->db->select('*');
        $this->db->from('lession_plan');
        $this->db->where('class_id',$class_name);
        $this->db->where('section_id',$section_name);
        $this->db->where('sub_id',$subject_name);
        $query = $this->db->get();
        $result_all  = $query->result_array();
        return $result_all;
    }
public function fetch_payhead()
    {
        $this->db->select('*');
        $this->db->from('add_payhead');
        $query = $this->db->get();
        $result_all  = $query->result_array();
        return $result_all;
    }
    // end salary data
   public function fetch_set_salary()
   {
    $this->db->select('*');
    $this->db->from('staff_salary_set');
    $query = $this->db->get();
    $res= $query->result_array();
    return $res;
   }

   public function fetch_staff_salary_paid()
   {
    $this->db->select('*');
    $this->db->from('staff_salary_paid');
    $query = $this->db->get();
    $res= $query->result_array();
    return $res;
   }

   public function fetch_deg_name($stf_d)
   {
     $this->db->select('*');
     $this->db->from('staff');
     $this->db->where('stf_designation',$stf_d);
     $query = $this->db->get();
     $res= $query->result_array();
     return $res;
   }


   public function student_between($one,$two)
    {
       $this->db->select('*');
       $this->db->from('admission');
       $this->db->where("std_class BETWEEN $one AND $two");
       $query = $this->db->get();
       $result_all  = $query->result_array();
       return $result_all;

    }
    

    // lession plan end
public function student_id1($class_id,$section_id)
    {
        $this->db->select('*');
        $this->db->from('admission');
        if($section_id=='all')
        {
        $this->db->where('std_class',$class_id);
        }
        else
        {
         $this->db->where('std_class',$class_id);
         $this->db->where('std_section',$section_id);
        }
        $query = $this->db->get();
        $result_all  = $query->result_array();
        return $result_all;
    }
     public function fetch_all($table)
 {
  
   $query = $this->db->get($table);
   $res = $query->result_array();
   return $res;
 }
    public function participation($all_data)
    {
        $this->db->select("event_id");
        $this->db->from("add_event");
        $this->db->limit(1);
        $this->db->order_by("event_id","DESC");
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value1) {
          $event_id =  $value1['event_id'];
        }

      foreach ($all_data['std_all'] as $key => $value)
       {
         $std_id = $value['std_id'];
         $this->db->set('std_id',$std_id); 
         $this->db->set('event_id',$event_id); 
         $this->db->insert('event_participation'); 
       }
    }
    public function notification_data($std_id)
    {
        $this->db->select('*');
        $this->db->from('event_participation');
        $this->db->where('std_id',$std_id);
        $this->db->where('participate_status',0);
        $query = $this->db->get();
        $result_all  = $query->result_array();
        return $result_all;
    }
    public function auth_role($role_auth,$staff_id)
    {
    $this->db->set('staff_id',$staff_id);
    foreach ($role_auth as $key => $value) {
    $exp[$key]=implode(',',$role_auth[$key]);
    $this->db->set($key,$exp[$key]);
     }
    $this->db->insert('role_assign');
    return; 
    }

     public function auth_role_update($role_auth,$staff_id)
    {
    $this->db->where('staff_id',$staff_id);
    foreach ($role_auth as $key => $value) {
    $exp[$key]=implode(',',$role_auth[$key]);
    $this->db->set($key,$exp[$key]);
     }
    $this->db->update('role_assign');
    return; 
    }
     public function event_of_student($std_id)
          {

        $this->db->select('*');
        $this->db->from('add_event');
        foreach ($std_id['id_all'] as $key)
         {
        $this->db->or_where('event_id',$key['event_id']);
         }
        $query = $this->db->get();
        $result_all1  = $query->result_array();
        return $result_all1;
        }

      public function std_id_all($std_id)
        {
        $this->db->select('*');
        $this->db->from('event_participation');
        $this->db->where('std_id',$std_id);
        $query = $this->db->get();
        $result_all  = $query->result_array();
        return $result_all;
        }
 public function participate_student($event_id)
        {
          $this->db->select('*');
          $this->db->from('event_participation');
          $this->db->where('event_id',$event_id);
          $this->db->where('participate_status',1);
           $this->db->where('read_status',1);
          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
        }
        public function std_id_ajax($std_id,$clss,$section)
        {
          if(count($std_id['std_id_ajax'])!=0){
           $this->db->select('*');
           $this->db->from('admission');
          foreach ($std_id['std_id_ajax'] as $key)
           {
          $this->db->or_where('std_id',$key['std_id']);
           }
           $this->db->where('std_class',$clss);
           $this->db->where('std_section',$section);
         }
          $query = $this->db->get();
          $result_all1  = $query->result_array();
          return $result_all1;

        }
        public function participation_list()
        {
          $this->db->select('*');
          $this->db->from('event_participation');
          $query = $this->db->get();
          $result_all  = $query->result_array();
          foreach ($result_all as $key => $value) {
           $std_id[] = $value;
          }
        $this->db->select('*');
           $this->db->from('admission');
          foreach ($std_id as $key)
           {

          $this->db->where_in('std_id',$key['std_id']);
           }
          $query = $this->db->get();
          $result_all1  = $query->result_array();
          return $result_all;
        }


 public function insert_winner($winner,$e_name,$e_date,$data)
    {
      echo $e_name;
      echo $e_date;
        $this->db->select("*");
        $this->db->from("add_event");
        $this->db->where('event_name',$e_name);
        $this->db->where('event_date',date($e_date));
        $query = $this->db->get();
        $result = $query->result_array();
       
        foreach ($result as $key) {
        $event_id =  $key['event_id'];
        }

      foreach ($data['a_std'] as $key => $value)
        {
          $std_id = $value['std_id'];
          $this->db->set('std_id',$std_id); 
          $this->db->set('event_id',$event_id); 
          $this->db->insert('event_winner',$winner); 
        }

    }

     public function std_id_fetch()
    {
      $this->db->select('*');
      $this->db->from('admission');
      $query = $this->db->get();
      return $query->result_array();

    }


        
    // event participation insert start
 // attendance view model by ajx
 public function attendance_data($class_ajx2,$sec_ajx2,$month,$years)
        {
          $this->db->select('*');
          $this->db->from('attandance_report');
          $this->db->where('std_class',$class_ajx2);
          $this->db->where('std_section',$sec_ajx2);
          $this->db->where('month',$month);
          $this->db->where('year',$years);
          $query = $this->db->get();
          $result_all5  = $query->result_array();
          return $result_all5;
        }

 public function update_data_notice($table,$id)
{
    $this->db->set('status',1);
    $this->db->where('notice_id',$id);
    $this->db->update($table);
    return;
}
public function event_remove($table,$id,$event_name_id)
      {
        $this->db->where($id,$event_name_id);
        $this->db->delete($table);
        return;
      }

      public function update_event_data($table,$event_id,$id,$col,$data)
      {
        $this->db->set($col,$data);
        $this->db->where($event_id,$id);
        $this->db->update($table);
        return;
      }

// staff attendance
public function setstf_attendance($stf_name,$stf_id,$stat_stf,$design,$slct_date) { 
         
         $month = date('m');
         $month_slct = date_parse_from_format("Y-m-d", $slct_date);
         $month_slct["month"];
         $month_slct["year"];

         $year1 = date('Y', strtotime($slct_date));


        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('stf_designation',$design);
        $query = $this->db->get();
        $result_stf  = $query->result_array();

        // total rows for table attendance report
        $this->db->select('*');
        $this->db->from('staff_attandance_report');
        $this->db->where('stf_desiginition',$design);
        $query = $this->db->get();
        $result_stf1  = $query->result_array();
        $total_rows = $query->num_rows();

        $this->db->select('*');
        $this->db->from('staff_attandance_report');
       
         $this->db->where('month',$month_slct["month"]);
         $this->db->where('year',$month_slct["year"]);
      
        $query = $this->db->get();
        $result_stf_d  = $query->result_array();
        // print_r($result_stf_d);
        foreach ($result_stf_d as $key => $value) {
           $month_ftch = $value['month'];
           $year_ftch = $value['year'];
        }

        $result = array();

      if($year_ftch != $month_slct["year"] && $month_ftch != $month_slct["month"] || $total_rows == 0)
        {
      foreach ($stf_id as $key => $value)
       {
        $result_stf = array(
        'stf_id' =>$stf_id[$key],  
        'stf_name'=>$stf_name[$key],
        'stf_desiginition' =>$design,
        'year' =>$year1,
        'month' =>$month_slct["month"]      
         );
         $this->db->insert('staff_attandance_report',$result_stf);
         $orignal_date = 'd'.date("d", strtotime($slct_date));
         
          foreach ($stat_stf as $key => $value)
         {

           if(empty($value))
            {
              $value2 = 'A';
              $attendance_stf = array(
              $orignal_date => $value2);
            }
            else
            {
              $attendance_stf = array(
              $orignal_date => $value);
            }


          $this->db->where('stf_id',$key);
          $this->db->where('year',$year1);
          $this->db->where('month',$month_slct["month"]);
          $this->db->update('staff_attandance_report',$attendance_stf);

         }

        }

   
         $orignal_date = 'd'.date("d", strtotime($slct_date));
        foreach ($stat_stf as $key => $value)
         {
          
          if(empty($value))
            {
              $value2 = 'A';
              $attendance_stf = array(
              $orignal_date => $value2);
            }
            else
            {
              $attendance_stf = array(
              $orignal_date => $value);
            }

          $this->db->where('stf_id',$key) ;
          $this->db->where('year',$year1);
          $this->db->where('month',$month_slct["month"]);

          $this->db->update('staff_attandance_report',$attendance_stf);
         }

        }
        else
        {
       // insert and update attendance of new record start
        $diff_stf = array_diff_assoc($result_stf, $result_stf1);

        foreach ($diff_stf as $key => $value) 
        {
          if($value != '')
          {
          $result_stf = array(
        'stf_id' =>$value['stf_id'],  
        'stf_name'=>$value['stf_fname']." ".$value['stf_lname'],
        'stf_desiginition' =>$value['stf_designation'],
        'year' =>$year1,
        'month' =>$month_slct["month"]      
         );
         $this->db->insert('staff_attandance_report',$result_stf);
       }
        }
        // end
          $orignal_date = 'd'.date("d", strtotime($slct_date));
         
          foreach ($stat_stf as $key => $value)
         {

           if(empty($value))
            {
              $value2 = 'A';
              $attendance_stf = array(
              $orignal_date => $value2);
            }
            else
            {
              $attendance_stf = array(
              $orignal_date => $value);
            }
      
          $this->db->where('stf_id',$key) ;
          $this->db->where('year',$year1);
          $this->db->where('month',$month_slct["month"]);

          $this->db->update('staff_attandance_report',$attendance_stf);

         }
        }
          $this->session->unset_userdata('date_flash1');   }
 // fetch attendace check data
      public function fetch_attendance_data($sellect_date1,$desg)
      {
        $month_slct = date_parse_from_format("Y-m-d", $sellect_date1);
         $month_slct["month"];
         $month_slct["year"];
        $slct_date = 'd'.date("d", strtotime($sellect_date1));

        $this->db->select('*');
        $this->db->from('staff_attandance_report');
        $this->db->where('stf_desiginition',$desg);
        $this->db->where('month',$month_slct["month"]);
        $this->db->where('year',$month_slct["year"]);
        // $this->db->where($slct_date.'!=','NULL');

        $query = $this->db->get();
        $result_all1  = $query->result_array();
        
        return $result_all1;
      }
       public function stf_attendance_data($stf_desgination,$month,$years)
        {
          $this->db->select('*');
          $this->db->from('staff_attandance_report');
          $this->db->where('stf_desiginition',$stf_desgination);
          $this->db->where('month',$month);
          $this->db->where('year',$years);
          $query = $this->db->get();
          $result_all_stf  = $query->result_array();
          return $result_all_stf;
        }

 public function all_stf($desigination)
        {
          $this->db->select('*');
          $this->db->from('staff');
          $this->db->where('stf_designation',$desigination);
          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
        }
//end staff attendance

// school profile 
        public function school_info_fetch($admin_id)
        {
          $this->db->select('*');
          $this->db->from('admin');
          $this->db->where('admin_id',$admin_id) ;
          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
        }
          public function register_count()
        {
          $this->db->select('*');
          $this->db->from('admin');
          $query = $this->db->get();
          $result_all  = $query->result_array();
           $total_rows = $query->num_rows();
          return $total_rows;
        }
        public function update_info($info_add,$admin_id)
        {
          $this->db->where('admin_id',$admin_id) ;
          $this->db->update('admin',$info_add);
          return;
        }
        public function update_logo($img_update,$admin)
        {
         
      $this->db->set('admin_image',$img_update['admin_image']);
      $this->db->where('admin_id', $admin);
      $this->db->update('admin');
          return;
        }

        public function parent_fetch($parent_id)
        {
          $this->db->select('*');
          $this->db->from('parrent_detail');
          $this->db->where('parent_id',$parent_id);
          $query = $this->db->get();
          $result_all  = $query->result_array();

          return $result_all;
        }
// end school profile

public function admin_message_send($message_title,$message_body,$notify)
{
  $msg=array(
  'subject'=>$message_title,
  'message'=>$message_body
    );
for($i=0;$i<count($notify);$i++)
{
if($notify[$i]=='admission')
{
          $this->db->select('*');
          $this->db->from('admission');
          $query = $this->db->get();
          $result_all  = $query->result_array();
       
for($j=0;$j<count($result_all);$j++)
{
$this->db->set('send_by_admin','admin');
$this->db->set('std_id',$result_all[$j]['std_id']);
$this->db->insert('messenger',$msg);
}
}
elseif($notify[$i]=='staff')
{
          $this->db->select('*');
          $this->db->from('staff');
          $query = $this->db->get();
          $result_all  = $query->result_array();
          print_r($result_all);
for($j=0;$j<count($result_all);$j++)
{
$this->db->set('send_by_admin','admin');
$this->db->set('tch_id',$result_all[$j]['stf_id']);
$this->db->insert('messenger',$msg);
}

}
elseif($notify[$i]=='parrent_detail')
{
          $this->db->select('*');
          $this->db->from('parrent_detail');
          $query = $this->db->get();
          $result_all  = $query->result_array();
      
for($j=0;$j<count($result_all);$j++)
{
$this->db->set('send_by_admin','admin');
$this->db->set('parent_id',$result_all[$j]['parent_id']);
$this->db->insert('messenger',$msg);
}
}
}  

}
public function rd_student()
{
          $this->db->select('*');
          $this->db->from('admission');
          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
}

public function rd_teacher()
{
          $this->db->select('*');
          $this->db->from('staff');
          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
}
public function rd_parent()
{
          $this->db->select('*');
          $this->db->from('parrent_detail');
          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
}
public function insert_messenger($id,$parent_id,$msg)
{
for($i=0;$i<count($parent_id);$i++)
{
$this->db->set('send_by_admin','admin');
$this->db->set($id,$parent_id[$i]);
$this->db->insert('messenger',$msg);
}
}

 // student birthday model
        public function stu_birthday()
        {
          
          $this->db->select('*');
          $this->db->from('admission');

          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
        }
        public function message_create($birthday)
        {

  foreach ($birthday['dob'] as $key => $value)
 {

      $message="Happy Bday Dear"." ".$value['std_fname']." ".$value['std_lname'];
      $subject="Happy Bday";
      $data = array(
      'std_id' => $value['std_id'],
      'class_sub' => $value['std_class'],
      'section_sub' => $value['std_section'],
      'status' => 0,
      'message' => $message,
      'subject' => $subject,
      'send_by_admin'=>'admin',
      'date_bithday'=>date('d-m-y')
       );
       $data1 = array(
      'class_sub' => $value['std_class'],
      'section_sub' => $value['std_section'],
      'status' => 0,
      'message' => "Today is ur frd birthday"." ".$value['std_fname']." ".$value['std_lname'],
      'subject' => $subject,
      'send_by_admin'=>'admin',
      'date_bithday'=>

      ('d-m-y')
       );
    $date_db = $value['std_dob'];
    $date_db1 = date_parse_from_format("Y-m-d", $date_db);
    $date_db1["day"];
    $date_db1["month"];
    $date_db1["year"];

    $date = date('Y-m-d');
    $date_slct = date_parse_from_format("Y-m-d", $date);
    $date_slct["day"];
    $date_slct["month"];
    $date_slct["year"];
    $age = $date_slct["year"] - $date_db1["year"];
   
  if($date_db1["day"] == $date_slct["day"] && $date_db1["month"] == $date_slct["month"] )
  {
   
       $this->db->select('*');
       $this->db->from('messenger');
       $this->db->where('class_sub',$value['std_class']);
       $this->db->where('section_sub',$value['std_section']);
       $this->db->where('std_id',$value['std_id']);
       $this->db->where('date_bithday',date('d-m-y'));
       $this->db->where('message',"Happy Bday Dear"." ".$value['std_fname']." ".$value['std_lname']);
        $query = $this->db->get();
        $result_all12  = $query->result_array();
      $total_rows1 = $query->num_rows();
if($total_rows1==0)
  {

    $this->db->insert('messenger', $data);
  }
  else{

  }
    
       $this->db->select('*');
       $this->db->from('admission');
       $this->db->where('std_class',$value['std_class']);
       $this->db->where('std_section',$value['std_section']);
       $this->db->where('std_id!=',$value['std_id']);
        $query = $this->db->get();
        $result_all  = $query->result_array();
   if($total_rows1==0)
  {
for($i=0;$i<count($result_all);$i++)
  {
    $this->db->set('std_id',$result_all[$i]['std_id']);
    $this->db->insert('messenger', $data1);
   }

  }
  else{    

 }
   }
 }

}
public function std_promote($chk,$std_det_all)
{
for($ch=0;$ch<count($chk);$ch++)
{
 $this->db->select('*');
  $this->db->from('admission');
  $this->db->where('std_id',$chk[$ch]);
  $query = $this->db->get();
  $result_all[$ch]  = $query->result_array();
}
$this->db->select('*');
$this->db->from('admission');
for($ch=0;$ch<count($chk);$ch++)
{ 
$this->db->where_not_in('std_id',$chk[$ch]);
}
$query = $this->db->get();
$arrrr  = $query->result_array();
for($i=0;$i<count($arrrr);$i++)
{
$data12[$i] = array(
'std_fname' => $arrrr[$i]['std_fname'],
'std_lname' => $arrrr[$i]['std_lname'],
'std_email' => $arrrr[$i]['std_email'],
'std_class' => $arrrr[$i]['std_class'],
'std_image' => $result_all[$i][0]['std_image'],
'std_gender' => $arrrr[$i]['std_gender'],
'std_nationality' => $arrrr[$i]['std_nationality'],
'std_category' => $arrrr[$i]['std_category'],
'std_religion' => $arrrr[$i]['std_religion'],
'std_permanent_address' => $arrrr[$i]['std_permanent_address'],
'std_father_name' => $arrrr[$i]['std_father_name'],
'std_mother_name' => $arrrr[$i]['std_mother_name'],
'std_guardian_name' => $arrrr[$i]['std_guardian_name'],
'std_father_email' =>$arrrr[$i]['std_father_email'],
'std_mother_email' => $arrrr[$i]['std_mother_email'],
'std_reg_date' => date('Y-m-d'),
'std_guardian_email' => $arrrr[$i]['std_guardian_email'],
'std_dob' => $arrrr[$i]['std_dob'] ,
'std_address' => $arrrr[$i]['std_address'],
'std_mobile' => $arrrr[$i]['std_mobile'],
'std_batch' => $std_det_all['promote_batch'],
'std_password'=>$arrrr[$i]['std_password']
);
  $this->db->insert('admission',$data12[$i]);


  $confirm10[$i]=random_string('alnum',10);
  $this->db->set('std_promoted','unpromoted');
  $this->db->set('std_password',$confirm10[$i]);
  $this->db->where('std_id', $arrrr[$i]['std_id']);
  $this->db->update('admission');
  $this->db->select('std_id');
  $this->db->from('admission');
  $this->db->order_by("std_id","desc");
  $this->db->limit(1);
  $query = $this->db->get();
  $result_all_last1  = $query->result_array();

  echo $result_all_last1[$i]['std_id'];
  echo $arrrr[$i]['std_id'];
 
  $this->db->set('std_id',$result_all_last1[0]['std_id']);
  $this->db->where('std_id',$arrrr[$i]['std_id']);
  $this->db->update('parrent_detail');




}
for($i=0;$i<count($result_all);$i++)
{
$data[$i] = array(
'std_fname' => $result_all[$i][0]['std_fname'],
'std_lname' => $result_all[$i][0]['std_lname'],
'std_email' => $result_all[$i][0]['std_email'],
'std_class' => $std_det_all['promote_class'],
'std_image' => $result_all[$i][0]['std_image'],
'std_gender' => $result_all[$i][0]['std_gender'],
'std_nationality' => $result_all[$i][0]['std_nationality'],
'std_category' => $result_all[$i][0]['std_category'],
'std_religion' => $result_all[$i][0]['std_religion'],
'std_permanent_address' => $result_all[$i][0]['std_permanent_address'],
'std_father_name' => $result_all[$i][0]['std_father_name'],
'std_mother_name' => $result_all[$i][0]['std_mother_name'],
'std_guardian_name' => $result_all[$i][0]['std_guardian_name'],
'std_father_email' =>$result_all[$i][0]['std_father_email'],
'std_mother_email' => $result_all[$i][0]['std_mother_email'],
'std_reg_date' => date('Y-m-d'),
'std_guardian_email' => $result_all[$i][0]['std_guardian_email'],
'std_dob' =>$result_all[$i][0]['std_dob'] ,
'std_address' => $result_all[$i][0]['std_address'],
'std_mobile' => $result_all[$i][0]['std_mobile'],
'std_batch' =>$std_det_all['promote_batch'],
'std_password'=>$result_all[$i][0]['std_password']
);
  $this->db->insert('admission', $data[$i]);
  $confirm10[$i]=random_string('alnum',10);
  $this->db->set('std_promoted','promoted');
  $this->db->set('std_password',$confirm10[$i]);
  $this->db->where('std_id', $result_all[$i][0]['std_id']);
  $this->db->update('admission');

  $this->db->select('std_id');
  $this->db->from('admission');
  $this->db->order_by("std_id","desc");
  $this->db->limit(1);
  $query = $this->db->get();
  $result_all_last  = $query->result_array();
 
  $this->db->set('std_id',$result_all_last[0]['std_id']);
  $this->db->where('std_id', $result_all[$i][0]['std_id']);
  $this->db->update('parrent_detail');


}
}

public function unpromote()
{
 
  $this->db->select('*');
  $this->db->from('admission');
 $this->db->where('std_batch','2017-2018');
 $this->db->where('std_promoted','unpromoted');
  $query = $this->db->get();
  $result_all  = $query->result_array();
  return $result_all;
}
public function  promote()
{
  $this->db->select('*');
  $this->db->from('admission');
  $this->db->where('std_batch','2017-2018');
  $this->db->where('std_promoted','promoted');
  $query = $this->db->get();
  $result_all  = $query->result_array();
   return $result_all;
}

     public function vehicle_details_fetch()
      {
          $this->db->select('*');
          $this->db->from('vehicle_detail');
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;

      }
      public function rute_details_fetch()
      {
          $this->db->select('*');
          $this->db->from('rute_detail');
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;

      }
       public function destination_details_fetch()
      {
          $this->db->select('*');
          $this->db->from('add_destination');
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;

      }
      public function insert_allocation($transport_add,$passenger_name)
      {
     
        foreach ($passenger_name as $key => $value)
         {

         $this->db->set('passenger_name',$value); 
         $this->db->insert('transport_allocation', $transport_add); 
         }
         return;
      }
        public function allocate_fetch()
      {
          $this->db->select('*');
          $this->db->from('transport_allocation');
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;

      }
  public function all_driver()
{
        $this->db->select('*');
        $this->db->from('add_designation');
        $this->db->where('designation','driver');
        $query = $this->db->get();
        $result_driver  = $query->result_array();
        $desg_id = $result_driver[0]['designation_id'];

        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('stf_designation',$desg_id);
        $query = $this->db->get();
        $result_driver  = $query->result_array();
        return $result_driver; 
}

  public function driver_fetch()
      {
          $this->db->select('*');
          $this->db->from('add_driver');
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;
      }
       public function rutecode_fetch($stfid)
      {
          $this->db->select('*');
          $this->db->from('add_driver');
          $this->db->where('stf_id',$stfid);
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;
      }
      public function passenger_fetch($rute_code)
      {
          $this->db->select('*');
          $this->db->from('transport_allocation');
          $this->db->where('rute_code',$rute_code);
          $this->db->where('pick_status',0);
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;
      }
       public function passenger_fetch_button()
      {
          $this->db->select('*');
          $this->db->from('pickup_drop');
          $this->db->where('drop_status', 0);
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;
      }
      public function update_drop($ui1,$lat,$long)
      {
      

          $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&sensor=false";
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
                $drop = date("h:i:sa");
                $this->db->set('drop_place',$address);
                $this->db->set('drop_status',1);
                $this->db->set('drop_time',$drop);
                $this->db->where('pickup_drop_id', $ui1);
                $this->db->update('pickup_drop');
                
                // $this->db->set('pick_status',0);
                // $this->db->update('transport_allocation');

                return;
      }
      public function pickup_data($table_name,$data,$pick_id)
      {
        $result=$this->db->insert($table_name, $data);

          $this->db->set('pick_status',1);
          $this->db->where('t_allocation_id', $pick_id);
          $this->db->update('transport_allocation');
          return $result;


      }
     public function particular_driver($driver_id)
     {
          $this->db->select('*');
          $this->db->from('add_driver');
          $this->db->where('driver_id',$driver_id);
          $query = $this->db->get();
          $result_all = $query->result_array(); 
          return $result_all;



     }
   
    public function driver_del($driver_id)
    {
        $this->db->where('driver_id',$driver_id);
        $this->db->delete('add_driver');
        return;
    }

    public function admin_feed()
    {
    $this->db->select('*');
    $this->db->from('admin_auth');
    $query = $this->db->get();
    $result_all = $query->result_array(); 
    return $result_all;
    }

     public function remove_data($table_name,$table_id,$id_number)
    {
        $this->db->where($table_id,$id_number);
        $this->db->delete($table_name);
        return;
    }


    // update data sachin
    public function update_leave_data($l_id)
      {
        $this->db->select('*');
        $this->db->from('add_leave');
        $this->db->where('leave_id',$l_id);
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
      }

    public function update_value($table_name,$table_id,$id_number,$data)
      {
      $this->db->where($table_id, $id_number);
      $this->db->update($table_name, $data);
      return;
      }

    public function select_update_data($table_name,$table_id,$l_id)
      {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($table_id,$l_id);
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
      }
    public function update_allocation($transport_add,$passenger_name,$t1_id)
      {
     
        foreach ($passenger_name as $key => $value)
         {
         $this->db->where('t_allocation_id', $t1_id);
         $this->db->set('passenger_name',$value); 
         $this->db->update('transport_allocation', $transport_add); 
         }
        return;
      }

   // ======================photo Gallery====================================//
    public function gallery_data_fetch()
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;   
    }

    public function image_fetch($album_name)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('folder_name',$album_name);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;   
    }

     public function update_photo($table_name,$add_photo,$album_name)
     { 
        $this->db->where('folder_name',$album_name);
        $this->db->update($table_name,$add_photo);
        return;

     }

   public function  update_data_auth($table,$fed)
   {
       $this->db->where('admin_auth',1);
        $this->db->update($table,$fed);
        return;

   }

   public function stu_exam_marks($xam_id)
   {
        $this->db->select('*');
        $this->db->from('student_marks');
        $this->db->where('exam_id',$xam_id);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;   
   }
   public function staff_analysis($staff_analysis)
   {
        $this->db->select('*');
        $this->db->from('assign_sub_teacher');
        $this->db->where('tch_id',$staff_analysis);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result; 
   }
  public function assign_sectio($assign_class,$assign_section,$sub_name)
   {
        $this->db->select('*');
        $this->db->from('student_marks');
        $this->db->where('class_id',$assign_class);
        $this->db->where('class_section',$assign_section);
        $this->db->where('subject',$sub_name);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result;
   }
 public function std_iddd($std_iddd)
   {
     for($nm=0;$nm<count($std_iddd);$nm++){
        $this->db->select('std_fname');
        $this->db->from('admission');
       
        $this->db->where('std_id',$std_iddd[$nm]);
       
        $query = $this->db->get();
        $result[$std_iddd[$nm]]= $query->result_array(); 
         }
        return $result; 
   }
   public function student_month($type,$clss,$secc,$monthe)
   {
        $this->db->select('*');
        $this->db->from('student_marks');
        $this->db->where('month',$monthe);
        $this->db->where('exam_type',$type);
        $this->db->where('class_id',$clss);
        $this->db->where('class_section',$secc);
        $query = $this->db->get();
        $result= $query->result_array(); 
        return $result; 
   }
   public function student_id()
    {
        $this->db->select('*');
        $this->db->from('admission');
        $query = $this->db->get();
        $result_all  = $query->result_array();
        return $result_all;
    }
    public function  fetch_role($staff_id)
    {
        $this->db->select('*');
        $this->db->from('role_assign');
        $this->db->where('staff_id',$staff_id);
        $query = $this->db->get();
        $result_all  = $query->result_array();
        $result = $query->num_rows();
        return $result;
    }

    public function stff_fetch()
        {
          $this->db->select('*');
          $this->db->from('staff');
          $this->db->where('stf_designation',1);
          $query = $this->db->get();
          $result_all  = $query->result_array();
          return $result_all;
        }

 // ======================END photo Gallery====================================//



}

?>