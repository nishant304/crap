<?php
foreach ($parent_data1 as $key) {
  $id = $key['parent_id'];
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
  <?php echo form_open_multipart('admission/prnt_pro_img_update/'.$encrypted_id);?>
  <div class="panel-heading link_guard_tpp">Parent Information</div>
  <div class="panel-body">

     <div class="col-lg-2 link_pp_img">
      <img id="pic1" src="<?php echo base_url();?>application/assets/uploads/<?php echo $key['profile_images'];?>"  class="img-responsive std_pro_profile_img">

<input id="pic" type="file" name="profile_images" onchange="this.form.submit();">

  </div>
  <?php echo form_close(); ?>  

  <?php echo form_open('admission/parent_data/'.$encrypted_id);?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <div class="std_pro_editt pull-right">
        <h2><button type="button" class="btn btn-success std_pro_edit" class="btno" id="toggle_button">Edit</button>
        <button type="submit" class="btn btn-success std_pro_save">save</button></h2>
        </div>
        </div>
       <div class="col-lg-10">
       	<div class="col-lg-3 link_agns_mrg">
       <label>Father Name<span class="link_agn_strrs">*</span></label>
       		<input type="text" id='myInputId0' name="father_name"  value="<?php echo $key['father_name'];?>" disabled class="form-control link_agn_inptss">
       	</div>

        <div class="col-lg-3 link_agns_mrg">
        <label>Mother Name<span class="link_agn_strrs">*</span></label>
          <input type="text" id='myInputId1' name="mother_name"  value="<?php echo $key['mother_name'];?>" name="mother_name" disabled class="form-control link_agn_inptss">
        </div>


        <div class="col-lg-3 link_agns_mrg">
        	<label>father Email<span class="link_agn_strrs">*</span></label>
       		<input type="text" value="<?php echo $key['father_email'];?>" name="father_email" id='myInputId2' disabled class="form-control link_agn_inptss">
        </div> 

         <div class="col-lg-3 link_agns_mrg">
          <label>Child Id<span class="link_agn_strrs">*</span></label>
          <input type="text" value="<?php echo $key['std_id'];?>" name="std_id" id='myInputId3' disabled class="form-control link_agn_inptss">
        </div>


          <div class="col-lg-3 link_agns_mrg">
            <label>Father Phone<span class="link_agn_strrs">*</span></label>
            <input type="text" id="myInputId4" type="date"  value="<?php echo $key['father_phone'];?>" name="father_phone" disabled class="form-control link_agn_inptss">
          </div>

           <div class="col-lg-3 link_agns_mrg">
        <label>Mother Phone<span class="link_agn_strrs">*</span></label>
          <input type="text" id='myInputId5' name="mother_phone"  value="<?php echo $key['mother_phone'];?>" disabled class="form-control link_agn_inptss">
        </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Father Occupation<span class="link_agn_strrs">*</span></label>
            <input type="text" value="<?php echo $key['father_occupation'];?>" name="father_occupation" id="myInputId6" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Guardian Phone<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['guardian_phone'];?>" name="guardian_phone" id="myInputId7" class="form-control link_agn_inptss" disabled>
          </div>

           <div class="col-lg-3  link_agns_mrg">
            <label>Mother Occupation<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['mother_occupation'];?>" name="mother_occupation" id="myInputId8" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Mother Email<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['mother_email'];?>" name="mother_email" id="myInputId9" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Guardian Email<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['guardian_email'];?>" name="guardian_email" id="myInputId10" class="form-control link_agn_inptss" disabled>
          </div>

           <div class="col-lg-3  link_agns_mrg">
            <label>Guardian Name<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['guardian_name'];?>" name="guardian_name" id="myInputId11" class="form-control link_agn_inptss" disabled>
          </div>

          <div class="col-lg-3  link_agns_mrg">
            <label>Guardian Occupation<span class="link_agn_strrs">*</span></label>
            <input value="<?php echo $key['guardian_occupation'];?>" name="guardian_occupation" id="myInputId12" class="form-control link_agn_inptss" disabled>
          </div>

        	 <div class="col-lg-3 link_agns_mrg">
        	<label>Father Address<span class="link_agn_strrs">*</span></label>
        	   	<textarea class="form-control link_agn_inptss" value="<?php echo $key['father_address'];?>" id="myInputId13" name="father_address" disabled><?php echo $key['father_address'];?></textarea>
        	</div> 
          <div class="col-lg-3 link_agns_mrg">
          <label>Mother Address<span class="link_agn_strrs">*</span></label>
              <textarea class="form-control link_agn_inptss" value="<?php echo $key['mother_address'];?>" id='myInputId14' name="mother_address" disabled><?php echo $key['mother_address'];?></textarea>
          </div> 
          <div class="col-lg-3 link_agns_mrg">
          <label>Guardian Address<span class="link_agn_strrs">*</span></label>
              <textarea class="form-control link_agn_inptss" value="<?php echo $key['guardian_address'];?>" id='myInputId15' name="guardian_address" disabled><?php echo $key['guardian_address'];?></textarea>
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


$(document).ready(function(){
  $("#pic1").click(function(){
  $("#pic").trigger('click');
});
});

 $('.std_pro_edit').click(function(){
    $('.std_pro_edit').hide();
    $('.std_pro_save').show(); 
  });

  $('.std_pro_save').click(function(){
    $('.std_pro_edit').show();
    $('.std_pro_save').hide(); 
  });


</script>