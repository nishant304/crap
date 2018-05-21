<?php 

$student_id = $this->uri->segment(3);
foreach ($data1 as $key) 
{

	$std_fname = $key['std_fname'];
	$std_lname = $key['std_lname'];
	$std_father_name = $key['std_father_name'];
	$std_mother_name = $key['std_mother_name'];
	$std_guardian = $key['std_guardian'];
	$std_guardian_mob = $key['std_guardian_mob'];
	$std_guardian_email = $key['std_guardian_email'];
	$std_email = $key['std_email'];
	$std_mobile = $key['std_mobile'];
	$std_address = $key['std_address'];
	$std_gender = $key['std_gender'];
	$std_religion = $key['std_religion'];
	$std_dob = $key['std_dob'];
	$std_reg_date = $key['std_reg_date'];
	$std_image = $key['std_image'];
	$std_class = $key['std_class'];	
}
 ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page" style="margin-top: -21px;">
				<h3 class="title1">Update Student Record</h3>
				
								
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
					<?php echo form_open('admission/student_update_data/'); ?>
					<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
					<div class="sign-u">
						<div class="sign-up1">
							<h4>First Name* :</h4>
						</div>
						<div class="sign-up2">
						
						<input type="text" name="user_fname" value="<?php echo $student_fname; ?>" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Last Name* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_lname" value="<?php echo $student_lname; ?>" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Email Address* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_email" value="<?php echo $student_email; ?>" required>
							
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
						<option value="12th" <?php if($student_class == '12th') {?> selected <?php } ?>>12th</option>

						<option value="11th" <?php if($student_class == '11th') {?> selected <?php } ?>>11th</option>
						<option value="10th" <?php if($student_class == '10th') {?> selected <?php } ?>>10th</option>
						<option value="9th" <?php if($student_class == '9th') {?> selected <?php } ?>>9th</option>
						<option value="8th" <?php if($student_class == '8th') {?> selected <?php } ?>>8th</option>
						<option value="7th" <?php if($student_class == '7th') {?> selected <?php } ?>>7th</option>
						<option value="6th" <?php if($student_class == '6th') {?> selected <?php } ?>>6th</option>
					    </select>
							
						</div>
						<div class="clearfix"> </div>
					</div>



					<div class="sign-u">
						<div class="sign-up1">
							<h4>Father's Name</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_father_name" value="<?php echo $student_father_name; ?>" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Mother's Name* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_mother_name" value="<?php echo $student_mother_name; ?>" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Blood Group* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_blood_group" value="<?php echo $student_blood_group; ?>" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Birth Date* :</h4>
						</div>
						<div class="sign-up2">
						
						<input type="date" name="user_birth_date" value="<?php echo $student_birth_date; ?>" required style="width: 100%;">
							
						</div>
						<div class="clearfix"> </div>
					</div>
						<div class="sign-u">
						<div class="sign-up1">
							<h4>Registration Date* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="date" name="user_reg_date" value="<?php echo $student_reg_date; ?>" required style="width: 100%;">
							
						</div>
						<div class="clearfix"> </div>
					</div>
						<div class="sign-u">
						<div class="sign-up1">
							<h4>Address* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_address" value="<?php echo $student_address; ?>" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
						<div class="sign-u">
						<div class="sign-up1">
							<h4>Mobile* :</h4>
						</div>
						<div class="sign-up2">
						
								<input type="text" name="user_mobile" value="<?php echo $student_mobile; ?>" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Gender* :</h4>
						</div>
						<div class="sign-up2">
							<label>
								<input type="radio" name="user_gender" value="male" <?php if($student_gender == 'male') { ?> checked <?php }?>>
								Male
							</label>
							<label>
								<input type="radio" name="user_gender" value="male" <?php if($student_gender == 'female') { ?> checked <?php }?>>
								FeMale
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
		
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		
	</div>

		
</body>
</html>
