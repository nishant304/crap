<?php 

 // $this->session->set_userdata($myarray);
 $user_email = $this->session->userdata('user_email'); 
 $user_fname = $this->session->userdata('user_fname'); 
 $user_lname = $this->session->userdata('user_lname'); 
 $user_father_name = $this->session->userdata('user_father_name'); 
 $user_mother_name = $this->session->userdata('user_mother_name'); 
 $user_blood_group = $this->session->userdata('user_blood_group'); 
 $user_birth_date = $this->session->userdata('user_birth_date'); 
 $user_reg_date = $this->session->userdata('user_reg_date'); 
 $user_gender = $this->session->userdata('user_gender'); 
 $user_address = $this->session->userdata('user_address'); 
 $user_mobile = $this->session->userdata('user_mobile');
 $user_image = $this->session->userdata('user_image'); 
 $photo='<img src="http://localhost/CI/application/assets/uploads/'.$user_image.'"/>';


?>


		<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Profile Info</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
			<?php echo form_open_multipart('login_controller/upload_profile_image'); ?>
						
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_fname; ?>" name="user_fname" id="name"  placeholder="Enter your Name" disabled/>
								</div>
							</div>
						</div>
							<div class="form-group">

							<label for="name" class="col-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_lname; ?>" name="user_lname" id="name"  placeholder="Enter your Name" disabled/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_email; ?>" name="user_email" id="email"  placeholder="Enter your Email" disabled/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Registration Date</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="date" class="form-control" value="<?php echo $user_birth_date; ?>" name="user_reg_date" id="password"  placeholder="Enter your Password" disabled/>
								</div>
							</div>
						</div>
					<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Father's Name:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users " aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_father_name; ?>" name="user_father_name" id="confirm"  placeholder="Confirm your Password" disabled/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Mother's Name:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users " aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_mother_name; ?>" name="user_mother_name" id="confirm"  placeholder="Confirm your Password" disabled/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Blood Group</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_blood_group; ?>" name="user_blood_group" id="confirm"  placeholder="Confirm your Password" disabled/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Birth Date</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="Date" class="form-control" value="<?php echo $user_birth_date; ?>" name="user_birth_date" id="confirm"  placeholder="Confirm your Password" disabled/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_address; ?>" name="user_address" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Mobile</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" value="<?php echo $user_mobile; ?>" name="user_mobile" id="user_mobile"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
			<div class="form-group">
				<label for="confirm" class="col-sm-2 control-label" style="padding-top: 0px;">Gender</label>
				<div class="cols-sm-10">
				<div class="input-group">
		<input type="radio" name="user_gender" value="male" <?php if($user_gender == 'male') { ?> checked <?php } ?> disabled>Male

		<input type="radio" name="user_gender" value="female" <?php if($user_gender == 'female') { ?> checked <?php } ?> disabled>Female
					</div>
				</div>
			</div>
				<div class="form-group">
							<label for="confirm" class="col-sm-2 control-label">Upload profile image</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">
									<input type="file" class="form-control" name="user_image" id="confirm" />
								</div>
							</div>
						</div>

						<div class="form-group col-lg-2" style="margin-left: 257px;">
							<input type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">
						</div>
					<?php echo form_close(); ?>
				</div>
				<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by Tecinso</p>
		</div>
<style type="text/css">


			body, html
			{
			 	background-repeat: no-repeat;
			 	background-color: #d3d3d3;
			 	font-family: 'Oxygen', sans-serif;
			}

			.main
			{
			 	margin-top: 50px;
			}

			h1.title 
			{ 
				font-size: 35px;
				font-family: 'Passion One', cursive; 
				font-weight: 400; 
			}

			hr
			{
				width: 10%;
				color: #fff;
			}

			.form-group
			{
				margin-bottom: 15px;
			}

			label
			{
				margin-bottom: 15px;
			}

			input,
			input::-webkit-input-placeholder 
			{
			    font-size: 11px;
			    padding-top: 3px;
			}

		.main-login
		{
		 	background-color: #fff;
		    /* shadows and rounded borders */
		    -moz-border-radius: 2px;
		    -webkit-border-radius: 2px;
		    border-radius: 2px;
		    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		    height: 837px;
		    margin-left: 303px;
		   

		}

	.main-center
	{
	 	margin-top: 30px;
	 	
	 	margin: 0 auto;
	 	max-width: 70%;
	    padding: 40px 40px;
	     margin-left: 303px;
	     box-shadow: 4px -3px 16px -3px;
	      margin-top: -23px;

	}


	.login-button
	{
		margin-top: 5px;
	}

	.login-register
	{
		font-size: 11px;
		text-align: center;
	}
	.form-horizontal
	{
		margin-left: 147px;
	}

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
.nav > li > a 
{
	    padding: 4px 15px;
	}
	.nav > li > a 
	{
	    padding: 4px 15px;
	}
	.control-label
	{
		padding-left: 0px;
	}
.input-group
{
	width: 400px;
	padding: 2px 8px 11px 20px;
}
.panel-heading
{
	margin-top: 70px;
    margin-left: 200px;
}
.control-label
{
	font-size: 13px;
	text-align: center;
}
 
	</style>