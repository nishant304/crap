<div id="page-wrapper">
<div class="container-fluid margin_hund">
<div class="col-lg-12 std_main" >
	<?php echo form_open_multipart(''); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Student Marks</h3>
         </div>
   
    <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12 pading_o">
			<label class="col-lg-4 control-label">Exam Id</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="text"  class="form-control" name="exam_id" placeholder="Exam Id"/>
				</div>
			</div>
		</div>


		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Exam Type</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control"  name="exam_category" placeholder="Exam Type">
               </div>
		     </div>
		</div>
			</div>


      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Student Id</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="std_id" placeholder="Student Id">
               </div>
		     </div>
		</div>
	


		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Checked By</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text"  class="form-control" name="stf_id" placeholder="Checked By">
               </div>
		     </div>
		</div>
		  </div>

      
      <div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Marks Obtained</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text"  class="form-control" name="marks_obtain" placeholder="Marks Obtained">
               </div>
		     </div>
		</div>

		<div class="form-group col-lg-6">
		     <div class="col-lg-12 pading_o">
		   <label class="col-lg-4 control-label">Batch</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="batch" placeholder="Batch">
                 
               </div>
		     </div>
		</div>
		</div>



		<div class="col-lg-offset-6">
			<input type="submit" name="submit" class="btn btn-success" value="submit">
		</div>
	<?php echo form_close(); ?>
</div>
</div>  
</div>