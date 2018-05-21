<?php 
$user_listedd=explode(',',$role_autho[0]['add_driver']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>



<?php 
$d_id = $this->uri->segment(3);
$p_name = $payhead_fetc_update[0]['pay_head_name'];
$p_type = $payhead_fetc_update[0]['pay_head_type'];
$p_desc = $payhead_fetc_update[0]['description'];
 ?>
<div class="ser_contc"  id="page-wrapper">
	<div class="col-lg-6">
 <div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">Add Driver</div>
    <div class="panel-body">
       <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>      
   <?php echo form_open('admission/driver_detail/'.$d_id); ?>
   <?php } ?>
     <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">Vehicle No.&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <select class="form-control" name="vehicle_no">
          <option>select</option>
          <?php foreach ($vehicle as $key => $value) { ?>
          <option   <?php  if($particular[0]['vehicle_no']==$value['vehicle_no'])  {  ?>  selected       <?php   }    ?>    value="<?php echo $value['vehicle_no']; ?>"><?php echo $value['vehicle_no']; ?></option>
          <?php } ?>
        </select>
     </div>

      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">Name&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <select class="form-control" name="stf_id">
          <option>select</option>
          <?php foreach ($driver as $key => $value) { ?>
          <option <?php  if($particular[0]['stf_id']==$value['stf_id'])  {  ?>  selected       <?php   }    ?>  value="<?php echo $value['stf_id']; ?>"><?php echo $value['stf_fname']." ".$value['stf_lname']; ?></option>
          
<?php } ?>
        </select>
     </div>

    
      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">Rute&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <select class="form-control" name="rute_code">
          <option>select</option>
          <?php foreach ($rute as $key => $value) { ?>
          <option <?php  if($particular[0]['rute_code']==$value['rute_code'])  {  ?>  selected       <?php   }    ?> value="<?php echo $value['rute_code']; ?>"><?php echo $value['rute_code']; ?></option>
          <?php } ?>
        </select>
     </div>

      <div class="col-lg-12 sub_margs_alloc_sltcs">
        <label class="">Licience No.&nbsp;<span class="alloct_sub_strs">*</span></label> 
        <input type="text" class="form-control" name="iecence_no"  value="<?php echo  $particular[0]['iecence_no']   ?>" placeholder="Licience No."/>
     </div>
 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
	<div class="col-lg-12 marg_top">
    <?php if($d_id != ''){ ?>
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

<div class="col-lg-6 table-responsive">
   <table class="table table-bordered sub_aloct_seconds">
      <thead>
        <tr>
        <th>S.No.</th>
        <th>Vehical No.</th>
        <th>Name</th>
        <th>Rute Code</th>
        <th>Liecence No.</th>
        <th>Manage</th>
        </tr>
    </thead>
    <tbody>
    	<?php $i=1; foreach ($driver_detl as $key => $value) { ?>
      <tr>
           <td><?php echo $i; ?></td>
            <td><?php echo $value['vehicle_no']; ?></td>
              <td><?php echo $value['driver_name']; ?></td>
           <td><?php echo $value['rute_code']; ?></td>
          <td><?php echo $value['iecence_no']; ?></td>
        <td>
           <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
   <a href="<?php echo base_url();?>index.php/admission/add_driver/<?php echo $value['driver_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
 <?php   }   ?>
 <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
  <a href="<?php echo base_url();?>index.php/admission/driver_delete/<?php echo $value['driver_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
  <?php  }    ?>
        </td>
      </tr>
      <?php $i++; } ?>
      
     
    </tbody>
  </table>
</div>
</div>

<?php   }  ?>