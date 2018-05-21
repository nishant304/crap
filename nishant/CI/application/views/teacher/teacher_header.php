<?php

 $count = $this->session->userdata('count');
 $teacher_data = $this->session->userdata('stf_data');
 $name = $teacher_data[0]['stf_id'];
 $t_name = $teacher_data[0]['stf_fname'];
 $t_last = $teacher_data[0]['stf_lname'];
$stff_id_msg = $this->session->userdata('stff_id_msg');

if($teacher_data[0]['stf_id'] == '')
  {
    redirect('student_controller/logout');
  }
 $teacher_sidebar=$this->session->userdata('teacher_sidebar');
      $teacher_background=$this->session->userdata('teacher_background');
      $teacher_header=$this->session->userdata('teacher_header');


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

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style_graph.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bar.css">
<link href='<?php echo base_url();?>application/assets/css/fullcalendar.min.css' rel='stylesheet'>
<link href='<?php echo base_url();?>application/assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print'>


	<!--scrolling js-->
</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section " id="my"  style="background: <?php echo $teacher_header; ?>;">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush" style="background: <?php echo $teacher_header; ?>;"><i class="fa fa-bars"></i></button>
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
						<li class="dropdown head-dpdn_cr"><h2>Current Session:<?php echo date('Y');  ?>-<?php echo date('Y')+1;    ?> </h2></li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo count($stff_id_msg['stff_id_msg']);  ?></span></a>
							<ul class="dropdown-menu">
								
								<li>
									<div class="notification_header">
										<h3>You have <?php echo count($stff_id_msg['stff_id_msg']);  ?>new messages</h3>
									</div>
								</li>
								<?php foreach ($stff_id_msg['stff_id_msg'] as $key) { ?>
								<li>
								   <div class="user_img"><!-- <img src="images/1.png" alt=""> --></div>
								   
								   <div class="notification_desc">
								   <a href="" data-toggle="modal" data-target="#myModal21<?php echo  $key['msg_id'];   ?>">
						<p><?php echo  $key['send_by_student'];   ?> : <?php echo  $key['subject'];   ?></p></a>
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
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $count;?></span></a>
<ul class="dropdown-menu">
<li>
<div class="notification_header">
<h3><?php echo $count;?>Notification</h3>
</div>
</li>
<li><a href="#">
<div class="notification_desc">
<?php foreach($request as $key){ ?>

                                    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $key['student_leave_id']; ?>">
                                    <p><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                    <?php echo $key['message']; ?></p>
                                    <p><?php echo $key['create_on']; ?></p>
                                   
                                    </a>
 
                                    <?php } ?>
</div>
   <div class="clearfix"></div>	
 </a></li>

<div class="notification_bottom">
<a href="<?php echo base_url(); ?>index.php/teacher_controller/student_leave_request_form">See all messages</a>
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
										<p><?php  echo $t_name;  ?></p>
										<span>Teacher</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="<?php echo base_url(); ?>index.php/teacher_controller/attendance"><i class="fa fa-cog"></i> Attendance</a> </li> 
								<li> <a href="<?php echo base_url(); ?>index.php/teacher_controller/msg"><i class="fa fa-cog"></i> Message</a> </li> 
								<li> <a href="<?php echo base_url(); ?>index.php/teacher_controller/staff_profile"><i class="fa fa-user"></i> Profile</a> </li> 
								<li> <a href="<?php echo base_url(); ?>/index.php/teacher_controller/staff_logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
<!--  -->
				<!-- <div class="clearfix"> </div>				 -->
			</div>
			<!-- <div class="clearfix"> </div> -->
				
		</div>
		</div>		



		<!-- color side bar start -->


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

<!-- color side bar end -->




		<!-- ============ Modal content start =======================-->	
 <?php foreach($request as $key){ ?>
 
 <div class="modal fade"   id="myModal<?php echo $key['student_leave_id']; ?>" role="dialog">
<div class="modal-dialog modal-dialog-message">
       <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Message</h4>
 </div>
            <div class="modal-body">
  <table class="table table-striped table-responsive">
    <thead>
      <tr class="active roval_head">
            <th>Stf ID</th>
            <th>leave category</th>
            <th>From date</th>
            <th>To date</th> 
            <th>Message</th>
            <th>Apply</th>
            
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $key['std_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['from_date'];?></td>
        <td><?php echo $key['to_date'];?></td> 
        <td><?php echo $key['message'];?></td>
      
        <?php echo form_open('teacher_controller/student_leave_request_form'); ?>
        <input type="hidden" name="student_leave_id" value="<?php echo $key['student_leave_id'];?>">
        <input type="hidden" name="std_id" value="<?php echo $key['std_id'];?>">
        <td><input type="submit"  name="submit" value="For approval"></input></td>
       </tr>
       <?php echo form_close(); ?>   
   </tbody>
    
  </table>
 </div>
             
         
             <div class="modal-footer">

               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
       </div>
      
      </div>
    </div>

    <?php } ?>
<!-- ================== End Modal content ===============-->


<?php foreach ($stff_id_msg['stff_id_msg'] as $key) { ?>
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

<style type="text/css">
	#page-wrapper
{
  background: <?php echo $teacher_background;  ?> !important;
} 

</style>