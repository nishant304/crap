

<div id="page-wrapper">
<?php
 		 $stf_id = $this->session->userdata('stfdata');
    	
    	 $data_stf = $this->session->userdata('data_auth');


   foreach ($data_stf as $key => $value)
   {
    	foreach ($value as $key1 => $value1)
   {
   
    	$exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    
   }
   foreach ($incharge_data['incharge'] as $key => $value)
 {
     $incharge_id = $value['class_incharge'];
     $class_data1 = $value['class_name'];
     $section_data1 = $value['class_section'];

 }



?>
<?php
// start set variables for authority
 foreach ($exp['notes'] as $key => $value2) {
 	if ($value2 == 1){
 		$auth_one = 1;
 	}elseif($value2 == 2){
 		$auth_two = 2;

 	}
}
// end set variables for authority


// start condition for 2

if($auth_two == 2)
{
?>

		<div class="col-lg-12 std_main">
		<div class="container-fluid margi_top">
		<?php echo form_open_multipart('teacher_controller/do_upload/'); ?>

         <div class="col-lg-12">
         	<h3 class="std_log">Notes</h3>
         </div>
   
    <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12 pading_o">
			<label class="col-lg-4 control-label">Notes title</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="text" value="<?php echo $notes_title1; ?>" class="form-control" name="notes_title" placeholder="Notes title"/>
				</div>
			</div>
		</div>


		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes Description</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" value="<?php echo $notes_desc1; ?>" name="notes_desc" placeholder="Notes Description">
               </div>
		     </div>
		</div>
			</div>


      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes Course</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="notes_course" value="<?php echo $notes_course1; ?>" placeholder="Notes Course">
               </div>
		     </div>
		</div>

			<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes Subject</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" value="<?php echo $notes_subject1; ?>" class="form-control" name="notes_subject" placeholder="Notes Subject">
               </div>
		     </div>
		</div>
		  </div>

      
      <div class="col-lg-12">
	

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes For Class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <select name="notes_for_class" class="form-control" onchange="stu_class(this.value);">
                  	<option>Select</option>
                  	<?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
                  </select>
               </div>
		     </div>
		</div>
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes For Section</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <select name="notes_for_section" class="form-control" id="tabbb_section">
                  	<option>Select</option>
                  </select>
               </div>
		     </div>
		</div>
		</div>
		  <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Submitted By</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" value="<?php echo $submitted_by1; ?>" class="form-control" name="submitted_by" placeholder="Submitted By">
               </div>
		     </div>
		</div>
	<div class="form-group col-lg-6">
		<div class="col-lg-12 pading_o">
		   	<label class="col-lg-4 control-label">Notes File</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="form-control" name="notes_file" placeholder="Notes File">
         		</div>
		</div>
	</div>
	</div>


		<div class="col-lg-offset-6">
			<input class="btn btn-warning" type="submit" name="submit" value="submit">
		</div>
	<?php echo form_close(); ?>
	</div>
	</div>
<!-- end authority 2 -->

<!-- start condition for 1 and incharge OR Null Authority and incharge -->
<?php } elseif ($auth_one == 1 && $incharge_id !='' || $value2 == '' && $incharge_id !='') {
?>
		<div class="col-lg-12 std_main">
		<div class="container-fluid margi_top">
	<?php echo form_open_multipart('teacher_controller/do_upload/'); ?>

         <div class="col-lg-12">
         	<h3 class="std_log">Notes</h3>
         </div>
   
    <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12 pading_o">
			<label class="col-lg-4 control-label">Notes title</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="text" value="<?php echo $notes_title1; ?>" class="form-control" name="notes_title" placeholder="Notes title"/>
				</div>
			</div>
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes Description</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" value="<?php echo $notes_desc1; ?>" name="notes_desc" placeholder="Notes Description">
               </div>
		     </div>
		</div>
			</div>


      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes Course</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="notes_course" value="<?php echo $notes_course1; ?>" placeholder="Notes Course">
               </div>
		     </div>
		</div>

			<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes Subject</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" value="<?php echo $notes_subject1; ?>" class="form-control" name="notes_subject" placeholder="Notes Subject">
               </div>
		     </div>
		</div>
		  </div>

      
      <div class="col-lg-12">
	

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes For Class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <select name="notes_for_class" class="form-control">
                  	<option>Select</option>
                    <option  value="<?php echo $class_data1 ; ?>"><?php echo $class_data1 ; ?></option>
                  </select>
               </div>
		     </div>
		</div>
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes For Section</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <select name="notes_for_section" class="form-control" id="tabbb_section">
                  	<option>Select</option>
                  	<option  value="<?php echo $section_data1; ?>"><?php echo $section_data1; ?></option>
                  </select>
               </div>
		     </div>
		</div>
		</div>
		  <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Submitted By</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" value="<?php echo $submitted_by1; ?>" class="form-control" name="submitted_by" placeholder="Submitted By">
               </div>
		     </div>
		</div>
	<div class="form-group col-lg-6">
		<div class="col-lg-12 pading_o">
		   	<label class="col-lg-4 control-label">Notes File</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="form-control" name="notes_file" placeholder="Notes File">
         		</div>
		</div>
	</div>
	</div>


		<div class="col-lg-offset-6">
			<input class="btn btn-warning" type="submit" name="submit" value="submit">
		</div>
	<?php echo form_close(); ?>
	</div>
	</div>
<?php } ?>
<!-- end condition for 1 and incharge OR Null Authority and incharge -->
<!-- start condition for no authority and no incharge -->
<?php
if($auth_one == '' && $incharge_id == '' && $auth_two == '')
{
	echo "Not Authorised";
}
// end condition for no authority and no incharge
elseif($auth_one == 1)
 {?>
<!-- start condition for view only if 1 authority is assigned -->

<div class="main-page main_list" id="myDIV">
				<h3 class="title1">Ebook List</h3>
	<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
			<div class="box_stu_recrdb" id="12th">
    <table class="table table-bordered table-hover"> 
		<thead> 
			<tr>
				<th>Edit</th>
			    <th>#</th>
			    <th>Title</th>
			    <th>Description</th>
			    <th>Course</th>
			    <th>Subject</th>
			    <th>Class</th>
			    <th>Section</th>
			    <th>Submitted By</th>
			    <th>File</th>
			    <th>Manage</th>
			</tr> 
		</thead>

<tbody>
	<tr class="active">
		<?php 
		$i = 1;
			foreach ($ebook_data as $ebook)
		 {
		 	$notes_id = $ebook['notes_id'];
		 	$notes_title = $ebook['notes_title'];
		 	$notes_desc = $ebook['notes_desc'];
		 	$notes_course = $ebook['notes_course'];
		 	$notes_subject = $ebook['notes_subject'];
		 	$notes_for_class = $ebook['notes_for_class'];
		 	$notes_section = $ebook['notes_for_section'];
		 	$submitted_by = $ebook['submitted_by'];
		 	$notes_file = $ebook['notes_file'];
				?>
	    <tr>
	      <td><input type="checkbox" class="btno" id="toggle_button<?php echo $ebook['notes_id'];?>"></td>
	      <th scope="row"><?php echo $i; ?></th>
	      <td><input disabled="disabled" style="width: 90px;" id="myInputId1<?php echo $ebook['notes_id'];?>"  name="notes_title" value="<?php echo $notes_title; ?>"></td> 

	      <td><input disabled="disabled" style="width: 90px;" id="myInputId2<?php echo  $ebook['notes_id'];?>"  name="notes_desc" value="<?php echo $notes_desc; ?>"></td>

	      <td><input disabled="disabled" style="width: 90px;" id="myInputId3<?php echo  $ebook['notes_id'];?>" name="notes_course" value="<?php echo $notes_course; ?>"></td> 

	     

	      <td><input disabled="disabled" style="width: 90px;" id="myInputId5<?php echo  $ebook['notes_id'];?>" name="notes_subject" value="<?php echo $notes_subject; ?>"></td> 

	      <td><input disabled="disabled" style="width: 90px;" id="myInputId6<?php echo  $ebook['notes_id'];?>" name="notes_for_class" value="<?php echo $notes_for_class; ?>"></td>

	       <td><input disabled="disabled" style="width: 90px;" id="myInputId4<?php echo  $ebook['notes_id'];?>" name="notes_for_section" value="<?php echo $notes_section; ?>"></td>

	      <td><input disabled="disabled" style="width: 90px;" id="myInputId7<?php echo  $ebook['notes_id'];?>" name="submitted_by" value="<?php echo $submitted_by; ?>"></td>

	      <td><input disabled="disabled" style="width: 150px;" id="myInputId8<?php echo  $ebook['notes_id'];?>" name="notes_file" value="<?php echo $notes_file; ?>"></td> 

	      <td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url(); ?>index.php/teacher_controller/ebook_delete/<?php echo $notes_id; ?> " >Delete</a></td> 
	    </tr>
	      	

		      <script type="text/javascript">
	  		var toggle_disabled = function( e ) {
	  		for(var i=1;i<=8;i++){
	    	var input = document.getElementById('myInputId'+i+'<?php echo  $ebook['notes_id'];?>');
	    	input.disabled = !(input.disabled);
			}
	    	if($(this).val() == 'EDIT') {
	        $("#toggle_button<?php echo $ebook['notes_id'];?>").attr("value", "UPDATE");
	    	}
	    	 else {
	        $("#toggle_button<?php echo $ebook['notes_id'];?>").attr("value", "EDIT");     
	    	} 
			};

			var button = document.getElementById('toggle_button<?php echo  $ebook['notes_id'];?>');
			button.addEventListener( 'click', toggle_disabled);
			</script>

		<?php $i++; } } else{}?>
</tbody>
</table> 
			        </div>
			    </div>
			
		</div>
</div>

<!-- end condition for view only if 1 authority is assigned -->
