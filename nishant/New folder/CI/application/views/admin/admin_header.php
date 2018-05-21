<?php
date_default_timezone_set("Asia/Kolkata");
   $admin_header =$this->session->userdata('admin_header');
      $admin_background =$this->session->userdata('admin_background');
$count = $this->session->userdata('count');
$all_data = $this->session->userdata($data_admin); 
 foreach ($all_data['result'] as $key)
 {
 
 	$admin_name1 = $key['admin_name'];
 }
  foreach ($all_data['all_student'] as $student_data)
 {
 
	$student_fname = $student_data['user_fname'];
 	$student_lname = $student_data['user_lname'];
 	$student_email = $student_data['user_email'];
 	$student_class = $student_data['user_class'];
 	$student_father_name = $student_data['user_father_name'];
 	$student_mother_name = $student_data['user_mother_name'];
 	$student_blood_group = $student_data['user_blood_group'];
 	$student_birth_date = $student_data['user_birth_date'];
 	$student_registration_date = $student_data['user_registration_date'];
 	$student_gender = $student_data['user_gender'];
 	$student_address = $student_data['user_address'];
 	$student_mobile = $student_data['user_mobile'];

 }
if($key['admin_email'] == '')
{
	redirect('admission/');
}

 ?>

<!DOCTYPE HTML>
<html>
<head>
<title>Novus Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/custom.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style_graph.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bar.css">
<link href='<?php echo base_url();?>application/assets/css/fullcalendar.min.css' rel='stylesheet'>
<link href='<?php echo base_url();?>application/assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print'>

<script src="<?php echo base_url();?>application/assets/js/jquery.min.js"></script>
<script src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section" id="my" style="background: <?php echo $admin_header;?>;">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush" style="background: <?php echo $admin_header;     ?>"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="admin_info">
						<h1>Logo</h1>
						<span>My School</span>
					</a>
				</div>
				
				
<div class="clearfix"> </div>
</div>
<div class="header-right">

<div class="profile_details_left">

		<li class="dropdown head-dpdn1" ><h2 id="
		">Time:<?php echo date('h:i a');  ?> </h2></li>

<li class="dropdown head-dpdn1"><h2>Current Session:<?php echo date('Y');  ?>-<?php echo date('Y')+1;    ?> </h2></li>

<li class="dropdown head-dpdn_m">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo $count;?></span></a>
<ul class="dropdown-menu">
<li>
<div class="notification_header">
<h3>You have <?php echo $count;?> Notification</h3>
</div>
</li>
<li>
 
                                     
  <a href="#"> 

   <div class="notification_desc">
   <?php foreach($teacher_leave as $key){ ?>

                                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $key['student_leave_id']; ?>">
                                    <p><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                    <?php echo $key['message']; ?></p>
                                    <p><?php echo $key['create_on']; ?></p>
                                   
                                    </a>
 
                                    <?php } ?>

                                    </div>
   <div class="clearfix"></div>	
 </a> 

 </li>

<div class="notification_bottom">
<a href="<?php echo base_url();?>index.php/admission/leave_approval">See all messages</a>
</div> 
<!-- </li> -->
</ul>
</li>
						
					<!-- </ul> -->
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
										<p><?php echo $admin_name1; ?></p>
										<span>Admin</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="<?php echo base_url(); ?>/index.php/admission/school_profile"><i class="fa fa-sign-out"></i> Setting</a> </li>
								<li> <a href="<?php echo base_url(); ?>/index.php/admission/admin_notify"><i class="fa fa-sign-out"></i> Message</a> </li>
								<li> <a href="<?php echo base_url(); ?>/index.php/admission/admin_logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>

				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>
				
		</div>
		</div>

	<button id="yu">Configuration</button>
	<div id="bu"></div>


	
<div id="fa">

    <a id="mySidenav" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home-colorsidebar">Header</a></li>
  <li><a data-toggle="tab" href="#menu-upper-first">Sidebar</a></li>
  <li><a data-toggle="tab" href="#menu-upper-second">body</a></li>
</ul>

<div class="tab-content">
  <div id="home-colorsidebar" class="tab-pane fade in active">

<span onclick="black()" class="chang_clr"><input type="button" style="background-color:black" hover="background-color:#3e8e41" value="" name="B1"  />black</span>

<span onclick="blue()" class="chang_clr"><input type="button" style="background-color:blue" value="" name="B2" />blue</span>

<span onclick="fuchsia()" class="chang_clr"><input type="button" style="background-color:#ff00ff" value="" name="B3" />pink</span>

<span onclick="green()" class="chang_clr"><input type="button" style="background-color:green" value="" name="B4" />green</span>

<span  onclick="oil()" class="chang_clr"><input type="button" style="background-color:#808000" value="" name="B7" />oil</span>

<span onclick="purple()" class="chang_clr"><input type="button" style="background-color:purple" value="" name="B5" />purple</span>

<span  onclick="red()" class="chang_clr"><input type="button" style="background-color:red" value="" name="B6" />red</span>

<span onclick="orange()" class="chang_clr"><input type="button" style="background-color:#c44000" value="" name="B8" />orange</span>

<span onclick="white()" class="chang_clr"><input type="button" style="background-color:white" value="" name="B9" />white</span>

<span onclick="brown()" class="chang_clr"><input type="button" style="background-color:brown" value="" name="B10" />brown</span>

<span onclick="yellow()" class="chang_clr"><input type="button" style="background-color:yellow" value="" name="B11" />yellow</span>

<span onclick="lgreen()" class="chang_clr"><input type="button" style="background-color:#00ff00" value="" name="B12" />lgreen</span>
  </div>



  <div id="menu-upper-first" class="tab-pane fade">


<span onclick="black1()" class="chang_clr"><input type="button" style="background-color:black" hover="background-color:#3e8e41" value="" name="s1" />black</span>

<span onclick="blue1()" class="chang_clr"><input type="button" style="background-color:blue" value="" name="s2" />blue</span>

<span onclick="fuchsia1()" class="chang_clr"><input type="button" style="background-color:#ff00ff" value="" name="s3" />pink</span>

<span onclick="green1()" class="chang_clr"><input type="button" style="background-color:green" value="" name="s4" />green</span>

<span onclick="oil1()" class="chang_clr"><input type="button" style="background-color:#808000" value="" name="s7" />oil</span>

<span onclick="purple1()" class="chang_clr"><input type="button" style="background-color:purple" value="" name="s5" />purple</span>

<span onclick="red1()" class="chang_clr"><input type="button" style="background-color:red" value="" name="s6"  />red</span>

<span onclick="orange1()" class="chang_clr"><input type="button" style="background-color:#c44000" value="" name="s8" />orange</span>

<span onclick="white1()" class="chang_clr"><input type="button" style="background-color:white" value="" name="s9" />white</span>

<span onclick="brown1()" class="chang_clr"><input type="button" style="background-color:brown" value="" name="s10" />brown</span>

<span onclick="yellow1()" class="chang_clr"><input type="button" style="background-color:yellow" value="" name="s11" />yellow</span>

<span onclick="lgreen1()" class="chang_clr"><input type="button" style="background-color:#00ff00" value="" name="s12" />lgreen</span>
  </div>




  <div id="menu-upper-second" class="tab-pane fade">

<span onclick="black2()" class="chang_clr"><input type="button" style="background-color:black" hover="background-color:#3e8e41" value="" name="m1" />black</span>

<span onclick="blue2()" class="chang_clr"><input type="button" style="background-color:blue" value="" name="m2" />blue</span>

<span onclick="fuchsia2()" class="chang_clr"><input type="button" style="background-color:#ff00ff" value="" name="m3" />pink</span>

<span onclick="green2()" class="chang_clr"><input type="button" style="background-color:green" value="" name="m4" />green</span>

<span onclick="oil2()" class="chang_clr"><input type="button" style="background-color:#808000" value="" name="m7" />oil</span>

<span onclick="purple2()" class="chang_clr"><input type="button" style="background-color:purple" value="" name="m5" />purple</span>

<span onclick="red2()" class="chang_clr"><input type="button" style="background-color:red" value="" name="m6" />red</span>

<span onclick="orange2()" class="chang_clr"><input type="button" style="background-color:#c44000" value="" name="m8" />orange</span>

<span onclick="white2()" class="chang_clr"><input type="button" style="background-color:white" value="" name="m9" />white</span>

<span onclick="brown2()" class="chang_clr"><input type="button" style="background-color:brown" value="" name="m10" />brown</span>

<span onclick="yellow2()" class="chang_clr"><input type="button" style="background-color:yellow" value="" name="m11" />yellow</span>

<span onclick="lgreen2()" class="chang_clr"><input type="button" style="background-color:#00ff00" value="" name="m12" />lgreen</span>
  </div>
</div>







  
</div>
<style type="text/css">
#page-wrapper
{
	background: <?php echo $admin_background;  ?> !important;
}	


</style>