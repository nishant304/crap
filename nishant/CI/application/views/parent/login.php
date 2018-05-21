<!DOCTYPE HTML>
<html>
<head>
<title>Novus Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Login Page :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head> 
<nav class="navbar navbar">
   <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://localhost/CI/"><img src="<?php echo base_url();?>application/assets/images/img.png" class="img-responsive "  style="margin-top: -6px; width: 100px; " ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav pull-right ul_mnnuu">
      <li class="active"><a href="http://localhost/CI/" class="hm hom_clrssss">HOME</a></li>
<!--        <li><a href="about.html" class="hm">FEATURES</a></li>
 -->      <li class="dropdown">
        <a class="dropdown-toggle hm hom_clrssss" data-toggle="dropdown" href="#" > FEATURES
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" class="hom_clrssss margin_list_clrss" >WEB FEATURES</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss">ANDROID APP FEATURES</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > IOS APP FEATURES</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" >SCHOOL BUS TRACKING SYSTEM</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > BENEFITS OF ZERO ERP</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > TYPE</a></li>
        </ul>
      </li>
      <li><a href="#" class="hm hom_clrssss">PRICING</a></li>
      <li><a href="#" class="hm hom_clrssss">BLOG</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle hm hom_clrssss" data-toggle="dropdown" href="#" > HELPS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" class="hom_clrssss margin_list_clrss" > HELPS BLOG</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > PARENT'S HELP</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > STUDENT'S HELP</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss"> STAFF HELP</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > ZEROERP FAQ</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > SCHOOL MANAGEMENT</a></li>
          <li><a href="#" class="hom_clrssss margin_list_clrss" > SOFTWARE MANUAL</a></li>
        </ul>
      </li>
     
      <li><a href="<?php echo base_url();?>index.php/admission/login_page"><button type="button" class="btn btn-danger login_butnsso">Login</button></a></li>
     

    </ul>
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
  </div>
</nav> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">SignIn Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome back to Novus AdminPanel ! <br> Not a Member? <a href="signup.html">  Sign Up »</a> </h4>
					</div>
					<div class="login-body">
<?php echo form_open('parent_controller/parent_login_function'); ?>
<input type="text" class="user" name="parent_email" placeholder="Enter your email" required="">
<input type="password" name="parent_password" class="lock" placeholder="password">
<input type="submit" name="SignIn" value="Sign In">
<div class="forgot-grid">
<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
<div class="forgot">
<a href="#">forgot password?</a>
</div>
<div class="clearfix"> </div>
</div>
<?php echo form_close(); ?>
</div>
</div>
				
				
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
        <!--//footer-->
	</div>


   <script src="js/bootstrap.js"> </script>
</body>
</html>


<style type="text/css">
  .ul_mnnuu{
    font-size: 12px;
    font-family: -webkit-body;
  }
 
 .hom_clrssss{
  color: gray;
 }
 .login_butnsso{
  border-radius: 0px;
 }

</style>