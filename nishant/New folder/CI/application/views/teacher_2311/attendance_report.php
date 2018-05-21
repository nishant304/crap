<?php
  $stf_id = $this->session->userdata('stfdata');
 $data_stf = $this->session->userdata('data_auth');
$in = $this->session->flashdata('in');
 $class3 = $this->session->userdata('cls',$cls_all);
 $section3 = $this->session->userdata('sect',$sec_all);
$date3 = $this->session->userdata('date_flash',$sellect_date);
$sellect_date1 = 'd'.date("d", strtotime($date3));
   $incharge_id = $this->session->userdata('inchdata');

foreach ($incharge_data['incharge'] as $key => $value)
 {
      $incharge_id = $value['class_incharge'];
     $class_data1 = $value['class_name'];
     $section_data1 = $value['class_section'];

 }

  ?>



<?php echo form_open('teacher_controller/attendance_report'); ?>
<div class="page-wrapper">
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

<div class="container atnd_slc tp_marg">
<!-- condition start only for class incharge -->

<?php foreach ($exp['attendance'] as $key => $value) {
if($value == '' && $stf_id == $incharge_id){
  ?>
  <div class="col-lg-11 col-lg-offset-1 ">
  <div class="col-lg-7 col-lg-offset-3">
  <center>
       <div class="col-lg-2">
      <label>Class</label>
          <select name="std_class" class="slct_main" id="clss_data" >
          <option>Select</option>
        <?php 
        foreach ($incharge_data['incharge'] as $key) {
          $class = $key['class_name'];

        ?>
         <option <?php if($class3 == $class){ ?> selected <?php } ?> value="<?php echo $class; ?>"><?php echo $class; ?></option> 
         <?php } ?>
        </select>
      </div>

       <div class="col-lg-2 ">
      <label>Section</label>
        <select class="slct_main" id="sec_get" onchange="stu_sec(this.value);"">
        <option>Select</option>
        <?php
         foreach ($incharge_data['incharge'] as $key) {
          $section = $key['class_section'];
        ?>
         <option <?php if($section == $section3){?> selected <?php } ?> ><?php echo $section; ?></option> 
          <?php } ?>
        </select>
      </div>
      <div class="col-lg-2">
      <label>Date</label>
      <input type="text" id="datepicker1" value="<?php echo $date3; ?>" name="date_select" placeholder="Select a Date" onchange="this.form.submit();">
      </div>
      </center>
      </div>
      <?php echo form_close(); } }?>

    </div>
<!-- condition end only for class incharge -->


<!-- condition start for class incharge and read all attendence-->
<?php foreach ($exp['attendance'] as $key => $value) {
 if($value == '1'){
  ?>
  <div class="col-lg-11 col-lg-offset-1 ">
  <div class="col-lg-7 col-lg-offset-3">
  <center>

       <div class="col-lg-2">
      <label>Class</label>
          <select name="std_class" class="slct_main" id="clss_data" onchange="stu_cls(this.value);" >
          <option>Select</option>
        <?php 
        foreach ($all_class as $key) {
          $class[] = $key['class_name'];

       }
        $unique_data = array_unique($class);

       foreach ($unique_data as $key => $class) {
        ?>

         <option <?php if($class3 == $class){ ?> selected <?php } ?> value="<?php echo $class; ?>"><?php echo $class; ?></option> 
         <?php } ?>
        </select>
      </div>

       <div class="col-lg-2 ">
      <label>Section</label>
        <select class="slct_main" id="sec_get" onchange="stu_sec(this.value);"">
        <option>Select</option>
        <?php
         foreach ($all_class as $key) {
          $section = $key['class_section'];
        ?>
         <option <?php if($section == $section3){?> selected <?php } ?> ><?php echo $section; ?></option> 
          <?php } ?>
        </select>
      </div>
      <div class="col-lg-2">
      <label>Date</label>
      <input type="text" id="datepicker" value="<?php echo $date3; ?>" name="date_select" placeholder="Select a Date" onchange="this.form.submit();">
      </div>
      </center>
      </div>
      <?php echo form_close(); }} ?>

    </div>








<!-- authority 2 start -->
<?php foreach ($exp['attendance'] as $key => $value2) {
 if($value2 == '2' && $value == '1'){
  ?>
  <div class="col-lg-11 col-lg-offset-1 ">
  <div class="col-lg-7 col-lg-offset-3">
  <center>

       <div class="col-lg-2">
      <label>Class</label>
          <select name="std_class" class="slct_main" id="clss_data" onchange="stu_cls(this.value);" >
          <option>Select</option>
        <?php 
        foreach ($all_class as $key) {
          $class2[] = $key['class_name'];

       }
        $unique_data = array_unique($class2);

       foreach ($unique_data as $key => $class2) {
        ?>

         <option <?php if($class3 == $class2){ ?> selected <?php } ?> value="<?php echo $class2; ?>"><?php echo $class2; ?></option> 
         <?php } ?>
        </select>
      </div>

       <div class="col-lg-2 ">
      <label>Section</label>
        <select class="slct_main" id="sec_get" onchange="stu_sec(this.value);"">
        <option>Select</option>
        <?php
         foreach ($all_class as $key) {
          $section2 = $key['class_section'];
        ?>
         <option <?php if($section2 == $section3){?> selected <?php } ?> ><?php echo $section2; ?></option> 
          <?php } ?>
        </select>
      </div>
      <div class="col-lg-2">
      <label>Date</label>
      <input type="text" id="datepicker" value="<?php echo $date3; ?>" name="date_select" placeholder="Select a Date" onchange="this.form.submit();">
      </div>
      </center>
      </div>
      <?php echo form_close(); }} ?>

    </div>

<!-- authorty 2 end -->
<!-- checkbox hide and show start -->
    <?php foreach ($exp['attendance'] as $key => $value2) {
     if($value == '1' && $stf_id != $incharge_id){ ?> 
     <style type="text/css">
     #chk
     {
      display: none;
     }  
     </style>
      <?php } }?>
        <!-- checkbox hide and show end-->





        <!-- condition for null value and not incharge start-->
    <?php foreach ($exp['attendance'] as $key => $value2) {
     if($value == '' && $stf_id != $incharge_id){  ?> 
     <style type="text/css">
       #div_hide
       {
        display: none;
       }
      
     </style>
    <!--  <script>
document.getElementById("div_hide").style.display = "none";
</script> -->
      <h2 id="err"><?php echo "you are not authorised !"; } }?></h2>
        <!-- condition for null value and not incharge end-->



<!-- condition end for class incharge and read all attendence-->

    <?php  echo form_open('teacher_controller/stu_attandance_set'); ?>
    <div class="col-lg-8 col-lg-offset-3 table-responsive" id="div_hide">
      <table  class="table table-bordered">
        <th id="dd">STUDENT NAME</th> 
        <th>Roll No.</th>
        <th><input type="radio" onclick="for(c in document.getElementsByName('chk<?php echo $key['std_id']; ?>')) document.getElementsByName('chk').item(c).checked = this.checked" id="chk"></th> 

        <input type="hidden" value="<?php print_r($in); ?>" name="hiddendata">
        <?Php
        foreach ($in['all_std'] as $key) {
        ?>
        <tr>
        <input type="hidden" name="id[]" value="<?php echo $key['std_id']; ?>">

        <td id="name" name="std_name">
        <input type="text" name="std_name[]" value="<?php echo $key['std_fname']." ".$key['std_lname']; ?>"></td>

        <td><input type="text" value="<?php echo $key['std_roll_no']; ?>" name="std_roll_no[]">
        </td>


        
<td>
<input type="radio" <?php $checked = "checked";
   foreach($class_data['attendance_data'] as $key1){
          $key1[$sellect_date1];
         if($key1['std_id'] == $key['std_id']){
        if($key1[$sellect_date1] == 'P'){ echo $checked;  }  }  }
          ?> name="chk<?php echo $key['std_id']; ?>" id="chk" value="P">


        <input type="radio" <?php $checked="checked";
         foreach ($class_data['attendance_data'] as $key1) {
          $key1[$sellect_date1];
         if($key1['std_id']==$key['std_id']){
        ?>     <?php if($key1[$sellect_date1]=='A'){ echo $checked;  }  }  } ?> name="chk<?php echo $key['std_id']; ?>" id="chk" value="A"></td>
       
      </tr>
      <!-- condition start for submit button show and hide -->
      <?php } if($class3 == $class_data1 && $section3 == $section_data1){ ?>
         
        <div class="col-lg-offset-9"><input type="submit" value="submit"></div>

      <?php } elseif ($value == 2 ) { ?>

        <div class="col-lg-offset-9"><input type="submit" value="submit"></div>

      <?php }

       else if($class3 != $class_data1 && $section3 != $section_data1)
       {
          foreach ($in['all_std'] as $key3) {
        ?>
          
          <style type="text/css">
            #chk
            {
              display: none;
            }
          </style>

      <?php }}
echo form_close(); ?>
  <!-- condition end for submit button show and hide -->
</div>
</div>

</div>
<?php ?>



 














