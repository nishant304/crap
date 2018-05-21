

<div id="page-wrapper">
<?php
     $stf_id = $this->session->userdata('stfdata');
      
       $data_stf = $this->session->userdata('data_auth');


   foreach ($data_stf as $key => $value)
   {
      foreach ($value as $key1 => $value1)
   {
   
      $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    
   }



?>
<?php
// start set variables for authority
 foreach ($exp['sailary'] as $key => $value2) {
  if ($value2 == 1){
    $auth_one = 1;
  }elseif($value2 == 2){
    $auth_two = 2;

  }
}
// end set variables for authority


// start condition for 2

if($auth_two == 2)
{
?>
<div class="container-fluid margi_top">

<div class="col-lg-5 col-lg-offset-3 std_main" >
<?php echo form_open('teacher_controller/staff_sailary_add');?>
         <div class="col-lg-12">
         	<h3 class="std_log">Staff Sailary Detail</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Staff Id</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="stf_id" placeholder="Staff Id"/>
				</div>
			</div>
		</div>


		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Staff Salary</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="stf_sailary" placeholder="Staff Salary">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Month Salary</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="sailary_month" placeholder="Month Salary">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Year Salary</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="sailary_year" placeholder="Year Salary">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Paid Mode</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="pay_mode" placeholder="Paid Mode">
               </div>
		     </div>
		</div>	
	<input type="submit" name="submit">	
	<?php echo form_close();?>
</div>
<?php } ?>

<!-- end condition for 2 -->
<!-- start condition for no authority and no incharge -->
<?php
if($auth_one == '' && $auth_two == '')
{
  echo "Not Authorised";
}
// end condition for no authority and no incharge
else
 {?>
<!-- start condition for view only if 1 authority is assigned -->
<div class="col-lg-12 show_lev table-responsive" id="myDIV">
<h2>Sailary Details</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>Staff Id</th>
    <th>Staff Sailary</th>
    <th>Sailary Of Month</th>
    <th>Sailary Of Year</th>
    <th>Payment Mode</th>
    <th>Status</th>
    <th>Manage</th>
   </tr>
</thead>
<tbody>
  
    <?php 
    $i=1;
    foreach ($sailary_dtl as $key) { ?>
    <tr>
     
    <td><?php echo $i; ?></td>
    <td><?php echo $key['stf_id']; ?></td>
    <td><?php echo $key['stf_sailary']; ?></td>
    <td><?php echo $key['sailary_month']; ?></td>
    <td><?php echo $key['sailary_year']; ?></td>
    <td><?php echo $key['pay_mode']; ?></td>
    <td><?php echo $key['status']; ?></td>
  
    <td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url(); ?>index.php/teacher_controller/assignment_delete/<?php echo $assign_id; ?>">Delete</a></td> 
  </tr>
 
  <?php $i++;}} ?>
</tbody>  
</table>
</div>
</div>	
</div>

