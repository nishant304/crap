

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

<?php foreach ($exp['stu_admission'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid margi_top">

<div class="col-lg-12 std_main" >
	<?php echo form_open('teacher_controller/savingdata'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Student Register</h3>
         </div>


  <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12">
			<label class="col-lg-4 control-label">First Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-user fa" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="std_fname" placeholder="Enter First Name"/>
				</div>
			</div>
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Last Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-user fa" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="std_lname" placeholder="Enter Last Name">
               </div>
		     </div>
		</div>
  </div>



  <div class="col-lg-12">
    <div class="form-group col-lg-6">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Father Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-user fa" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_father_name" placeholder="Enter Last Name">
               </div>
         </div>
    </div>




		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Student Email</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="std_email" placeholder="Enter Student Email">
               </div>
		     </div>
		</div>
    </div>

  <div class="col-lg-12">
    <div class="form-group col-lg-6">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Parents Email</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_guardian_email" placeholder="Enter Student Email">
               </div>
         </div>
    </div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Mobile Number</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-phone" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="std_mobile" placeholder="Enter Mobil Number">
               </div>
		     </div>
		</div>
    </div>



  <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Addres</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-user fa" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="std_address" placeholder="Enter Addres">
               </div>
		     </div>
		</div>

      <div class="form-group col-lg-6">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">D.O.B</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-phone" aria-hidden="true"></i></span>  
                  <input type="date" class="form-control" name="std_dob" >
               </div>
         </div>
    </div>
        </div>


<div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-address-card-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="std_class" placeholder="Enter Class">
               </div>
		     </div>
		</div>
    </div>



    <div class="col-lg-offset-6">
    <input class="btn btn-warning" type="submit" name="submit" value="submit">
    </div>
</div>



<?php echo form_close(); ?>
</div>
	
</div>
   <?php }} ?>