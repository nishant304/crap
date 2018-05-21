<?php
foreach ($pro_stf as $key) {
 echo $id = $key['stf_id'];
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
   <?php echo form_open_multipart('admission/stf_pro_img_update/'.$encrypted_id);?>
  <div class="panel-heading link_guard_tpp">Student Information</div>
  <div class="panel-body">

     <div class="col-lg-2 link_pp_img">
      <img src="<?php echo base_url();?>application/assets/uploads/<?php echo $key['stf_image'];?>" id="pic1" class="img-responsive std_pro_profile_img">

      <input id="pic" type="file" name="stf_image" onchange="this.form.submit();" >
  </div>
  <?php echo form_close(); ?>  

  <?php echo form_open('admission/stf_data/'.$encrypted_id);?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <div class="std_pro_editt pull-right">
          <h2><button type="button" class="btn btn-success std_pro_edit" class="btno" id="toggle_button">Edit</button>
          <button type="submit" class="btn btn-success std_pro_save" >save</button></h2>
        </div>

        </div>
       <div class="col-lg-10">
        <div class="col-lg-3 link_agns_mrg">
        <label>Name<span class="link_agn_strrs">*</span></label>
         <input type="text" id='myInputId0' name="stf_name"  value="<?php echo $key['stf_fname']." ".$key['stf_lname'];?>" disabled class="form-control link_agn_inptss">
        </div>

        <div class="col-lg-3 link_agns_mrg">
        <label>Desigination<span class="link_agn_strrs">*</span></label>

         <select id='myInputId1' name="stf_designation" disabled class="form-control link_agn_inptss">
           <option>Select</option>
           <?php
           echo $selected = "selected";
            foreach($fetch_designation as $key1 => $value1) { ?>
          <option  <?php if($key['stf_designation'] == $value1['designation']){ echo $selected;  } ?> value="<?php echo $value1['designation']; ?>"><?php echo $value1['designation']; ?></option>
                  <?php } ?>

         </select>
        </div>

       

        <div class="col-lg-3 link_agns_mrg">
        <label>Email<span class="link_agn_strrs">*</span></label>
          <input type="text" id='myInputId2' name="stf_email"  value="<?php echo $key['stf_email'];?>" name="stf_email" disabled class="form-control link_agn_inptss">
        </div>


        <div class="col-lg-3 link_agns_mrg">
          <label>Phone<span class="link_agn_strrs">*</span></label>
         <input type="text" value="<?php echo $key['stf_phone'];?>" name="stf_phone" id='myInputId3' disabled class="form-control link_agn_inptss">
        </div> 

         <div class="col-lg-3 link_agns_mrg">
          <label>Mobile<span class="link_agn_strrs">*</span></label>
          <input type="text" value="<?php echo $key['stf_mobile'];?>" name="stf_mobile" id='myInputId4' disabled class="form-control link_agn_inptss">
        </div>

          <div class="col-lg-3 link_agns_mrg">
           <label>DOB<span class="link_agn_strrs">*</span></label>
           <input type="date" id="myInputId5" type="date"  value="<?php echo $key['stf_dob'];?>" name="stf_dob" disabled class="form-control link_agn_inptss">
          </div>

          <div class="col-lg-3 link_agns_mrg">
            <label>DOJ<span class="link_agn_strrs">*</span></label>
            <input type="date" id="myInputId6" type="date"  value="<?php echo $key['stf_doj'];?>" name="stf_doj" disabled class="form-control link_agn_inptss">
          </div>

           <div class="col-lg-3 link_agns_mrg">
        <label>Qualification<span class="link_agn_strrs">*</span></label>
          <input type="text" id='myInputId7' name="stf_qualification"  value="<?php echo $key['stf_qualification'];?>" disabled class="form-control link_agn_inptss">
        </div>

    
          <div class="col-lg-3  link_agns_mrg">
            <label>Gender<span class="link_agn_strrs">*</span></label>
            
          <select id="myInputId8" name="stf_gender" class="form-control link_agn_inptss" disabled>
            <option <?php if($key['stf_gender'] == 'male') {?> selected <?php } ?> value= "male">Male</option>
            <option <?php if($key['stf_gender'] == 'female') {?> selected <?php } ?> value= "female">Female</option>
            <option <?php if($key['stf_gender'] == 'other') {?> selected <?php } ?> value= "other">Other</option>
            </select>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Registeration date<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['stf_register_date'];?>" name="stf_register_date" id="myInputId9" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>City<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['stf_city'];?>" name="stf_city" id="myInputId10" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Nationality<span class="link_agn_strrs">*</span></label>
          
            <select name="stf_country" id="myInputId11" class="form-control link_agn_inptss" disabled>
              <option>Select</option>
              <option <?php if($key['stf_country'] == 'Indian') {?> selected <?php } ?> value= "Indian">Indian</option>
              <option <?php if($key['stf_country'] == 'Other') {?> selected <?php } ?> value= "Other">Other</option>
            </select>
          </div>

           <div class="col-lg-3 link_agns_mrg">
        <label>Experience<span class="link_agn_strrs">*</span></label>

          <select id='myInputId12' name="stf_experience" disabled class="form-control link_agn_inptss">
            <?php for($i = 1 ; $i<= 25 ; $i++){ ?>
            <option <?php if($key['stf_experience'] == $i) {?> selected <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>


           <div class="col-lg-3 link_agns_mrg">
          <label>Present Address<span class="link_agn_strrs">*</span></label>
              <textarea class="form-control link_agn_inptss" value="<?php echo $key['stf_pres_address'];?>" id="myInputId13" name="stf_pres_address" disabled><?php echo $key['stf_pres_address'];?></textarea>
          </div> 
          <div class="col-lg-3 link_agns_mrg">
          <label>Permanent Address<span class="link_agn_strrs">*</span></label>
              <textarea class="form-control link_agn_inptss" value="<?php echo $key['stf_perm_address'];?>" id='myInputId14' name="stf_perm_address" disabled><?php echo $key['stf_perm_address'];?></textarea>
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

 $('.std_pro_edit').click(function(){
    $('.std_pro_edit').hide();
    $('.std_pro_save').show(); 
  });

  $('.std_pro_save').click(function(){
    $('.std_pro_edit').show();
    $('.std_pro_save').hide(); 
  });

</script>

