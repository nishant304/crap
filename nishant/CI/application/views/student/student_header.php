<?php
error_reporting(0);
      $std_sidebar=$this->session->userdata('std_sidebar');
      $std_background=$this->session->userdata('std_background');
      $std_header=$this->session->userdata('std_header');
foreach ($result_std['selected_student'] as $key) {
echo  $key['std_class'];
}
foreach ($partici_data as $key ) {
$p_id = $key['event_id'];
}
foreach ($notification_count as $key ) {
$count = $key['count("*")'];
}
 
$std_email = $this->session->userdata('std_array'); 
$s_id = $std_email['data'][0]['std_id'];

if($std_email['data'][0]['std_email'] == '')
  {
    redirect('student_controller/logout');
  }
  $student_msg = $this->session->userdata('student_msg');
  $event_notic = $this->session->userdata('event_notic');

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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/rumca.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/example.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style_graph.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bar.css">

 
</head> 


<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- header-starts -->
		<div class="sticky-header header-section" id="my"    style="background: <?php echo $std_header; ?>;">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"  style="background: <?php echo $std_header; ?>;" class="show_sidbar"><i class="fa fa-bars"></i></button>
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
						<li class="dropdown head-dpdn1"><h2>Current Session:<?php echo date('Y');  ?>-<?php echo date('Y')+1;    ?> </h2></li>
                    <li class="dropdown head-dpdn_m">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo count($student_msg['student_msg']);  ?></span></a>
							<ul class="dropdown-menu">
								
								<li>
									<div class="notification_header">
										<h3>You have <?php echo count($student_msg['student_msg']);  ?>new messages</h3>
									</div>
								</li>
								<?php foreach ($student_msg['student_msg'] as $key) { ?>
								<li>
								   <div class="user_img"><!-- <img src="images/1.png" alt=""> --></div>
								   
								   <div class="notification_desc">
								   <a href="" data-toggle="modal" data-target="#myModal21<?php echo  $key['msg_id'];   ?>">
						<p><?php echo  $key['stf_id'];   ?> : <?php echo  $key['subject'];   ?></p></a>
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
<li class="dropdown head-dpdn_in">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $count; ?></span></a>
<ul class="dropdown-menu">
<li>
 


    <!-- <?php //foreach($coming_event as $key5) { ?> -->
<div class="notification_header">
        <?php

        foreach($all_event as $key5) { 
        	if($std_email['data'][0]['std_id'] == $key5['std_id'] && $key5['participate_status']==0){ 
                ?>

              <div class="notification_header">
<a href="#" data-toggle="modal" data-target="#myModal<?php echo $event_notic['partici_data'][0]['event_id'];?>"><h3>You have a event notification all class</h3></a>
</div>	
<?php }} ?>

<?php 
         foreach ($winner_name as $key) {
         	$s_e_id = $key['std_id'];
         	if($s_id == $s_e_id){?>
         <div class="notification_header">
         <a href="#" data-toggle="modal" data-target="#myModal_1<?php echo $key['win_id'];?>"><h3>Winner name</h3></a>
         </div>	       
     <?php  }}?>


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
		
		<li> <a href="<?php echo base_url(); ?>index.php/student_controller/msg"><i class="fa fa-cog"></i> Message</a> </li>  
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







	
  <?php foreach ($all_event_data as $key7) { ?>
  <div class="modal fade" id="myModal<?php echo $key7['event_id']; ?>" role="dialog">
 
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Event Notification</h4>
        </div>
        <div class="modal-body">
     <!-- <?php //foreach($coming_event as $key) {?> -->
      
       <p>
       <div class=" table-responsive col-lg-12 sub_aloct_seconds">          
  <table class="table table-bordered table-hover">
<thead>
<tr class="info">

<th>Event Name</th>
<th>Event Start Date</th>
    <th>Event End Date</th>
<th>Event Start Time</th>
<th>Event End Time</th>
<th>Description</th>
</tr>
</thead>
<tbody>

<tr>
<td><?php echo $key7['event_name']; ?></td>
<td><?php echo $key7['event_date']; ?></td>
<td><?php echo $key7['end_date']; ?></td>
<td><?php echo $key7['event_start_time']; ?></td>
<td><?php echo $key7['event_end_time']; ?></td>
<td><?php echo $key7['description']; ?></td>


</tbody>	
</table>
</div>	
</p>
       
          <a href="<?php echo base_url(); ?>/index.php/student_controller/agree/<?php echo $s_id; ?>/<?php echo $key7['event_id']; ?>"><input type="submit" value="Agree" name="submit"></a>

          <a href="<?php echo base_url(); ?>/index.php/student_controller/decline/<?php echo $s_id; ?>/<?php echo $key7['event_id']; ?>"><input type="submit" value="Decline" name="submit"></a>

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <?php } ?>
<!-- event notification modal end-->
</div>

<?php foreach($winner_name as $winner) { ?>
  <div class="modal fade" id="myModal_1<?php echo $winner['win_id']; ?>" role="dialog">
 
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">winner detail</h4>
        </div>
        <div class="modal-body">
     <!-- <?php //foreach($coming_event as $key) {?> -->
      
       <p>
       <div class=" table-responsive col-lg-12 sub_aloct_seconds">          
  <table class="table table-bordered table-hover">
<thead>
<tr class="info">

<th>Event Name</th>
<th>class</th>
    <th>section</th>
<th>winner1st</th>
<th>class</th>
    <th>section</th>
<th>winner2nd</th>
<th>class</th>
    <th>section</th>
<th>winner3rd</th>
</tr>

</thead>
<tbody>

<tr>
<td><?php echo $winner['event_id']; ?></td>
<td><?php echo $winner['class_name']; ?></td>
<td><?php echo $winner['section_name']; ?></td>
<td><?php echo $winner['winner1st']; ?></td>
<td><?php echo $winner['class_name']; ?></td>
<td><?php echo $winner['section_name']; ?></td>
<td><?php echo $winner['winner2nd']; ?></td>
<td><?php echo $winner['class_name']; ?></td>
<td><?php echo $winner['section_name']; ?></td>
<td><?php echo $winner['winner3rd']; ?></td>
</tr>

</tbody>	
</table>
</div>	

       </div>

 <a href="<?php echo base_url(); ?>/index.php/student_controller/delete_winner_noti/<?php echo $s_id; ?>/<?php echo $winner['win_id']; ?>"><input type="submit" value="delete" name="submit"></a>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <?php   }   ?>
</div>
<!-- message modal for approve or not -->



<style type="text/css">
#page-wrapper
{
  background: <?php echo $std_background;  ?> !important;
} 

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

 <script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;
        
    showLeftPush.onclick = function() {
      // alert('hii');
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };
    

    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }




 $("#showLeftPush").click(function() {
  if ($('.show_sidbar').hasClass('active')) {
       $(this).removeClass("active");
       $("#cbp-spmenu-s1").removeClass("cbp-spmenu-open");
         $(body).removeClass("cbp-spmenu-push-toright");
  }
  else{
    $(this).addClass("active");
    $("#cbp-spmenu-s1").addClass("cbp-spmenu-open");
    $(body).addClass("cbp-spmenu-push-toright");
  }
   });
</script>
