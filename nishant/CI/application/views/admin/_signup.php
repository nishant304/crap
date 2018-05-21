
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page" style="margin-top: -21px;">
				<h3 class="title1">Add Studendent </h3>
				
								
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
					<!-- <form method="POST"  action="<?php //echo site_url('admission/savingdata'); ?>"> -->
					<?php echo form_open('admission/savingdata'); ?>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>First Name* :</h4>
						</div>
						<div class="sign-up2">
						
						<input type="text" name="user_fname"  required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Last Name* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_lname" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Email Address* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_email" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Class* :</h4>
						</div>
						<div class="sign-up2">
						
					<select style="width: 100%;height: 43px;" name="user_class">
						<option>Select</option>
						<option value="12th">12th</option>
						<option value="11th">11th</option>
						<option value="10th">10th</option>
						<option value="9th">9th</option>
						<option value="8th">8th</option>
						<option value="7th">7th</option>
						<option value="6th">6th</option>
					    </select>
							
						</div>
						<div class="clearfix"> </div>
					</div>



					<div class="sign-u">
						<div class="sign-up1">
							<h4>Father's Name</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_father_name" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Mother's Name* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_mother_name" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Blood Group* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_blood_group" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Birth Date* :</h4>
						</div>
						<div class="sign-up2">
						
						<input type="date" name="user_birth_date" required style="width: 100%;">
							
						</div>
						<div class="clearfix"> </div>
					</div>
						<div class="sign-u">
						<div class="sign-up1">
							<h4>Registration Date* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="date" name="user_reg_date" required style="width: 100%;">
							
						</div>
						<div class="clearfix"> </div>
					</div>
						<div class="sign-u">
						<div class="sign-up1">
							<h4>Address* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_address" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
						<div class="sign-u">
						<div class="sign-up1">
							<h4>Mobile* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_mobile" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Gender* :</h4>
						</div>
						<div class="sign-up2">
							<label>
								<input type="radio" name="user_gender" value="male">
								Male
							</label>
							<label>
								<input type="radio" name="user_gender" value="female">
								Female
							</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					
					
					
					<div class="sub_home">
					
							<input type="submit" name="user_register" value="Submit">
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
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
	</script>

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
.nav > li > a {
    position: relative;
    display: block;
    padding: 3px 15px;
}

</style>