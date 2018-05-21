 <?php
$count = $this->session->userdata('count');

 $teacher_data = $this->session->userdata('stf_data');
 $name = $teacher_data[0]['stf_id'];
 $t_name = $teacher_data[0]['stf_fname'];
 $t_last = $teacher_data[0]['stf_lname'];

 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Novus Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/custom.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/clndr.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/jquery-ui.css">

<!--scrolling js-->
</head>
<body class="cbp-spmenu-push">
<div class="main-content">
<!--left-fixed -navigation-->

<!--left-fixed -navigation-->
<!-- header-starts -->
<div class="sticky-header header-section ">
<div class="header-left">
<!--toggle button start-->
<button id="showLeftPush"><i class="fa fa-bars"></i></button>
<!--toggle button end-->
<!--logo -->
<div class="logo">
<a href="index.html">
<h1>Logo</h1>
<span>My School</span>
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
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo $count;?></span></a>
<ul class="dropdown-menu">
<li>
<div class="notification_header">
<h3>You have <?php echo $count;?> new messages</h3>
</div>
</li>
<li>
  <a href="#"> 
  <div class="user_img">
   <?php foreach($request as $key){ ?>
   <img src="images/1.png" alt="">
   <?php } ?>
   </div>
   <div class="notification_desc">
   <?php foreach($request as $key){ ?>
<a "><p><?php echo $key['message'];?></p></a>
<p><span><?php echo $key['created_on'];?></span></p>
<?php } ?>


</div>
   <div class="clearfix"></div>	
 </a> 
</li>

<div class="notification_bottom">
<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_leave_request_form">See all messages</a>
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
<span class="prfil-img"><img src="images/a.png" alt=""> </span> 
<div class="user-name">
<p><?php echo $t_name." ".$t_last;?></p>
<span>Teacher</span>
</div>
<i class="fa fa-angle-down lnr"></i>
<i class="fa fa-angle-up lnr"></i>
<div class="clearfix"></div>	
</div>	
</a>
<ul class="dropdown-menu drp-mnu">
<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
<li> <a href="<?php echo base_url(); ?>index.php/teacher_controller/staff_profile"><i class="fa fa-user"></i> Profile</a> </li> 
<li> <a href="<?php echo base_url(); ?>/index.php/teacher_controller/staff_logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
</ul>
</li>
</ul>
</div>

<div class="clearfix"> </div>	
</div>
<div class="clearfix"> </div>

</div>
</div>