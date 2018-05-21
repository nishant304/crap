<?php 

echo form_open('admission/test_marks_stored');
$name1 = $this->session->userdata('markss_test');
$name2 = $this->session->userdata('fet_name');
$name3 = $this->session->userdata('test_makks');
$name4 = $this->session->userdata('all_student');
$name5 = $this->session->userdata('max_mark');
$name6 = $this->session->userdata('description');
$selected="selected";
?>
<div id="page-wrapper">
<div class="container atnd_slc tp_marg">
<center><h1 class="std_log">Test Marks</h1></center>
  <div class="col-lg-12 ">
  <div class="col-lg-10 col-lg-offset-2">
  <center>
<div class="col-lg-2">
   <label>Class</label>
<select name="class_id" class="slct_main col-lg-12" id="std_classs" onchange="stu_class(this.value);">
<option>Select</option>
	<?php foreach($class_data['class'] as $key){   ?>
<option <?php if($name3['class_id']==$key['class_name']){ echo $selected;   }     ?>   value="<?Php echo $key['class_name'];  ?>"><?Php echo $key['class_name'];  ?></option>
	<?php } ?>
</select>
</div>
<div class="col-lg-2">
<label>Section</label>
<select name="class_section" class="slct_main col-lg-12" id="tabbb_section" onchange="student_section1(this.value);">
<option value="<?php echo  $name3['class_section'];   ?>"><?php echo  $name3['class_section'];   ?></option>
</select>
</div>
<div class="col-lg-2">
<label>Subject</label>
<select class="slct_main col-lg-12" id="tabbb1" name="subject" onchange="student_sub1(this.value);">
<option value="<?php echo  $name3['subject'];   ?>"><?php echo  $name3['subject'];   ?></option>
</select>
</div>
<div class="col-lg-2">
<label>TestType</label>
<select class="slct_main col-lg-12" name="test_type" id="tabbb23" onchange="student_exam_type1(this.value);">
<option value="<?php echo  $name3['test_type'];   ?>"><?php echo  $name3['test_type'];   ?></option>
</select>
</div>
<div class="col-lg-2">
      <label>TestDate</label>
     <select  name="test_date" id="tabbb231" class="slct_main col-lg-12" onchange="examdate1(this.value);">
      <option value="<?php echo  $name3['test_date'];   ?>"><?php echo  $name3['test_date'];   ?></option>
     </select>
     </div>
<div class="col-lg-2">
<input type="hidden" name="test_id" value="<?Php echo  $name3['test_id'];  ?>" id="exam_id_sec">
<input type="hidden" name="max_mark" value="<?Php echo  $name5;   ?>" id="max_mark">
<input type="hidden" name="description" value="<?Php echo $name6;   ?>" id="description">
<input type="submit" name="submit" id="submitty">
     </div>
     </div>
	   </div>
     <!-- </center> -->
    
<div class="col-lg-8 col-lg-offset-2 table-responsive tabl_adjust" id="tabbb">
    <table class="table table-bordered" >

<tr>
  <th>ROLL No.</th>
  <th>STUDENT</th>
  <th>MARKS OBTAINED(Out Of <?Php echo  $name5;   ?>)</th>
  </tr>
<?php echo form_close();  
echo form_open('admission/fetchname'); 
foreach ($name4['result_std'] as $key => $value222) {
 ?><tr><td><?php echo $value222['std_roll_no']; ?></td>
 <td><?php echo $value222['std_fname']; ?></td>
<td>
<input type="hidden" name="std_id"  id="std_id<?Php echo $value222['std_id']; ?>"  value="<?Php echo $value222['std_id']; ?>">
<input type="hidden" name="nameid[]" value="<?php print_r($value222['std_id']); ?>"  >
  
<input type="number" name="marks_obtain" <?php   foreach ($name1 as $key => $value99) {
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
var description=document.getElementById("description").value;
var fields = xam_date.split('-');
var month = fields[1];
var fieldy = xam_date.split('-');
var year = fieldy[0];


$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_marks_test_insert/"+value+"/"+sstd_id+"/"+std_classs+"/"+tabbb_section+"/"+std_sub+"/"+xam_typ+"/"+xam_date+"/"+exam_id_sec+"/"+max_mark+"/"+description+"/"+month+"/"+year+"/",  
    data    : {'marks_obtain':value,'class_id':std_classs,'class_section':tabbb_section,'subject':std_sub,'exam_type':xam_typ,'batch':xam_date,'exam_id':exam_id_sec,'std_id':sstd_id,'max_mark':max_mark,'description':description,'month':month,'year':year},
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
 </div>

 <center><div id="loading"></div></center>
</div>

<script type="text/javascript">
function student_section1(value)
{
var classs=document.getElementById('std_classs').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_test/"+value+"/"+classs+"/",  
    data    : {'secc':value,'clss':classs},
    success : function(data)
    {
       $("#tabbb").html(data);
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

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_sub/"+value+"/"+classs+"/",  
    data    : {'section':value,'classs':classs},
    success : function(data){
       
        $("#tabbb1").html(data);
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
function student_sub1(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_test_type/"+value+"/"+classs+"/"+Section+"/",  
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
function student_exam_type1(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
var sub=document.getElementById('tabbb1').value;
var xam=document.getElementById('tabbb23').value;
$.ajax({  
       type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/class_record_test_date/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/",  
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
function examdate1(value)
{
  
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
var sub=document.getElementById('tabbb1').value;
var xam=document.getElementById('tabbb23').value;
var dat=document.getElementById('tabbb231').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_test_id/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/"+dat+"/",  
    data    : {'sub':value,'clss':classs,'secc':Section,'sub':sub,'xam':xam,'dat':dat},
    success : function(data){
       document.getElementById("exam_id_sec").value=data;
       if(data){
    
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
    url     : "<?php echo base_url();?>index.php/admission/class_record_test/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/"+dat+"/",  
    data    : {'xam_date':value,'clss':classs,'secc':Section,'sub':sub,'xam':xam,'dat':dat
  },
    success : function(data){
   
  }
  });
}   
</script>
