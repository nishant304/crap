<div id="page-wrapper" class="wrapera">
 <center>
 <button type="button"  class="btn btn-default add_form_btnnn" id="btn1">Inbox</button>
<button type="button"  class="btn btn-default add_form_btnnn" id="btn2"  >Create Message</button>
</center>

<div class="container atnd_slc tp_marg add_form_div3">
<center><h1 class="std_log">SMS</h1></center>

<!-- student show sms start -->
<?php echo form_open('parent_controller/chat_with_parent');
$std_array=$this->session->userdata('std_array');
?>

 
<!-- student show sms end -->
<div class="col-lg-9 col-lg-offset-2" >
 <div class="col-lg-6 sent_info">
    <label class="col-lg-12 pading_o">Select Your Child</label>
<select class="form-control" name="student" onchange="abc(this.value);">
<option>Select</option>
<?php for($io=0;$io<count($std_array['id']);$io++){   ?>
<option value="<?php echo $std_array['id'][$io]  ;?>/<?php echo $std_array['class'][$io]  ;?>/<?php echo $std_array['section'][$io]  ;?>"><?php echo $std_array['name'][$io];   ?></option>
<?php } ?>
</select>
 </div>
 </div>

<div class="col-lg-9 col-lg-offset-2">
 <div class="col-lg-6 sent_info">
    <label class="col-lg-12 pading_o">Subject</label>
<select class="form-control" name="subject_teacher"  id="tabbb1">
<option>Select</option>
</select>
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

<div class="container atnd_slc tp_marg add_form_div4 table_responsive">
..........

 <div class="col-lg-12 ">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" class="mail_ref_tb">unRead</a></li>
    <li><a data-toggle="tab" href="#menu1" class="mail_ref_tb">Read</a></li>
   </ul>

  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
         
  <?Php   $parent_msg=$this->session->userdata('parent_msg'); 
foreach ($parent_msg as $key) { ?>
       <a href="#" data-toggle="modal" onclick="msg_read<?php echo  $key['msg_id'];   ?>();" data-target="#myModal213<?php echo  $key['msg_id'];   ?>">
       <div class="col-lg-12 mail_mrgins_tp ">
    <input type="hidden" id="msg_read<?php echo  $key['msg_id'];   ?>" value="<?php echo  $key['msg_id'];   ?>">
             <?php echo  $key['subject'];   ?>

             <?php echo  $key['msg_created'];   ?>

        
       </div>
     </a>
       
     <?php } ?>   
  

    </div>


    <div id="menu1" class="tab-pane fade">
      <?Php   $parent_msg=$this->session->userdata('parent_msg'); 
foreach ($parent_msg as $key) { ?>
       <a href="#" data-toggle="modal" onclick="msg_read<?php echo  $key['msg_id'];   ?>();" data-target="#myModal213<?php echo  $key['msg_id'];   ?>">
       <div class="col-lg-12 mail_mrgins_tp ">
    <input type="hidden" id="msg_read<?php echo  $key['msg_id'];   ?>" value="<?php echo  $key['msg_id'];   ?>">
             <?php echo  $key['subject'];   ?>

             <?php echo  $key['msg_created'];   ?>

        
       </div>
     </a>
       
     <?php } ?>
    </div>


      </div>
   </div>


<script type="text/javascript">
function abc(value)
{
var fields = value.split('/');
var id = fields[0];
var classs = fields[1];
var section = fields[2];
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/parent_controller/class_section_sub_teacher/"+id+"/"+classs+"/"+section+"/",  
    data    : {'id':id,'classs':classs,'section':section},
    success : function(data){
        $("#tabbb1").html(data);
       
}
 });
}  
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
  .wrapera
  {
    margin-top: 10px !important;
  }
  .add_form_div4
  {
       margin-left: 133px;

  }
  .add_form_div3
  {
      display: none;
       
  }
</style>
<script type="text/javascript">
 $('button').click(function(){    
  if(this.id == 'btn1'){
    $('.add_form_div3').hide();
    $('.add_form_div4').show();
  }else{
    $('.add_form_div3').show();
    $('.add_form_div4').hide();
    
  }
});
</script>

 <?Php   $parent_msg=$this->session->userdata('parent_msg'); 
foreach ($parent_msg as $key) { ?>
<div id="myModal213<?php echo  $key['msg_id'];   ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p><?php echo  $key['message'];   ?></p>
      </div>
      <div class="modal-footer">
      <?php echo  $key['msg_created'];   ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php }  ?>



 <?Php   $parent_msg=$this->session->userdata('parent_msg'); 
foreach ($parent_msg as $key) { ?>
<div id="myModal213<?php echo  $key['msg_id'];   ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p><?php echo  $key['message'];   ?></p>
      </div>
      <div class="modal-footer">
      <?php echo  $key['msg_created'];   ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?Php  }  ?>