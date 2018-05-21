<?php
class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertCSV($data)
    {     $i=0; $j=0;
       
                $this->db->select('*');
                $this->db->from('import');
                $query = $this->db->get();
                $result = $query->result_array(); 
// if table is empty start
             if(empty($result))
             {
                foreach ($data as $key => $value)
                 {
                
                    $this->db->insert('import', $value);
                 }
         

             }
// end if table is empty start
        
// if table is not empty start 
elseif(!empty($result))
{

$z=0; 
// condition for update data
for($u=0;$u<count($result);$u++)
{
for($o=0;$o<count($data);$o++)
{
if($result[$u]['id'] == $data[$o]['id'])
{ 
                                            
 $this->db->set('name',$data[$o]['name']);
 $this->db->set('mobile',$data[$o]['mobile']);
 $this->db->where('id',$data[$o]['id']);
 $this->db->update('import');   
}
  else
  {
    $arr[]=$data[$o];
   $z++;
  }
} 
}
 // end for condition update data

 if($z!=0)
 {
  
    for($k=0;$k<count($arr);$k++)
    {
                $this->db->select('*');
                $this->db->from('import');
                $this->db->where('id',$arr[$k]['id']);
                $query = $this->db->get();
                $result1 = $query->result_array(); 
                
      if(empty($result1))    
      {
         $this->db->insert('import', $arr[$k]);
      }
      else
      {
        for($b=0;$b<count($result1);$b++)
{ 
      if($result1[$b]['id'] != $arr[$k]['id'])
    {
           $this->db->insert('import', $arr[$k]);
    }
}
}
}
}
}
}

public function view_data()
       {
        $this->db->select('*');
        $this->db->from('import');
        $query = $this->db->get();
        $result = $query->result_array(); 
        return $result;
    }

}