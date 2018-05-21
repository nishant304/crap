<?php  
foreach($data as $key) {
 echo $id = $key['std_id'];

 }
           $u=random_string('alnum',4);
           $v=random_string('alnum',2);
           if($id<10)
           {
            $encrypted_id = base64_encode('s'.$u.$id.$v.'m');
           }
           else
           {
           $encrypted_i = base64_encode('s'.$u.$id.$v.'m');
           $encrypted_id =substr($encrypted_i,0,-2);
           }  

  ?>
<div class="container" id="page-wrapper">
  <div class="panel panel-default link_agn_inptss">
   <?php echo form_open_multipart('admission/std_pro_img_update/'.$encrypted_id); ?>
  <div class="panel-heading link_guard_tpp">Student Information</div>
    <div class="panel-body">

         <div class="col-lg-2 link_pp_img">
          <img  id="pic1" src="<?php echo base_url();?>application/assets/uploads/<?php echo $key['std_image'];?>" class="img-responsive std_pro_profile_img">
          <input id="pic" type="file" name="std_image" onchange="this.form.submit();" >

         </div>
  <?php echo form_close(); ?>  
  
    <?php echo form_open('admission/std_profile_data/'.$encrypted_id);?>
  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <div class="std_pro_editt pull-right">
          <h2><button type="button" class="btn btn-success std_pro_edit" class="btno" id="toggle_button">Edit</button>
        <button type="submit" class="btn btn-success std_pro_save" >save</button></h2>
        </div>
        </div>
       <div class="col-lg-10">

        <div class="col-lg-3 link_agns_mrg">
         <label>Name<span class="link_agn_strrs">*</span></label>
         <input type="text" id='myInputId0' name="std_name"  value="<?php echo $key['std_fname']." ".$key['std_lname'];?>" disabled class="form-control link_agn_inptss">
        </div>

        <div class="col-lg-3 link_agns_mrg">
          <label>Roll Number<span class="link_agn_strrs">*</span></label>
         <input type="text" id="myInputId1" value="<?php echo $key['std_roll_no'];?>" name="std_roll_no" disabled class="form-control link_agn_inptss">
        </div>

        <div class="col-lg-3 link_agns_mrg">
          <label>Phone<span class="link_agn_strrs">*</span></label>
         <input type="text" value="<?php echo $key['std_mobile'];?>" id='myInputId2' name="std_mobile" disabled class="form-control link_agn_inptss">
        </div> 

          <div class="col-lg-3 link_agns_mrg">
           <label>DOB<span class="link_agn_strrs">*</span></label>
           <input type="date" id="myInputId3" type="date"  value="<?php echo $key['std_dob'];?>" name="std_dob" disabled class="form-control link_agn_inptss">
          </div>

       <div class="col-lg-3 link_agns_mrg">
           <label>Father's Name<span class="link_agn_strrs">*</span></label>
           <input type="text" id="myInputId4" value="<?php echo $key['std_father_name'];?>" name="std_father_name"  class="form-control link_agn_inptss" disabled>
        </div>

      <div class="col-lg-3 link_agns_mrg">
           <label>Father's Email<span class="link_agn_strrs">*</span></label>
           <input type="text" id="myInputId5" value="<?php echo $key['std_father_email'];?>" name="std_father_email"  class="form-control link_agn_inptss" disabled>
          </div>

           <div class="col-lg-3 link_agns_mrg">
           <label>Mother's Name<span class="link_agn_strrs">*</span></label>
           <input type="text" id="myInputId6" value="<?php echo $key['std_mother_name'];?>" name="std_mother_name"  class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3 link_agns_mrg">
           <label>Guardian Email<span class="link_agn_strrs">*</span></label>
           <input type="text" id="myInputId7" value="<?php echo $key['std_guardian_email'];?>"  name="std_guardian_email"   class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
           <label>Email<span class="link_agn_strrs">*</span></label>
           <input type="email" id="myInputId8" value="<?php echo $key['std_email'];?>" name="std_email"  class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Gender<span class="link_agn_strrs">*</span></label>
            
          <select id="myInputId9" name="std_gender" class="form-control link_agn_inptss" disabled>
            <option <?php if($key['std_gender'] == 'male') {?> selected <?php } ?> value= "male">Male</option>
            <option <?php if($key['std_gender'] == 'female') {?> selected <?php } ?> value= "female">Female</option>
            <option <?php if($key['std_gender'] == 'other') {?> selected <?php } ?> value= "other">Other</option>
            </select>
          </div>

           <div class="col-lg-3 link_agns_mrg">
            <label>Class<span class="link_agn_strrs">*</span></label>
      <select id="myInputId10" name="std_class" class="form-control link_agn_inptss" disabled>

       <option value="">Select</option>
               
            <?php $selected='selected';

            foreach ($all_class as $key1 => $value) { 
              $class_data[] = $value['class_name'];
              }
              $clss = array_unique($class_data);
              foreach ($clss as $key1 => $value1) { ?>
            <option  <?php if($key['std_class'] == $value1){ echo $selected;  } ?> value="<?php echo $value1; ?>"><?php echo $value1; ?></option>
            <?php } ?>
      </select>

          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Guardian Name<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_guardian_name'];?>"  name="std_guardian_name" id="myInputId11" disabled class="form-control link_agn_inptss">
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Section<span class="link_agn_strrs">*</span></label>
            <!-- <input value="<?php //echo $key['std_section'];?>"  name="std_section" id="myInputId12" disabled class="form-control link_agn_inptss"> -->

            <select  name="std_section" id="myInputId12" disabled class="form-control link_agn_inptss">
            <option>Select..</option>
            <?php $selected='selected';

                foreach ($all_class as $key3 => $value) { 
                    $section_data[] = $value['class_section'];
                    }
                    $sec = array_unique($section_data);
                    foreach ($sec as $key2 => $value2) { ?>
                  <option  <?php if($key['std_section'] == $value2){ echo $selected;  } ?> value="<?php echo $value2; ?>"><?php echo $value2; ?></option>
                  <?php } ?>
            </select>
          </div>

          <div class="col-lg-3 link_agns_mrg">
            <label>Religion<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_religion'];?>" id='myInputId13' name="std_religion"  disabled disabled class="form-control link_agn_inptss">
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Mother Email<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_mother_email'];?>" name="std_mother_email" id="myInputId14" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Category<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_category'];?>" name="std_category" id="myInputId15" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Registeration date<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_reg_date'];?>" name="std_reg_date" id="myInputId16" class="form-control link_agn_inptss" disabled>
          </div>

           <div class="col-lg-3  link_agns_mrg">
            <label>Student Batch<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_batch'];?>" name="std_batch" id="myInputId17" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Nationality<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_nationality'];?>" name="std_nationality" id="myInputId18" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Status<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['std_status'];?>" name="std_status" id="myInputId19" class="form-control link_agn_inptss" disabled>
          </div>

           <div class="col-lg-3 link_agns_mrg">
          <label>Address<span class="link_agn_strrs">*</span></label>
              <textarea class="form-control link_agn_inptss" value="<?php echo $key['std_address'];?>" id="myInputId20" name="std_address" disabled><?php echo $key['std_address'];?></textarea>
          </div> 
          <div class="col-lg-3 link_agns_mrg">
          <label>Permanent Address<span class="link_agn_strrs">*</span></label>
              <textarea class="form-control link_agn_inptss" value="<?php echo $key['std_permanent_address'];?>" id='myInputId21' name="std_permanent_address" disabled><?php echo $key['std_permanent_address'];?></textarea>
          </div> 

       </div>

    </div>
  </div>
</div>
<?php echo form_close(); ?>

<style type="text/css">

  .link_agn_inptss{
    border-radius: 0px;
    color: gray;
  }

.link_guard_img{
    width: 200px;
    height: 189px;

}
.link_guard_tpp{
text-align: center;
color: gray !important;
font-family: -webkit-body;
}

.link_agns_mrg{
margin-top: 15px;
}

.link_agn_strrs{
color: red;
font-size: 18px;
}
.link_pp_img{
margin-top: 22px;
}
</style>

<script>
var toggle_disabled = function( e ) {
for(var i=0;i<=21;i++){
var input = document.getElementById('myInputId'+i);
input.disabled = !(input.disabled); 
 }
};
var button = document.getElementById('toggle_button');
button.addEventListener( 'click', toggle_disabled);

</script>

<script type="text/javascript">



  $('.std_pro_edit').click(function(){
    $('.std_pro_edit').hide();
    $('.std_pro_save').show(); 
  });

  $('.std_pro_save').click(function(){
    $('.std_pro_edit').show();
    $('.std_pro_save').hide(); 
  });

  $(document).ready(function(){
  $("#pic1").click(function(){
  $("#pic").trigger('click');
});
});
</script>