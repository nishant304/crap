<?php
    $data_stf = $this->session->userdata('data_auth');
    
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
								
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_file_upload">Notes</a>
								
								</li>

								<li>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_assignment">Assignment</a>
								</li>
								<li>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/teacher_lession_plan">Lession Plan</a>
								</li>

								<li>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/attendance_report">Attandance Report</a>
								</li>


								<li>
								
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_subject">Add Subject</a>
								
								</li>


								<li>
								
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_class">Add Class</a>
								
								</li>



								<li>
								
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_class_incharge">Add Class Incharge</a>
								
								</li>
								<li class="">
								<a href="#" ><i class="fa fa-sticky-note nav_icon"></i>Marks<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								<li>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/marks">Exam Marks</a>
								</li>
								<li>
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/test_marks">Test Marks</a>
								</li>
								</ul>
								</li>

							</ul>
						</li>
						<li>
						<a href="#"><i class="fa fa-envelope nav_icon"></i>Allocation<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
						<li>
						
						<a href="<?php echo base_url(); ?>index.php/teacher_controller/assign_subject_class">Assign Sub/Class</a>
						
						</li>
						<li>
							
						<a href="<?php echo base_url(); ?>index.php/teacher_controller/assign_rol_sec">Assign Sec/Roll-no.</a>
						
						</li>
						</ul>
						</li>

							<li>
							<a href="#"><i class="fa fa-bell nav_icon" style="color: white;"></i>Circular<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="#">Schdule Exam<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level collapse">
									<li>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/exam_detail">Add Exam</a>
									</li>
									<li>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/date_sheet">Exam DateSheet</a>
									</li>
									</ul>
									</li>
									<li>
									<a href="#">Schdule Test<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level collapse">
									<li>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/daily_basis">Daily Basis</a></li>
									<li>
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/test_date_sheet">Daily Datesheet</a></li>
									</ul>
									</li>
								<li>
								
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/time_table">Class Time Table</a>
									
								</li>
								<li>
								
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_notice">Add New Notice</a>
									
								</li>
								
								<li>
								
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_event">Add New Event</a>
									
								</li>
								
								
							</ul>
						</li>

						<li>
						
							<a href="#"><i class="fa fa-user nav_icon"></i>Record<span class="fa arrow"></span> </a>
								<ul class="nav nav-second-level collapse">
								<li class="">
								
								<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_record">Student List </a>
							
							
								</li>
								<li>
								
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/all_staff">Staff List</a>
									
								</li>
								
							</ul>
						</li>
						<li>

							<a href="#"><i class="fa fa-registered nav_icon"></i>Registration<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
								
									<a href="<?php base_url(); ?>student_admission">Add New Student</a>
									
								</li>
								<li>
								
									<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_staff">Add New Staff</a>
									
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
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/fee_detail" class="chart-nav">Fees Structure</a>
							</li>
							<li>
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_fee_detail" class="chart-nav">Student Fees Detail</a>
							</li>
							<li>
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/leave_detail" class="chart-nav">Leave Detail</a>
							</li>
							<li>
							<a href="<?php echo base_url(); ?>index.php/teacher_controller/staff_sailary_detail" class="chart-nav">Staff Sailary Detail</a>
							</li>

							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		