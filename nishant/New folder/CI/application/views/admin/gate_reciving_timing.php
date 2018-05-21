   
<div id="page-wrapper">
  <h2 class="gte_entrr_albmns">Gate Entry</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" class="gte_entrr_entrryys">Entry</a></li>
    <li><a data-toggle="tab" href="#menu1" class="gte_entrr_entrryys">Outing</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
  <div class="panel panel-default gate_entry_pnlss">
    <div class="panel-heading gate_entry_timming">Entry Timming</div>
    <div class="panel-body gate_entry_bodyss">
      <?php echo form_open('admission/Gate_entry_timming'); ?>
      <div class="col-lg-12 ">
        <div class="col-lg-3 gate_entry_time">
          <label>Token<span class="gate_entry_clrss">*</span></label>
          <!-- <input type="text" name="Token" > -->
      
          <select  name="Token" class="form-control gate_entry_inputss">
            <option>select</option>
             <?php 
               foreach ($visitor_status as $key => $value) {
                  $nb[] =  $value['Token'];
                   }
              for ($i=1; $i <=50 ; $i++) { 
                  $s[] = $i;
                }
                $cl = array_diff( $nb,$s);
                $cl2 = array_diff( $s,$nb);
                $final = array_merge($cl , $cl2);
                if (empty($final)) {
                    foreach ($s as $key2 => $value2) {
                    echo "<option>$value2</option>";
                  }
                }else{
                  foreach ($final as $key1 => $value1) {
                    echo "<option>$value1</option>";
                  }
                }
              ?>
          </select>
        </div>
        <div class="col-lg-3 gate_entry_time">
          <label>Visitor Name<span class="gate_entry_clrss">*</span></label>
          <input type="text" name="visitor_name" class="form-control gate_entry_inputss">
        </div>
          
            <div class="col-lg-3 gate_entry_time">
          <label>Category<span class="gate_entry_clrss">*</span></label>
          <select class="form-control gate_entry_inputss" id="select_vlu" name="Category" onchange="getcalss(this.value)">
            <option value="-1">select...</option>
            <option value="2">Student</option>
            <option value="3">Staff</option>
          </select>
        </div>
                  <div ></div>
            <div class="col-lg-3 gate_entry_time value_show" >
          <label>Class<span class="gate_entry_clrss">*</span></label>
          <select id="Student_id" class="bb form-control gate_entry_inputss" name="Class" onchange="getclassgate(this.value)">
            <option value="1">Select...</option>
           
          </select>
        </div>
         <div class="col-lg-3 gate_entry_time value_show_dep" >
          <label>department<span class="gate_entry_clrss">*</span></label>
          <select id="department_staff" class="department_staff form-control gate_entry_inputss" name="department" onchange="getclassgate(this.value)">
            <option value="2">Select...</option>
           
          </select>
        </div>

      
        
  
            
              <div class="col-lg-3 gate_entry_time">
          <label>To Meet<span class="gate_entry_clrss">*</span></label>
          <select class="bbb form-control" name="To_Meet">
            <option>select..</option>
          </select>
          <!-- <input type="text" name="To_Meet" class="form-control gate_entry_inputss"> -->
        </div>        
  
        <div class="col-lg-3 gate_entry_time">
          <label>Reason<span class="gate_entry_clrss">*</span></label>
          <input type="text" name="Reason" class="form-control gate_entry_inputss">
        </div>
        <!-- <div class="col-lg-3 gate_entry_time">
          <label>Entry Timming<span class="gate_entry_clrss">*</span></label>
          <input type="time" name="Entry_Timming" class="form-control gate_entry_inputss">
        </div> -->
        <div class="col-lg-3 gate_entry_time">
          <label>Gatekeeper Name<span class="gate_entry_clrss">*</span></label>
          <input type="text" name="Gatekeeper_Name" class="form-control gate_entry_inputss">
        </div>
        
    
      <div class="col-lg-12 gate_entry_time">
        <center>
        <button type="Submit" class="btn btn-danger gate_entry_inputss">Submit</button>
          </center>
      </div>
          </div>
          <?php echo form_close(); ?>
      
    </div>
  </div>

      <!-- table list strt frm here -->
 
        <div id="results"></div>
  <div class="panel panel-default tbls_gates_pnlss">
    <div class="panel-heading tbls_gates_entrryy ">Table For Gate Entry</div>
      <div class="panel-body">
      <div class="col-lg-12 table-responsive">

        <table class="table table-bordered tblss_bordr_clssess">
          <thead>
          <tr>
            <th> Token</th>
            <th> Visitor Name</th>
            <th> Category</th>
            <th> Class/Department</th>
            <th> To Meet</th>
            <th> Reason</th>
            <th> Gatekeeper Name</th>
            <th> Entry Timimg</th>
            <th> Manage</th>
          </tr>
               </thead>
               <tbody>

                 <?php foreach ($visitor_status as $key => $value) {

                   echo form_open('admission/gatetimming_update');
                  $Visitor_id = base64_encode($value['id']);


                 ?>
                <tr>
                  <input type="hidden" name="Visitor" value="<?php echo $Visitor_id; ?>">
                  <td><?php echo $value['Token']; ?></td>
                  <td><?php echo $value['VisitorName']; ?></td>
                  <td><?php if($value['Category'] == 2){
                        echo "Student";
                  }else{ echo "Staff";  } ?></td>
                  <td><?php  if($value['Category'] == 2){
                        echo $value['Class']; 
                  }else{ echo $value['department'];  }  ?></td>
                  <td><?php echo $value['To_Meet']; ?></td>
                  <td><?php echo $value['Reason']; ?></td>
                  <td><?php echo $value['GatekeeperName']; ?></td>
                  <td><?php echo $value['EntryTimming']; ?></td>
               		<td><button class="btn btn-info" name="<?php echo $Visitor_id; ?>" type="Submit">Update</button></td>
               	</tr>
                <?php  echo form_close(); } ?>
               </tbody>
    		</table>
    	</div>
      </div>
    </div>

   <!-- table list end frm here -->
  


</div>
    <div id="menu1" class="tab-pane fade">
       <div class="panel panel-default gate_entry_pnlss">
    <div class="panel-heading gate_entry_timming"> Outing Timming</div>
    
      </div>
      
          <!-- table list strt frm here -->
       <div class="panel panel-default tbls_gates_pnlss">
    <div class="panel-heading tbls_gates_entrryy">Table For Gate Exit</div>
      <div class="panel-body">
    	<div class="col-lg-12 table-responsive">
    		<table class="table table-bordered tblss_bordr_clssess">
    			<thead>
    			<tr>
    				<th> Token</th>
            <th> Visitor Name</th>
            <th> Category</th>
            <th> Class/Department</th>
            <th> To Meet</th>
            <th> Reason</th>
            <th> Gatekeeper Name</th>
            <th> Entry Timimg</th>
            <th> outing time</th>
    			</tr>
               </thead>
               <tbody>

                <?php foreach ($visitor_out_status as $key => $value) {
                
                 ?>
               	  <tr>
                  <td><?php echo $value['Token']; ?></td>
                  <td><?php echo $value['VisitorName']; ?></td>
                  <td><?php if($value['Category'] == 2){
                        echo "Student";
                  }else{ echo "Staff";  } ?></td>
                  <td><?php  if($value['Category'] == 2){
                        echo $value['Class']; 
                  }else{ echo $value['department'];  }  ?></td>
                  <td><?php echo $value['To_Meet']; ?></td>
                  <td><?php echo $value['Reason']; ?></td>
                  <td><?php echo $value['GatekeeperName']; ?></td>
                  <td><?php echo $value['EntryTimming']; ?></td>
                 <td><?php echo $value['outtime']; ?></td>
                </tr>
               <?php } ?>
               </tbody>
    		</table>
    	</div>
      </div>
    </div>
   <!-- table list end frm here -->

    </div>
  </div>
</div>

  





 <style type="text/css">
       
       .tblss_bordr_clssess{
       	color: gray;
       	font-family: -webkit-body;
       }

      .tbls_gates_pnlss{
      	border-radius: 0px;
      }

      .tbls_gates_entrryy{
      	color: gray !important;
      	font-family: -webkit-body;
      	text-align: center;
      	font-size: 20px;
      }
    
    .gte_entrr_entrryys{
    	border-radius: 0px !important;
    	color: gray;
    	font-family: -webkit-body;
    	font-size: 14px !important;
    }
   
    .gte_entrr_albmns{
    	text-align: center;
    	color: gray;
    	font-family: -webkit-body;
    }

   .gate_entry_clrss{
   	color: red;
   }
 	.gate_entry_time{
 		margin-top: 20px;
 	}
 	.gate_entry_pnlss{
 		color: gray;
 		font-family: -webkit-body;
 		border-radius: 0px;
 	}
 	.gate_entry_hdrs{
 		color: gray;
 		font-family: -webkit-body;
 		text-align: center;
 	}
 	  
 	  .gate_entry_timming{
 	  	border-radius: 0px;
 	  	color: gray !important;
 	  	font-family: -webkit-body;
 	  	text-align: center;
 	  	font-size: 20px;

 	  }
 	  .gate_entry_inputss{
 	  	border-radius: 0px;
 	  }
 	  .value_show{
 	  	display: none;
 	  }

 </style>