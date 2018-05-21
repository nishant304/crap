
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bootstrap.css">
<script src="<?php echo base_url();?>application/assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>application/assets/js/bootstrap.js"> </script>

<?php echo form_open('admission/admin_insert'); ?>

  <div class="container well" style="margin-top: 50px;">
	<div class="row">
    <div class="col col-lg-6 col-lg-offset-3">
		<div class="modal-content">
    			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title login_fom" style="text-align: center;">
						Registration
					</h4>
				</div>
				<div class="modal-body">

						<div id="errorSignUp">
						
						</div>
						
						<div class="form-group">
							<label class="control-label login_email" for="email">NAME</label>
							<div class="input-group">
								<span class="input-group-addon login_radius"><span class="fa fa-user"></span></span>
								<input class="form-control login_radius" placeholder="name" name="admin_name" id="emailSignUp" type="text">
							</div>
						</div>
							
						<div class="form-group">
							<label class="control-label login_email" for="password">EMAIL</label>
							<div class="input-group">
								<span class="input-group-addon login_radius"><span class="fa fa-lock"></span></span>
								<input class="form-control login_radius" placeholder="email@gmail.com" name="admin_email" id="passwordSignUp" type="email">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label login_email" for="address">ADDRESS</label>
							<div class="input-group">
								<span class="input-group-addon login_radius"><span class="fa fa-user"></span></span>
								<input class="form-control login_radius" placeholder="address" name="admin_address" id="address" type="text">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label login_email" for="password">CREATE PASSWORD</label>
							<div class="input-group">
								<span class="input-group-addon login_radius"><span class="fa fa-lock"></span></span>
								<input class="form-control login_radius" placeholder="password" name="admin_password" id="passwordSignUp" type="password">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label login_email" for="password">MOBILE</label>
							<div class="input-group">
								<span class="input-group-addon login_radius"><span class="fa fa-lock"></span></span>
								<input class="form-control login_radius" placeholder="mobile" name="admin_mobile" id="passwordSignUp" type="number">
							</div>
						</div>
						
						 <center>
						<button type="submit"  class="btn btn-primary login_radius" style="width: 127px;">Register</button>
						<button type="button"  class="btn btn-Default login_radius login_clr" style="width: 127px;">Cancel</button>
						</center>
<?php echo form_close(); ?>
					
				</div>
				<div class="modal-footer">
					<a class="alreadySignUp" href="#">Forgot Password</a>
				</div>
			</div>
            </div>
	</div>
</div>


<style type="text/css">
	.login_fom{
    text-align: center;
    color: gray;
    font-family: initial;
    font-size: 26px;
	}
  
  .login_colm{
  	padding: 0px;
  }

.login_head_you{
	color: gray;
}

.login_row{
	color: gray;
    font-family: -webkit-body;
}

.login_email{
	 color: gray;
    font-family: -webkit-body;
}

.login_radius{
	border-radius: 0px;
}
.login_clr{
	color: gray;
}

.login_img{
	border-radius: 100%;
}


</style>