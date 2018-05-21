 <?php 
     $lession_data1 = $this->session->userdata('lession_data');
  ?>
<div id="page-wrapper">
  <div class="col-lg-12">
  <div class="panel panel-default Lesson_dflt">
    <div class="panel-heading Lesson_top">Lesson Planning</div>
    <div class="panel-body Lesson_body">
    	   <div class="col-lg-12 Lesson_mrg">
               <div class="col-lg-4">
              	<label>Class&nbsp;<span class="Lesson_spn">*</span></label> 
                <select name="class_id" class="form-control Lesson_input" id="class_name" onchange="sec_plan(this.value);">

                  <option>Select...</option>
                  <?php foreach ($plan_class as $key => $value) { 
                    $class_data[] = $value['assign_class'];
                    }
                    $clss = array_unique($class_data);
                    foreach ($clss as $key => $value1) { ?>
                  <option><?php echo $value1; ?></option>
                  <?php } ?>
                 </select>
               
              </div>

              <div class="col-lg-4">
              	<label>Section&nbsp;<span class=" Lesson_spn">*</span></label> 
                 <select name="section_id" class="form-control Lesson_input" id="section_tab" onchange="sub_plan(this.value);">
                  <option >Select</option>
                 </select>
              </div>

              <div class="col-lg-4">
              	<label>Subject&nbsp;<span class=" Lesson_spn">*</span></label> 
                  <select name="sub_id" class="form-control Lesson_input" id="subject_tab" onchange="alllession_plan(this.value);">
                  <option>Select</option>
                 </select>
              </div>
              </div>
     </div>
    </div>
  </div>
<!-- form end here -->
<div class="col-lg-12 show_lev table-responsive">
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>Class</th>
    <th>Section</th>
    <th>Subject</th>
    <th>Description</th>
    <th>To</th>
    <th>From</th>
  
  </tr>
</thead>

<tbody>

    <?php 
    foreach ($lession_data1['plan_all'] as $key) { ?>
    <tr>
    <td><?php echo $key['class_id']; ?></td>
    <td><?php echo $key['section_id']; ?></td>
    <td><?php echo $key['sub_id']; ?></td>
    <td><?php echo $key['description']; ?></td>
    <td><?php echo $key['to_date']; ?></td>
    <td><?php echo $key['from_date']; ?></td>
  </tr>
  <?php } ?>
</tbody>  
</table>
</div>    
</div>

<!-- lession plan data script -->
<script type="text/javascript">
  function sec_plan(value)
  {
    $.ajax({
      type    : "POST",
       url     : "<?php echo base_url();?>index.php/teacher_controller/section_lession/"+value+"/",  
    data      : {'class_name':value},
    success   : function(data){
      $("#section_tab").html(data);
    }
    });
  }

  function sub_plan(value)
  {
    var clsss = document.getElementById('class_name').value;
    $.ajax({
      type    : "POST",
       url     : "<?php echo base_url();?>index.php/teacher_controller/section_subject/"+value+"/"+clsss+"/",  
    data      : {'section_name':value,'class_name':clsss},
    success   : function(data){
      $("#subject_tab").html(data);
    }
    });
  }

  function alllession_plan(value)
  {
   var clsss = document.getElementById('class_name').value;
   var section = document.getElementById('section_tab').value;
    $.ajax({
  type    : "POST",
  url     : "<?php echo base_url();?>index.php/teacher_controller/all_plan/"+value+"/"+section+"/"+clsss+"/",  
  data: {'subject':value,'section_name':section,'class_name':clsss,},
    success   : function(data)
    {
      window.location.reload();
    }
    });
  }
</script>
<!-- lession plan data script end -->
