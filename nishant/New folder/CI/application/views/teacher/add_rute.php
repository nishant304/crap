<?php 
$user_listedd=explode(',',$role_autho[0]['add_routes']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>

<?php 
$r_id = $this->uri->segment(3);
$rute_code = $rute_update[0]['rute_code'];
$vehicle_no = $rute_update[0]['vehicle_no'];
$pickup_place = $rute_update[0]['pickup_place'];
$drop_place = $rute_update[0]['drop_place'];
$selected = 'selected';
 ?>
<div id="page-wrapper">
 <div class="col-lg-6">
   <div class="container-fluid">
 
  <div class="panel panel-default">
    <div class="panel-heading">Add Route</div>
    <div class="panel-body">
<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>       
<?php echo form_open('admission/add_rute_detail/'.$r_id); ?>
<?php }  ?>
         <div class="col-lg-12 sub_margs_alloc_sltcs  ">
          <label class="empll_labell">Vehicle No.&nbsp;<span class="alloct_sub_strs ">*</span></label> 
           <select class="form-control" name="vehicle_no">
              <option>Select</option>
              <?php foreach ($vehicle as $key => $value) {
               ?>
              <option <?php if($vehicle_no == $value['vehicle_no']){ echo $selected; } ?> value="<?php echo $value['vehicle_no']; ?>"><?php echo $value['vehicle_no']; ?></option>
              <?php } ?>

            </select>
          </div> 
          <div class="col-lg-12 sub_margs_alloc_sltcs">
            <label  class="empll_labell">Route Code&nbsp;<span class="empll_spn">*</span></label> 
            <input class="form-control empll_input " name="rute_code"  type="" value="<?php if($r_id != ''){ echo $rute_code; } ?>" >
          </div>

           <div class="col-lg-12 sub_margs_alloc_sltcs">
              <label  class="empll_labell">Route Start Place&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="pickup_place"  type="" value="<?php if($r_id != ''){ echo $pickup_place; } ?>">
          </div>

           <div class="col-lg-12 sub_margs_alloc_sltcs">
              <label  class="empll_labell">Route Stop Place&nbsp;<span class="empll_spn">*</span></label> 
            <input class="form-control empll_input " name="drop_place"  type="" value="<?php if($r_id != ''){ echo $drop_place; } ?>">
          </div>
     <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <?php if($r_id != ''){ ?>
      <input class="btn btn-info" type="submit" name="submit" value="Update">
      <?php } else{ ?>
      <input class="btn btn-info" type="submit" name="submit" value="Save">

      <?php } ?>
      </div>
      <?php  }  ?>

    </div>
  </div>
</div>
 </div>
<?php echo form_close(); ?>

 <div class="col-lg-6">
   <!-- <div class="container-fluid"> -->
 
  <div class="panel panel-default">
    <div class="panel-heading">Add Route</div>
    <div class="panel-body pading_o">
      <div class="container-fluid pading_o">
        
  <table class="table table-bordered marg_o">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Vehical No.</th>
        <th>Rute Code</th>
        <th>Pickup Place</th>
        <th>Drop Place</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($rute as $key => $value1) { ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value1['vehicle_no']; ?></td>
        <td><?php echo $value1['rute_code']; ?></td>
        <td><?php echo $value1['pickup_place']; ?></td>
        <td><?php echo $value1['drop_place']; ?></td>
        <td>
               <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
          <a href="<?php echo base_url(); ?>index.php/admission/add_rute/<?php echo $value1['rute_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <?php  }  ?>
          <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
          <a href="<?php echo base_url(); ?>index.php/admission/rute_delete/<?php echo $value1['rute_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
          <?php   }  ?>
        </td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>

    </div>
  </div>
<!-- </div> -->
 </div>



</div>
<?php   }  ?>