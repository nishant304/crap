
<body>

<div id="page-wrapper">
<div class="container-fluid">

<div class="col-lg-5 col-lg-offset-3 std_main" >
	<?php echo form_open();   ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Add Subject</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Subject Name</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="sub_name" placeholder="Subject Name"/>
				</div>
			</div>
		</div>


		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Class Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="class_id" placeholder="Class Name">
               </div>
		     </div>
		</div>

	<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Class Section</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="text" class="form-control" name="class_section" placeholder="Class Section">
               </div>
		     </div>
		</div>

	<?php  echo form_close();?>
</div>
	
</div>
</div>


</body>
</html>