<?php
 $admin_sidebar=$this->session->userdata('admin_sidebar');
 $count = $this->session->userdata('count');?>
<div class=" sidebar" role="navigation">
<div class="navbar-collapse">
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="background: <?php echo $admin_sidebar; ?>">
<ul class="nav" id="side-menu">
	<?php $i = 0;		
 ?>
<li class="<?php echo ++$i;?>">
<a href="<?php echo base_url(); ?>index.php/admission/admin_info" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
</li>
<li class="<?php echo ++$i;?>">
<a href="<?php echo base_url(); ?>index.php/admission/role_permission" class="active"><i class="fa fa-certificate nav_icon"></i>Authority</a>
</li>

<li>
<a href="<?php echo base_url(); ?>index.php/admission/promote" class="active"><i class="fa fa-certificate nav_icon"></i>Promotion</a>
</li>

<li>
<a href=""><i class="fa fa-user nav_icon"></i>Users<span class="fa arrow"></span> </a>
<ul class="nav nav-second-level collapse">
<li class="">
<a href="<?php echo base_url(); ?>index.php/admission/add_user">Add User</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/user_listed">Manage User</a>
</li>
</ul>
</li>
<li class="">
<a href="#" ><i class="fa fa-sticky-note nav_icon"></i>Settings<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_class">Add Class</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_subject">Add Subject</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_class_incharge">Add Incharge</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/exam_detail">Add Exam</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/daily_basis">Add Daily Basis</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/time_table">Add Time Table</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_notice">Add  Notice</a>
</li>

<li>
<a href="<?php echo base_url(); ?>index.php/admission/insert_event_name">Insert Event Name</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_event">Add  Event</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/event_detail">Event Detail</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/participate_list">Participate List</a>
</li>
</ul>
</li>


<li class="">
<a href="#" ><i class="fa fa-sticky-note nav_icon"></i>Academic<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url(); ?>index.php/admission/student_file_upload">Add Notes</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_assignment">Assignment</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/lession_planning">Lession Plan</a>
</li>
<li><a href="<?php echo base_url(); ?>index.php/admission/staff_attendance">Staff Attandance</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/attendance_report">Attandance</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/marks">Exam Marks</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/test_marks">Test Marks</a>
</li>


</ul>
</li>


<li>
<a href="#"><i class="fa fa-envelope nav_icon"></i>Allocation<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url(); ?>index.php/admission/assign_subject_class">Assign subject/Teacher</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/assign_rol_sec">Assign Section/Roll no.</a>
</li>
</ul>
</li>


<li>
<a href="#"><i class="fa fa-calendar nav_icon"></i>HR/Payroll<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="#">Leave Management<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url();?>index.php/admission/category" class="chart-nav" class="chart-nav">Add category</a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/admission/designation" class="chart-nav">Add designation</a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/admission/leave" class="chart-nav">Add leave</a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/admission/leave_approval" class="chart-nav">Leave Request&nbsp;&nbsp;<?php echo $count;?></a>
</li>
</ul>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/fee_detail" class="chart-nav">Fees Structure</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/student_fee_detail" class="chart-nav">Student Fees Detail</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/leave_detail" class="chart-nav">Leave Detail</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/payhead_type" class="chart-nav">Add Pay Head</a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/admission/salary_set" class="chart-nav">Staff Salary set</a>
</li>

<li>
<a href="<?php echo base_url(); ?>index.php/admission/salary_pay" class="chart-nav">Staff Salary pay</a>
</li>


</ul>
 <li>
<a href="#"><i class="fa fa-calendar nav_icon"></i>Transport<span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_vehicle" class="chart-nav">Add Vehicle</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_rute" class="chart-nav">Add Rute</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_driver" class="chart-nav">Add Driver</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/add_destination" class="chart-nav">Add Destination</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/transport_allocate" class="chart-nav">Transport Allocation</a>
</li>	
</ul>
</li>

<li>
<a href="<?php echo base_url(); ?>index.php/admission/photo_gallery" class="chart-nav"><i class="fa fa-camera nav_icon"></i>Gallery</a>
</li>

<li>
<a href=""><i class="fa fa-user nav_icon"></i>Library<span class="fa arrow"></span> </a>
<ul class="nav nav-second-level collapse">
<li class="">
<a href="<?php echo base_url(); ?>index.php/admission/Add_category_library">Library category</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/Add_books">Add books</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/Books_request">Add request</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/Books_return">Books return</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/Import_library">Import_library</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/Library_reports">Library reports</a>
</li>

</ul>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/Gate_reciving_timing"><i class="fa fa-certificate nav_icon"></i>Visitor entry</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/admission/feedback"><i class="fa fa-certificate nav_icon"></i>Feedback</a>
</li>
</ul>
</nav>
</div>
</div>

<!-- <a href="#"><i class="fa fa-calendar nav_icon"></i>Transport<span class="fa arrow"></span></a> -->