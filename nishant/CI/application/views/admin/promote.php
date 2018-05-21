
<div class="ser_contc" id="page-wrapper">

<div class="container-fluid">
 

  <ul class="nav nav-tabs tab_show_stdnt">
    <li class="active"><a data-toggle="tab" class="ser_tech combi_inee_dlts cv" href="#home">Promote Student</a></li>
    <li><a data-toggle="tab" class="ser_tech combi_inee_dlts1 cv1" href="#menu1">Promoted Student</a></li>
    <li><a data-toggle="tab" class="ser_tech combi_inee_dlts2 cv2" href="#menu2">UnPromote Student</a></li>
    <!-- <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
         <?php  echo form_open('admission/promoted_verify'); ?>
      <div class="container-fluid padding-o">
        <div class="panel panel-default">
          <!-- <div class="panel-heading empll_pnl_hed">Promote Student</div> -->
          <div class="panel-body">
            
               <div class="col-lg-3 padng_lft">
                <label  class="empll_labell">Class&nbsp;<span class="empll_spn">*</span></label> 
                <select name="std_old_class" class="form-control empll_input " id="std_cksss" onchange="stu_class(this.value);">
                 <option value="">select class</option>
                 <?php foreach ($class_data['class'] as $key) {  ?>
                 <option value="<?php  echo $key['class_name'];   ?>"><?php  echo $key['class_name'];  ?></option>
                 <?php  }   ?>
                 </select>
               
              </div>
              <div class="col-lg-3 padng_lft">
                <label  class="empll_labell">Section&nbsp;<span class="empll_spn">*</span></label> 
                <select name="std_section" class="form-control empll_input " onchange="student_fetch_based_class(this.value);"  id="tabbb_section">
                 
                 </select>
               
              </div>

              <div class="col-lg-3 padng_lft">
                <label  class="empll_labell">Next Session&nbsp;<span class="empll_spn">*</span></label> 
                <select name="promote_batch" class="form-control empll_input ">
                  <option value="" >Select</option>
                  <option value="<?php echo date('Y')+1;   ?>-<?php echo date('Y')+2; ?>"><?php echo date('Y')+1;   ?>-<?php echo date('Y')+2;  ?></option>
             
                 </select>
               
              </div>
                  <div class="col-lg-3 padng_lft">
                <label  class="empll_labell">Promote Class&nbsp;<span class="empll_spn">*</span></label> 
                <select name="promote_class" class="form-control empll_input ">
                  <option value="">select class</option>
                 <?php foreach ($class_data['class'] as $key) {  ?>
                 <option value="<?php  echo $key['class_name'];   ?>"><?php  echo $key['class_name'];  ?></option>
                 <?php  }   ?>
                 </select>
               
              </div>
               <div class='table table-bordered marg_top ser_tblsa' id="tabbb1_std"></div>

           
              <button class="btn btn-primary pull-right" type="submit" >Submit</button>
          <?php   echo form_close(); ?>
          </div>
          
        </div>
      </div>
    </div>





    <div id="menu1" class="tab-pane fade">
             <div class="container-fluid padding-o">
        <div class="panel panel-default">
          <!-- <div class="panel-heading empll_pnl_hed">Parmoted Student</div> -->
          <div class="panel-body">

               <table class="table table-bordered  ser_tblsa">
                <thead>
                  <tr>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Batch</th>
                  </tr>
                </thead>
                <tbody>
            <?php foreach ($promote as $key) {    ?>
                  <tr>
                    <td><?php echo $key['std_fname'];   ?></td>
                    <td><?php  echo $key['std_class'];  ?></td>
                    <td><?php  echo $key['std_batch'];  ?></td>
                  </tr>
                 <?php  } ?>
                </tbody>
              </table>

          </div>
          
        </div>
      </div>
    </div>


    <div id="menu2" class="tab-pane fade">
           <div class="container-fluid padding-o">
        <div class="panel panel-default">
          <!-- <div class="panel-heading empll_pnl_hed">UnParmote Student</div> -->
          <div class="panel-body">
    <table class="table table-bordered  ser_tblsa">
                <thead>
                  <tr>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Batch</th>
                  </tr>
                </thead>
                <tbody>
            <?php foreach ($unpromote as $key) {    ?>
                  <tr>
                    <td><?php echo $key['std_fname'];   ?></td>
                    <td><?php  echo $key['std_class'];  ?></td>
                    <td><?php  echo $key['std_batch'];  ?></td>
                  </tr>
                 <?php  } ?>
                </tbody>
              </table>

          </div>
          
        </div>
      </div>
    </div>
  
  </div>
</div>
</div>




<script type="text/javascript">
function student_fetch_based_class(value)  
{
var std_cksss=document.getElementById('std_cksss').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/promote_student/"+value+"/"+std_cksss+"/",  
    data    : {'section':value,'classs':std_cksss},
    success : function(data){
    $("#tabbb1_std").html(data);
        if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
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

<script type="text/javascript">
      $('.combi_inee_dlts1').click(function() {
      $('.cv1').removeClass("combi_inee_dlts1");
      $('.cv1').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
        $('.cv2').removeClass("combi_inee_dlts");
});
    $('.combi_inee_dlts').click(function() {
     $('.cv1').removeClass("combi_inee_dlts");
      $('.cv1').addClass("combi_inee_dlts1");
      $('.cv').removeClass("combi_inee_dlts1");
       $('.cv').addClass("combi_inee_dlts");
       $('.cv2').removeClass("combi_inee_dlts");
});

  $('.combi_inee_dlts2').click(function() {
      $('.cv2').removeClass("combi_inee_dlts1");
      $('.cv2').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
       $('.cv1').removeClass("combi_inee_dlts");
        $('.cv1').addClass("combi_inee_dlts1");
});
</script>
