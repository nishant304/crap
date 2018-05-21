<div id="page-wrapper" class="wrapera">
<div class="container atnd_slc tp_marg">
<center><h1 class="std_log">SMS</h1><?Php  $sub_sec=$this->session->userdata('sub_sec'); 
$save_clas_sec=$this->session->userdata('save_clas_sec'); 
$save_clas_sec1=$this->session->userdata('save_clas_sec1'); 
  ?></center>
 <?Php echo form_open('teacher_controller/save_clas_sec');     ?>
  <div class="col-lg-11 col-lg-offset-1">
  <div class="col-lg-12 ">
  <center>
  <div class="col-lg-6">
    <label class="col-lg-12">Class</label>
    <select name="class_id" class="slct_main col-lg-6 col-lg-offset-3" id="std_classs" onchange="classss(this.value);"  >
      <option>Select</option>
       <?Php
     foreach ($sub_class as $key) { 
     $arr[]=$key['assign_class']; }
     $arr1=array_unique($arr);
     foreach ($arr1 as $key) { ?>
      <option <?php if($save_clas_sec['class_id']==$key){ ?> selected<?php }   ?>><?Php echo $key ;  ?></option>
     <?Php }   ?>
  
    </select>
  </div>

  <div class="col-lg-6">
    <label class="col-lg-12">Section</label>
  <select name="class_section" class="slct_main col-lg-6 col-lg-offset-3" id="tabbb1" onchange="acb();">
      <option><?php echo $save_clas_sec['class_section'];  ?></option>
    
    </select>
  </div>
  <input type="submit" name="submit" id="submitty">
     </center>
    </div>
   </div>
<?Php echo form_close();     ?>
<!-- student show sms start -->
<?php echo form_open('teacher_controller/chat_with_student');    ?>
<div class="col-lg-9 col-lg-offset-2">
<div class="col-lg-12 SMS_data_soo">
<input type="hidden" name="class_sub" value="<?php echo $save_clas_sec['class_id'];  ?>">
<input type="hidden" name="section_sub" value="<?php echo $save_clas_sec['class_section'];  ?>">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><input type="checkbox" id="ckbCheckAll"  name='all_student' value="all" ><label for='ckbCheckAll'> select all</label></th>
        <th>Student</th>
      </tr>
    </thead>
    <tbody>
   <?php  foreach($save_clas_sec1['save_clas_sec1'] as $key){?>
      <tr>
        <td><input type="checkbox" class="checkBoxClass" value="<?php  echo $key['std_id'];  ?>" name="std_id[]"> </td>
        <td><?php  echo $key['std_fname'];  ?></td>
      </tr>
      <?php } ?>
      
      
    </tbody>
  </table>
  </div>
  
</div>
<!-- student show sms end -->
<div class="col-lg-9 col-lg-offset-2">
 <div class="col-lg-12 sent_info">
    <label class="col-lg-12 pading_o">Sent to</label>
    <div class="col-lg-6 pading_o">
    <div class="col-lg-3 pading_o">
   <label for="student">Student: </label>
   </div>
  <div class="col-lg-3">
<input id="student"  type="checkbox" name="send_to[]" value="student">
</div>
   </div>
   <div class="col-lg-6 pading_o">
   <div class="col-lg-3">
 <label for="parent">Parent: </label>
 </div>
 <div class="col-lg-3">
 <input id="parent" type="checkbox" name="send_to[]" value="parent">
 </div>
 </div>
 </div>
 </div>
<div class="col-lg-9 col-lg-offset-2">
 <div class="col-lg-12 msm_desp">
 <label>Subject</label>
   <input class="form-control" name="subject" >

 </div>
  
</div>
<div class="col-lg-9 col-lg-offset-2">
 <div class="col-lg-12 msm_desp">
 <label>Message</label>
   <textarea class="form-control" name="message" rows="5" ></textarea>

   <button type="submit" name="submit" class="btn btn-warning">Send</button>
 </div>
  
</div>
<?Php echo form_close();     ?>
</div>
</div>




<script type="text/javascript">
  $('#ckbCheckAll').click(function(){
            if($(this).prop("checked")) {
                $(".checkBoxClass").prop("checked", true);
            } else {
                $(".checkBoxClass").prop("checked", false);
            }                
        });


        $('.checkBoxClass').click(function(){
            if($(".checkBoxClass").length == $(".checkBox:checked").length) {
                $("#ckbCheckAll").prop("checked", true);
            }else {
                $("#ckbCheckAll").prop("checked", false);            
            }
        });
</script>

<script type="text/javascript">
  
function classss(value)
{
// var classs=document.getElementById('std_classs').value;

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_section/"+value+"/",  
    data    : {'classs':value},
    success : function(data){
        $("#tabbb1").html(data);
        if(data){
}
}
 });
}
</script>
<script type="text/javascript">
function acb(){
$('form').find('input[type="submit"]').trigger('click');
}
</script>


<style type="text/css">
  .sent_info{
    margin-bottom: 20px;
  }
  .pading_o{
    padding: 0px;
  }
</style>
