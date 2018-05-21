<?php 
$std_email = $this->session->userdata('std_array'); 
if($std_email['data'][0]['std_email'] == '')
  {
    redirect('student_controller/logout');
  }
  $student_msg = $this->session->userdata('student_msg');

?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style.css">
<script src="<?php echo base_url();?>application/assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>application/assets/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>application/assets/js/Chart.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/clndr.css" type="text/css" />
<script src="<?php echo base_url();?>application/assets/js/underscore-min.js" type="text/javascript"></script>
<script src= "<?php echo base_url();?>application/assets/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/assets/js/clndr.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/assets/js/site.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>application/assets/js/custom.js"></script>
<link href="<?php echo base_url();?>application/assets/css/custom.css" rel="stylesheet">
<script src="<?php echo base_url();?>application/assets/js/jquery.nicescroll.js"></script>
<!-- <script src="<?php //echo base_url();?>application/assets/js/scripts.js"></script>
 -->
 <script src="<?php echo base_url();?>application/assets/js/bootstrap.js"> </script>
 
<style type="text/css">
	#cbp-spmenu-s1
	{
		width: 200px;
	}

</style>


<style type="text/css">
	#cbp-spmenu-s1
	{
		width: 200px;
	}
	.logo a span
	{
color: #ce2d2d;
	}
	.logo a h1
	{
		color: #ce2d2d;
	}

	.logo {
    background: none;
}
.nav > li > a {
	    padding: 4px 15px;
	}
	.nav > li > a {
	    padding: 4px 15px;
	}
	img
	 {
    vertical-align: middle;
    height: 42px;
    width: 42px;
    border-radius: 62px;
}
</style>

</head> 


<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="<?php base_url(); ?>student_dashboard" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-cogs nav_icon"></i>Student Note <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="<?php base_url(); ?>student_note">Ebook</a>
								</li>
								<li>
									<a href="<?php base_url(); ?>student_assignment">Assignment</a>
								</li>
							</ul>
						</li>
					

							<li>
							<a href="<?php base_url(); ?>student_mark"><i class="fa fa-book nav_icon"></i>Result </a>
							
							</li>
					
							<li>
						<a href="<?php echo base_url();?>index.php/student_controller/student_leave"><i class="fa fa-book nav_icon"></i>Request For Leave </a>

						</li>
						<li>
						<a href="<?php base_url(); ?>student_exam_schdule"><i class="fa fa-book nav_icon"></i>Exam Schdule </a>
							
						</li>
						<li>
						<a href="<?php base_url(); ?>student_attend"><i class="fa fa-book nav_icon"></i>Attendance</a>
							
						</li>
						
						<li>
							<a href="<?php base_url(); ?>student_paid_list"><i class="fa fa-book nav_icon"></i>Payment</a>
							
						</li>
						<li>
							<a href="charts.html"><i class="fa fa-user nav_icon"></i>Progress Info</a>
							
						</li>
						<li>
							<a href="#"><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="inbox.html">Inbox <span class="nav-badge-btm">05</span></a>
								</li>
								<li>
									<a href="compose.html">Compose email</a>
								</li>
							</ul>
							
						</li>

						<li>
							<a href="<?php base_url(); ?>student_event"><i class="fa fa-envelope nav_icon"></i>Events</a>
						
						</li>

						<li>
							<a href="notice.html"><i class="fa fa-envelope nav_icon"></i>Notice</a>
						</li>

						<li>
							<a href="fee_structure.html"><i class="fa fa-envelope nav_icon"></i>Fee Structure</a>
						</li>
					

						
					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a>
						<img src="http://localhost/CI/application/assets/images/logotecinso.png"/ style="height: 42px; width: 211px; border-radius: 62px;" >
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				
				<div class="clearfix"> </div>
			</div>
		
			<div class="header-right">
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
					
		
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
							<ul class="dropdown-menu">
								
								<li>
									<div class="notification_header">
										<h3>You have <?php echo count($student_msg);  ?>new messages</h3>
									</div>
								</li>
								<?php foreach ($student_msg['student_msg'] as $key) { ?>
								<li>
								   <div class="user_img"><!-- <img src="images/1.png" alt=""> --></div>
								   
								   <div class="notification_desc">
								   <a href="" data-toggle="modal" data-target="#myModal21<?php echo  $key['msg_id'];   ?>">
						<p><?php echo  $key['subject'];   ?></p></a>
									</div>


								   <div class="clearfix"></div>	
								</li>
								<?php } ?>
								<li>
									<div class="notification_bottom">
										<a href="#">See all messages</a>
									</div> 
								</li>
							</ul>
						</li>
						
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 3 new notification</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="user_img"><img src="images/2.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p><span>1 hour ago</span></p>
									</div>
								  <div class="clearfix"></div>	
								 </a></li>
								 <li class="odd"><a href="#">
									<div class="user_img"><img src="images/1.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								 <li><a href="#">
									<div class="user_img"><img src="images/3.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								 <li>
									<div class="notification_bottom">
										<a href="#">See all notifications</a>
									</div> 
								</li>
							</ul>
						</li>	
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">15</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 8 pending task</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Database update</span><span class="percentage">40%</span>
										<div class="clearfix"></div>	
									</div>
									<div class="progress progress-striped active">
										<div class="bar yellow" style="width:40%;"></div>
									</div>
								</a></li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
									   <div class="clearfix"></div>	
									</div>
									<div class="progress progress-striped active">
										 <div class="bar green" style="width:90%;"></div>
									</div>
								</a></li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
										<div class="clearfix"></div>	
									</div>
								   <div class="progress progress-striped active">
										 <div class="bar red" style="width: 33%;"></div>
									</div>
								</a></li>
								<li><a href="#">
									<div class="task-info">
										<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
									   <div class="clearfix"></div>	
									</div>
									<div class="progress progress-striped active">
										 <div class="bar  blue" style="width: 80%;"></div>
									</div>
								</a></li>
								<li>
									<div class="notification_bottom">
										<a href="#">See all pending tasks</a>
									</div> 
								</li>
							</ul>
						</li>	
					</ul>
					<div class="clearfix"> </div>
				</div>


				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><?php  ?> </span> 
									<div class="user-name">
										<p><?php print_r($std_email['data'][0]['std_fname']); ?></p>
										<span>Student</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="<?php echo base_url(); ?>/index.php/student_controller/student_info"><i class="fa fa-user"></i> Profile</a> </li>
								<li> <a href="<?php echo base_url(); ?>/index.php/student_controller/marks_analyse"><i class="fa fa-user"></i> Marks_analyse</a> </li>

								<li> <a href="<?php echo base_url(); ?>/index.php/student_controller/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
<?php foreach ($student_msg['student_msg'] as $key) { ?>
<div id="myModal21<?php echo  $key['msg_id'];   ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p><?php echo  $key['message'];   ?></p>
      </div>
      <div class="modal-footer">
      <?php echo  $key['msg_created'];   ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php }  ?>