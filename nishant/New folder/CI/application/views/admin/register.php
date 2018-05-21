<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/assets/css/bootstrap.css">
<script src="<?php echo base_url();?>application/assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>application/assets/js/bootstrap.js"> </script>

<div  id="page-wrapper">
    <div class="panel panel-default">
     <div class="panel-heading inst_hed"> ADMIN REGISTRATION</div>
       <div class="panel-body">


 <?php echo form_open_multipart("admission/school_profile_info"); ?>

        <div class="col-lg-12 insta_clmns">
          <div class="col-lg-4">
           <label>Institution Name <span class="institutr_strs">*</span></label>
           <input type="text" name="institute_name"  placeholder="select" class="form-control inst_inpst">
          </div>
             <div class="col-lg-4">
            <label>Institution Code<span class="institutr_strs">*</span></label>
            <input type="text" name="institute_code"  class=" form-control inst_inpst" placeholder="Enter Institution Code">
          </div>
            <div class="col-lg-4">
              <label>Institution Email<span class="institutr_strs">*</span></label>
              <input type="email" name="institute_email"  class="form-control inst_inpst" placeholder="">
            </div>
        </div>

        <div class="col-lg-12 insta_clmns">
          <div class="col-lg-4">
           <label>Institution Phone<span class="institutr_strs">*</span></label>
           <input type="phone" name="institute_phone"  class="form-control inst_inpst" placeholder="Enter Phone Number">
          </div>
          <div class="col-lg-4">
           <label>Institution Mobile<span class="institutr_strs">*</span></label>
           <input type="Mobile" name="institute_mobile"  placeholder="Enter your Mobile Number" class="form-control inst_inpst">
          </div>
          <div class="col-lg-4">
           <label>Institution Fax<span class="institutr_strs">*</span></label>
           <input type="text" name="institute_fax"  placeholder="Enter your fax number" class="form-control inst_inpst">
          </div>
        </div>
        <div class="col-lg-12 insta_clmns">
          <div class="col-lg-4">
           <label>Admin Contact Person<span class="institutr_strs">*</span></label>
           <input type="text" name="admin_contact_person"  placeholder=" Admin Contact Person" class="form-control inst_inpst">
          </div>
             
              <div class="col-lg-4">
                <label>Country<span class="institutr_strs">*</span></label>
              
                 <select class="form-control inst_inpst" name="institute_country">
                  <option value="Not Define">select....</option>
                  <option  value="India">India</option>
                  <option  value="Other">Other</option>
                  
                </select>
              </div>

          <div class="col-lg-4">
            <label>Language<span class="institutr_strs">*</span></label>
            <select class="form-control inst_inpst" name="language">
                  <option value="Not Define">select....</option>
                  <option  value="English">English</option>
                  <option  value="Other">Other</option>
                  
                </select>
          </div>




        </div>
        <div class="col-lg-12 insta_clmns">


           <div class="col-lg-4">
              <label>Institution Address<span class="institutr_strs">*</span></label>
              <textarea class="form-control inst_inpst"  name="institute_address"></textarea>
            </div>
          
    

  <div class="col-lg-4">
              <label>Admin Name<span class="institutr_strs">*</span></label>
              <textarea class="form-control inst_inpst"  name="admin_name"></textarea>
            </div>
          
      
          <div class="col-lg-4">
              <label>Admin Email<span class="institutr_strs">*</span></label>
              <textarea class="form-control inst_inpst"  name="admin_email"></textarea>
            </div>
          
        </div>



        <div class="col-lg-12 insta_clmns">
          
        </div>

      <div class="col-lg-12">
 
      <center>
      <button type="submit" class="btn btn-primary">SAVE</button>
      </center>

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
