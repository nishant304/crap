<?php
      $data_stf = $this->session->flashdata('stf_data');
      $data_name = $this->session->flashdata('stf_name');
      foreach ($data_name as $key => $value)
       {
       $stf_name= $value['stf_fname']." ".$value['stf_lname'];
       $stf_id = $value['stf_id'];
       }
 ?>
<?php if($this->session->flashdata('stf_data') == FALSE){ echo form_open('admission/assign_authority');} else { echo form_open('admission/authority_change/'.$stf_id);} ?>
<div id="page-wrapper">
  <div class="form-group col-lg-5 col-lg-offset-3" >
         <div class="col-lg-12 pading_o">
       <label class="col-lg-4 control-label">Staff Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
                  <select name="selected_staff[]" id="selected_staff" class="form-control" onchange="stf_auth(this.value);" required>
                    <option  value="<?php echo $stf_id; ?>"><?php if(isset($stf_name)){ echo $stf_name;} else{ ?>Select </option><?php } ?>
                    <?php foreach ($teacher as $key) {
                      
                     ?>
                    <option  value="<?php echo $key['stf_id']; ?>"><?php echo $key['stf_fname']." ".$key['stf_lname']; } ?>  </option>
                  </select>

               </div>
         </div>
    </div>


  <div class="col-lg-12 techr_all_authoty autho2">


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

   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1) {
   
$exp[$key1]=explode(',', $data_stf[0][$key1]);
     }  
       }
   ?>
    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Notes</h4></div> 
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" <?php foreach ($exp['notes'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>  value="1" name="notes[]"></label></div>



      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio"  <?php foreach ($exp['notes'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?> type="checkbox"  value="2" name="notes[]"></label></div>



      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio"  <?php foreach ($exp['notes'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> type="checkbox"  value="3" name="notes[]"></label></div>
    </div>

   
    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Assignment</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" <?php foreach ($exp['assignment'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?> type="checkbox" value="1" name="assignment[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox"  <?php foreach ($exp['assignment'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>  value="2" name="assignment[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox"  <?php foreach ($exp['assignment'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>  value="3" name="assignment[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Attendance</h4></div>
      <div class="col-lg-2" <?php foreach ($exp['attendance'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="attendance[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="attendance[]" <?php foreach ($exp['attendance'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" <?php foreach ($exp['attendance'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> type="checkbox" value="3" name="attendance[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Subject</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" <?php foreach ($exp['subject'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?> type="checkbox" value="1" name="subject[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" <?php foreach ($exp['subject'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?> type="checkbox" value="2" name="subject[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" <?php foreach ($exp['subject'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> type="checkbox" value="3" name="subject[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Add Class</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" <?php foreach ($exp['add_class'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?> type="checkbox" value="1" name="add_class[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio"  <?php foreach ($exp['add_class'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>  type="checkbox" value="2" name="add_class[]"></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3"  <?php foreach ($exp['add_class'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?> name="add_class[]"></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Class Incharge</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="class_incharge[]"  <?php foreach ($exp['class_incharge'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="class_incharge[]"  <?php foreach ($exp['class_incharge'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="class_incharge[]"  <?php foreach ($exp['class_incharge'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>

    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Marks</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>
     <div class="col-lg-12">
      <div class="col-lg-6"><h4>Assign Sub Class</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="assign_sub_class[]" <?php foreach ($exp['assign_sub_class'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="assign_sub_class[]" <?php foreach ($exp['assign_sub_class'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="assign_sub_class[]" <?php foreach ($exp['assign_sub_class'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Assign Sec Roll No</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="assign_sec_roll_no[]" <?php foreach ($exp['assign_sec_roll_no'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="assign_sec_roll_no[]" <?php foreach ($exp['assign_sec_roll_no'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="assign_sec_roll_no[]" <?php foreach ($exp['assign_sec_roll_no'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Exam</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="exam[]" <?php foreach ($exp['exam'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="exam[]" <?php foreach ($exp['exam'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="exam[]" <?php foreach ($exp['exam'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Time Table</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="time_table[]" <?php foreach ($exp['time_table'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="time_table[]" <?php foreach ($exp['time_table'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="time_table[]" <?php foreach ($exp['time_table'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Notice</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="notice[]" <?php foreach ($exp['notice'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="notice[]" <?php foreach ($exp['notice'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="notice[]" <?php foreach ($exp['notice'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Event</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="event[]" <?php foreach ($exp['event'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="event[]" <?php foreach ($exp['event'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="event[]" <?php foreach ($exp['event'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Student Detail</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="stu_detail[]" <?php foreach ($exp['stu_detail'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="stu_detail[]" <?php foreach ($exp['stu_detail'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="stu_detail[]" <?php foreach ($exp['stu_detail'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Marks</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="marks[]" <?php foreach ($exp['marks'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>staff Detail</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="stf_detail[]" <?php foreach ($exp['stf_detail'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="stf_detail[]" <?php foreach ($exp['stf_detail'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="stf_detail[]" <?php foreach ($exp['stf_detail'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div> <div class="col-lg-12">
      <div class="col-lg-6"><h4>Student Admission</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="stu_admission[]" <?php foreach ($exp['stu_admission'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="stu_admission[]" <?php foreach ($exp['stu_admission'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="stu_admission[]" <?php foreach ($exp['stu_admission'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>
    <div class="col-lg-12">
      <div class="col-lg-6"><h4>Staff Registration</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="stf_reg[]" <?php foreach ($exp['stf_reg'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="stf_reg[]" <?php foreach ($exp['stf_reg'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="stf_reg[]" <?php foreach ($exp['stf_reg'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div><div class="col-lg-12">
      <div class="col-lg-6"><h4>Fees</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="fees[]" <?php foreach ($exp['fees'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="fees[]" <?php foreach ($exp['fees'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="fees[]" <?php foreach ($exp['fees'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div><div class="col-lg-12">
      <div class="col-lg-6"><h4>Leave Detail</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="leave_detail[]" <?php foreach ($exp['leave_detail'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="leave_detail[]" <?php foreach ($exp['leave_detail'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="leave_detail[]" <?php foreach ($exp['leave_detail'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div><div class="col-lg-12">
      <div class="col-lg-6"><h4>Sailary</h4></div>
      <div class="col-lg-2"><label class="fa fa-times read_auth"><input class="chk_rdio" type="checkbox" value="1" name="sailary[]" <?php foreach ($exp['sailary'] as $key => $value) {
       if($value=='1'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times write_auth"><input class="chk_rdio" type="checkbox" value="2" name="sailary[]" <?php foreach ($exp['sailary'] as $key => $value) {
       if($value=='2'){     ?> checked <?php  }

      }   ?>></label></div>
      <div class="col-lg-2"><label class="fa fa-times del_auth"><input class="chk_rdio" type="checkbox" value="3" name="sailary[]" <?php foreach ($exp['sailary'] as $key => $value) {
       if($value=='3'){     ?> checked <?php  }

      }   ?>></label></div>
    </div>
    <div class="col-lg-12 ">
      <center><input class="btn btn-info  asign_sub" type="submit" value="Assign" name="assign_role"></center>
    </div>
  </div>
</div>

  <?php echo form_close(); ?>



  <script type="text/javascript">
  function stf_auth(value)
  {
    // alert(value);
     $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/admission/authority_stf/"+value+"/",
      data    :  {'stf_id':value},
      success : function(data)
      {
         location.reload();
      }
    })
  }

  </script>

  <script type="text/javascript">
    $('.chk_rdio').change(function() {
     
    if(this.checked) {
        $(this).closest( "label" ).addClass("fa-check");
        $(this).closest( "label" ).removeClass("fa-times");
    }
    else
    {
          $(this).closest( "label" ).removeClass("fa-check");
           $(this).closest( "label" ).addClass("fa-times");
    }
});


$.each($(".chk_rdio"), function(){
 
    if($(this).prop("checked") == true){
      $(this).closest( "label" ).addClass("fa-check");
        $(this).closest( "label" ).removeClass("fa-times");
    }
    else{
     $(this).closest( "label" ).removeClass("fa-check");
           $(this).closest( "label" ).addClass("fa-times");
    }

});

  </script>