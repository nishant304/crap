

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

<?php foreach ($exp['event'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid margi_top">
<div class="col-lg-12 std_main" >
	<?php echo form_open('teacher_controller/add_new_event'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Add Events</h3>
         </div>

     <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Event Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="event_name" placeholder="Event Name"/>
				</div>
			</div>
		</div>


		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Event Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="event_date" placeholder="Event Date">
               </div>
		     </div>
		</div>
		</div>


    <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Event Start Timing</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="time" class="form-control" name="event_start_time" placeholder="Event Start Timing">
               </div>
		     </div>
		</div>
	

		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Event End Timing</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="time" class="form-control" name="event_end_time" placeholder="Event End Timing">
               </div>
		     </div>
		</div>
		      </div>


      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Operate By</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                 <!--  <input type="" class="form-control" name="staff_id" placeholder="Staff Id"> -->
            <select class="form-control" name="staff_id">
		            <option>Select</option>
		            <?php foreach ($teacher as $key) { ?> 
		            <option>
		            <?php echo $key['stf_fname']." ". $key['stf_lname'];  } ?>
		            </option>
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
	<div class="col-lg-12 show_lev table-responsive" id="myDIV">
<table class="table table-bordered table-hover">
<thead>
	<tr class="info">
		<th>#</th>
		<th>Event Name</th>
		<th>Event Date</th>
		<th>Event Start Date</th>
		<th>Event End Date</th>
		<th>Operate By</th>
		<th>Manage</th>
	
	
	</tr>
</thead>

<tbody>
		<?php 
		$i=1;
		foreach ($event as $key) { ?>
		<tr>
		<?php $event_id = $key['event_id']; ?>
		<td><?php echo $i; ?></td>
		<td><?php echo $key['event_name']; ?></td>
		<td><?php echo $key['event_date']; ?></td>
		<td><?php echo $key['event_start_time']; ?></td>
		<td><?php echo $key['event_end_time']; ?></td>
		<td><?php echo $key['staff_id']; ?></td>
		<td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url(); ?>index.php/teacher_controller/event_delete/<?php echo $event_id; ?>">Delete</a></td>
	</tr>

	<!-- script for delete button disable and enable start -->
			<?php
			foreach ($exp['event'] as $key => $value1) { }
			 foreach ($exp['event'] as $key => $value2) { 
			 if($value2 == '1' && $value1 == '2' || $value1 == '1'){ ?>
			<script type="text/javascript">
			  document.getElementById("mylink<?php echo $i; ?>").style.pointerEvents="none";  
			</script>
			<!-- script for delete button disable and enable end -->
	<?php $i++; } }} ?>
</tbody>	
</table>
</div>	
<?php
foreach ($exp['event'] as $key => $value) {
 if($value == '') { ?> 
<script>
document.getElementById("myDIV").style.display = "none";
</script>
<h2 id="err"><?php echo "you have not authority !"; } }?></h2>
</div>
</div>
</div>
</div>
