<?php
foreach ($fetch_leave_data as $key) {
   $stf_leave = $key['leave'];
}
?>
 <div class="container" id="page-wrapper">

  <h2 class="roval_top">Leave Approvals</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Pending Approval</a></li>
    <li><a data-toggle="tab" href="#home">Approved List</a></li>
    <li><a data-toggle="tab" href="#menu2">Rejected List</a></li>
<!--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>

  <div class="tab-content revoal_tab">
    <div id="home" class="tab-pane fade roval_box">
              
   <table class ="table table-bordered">
    <thead>
      <tr class="active roval_head">
        
        <th>Stf ID</th>
        <th>leave category</th>
        <th>designation</th>
        <th>Remaining Leaves</th>
        <th>Total Leaves</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php
   $remain_leave = $this->session->flashdata('remain_leave');
    $i=1;
     foreach ($teacher_leave as $key) { if($key['approval']==1) {?>
     <tr>
        <td><?php echo $key['stf_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['designation'];?></td>
        <td><?php echo $remain_leave;?></td>
        <td><?php echo $stf_leave;?></td>
        <td><?php $status = $key['approval'];
         if($status ==1)
            {
              echo "approved";
            }
            ?>
              
            </td>
      </tr>
     <?php }}?>
    </tbody>
  </table>
</div>

<div id="menu1" class="tab-pane fade in active roval_box">
      <table class="table table table-bordered">
    <thead>
      <tr class="active roval_head">
        <th>Stf ID</th>
        <th>leave category</th>
        <th>designation</th>
        <th>From date</th>
        <th>To date</th>
        <th>Message</th>
        <th colspan="2">Status</th>
 </tr>
    </thead>
    <tbody>
    <?php
   foreach($teacher_leave as $key ) { if($key['approval']== 0) {?>
   <tr>
        <td><?php echo $key['stf_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['designation'];?></td>
        <td><?php echo $key['from_date'];?></td>
        <td><?php echo $key['to_date'];?></td>
        <td><?php echo $key['message'];?></td>
       <?php echo form_open('admission/approve_leave'); ?>
        <input type="hidden" name="stf_id_hidden" value="<?php echo $key['stf_id'];?>">
        <input type="hidden" name="teacher_id_hidden" value="<?php echo $key['teacher_leave_id'];?>">
        <td><input type="submit" <?php if($key['approval'] == 1){ ?> value="approved" disabled style="background-color: rgba(0, 128, 0, 0.45);" <?php } else { ?> value="approve" <?php } ?> < name="submit" id="<?php echo $key['teacher_leave_id'];?>"></input></td>
        <td><input type="submit" <?php if($key['approval'] == 2){ ?> value="rejected" disabled style="background-color: rgba(128, 0, 12, 0.45);"<?php } else { ?> value="reject" <?php } ?> name="submit" id="<?php echo $key['teacher_leave_id'];?>"></input></td>
        <?php echo form_close(); ?>
      </tr>
     <?php }}?>
     
    </tbody>
  </table>
</div>
<!-- ////////////////////////////////////////-->

<div id="menu2" class="tab-pane fade roval_box">
      <table class="table table table-bordered">
    <thead>
      <tr class="active roval_head">
        <th>Stf ID</th>
        <th>leave category</th>
        <th>designation</th>
        <th>From date</th>
        <th>To date</th>
        <th>Message</th>
        <!-- <th>Remaining Leaves</th> -->
        <th>Status</th>
 </tr>
    </thead>
    <tbody>
      <?php
   
    foreach ($teacher_leave as $key ) { if($key['approval']==2) {?>
    <tr>
        <td><?php echo $key['stf_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['designation'];?></td>
        <td><?php echo $key['from_date'];?></td>
        <td><?php echo $key['to_date'];?></td>
        <td><?php echo $key['message'];?></td>
      <td><?php $status = $key['approval'];
         if($status ==2)
            {
              echo "rejected";
            }
            ?>
              
  </td>
      </tr>
     <?php }}?>
     
    </tbody>
  </table>
</div>





















  
    </div>
  
  </div>
</div>
   
  

