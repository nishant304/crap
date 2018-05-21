<?php
foreach ($fetch_salary_detail as $key) {
 $id = $key['stf_id'];
 $stf_name = $key['stf_name'];
  $month =    $key['sailary_month'];
  $salary =   $key['sailary_year'];
  $pay_mode = $key['pay_mode'];
}

?>

<body>

<div id="page-wrapper">
<div class="container-fluid margi_top">

<div class="col-lg-5 col-lg-offset-3 std_main" >
<?php 
if($id !='')
{
echo form_open('admission/staff_sal_update/'.$id);
  
}
else
{
  echo form_open('admission/staff_sailary_add');

}


?>
     
         <div class="col-lg-12">
         	<h3 class="std_log">Staff Sailary Detail</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
      <span style="color: red;"><?php echo form_error('stf_id'); ?></span>
			<label class="col-lg-4 control-label">Staff Id</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
	 <input type="" class="form-control" name="stf_id" placeholder="Staff Id" value="<?php echo $id;?>"> 
          
</div>
			</div>
		</div>


	<!-- 	<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Staff Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="stf_sailary" placeholder="Staff name">
                  </div>
		     </div>
		</div> -->

		<div class="form-group">
		     <div class="col-lg-12">
         <span style="color: red;"><?php echo form_error('sailary_month'); ?></span>
		   <label class="col-lg-4 control-label">Month </label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="sailary_month" placeholder="Month" value="<?php echo $month;?>">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
    <span style="color: red;"><?php echo form_error('sailary_year'); ?></span>
		   <label class="col-lg-4 control-label">Salary</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="sailary_year" placeholder="Salary" value="<?php echo $salary;?>">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
          <span style="color: red;"><?php echo form_error('pay_mode'); ?></span>
		   <label class="col-lg-4 control-label">Paid Mode</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="pay_mode" placeholder="Paid Mode" value="<?php echo $pay_mode;?>">
               </div>
		     </div>
		</div>	
	<input type="submit" name="submit">	
	<?php echo form_close();?>
 </div>

<div class="col-lg-12 show_lev table-responsive">
<h2>Sailary Details</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>Staff Id</th>
    <th>Month</th>
    <th>Sailary</th>
    <th>Payment Mode</th>
    <th>Status</th>
    <th colspan="2">Manage</th>
   </tr>
</thead>
<tbody>
  
    <?php 
    $i=1;
    foreach ($sailary_dtl as $key) { ?>
    <tr>
     
    <td><?php echo $i; ?></td>
    <td><?php echo $key['stf_id']; ?></td>
    <td><?php echo $key['sailary_month']; ?></td>
    <td><?php echo $key['sailary_year']; ?></td>
    <td><?php echo $key['pay_mode']; ?></td>
    <td><?php echo $key['status']; ?></td>
  
    <td><a href="<?php echo base_url(); ?>index.php/admission/staff_sailary_detail/<?php echo $key['stf_id']; ?>">Edit</a></td> 
    <td><a href="<?php echo base_url(); ?>index.php/admission/staff_sal_delete/<?php echo $key['stf_id']; ?>">Delete</a></td> 
  </tr>
  <?php $i++;} ?>
</tbody>  
</table>
</div>

</div>	
</div>

