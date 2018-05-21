<?php
foreach ($pro_stf as $key) {
 echo $id = $key['stf_id'];
}

?>

<!DOCTYPE html>
<div class="container adjust" id="page-wrapper">
 <div class="col-lg-12 techr_back_img">

<?php echo form_open_multipart('teacher_controller/stf_pro_img_update/'.$id);?>
      <div class="col-lg-2 col-lg-offset-5 techr_user_img">
         <img src="<?php echo base_url();?>application/assets/uploads/<?php echo $key['stf_image'];?>" id="stf_pic">
        <input id="pic" type="file" name="stf_image" onchange="this.form.submit();" >
      </div>

      <div class="col-lg-12 techr_back_up_text">
         <h1><?php echo $key['stf_fname']." ".$key['stf_lname'];?></h1>
         
          <h2  class="t_specalty"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i>     Comilla,Bangladesh</h2>
      </div>
      <?php echo form_close();?>
   </div>

<div class="col-lg-12 techr_all_dtl">
  <div class="col-lg-12 per_dtl">
  <?php echo form_open('teacher_controller/stf_data/'.$id);?>
     <div class="col-lg-8">
      <h3 class=" col-lg-8">Personal Detail</h3>
     </div>
     <div class="col-lg-4">
      <button type="button" class="pull-right btn btn-warning" id="toggle_button">Edit</button>
      <button type="submit" class="pull-right btn btn-warning" id="save" style="display: none;">save</button>
     </div>

  </div>
 
    

    <div class="col-lg-12">
      <div class="col-lg-6 pad_lft">
          <div class="col-lg-1 font_color_pad">
            <i class="fa fa-address-book" aria-hidden="true"></i>
          </div>



       <div class="col-lg-3 font_color_pad">
           <h4> Name: </h4>
       </div>
       <div class="col-lg-8">
    
        <input  value="<?php echo $key['stf_fname']."".$key['stf_lname'];?>"  disabled>
       </div>
      </div>

      <div class="col-lg-6 pad_lft">
           <div class="col-lg-1 font_color_pad">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
          </div>
       <div class="col-lg-3 font_color_pad">
          <h4> Email: </h4>
       </div>
       <div class="col-lg-8">
     <input value="<?php echo $key['stf_email'];?>" name="stf_email" disabled>
       </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6 pad_lft">
          <div class="col-lg-1 font_color_pad">
            <i class="fa fa-phone" aria-hidden="true"></i>
          </div>
       <div class="col-lg-3 font_color_pad">
           <h4> Phone: </h4>
       </div>
       <div class="col-lg-8">
      <input value="<?php echo $key['stf_mobile'];?>" name="stf_mobile" id='myInputId1' disabled >
       </div>
      </div>

      <div class="col-lg-6 pad_lft">
          <div class="col-lg-1 font_color_pad">
            <i class="fa fa-address-card-o" aria-hidden="true"></i>
          </div>
       <div class="col-lg-3 font_color_pad">
          <h4> Addres: </h4>
       </div>
       <div class="col-lg-8">
     <input value="<?php echo $key['stf_address'];?>" name="stf_address" id='myInputId2' disabled>
       </div>
      </div>
    </div>


    <div class="col-lg-12">
      <div class="col-lg-6 pad_lft">
          <div class="col-lg-1 font_color_pad">
            <i class="fa fa-user-o" aria-hidden="true"></i>
          </div>
       <div class="col-lg-3 font_color_pad">
           <h4> Gender </h4>
       </div>
       <div class="col-lg-8">
     <input value="<?php echo $key['stf_gender'];?>" name="stf_gender" disabled>
       </div>
      </div>

      <div class="col-lg-6 pad_lft">
          <div class="col-lg-1 font_color_pad">
            <i class="fa fa-male" aria-hidden="true"></i>
          </div>
       <div class="col-lg-3 font_color_pad">
          <h4> Staff Role </h4>
       </div>
       <div class="col-lg-8">
     <input value="<?php echo $key['stf_role'];?>" name="stf_role" disabled>
       </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6 pad_lft">
          <div class="col-lg-1 font_color_pad">
           <i class="fa fa-user-circle" aria-hidden="true"></i>
          </div>
       <div class="col-lg-3 font_color_pad">
           <h4> D.O.B </h4>
       </div>
       <div class="col-lg-8">
      <input value="<?php echo $key['stf_dob'];?>" name="stf_dob" disabled>
       </div>
      </div>

      <div class="col-lg-6 pad_lft">
          <div class="col-lg-1 font_color_pad">
           <i class="fa fa-user-secret" aria-hidden="true"></i>
          </div>
       <div class="col-lg-3 font_color_pad">
          <h4> Qualification: </h4>
       </div>
       <div class="col-lg-8">
     <input value="<?php echo $key['stf_qualification'];?>" name="stf_qualification" disabled>
       </div>
      </div>
    </div>
  </div>
<?php echo form_close();?>



   <!-- authority Start of Teacher -->
  <div class="col-lg-10 col-lg-offset-2 techr_all_authoty autho2 tch_auth">


    <div class="col-lg-12 per_dtl">
     <div class="col-lg-6">
      <h3 >Authority</h3>
     </div>
     <div class="col-lg-6">
     <div class="col-lg-4"><h3>Read</h3></div>
     <div class="col-lg-4"><h3>Write</h3></div>
     <div class="col-lg-4"><h3>Delete</h3></div>
     </div>
  </div>
   <?php 
   $this->session->set_userdata('data_auth',$data_stf);
   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1) {
   
    $exp[$key1]=explode(',', $data_stf[0][$key1]);
     }  
       }
   ?>
    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Notes</h4></div> 
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" <?php foreach ($exp['notes'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>  value="1" name="notes[]"></label></div>



      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio"  <?php foreach ($exp['notes'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?> type="checkbox"  value="2" name="notes[]"></label></div>



      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio"  <?php foreach ($exp['notes'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> type="checkbox"  value="3" name="notes[]"></label></div>
    </div>

   
    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Assignment</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" <?php foreach ($exp['assignment'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?> type="checkbox" value="1" name="assignment[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox"  <?php foreach ($exp['assignment'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>  value="2" name="assignment[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox"  <?php foreach ($exp['assignment'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>  value="3" name="assignment[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Attendance</h4></div>
      <div class="col-lg-2" <?php foreach ($exp['attendance'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="attendance[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="attendance[]" <?php foreach ($exp['attendance'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" <?php foreach ($exp['attendance'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> type="checkbox" value="3" name="attendance[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Subject</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" <?php foreach ($exp['subject'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?> type="checkbox" value="1" name="subject[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" <?php foreach ($exp['subject'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?> type="checkbox" value="2" name="subject[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" <?php foreach ($exp['subject'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> type="checkbox" value="3" name="subject[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Add Class</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" <?php foreach ($exp['add_class'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?> type="checkbox" value="1" name="add_class[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio"  <?php foreach ($exp['add_class'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>  type="checkbox" value="2" name="add_class[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3"  <?php foreach ($exp['add_class'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> name="add_class[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Class Incharge</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="class_incharge[]"  <?php foreach ($exp['class_incharge'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="class_incharge[]"  <?php foreach ($exp['class_incharge'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="class_incharge[]"  <?php foreach ($exp['class_incharge'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Marks</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>
     <div class="col-lg-12">
      <div class="col-lg-6"><h4>Assign Sub Class</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="assign_sub_class[]" <?php foreach ($exp['assign_sub_class'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="assign_sub_class[]" <?php foreach ($exp['assign_sub_class'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="assign_sub_class[]" <?php foreach ($exp['assign_sub_class'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Assign Sec Roll No</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="assign_sec_roll_no[]" <?php foreach ($exp['assign_sec_roll_no'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="assign_sec_roll_no[]" <?php foreach ($exp['assign_sec_roll_no'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="assign_sec_roll_no[]" <?php foreach ($exp['assign_sec_roll_no'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Exam</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="exam[]" <?php foreach ($exp['exam'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="exam[]" <?php foreach ($exp['exam'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="exam[]" <?php foreach ($exp['exam'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Time Table</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="time_table[]" <?php foreach ($exp['time_table'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="time_table[]" <?php foreach ($exp['time_table'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="time_table[]" <?php foreach ($exp['time_table'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Notice</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="notice[]" <?php foreach ($exp['notice'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="notice[]" <?php foreach ($exp['notice'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="notice[]" <?php foreach ($exp['notice'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Event</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="event[]" <?php foreach ($exp['event'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="event[]" <?php foreach ($exp['event'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="event[]" <?php foreach ($exp['event'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>  <div class="col-lg-12">
      <div class="col-lg-6"><h4>Marks</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Student</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="stu_admission[]" <?php foreach ($exp['student'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="stu_admission[]" <?php foreach ($exp['student'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="stu_admission[]" <?php foreach ($exp['student'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>
    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Staff</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="stf_reg[]" <?php foreach ($exp['staff'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="stf_reg[]" <?php foreach ($exp['staff'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="stf_reg[]" <?php foreach ($exp['staff'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div><div class="col-lg-12">
      <div class="col-lg-6"><h4>Fees</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="fees[]" <?php foreach ($exp['fees'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="fees[]" <?php foreach ($exp['fees'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="fees[]" <?php foreach ($exp['fees'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div><div class="col-lg-12">
      <div class="col-lg-6"><h4>Leave Detail</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="leave_detail[]" <?php foreach ($exp['leave_detail'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="leave_detail[]" <?php foreach ($exp['leave_detail'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="leave_detail[]" <?php foreach ($exp['leave_detail'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div><div class="col-lg-12">
      <div class="col-lg-6"><h4>Sailary</h4></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o read_auth"><input class="chk_rdio" type="checkbox" value="1" name="sailary[]" <?php foreach ($exp['sailary'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o write_auth"><input class="chk_rdio" type="checkbox" value="2" name="sailary[]" <?php foreach ($exp['sailary'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-check-square-o del_auth"><input class="chk_rdio" type="checkbox" value="3" name="sailary[]" <?php foreach ($exp['sailary'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>
  </div>

   <!-- authority End of Teacher -->

   <div class="col-lg-12 techr_all_authoty">
  	<h3 class="all_marg">Assigne Class</h3>
  	<hr>
    
    <table class="table table-bordered">
     <thead>
     	<tr>
     		<th>Class</th>
     		<th>Maths</th>
     		<th>English</th>
     		<th>Hindi</th>
     		<th>History</th>
     		<th>Science</th>
     	</tr>
     </thead>

     <tbody>
     	<tr>
     		<td>1</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>2</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>3</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>4</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>5</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>6</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>7</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>8</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>9</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>10</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     </tbody>

    </table>

    <table class="table table-bordered">
    	
     <thead>
     	<tr>
     		<th>Class</th>
     		<th>Maths</th>
     		<th>English</th>
     		<th>Hindi</th>
     		<th>History</th>
     		<th>Science</th>
     		<th>Bio</th>
     		<th>Physical</th>
     	</tr>
     </thead>

     <tbody>
     	<tr>
     		<td>11</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     	<tr>
     		<td>12</td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     		<td><input type="checkbox" name=""></td>
     	</tr>
     </tbody>
    	
    </table>
  	

  </div>
</div>



</body>
</html>

<script type="text/javascript">
  $('input[type=radio]').click(function(){
if($(this).is(':checked')){
    $(this).parent().css("background","#03aceb");
}
});
</script>

<!-- <script type="text/javascript">
  $('input[type=radio]').click(function() {     
  var checked = $(this).attr('checked', true);
  if(checked){ 
    $(this).attr('checked', false);
     $(this).parent().css("background","#03aceb");
  }
  
});

 $('input[type=radio]').click(function() {     
  var checked = $(this).attr('checked', false);
  if(checked){ 
   $(this).attr('checked', true);
     $(this).parent().css("background","black");
  }
  
});

</script> -->

<style type="text/css">
  h3, h4, h5, h6
  {
    margin-top: 10px !important;
    margin-bottom: 10px !important;
  }
 
</style>

