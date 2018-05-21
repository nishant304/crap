

<div id="page-wrapper">
<?php
    $data_stf = $this->session->userdata('data_auth');

   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1)
   {
   
    $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    }
   ?>

<?php foreach ($exp['subject'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid">

<div class="col-lg-12 std_main" >
	<?php echo form_open('teacher_controller/add_new_subject'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Add Subject</h3>
         </div>

    <div class="col-lg-12 ">
		<div class="form-group col-lg-6">

			<div class="col-lg-12 pading_o">
			<label class="col-lg-4 control-label">Subject Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="sub_name" placeholder="Subject Name"/>
				</div>
			</div>
		</div>



		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Class Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <select name="class_id" class="form-control">
                  	<option>Select</option>
                  	<?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
                  </select>
               </div>
		     </div>
		</div>
		</div>


		<div class="col-lg-offset-6">
			<input class="btn btn-warning" type="submit" name="submit" value="submit">
		</div>
		<?php echo form_close(); ?>
</div>
	  <?php }} ?>
<div class="col-lg-12 show_lev table-responsive">
<table class="table table-bordered table-hover">
<thead>
	<tr class="info">
		<th>#</th>
		<th>Subject Name</th>
		<th>Class Name</th>
		<th>Manage</th>
	
	</tr>
</thead>

<tbody>
	
		<?php 
		$i=1;
		foreach ($subject as $key) { ?>
		<tr>
		<?php  $sub_id = $key['sub_id']; ?>
		<td><?php echo $i; ?></td>
		<td><?php echo $key['sub_name']; ?></td>
		<td><?php echo $key['class_id']; ?></td>
		<td><a href="<?php echo base_url(); ?>index.php/teacher_controller/subject_delete/<?php echo $sub_id; ?>">Delete</a></td>
		</tr>
	<?php $i++; }  ?>
</tbody>	
</table>
</div>	
</div>
</div>
