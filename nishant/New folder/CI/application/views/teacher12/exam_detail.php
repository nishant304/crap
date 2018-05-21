
<div id="page-wrapper">
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

<?php foreach ($exp['exam'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid">

<div class="col-lg-12 std_main" >
	<?php echo form_open('teacher_controller/exam_add'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Exam Detail</h3>
         	<center><div id="loading"></div></center>
         </div>

      <div class="col-lg-12">

		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <select class="form-control" name="class_id" onchange="select_class_val(this.value);" >
                  	<option>select</option>
                  	 <?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
                  </select>
               </div>
		     </div>
		</div>

<div class="form-group col-lg-6">
		<div class="col-lg-12">
		   <label class="col-lg-4 control-label">Section</label>
               <div class="input-group col-lg-8">
               <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
               <select class="form-control" name="class_section" >
               <option>select</option>
               <?php foreach ($class_data['section'] as $key) { ?>
               <option><?php echo $key['class_section']; } ?></option>
               </select>
           </div>
		</div>
</div>
</div>
<div class="col-lg-12">
<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Subject</label>
               <div class="input-group col-lg-8"  >
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
 
                  <select class="form-control" name="subject" id="clss_sub1">
                  	<option>select</option>
                  </select>
               </div>
		     </div>
		</div>


		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Exam Type</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                 <select class="form-control" name="exam_type">
                 	<option>Select</option>
                 	<option>Monthly</option>
                    <option>Quartly</option>
                 	<option>Half Yearly</option>
                 	<option>Annualy</option>
                 </select>
               </div>
		     </div>
		</div>
	 </div>
<div class="col-lg-12">
<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		     <label class="col-lg-4 control-label">Exam Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="date" id="dateField" class="form-control" name="exam_date" placeholder="Exam Date">
             </div>
		     </div>
		     </div>

		


		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Max Marks</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="max_mark" placeholder="Max Marks">
               </div>
		     </div>
		</div>
        </div>


         <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Exam Start Timing</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="time" class="form-control" name="exam_start_time" placeholder="Exam Start Timing">
               </div>
		     </div>	
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Exam End Timing</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="time" class="form-control" name="exam_end_time" placeholder="Exam End Timing">
               </div>
		     </div>
		</div>
		</div>


		<div class="col-lg-offset-6"><input class="btn btn-warning" type="submit" name="submit" value="submit"></div>
<?php echo form_close(); ?>
</div>
  <?php }} ?>
<script type="text/javascript">
	function select_class_val(value)
	{
 $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/value_subject/"+value,  
    data    : {'value':value
  },
  success : function(data){
  	$("#clss_sub1").html(data);

    }
  });
	}
</script>
<div class="col-lg-12 show_lev table-responsive">
<table class="table table-bordered table-hover">
<thead>
	<tr class="info">
		<th>Edit</th>
		<th>#</th>
		<th>CLass</th>
		<th>Class Section</th>
		<th>Subject</th>
		<th>Exam Type</th>
		<th>Exam Date</th>
		<th>Exam Start Timing</th>
		<th>Exam End Timing</th>
		<th>Marks</th>
		<th>Manage</th>
	
	</tr>
</thead>

<tbody>
	
		<?php 
		$i=1;
		foreach ($exam_data as $key) { ?>
		<tr>
		<td><input type="hidden" id="ids<?php echo $key['exam_id'];  ?>" value="<?php echo $key['exam_id'];  ?>">
		<input type="checkbox" class="btno" id="toggle_button<?php echo $key['exam_id'];?>"></td>
		<?php $exam_id = $key['exam_id'];  ?>
		<td><?php echo $i; ?></td>

		<td>
		<input type="hidden" id="hid7" value="class_id">
		<input disabled="disabled" style="width: 90px;" id="myInputId7<?php echo $exam_id;?>"  name="class_id" onblur = "exam_detail7<?php echo $exam_id;?>(this.value);" value="<?php echo $key['class_id']; ?>"></td>

		

		<td><input type="hidden" id="hid1" value="class_section">
		<input disabled="disabled" style="width: 120px;" id="myInputId1<?php echo $exam_id;?>"  name="exam_title" onblur = "exam_detail1<?php echo $exam_id;?>(this.value);" value="<?php echo $key['class_section']; ?>"></td>

		

		<td>
        <input type="hidden" id="hid2" value="subject">
		<input disabled="disabled" style="width: 90px;" id="myInputId2<?php echo $exam_id;?>"  name="subject" onblur = "exam_detail2<?php echo $exam_id;?>(this.value);" value="<?php echo $key['subject']; ?>"></td>

		

		<td><input type="hidden" id="hid3" value="exam_type">
		<input disabled="disabled" style="width: 90px;" id="myInputId3<?php echo $exam_id;?>"  name="exam_type" onblur = "exam_detail3<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_type']; ?>"></td>



		<td>
        <input type="hidden" id="hid4" value="exam_date">
		<input disabled="disabled" style="width: 90px;" id="myInputId4<?php echo $exam_id;?>"  name="exam_date" onblur = "exam_detail4<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_date']; ?>"></td>

	

		<td>
        <input type="hidden" id="hid5" value="exam_start_time">
		<input disabled="disabled" style="width: 90px;" id="myInputId5<?php echo $exam_id;?>"  name="exam_start_time" onblur = "exam_detail5<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_start_time']; ?>"></td>

		

		<td>
        <input type="hidden" id="hid6" value="exam_end_time">
		<input disabled="disabled" style="width: 90px;" id="myInputId6<?php echo $exam_id;?>"  name="exam_end_time" onblur = "exam_detail6<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_end_time']; ?>"></td>

		

		
	

		<td><input type="hidden" id="hid8" value="max_mark">
		<input disabled="disabled" style="width: 90px;" id="myInputId8<?php echo $exam_id;?>"  name="max_mark" onblur = "exam_detail8<?php echo $exam_id;?>(this.value);" value="<?php echo $key['max_mark']; ?>"></td>

		<td><a href="<?php echo base_url(); ?>index.php/teacher_controller/exam_delete/<?php echo $exam_id; ?>">Delete</a></td>
	</tr>

	 <script type="text/javascript">
	  		var toggle_disabled = function( e ) {
	  		for(var i=1;i<=8;i++){
	    	var input = document.getElementById('myInputId'+i+'<?php echo  $key['exam_id'];?>');
	    	input.disabled = !(input.disabled);
			}
	    	if($(this).val() == 'EDIT') {
	        $("#toggle_button<?php echo $key['exam_id'];?>").attr("value", "UPDATE");
	    	}
	    	 else {
	        $("#toggle_button<?php echo $key['exam_id'];?>").attr("value", "EDIT");     
	    	} 
			};

			var button = document.getElementById('toggle_button<?php echo  $key['exam_id'];?>');
			button.addEventListener( 'click', toggle_disabled);
			</script>
	<?php $i++;?>
<script type="text/javascript">
<?Php for($i=1;$i<=8;$i++){ ?>
  function exam_detail<?Php echo $i;?><?php echo $exam_id;?>(value){
  var ids=document.getElementById('ids<?php echo $key['exam_id'];?>').value;
 var hid=document.getElementById("hid<?php echo $i;?>").value;
  $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/update_exam_detail/"+value+"/"+hid+"/"+ids+"/",  
    data    : {'value':value,'hid':hid,'ids':ids
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
 <?php }  ?>
 </script>
<?Php }  ?>
</tbody>	
</table>
</div>	
</div>
</div>
<script type="text/javascript">
	   var input = document.getElementById("dateField");
      var today = new Date();
      var day = today.getDate();
      // Set month to string to add leading 0
      var mon = new String(today.getMonth()+1); //January is 0!
      var yr = today.getFullYear();
      
        if(mon.length < 2) { mon = "0" + mon; }
      
        var date = new String( yr + '-' + mon + '-' + day );
      
      input.disabled = false; 
      input.setAttribute('min', date);
</script>



