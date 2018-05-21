<?php
$in_stf = $this->session->flashdata('in_staff');
$desi = $this->session->set_userdata('desgni');
$date4 = $this->session->userdata('date_flash1');
$sellect_date1 = 'd'.date("d", strtotime($date4));
$desg_fls = $this->session->userdata('desg_flash');

 ?>
 <?php echo form_open('admission/staff_attendance'); ?>
<div id="page-wrapper">
<div class="container-fluid margi_top">
<div class="col-lg-12 std_main" >
  <h2 class="hr_view">Staff Attendance/View Attendance</h2>
  <ul class="nav nav-tabs tab_show_stdnt">
    <li class="active"><a data-toggle="tab" href="#home" class="combi_inee_dlts cv">Daily Attendance</a></li>
    <li><a data-toggle="tab" href="#menu1" class="combi_inee_dlts1 cv1">View Attendance</a></li>
  </ul>
  <div class="tab-content ">
    <div id="home" class="tab-pane fade in active tab_borde">  
  <div class="panel panel-default hr_margin">
    <div class="panel-heading  hr_atten"> Attendance</div>
    <div class="panel-body padding-o">   
       <div class="col-lg-12 padding-o hr_cllm">      
         <div class="col-lg-4">
         <label>Designition&nbsp;<span class="hr_clr">*</span></label> 
          <select class="form-control hr_slt" name="stf_desg" onchange="stf_desig(this.value);">
          <option>Select</option>
        <?php 
        foreach ($fetch_designation as $key) {
          $designation = $key['designation'];

        ?>
         <option <?php if($key['designation_id'] == $desg_fls){ ?> selected <?php } ?> value="<?php if(empty($desg_fls)){ echo $key['designation_id']; } else { echo $desg_fls; } ?>"><?php echo $designation; ?></option> 
         <?php } ?>
          </select>
         </div>
         <div class="col-lg-4">
                <label>DATE&nbsp;</label>
                <input type="date" id="datepicker" class="form-control hr_slt" value="<?php if(!empty($date4)) { echo $date4; }?>" name="date_select1" onchange="this.form.submit();">
              </div>
       </div>
    </div>
  </div>
<?php echo form_close(); ?>


  <!-- next panel start here -->

<?php echo form_open('admission/stff_attandance_set'); ?>
  <div class="panel panel-default hr_secpnl">
    <div class="panel-heading hr_hdd">Employee Attendance Marking</div>
    <div class="panel-body">
      
    <div class="table-responsive">  
  <table class="table table-bordered">
    <thead>
      <tr class="hr_tbll">
        <th><input type="checkbox" onclick="check()" class="present">P</th>
        <th><input type="checkbox" onclick="check()" class="present1">A</th>
        <th><input type="checkbox" onclick="check()" class="present2">L</th>
        <th><input type="checkbox" onclick="check()" class="present3">HD</th>
        <th>Name</th>
        <th>Remarks</th>
      </tr>
    </thead>
    <tbody>
       <input type="hidden" value="<?php print_r($in_stf); ?>" name="hiddendata">
    <?Php
        foreach ($in_stf['all_staff'] as $key) {
        ?>
      <tr>
        <input type="hidden" name="stf_id[]" value="<?php echo $key['stf_id']; ?>">

        <td><input type="radio" <?php $checked="checked";
         foreach ($fetch_chkdata as $key1) {
          $key1[$sellect_date1];
         if($key1['stf_id'] == $key['stf_id']){ ?>
         <?php if($key1[$sellect_date1] == 'P'){ echo $checked;  }  }  }?> name="chk<?php echo $key['stf_id']; ?>" value="P" class="present11" id="present1">
         </td>

         <td><input type="radio" <?php $checked="checked";
         foreach ($fetch_chkdata as $key1) {
          $key1[$sellect_date1];
         if($key1['stf_id'] == $key['stf_id']){ ?>
         <?php if($key1[$sellect_date1] == 'A'){ echo $checked;  }  }  }?> name="chk<?php echo $key['stf_id']; ?>" value="A" class="present12" id="present2">
         </td>

         <td><input type="radio" <?php $checked="checked";
         foreach ($fetch_chkdata as $key1) {
          $key1[$sellect_date1];
         if($key1['stf_id'] == $key['stf_id']){ ?>
         <?php if($key1[$sellect_date1] == 'L'){ echo $checked;  }  }  }?> name="chk<?php echo $key['stf_id']; ?>" value="L" class="present13" id="present3">
         </td>

         <td><input type="radio" <?php $checked="checked";
         foreach ($fetch_chkdata as $key1) {
          $key1[$sellect_date1];
         if($key1['stf_id'] == $key['stf_id']){ ?>
         <?php if($key1[$sellect_date1] == 'HD'){ echo $checked;  }  }  }?> name="chk<?php echo $key['stf_id']; ?>" value="HD" class="present14" id="present4">
         </td>

        <td id="name" name="stf_name"><input type="text" name="stf_name[]" value="<?php echo $key['stf_fname']." ".$key['stf_lname']; ?>"></td>

        <input type="hidden" value="<?php echo $key['stf_designation']; ?>" name="stf_designation">

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

 <div id="menu1" class="tab-pane fade tab_borde">   
  <div class="panel panel-default hr_margin">
    <div class="panel-heading hr_atten">Attendance</div>
    <div class="panel-body">
      
       
         <div class="col-lg-12 hr_cllm padding-o">
        
         <div class="col-lg-4">
          <label>Designition&nbsp;<span class="hr_clr">*</span></label> 
          <select class="form-control hr_slt" id="stf_dsg" onchange="stf_desig(this.value);">
          <option>Select</option>
        <?php 
        foreach ($fetch_designation as $key) {
          $designation = $key['designation'];

        ?>
         <option value="<?php echo $key['designation_id']; ?>"><?php echo $designation; ?></option> 
         <?php } ?>
          </select>
          </div>
        <div class="col-lg-4">
          <label>Year&nbsp;<span class="hr_clr">*</span></label> 
                <select name="Course" id="slct_yr" class="form-control hr_slt">
                <option value="-1" selected>Select Year.....</option>
                  <?php for($i = 2000 ; $i<= date('Y')+1 ; $i++) {
                  ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php } ?>
                 </select>
           </div>
               <div class="col-lg-4">
         <label>MONTH&nbsp;<span class="hr_clr">*</span></label> 
                <select name="Course" class="form-control hr_slt" onchange="viewstf_attendance(this.value);">
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
    <thead id="view_stf">
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



<script type="text/javascript">

  function stf_desig(value)
  {
    $.ajax({

      type    :  "POST",
      url     :  "<?php echo base_url(); ?>index.php/admission/staff_ajx_fetch/"+value+"/",
      data    :  {'desig':value},
      success :function(data){

      }

    });

  }
  
</script>

<script type="text/javascript">
  function viewstf_attendance(value)
  {
    var design = document.getElementById('stf_dsg').value;
    var years = document.getElementById('slct_yr').value;
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/admission/stf_attendance_view/"+design+"/"+value+"/"+years+"/",

      data    :  {'desg':design,'month':value,'year1':years},
      success : function(data)
      {
         $("#view_stf").html(data);
        

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