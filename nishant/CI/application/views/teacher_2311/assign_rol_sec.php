<?php
    $data_stf = $this->session->userdata('data_auth');

   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1)
   {
   
    $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    }
   ?>
<?php echo form_open('teacher_controller/assign_roll_section');?>

<div id="page-wrapper">
<div class="main-page"  id="myDIV">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for class..">
<h3 class="title1">Assign Roll Section</h3>
<center><div id="loading"></div></center>
<div class="bs-example widget-shadow" id="table-wrapper" data-example-id="contextual-table"> 

<div class="box_stu_recrd" id="table-scroll">

<?php  print_r($msg_report); ?>
<table class="table table-bordered" id="tableData"> 
     <thead> 
<tr class="top-row">
 <th>#</th>
 <th>image</th>
  <th>Student Name</th>
    <th>Class</th>
    <th>Section</th>
    <th>Roll No</th>   
     </tr> 
  </thead>

<tbody>
<tr class="active">
<?php 
$selected="selected";
$i = 1;
foreach ($all_student as $student_data)
 {

  $student_id = $student_data['std_id'];
  $student_fname = $student_data['std_fname'];
  $student_class = $student_data['std_class'];
  $student_mobile = $student_data['std_mobile'];
  $student_image = $student_data['std_image'];
  $std_roll_no = $student_data['std_roll_no'];
  $std_section = $student_data['std_section'];
  $photo='<img src="http://localhost/CI/application/assets/uploads/'.$student_image.'"/>';
  $photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg">';

 
?>

     <th scope="row"><?php echo $i; ?></th>
     <td ><?php if($student_image == '') { echo $photo1; } else { echo $photo; }?></td>
      <td ><?php echo $student_fname; ?></td> 
      <td ><?php echo $student_class; ?></td> 
      <td><select name="std_section" id="dis<?php echo $student_id; ?>" onchange="add_section<?php echo  $student_id ?>(this.value);">
    <option value="">No Selection</option>
    <option <?php if($std_section == 'A') { echo $selected; } ?>>A</option>
    <option <?php if($std_section == 'B') { echo $selected; } ?>>B</option>
    <option <?php if($std_section == 'C') { echo $selected; } ?>>C</option>
    <option <?php if($std_section == 'D') { echo $selected; } ?>>D</option>
    <option <?php if($std_section == 'E') { echo $selected; } ?>>E</option>

    <option <?php if($std_section == 'F') { echo $selected; } ?>>F</option>
    <option <?php if($std_section == 'G') { echo $selected; } ?>>G</option>
    <option <?php if($std_section == 'H') { echo $selected; } ?>>H</option>
       </select>
       </td>
  <td><input type="text" id="stu_id<?php echo  $student_id; ?>" value="<?php echo $std_roll_no; ?>" name="std_roll_no" onblur="add_roll_no<?php echo  $student_id ?>(this.value);"><input type="hidden" name="std_id" value="<?php echo $student_id ; ?>" id="std_id<?php echo  $student_id; ?>"></td></tr>
<?php $i++; ?>


<script type="text/javascript">
  function add_section<?php echo  $student_id ?>(value)
  {
  var std_id=document.getElementById('std_id<?php echo  $student_id ?>').value;
  $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/assign_roll_section/"+value+"/"+std_id+"/",  
    data    : {'section':value,'std_id':std_id

},
success : function(data){
    if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    // run ajax request
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
            }, 1000);
        }
    });



}
      
    }
    
});


  }


 function add_roll_no<?php echo  $student_id ?>(value)
 {

var std_id=document.getElementById('std_id<?php echo  $student_id ?>').value;

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/assign_roll/"+value+"/"+std_id+"/",  
    data    : {'roll':value,'std_id':std_id

},
  success : function(data){
    if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    // run ajax request
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
            }, 1000);
        }
    });



}
      
    }
    
});
}
</script>

<?php
foreach ($exp['assign_sec_roll_no'] as $key => $value1) { }
foreach ($exp['assign_sec_roll_no'] as $key => $value) {
  if($value1 != 2 && $value == 1){ ?>
<script type="text/javascript">
  document.getElementById("dis<?php echo $student_id; ?>").disabled = true;
  document.getElementById("stu_id<?php echo $student_id; ?>").readOnly = true;
</script>
<?php } }?>


<?php } ?>
    </tbody>
</table> 

        </div>

        
    </div>

</div>


<?php
foreach ($exp['assign_sec_roll_no'] as $key => $value) {
 if($value == '') { ?> 
<script>
document.getElementById("myDIV").style.display = "none";
</script>
<h2 id="err"><?php echo "you have not authority !"; }
 }?></h2>

</div>

<?php echo form_close();?>
