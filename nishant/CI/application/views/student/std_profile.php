<?php  
foreach($data as $key) {
  $id = $key['std_id'];
 }
$u=random_string('alnum',4);
$v=random_string('alnum',2);
$encrypted_id = base64_encode('s'.$u.$id.$v.'m');
?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div class="container well std_pro_first" id="page-wrapper">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

 <?php echo form_open_multipart('student_controller/std_pro_img_update/'.$encrypted_id); ?>

 <center>

      <img  id="pic1" src="<?php echo base_url();?>application/assets/uploads/<?php echo $key['std_image'];?>" class="img-responsive std_pro_profile_img"  >

       <input id="pic" type="file" name="std_image" onchange="this.form.submit();" >
 </center>

  <h2 class="std_pro_name"><?php echo $key['std_fname']." ".$key['std_lname'];?></h2>
  <!-- <p class="std_pro_subject">Socal science</p> -->
   <a href="#" class="std_pro_city"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Comilla,Bangladesh</a>

  <?php echo form_close(); ?>  


</div>
<?php echo form_open('student_controller/std_profile_data/'.$encrypted_id);?>
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 std_pro_bg_clr">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 std_pro_dtl" >
        	<h2>Personal Detail</h2>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <div class="std_pro_editt pull-right">
        	<h2><button type="button" class="btn btn-success std_pro_edit" class="btno" id="toggle_button">Edit</button>
          <button type="submit" class="btn btn-success std_pro_save" >save</button></h2>
        </div>
        	
        </div>
          <div class="col-lg-12 std_pro_personal">
          	<div class="col-lg-6 std_pro_roww">
          		<div class="col-lg-12 std_pro_colo">
          			<div class="col-lg-6">
          			
          				<p><i class="fa fa-address-book  std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Name</p>
          		
          			</div>
          			<div class="col-lg-6">
          				<input  value="<?php echo $key['std_fname']." ".$key['std_lname'];?>"  readonly>
          			</div>

               <div class="col-lg-6">
                
                  <p><i class="fa fa-address-book  std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Roll no</p>
              
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_roll_no'];?>" name="std_roll_no" readonly>
                </div>

                 	<div class="col-lg-6">
          			 <p><i class="fa fa-phone std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Phone</p>
          			  </div>
          			<div class="col-lg-6">
          				<input value="<?php echo $key['std_mobile'];?>" id='myInputId1' name="std_mobile" disabled>
          			</div>
          			<div class="col-lg-6">
          				<p><i class="fa fa-user-o std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;D.O.B</p>
          				
          			</div>
          			<div class="col-lg-6">
          				<input type=""  value="<?php echo $key['std_dob'];?>" name="std_dob" readonly>
          			</div>
          			<div class="col-lg-6">
          				<p><i class="fa fa-envelope-o std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Father Name</p>
          				
          			</div>
          			<div class="col-lg-6">
          				<input value="<?php echo $key['std_father_name'];?>"  name="std_father_name" readonly>
          			</div>
                  <div class="col-lg-6">
                  <p><i class="fa fa-envelope-o std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Father Email</p>
                  
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_father_email'];?>" name="std_father_email" readonly>
                </div>
                  <div class="col-lg-6">
                  <p><i class="fa fa-envelope-o std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Mother Name</p>
                  
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_mother_name'];?>" name="std_mother_name" readonly>
                </div>
                 <div class="col-lg-6">
                <p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; Guardian Email</p>
                 </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_guardian_email'];?>"  name="std_guardian_email"  readonly>
                </div>
          		</div>
          	</div>

          		<div class="col-lg-6 std_pro_roww">
          		<div class="col-lg-12 std_pro_colo">
          			<div class="col-lg-6">
          				<p><i class="fa fa-address-card-o std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;Email</p>
          				
          			</div>
          			<div class="col-lg-6">
          				<input value="<?php echo $key['std_email'];?>" name="std_email"  readonly>
          			</div>
          			<div class="col-lg-6">
          				<p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Address</p>
          				
          			</div>
          			<div class="col-lg-6">
          				<input value="<?php echo $key['std_address'];?>" id='myInputId2' name="std_address" disabled>
          			</div>

          			<div class="col-lg-6">
                  <p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Gender</p>
                  
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_gender'];?>"  name="std_gender"  readonly>
                </div>
                <div class="col-lg-6">
                <p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; Class</p>
                  
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_class'];?>"  name="std_class"  readonly>
                </div>
               

                  <div class="col-lg-6">
                <p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; Guardian Name</p>
                  
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_guardian_name'];?>" name="std_guardian_name"  readonly>
                </div>
                  <div class="col-lg-6">
                <p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; Mother Email</p>
                  
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_mother_email'];?>"  name="std_mother_email"  readonly>
                </div>
                <div class="col-lg-6">
                <p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; Section</p>
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_section'];?>"  name="std_section"  readonly>
                </div>
                <div class="col-lg-6">
                <p><i class="fa fa-male std_pro_iconn" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; Riligion</p>
                </div>
                <div class="col-lg-6">
                  <input value="<?php echo $key['std_religion'];?>" id='myInputId3' name="std_religion"  disabled>
                </div>

              </div>
            </div>
     <?php echo form_close();?>
          </div>
     </div>
</div>
</div>
 

<script type="text/javascript">
$(document).ready(function(){
  $("#pic1").click(function(){
  $("#pic").trigger("click");
});
});

var toggle_disabled = function( e ) {
for(var i=1;i<=3;i++){
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
</script>
