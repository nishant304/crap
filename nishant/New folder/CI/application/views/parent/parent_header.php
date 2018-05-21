<?php 

$parent_detailed = $this->session->userdata('parent_detailed');
$student_detailed = $this->session->userdata('student_detailed');
$login_from = $this->session->userdata('login_from');
$parent_msg=$this->session->userdata('parent_msg');
$parent_sidebar=$this->session->userdata('parent_sidebar');
$parent_background=$this->session->userdata('parent_background');
$parent_header=$this->session->userdata('parent_header');


if($login_from=="std_father_email"){
	echo $parent="father";
}
if($login_from=="std_mother_email"){
	echo $parent="mother";
}
if($login_from=="std_guardian_email"){
	echo $parent="guardian";
}
 $this->session->set_userdata('parent',$parent);

 
 if($student_detailed[0][$login_from] == '')
  {
    redirect('parent_controller/logout');
  }

?>
<!DOCTYPE HTML>
<html>
<head>


<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/animate.css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style.css">
<script src="<?php echo base_url();?>application/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>application/assets/js/modernizr.custom.js"></script>
<!-- <script src="<?php// echo base_url();?>application/assets/js/Chart.js"></script> -->
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
		
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section " id="my" style="background: <?php echo $parent_header;?>;">
			<div class="header-left">
				<!--toggle button stafvrt-->
				<button id="showLeftPush"  style="background: <?php echo $parent_header;?>;" class="show_sidbar"  ><i class="fa fa-bars"></i></button>
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
						<li class="dropdown head-dpdn_cr"><h2>Current Session:<?php echo date('Y');  ?>-<?php echo date('Y')+1;    ?> </h2></li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo count($parent_msg);  ?></span></a>
							<ul class="dropdown-menu">
								
								<li>
									<div class="notification_header">
										<h3>You have <?php echo count($parent_msg);  ?>new messages</h3>
									</div>
								</li>
								<?php foreach ($parent_msg as $key) { ?>
								<li>
<div class="user_img"><!-- <img src="images/1.png" alt=""> --></div>
<div class="notification_desc">
<?php if($key['status']=='1'){   ?>
<a id="anger" href="" onclick='msg_id<?php echo  $key['msg_id'];?>();'  data-toggle="modal" data-target="#myModal21<?php echo  $key['msg_id'];   ?>">  
<input type="hidden" id='msg_id<?php echo $key['msg_id'];?>' value="<?php echo $key['msg_id'];?>">
						<p style="color: red;"sytl><?php echo  $key['stf_id'];   ?> :<?Php echo $key['status'];  ?> <?php echo  $key['subject'];   ?></p>
						</a>
<?php   }  else {   ?>
<a href="" onclick='msg_id<?php echo  $key['msg_id'];?>();'  data-toggle="modal" data-target="#myModal21<?php echo  $key['msg_id'];   ?>">  
<input type="hidden" id='msg_id<?php echo $key['msg_id'];?>' value="<?php echo $key['msg_id'];?>">
						<p><?php echo  $key['stf_id'];   ?> :<?Php echo $key['status'];  ?> <?php echo  $key['subject'];   ?></p>
						</a>
<?php  }  ?>

									</div>


								   <div class="clearfix"></div>	
								</li>
								<?php } ?>
								<li>
									<div class="notification_bottom">
										<a href="msg">See all messages</a>
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
										<p><?php print_r($student_detailed[0][$login_from]); ?></p>
										<span><?php echo $parent ?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu1">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="<?php echo base_url(); ?>/index.php/parent_controller/msg"><i class="fa fa-cog"></i> Message</a> </li> 
								<li> <a href="<?php echo base_url(); ?>/index.php/login_controller/student_info"><i class="fa fa-user"></i> Profile</a> </li>
								<li> <a href="<?php echo base_url(); ?>/index.php/parent_controller/notification"><i class="fa fa-user"></i> Notification</a> </li>
								<li> <a href="<?php echo base_url(); ?>/index.php/parent_controller/request"><i class="fa fa-user"></i> Request</a> </li>

								<li> <a href="<?php echo base_url(); ?>/index.php/parent_controller/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
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






<?php foreach ($parent_msg as $key) { ?>
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
<?php foreach ($parent_msg as $key) { ?>
<script type="text/javascript">
function msg_id<?php echo  $key['msg_id'];?>()
{
var msg_id=document.getElementById('msg_id<?php echo $key['msg_id'];?>').value;
$.ajax({  
      type    : "POST",
      url     : "<?php echo base_url();?>index.php/parent_controller/msg_id/"+msg_id+"/",  
      data    : {'msg_id':msg_id},
      success : function(data){
      }
      });
}	
</script>
<?php }  ?>

<style type="text/css">
	#fa {
    margin-left: 1400px;
    background: #000000c4;
    width: 240px;
    margin-top: -530px;
    position: fixed;
    z-index: 999;
}
#fa ul li a{
	color: #6fc5ca;
    font-size: 15px;
}
#page-wrapper
{
	background: <?php echo $parent_background;  ?> !important;
}
#page-wrapper1
{
	background: <?php echo $parent_background;  ?> !important;
}	
</style>

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





