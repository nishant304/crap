<?php 
$user_listedd=explode(',',$role_autho[0]['transport_allocation']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>





<?php 
$a_id   = $this->uri->segment(3);
$rute_code = $trans_update[0]['rute_code'];
$destination1 = $trans_update[0]['destination'];
$type = $trans_update[0]['type'];
$student_class = $trans_update[0]['student_class'];
$student_section = $trans_update[0]['student_section'];
$passenger_name = $trans_update[0]['passenger_name'];
$designation = $trans_update[0]['designation'];
$start_date = $trans_update[0]['start_date'];
$end_date = $trans_update[0]['end_date'];
$selected = 'selected';

 ?>
<div id="page-wrapper">
     <div class="col-lg-6">
   <div class="container-fluid">
 
  <div class="panel panel-default">
    <div class="panel-heading"><h3>Transport Allocation</h3></div>
    <div class="panel-body">
 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
<?php echo form_open('admission/transport_insert/'.$a_id); ?>
<?php }  ?>
         <div class="col-lg-12 sub_margs_alloc_sltcs  ">
          <label class="empll_labell">Route&nbsp;<span class="alloct_sub_strs ">*</span></label> 
           <select class="form-control" name="rute_code">
              <option>Select</option>
              <?php foreach ($rute as $key => $value) { ?>
              <option <?php if($rute_code == $value['rute_code']){ echo $selected; } ?> value="<?php echo $value['rute_code']; ?>"><?php echo $value['rute_code']; ?></option>
              <?php } ?>
            </select>
          </div> 

         <div class="col-lg-12 sub_margs_alloc_sltcs  ">
          <label class="empll_labell">Destination&nbsp;<span class="alloct_sub_strs ">*</span></label> 
           <select class="form-control" name="destination">
              <option>Select</option>
               <?php  foreach ($destination as $key => $value) { ?>
              <option <?php if($destination1 == $value['pickup_drop']){ echo $selected; } ?> value="<?php echo $value['pickup_drop']; ?>"><?php echo $value['pickup_drop']; ?></option>
              <?php } ?>
            </select>
          </div> 

          <div class="col-lg-12 sub_margs_alloc_sltcs">
          <label class="empll_labell">Type&nbsp;<span class="alloct_sub_strs">*</span></label> 
           <select class="form-control" name="type" id="select_type">
              <option>Select</option>
              <option <?php if($type == 'student'){ echo $selected; } ?> value="student" id="student">Student</option>
              <option <?php if($type == 'staff'){ echo $selected; } ?> value="staff" value="staff">Staff</option>
            </select>
          </div> 

           <div class="col-lg-12 sub_margs_alloc_sltcs studentdiv" style="display: none;">
              <label  class="empll_labell">Class&nbsp;<span class="empll_spn">*</span></label> 
              <select class="form-control empll_input" id="clss_select" name="student_class" onchange="stu_class(this.value);" >
                <option>select</option>
                <?php foreach ($cls_sec['class'] as $key => $value) { ?> 
                <option <?php if($student_class == $value['class_name']){ echo $selected; } ?> ><?php echo $value['class_name']; ?></option>
                <?php } ?>
              </select>
          </div>

           <div class="col-lg-12 sub_margs_alloc_sltcs studentdiv" style="display: none;">
              <label  class="empll_labell">Section&nbsp;<span class="empll_spn">*</span></label> 
              <select id="tabbb_section" class="form-control" name="student_section" onchange="student_fetch(this.value);">
              <option>select</option> 
               <?php foreach ($cls_sec['section'] as $key => $value) { ?> 
                <option <?php if($student_section == $value['class_section']){ echo $selected; } ?> ><?php echo $value['class_section']; ?></option>
                <?php } ?>     
              </select>
          </div>

           <div class="col-lg-12 sub_margs_alloc_sltcs studentdiv" style="display: none;" id="student_get" name="std_name[]">
            <select class="form-control" name="std_name[]">
           <option <?php if($a_id != ''){ echo $selected; } ?> >
             <?php echo $trans_update[0]['passenger_name']; ?>
           </option>
           </select>
          </div>

 
          <div class="col-lg-12 sub_margs_alloc_sltcs staffdiv" style="display: none;">
              <label  class="empll_labell">Designation&nbsp;<span class="empll_spn">*</span></label> 
              <select class="form-control" name="designation" onchange="staff_trans(this.value);">
                <option>select</option>
                <?php foreach ($fetch_designation as $key => $value) { ?>
                <option <?php if($designation == $value['designation']){ echo $selected; } ?> value="<?php echo $value['designation']; ?>"> <?php echo $value['designation']; ?></option>
                <?php } ?>
              </select>
          </div>

          <div class="col-lg-12 sub_margs_alloc_sltcs staffdiv" style="display: none;" id="staff_get"  name="stf_name[]">

          </div>

           <div class="col-lg-12 sub_margs_alloc_sltcs">
              <label  class="empll_labell">Start Date&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="start_date"  type="date" value="<?php if($a_id != ''){ echo $start_date; } ?>" >
          </div>

           <div class="col-lg-12 sub_margs_alloc_sltcs">
              <label  class="empll_labell">End Date&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="end_date"  type="date" value="<?php if($a_id != ''){ echo $end_date; } ?>">
          </div>
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <?php if($a_id != ''){ ?>
      <input class="btn btn-info" type="submit" value="update" name="">
      <?php } else{ ?>
      <input class="btn btn-info" type="submit" name="">
      <?php } ?>
      </div>
      <?php  }   ?>

    </div>
  </div>
</div>
 </div>
<?php echo form_close(); ?>

 <div class="col-lg-6">
  <div class="panel panel-default">
    <div class="panel-heading"><h3>Add Route</h3></div>
    <div class="panel-body pading_o">
      <div class="container-fluid pading_o table-responsive">
        
  <table class="table table-bordered marg_o">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Route Code.</th>
        <th>Destination</th>
        <th>User Type</th>
        <th>Class</th>
        <th>Section</th>
        <th>Passenger Name</th>
        <th>designation</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($allocate_fetch as $key => $value) { ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['rute_code']; ?></td>
        <td><?php echo $value['destination']; ?></td>
        <td><?php echo $value['type']; ?></td>
        <td><?php echo $value['student_class']; ?></td>
        <td><?php echo $value['student_section']; ?></td>
        <td><?php echo $value['passenger_name']; ?></td>
        <td><?php echo $value['designation']; ?></td>
        <td><?php echo $value['start_date']; ?></td>
        <td><?php echo $value['end_date']; ?></td>
        <td>
           <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
          <a href="<?php echo base_url();?>index.php/admission/transport_allocate/<?php echo $value['t_allocation_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <?php  }  ?>
            <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
          <a href="<?php echo base_url();?>index.php/admission/transport_delete/<?php echo $value['t_allocation_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
          <?php  }  ?>
        </td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>
</div>
  </div>
 </div>
</div>



<script type="text/javascript">
  function student_fetch(value)
  {
    class_data = document.getElementById("clss_select").value;
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/admission/stu_transport_fetch/"+class_data+"/"+value+"/",
      data    :  {'class_data':class_data,'sec_data':value},
      success : function(data)
      {
         $("#student_get").html(data);

      }
    });

  }

</script>

<script>  
    
        $('#select_type').change(function(){
      $name =  $('#select_type').val();
      if($name == 'student'){

        $('.studentdiv').show();
      }
      else
      {
        
       $('.studentdiv').hide();
      }
      if($name == 'staff')
      {
         $('.staffdiv').show();
      }
      else
      {
        
       $('.staffdiv').hide();
      }

      });
</script>

<?php  }   ?>