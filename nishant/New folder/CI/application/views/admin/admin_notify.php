<div id="page-wrapper">


  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1" class="combi_inee_dlts">Send to all</a></li>
    <li><a data-toggle="tab" href="#home" class="combi_inee_dlts" >send to particular</a></li>
     </ul>
<div class="tab-content">

 <div id="menu1" class="tab-pane fade in active">

  <h1 class="sms_conts_hdr">SMS Settings</h1>
  <div class="panel panel-default sms_setings_tp">
    <div class="panel-heading sms_conts_agns">Select Automatic Notification Areas</div>
    <div class="panel-body">
    	<div class="col-lg-12 sms_set_ings_margin">
<?php echo form_open('admission/admin_message_send');    ?>
<div class="col-lg-6">
<div class="col-lg-12">
<h3>Select User To Send</h3>
</div>
<div class="form-group">
<label class="one_onss">Parents
<input type="checkbox" name="notify[]" class="rd1" value="parrent_detail">
</label>
<label class="one_onss">Teacher
<input type="checkbox" name="notify[]" class="rd1" value="staff">
</label>
<label class="one_onss">Student
<input type="checkbox" name="notify[]" class="rd1" value="admission">
</label>
<label class="one_onss">All
<input type="checkbox"  id="red-id1" >
</label>
</div>
</div>
<div class="col-lg-6">
<div class='col-lg-12'>
<label>Message Title  </label>
<input type="text" name="message_title" class="form-control">
</div>
<div class='col-lg-12'>
<label>Message Body </label>
<textarea class="form-control sms_setings_tp" rows="10" cols="60" name="message_body"></textarea>
        </div>
<div class="col-lg-12">
 <button type="submit" class="btn btn-primary sms_btns_save_here">Save</button>
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close();    ?>
<div id="home" class="tab-pane fade">
<h1 class="sms_conts_hdr">SMS Settings</h1>
  <div class="panel panel-default ">
    <div class="panel-heading sms_conts_agns">Select Automatic Notification Areas</div>
    <div class="panel-body pading_o">
        <div class="col-lg-12 sms_set_ings_margin pading_o"
        >
<?php echo form_open('admission/admin_message_send_particular');    ?>

<div class="col-lg-5">
<div class="col-lg-12 pading_o">
<label>Message Title  </label>
<input type="text" name="message_title" class="form-control">
</div>
<div class="col-lg-12 pading_o">
<label>Message Body </label>
<textarea class="form-control sms_setings_tp" rows="10" cols="60" name="message_body"></textarea>
        </div>
<div class="col-lg-12">
 <button type="submit" class="btn btn-primary sms_btns_save_here">Save</button>
</div>
</div>

<div class="col-lg-7">
<div class="col-lg-12">
<h3>Select User To Send</h3>
</div>
<div class="form-group">
<label class="one_onss">Parents
<input type="checkbox" name="notify_particular[]" id="rd_parent" class="rd2 rd_parent" value="parrent_detail">
</label>
<label class="one_onss1">Teacher
<input type="checkbox" name="notify_particular[]" id="rd_teacher"  value="staff" class="rd2 rd_teacher">
</label>
<label class="one_onss2">Student
<input type="checkbox" name="notify_particular[]" id="rd_student" class="rd2 rd_student" value="admission">
</label>
</div>
<div class="col-lg-12 pading_o">
<div class="col-lg-4 pading_lft">
<table class="table table-striped" id="parent_detail">


</table>
</div>
<div class="col-lg-4 pading_lft">
<table class="table table-striped" id="stf_detail">
</table>
</div>
<div class="col-lg-4 pading_lft" >
<table class="table table-striped" id="std_detail">
</table>
</div>


</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close();    ?>

<script type="text/javascript">
$(function () {
        $("#red-id1").change(function () {
            $('.rd1').prop('checked', this.checked);
        });
        $(".rd1").change(function () {
            if ($(".rd1").length == $(".rd1:checked").length) {
                $('#selectall').prop('checked', this.checked);
            } else {
                $('#selectall').prop('checked', false);
            }
        });
    });
$(function () {
        $("#red-id2").change(function () {
            $('.rd2').prop('checked', this.checked);
        });
        $(".rd2").change(function () {
            if ($(".rd2").length == $(".rd2:checked").length) {
                $('#selectall').prop('checked', this.checked);
            } else {
                $('#selectall').prop('checked', false);
            }
        });
    });

$(".rd_student").change(function() {
if(this.checked) {

var rd_student=document.getElementById('rd_student').value;

 $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/rd_student/"+rd_student+"/",  
    data    : {'rd_student':rd_student},
success : function(data){

$("#std_detail").html(data);

}
});
    }
    else
    {

   var n=1;

     $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/rd_student/"+n+"/",  
    data    : {'rd_student':n},
success : function(data){

$("#std_detail").html(data);

}
});   
}
});

$(".rd_teacher").change(function() {
if(this.checked) {

var rd_teacher=document.getElementById('rd_teacher').value;

 $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/rd_teacher/"+rd_teacher+"/",  
    data    : {'rd_teacher':rd_teacher},
success : function(data){

$("#stf_detail").html(data);

}
});
    }
    else
    {

   var n=1;

     $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/rd_teacher/"+n+"/",  
    data    : {'rd_teacher':n},
success : function(data){

$("#stf_detail").html(data);

}
});   
}
});


$(".rd_parent").change(function() {
if(this.checked) {

var rd_parent=document.getElementById('rd_parent').value;

 $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/rd_parent/"+rd_parent+"/",  
    data    : {'rd_parent':rd_parent},
success : function(data){

$("#parent_detail").html(data);

}
});
    }
    else
    {

   var n=1;

     $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/rd_parent/"+n+"/",  
    data    : {'rd_parent':n},
success : function(data){

$("#parent_detail").html(data);

}
});   
}
});

</script>

<style type="text/css">
    .pading_lft{
        padding-left: 0px;
    }
     .pading_o{
        padding-left: 0px;
    }
</style>