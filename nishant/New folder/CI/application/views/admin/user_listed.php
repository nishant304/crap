<div class="ser_contc"  id="page-wrapper">
  <div class="col-lg-12">
<ul class="nav nav-tabs tab_show_stdnt">
    <li  <?Php if($active!='' || $active1!=''){  if($active=='student'|| $active1=='student'){ ?>  class='active'  <?Php } } else {   ?> class="active" <?php  }   ?>  ><a data-toggle="tab" href="#home" class="ser_tech combi_inee_dlts cv">STUDENT</a></li>
    <li <?Php if($active=='teacher' || $active1=='teacher'){ ?>  class='active'  <?Php }   ?>><a data-toggle="tab" href="#menu1" class="ser_tech combi_inee_dlts1 cv1">STAFF</a></li>
    <li <?Php if($active=='parent' || $active1=='parent'){ ?>  class='active'  <?Php }   ?>><a data-toggle="tab" href="#menu2" class="ser_tech combi_inee_dlts2 cv2">PARENT</a></li>
    <!--  <li class='active'><button data-toggle="modal" data-target="#myModal" class="ser_tech combi_inee_dlts2 cv2">Add User</button></li> -->

    <button type="button" class="btn add_modal " data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i>       Add User</button>
  </ul>

  <div class="tab-content ">
    <div id="home" class=" tab-pane fade<?Php if($active!='' ||$active1!='' ){  if($active=='student' || $active1=='student'){ ?>  in active  <?Php } } else {   ?> in active <?php  }   ?>">
 <div class=" guard_contn padding-o">
  <div class="panel panel-default">
     <div class="panel-heading guard_agns">Student List</div>
    <div class="panel-body pading_lft">
  
        <div class=" table-responsive pading_lft col-lg-12">
          <table class="table table-bordered ser_tblsa">
           <thead>
            <?php echo form_open('admission/user_listed');    ?>
             <tr>
            <th></th>
            <th><input type="hidden" name="active" value="student"></th>
            <th><input type="text" value="<?php echo  $a[0]['std_fname'];   ?>"    name="std_fname" placeholder="Search Name"></th>
            <th><input type="text" value="<?php echo  $a[0]['std_class'];   ?>" name="std_class" placeholder="Search Class"></th>
            <th><input type="text" value="<?php echo  $a[0]['std_section'];   ?>" name="std_section" placeholder="Search Section"></th>
            <th><input type="text" value="<?php echo  $a[0]['std_roll_no'];   ?>" name="std_roll_no" placeholder="Search Roll No"></th>
             <th><input type="text" value="<?php echo  $a[0]['std_email'];   ?>" name="std_email" placeholder="Search Email"></th>
            <th colspan="2"><input type="submit" name=""></th>
          </tr>
            <?php echo form_close();    ?>
           <tr>
            <th>SNo.</th>
            <th>Image</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Roll No</th>
            <th>Email Id</th>
            <th>Mobile</th>
            <th>Manage</th>
          </tr>
          <tr>
 
 
           </tr>
           </thead>
           <tbody>
<?php  $i = 1;
  foreach ($results0 as $key)
           {
           $student_id = $key['std_id'];
           $u=random_string('alnum',4);
           $v=random_string('alnum',2);
           if($student_id<10)
           {
            $encrypted_id = base64_encode('s'.$u.$student_id.$v.'m');
           }
           else
           {
           $encrypted_i = base64_encode('s'.$u.$student_id.$v.'m');
           $encrypted_id =substr($encrypted_i,0,-2);
           }  
            $student_fname = $key['std_fname'];
            $student_class = $key['std_class'];
            $student_sec = $key['std_section'];
            $student_rol = $key['std_roll_no'];
            $student_mobile = $key['std_mobile'];
            $std_email = $key['std_email'];
            $student_image = $key['std_image'];
            $photo='<img src="http://localhost/CI/application/assets/uploads/'.$student_image.'"/>';
            $photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg">';
  ?>
              <tr>
                <!-- <tr class="active"> -->
                 <th scope="row"><?php echo $i; ?></th>
                 <td style="width: 146px;"><?php if($student_image == '') { echo $photo1; } else { echo $photo; }?></td>
                  <td style="width: 200px;"><?php echo $student_fname; ?></td> 
                  <td style="width: 175px;"><?php echo $student_class; ?></td> 
                  <td style="width: 175px;"><?php echo $student_sec; ?></td>
                  <td style="width: 175px;"><?php echo $student_rol; ?></td>
                  <td><?php echo $std_email; ?></td>
                  <td><?php echo $student_mobile; ?></td>

                  <td><a href="<?php echo base_url(); ?>index.php/admission/student_info/<?php echo $encrypted_id; ?>""><i class="fa fa-eye guar_link_eys" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>index.php/admission/student_delete/<?php echo $encrypted_id; ?>"><i class="fa fa-trash guar_link_eys1" aria-hidden="true"></i></a>
                </td>
                  </tr>
                  <?php $i++;
                } ?>
                 

  </tbody>
          </table>
          <center><p class="pagination_link"><?php echo $links0; ?></p></center>
        </div>
</div>
</div>
  </div>
  </div>



 <div id="menu1" class=" tab-pane fade<?Php if($active=='teacher' ||$active1=='teacher' ){ ?>   in active   <?Php }   ?>">
     <div class="panel-heading guard_agns">Staff List</div>

 <div class=" guard_contn pading_lft">
 <table class="table table-bordered ser_tblsa">
            <thead>

      <?php echo form_open('admission/user_listed');    ?>
             <tr>
            <th></th>
            <th><input type="hidden" name="active" value="teacher"></th>
            <th><input type="text" value="<?php echo  $a[1]['stf_fname'];   ?>" placeholder="Search Name" name="stf_fname"></th>
            <th><input type="text" value="<?php echo  $a[1]['stf_email'];   ?>" placeholder="Search Email Id" name="stf_email"></th>
            <th><input type="text" value="<?php echo  $a[1]['stf_mobile'];   ?>" placeholder="Search Mobile" name="stf_mobile"></th>
            <th><input type="text" value="<?php echo  $a[1]['stf_designation'];   ?>" placeholder="Search Desigination" name="stf_designation"></th>
            <th colspan="2"><input type="submit" name=""></th>
          </tr>
            <?php echo form_close();    ?>
              <tr>
            <th>#</th>
             <th>image</th>
              <th>Staff Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Desigination</th>
                <th>Qualification</th>
                <th>Manage</th>
          </tr>
            </thead>
            <tbody>
 
          <tr class="active">
            <?php 
         $i=1;
            foreach ($results1 as $staff_data)
           {
           $staff_id = $staff_data['stf_id'];
        
           $u=random_string('alnum',4);
           $v=random_string('alnum',2);
           if($staff_id<10)
           {
            $encrypted_id = base64_encode('s'.$u.$staff_id.$v.'m');
           }
           else
           {
           $encrypted_i = base64_encode('s'.$u.$staff_id.$v.'m');
           $encrypted_id =substr($encrypted_i,0,-2);
           }  
            $staff_fname = $staff_data['stf_fname'];
            $staff_lname = $staff_data['stf_lname'];
            $staff_email = $staff_data['stf_email'];
            $staff_mobile = $staff_data['stf_mobile'];
            $staff_image = $staff_data['stf_image'];
            $staff_role = $staff_data['stf_designation'];
            $staff_address = $staff_data['stf_qualification'];
            $photo='<img src="http://localhost/CI/application/assets/uploads/'.$staff_image.'"/>';
            $photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg">';

           
              ?>
                <!-- <tr class="active"> -->
                 <th scope="row"><?php echo $i; ?></th>

                 <td style="width: 146px;"><?php if($staff_image == '') { echo $photo1; } else { echo $photo; }?></td>

                  <td style="width: 200px;"><?php echo $staff_fname." ".$staff_lname; ?></td> 

                  <td style="width: 175px;"><?php echo $staff_email; ?></td> 

                  <td><?php echo $staff_mobile; ?></td>
 
                  <td><?php echo $staff_role; ?></td>
                  <td><?php echo $staff_address; ?></td>

                  
                <td><a href="<?php echo base_url(); ?>index.php/admission/staff_profile/<?php echo $encrypted_id; ?>"><i class="fa fa-eye guar_link_eys" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>index.php/admission/staff_delete/<?php echo $encrypted_id; ?>"><i class="fa fa-trash guar_link_eys1" aria-hidden="true"></i></a>
                </td>


                  </tr>
                  <?php
               $i++;
                   } ?>
       
        </tbody>
          </table>
          <center><p class="pagination_link"><?php echo $links1; ?></p></center>
        </div>
</div>

<div id="menu2" class=" tab-pane fade <?Php if($active=='parent' ||$active1=='parent'){ ?>  in active  <?Php }   ?>">
<div class="panel-heading guard_agns">Parent List</div>
 <div class="guard_contn table-responsive" >
 <table class="table table-bordered ser_tblsa">
            <thead>
        <?php echo form_open('admission/user_listed');    ?>
             <tr>
            <th></th>
            <th><input type="hidden" name="active" value="parent"></th>
            <th><input type="text" value="<?php echo  $a[2]['father_name'];   ?>" placeholder="Search Father" name="father_name"></th>
            <th><input type="text" value="<?php echo  $a[2]['mother_name'];   ?>" placeholder="Search Mother" name="mother_name"></th>
            <th><input type="text" value="<?php echo  $a[2]['father_email'];   ?>" placeholder="Search Father Email" name="father_email"></th>
            <th><input type="text" value="<?php echo  $a[2]['mother_email'];   ?>" placeholder="Search Mother Email" name="mother_email"></th>
            <th><input type="text" value="<?php echo  $a[2]['std_id'];   ?>" placeholder="Search Student" name="std_id"></th>
            <th ><input type="submit" name=""></th>
          </tr>
            <?php echo form_close();    ?>
              <tr>
            <th>#</th>
            <th>Image</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>Father Email</th>
            <th>Mother Email</th>
            <th>Child Id</th>
            <th>Manage</th>
          </tr>
            </thead>
            <tbody>
          
          <tr class="active">
            <?php 
         $i=1;
            foreach ($results2 as $parent_data)
           {
           $parent_id = $parent_data['parent_id'];
          
           $u=random_string('alnum',4);
           $v=random_string('alnum',2);
           if($parent_id<10)
           {
            $encrypted_id = base64_encode('s'.$u.$parent_id.$v.'m');
           }
           else
           {
           $encrypted_i = base64_encode('s'.$u.$parent_id.$v.'m');
           $encrypted_id =substr($encrypted_i,0,-2);
           }  
       
            $father_email = $parent_data['father_email'];
            $mother_email = $parent_data['mother_email'];
            $mother_name = $parent_data['mother_name'];
            $father_name = $parent_data['father_name'];
            $student_id = $parent_data['std_id'];
            $parent_images = $parent_data['profile_images'];
         
            $photo='<img src="http://localhost/CI/application/assets/uploads/'.$parent_images.'"/>';
            $photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg">';

           
              ?>
                <!-- <tr class="active"> -->
                 <th scope="row"><?php echo $i; ?></th>

                 <td style="width: 146px;"><?php if($parent_images == '') { echo $photo1; } else { echo $photo; }?></td>

                  <td style="width: 200px;"><?php echo $father_name; ?></td> 

                  <td style="width: 175px;"><?php echo $mother_name; ?></td> 

                  <td style="width: 175px;"><?php echo $father_email; ?></td>

                  <td style="width: 175px;"><?php echo $mother_email; ?></td>

                  <td style="width: 175px;"><?php echo $student_id; ?></td>
   
                  <td><a href="<?php echo base_url(); ?>index.php/admission/parent_update/<?php echo $encrypted_id; ?>"><i class="fa fa-eye guar_link_eys" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url(); ?>index.php/admission/staff_delete/<?php echo $encrypted_id; ?>"><i class="fa fa-trash guar_link_eys1" aria-hidden="true"></i></a>
                </td>

                  </tr>
 <?php  $i++;   }  ?>
  </tbody>
  </table>
  <center><p class="pagination_link"><?php echo $links2; ?></p></center>
        </div>
        </div>

</div>
</div>
</div>





<!-- add user modal start -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
       <!-- <div class="ser_contc" id="page-wrapper"> -->
 <h2 class="cmbi_frms">Add Users</h2>

  <ul class="nav nav-tabs tab_show_stdnt">
    <li class="active"><a data-toggle="tab" href="#menu1_modal" class="combi_inee_dlts cv">Student</a></li>
    <li><a data-toggle="tab" href="#home_modal" class="combi_inee_dlts1 cv1" >Staff</a></li>
     </ul>

  <div class="tab-content">
    <div id="home_modal" class="tab-pane fade">
     
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


      

    <div id="menu1_modal" class="tab-pane fade in active">
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
   
  <!-- </div> -->
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- add user modal end -->




<script type="text/javascript">
      $('.combi_inee_dlts1').click(function() {
      $('.cv1').removeClass("combi_inee_dlts1");
      $('.cv1').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
        $('.cv2').removeClass("combi_inee_dlts");
});
    $('.combi_inee_dlts').click(function() {
     $('.cv1').removeClass("combi_inee_dlts");
      $('.cv1').addClass("combi_inee_dlts1");
      $('.cv').removeClass("combi_inee_dlts1");
       $('.cv').addClass("combi_inee_dlts");
       $('.cv2').removeClass("combi_inee_dlts");
});

  $('.combi_inee_dlts2').click(function() {
      $('.cv2').removeClass("combi_inee_dlts1");
      $('.cv2').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
       $('.cv1').removeClass("combi_inee_dlts");
        $('.cv1').addClass("combi_inee_dlts1");
});
</script>


<style type="text/css">
  .pagination_link a{
    font-size: 25px;

  }
</style>
