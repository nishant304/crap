
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

<?php foreach ($exp['class_incharge'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid">

<div class="col-lg-5 col-lg-offset-3 std_main" >
	<form>
         <div class="col-lg-12">
         	<h3 class="std_log">leave detail</h3>
         </div>
		<div class="form-group">

			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Student Id</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
					<input type="" class="form-control" name="" placeholder="Student Id"/>
				</div>
			</div>
		</div>


		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Staff Id</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="" placeholder="Staff Id">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Leave Message</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="" placeholder="Leave Message">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Approve Status</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="" placeholder="Approve Status">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">From Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="" placeholder="From Date">
               </div>
		     </div>
		</div>

		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">To Date</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="" placeholder="To Date">
               </div>
		     </div>
		</div>


		<div class="form-group">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Leave Type</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="" placeholder="Leave Type">
               </div>
		     </div>
		</div>

		
	</form>
</div>
</div>	
</div>

  <?php }} ?>

