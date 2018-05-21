

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

<?php foreach ($exp['notice'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid margi_top">
<div class="col-lg-12 std_main" >
	<?php echo form_open('teacher_controller/add_new_notice'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Add Notice</h3>
         </div>

      <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Notice Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="notice_name" placeholder="Notice Name"/>
				</div>
			</div>
		</div>
		
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Notice Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="notice_date" placeholder="Notice Date">
               </div>
		     </div>
		</div>
		</div>

 
      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Remove Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="remove_date" placeholder="Notice Date">
               </div>
		     </div>
		</div>
	


		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Submit By</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="submit_by" placeholder="Staff Name">
               </div>
		     </div>
		</div>
		    </div>


       <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Notice Description</label>
				<div class="input-group col-lg-8">
					<textarea name="notice_desc" rows="4" cols="35"></textarea>
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
	<div class="col-lg-12 show_lev table-responsive" id="myDIV">
<table class="table table-bordered table-hover">
<thead>
	<tr class="info">
		<th>#</th>
		<th>Notice Name</th>
		<th>Notice Date</th>
		<th>Remove Date</th>
		<th>Notice Description</th>
		<th>Submited By</th>
		<th>Submited Date</th>
		<th>Manage</th>
	
	
	</tr>
</thead>

<tbody>
		<?php 
		$i=1;
		foreach ($notice as $key) { ?>
		<tr>
		<?php $notice_id = $key['notice_id']; ?>
		<td><?php echo $i; ?></td>
		<td><?php echo $key['notice_name']; ?></td>
		<td><?php echo $key['notice_date']; ?></td>
		<td><?php echo $key['remove_date']; ?></td>
		<td width="100px;"><div style="overflow-x:scroll; overflow-y:hidden; width: 200px; height:40px;"><?php echo $key['notice_desc']; ?></div></td>
		<td><?php echo $key['submit_by']; ?></td>
		<td><?php echo $key['submit_date']; ?></td>
		<td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url(); ?>index.php/teacher_controller/notice_delete/<?php echo $notice_id; ?>">Delete</a></td>
		</tr>
		<!-- script for delete button disable and enable start -->
			<?php
			foreach ($exp['notice'] as $key => $value1) { }
			 foreach ($exp['notice'] as $key => $value2) { 
			 if($value2 == '1' && $value1 == '2' || $value1 == '1'){ ?>
			<script type="text/javascript">
			  document.getElementById("mylink<?php echo $i; ?>").style.pointerEvents="none";  
			</script>
			<!-- script for delete button disable and enable end -->
	<?php $i++; }}}  ?>
</tbody>	
</table>
</div>	
<?php
foreach ($exp['notice'] as $key => $value) {
 if($value == '') { ?> 
<script>
document.getElementById("myDIV").style.display = "none";
</script>
<h2 id="err"><?php echo "you have not authority !"; } }?></h2>
</div>
</div>
</div>
</div>
