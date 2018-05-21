
 <div class="container" id="page-wrapper">

  <h2 class="roval_top">Leave Approvals</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Leave Approval</a></li>
    <li><a data-toggle="tab" href="#menu1">List</a></li>
  <!--   <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>

  <div class="tab-content revoal_tab">
    <div id="home" class="tab-pane fade in active roval_box">
              
   <table class="table table-striped table-responsive">
    <thead>
      <tr class="active roval_head">
         <th>S No.</th>
        <th>Stf ID</th>
        <th>leave category</th>
        <th>designation</th>
        <th>Leaves</th>
        <th>Remaining Leaves</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
     foreach ($request as $key) {?>
     <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $key['stf_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['designation'];?></td>
        <td><?php echo $key['leave'];?></td>
        <td>5</td>
        <td><?php echo $key['Approve'];?></td>
      </tr>
     <?php $i++;}?>
    </tbody>
  </table>
</div>

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
      
        <?php echo form_open('teacher_controller/std_leave_approval'); ?>
        <input type="hidden" name="student_leave_id" value="<?php echo $key['student_leave_id'];?>">
        <input type="hidden" name="std_id" value="<?php echo $key['std_id'];?>">
        <td><input type="submit" <?php if($key['approval'] == 1){ ?> value="approved" disabled style="background-color: rgba(0, 128, 0, 0.45);" <?php } else { ?> value="approve" <?php } ?> < name="submit"></input></td>
        <td><input type="submit" <?php if($key['approval'] == 2){ ?> value="rejected" disabled style="background-color: rgba(128, 0, 12, 0.45);"<?php } else { ?> value="reject" <?php } ?> name="submit"></input></td>
        <?php echo form_close(); ?>
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