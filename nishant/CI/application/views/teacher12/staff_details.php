

<div id="page-wrapper">
<?php
    $data_stf = $this->session->userdata('data_auth');

   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1)
   {
   
    $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    }
   ?>

<?php foreach ($exp['stf_detail'] as $key => $value) {
if($value == 1){ ?>
<div class="container-fluid margi_top">

<div class="col-lg-12 std_main" >
	<?php echo form_open('teacher_controller/add_new_staff'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Staff Detail</h3>
         </div>

     <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12 pading_o">
			<label class="col-lg-4 control-label">Staff First Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-user fa" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="stf_fname" placeholder="Staff First Name"/>
				</div>
			</div>
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Staff Last Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-user fa" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="stf_lname" placeholder="Staff Last Name">
               </div>
		     </div>
		</div>
		</div>



     <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Staff Email</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="stf_email" placeholder="Enter Student Email">
               </div>
		     </div>
		</div>
		


		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Staff Mobile Number</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-phone" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="stf_mobile" placeholder="Enter Mobil Number">
               </div>
		     </div>
		</div>
        </div>

      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Staff Addres</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-user fa" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="stf_address" placeholder="Enter Staff Addres">
               </div>
		     </div>
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Staff Gender</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-user fa" aria-hidden="true"></i></span>	
                  <select class="form-control" name="stf_gender">
                    <option value="male">Male</option>
                    <option value="female">FeMale</option>
                   
                  </select>
               </div>
		     </div>
		</div>
		</div>


      <div class="col-lg-12 ">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">D.O.B</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-address-card-o" aria-hidden="true"></i></span>	
                  <input type="date" class="form-control" name="stf_dob" >
               </div>
		     </div>
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Password</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="stf_password" placeholder="Password">
               </div>
		     </div>
		</div>
		 </div>


    <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Staff Role</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="stf_role" placeholder="Staff Role">
               </div>
		     </div>
		</div>
		</div>
       

		<div class="col-lg-offset-6">
			<input class="btn btn-warning" type="submit" name="submit" value="submit">
		</div>
		<?php echo form_close(); ?>
		  <?php }} ?>
</div>
</div>	
</div>
