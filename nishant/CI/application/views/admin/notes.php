
<div id="page-wrapper">
<div class="container-fluid margi_top">
<div class="col-lg-12 std_main" >
	<?php echo form_open_multipart('admission/do_upload/'); ?>
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
		   <label class="col-lg-4 control-label">Notes Batch</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" value="<?php echo $notes_batch1; ?>" class="form-control" name="notes_batch" placeholder="Notes Batch">
               </div>
		     </div>
		</div>
		  </div>

      
      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes Subject</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" value="<?php echo $notes_subject1; ?>" class="form-control" name="notes_subject" placeholder="Notes Subject">
               </div>
		     </div>
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Notes For Class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                 <!--  <input type="text" class="form-control" name="notes_for_class" placeholder="Notes For Class"> -->
                  <select name="notes_for_class" class="form-control">
                  	<option>Select</option>
                  	<?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
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
			<input type="submit" name="submit" value="submit">
		</div>
	<?php echo form_close(); ?>
</div>
</div>  
<div class="main-page main_list">
				<h3 class="title1">Ebook List</h3>
	<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
			<div class="box_stu_recrd" id="12th">
				<table class="table table-bordered table-hover"> 
					<thead> 
						<tr>
						 <th>EDIT</th>
						<th>#</th>
						
						 <th>Title</th>
						    <th>Description</th>
						    <th>Course</th>
						    <th>Batch</th>
						    <th>Subject</th>
						    <th>Notes For Class</th>
						    <th>Submitted By</th>
						    <th>File</th>
						    <th>Manage</th>
						</tr> 
					</thead>
	<tbody>
		<tr class="active">
	<?php 
		$i = 1;
		foreach($ebook_data as $ebook)
		 {
			$notes_id = $ebook['notes_id'];
			$notes_title = $ebook['notes_title'];
			$notes_desc = $ebook['notes_desc'];
			$notes_course = $ebook['notes_course'];
			$notes_batch = $ebook['notes_batch'];
			$notes_subject = $ebook['notes_subject'];
			$notes_for_class = $ebook['notes_for_class'];
			$submitted_by = $ebook['submitted_by'];
			$notes_file = $ebook['notes_file'];
	?>
	    <tr>
	    <th><input type="checkbox" class="btno" id="toggle_button<?php echo $ebook['notes_id'];?>" VALUE="EDIT"></th>
	     <th scope="row"><?php echo $i; ?></th>
	      <td>
	      <input disabled="disabled" style="width: 90px;" id="myInputId1<?php echo $ebook['notes_id'];?>" value="<?php echo $notes_title; ?>">
	      </td> 
	      <td>
	      <input disabled="disabled" style="width: 90px;" id="myInputId2<?php echo  $ebook['notes_id'];?>"  value="<?php echo $notes_desc; ?>">
	      </td>
	       <td>
	       <input disabled="disabled" style="width: 90px;" id="myInputId3<?php echo  $ebook['notes_id'];?>" value="<?php echo $notes_course; ?>">
	       </td> 
	       <td>
	       <input disabled="disabled" style="width: 90px;" id="myInputId4<?php echo  $ebook['notes_id'];?>" value="<?php echo $notes_batch; ?>">
	       </td>
	        <td>
	        <input disabled="disabled" style="width: 90px;" id="myInputId5<?php echo  $ebook['notes_id'];?>" value="<?php echo $notes_subject; ?>">
	        </td> 
	        <td>
	        <input disabled="disabled" style="width: 90px;" id="myInputId6<?php echo  $ebook['notes_id'];?>" value="<?php echo $notes_for_class; ?>">
	        </td>
	         <td>
	         <input disabled="disabled" style="width: 90px;" id="myInputId7<?php echo  $ebook['notes_id'];?>" value="<?php echo $submitted_by; ?>">
	         </td>
	        <td>
	        <input disabled="disabled" style="width: 150px;" id="myInputId8<?php echo  $ebook['notes_id'];?>" value="<?php echo $notes_file; ?>">
	        </td> 
	        <td>
	        <a href="<?php echo base_url(); ?>index.php/admission/ebook_delete/<?php echo $notes_id; ?> ">Delete</a>
	        </td> 
	      </tr>

<script type="text/javascript">
    var toggle_disabled = function( e ) {
  	for(var i=1;i<=8;i++){
    var input = document.getElementById('myInputId'+i+'<?php echo  $ebook['notes_id'];?>');
    input.disabled = !(input.disabled);
     }
    // if($(this).val() == 'EDIT') {
    //     $("#toggle_button<?php// echo $ebook['notes_id'];?>").attr("value", "SAVE");
    // } else {
    //    $("#toggle_button<?php// echo $ebook['notes_id'];?>").attr("value", "EDIT");     
    // } 
};

 var button = document.getElementById('toggle_button<?php echo  $ebook['notes_id'];?>');
  button.addEventListener( 'click', toggle_disabled);
</script>


						    <?php $i++; } ?>
						    </tbody>
						</table> 
			        </div>
			    </div>
			
		</div>
</div>

