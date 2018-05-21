<?php
$id=$this->session->userdata('stf_data');
$id1= $id[0]['stf_id'];


foreach($teacher_leave as $key ) {
  $teacher_leave_id = $key['teacher_leave_id'];
 $total_leave = $key['total_leave'];
 }

?>

<div class="container-fluid" id="page-wrapper">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Request for leave</a></li>
    <li><a data-toggle="tab" href="#menu1">Leave Status</a></li>
     <li><a data-toggle="tab" href="#menu2">Pending request</a></li>
    <li><a data-toggle="tab" href="#menu3">Approved leave</a></li> 
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <div class="container-fluid" >
  <h2 class="del_top">Add Leave Category</h2>
    <div class="col-lg-12 ">
  
  <div class="col-lg-6">
<?php echo form_open('teacher_controller/add_teacher_leave/'.$id1);?>
  <div class="panel panel-default del_radius">
    <div class="panel-heading del_hed">Add Leave Category</div>
    <span style="color: red"><?php echo $error;?></span>
    <div class="panel-body del_clr">
          <div class="col-lg-12 del_list ">
                <label class="del_label">Leave Category&nbsp;<span class="del_str">*</span></label> 
                <select name="leave_category" class="form-control del_row" id="staf" >
                  <option value="" >Select Leave Category</option>
                  <?php foreach($detail_leave_catagory as $key){ ?>

                  <option value ="<?php echo $key['leave_category'];?>"><?php echo $key['leave_category'];?></option>
                  <?php }?>
                 </select>
               
              </div>
            <div class="col-lg-12 del_list">
                <label class="del_label">Designation&nbsp;<span class="del_str">*</span></label> 
                <select name="designation" class="form-control del_row" onchange="leave1(this.value);">
                  <option value="" >Select Designation</option>
                  <option value="teacher">teacher</option>
                  </select>
               </div>

              <!--   <div class="col-lg-12 del_list">
                <label class="del_label">Total leave&nbsp;<span class="del_str">*</span></label> 
                <input type="" value="<?php //echo $total_leave;?>" name="remain_leave" class="form-control del_row" readonly>
                </div> -->

                <div class="col-lg-12 del_list">
                <label class="del_label">From date&nbsp;<span class="del_str">*</span></label> 
                <input type="date" name="from_date" class="form-control del_row">
                </div>

               <div class="col-lg-12 del_list">
                <label class="del_label">To date&nbsp;<span class="del_str">*</span></label> 
                <input type="date" name="to_date" class="form-control del_row" >
                 </div>

                <div class="col-lg-12 del_list">
                <label class="del_label">Reason For leave &nbsp;<span class="del_str">*</span></label>

              <input type="hidden" placeholder="Leave " id="a" name="total_leave" class="form-control del_row">  
                <textarea name="message" placeholder="message " class="form-control del_row"></textarea>
              </div>
              <input type="hidden" name="teacher_leave_id" value="<?php echo $teacher_leave_id;?>">
                <input type="hidden" name="url" value="<?php echo current_url(); ?>">
      <div class="col-lg-12">
    <?php foreach ($pro_stf as $key) {
        $stf_role = $key['stf_role'];
    }
?> 
<input type="hidden" value="<?php echo  $stf_role; ?> " name="hidden">
<button type="submit" id="sub" name="submit" class="btn btn-primary del_btnn" value="<?php echo $stf_role; ?>">send</button>
    </div>
    </div>
  </div>
 <?php echo form_close();?>
      </div>
     <div class="col-lg-6 del_second">          
     <table class="table table-hover table-responsive">
    <thead>
     <tr class="active" style="height: 50px;">
        <th>Leave Type</th>
        <th>From date</th>
        <th>To date</th>
        <th>Reason For leave</th>
        <th>Status</th>
      </tr>
   </thead>
    <tbody>
    <?php
    $i=1;
    foreach ($teacher_leave as $key ) {?>
     <tr>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['from_date'];?></td>
        <td><?php echo $key['to_date'];?></td>
        <td><?php echo $key['message'];?></td>
        <td>
        <?php 
           $status = $key['approval'];
           if($status ==0)
           {
            echo "pending";
           }
           elseif($status == 1)
           {
            echo "approve";
           }
           else
           {
            echo "reject";
           }
          ?>
          </td>
        </tr>
   <?php $i++;}?>

    </tbody>
  </table>
</div>
</div>
    
  </div>
    </div>
    <div id="menu1" class="tab-pane fade">
       <table class="table table-hover table-responsive">
    <thead>
     <tr class="active" style="height: 50px;">
       <th>Leave Type</th>
        <th>Total leave</th>
        <th>Remaing leave</th>
       </tr>
 <?php

 foreach ($lev_req as $key => $value) {
    foreach ($value as $key1 => $value1) {
      $name[] = $value1['total_leave']-$value1['request_leave'];
      }
 }
 $i = 0;
 foreach ($detail_leave_catagory as $key ) {  ?>

        <tr>
        <td><?php echo $key['leave_category']; ?></td>
        <td><?php echo $key['leave'];?></td>
        <td><?php echo $name[$i] ; ?></td>
        </tr>
        <?php  $i++; }?>
     </tbody>
  </table>
</thead>
    <tbody> 
    </div>
     <div id="menu2" class="tab-pane fade">
      <table class ="table table-striped table-responsive">
    <thead>
      <tr class="active roval_head">
        
        <th>Stf ID</th>
        <th>leave category</th>
        <th>from date</th>
        <th>To date</th>
        <!-- <th>Total Leaves</th> -->
        <th colspan="2">Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
    $i=1;
     foreach ($teacher_leave as $key) { if($key['approval']==0) {?>
     <tr>
        <td><?php echo $key['stf_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['from_date'];?></td>
        <td><?php echo $key['to_date'];?></td>
        <td><?php $status = $key['approval'];
         if($status ==0)
            {
              echo "pending";
            }
            ?>
            </td>
       
            <input type="hidden" name="teacher_id_hidden" value="<?php echo $key['teacher_leave_id'];?>">
            <td><a href="<?php echo base_url();?>index.php/teacher_controller/cencel_leave_request/<?php echo $key['teacher_leave_id']?>"><input type="submit" value="Cancel" name="submit" id="<?php echo $key['teacher_leave_id'];?>"></input></a>
            </td>
      
      </tr>
     <?php }}?>
    </tbody>
  </table>
    </div>
   <div id="menu3" class="tab-pane fade">
      <table class ="table table-striped table-responsive">
    <thead>
      <tr class="active roval_head">
        
        <th>Stf ID</th>
        <th>leave category</th>
        <th>from date</th>
        <th>To date</th>
        <!-- <th>Total Leaves</th> -->
        <th colspan="2">Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php
   
    $i=1;
     foreach ($teacher_leave as $key) { if($key['approval']==1) {?>
     <tr>
        <td><?php echo $key['stf_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['from_date'];?></td>
        <td><?php echo $key['to_date'];?></td>
        <td><?php $status = $key['approval'];
         if($status == 1)
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
  </div>

</div>


<style type="text/css">
.del_top{
text-align: center;
color: gray;
font-family: -webkit-body;
}

.del_radius{
border-radius: 0px;
}

      .del_label{
        font-family: -webkit-body;
      }

.del_pen{
font-size: 21px;
}

.del_hed{
color: gray !important;
font-family: -webkit-body;
font-size: 18px;

}

.del_list{
margin-top: 19px;
}

.del_clr{
color: gray;
}
       
       .del_row{
        border-radius: 0px;
       }

       .del_btnn{
    margin-top: 20px;
    border-radius: 0px;
       }

    .del_str{
 color: red;
     }

  .del_second{
    border: 1px solid rgba(128, 128, 128, 0.4);
    padding: 0px;
    color: gray;
    font-family: -webkit-body;
  }


</style>
<script type="text/javascript">
   function leave1(value)
{
var staf = document.getElementById('staf').value;
alert(staf);
alert(value);
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/stf_total_lev/"+value+"/"+staf+"/",  
    data    : {'uristring':value,'uristring1':staf},
    success : function(data){
         alert(data);
        $("#a").val(data);
        
    }
});
}
</script>