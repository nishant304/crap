<?php 
$user_listedd=explode(',',$role_autho[0]['add_vehicle']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>
<?php 
$v_id = $this->uri->segment(3);
$vehicle_no = $vehicle_update[0]['vehicle_no'];
$no_of_seat = $vehicle_update[0]['no_of_seat'];
$maximum_allowed = $vehicle_update[0]['maximum_allowed'];
$vehicle_type = $vehicle_update[0]['vehicle_type'];
$contact_person = $vehicle_update[0]['contact_person'];
$selected = 'selected';
 ?>
<div class="ser_contc"  id="page-wrapper">
	<div class="col-lg-6">
 <div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">Vechil Detail</div>
    <div class="panel-body">
     <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>  
   <?php echo form_open('admission/add_vehicle_detail/'.$v_id); ?>
   <?php  }  ?>
     <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">Vehicle No.&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <input type="text" class="form-control" name="vehicle_no" placeholder="Vehicle No." value="<?php if($v_id != ''){ echo $vehicle_no; } ?>">
     </div>

      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">No. of Seats&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <input type="text" class="form-control" name="no_of_seat" placeholder="No. of Seats" value="<?php if($v_id != ''){ echo $no_of_seat; } ?>">
     </div>

      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">Maximum Allowed&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <input type="text" class="form-control" name="maximum_allowed" placeholder="Maximum Allowed" value="<?php if($v_id != ''){ echo $maximum_allowed; } ?>">
     </div>

    <div class="col-lg-12 sub_margs_alloc_sltcs  ">
        <label class="">Vehicle Type&nbsp;<span class="alloct_sub_strs ">*</span></label> 
         <select class="form-control" name="vehicle_type">
            <option>Select</option>
            <option <?php if($vehicle_type == 'contract'){ echo $selected; } ?> value="contract">Contract</option>
            <option <?php if($vehicle_type == 'ownership'){ echo $selected; } ?> value="ownership">Ownership</option>
           
          </select>
       </div> 

      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">Contact Person&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <input type="text" class="form-control" name="contact_person" placeholder="Contact Person" value="<?php if($v_id != ''){ echo $contact_person; } ?>">
     </div>
 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
	<div class="col-lg-12 marg_top">
    <?php if($v_id == ''){ ?>
	    <input class="btn btn-info" type="submit" name="submit" value="Save">
      <?php } else { ?>
      <input class="btn btn-info" type="submit" name="submit" value="Update">
      <?php } ?>
	</div>
  <?php  }   ?>
    </div>
  </div>
</div>
</div>
<?php echo form_close(); ?>

<div class="col-lg-6 table-responsive">
       
  <table class="table table-bordered sub_aloct_seconds">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Vehical No.</th>
        <th>No.of seats</th>
        <th>Max.Allowed</th>
        <th>Vehicle Type</th>
        <th>Contact person</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach ($vehicle as $key => $value) { ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['vehicle_no']; ?></td>
        <td><?php echo $value['no_of_seat']; ?></td>
        <td><?php echo $value['maximum_allowed']; ?></td>
        <td><?php echo $value['vehicle_type']; ?></td>
        <td><?php echo $value['contact_person']; ?></td>
        <td>
           <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
        <a href="<?php echo base_url(); ?>index.php/admission/add_vehicle/<?php echo $value['vehicle_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <?php   }  ?>
          <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
        <a href="<?php echo base_url(); ?>index.php/admission/vehicle_delete/<?php echo $value['vehicle_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        <?php  }  ?>
        </td>
      </tr>
      <?php $i++; } ?>
      
     
    </tbody>
  </table>
</div>






</div>

<?php   }   ?>