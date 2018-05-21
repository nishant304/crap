<?php
foreach ($fetch_std_data as $key) {
  $id = $key['std_id'];
  $class = $key['class'];
}

?>
<body>

<div id="page-wrapper">
<div class="container-fluid margi_top">

<div class="col-lg-5 col-lg-offset-3 std_main" >
	
  <?php 
  if($id !='')
  {
      echo form_open('admission/student_fee_update/'.$id); 
  }
  else
  {
    echo form_open('admission/student_fee_add'); 
  }
     ?>

 <div class="col-lg-12">
         	<h3 class="std_log">Student Fees Details</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
       <span style="color: red;"><?php echo form_error('std_id'); ?></span>
			<label class="col-lg-4 control-label">Student Id</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="std_id" placeholder="Student Id" value="<?php echo $key['std_id'];?>">
				</div>
			</div>
		</div>


		<div class="form-group">
		     <div class="col-lg-12">
         <span style="color: red;"><?php echo form_error('month'); ?></span>
		   <label class="col-lg-4 control-label">Month</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="month" placeholder="Month" value="<?php echo $key['month'];?>">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
  <span style="color: red;"><?php echo form_error('year'); ?></span>
		   <label class="col-lg-4 control-label">Year</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="year" placeholder="Year" value="<?php echo $key['year'];?>">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
   <span style="color: red;"><?php echo form_error('paid'); ?></span>
		   <label class="col-lg-4 control-label">Paid</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="paid" placeholder="Paid" value="<?php echo $key['paid'];?>">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
    <span style="color: red;"><?php echo form_error('pending'); ?></span>
		   <label class="col-lg-4 control-label">Pending</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="pending" placeholder="Pending" value="<?php echo $key['pending'];?>">
               </div>
		     </div>
		</div>


    <div class="form-group">
         <div class="col-lg-12">
 <span style="color: red;"><?php echo form_error('fees'); ?></span>
       <label class="col-lg-4 control-label">Fees</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="fees" placeholder="Fees" value="<?php echo $key['fees'];?>">
               </div>
         </div>
    </div>

     <div class="form-group">
         <div class="col-lg-12">
<span style="color: red;"><?php echo form_error('class'); ?></span>
       <label class="col-lg-4 control-label">class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
                  <!-- <input type="" class="form-control" name="class" placeholder="class"> -->
                  <select class="form-control" name="class">
                    <option value="">select-class</option>
                    <?php foreach ($class_data['class'] as $key) {?>
                     <option <?php if($key['class_name'] == $class){ ?>  selected <?php  }?>><?php echo $key['class_name'];}?></option>
                  </select>
               </div>
         </div>
    </div>
<input type="submit" name="submit">
		
	<?php echo form_close();?>

</div>
	
<div class="col-lg-12 show_lev table-responsive">
<h2>Fee Details</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>Student Id</th>
    <th>Month</th>
    <th>Year</th>
    <th>Paid</th>
    <th>Pending</th>
    <th>Fees</th>
    <th>class</th>
    <th colspan="2">Manage</th>

   </tr>
</thead>
<tbody>
  
    <?php 
    $i=1;
    foreach ($fetch_sfee_data as $key) { ?>
    <tr>
     
    <td><?php echo $i; ?></td>
    <td><?php echo $id=$key['std_id']; ?></td>
    <td><?php echo $key['month']; ?></td>
    <td><?php echo $key['year']; ?></td>
    <td><?php echo $key['paid']; ?></td>
    <td><?php echo $key['pending']; ?></td>
    <td><?php echo $key['fees']; ?></td>
    <td><?php echo $key['class']; ?></td>

  
    <td><a href="<?php echo base_url(); ?>index.php/admission/student_fee_detail/<?php echo $id; ?>">Edit</a></td>
    <td><a href="<?php echo base_url(); ?>index.php/admission/std_fee_delete/<?php echo $id; ?>">Delete</a></td> 
  </tr>
  <?php $i++;} ?>
</tbody>  
</table>
</div>




</div>



</body>
</html>