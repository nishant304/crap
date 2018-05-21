<?php 
        

   $stf_id = $this->session->userdata('stfdata');

$attribute= array('id' => 'form');
  $name1 = $this->session->userdata('markss');
  $name2 = $this->session->userdata('fet_name');
  $name3 = $this->session->userdata('makks');
  $name4 = $this->session->userdata('all_student');
  $selected="selected";


foreach ($incharge_data['incharge'] as $key => $value)
 {
     $incharge_id = $value['class_incharge'];
     $class_data1 = $value['class_name'];
     $section_data1 = $value['class_section'];

 }

 ?>

<div class="page-wrapper">

<?php
    $data_stf = $this->session->userdata('data_auth');

   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1)
   {
   
    $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    }
   ?>
  <!-- start condition for authority 1,2 -->
<div class="container atnd_slc tp_marg">
<?php foreach ($exp['marks'] as $key => $value) {

if($value == '2' && $incharge_id == $stf_id){?>
   <?php echo form_open('teacher_controller/marks_stored',$attribute); ?>
  <div class="col-lg-12 ">
  <div class="col-lg-10 col-lg-offset-2">
  <center>
<div class="col-lg-2">
   <label>Class</label>
<select name="class_id" class="slct_main col-lg-12" id="std_classs" onchange="stu_class(this.value);">
<option>Select</option>
<?php foreach($class_data['class'] as $key){   ?>

<option <?php if($name3['class_id'] == $key['class_name']){ echo $selected; } ?> value="<?Php echo $key['class_name'];  ?>"><?Php echo $key['class_name'];  ?></option>
<?php } ?>
</select>
</div>

       <div class="col-lg-2">
      <label>Section</label>
  <select name="class_section" class="slct_main col-lg-12" id="tabbb_section" onchange="student_section(this.value);">

<option value="<?php echo  $name3['class_section'];   ?>"><?php echo $name3['class_section'];   ?></option>
</select>
</div>
 <div class="col-lg-2">
  <label>Subject</label>
 <select class="slct_main col-lg-12" id="tabbb1" name="subject" onchange="student_sub(this.value);">

    <option value="<?php echo  $name3['subject'];   ?>"><?php echo  $name3['subject'];   ?></option>
    </select>
   </div>
   <div class="col-lg-2">
      <label>ExamType</label>
  <select class="slct_main col-lg-12" name="exam_type" id="tabbb23" onchange="student_exam_type(this.value);">
  <option value="<?php echo  $name3['exam_type'];   ?>"><?php echo  $name3['exam_type'];   ?></option>
                 
     </select>
     </div>

        <div class="col-lg-2">
      <label>ExamDate</label>
     <select  name="exam_date" id="tabbb231" class="slct_main col-lg-12" onchange="examdate(this.value);">
      <option value="<?php echo  $name3['exam_date'];   ?>"><?php echo  $name3['exam_date'];   ?>
     </select>
     </div>

  <div class="col-lg-2">
     
     <input type="hidden" name="exam_id" value="<?Php echo $name3['exam_id'];  ?>" id="exam_id_sec">
     <input type="submit" name="submit" id="submitty">
     </div>
     </div>
     </center>
   </div>
     </div>
  <?php   echo form_close();  ?>

<?php } } ?>
<!-- end condition 2 -->

<!-- start authority for 1 and incharge -->
<?php foreach ($exp['marks'] as $key => $value1) {

if(($stf_id == $incharge_id && $value == '1' && $value1 != '2') || ($stf_id == $incharge_id && $value1 == ''))

{ ?>

<?php echo form_open('teacher_controller/marks_stored',$attribute); ?>
  <div class="col-lg-12 ">
  <div class="col-lg-10 col-lg-offset-2">
  <center>
<div class="col-lg-2">
   <label>Class</label>
<select name="class_id" class="slct_main col-lg-12" id="std_classs" onchange="stu_class(this.value);">
<option>Select</option>
<?php foreach($class_data['class'] as $key){   ?>

<option <?php if($name3['class_id'] == $key['class_name']){ echo $selected; } ?> value="<?Php echo $key['class_name'];  ?>"><?Php echo $key['class_name'];  ?></option>
<?php } ?>
</select>
</div>

       <div class="col-lg-2">
      <label>Section</label>
  <select name="class_section" class="slct_main col-lg-12" id="tabbb_section" onchange="student_section(this.value);">

<option value="<?php echo  $name3['class_section'];   ?>"><?php echo $name3['class_section'];   ?></option>
</select>
</div>
 <div class="col-lg-2">
  <label>Subject</label>
 <select class="slct_main col-lg-12" id="tabbb1" name="subject" onchange="student_sub(this.value);">

    <option value="<?php echo  $name3['subject'];   ?>"><?php echo  $name3['subject'];   ?></option>
    </select>
   </div>
   <div class="col-lg-2">
      <label>ExamType</label>
  <select class="slct_main col-lg-12" name="exam_type" id="tabbb23" onchange="student_exam_type(this.value);">
  <option value="<?php echo  $name3['exam_type'];   ?>"><?php echo  $name3['exam_type'];   ?></option>
                 
     </select>
     </div>

        <div class="col-lg-2">
      <label>ExamDate</label>
     <select  name="exam_date" id="tabbb231" class="slct_main col-lg-12" onchange="examdate(this.value);">
      <option value="<?php echo  $name3['exam_date'];   ?>"><?php echo  $name3['exam_date'];   ?>
     </select>
     </div>

  <div class="col-lg-2">
     
     <input type="hidden" name="exam_id" value="<?Php echo $name3['exam_id'];  ?>" id="exam_id_sec">
     <input type="submit" name="submit" id="submitty">
     </div>
     </div>
     </center>
   </div>
     </div>
<?php  echo form_close(); break;?>

<?php }


} ?>

<!-- not incharge and 1 start -->
<?php foreach ($exp['marks'] as $key => $value) {

if($value1 == '1' && $incharge_id != $stf_id){?>
   <?php echo form_open('teacher_controller/marks_stored',$attribute); ?>
  <div class="col-lg-12 ">
  <div class="col-lg-10 col-lg-offset-2">
  <center>
<div class="col-lg-2">
   <label>Class</label>
<select name="class_id" class="slct_main col-lg-12" id="std_classs" onchange="stu_class(this.value);">
<option>Select</option>
<?php foreach($class_data['class'] as $key){   ?>

<option <?php if($name3['class_id'] == $key['class_name']){ echo $selected; } ?> value="<?Php echo $key['class_name'];  ?>"><?Php echo $key['class_name'];  ?></option>
<?php } ?>
</select>
</div>

       <div class="col-lg-2">
      <label>Section</label>
  <select name="class_section" class="slct_main col-lg-12" id="tabbb_section" onchange="student_section(this.value);">

<option value="<?php echo  $name3['class_section'];   ?>"><?php echo $name3['class_section'];   ?></option>
</select>
</div>
 <div class="col-lg-2">
  <label>Subject</label>
 <select class="slct_main col-lg-12" id="tabbb1" name="subject" onchange="student_sub(this.value);">

    <option value="<?php echo  $name3['subject'];   ?>"><?php echo  $name3['subject'];   ?></option>
    </select>
   </div>
   <div class="col-lg-2">
      <label>ExamType</label>
  <select class="slct_main col-lg-12" name="exam_type" id="tabbb23" onchange="student_exam_type(this.value);">
  <option value="<?php echo  $name3['exam_type'];   ?>"><?php echo  $name3['exam_type'];   ?></option>
                 
     </select>
     </div>

        <div class="col-lg-2">
      <label>ExamDate</label>
     <select  name="exam_date" id="tabbb231" class="slct_main col-lg-12" onchange="examdate(this.value);">
      <option value="<?php echo  $name3['exam_date'];   ?>"><?php echo  $name3['exam_date'];   ?>
     </select>
     </div>

  <div class="col-lg-2">
     
     <input type="hidden" name="exam_id" value="<?Php echo $name3['exam_id'];  ?>" id="exam_id_sec">
     <input type="submit" name="submit" id="submitty">
     </div>
     </div>
     </center>
   </div>
     </div>
  <?php   echo form_close();  ?>

<?php 

} } ?>
<!-- not incharge and 1 end -->

<!-- start not incharge 1,2 -->

<?php foreach ($exp['marks'] as $key => $value) {
if($value == '2' && $stf_id != $incharge_id){

  ?>
   <?php echo form_open('teacher_controller/marks_stored',$attribute); ?>
  <div class="col-lg-12 ">
  <div class="col-lg-10 col-lg-offset-2">
  <center>
<div class="col-lg-2">
   <label>Class</label>
<select name="class_id" class="slct_main col-lg-12" id="std_classs" onchange="stu_class(this.value);">
<option>Select</option>
<?php foreach($class_data['class'] as $key){   ?>

<option <?php if($name3['class_id'] == $key['class_name']){ echo $selected; } ?> value="<?Php echo $key['class_name'];  ?>"><?Php echo $key['class_name'];  ?></option>
<?php } ?>
</select>
</div>

       <div class="col-lg-2">
      <label>Section</label>
  <select name="class_section" class="slct_main col-lg-12" id="tabbb_section" onchange="student_section(this.value);">

<option value="<?php echo  $name3['class_section'];   ?>"><?php echo $name3['class_section'];   ?></option>
</select>
</div>
 <div class="col-lg-2">
  <label>Subject</label>
 <select class="slct_main col-lg-12" id="tabbb1" name="subject" onchange="student_sub(this.value);">

    <option value="<?php echo  $name3['subject'];   ?>"><?php echo  $name3['subject'];   ?></option>
    </select>
   </div>
   <div class="col-lg-2">
      <label>ExamType</label>
  <select class="slct_main col-lg-12" name="exam_type" id="tabbb23" onchange="student_exam_type(this.value);">
  <option value="<?php echo  $name3['exam_type'];   ?>"><?php echo  $name3['exam_type'];   ?></option>
                 
     </select>
     </div>

        <div class="col-lg-2">
      <label>ExamDate</label>
     <select  name="exam_date" id="tabbb231" class="slct_main col-lg-12" onchange="examdate(this.value);">
      <option value="<?php echo  $name3['exam_date'];   ?>"><?php echo  $name3['exam_date'];   ?>
     </select>
     </div>

  <div class="col-lg-2">
     
     <input type="hidden" name="exam_id" value="<?Php echo $name3['exam_id'];  ?>" id="exam_id_sec">
     <input type="submit" name="submit" id="submitty">
     </div>
     </div>
     </center>
   </div>
     </div>
  <?php   echo form_close();  break; ?>

<?php } } ?>
<!-- end -->




<!-- condition for null value authority and not incharge start-->
    <?php foreach ($exp['marks'] as $key => $value2) {
     if($value == '' && $stf_id != $incharge_id){  ?> 
     <style type="text/css">
       #tabbb
       {
        display: none;
       }
       #err_msg
       {
        color: red;
        margin-left: 500px;
       }
     </style>
      <h2 id="err_msg"><?php echo "you are not authorised !"; } }?></h2>
<!-- condition for null value authority and not incharge end-->






<div class="col-lg-8 col-lg-offset-3 table-responsive" id="tabbb">
    <table class="table table-bordered" >
<tr>
  <th>STUDENT</th>
  <th>MARKS OBTAINED</th>
  </tr>
<?php
foreach ($name4['result_std'] as $key => $value222) {
 ?><tr><td>
 <?php echo form_open('teacher_controller/fetchname');
  print_r($value222['std_fname']); ?></td>
<td>

<input type="hidden" name="std_id"  id="std_id<?Php echo $value222['std_id']; ?>"  value="<?Php echo $value222['std_id']; ?>">
<input type="hidden" name="nameid[]" value="<?php print_r($value222['std_id']); ?>"  >
  
<input type="text" name="marks_obtain" <?php   foreach ($name1 as $key => $value99) {
 if($value99[0]['std_id']==$value222['std_id'])
 { ?> value="<?php echo $value99[0]['marks_obtain'];  ?>" <?php } } ?> id="std_std<?Php echo $value222['std_id']; ?>"  class="marks_obtained"  onblur="marks_obtained<?Php echo $value222['std_id']; ?>(this.value);" <?php foreach ($exp['marks'] as $key => $value) { if($stf_id != $incharge_id && $value == '1'){ ?> readonly <?php }} ?> ></td>
 </tr>

<!-- disable marks update for not incharge or not 2 start -->

  <?php
    $sess_sec = $this->session->userdata('sec');
    $sess_cls = $this->session->userdata('cls');
foreach ($exp['marks'] as $key => $value3) {
  if($value3 == 1 && $value3 !=2 && $class_data1 != $sess_cls && $section_data1 != $sess_sec){ ?>
<script type="text/javascript">
  document.getElementById("std_std<?Php echo $value222['std_id']; ?>").disabled = true;
</script>
<?php }
}?>
<!-- disable marks update for not incharge or not 2 end -->

<!-- disable marks update for not incharge  1 start -->

<?php
    $sess_sec = $this->session->userdata('sec');
    $sess_cls = $this->session->userdata('cls');
foreach ($exp['marks'] as $key => $value4) {
  if($value4 == 1 && $value4 !=2 && $incharge_id != $stf_id){ ?>
<script type="text/javascript">

  document.getElementById("std_std<?Php echo $value222['std_id']; ?>").disabled = true;
</script>
<?php }
}?>
<!-- disable marks update for not incharge  1 end -->


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
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_marks_insert/"+value+"/"+sstd_id+"/"+std_classs+"/"+tabbb_section+"/"+std_sub+"/"+xam_typ+"/"+xam_date+"/"+exam_id_sec+"/",  
    data    : {'marks_obtain':value,'class_id':std_classs,'class_section':tabbb_section,'subject':std_sub,'exam_type':xam_typ,'batch':xam_date,'exam_id':exam_id_sec,'std_id':sstd_id},
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
</div>
 <center><div id="loading"></div></center>
</div>

</div>

<script type="text/javascript">
function student_section(value)
{
var classs=document.getElementById('std_classs').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_record/"+value+"/"+classs+"/",  
    data    : {'secc':value,'clss':classs},
    success : function(data)
    {
       $("#tabbb").html(data);
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
<script type="text/javascript">
function student_sub(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_record_exam_type/"+value+"/"+classs+"/"+Section+"/",  
    data    : {'sub':value,'clss':classs,'secc':Section},
    success : function(data){
       
        $("#tabbb23").html(data);
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
<script type="text/javascript">
function student_exam_type(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
var sub=document.getElementById('tabbb1').value;
var xam=document.getElementById('tabbb23').value;
$.ajax({  
       type    : "POST",
       url     : "<?php echo base_url();?>index.php/teacher_controller/class_record_exam_date/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/",  
        data    : {'sub':value,'clss':classs,'secc':Section,'sub':sub,'xam':xam},
        success : function(data){
       
        $("#tabbb231").html(data);
        if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
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
<script type="text/javascript">
function examdate(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
var sub=document.getElementById('tabbb1').value;
var xam=document.getElementById('tabbb23').value;
var dat=document.getElementById('tabbb231').value;

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_record_exam_id/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/"+dat+"/",  
    data    : {'sub':value,'clss':classs,'secc':Section,'sub':sub,'xam':xam,'dat':dat},
    success : function(data){
       document.getElementById("exam_id_sec").value=data;
       if(data){
    // alert(data);
$('form').find('input[type="submit"]').trigger('click');
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

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_record/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/"+dat+"/",  
    data    : {'xam_date':value,'clss':classs,'secc':Section,'sub':sub,'xam':xam,'dat':dat
  },
    success : function(data){

   
  }
  });
}   
</script>
