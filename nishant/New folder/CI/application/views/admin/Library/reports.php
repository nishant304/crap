
   
<div id="page-wrapper">
  <!-- <h2 class="lib_rep_tp">Reports</h2> -->
  <div class="panel panel-default lib_rep_pnlss">
    <div class="panel-heading lib_rep_rprts">Reports</div>
    <div class="panel-body">
    	<div class="col-lg-12 lib_rep_clmnss">
    		<div class="col-lg-3">
    			<label>Reports for<span class="lib_rep_pstrs">*</span></label>
    			<select class="form-control lib_rep_pnlss">
    				<option value="-1"> Select...</option>
    				<option value="2"> Available Book</option>
    				<option value="3"> Issued Book</option>
    				<option value="4"> Recovery Books</option>
    				<option value="5"> Conditions Wise</option>
    				<option value="6"> Student Wise</option>
    				<option value="7"> Employee Wise</option>
    			</select>
    		</div>
    		<div class="col-lg-3">
    			<label>Report Type<span class="lib_rep_pstrs">*</span></label>
    			<select class="form-control lib_rep_pnlss">
    				<option value="-1">Select...</option>
    				<option value="2">Date Wise</option>
    				<option value="3">Batch Wise</option>
    			</select>
    		</div>
    		<div class="col-lg-3">
    			<label> Course<span class="lib_rep_pstrs">*</span></label>
    			<select class="form-control lib_rep_pnlss">
    				<option value="-1">Select....</option>
    				<option value="2">STD I</option>
    				<option value="3">STD II</option>
    				<option value="4">STD III</option>
    			</select>
    		</div>
    		<div class="col-lg-3">
    			<label>Batch<span class="lib_rep_pstrs">*</span></label>
    			<select class="form-control lib_rep_pnlss">
    				<option value="-1">Select...</option>
    				<option value="2">November</option>
    				<option value="3">December</option>
    			</select>
    		</div>
    	</div>
     
     <!-- hdkfr -->
       
       <div class="col-lg-12 lib_rep_clmnss">
       	<div class="col-lg-3">
       		<label>Start Date<span class="lib_rep_pstrs">*</span></label>
       		<input type="date" name="" class="form-control lib_rep_pnlss ">
       	</div>
       	<div class="col-lg-3">
       		<label>End Date<span class="lib_rep_pstrs">*</span></label>
       		<input type="date" name="" class="form-control lib_rep_pnlss">
       	</div>
       	<div class="col-lg-3">
       	  <label>Conditions<span class="lib_rep_pstrs">*</span></label>
       		 <select class="form-control lib_rep_pnlss">
       			<option value="-1"> Select...</option>
       			<option value="2"> As New</option>
       			<option value="3"> Fine </option>
       			<option value="4"> Good</option>
       			<option value="5"> Very good</option>
       			<option value="6"> Poor</option>
       			<option value="7"> Fair</option>
       			<option value="8"> Missing</option>
       			<option value="9"> Lost</option>
       		</select>
       	</div>
       	 <div class="col-lg-2">
       	 	<button type="button" class="btn btn-danger lib_rep_prin_btn" onclick="myFunction()">Print Reports</button>
       	 </div>
       	 <div class="col-lg-1">
       	 	<button type="button" class="btn btn-primary lib_rep_prin_btn">Go</button>
       	 </div>
       </div>
 
    </div>
  </div>

   <!-- nxt pnl strt here -->
   
  <div class="panel panel-default lib_rep_pnlss">
    <div class="panel-body">
    	<div class="table-responsive col-lg-12">
    		<table class="table table-bordered table-hover">
    			<thead>
    				<tr>
    					<th> S No.</th>
    					<th> ISBN No.</th>
    					<th> Book No.</th>
    					<th> Tiltle</th>
    					<th> Author</th>
    					<th> Edition</th>
    					<th> Category</th>
    					<th> Language</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td> 1</td>
    					<td> 23425wq</td>
    					<td> 324tr</td>
    					<td> hdhbksj</td>
    					<td> 324tr</td>
    					<td> hdhbksj</td>
    					<td> 324tr</td>
    					<td> hdhbksj</td>
    				</tr>
    			</tbody>
    		</table>
    	</div>

    </div>
  </div>
   <!-- end pnl here -->
</div>


<style type="text/css">
  
   .lib_rep_tp{
   	text-align: center;
   	color: gray;
   	font-family: -webkit-body;
   }
   .lib_rep_pnlss{
   	color: gray;
   	font-family: -webkit-body;
   	border-radius: 0px !important;
   }

   .lib_rep_rprts{
   	text-align: center;
   	color: gray !important;
   	font-family: -webkit-body;
   	font-size: 18px;
   }

   .lib_rep_clmnss{
   	margin-top: 18px;
   }

   .lib_rep_prin_btn{
   	margin-top: 26px;
   	border-radius: 0px !important;
   }
   .lib_rep_pstrs{
   	color: red;
   }

</style>
















<script>
function myFunction() {
    window.print();
}
</script>
