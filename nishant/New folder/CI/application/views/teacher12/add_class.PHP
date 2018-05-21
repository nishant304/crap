
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

<?php foreach ($exp['add_class'] as $key => $value) {
if($value == 2){ ?>
<div class="container ">
<div class="col-lg-12 ad_cls_main" >
	<?php echo form_open('teacher_controller/add_classes');   ?>

         <div class="col-lg-12">
         	<h3 class="std_log">Add Class</h3>
         	<div style="color: red;"><?php echo $error_message;  ?></div>
         </div>

    <div class="col-lg-12">
		<div class="form-group col-lg-6">

			<div class="col-lg-12 pading_o">
			<label class="col-lg-4 control-label">Class Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="class_name" placeholder="Class Name"/>
				</div>
			</div>
		</div>



		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Class Section</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <!-- <input type="text" class="form-control" name="class_section" placeholder="Class Section"> -->
                  <select class="form-control" name="class_section">
                  	<option>Select</option>
                  	<option value="A">A</option>
                  	<option value="B">B</option>
                  	<option value="C">C</option>
                  	<option value="D">D</option>
                  	<option value="E">E</option>
                  	<option value="F">F</option>
                  	<option value="G">G</option>
                  	<option value="H">H</option>
                  </select>
               </div>
		     </div>
		</div>
		</div>


		<center><button class="btn btn-warning" type="">Submit</button></center>
	<?php  echo form_close();  ?>
</div>
	  <?php }} ?>
<div class="col-lg-12 show_lev table-responsive">
<h2>Add Class</h2>
<table class="table table-bordered table-hover">
<thead>
	<tr class="info">
		<th>Class Id</th>
		<th>Class</th>
		<th>Section</th>
		<th>Manage</th>
	
	</tr>
</thead>

<tbody>
	
		<?php 
		$i=1;
		foreach ($class_all as $key) { ?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $key['class_name']; ?></td>
		<td><?php echo $key['class_section']; ?></td>
		<td><a href="<?php echo base_url('index.php/teacher_controller/class_remove/');echo $key['id']; ?>">Remove</a></td>

	</tr>
	<?php $i++;} ?>
</tbody>	
</table>
</div>	
</div>
</div>
