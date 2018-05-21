<?php 
$std_email = $this->session->userdata('std_array'); 
$parent_detailed = $this->session->userdata('parent_detailed');
$student_detailed = $this->session->userdata('student_detailed');
$login_from = $this->session->userdata('login_from');
$std_id=$student_detailed[0]['std_id'];
$u=random_string('alnum',4);
$v=random_string('alnum',2);
$encrypted_id = base64_encode('s'.$u.$std_id.$v.'m'); 

?>		
<div id="page-wrapper1" >
<h2 class="ward_select">Select your child</h2>
<div class="panel panel-default">
<!-- <div class="panel-heading ward_top">Select your child</div> -->
<div class="panel-body ward_pnl">
<div class="col-lg-4 ward_boxx">
<a href="student_view/<?php echo $encrypted_id;?>">
<div class="ward_box">
<div class="col-lg-12">
<center><img src="<?php echo base_url();?>application/assets/uploads/<?php echo $student_detailed[0]['std_image'];?>" class="img-responsive ward_imgg"></center>
</div>
<div class="col-lg-12 ward_six pull-right" >
<div class="ward_nxt">
<p class="ward_name"><?php echo $student_detailed[0]['std_fname'];?> <?php echo $student_detailed[0]['std_lname'];?> </p>
<p class="ward_para"><i class="fa fa-volume-control-phone" aria-hidden="true"></i><?php echo $student_detailed[0]['std_mobile'];?></p>
<p class="ward_para"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $student_detailed[0]['std_email'];?></p>
</div>
</div>
</div>
</a>
</div>
<?php 
foreach ($access_child as $key) {
$id[] = $key['std_id'];
$stt_id=$key['std_id'];
$u1=random_string('alnum',4);
$v1=random_string('alnum',2);
$encrypted_i = base64_encode('s'.$u1.$stt_id.$v1.'m'); 
$encrypted_id=substr($encrypted_i, 0, -2);
?>
<div class="col-lg-4 ward_boxx" >
<a href="student_view/<?php echo $encrypted_id;?>">
<div class="ward_box">
<div class="col-lg-12" style="padding: 0px;">
<center><img src="<?php echo base_url();?>application/assets/uploads/<?php echo $key['std_image'];?>" class="img-responsive ward_imgg"></center>
</div>
<div class="col-lg-12 ward_six pull-right" >
<div class="ward_nxt">
<p class="ward_name"><?php echo $key['std_fname'];?> <?php echo $key['std_lname'];?> </p>
<p class="ward_para"><i class="fa fa-volume-control-phone" aria-hidden="true"></i><?php echo $key['std_mobile'];?></p>
<p class="ward_para"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $key['std_email'];?></p>
</div>
</div>
</div>
</a>
</div>
<?php }  ?>
</div>
</div>
</div>

<?php

 $id1[] = $student_detailed[0]['std_id'];
 $id_all = array_merge($id,$id1);
 $id_allses = $this->session->set_userdata('id',$id_all);


?>












