<div id="page-wrapper">
<?php
     $stf_id = $this->session->userdata('stfdata');
      
       $data_stf = $this->session->userdata('data_auth');


   foreach ($data_stf as $key => $value)
   {
      foreach ($value as $key1 => $value1)
   {
   
      $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    
   }
?>
<?php
// start set variables for authority
 foreach ($exp['student'] as $key => $value2) {
  if ($value2 == 1){
    $auth_one = 1;
  }elseif($value2 == 2){
    $auth_two = 2;

  }
}
// end set variables for authority


// start condition for 2

if($auth_two == 2)
{
?>

<div class="container-fluid margi_top">

<div class="col-lg-12 std_main" id="dim">
<?php echo form_open('admission/savingdata'); ?>
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
                  <input type="" class="form-control" name="std_father_name" placeholder="Enter Father Name">
               </div>
         </div>
    </div>

    <div class="form-group col-lg-6">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Mother Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-user fa" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_mother_name" placeholder="Enter Mother Name">
               </div>
         </div>
    </div>
    </div>


  <div class="col-lg-12">
<div class="form-group col-lg-6">
     <div class="col-lg-12">
   <label class="col-lg-4 control-label">Guardian Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_guardian_name" placeholder="Enter Guardian Name">
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
       <label class="col-lg-4 control-label">Father Email</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_father_email" placeholder="Enter Father Email">
               </div>
         </div>
    </div>
    <div class="form-group col-lg-6">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Mother Email</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_mother_email" placeholder="Enter Mother Email">
               </div>
         </div>
    </div>
    </div>

     <div class="col-lg-12">
    <div class="form-group col-lg-6">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Guardian Email</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_guardian_email" placeholder="Enter Guardian Email">
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
                  <input type="" class="form-control" name="std_address" placeholder="Enter Address">
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
<div class="form-group col-lg-6">
     <div class="col-lg-12">
   <label class="col-lg-4 control-label">BATCH</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-address-card-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="std_batch" placeholder="Enter batch">
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
<?php } ?>

<!-- start condition for no authority and no incharge -->
<?php
if($auth_two == '')
{
  echo "Not Authorised";
}
// end condition for no authority and no incharge