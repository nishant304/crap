
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
 foreach ($exp['fees'] as $key => $value2) {
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
	<?php echo form_open('teacher_controller/fee_info_add');?>
         <div class="col-lg-12">
         	<h3 class="std_log">Fees Structure</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
			<label class="col-lg-4 control-label">class</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<!-- <input type="" class="form-control" name="class" placeholder="class"/> -->
					<select class="form-control" name="class">
						<option>select-class</option>
						<?php foreach ($class_data['class']  as $key) {?>
						<option><?php echo $key['class_name'];}?></option>
					</select>
                 
				</div>
			</div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Fees type</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="fees_type" placeholder="Fees type">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Fees Category</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="fees_category" placeholder="Fees Category">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Ammount</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="ammount" placeholder="Ammount">
               </div>
		     </div>	
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">late Payment</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="late_payment" placeholder="late Payment">
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
<h2>Fee Structure Detail</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>Class</th>
    <th>Fees type</th>
    <th>Fees Category</th>
    <th>Ammount</th>
    <th>late Payment</th>
    <th>Manage</th>
   </tr>
</thead>
<tbody>
  
    <?php 
    $i=1;
    foreach ($fetch_fees as $key) { ?>
    <tr>
     
    <td><?php echo $i; ?></td>
    <td><?php echo $key['class']; ?></td>
    <td><?php echo $key['fees_type']; ?></td>
    <td><?php echo $key['fees_category']; ?></td>
    <td><?php echo $key['ammount']; ?></td>
    <td><?php echo $key['late_payment']; ?></td>
  
    <td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url(); ?>index.php/teacher_controller/assignment_delete/<?php echo $key['fees_id']; ?>">Delete</a></td> 
  </tr>

  
  <?php $i++;}} ?>
</tbody>  
</table>
</div>	
</div>
</div>
