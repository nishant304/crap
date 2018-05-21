

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
   <?php foreach ($exp['leave_detail'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid margi_top">

<div class="col-lg-5 col-lg-offset-3 std_main" >
	<?php echo form_open('teacher_controller/leave_info_add');?>
         <div class="col-lg-12">
         	<h3 class="std_log">leave detail</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Student Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="std_id" placeholder="Student Id"/>
				</div>
			</div>
		</div>


		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Staff Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="stf_id" placeholder="Staff Id">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Leave Message</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="leave_message" placeholder="Leave Message">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Approve Status</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="approve_status" placeholder="Approve Status">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">From Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="from_date" placeholder="From Date">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">To Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="to_date" placeholder="To Date">
               </div>
		     </div>
		</div>


		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Leave Type</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="leave_type" placeholder="Leave Type">
               </div>

		     </div>
		</div>
<input type="submit" name="submit">
		
	<?php echo form_close();?>
</div>
<?php }} ?>
<div class="col-lg-12 show_lev table-responsive" id="myDIV">
<h2>Leave Details</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>Student Name</th>
    <th>Staff Name</th>
    <th>Message</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Leave Type</th>
    <th>Approve Status</th>
    <th>Recieved Status</th>
    <th>Manage</th>
   </tr>
</thead>
<tbody>
  
    <?php 
    $i=1;
    foreach ($leave_dtl as $key) { ?>
    <tr>
     
    <td><?php echo $i; ?></td>
    <td><?php echo $key['std_id']; ?></td>
    <td><?php echo $key['stf_id']; ?></td>
    <td><?php echo $key['leave_message']; ?></td>
    <td><?php echo $key['from_date']; ?></td>
    <td><?php echo $key['to_date']; ?></td>
    <td><?php echo $key['leave_type']; ?></td>
    <td><?php echo $key['approve_status']; ?></td>
    <td><?php echo $key['receved_status']; ?></td>
  
    <td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url(); ?>index.php/teacher_controller/assignment_delete/<?php echo $assign_id; ?>">Delete</a></td> 
  </tr>

  <!-- script for delete button disable and enable start -->
      <?php
      foreach ($exp['leave_detail'] as $key => $value1) { }
       foreach ($exp['leave_detail'] as $key => $value2) { 
       if($value2 == '1' && $value1 == '2' || $value1 == '1'){ ?>
      <script type="text/javascript">
        document.getElementById("mylink<?php echo $i; ?>").style.pointerEvents="none";  
      </script>
      <!-- script for delete button disable and enable end -->
  <?php $i++;}}} ?>
</tbody>  
</table>
</div>

<?php
foreach ($exp['leave_detail'] as $key => $value) {
 if($value == '') { ?> 
<script>
document.getElementById("myDIV").style.display = "none";
</script>
<h2 id="err"><?php echo "you have not authority !"; } }?></h2>

</div>	
</div>

