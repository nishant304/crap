<?php
foreach ($fetch_fees_id as $key) {
  $id = $key['fees_id'];
  $class = $key['class'];
  $course = $key['course'];
  $f_type = $key['fees_type'];
  $f_cat = $key['fees_category'];
  $ammount = $key['ammount'];
  $l_pay = $key['late_payment'];
}

?>
<body>

<div id="page-wrapper">
<div class="container-fluid margi_top">

<div class="col-lg-5 col-lg-offset-3 std_main" >
<!-- <?php //echo validation_errors();?> -->

	<?php 
  if($id !='')
  {
      echo form_open('admission/fee_update/'.$id); 
  }
  else
  {
    echo form_open('admission/fee_info_add'); 
  }
     ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Fees Structure</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
     <span style="color: red;"><?php echo form_error('class'); ?></span>
			<label class="col-lg-4 control-label">class</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<!-- <input type="" class="form-control" name="class" placeholder="class"/> -->
					<select class="form-control" name="class"  >
          <option value=''>select</option>
          <?php foreach ($class_data['class'] as $key) {?>
            <option  <?php if($key['class_name'] == $class){ ?>  selected <?php  }?> > <?php echo $key['class_name'];}?></option>
          </select>
                 
				</div>
			</div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
         <span style="color: red;"><?php echo form_error('fees_type'); ?></span>
		   <label class="col-lg-4 control-label">Fees type</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="fees_type" placeholder="Fees type" value="<?php echo $f_type;?>">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
          <span style="color: red;"><?php echo form_error('fees_category'); ?></span>
		   <label class="col-lg-4 control-label">Fees Category</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="fees_category" placeholder="Fees Category" value="<?php echo $f_cat;?>">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
          <span style="color: red;"><?php echo form_error('ammount'); ?></span>
		   <label class="col-lg-4 control-label">Ammount</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="ammount" placeholder="Ammount" value="<?php echo $ammount;?>">
               </div>
		     </div>	
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
           <span style="color: red;"><?php echo form_error('late_payment'); ?></span>
		   <label class="col-lg-4 control-label">late Payment</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="late_payment" placeholder="late Payment" value="<?php echo $l_pay;?>">
               </div>
		     </div>
		</div>
       <input type="submit" name="submit">

		
	<?php echo form_close();?>
</div>

<div class="col-lg-12 show_lev table-responsive">
<h2>Fee Structure Detail</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>s.no</th>
    <th>Class</th>
    <th>Fees type</th>
    <th>Fees Category</th>
    <th>Ammount</th>
    <th>late Payment</th>
    <th colspan="2">Manage</th>
   </tr>
</thead>
<tbody>
  
    <?php 
    $i=1;
    foreach ($fetch_fees as $key) { ?>
    <tr>
     
    <td><?php echo $i; ?></td>
    <td><?php echo $fees_id = $key['fees_id']; ?></td>
    <td><?php echo $key['class']; ?></td>
    <td><?php echo $key['fees_type']; ?></td>
    <td><?php echo $key['fees_category']; ?></td>
    <td><?php echo $key['ammount']; ?></td>
    <td><?php echo $key['late_payment']; ?></td>
  
    <td><a href="<?php echo base_url();?>index.php/admission/fee_detail/<?php echo $fees_id; ?>">Edit</a></td> 
    <td><a href="<?php echo base_url();?>index.php/admission/fee_delete/<?php echo $fees_id; ?>">Delete</a></td>
  </tr>
  <?php $i++;} ?>
</tbody>  
</table>
</div>


	
</div>
</div>
