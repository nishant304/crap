<?php
    $data_stf = $this->session->userdata('data_auth');
    $teacher_sidebar=$this->session->userdata('teacher_sidebar');
   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1) {
   
    $exp[$key1]=explode(',', $data_stf[0][$key1]);

     }  
       }
   ?>

<div class=" sidebar" role="navigation">
<div class="navbar-collapse">
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="background: <?php echo $teacher_sidebar; ?>;">
<ul class="nav" id="side-menu">
<li>
<a  href="<?php echo base_url(); ?>index.php/teacher_controller/dashboard_data" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
</li>

<?php 	
 $add_userr_sessp=$this->session->userdata('authority');
 $ad_user10=$add_userr_sessp[0];
 $ad_user20=$add_userr_sessp[1];
 $ad_user30=$add_userr_sessp[2];
?>
<?php if($ad_user10==1 || $ad_user10==2  ||$ad_user10==3 ||$ad_user20==1 || $ad_user20==2  ||$ad_user20==3 || $ad_user30==1 || $ad_user30==2  ||$ad_user30==3)
{     ?>

<li class="<?php echo ++$i;?>">
<a href="<?php echo base_url(); ?>index.php/teacher_controller/role_permission" class="active"><i class="fa fa-certificate nav_icon"></i>Authority</a>
</li>
<?php } ?>

<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/promote" class="active"><i class="fa fa-certificate nav_icon"></i>Promotion</a>
</li>


<li>
<a href=""><i class="fa fa-user nav_icon"></i>Users<span class="fa arrow"></span> </a>
<ul class="nav nav-second-level collapse">
<?php 	
 $add_userr_sessw=$this->session->userdata('add_userrr');
 $ad_user1=$add_userr_sessw[0];
 $ad_user2=$add_userr_sessw[1];
 $ad_user3=$add_userr_sessw[2];
?>
<?php if($ad_user1==1 || $ad_user1==2  ||$ad_user1==3 ||$ad_user2==1 || $ad_user2==2  ||$ad_user2==3 || $ad_user3==1 || $ad_user3==2  ||$ad_user3==3)
{     ?>
<li class="">
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_user">Add User</a>
</li>
<?php  } ?>
<?php 	
 $add_userr_sess=$this->session->userdata('manage_user');
 $ad_user11=$add_userr_sess[0];
 $ad_user21=$add_userr_sess[1];
 $ad_user31=$add_userr_sess[2];
?>
<?php if($ad_user11==1 || $ad_user11==2  ||$ad_user11==3 ||$ad_user21==1 || $ad_user21==2  ||$ad_user21==3 || $ad_user31==1 || $ad_user31==2  ||$ad_user31==3)
{     ?>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/user_listed">Manage User</a>
</li>
<?php }  ?>
</ul>
</li>
<li class="">
<a href="#" ><i class="fa fa-sticky-note nav_icon"></i>Settings<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_class">Add Class</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_subject">Add Subject</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_class_incharge">Add Incharge</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/exam_detail">Add Exam</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/daily_basis">Add Daily Basis</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/time_table">Add Time Table</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_notice">Add  Notice</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/insert_event_name">Insert Event Name</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_event">Add  Event</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/event_detail">Event Detail</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/participate_list">Participate List</a>
</li>
</ul>
</li>

<li class="">
<a href="#" ><i class="fa fa-sticky-note nav_icon"></i>Academic<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_file_upload">Add Notes</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_assignment">Assignment</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/lession_planning">Lession Plan</a>
</li>
<li><a href="<?php echo base_url(); ?>index.php/teacher_controller/staff_attendance">Staff Attandance</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/attendance_report">Attandance</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/marks">Exam Marks</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/test_marks">Test Marks</a>
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
<a href="#"><i class="fa fa-calendar nav_icon"></i>Transport<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_vehicle" class="chart-nav">Add Vehicle</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_rute" class="chart-nav">Add Rute</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_driver" class="chart-nav">Add Driver</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/add_destination" class="chart-nav">Add Destination</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/transport_allocate" class="chart-nav">Transport Allocation</a>
</li>	
</ul>
</li>
<li>
<a href=""><i class="fa fa-user nav_icon"></i>Library<span class="fa arrow"></span> </a>
<ul class="nav nav-second-level collapse">
<li class="">
<a href="<?php echo base_url(); ?>index.php/teacher_controller/Add_category_library">Library category</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/Add_books">Add books</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/Books_request">Add request</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/Books_return">Books return</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/Import_library">Import_library</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/Library_reports">Library reports</a>
</li>

</ul>
</li>

<li>
<a href="#"><i class="fa fa-calendar nav_icon"></i>HR/Payroll<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
        <li>
            <a href="<?php echo base_url(); ?>index.php/teacher_controller/teacher_leave" class="chart-nav">Leave Application</a>
        </li>
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
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/photo_gallery" class="chart-nav"><i class="fa fa-camera nav_icon"></i>Gallery</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/Gate_reciving_timing"><i class="fa fa-certificate nav_icon"></i>Visitor entry</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/teacher_controller/feedback"><i class="fa fa-certificate nav_icon"></i>Feedback</a>
</li>
<li><a href="<?php echo base_url(); ?>index.php/teacher_controller/pickup_drop" class="chart-nav"><i class="fa fa-calendar nav_icon"></i>Pickup/Drop</a>
</li>
					</ul>

				</nav>
			</div>
		</div>
		