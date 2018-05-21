<div id="page-wrapper">
<div id="menu1" class="tab-pane fade in active">   
  <div class="panel panel-default hr_margin">
    <div class="panel-heading hr_atten">Attendance</div>
    <div class="panel-body">
    	
       
         <div class="col-lg-12 hr_cllm">
    	 	
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
  <div id="container" style="height: 400px"></div>
  </div>


<script type="text/javascript">
  function viewstf_attendance(value)
  {
    var design = document.getElementById('stf_dsg').value;
    var years = document.getElementById('slct_yr').value;
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/teacher_controller/stf_attendance_view/"+design+"/"+value+"/"+years+"/",

      data    :  {'desg':design,'month':value,'year1':years},
      success : function(data)
      {
         $("#view_stf").html(data);
        

      }
    });
  }
</script>