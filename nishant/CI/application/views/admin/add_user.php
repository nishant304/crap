<div class="ser_contc" id="page-wrapper">
 <h2 class="cmbi_frms">Add Users</h2>

  <ul class="nav nav-tabs tab_show_stdnt">
    <li class="active"><a data-toggle="tab" href="#menu1" class="combi_inee_dlts cv">Student</a></li>
    <li><a data-toggle="tab" href="#home" class="combi_inee_dlts1 cv1" >Staff</a></li>
     </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade">
     
        <?php echo form_open('admission/add_new_staff'); ?> 
    <div class="panel-body emp_regsrt_bdr">
    <div class="panel-heading empll_emplll">Employee Registration</div>
      <div class="col-lg-12">
        <div class="panel panel-default empll_top">
   <div class="panel-body empll_clr">
      <div class="col-lg-12 empll_margin">
                  
                  <div class="col-lg-6">
                <label  class="empll_labell">Joining Date&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_doj"  type="date" >
               
              </div>


              <div class="col-lg-6 ">
                <label  class="empll_labell">Department&nbsp;<span class="empll_spn">*</span></label> 
                <select name="stf_dept" class="form-control empll_input ">
                  <option value="Not Define" selected>Select Department</option>
                  <option value="computer">Computer</option>
                  <option value="science">Science</option>
                  <option value="arts">Arts</option>
                  <option value="civil">Civil</option>
                 </select>
               
              </div>

      </div>

        <div class="col-lg-12 empll_margin">
          <div class="col-lg-4">
           <label  class="empll_labell">Designation&nbsp;<span class="empll_spn">*</span></label> 
                <select name="stf_designation" class="form-control empll_input ">
              <option value="Not Define" selected>Select Designation</option>
              <?php foreach ($fetch_designation as $key => $value) { ?>
              <option value="<?php echo $value['designation_id']; ?>"><?php echo $value['designation']; ?>
              </option>
              <?php } ?>
                 </select>
          </div>

          <div class="col-lg-4 ">
                <label  class="empll_labell">Qualification&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_qualification"  type="text" placeholder="Enter Your Qualification" >
               
              </div>

               <div class="col-lg-4 ">
                <label  class="empll_labell">Total Experience&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_experience"  type="text" placeholder="Enter Your Total Experience" >
               
              </div>
        </div>


    </div>
  </div>

    <hr>
   
      </div>
  


          <div class="col-lg-12">
            <div class="col-lg-6 border_lft">
  <div class="panel panel-default empll_top">
    <div class="panel-heading empll_pnl_hed">Personal Details</div>
    <div class="panel-body">
      
            <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">First Name&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_fname"  type="text" placeholder="Enter Your First Name" >
               
              </div>

               <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">Last Name&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_lname"  type="text" placeholder="Enter Your Last Name" >
               
              </div>

                <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">Date of Birth&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_dob"  type="date" >
               
              </div>


                <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">Gender&nbsp;<span class="empll_spn">*</span></label> 
              <select name="stf_gender" class="form-control empll_input">
                  <option value="Not define" selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                 </select>
               
              </div>
              <div class="col-lg-12 empll_margin">
      <label  class="empll_labell">Present Address&nbsp;<span class="empll_spn">*</span></label> 
        <textarea class="form-control empll_input" name="stf_pres_address"></textarea>
      </div>

      <div class="col-lg-12 empll_margin">
      <label  class="empll_labell">Permanent Address&nbsp;<span class="empll_spn">*</span></label> 
        <textarea class="form-control empll_input" name="stf_perm_address"></textarea>
      </div>
    </div>
  </div>
 </div>
   <div class="col-lg-6">
  <div class="panel panel-default empll_top">
    <div class="panel-heading empll_pnl_hed">Contact Details</div>
    <div class="panel-body">

            <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">City&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_city"  type="text" placeholder="Enter your City">
               
              </div>

              <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">Phone Number&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_phone"  type="text" placeholder="Enter your Phone Number">
               
              </div>


              <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">Mobile&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_mobile"  type="text" placeholder="Enter your Mobile">
              </div>

              <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">Email&nbsp;<span class="empll_spn">*</span></label> 
              <input class="form-control empll_input " name="stf_email"  type="text" placeholder="Enter your Email">
               
              </div>

              <div class="col-lg-12 empll_margin">
                <label  class="empll_labell">Country&nbsp;<span class="empll_spn">*</span></label> 
              <select name="stf_country" class="form-control empll_input">
                  <option value="None" selected>Select Country</option>
                  <option value="India">India</option>
                  <option value="Other">Other</option>
                 </select>
               
              </div>

    </div>
  </div>
</div>
</div>

 <div class="col-lg-12">
  <center><input type="submit" value="SAVE USER" class="btn btn-primary empll_bbbttnn"></center>
</div>
</div>
<?php echo form_close(); ?>
 </div>


      

    <div id="menu1" class="tab-pane fade in active">
    <?php echo form_open('admission/savingdata'); ?>
    <div class="panel panel-default student_prsnl_dflt">
    <div class="panel-body emp_regsrt_bdr">
    <div class="panel-heading student_prsnl_admis">Student Admission</div>
          <div class="col-lg-12 anoth_student_admics">

            <div class="col-lg-6 student_prsnl_acdmic">
         <label>Academic Gap&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
         <select name="academic_gap" class="form-control student_prsnl_acdmic" onchange="xyz(this.value);">
                  <option value="">Select</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                 </select>
               
              </div>
 <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Academic Year&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              	<select name="std_batch" class="form-control student_prsnl_acdmic" id="academic_gap">
                  <option >Select Academic Year</option>
                  </select>
               </div>
                </div>  
           
           <!-- second row start -->
<div class="col-lg-12 student_prsnl_second">
<div class="col-lg-6 student_prsnl_acdmic">
                <label>Joining Date&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input placeholder="Joining Date" class="form-control student_prsnl_acdmic" name="std_reg_date" type="date">
              </div>


          	  <div class="col-lg-6">
              	<label>Class&nbsp;<span class="student_prsnl_star">*</span></label> 
              	<select name="std_class" class="form-control student_prsnl_seconddd ">
                <option>select</option>
                   <?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
                 </select>
               </div>
                </div>  	



<!-- start another deatilas -->



 <div class="col-lg-12">
          <div class="student_prsnl_office">
            PERSONAL DETAILS:-
          	</div>
          	<hr>
             
              <div class="col-lg-6 student_prsnl_acdmic ">
              	<label>First Name&nbsp;<span class="student_prsnl_star">*</span></label> 
    <input class="form-control student_prsnl_seconddd" name="std_fname"  type="text" >
               
              </div>





            <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Last Name&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
 <input class="form-control student_prsnl_acdmic" name="std_lname"  type="text" >
               
              </div>
          </div>


<!--     -->

          <div class="col-lg-12 student_prsnl_third">

          	  <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Date Of Birth&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_dob"  type="date" >
               
              </div>


              <div class="col-lg-6 student_prsnl_acdmic ">
              	<label>Select Gender&nbsp;<span class="student_prsnl_star">*</span></label> 
              	<select name="std_gender" class="form-control student_prsnl_seconddd ">
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                 
                 </select>
               
              </div>


        


          </div>



          <!--       -->
          <div class="col-lg-12 student_prsnl_four">
          	
            

             <div class="col-lg-6 student_prsnl_acdmic ">
              	<label>Nationality&nbsp;<span class="student_prsnl_star">*</span></label> 
              	<select name="std_nationality" class="form-control student_prsnl_seconddd ">
                  <option value="" selected>Select Nationality</option>
                  <option >Indian</option>
                  <option >Other</option>
                 
                 </select>
               
              </div>  
 <div class="col-lg-6 student_prsnl_acdmic">
                <label>Birth Place&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name=""  type="text" >
               
         </div>
          </div>


          <!--     -->

          <div class="col-lg-12 student_prsnl_five">
                
                <div class="col-lg-6 student_prsnl_acdmic ">
                <label>Category&nbsp;<span class="student_prsnl_star">*</span></label> 
                <select name="std_category" class="form-control student_prsnl_seconddd ">
                  <option value="-1" selected>Select Category</option>
                  <option value="OBC">OBC</option>
                  <option value="ST">ST</option>
                  <option value="SC">SC</option>
                  <option value="GENERAL">GENERAL</option>
                  <option value="OTHER">OTHER</option>
                 </select>
               
              </div>  


            <div class="col-lg-6 student_prsnl_acdmic ">
              	<label>Religion&nbsp;<span class="student_prsnl_star">*</span></label> 
              	<select name="std_religion" class="form-control student_prsnl_seconddd ">
                  <option value="-1" selected>Select Religion</option>
                  <option value="Hindu">Hindu</option>
                  <option value="muslim">muslim</option>
                  <option value="sikh">sikh</option>
                  <option value="Brahman">Brahman</option>
                 
                 </select>
               
              </div>  
         

          </div>




          <!-- another detail start here -->

            <div class="col-lg-12">
          <div class="student_prsnl_office">
           CONTACT DETAILS:-
          	</div>
          	<hr>
              
                <div class="col-lg-6 student_prsnl_acdmic">
                	<label>Permanent Address</label>
                  <textarea class="form-control student_prsnl_acdmic permanet" name="std_permanent_address"></textarea>
                </div>


                 <div class="col-lg-6 student_prsnl_acdmic">
                	<label>Present Address</label>
                	<textarea class="form-control student_prsnl_acdmic permanet" name="std_address"></textarea>
                </div>
         
          </div>

          <!--  -->

       

          <div class="col-lg-12 student_prsnl_eight">
          	
            <div class="col-lg-6 student_prsnl_acdmic">
              <label>Email</label><span class="student_prsnl_ccllrr">*</span>
              <input class="form-control student_prsnl_acdmic" name="std_email" type="text" maxlength="256">
               </div>
              


              <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Mobile&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_mobile"  type="text" >
               
              </div>
    


          </div>

          <!--      -->


          

          <!-- another deatials  -->
                 
          <div class="col-lg-12">
          <div class="student_prsnl_office">
           FATHER'S DETAILS:-
          	</div>
          	<hr>
              
                <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Name&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_father_name"  type="text" >
               
              </div>


                  <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Mobile&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="father_phone"  type="text" >
               
              </div>
          </div>  

               <!--  -->

               <div class="col-lg-12 student_prsnl_ten">
               	  <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Job&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="father_occupation"  type="text" >
               
              </div>


              

              <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Email&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_father_email"  type="Email" >
               
              </div>

               </div>


               <!-- another details -->


        <div class="col-lg-12">
          <div class="student_prsnl_office">
          MOTHER'S DETAILS:-
          	</div>
          	<hr>
              
                <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Name&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_mother_name"  type="text" >
               
              </div>


                  <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Mobile&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="mother_phone"  type="text" >
               
              </div>
          </div>


          <!--  -->

          <div class="col-lg-12 student_prsnl_ele">
              <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Job&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="mother_occupation"  type="text" >
               
              </div>

  <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Email &nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_mother_email"  type="Email" >
               
              </div>    	 
     

          </div>



          <!-- another deatils start -->
              <div class="col-lg-12">
          <div class="student_prsnl_office">
             GUARDIAN'S DETAILS:-
          	</div>
          	<hr>
              
                <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Name&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_guardian_name"  type="text" >
               
              </div>


                  <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Mobile&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="guardian_phone"  type="text" >
               
              </div>
          </div>

          <!--     -->


          <div class="col-lg-12 student_prsnl_twl">
          	  <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Job&nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="guardian_occupation"  type="text" >
               
              </div>

              <div class="col-lg-6 student_prsnl_acdmic">
              	<label>Email &nbsp;<span class="student_prsnl_ccllrr">*</span></label> 
              <input class="form-control student_prsnl_acdmic" name="std_guardian_email"  type="Email" >
               
              </div> 
          </div>

        
            
              <div class="col-lg-12">
          <div class="student_prsnl_office">
           OTHERS:-
          	</div>
          	<hr>
              
                  <div class="col-lg-6 student_prsnl_acdmic ">
              	<label>Admission Fee&nbsp;<span class="student_prsnl_star">*</span></label> 
              	<select name="std_class_fee" class="form-control student_prsnl_seconddd ">
                  <option value="" >Select fee</option>
                  <option >3000</option>
                  <option >4000</option>
                  <option >5000</option>
                 
                 </select>
               
              </div>
              </div>

              <!--  -->

               <div class="col-lg-12 student_prsnl_thir">
               	   <center><button type="submit" class="btn btn-primary student_prsnl_bbtn">SAVE USER</button></center>

               </div>



<?php echo form_close(); ?>



    </div>
  </div>

    </div>
   
  </div>
</div>

<script type="text/javascript">
  function xyz(value)
  {

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/academic_gap/"+value+"/",  
    data    : {'academic_gap':value},
    success : function(data){
    $("#academic_gap").html(data);
      }
});
}
</script>
<script type="text/javascript">
      $('.combi_inee_dlts1').click(function() {
      $('.cv1').removeClass("combi_inee_dlts1");
      $('.cv1').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
});
    $('.combi_inee_dlts').click(function() {
     $('.cv1').removeClass("combi_inee_dlts");
      $('.cv1').addClass("combi_inee_dlts1");
      $('.cv').removeClass("combi_inee_dlts1");
       $('.cv').addClass("combi_inee_dlts");
});
</script>