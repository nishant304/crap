<div id="page-wrapper">

<?php

 foreach ($student_msg as $key) { ?>
             

                <?php } ?>
<h2 class="mail_scl_pro">School Project</h2>
     
      <div class="col-lg-12">
      <!-- modal start here -->
        <div class="col-lg-2">
        <div class="col-lg-12">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-danger mail_btns_modal" data-toggle="modal" data-target="#myModal">Compose Mail</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
         <div class="atnd_slc tp_marg">
<center><h1 class="std_log">SMS</h1></center>
<?php echo form_open('student_controller/chat_with_student');
?>

<div class="col-lg-9 col-lg-offset-2">
 <div class="col-lg-6 sent_info">
    <label class="col-lg-12 pading_o">Subject Teacher</label>
<select class="form-control" name="subject_teacher">
<option>Select</option>
<?php foreach ($sub_class_teacher as $key){ ?>
<option value="<?php echo $key['tch_id']; ?>"><?php echo $key['tch_name']; ?> [<?php echo $key['sub_name'];  ?>] Teacher</option>
<?php } ?>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 

     <p class="mail_pr_bx">Inbox<span class="mail_spn_bx">(<?php echo count($student_msg_unread);   ?>)</span></p>

     <p class="mail_pr_bx">Sent Mails<span class="mail_spn_bx">*</span></p>

       
        </div>
        </div>
 <!-- modal end here -->


    <!-- mail list 8 div start here -->

    <div class="col-lg-10 mail_notific">
      <div class="col-lg-12 ">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" class="mail_ref_tb">unRead</a></li>
    <li><a data-toggle="tab" href="#menu1" class="mail_ref_tb">Read</a></li>
   </ul>

  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
         
     <?Php  foreach ($student_msg_unread as $key) { ?>
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
       <?Php  foreach ($student_msg_read as $key) { ?>
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
  </div>
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
<?php foreach ($student_msg_unread as $key) { ?>
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


<script type="text/javascript">
  
  function msg_read<?php echo  $key['msg_id'];   ?>()
  {
    var msg_read=document.getElementById('msg_read<?php echo  $key['msg_id'];?>').value;
alert(msg_read);
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/student_controller/msg_read/"+msg_read+"/",  
    data    : {'msg_read':msg_read},
    success : function(data){
        // $("#read").html(data);
        if(data){
}
}
 });


  }
</script>




<?php }  ?>

<?php foreach ($student_msg_read as $key) { ?>
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