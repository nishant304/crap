<?php 
$user_listedd=explode(',',$role_autho[0]['class_attendance']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>




<?php
$in = $this->session->flashdata('in');
$class3 = $this->session->userdata('cls',$cls_all);
$section3 = $this->session->userdata('sect',$sec_all);
$date3 = $this->session->userdata('date_flash',$sellect_date);
$sellect_date2 = 'd'.date("d", strtotime($date3));
 
 ?>
 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
 <?php echo form_open('admission/attendance_report'); ?>
 <?php }  ?>
<div id="page-wrapper">
<div class="container-fluid margi_top">
<div class="col-lg-12 std_main" >
  <h2 class="hr_view">Daily Attendance/View Attendance</h2>
  <ul class="nav nav-tabs tab_show_stdnt">
    <li class="active"><a data-toggle="tab" href="#home" class="combi_inee_dlts cv">Daily Attendance</a></li>
    <li><a data-toggle="tab" href="#menu1" class="combi_inee_dlts1 cv1">View Attendance</a></li>
  </ul>
  <div class="tab-content">
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
    <div id="home" class="tab-pane fade in active tab_borde">  
  <div class="panel panel-default hr_margin">
    <div class="panel-heading  hr_atten"> Attendance</div>
    <div class="panel-body padding-o">   
       <div class="col-lg-12 hr_cllm padding-o">      
         <div class="col-lg-4">
         <label>Class&nbsp;<span class="hr_clr">*</span></label> 
          <select class="form-control hr_slt" name="std_class" id="clss_data" onchange="stu_cls1(this.value);">
          <option>Select</option>
        <?php 
        foreach ($class_data['class'] as $key) {
          $class = $key['class_name'];

        ?>
         <option <?php if($class3 == $class){ ?> selected <?php } ?> value="<?php echo $class; ?>"><?php echo $class; ?></option> 
         <?php } ?>
             
          </select>

          </div>

           <div class="col-lg-4">
          <label>Section&nbsp;<span class="hr_clr">*</span></label> 
          <select class="form-control hr_slt" id="sec_get" onchange="stu_sec(this.value);">
         <option>Select</option>
        <?php
         foreach ($class_data['section'] as $key) {
          $section = $key['class_section'];
        ?>
         <option <?php if($section == $section3){?> selected <?php } ?> ><?php echo $section; ?></option> 
          <?php } ?>       
          </select>
           </div>
         <div class="col-lg-4">
                <label>DATE&nbsp;</label>
                <input type="text" placeholder="" class="form-control hr_slt" id="datepicker" value="<?php echo $date3; ?>" name="date_select1" onchange="this.form.submit();">
              </div>
       </div>
    </div>
  </div>
<?php echo form_close(); ?>


  <!-- next panel start here -->
<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
<?php echo form_open('admission/stu_attandance_set'); ?>
<?php  }  ?>
  <div class="panel panel-default hr_secpnl">
    <div class="panel-heading hr_hdd">Employee Attendance Marking</div>
    <div class="panel-body ">
      
    <div class="table-responsive">  
  <table class="table table-bordered">
    <thead>
      <tr class="hr_tbll">
        <th><input type="checkbox" onclick="check()" class="present">P</th>
        <th><input type="checkbox" onclick="check()" class="present1">A</th>
        <th><input type="checkbox" onclick="check()" class="present2">L</th>
        <th><input type="checkbox" onclick="check()" class="present3">HD</th>
        <th>Name</th>
        <th>Roll NO.</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
       <input type="hidden" value="<?php print_r($in); ?>" name="hiddendata">
    <?Php
        foreach ($in['all_std'] as $key) {
        ?>
      <tr>
        <input type="hidden" name="id[]" value="<?php echo $key['std_id']; ?>">

         <td>
        <input type="radio" <?php $checked="checked";
         foreach ($class_data['attendance_data'] as $key1) {
          $key1[$sellect_date2];
         if($key1['std_id']==$key['std_id']){ ?>
         <?php if($key1[$sellect_date2]=='P'){ echo $checked;  }  }  }?> name="chk<?php echo $key['std_id']; ?>" value="P" class="present11" id="present1"></td>

         <td><input type="radio" <?php $checked="checked";
         foreach ($class_data['attendance_data'] as $key1) {
          $key1[$sellect_date2];
         if($key1['std_id']==$key['std_id']){ ?>
         <?php if($key1[$sellect_date2]=='A'){ echo $checked;  }  }  }?> name="chk<?php echo $key['std_id']; ?>" value="A" class="present12" id="present2"></td>

         <td><input type="radio" <?php $checked="checked";
         foreach ($class_data['attendance_data'] as $key1) {
          $key1[$sellect_date2];
         if($key1['std_id']==$key['std_id']){ ?>
         <?php if($key1[$sellect_date2]=='L'){ echo $checked;  }  }  }?> name="chk<?php echo $key['std_id']; ?>" value="L" class="present13" id="present3"></td>

         <td> <input type="radio" <?php $checked="checked";
         foreach ($class_data['attendance_data'] as $key1) {
          $key1[$sellect_date2];
         if($key1['std_id']==$key['std_id']){ ?>
         <?php if($key1[$sellect_date2]=='HD'){ echo $checked;  }  }  }?> name="chk<?php echo $key['std_id']; ?>" value="HD" class="present14" id="present4"></td>

        <td id="name" name="std_name"><input type="text" name="std_name[]" value="<?php echo $key['std_fname']." ".$key['std_lname']; ?>"></td>

        <td><input type="text" value="<?php echo $key['std_roll_no']; ?>" name="std_roll_no[]"></td>

        <td> <input type="text" name="remark" class="form-control hr_inpt"></td>
      </tr>
       <?php } ?>
    </tbody>
  </table>
  </div>
   <div class="hr_btnn pull-right">
        <input class="btn btn-primary sub_margs_alloc_sltcs" type="submit" value="submit">
       </div>
  </div>
  </div>


     
    </div>
<?php echo form_close(); ?>
<?Php   }   ?>

 <div id="menu1" class="tab-pane fade tab_borde">   
  <div class="panel panel-default hr_margin">
    <div class="panel-heading hr_atten">Attendance</div>
    <div class="panel-body padding-o">
      
       
         <div class="col-lg-12 hr_cllm">
        
         <div class="col-lg-3">
         <label>Class&nbsp;<span class="hr_clr">*</span></label> 
            <select name="Course" id="clss_data_2" class="form-control hr_slt" onchange="stu_cls2(this.value);">
              <option value="" selected>Select Class.....</option>    <?php 
            foreach ($class_data['class'] as $key) {
              $class = $key['class_name'];

            ?>
         <option <?php if($class3 == $class){ ?> selected <?php } ?> value="<?php echo $class; ?>"><?php echo $class; ?></option> 
         <?php } ?>
            </select>

          </div>

                 <div class="col-lg-3">
         <label>Section&nbsp;<span class="hr_clr">*</span></label> 
                <select class="form-control hr_slt" id="sec_get1">
                <option value="-1" selected>Select Section.....</option>
                  <?php
         foreach ($class_data['section'] as $key) {
          $section = $key['class_section'];
        ?>
         <option <?php if($section == $section3){?> selected <?php } ?> ><?php echo $section; ?></option> 
          <?php } ?>
                 </select>

          </div>

<div class="col-lg-3">
          <label>YEAR&nbsp;<span class="hr_clr">*</span></label> 
                <select name="Course" id="selct_yr" class="form-control hr_slt">
                  <option value="-1" selected>Select Year.....</option>
                  <?php for($i = 2000 ; $i<= date('Y')+1 ; $i++) {
                  ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php } ?>
                 </select>
                 
           </div>
               <div class="col-lg-3">
         <label>MONTH&nbsp;<span class="hr_clr">*</span></label> 
                <select name="Course" class="form-control hr_slt" onchange="view_attendance(this.value);">
                  <option value="-1" selected>Select Month.....</option>
                  <option value="1">January</option>
                  <option value="2">Feburary</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">Octuber</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                 </select>
          </div>
           
       </div>
    </div>
  </div>
<!-- second panellll -->
  <div class="panel panel-default hr_toop">
    <div class="panel-heading hr_attp">Attendance Report</div>
    <div class="panel-body">
      <div class="table-responsive" > 
  <table class=" table responsive table table-bordered table table-striped">
    <thead id="view">
    </thead>
  </table>
  </div>
  </div>
  </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php   }    ?>

<script type="text/javascript">

  function stu_cls1(value)
  {

    var class_ajx = document.getElementById('clss_data').value;

    $.ajax({

      type    :  "POST",
      url     :  "<?php echo base_url(); ?>index.php/admission/all_section/"+class_ajx+"/",
      data    :  {'class3':class_ajx},
      success :function(data){
        
        $("#sec_get").html(data);
        

      }

    });

  }
    function stu_cls2(value)
  {

    var class_ajx = document.getElementById('clss_data_2').value;

    $.ajax({

      type    :  "POST",
      url     :  "<?php echo base_url(); ?>index.php/admission/all_section/"+class_ajx+"/",
      data    :  {'class3':class_ajx},
      success :function(data){
        
        
        $("#sec_get1").html(data);

      }

    });

  }

  function stu_sec(value)
  {
    var sec_ajx = document.getElementById('sec_get').value;
    var class_ajx = document.getElementById('clss_data').value;
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/admission/stu_ajx_fetch/"+class_ajx+"/"+sec_ajx+"/",
      data    :  {'class3':class_ajx,'sec3':sec_ajx},
      success : function(data)
      {
         $("#std").html(data);

      }
    });
  }
   
</script>

<script type="text/javascript">
  function view_attendance(value)
  {
    var class_ajx1 = document.getElementById('clss_data_2').value;
    var section_ajx1 = document.getElementById('sec_get1').value;
    var year_ajx1 = document.getElementById('selct_yr').value;
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/admission/attendance_view/"+class_ajx1+"/"+section_ajx1+"/"+value+"/"+year_ajx1+"/",

      data    :  {'class4':class_ajx1,'sec4':section_ajx1,'month':value,'year3':year_ajx1},
      success : function(data)
      {
      $("#view").html(data);
      }
    });
   }
</script>


<script>

function check(){

if($('.present').is(':checked')){
    $('.present11').prop('checked', true);
  }
  else{
    $('.present11').prop('checked', false);
  }


if($('.present1').is(':checked')){
    $('.present12').prop('checked', true);
  }
  else{
    $('.present12').prop('checked', false);
  }


if($('.present2').is(':checked')){
    $('.present13').prop('checked', true);
  }
  else{
    $('.present13').prop('checked', false);
  }



if($('.present3').is(':checked')){
    $('.present14').prop('checked', true);
  }
  else{
    $('.present14').prop('checked', false);
  }

};

</script>
<script type="text/javascript">
      $('.combi_inee_dlts1').click(function() {
      $('.cv1').removeClass("combi_inee_dlts1");
      $('.cv1').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
});
    $('.combi_inee_dlts').click(function() {
     $('.cv1').removeClass("combi_inee_dlts");
      $('.cv1').addClass("combi_inee_dlts1");
      $('.cv').removeClass("combi_inee_dlts1");
       $('.cv').addClass("combi_inee_dlts");
});
</script>