<?php   $std_sidebar=$this->session->userdata('std_sidebar');  ?>

<div class=" sidebar" role="navigation">
<div class="navbar-collapse">
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="background: <?php echo $std_sidebar; ?>">
<ul class="nav" id="side-menu">
<li>
<a href="<?php echo base_url();?>index.php/student_controller/dashboard"><i class="fa fa-home nav_icon"></i>Dashboard</a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/student_controller/marks_analyse"><i class="fa fa-book nav_icon"></i>Result </a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/student_controller/msg"><i class="fa fa-book nav_icon"></i>Message</a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/student_controller/attendance"><i class="fa fa-book nav_icon"></i>Attendance </a>
</li>
<li>
<a href="<?php echo base_url();?>index.php/student_controller/student_leave"><i class="fa fa-book nav_icon"></i>Request For Leave </a>

</li>

<li>
<a href="<?php echo base_url(); ?>index.php/student_controller/notes_view"><i class="fa fa-book nav_icon"></i>Notes</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/student_controller/assignment_view"><i class="fa fa-book nav_icon"></i>Assignment</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/student_controller/exam_view"><i class="fa fa-book nav_icon"></i>Exam View</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/student_controller/test_exam_view"><i class="fa fa-book nav_icon"></i>Test Exam View</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/student_controller/time_table"><i class="fa fa-book nav_icon"></i>Time Table</a>
</li>
<li>
<a href="<?php echo base_url(); ?>index.php/student_controller/lession_plan_view"><i class="fa fa-book nav_icon"></i>Lession Plan</a>
</li>


<li>
<a href="<?php echo base_url(); ?>index.php/student_controller/feedback"><i class="fa fa-book nav_icon"></i>Feedback</a>
</li>


</ul>
</nav>
</div>
</div>
		
