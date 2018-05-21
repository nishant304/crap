<?php
    $data_stf = $this->session->userdata('data_auth');
print_r($data_stf);

   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1) {
   
    $exp[$key1]=explode(',', $data_stf[0][$key1]);

     }  
       }
   ?>

<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">

						<li>
							<a  href="<?php echo base_url(); ?>index.php/teacher_controller/dashboard_data" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						<li class="">
						<a href="#" ><i class="fa fa-sticky-note nav_icon"></i>Academic<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
								<?php foreach ($exp['notes'] as $key => $value) {
       							if($value !=''){  ?>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_file_upload">Notes</a>
								<?php break; }
								 else
								{ ?>
								<a href="#" onclick="error_msg();">Notes</a>
								<?php }} ?>
								</li>

								<li>
								<?php foreach ($exp['assignment'] as $key => $value) {
       							if($value !=''){  ?>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_assignment">Assignment</a>
								<?php break; }
								 else
								{ ?>
								<a href="#" onclick="error_msg();">Assignment</a>
								<?php }} ?>
								</li>


								<li>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/attendance_report">Attandance Report</a>
								</li>


								<li>
								<?php foreach ($exp['subject'] as $key => $value) {
       							if($value !=''){  ?>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_subject">Add Subject</a>
								<?php break; }
								 else
								{ ?>
								<a href="#" onclick="error_msg();">Add Subject</a>
								<?php }} ?>
								</li>


								<li>
								<?php foreach ($exp['add_class'] as $key => $value) {
       							if($value !=''){  ?>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_class">Add Class</a>
								<?php break; }
								 else
								{ ?>
								<a href="#" onclick="error_msg();">Add Class</a>
								<?php }} ?>
								</li>



								<li>
								<?php foreach ($exp['class_incharge'] as $key => $value) {
       							if($value !=''){  ?>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_class_incharge">Add Class Incharge</a>
								<?php break; }
								 else
								{ ?>
								<a href="#" onclick="error_msg();">Add Class Incharge</a>
								<?php }} ?>
								</li>


								<li>
								
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/marks">Marks</a>
								</li>


							</ul>
						</li>
						<li>
						<a href="#"><i class="fa fa-envelope nav_icon"></i>Allocation<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
						<li>
						<?php foreach ($exp['assign_sub_class'] as $key => $value) {
       							if($value !=''){  ?>
						<a href="<?php echo base_url(); ?>index.php/teacher_controller/assign_subject_class">Assign Sub/Class</a>
						<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Assign Sub/Class</a>
								<?php }} ?>
						</li>
						<li>
							<?php foreach ($exp['assign_sec_roll_no'] as $key => $value) {
       							if($value !=''){  ?>
						<a href="<?php echo base_url(); ?>index.php/teacher_controller/assign_rol_sec">Assign Sec/Roll-no.</a>
						<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Assign Sec/Roll-no.</a>
								<?php }} ?>
						</li>
						</ul>
						</li>

							<li>
							<a href="#"><i class="fa fa-bell nav_icon" style="color: white;"></i>Circular<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<?php foreach ($exp['exam'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/exam_detail">Exam Detail</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Exam Detail</a>
								<?php }} ?>
								</li>
								<li>
								<?php foreach ($exp['time_table'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/time_table">Class Time Table</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Class Time Table</a>
								<?php }} ?>
								</li>
								<li>
								<?php foreach ($exp['notice'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_notice">Add New Notice</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Add New Notice</a>
								<?php }} ?>
								</li>
								
								<li>
								<?php foreach ($exp['event'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_event">Add New Event</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Add New Event</a>
								<?php }} ?>
								</li>
								
								
							</ul>
							<!-- //nav-second-level -->
						</li>

						<li>
						
							<a href="#"><i class="fa fa-user nav_icon"></i>Record<span class="fa arrow"></span> </a>
								<ul class="nav nav-second-level collapse">
								<li class="">
								<?php foreach ($exp['stu_detail'] as $key => $value) {
       							if($value !=''){  ?>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_record">Student List </a>
								<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Student List</a>
								<?php }} ?>
							
								</li>
								<li>
								<?php foreach ($exp['stf_detail'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/all_staff">Staff List</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Staff List</a>
								<?php }} ?>
								</li>
								<li>
								<?php foreach ($exp['marks'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="tables.html">Parrent list</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Marks</a>
								<?php }} ?>
								</li>
							</ul>
						</li>
						<li>

							<a href="#"><i class="fa fa-registered nav_icon"></i>Registration<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
								<?php foreach ($exp['stu_admission'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="<?php base_url(); ?>student_teacher_controller">Add New Student</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Add New Student</a>
								<?php }} ?>
								</li>
								<li>
								<?php foreach ($exp['stf_reg'] as $key => $value) {
       							if($value !=''){  ?>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_staff">Add New Staff</a>
									<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Add New Staff</a>
								<?php }} ?>
								</li>
							</ul>
							
						</li>
					
						<li>
							<a href="charts.html" class="chart-nav"><i class="fa fa-bar-chart nav_icon"></i>Progress Info</a>
						</li>
						
						<li>
						
							<a href="#"><i class="fa fa-calendar nav_icon"></i>HR/Payroll<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">

							<li>
							<?php foreach ($exp['fees'] as $key => $value) {
       							if($value !=''){  ?>
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/fees_detail" class="chart-nav">Fees Structure</a>
							<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Fees Structure</a>
								<?php }} ?>
							</li>
							<li>
							<?php foreach ($exp['fees'] as $key => $value) {
       							if($value !=''){  ?>
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/fees_detail" class="chart-nav">Student Fees Detail</a>
							<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Student Fees Detail</a>
								<?php }} ?>
							</li>
							<li>
							<?php foreach ($exp['leave_detail'] as $key => $value) {
       							if($value !=''){  ?>
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/fees_detail" class="chart-nav">Leave Detail</a>
							<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Leave Detail</a>
								<?php }} ?>
							</li>
							<li>
							<?php foreach ($exp['sailary'] as $key => $value) {
       							if($value !=''){  ?>
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/fees_detail" class="chart-nav">Staff Sailary Detail</a>
							</li>
								<?php break; }
								 else
								{ ?>
							<a href="#" onclick="error_msg();">Staff Sailary Detail</a>
								<?php }} ?>
							</ul>
							
						</li>

						
					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<script type="text/javascript">
			function error_msg()
			{
			alert("SORRY !you are not authorised for this action");
			}
		</script>