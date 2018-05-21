<?php 
$user_listedd=explode(',',$role_autho[0]['lesson_plan']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>


<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
 <?php echo form_open('admission/lession_plan_add'); ?>
 <?php  }  ?>
<div id="page-wrapper">
<div class="container-fluid margi_top">
<div class="col-lg-12 std_main">
     <h2 class="agn_notes_hed1">Lesson Planning</h2>
  	   <div class="col-lg-12 ">
  	      <div class="col-lg-6 agn_notes_clms ">
  			<form>
             <div class="panel panel-default ">
               <!-- <div class="panel-heading  agn_lvss_cat1">Lesson Planning</div> -->
                  <div class="panel-body padig_tp ">
    	   
              <div class="col-lg-12 agn_nts_rwss1">
              	<label class="">Class&nbsp;<span class=" agmn_strs_adds1">*</span></label>
                 <select name="class_id" class="form-control Lesson_input"  onchange="stu_class(this.value);" id="class_tab">

                  <option>Select...</option>
                  <?php foreach ($all_class as $key => $value) { 
                    $class_data[] = $value['class_name'];
                    }
                    $clss = array_unique($class_data);
                    foreach ($clss as $key => $value1) { ?>
                  <option><?php echo $value1; ?></option>
                  <?php } ?>
                 </select>  
              </div>

              <div class="col-lg-12 agn_nts_rwss1 ">
                <label class="">Section&nbsp;<span class=" agmn_strs_adds1">*</span></label>
               <select name="section_id" class="form-control Lesson_input" id="tabbb_section" onchange="all_subject(this.value);">
                  <option >Select</option>
                 </select> 
              </div>

               <div class="col-lg-12 agn_nts_rwss1 ">
                <label class="">Subject&nbsp;<span class=" agmn_strs_adds1">*</span></label>
                 <select name="sub_id" class="form-control Lesson_input" id="sub_section">
                  <option>Select</option>
                 </select> 
              </div>

              <div class="col-lg-12 agn_nts_rwss1 ">
        	  	<label>Description<span class="agmn_strs_adds1">*</span></label>
        	  	<textarea class="form-control agn_inp_form1 " value="" name="description" placeholder="enter Description"></textarea>
        	  </div>
            <div class="col-lg-12 agn_nts_rwss1 ">
                <label class="">To&nbsp;<span class=" agmn_strs_adds1">*</span></label>
                <input type="date" value="" name="to_date" class="form-control agn_inp_form1 ">  
              </div>
              <div class="col-lg-12 agn_nts_rwss1 ">
                <label class="">From&nbsp;<span class=" agmn_strs_adds1">*</span></label>
                <input type="date"  value="" name="from_date" class="form-control agn_inp_form1 ">  
              </div>

           <!--     <div class="col-lg-12 agn_nts_rwss1  ">
              	<label class="del_label">Subject&nbsp;<span class="agmn_strs_adds1">*</span></label> 
              	<select class="form-control agn_inp_form1" name="notes_subject" id="tabbb1">
                <option value="-1" selected>Select ....</option>
              
                 </select>
               
              </div> -->

<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
    	<div class="col-lg-12">
  		<input type="submit" value="submit" class="btn btn-primary agn_nts_rwss1"></button>
  	  </div> 
<?php  }   ?>
      </div>
       </div>
  		</div>
<?php echo form_close(); ?>
  <div class=" table-responsive col-lg-6  agan_nxt_nots1 ">          
  <table class="table table-bordered">
  <thead>
      <tr class="active" style="height: 50px;">
        <th>Class</th>
        <th>Section</th>
        <th>Subject</th>
        <th>Description</th>
        <th>To</th>
        <th>From</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $key => $value) {
    ?>
      <tr>
        <td><?php echo $value['class_id']; ?></td>
        <td><?php echo $value['section_id']; ?></td>
        <td><?php echo $value['sub_id']; ?></td>
        <td><?php echo $value['description']; ?></td>
        <td><?php echo $value['to_date']; ?></td>
        <td><?php echo $value['from_date']; ?></td>
        <td><a href="#"><i class="fa fa-pencil " aria-hidden="true"></i></a>
          <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
      <a href="#"><i class="fa fa-times " aria-hidden="true"></i></a>
      <?php  }  ?>
      <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
      <a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
      <?php  }  ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
   <center><p class="pagination_link"><?php echo $links; ?></p></center>
		</div>
  	</div>
  </div>
</div>
</div>
<?Php   }   ?>


<script type="text/javascript">
  function all_subject(value)
  {
 var class_name = document.getElementById('class_tab').value;
    $.ajax({
      type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/subject_lession/"+value+"/"+class_name+"/",  
    data      : {'class_name':class_name,'section':value},
    success   : function(data){
      $("#sub_section").html(data);
    }
    });
  }

</script>