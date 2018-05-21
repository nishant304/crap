<?php
foreach ($data_info as $key => $value) {
  $logo_name = $value['admin_image'];
  $institute_id = $value['admin_id'];
  $institute_name = $value['institute_name'];
  $institute_address = $value['institute_address'];
  $institute_email = $value['institute_email'];
  $institute_phone = $value['institute_phone'];
  $institute_mobile = $value['institute_mobile'];
  $institute_fax = $value['institute_fax'];
  $admin_contact_person = $value['admin_contact_person'];
  $institute_country = $value['institute_country'];
  $language = $value['language'];
  $institute_code = $value['institute_code'];
  $admin_email = $value['admin_email'];
  $admin_name = $value['admin_name'];

}

?>
<div  id="page-wrapper">
    <div class="panel panel-default">
     <div class="panel-heading inst_hed"> Institute information </div>
       <div class="panel-body">
 <?php echo form_open_multipart("admission/school_logo_img/".$institute_id); ?>

         <div class="col-lg-12">
           <center>
           <img id="pic1" <?php if($logo_name != ''){ ?> src="<?php echo base_url();?>application/assets/uploads/<?php echo $logo_name;?>" <?php } else { ?>
           src="<?php echo base_url();?>application/assets/uploads/default_school.png" <?php } ?> class="img-responsive inst_imgs " width="100" style="border: 1px solid #08080845;">
              <input id="pic" type="file" name="institute_logo" onchange="this.form.submit();" >       
            </center>
        </div>
<?php echo form_close(); ?>

 <?php echo form_open_multipart("admission/school_profile_info"); ?>

        <div class="col-lg-12 insta_clmns">
          <div class="col-lg-4">
           <label>Institution Name <span class="institutr_strs">*</span></label>
           <input type="text" name="institute_name" value="<?php echo $institute_name; ?>" placeholder="select" class="form-control inst_inpst">
          </div>
             <div class="col-lg-4">
            <label>Institution Code<span class="institutr_strs">*</span></label>
            <input type="text" name="institute_code" value="<?php echo $institute_code; ?>" class=" form-control inst_inpst" placeholder="Enter Institution Code">
          </div>
            <div class="col-lg-4">
              <label>Institution Email<span class="institutr_strs">*</span></label>
              <input type="email" name="institute_email" value="<?php echo $institute_email; ?>" class="form-control inst_inpst" placeholder="">
            </div>
        </div>

        <div class="col-lg-12 insta_clmns">
          <div class="col-lg-4">
           <label>Institution Phone<span class="institutr_strs">*</span></label>
           <input type="phone" name="institute_phone" value="<?php echo $institute_phone; ?>" class="form-control inst_inpst" placeholder="Enter Phone Number">
          </div>
          <div class="col-lg-4">
           <label>Institution Mobile<span class="institutr_strs">*</span></label>
           <input type="Mobile" name="institute_mobile" value="<?php echo $institute_mobile; ?>" placeholder="Enter your Mobile Number" class="form-control inst_inpst">
          </div>
          <div class="col-lg-4">
           <label>Institution Fax<span class="institutr_strs">*</span></label>
           <input type="text" name="institute_fax" value="<?php echo $institute_fax; ?>" placeholder="Enter your fax number" class="form-control inst_inpst">
          </div>
        </div>
        <div class="col-lg-12 insta_clmns">
          <div class="col-lg-4">
           <label>Admin Contact Person<span class="institutr_strs">*</span></label>
           <input type="text" name="admin_contact_person" value="<?php echo $admin_contact_person; ?>" placeholder=" Admin Contact Person" class="form-control inst_inpst">
          </div>
             
              <div class="col-lg-4">
                <label>Country<span class="institutr_strs">*</span></label>
              
                 <select class="form-control inst_inpst" name="institute_country">
                  <option value="Not Define">select....</option>
                  <option <?php if($institute_country == 'India'){ ?> selected <?php } ?> value="India">India</option>
                  <option <?php if($institute_country == 'Other'){ ?> selected <?php } ?> value="Other">Other</option>
                  
                </select>
              </div>

          <div class="col-lg-4">
            <label>Language<span class="institutr_strs">*</span></label>
            <select class="form-control inst_inpst" name="language">
                  <option value="Not Define">select....</option>
                  <option <?php if($language == 'English'){ ?> selected <?php } ?> value="English">English</option>
                  <option <?php if($language == 'Other'){ ?> selected <?php } ?> value="Other">Other</option>
                  
                </select>
          </div>




        </div>
        <div class="col-lg-12 insta_clmns">


           <div class="col-lg-4">
              <label>Institution Address<span class="institutr_strs">*</span></label>
              <textarea class="form-control inst_inpst" value="<?php echo $institute_address; ?>" name="institute_address"><?php echo $institute_address; ?></textarea>
            </div>
          
    

  <div class="col-lg-4">
              <label>Admin Name<span class="institutr_strs">*</span></label>
              <textarea class="form-control inst_inpst" value="<?php echo $admin_name; ?>" name="admin_name"><?php echo $admin_name; ?></textarea>
            </div>
          
      
          <div class="col-lg-4">
              <label>Admin Email<span class="institutr_strs">*</span></label>
              <textarea class="form-control inst_inpst" value="<?php echo $admin_email; ?>" name="admin_email"><?php echo $admin_email; ?></textarea>
            </div>
          
        </div>



        <div class="col-lg-12 insta_clmns">
          
        </div>

      <div class="col-lg-12">
      <?php
if(empty($data_info)){ ?>
      <center>
      <button type="submit" class="btn btn-primary">SAVE</button>
      </center>
<?php }
else
{ ?>
      <center>
      <button type="submit" class="btn btn-primary">Update</button>
      </center>
<?php }
?>
    </div>


     </div>
  </div>
</div> 
<?php echo form_close(); ?>
<style type="text/css">

      .institutr_strs{
        color: red;
        font-size: 15px;
      }


      .inst_inpst{
        border-radius: 0px;
      }

         .insta_clmns{
          color: gray;
          font-family: -webkit-body;
          margin-top: 28px;
         }


    .inst_hed{
      color: gray !important;
      text-align: center;
      font-family: -webkit-body;
      font-size: 22px;
    }
  .inst_imgs{
    width: 150px;
    height: 150px;
    border-radius: 50%;
  }




</style>
<script type="text/javascript">
$(document).ready(function(){
  $("#pic1").click(function(){
  $("#pic").trigger('click');
});
});
</script>