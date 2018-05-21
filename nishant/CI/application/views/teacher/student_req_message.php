
 <div class="container" id="page-wrapper">

  <h2 class="roval_top">Leave Approvals</h2>
  <table class="table table-striped table-responsive">
    
   <div id="menu1" class="tab-pane fade roval_box">
      <table class="table table-striped table-responsive">
    <thead>
      <tr class="active roval_head">

       <th>S No.</th>
        <th>Stf ID</th>
        <th>leave category</th>
        <th>designation</th>
        <th>From date</th>
        <th>To date</th>
        <th>Message</th>
        <!-- <th>Remaining Leaves</th> -->
        <th colspan="2">Status</th>
 </tr>
    </thead>
    <tbody>
      <?php
    $i=1;
    foreach ($request as $key ) {?>
   
     <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $key['std_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['designation'];?></td>
        <td><?php echo $key['from_date'];?></td>
        <td><?php echo $key['to_date'];?></td>
        <td><?php echo $key['message'];?></td>
      
        
     <input type="text" name="student_leave_id" value="<?php echo $key['student_leave_id'];?>">
       
        
        
      </tr>
     <?php $i++;}?>
    </tbody>
  </table>
</div>
  
  </div>
</div>
   
  

</body>
</html>

<style type="text/css">
	.roval_top{
		text-align: center;
		color: gray;
		font-family: -webkit-body;
	}
    
    .roval_head{
    	height: 52px;
    }
 .roval_box{
 	margin-top: 20px;
 	border: 1px solid rgba(128, 128, 128, 0.36);
 }

 .revoal_tab{
 	color: gray;
    font-family: -webkit-body;
 }

 .eyeee{
 	font-size: 20px;
 }

</style>