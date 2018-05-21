<?php 
$user_listedd=explode(',',$role_autho[0]['manage_user']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>

<div class="ser_contc"  id="page-wrapper">
<ul class="nav nav-tabs tab_show_stdnt">
    <li  <?Php if($active!='' || $active1!=''){  if($active=='student'|| $active1=='student'){ ?>  class='active'  <?Php } } else {   ?> class="active" <?php  }   ?>  ><a data-toggle="tab" href="#home" class="ser_tech combi_inee_dlts cv">STUDENT</a></li>
    <li <?Php if($active=='teacher' || $active1=='teacher'){ ?>  class='active'  <?Php }   ?>><a data-toggle="tab" href="#menu1" class="ser_tech combi_inee_dlts1 cv1">STAFF</a></li>
    <li <?Php if($active=='parent' || $active1=='parent'){ ?>  class='active'  <?Php }   ?>><a data-toggle="tab" href="#menu2" class="ser_tech combi_inee_dlts2 cv2">PARENT</a></li>
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
      
                  <td>
                  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
                    <a href="<?php echo base_url(); ?>index.php/admission/student_info/<?php echo $encrypted_id; ?>""><i class="fa fa-eye guar_link_eys" aria-hidden="true"></i></a>
                    <?php   }  ?>
                      <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
                  <a href="<?php echo base_url(); ?>index.php/admission/student_delete/<?php echo $encrypted_id; ?>"><i class="fa fa-trash guar_link_eys1" aria-hidden="true"></i></a>
                  <?php  }  ?>
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

                  
                <td>
               <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
                  <a href="<?php echo base_url(); ?>index.php/admission/staff_profile/<?php echo $encrypted_id; ?>"><i class="fa fa-eye guar_link_eys" aria-hidden="true"></i></a>
                  <?php  }  ?>
                   <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
                  <a href="<?php echo base_url(); ?>index.php/admission/staff_delete/<?php echo $encrypted_id; ?>"><i class="fa fa-trash guar_link_eys1" aria-hidden="true"></i></a>
                  <?php  }  ?>
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
   
                  <td>
                     <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
                    <a href="<?php echo base_url(); ?>index.php/admission/parent_update/<?php echo $encrypted_id; ?>"><i class="fa fa-eye guar_link_eys" aria-hidden="true"></i></a>
                    <?php  }   ?>

                    <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
                  <a href="<?php echo base_url(); ?>index.php/admission/staff_delete/<?php echo $encrypted_id; ?>"><i class="fa fa-trash guar_link_eys1" aria-hidden="true"></i></a>
                  <?php  }  ?>
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
<?php   }   ?>

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
