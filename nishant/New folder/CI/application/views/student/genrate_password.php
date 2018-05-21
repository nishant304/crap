<?php 

$get_session_code = $this->input->get('confirm_code');

?>
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
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
 <link href="css/custom.css" rel="stylesheet">
</head> 

<body class="cbp-spmenu-push">
	<div class="main-content">

		<div id="page-wrapper">
			<div class="main-page login-page ">
			  <h3 class="title1">Genrate Password</h3>
				<div class="widget-shadow">
					<div class="login-body">
					<?php echo form_open('genrate_pass/genrate/?confirm_code='.$get_session_code); ?>
		
							<input type="password" class="user" name="user_password" placeholder="Enter your Password" required="">
							<input type="password" name="confirm_password" class="lock" placeholder="Retype Password">
							<input type="submit" name="SignIn" value="Genrate">
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
	
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://tecinso.com/" target="_blank">Tecinso</a></p>
		</div>
      
	</div>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

   <script src="js/bootstrap.js"> </script>
</body>
</html>

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

</style>