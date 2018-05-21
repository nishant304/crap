

   
    <div class="container" id="page-wrapper">
  <h2 class="del_top">Add Leave Category</h2>
  	<div class="col-lg-12 ">
  	

  		<div class="col-lg-6">
  		<?php echo form_open('teacher_controller/add_teacher_leave');?>
  <div class="panel panel-default del_radius">
    <div class="panel-heading del_hed">Add Leave Category</div>
    <div class="panel-body del_clr">
    	    <div class="col-lg-12 del_list ">
              	<label class="del_label">Leave Category&nbsp;<span class="del_str">*</span></label> 
              	<select name="leave_category" class="form-control del_row ">
                  <option value="" >Select Leave Category</option>
                  <?php foreach($fetch_cat as $key){?>
                  <option value="<?php echo $key['category'];?>"><?php echo $key['category'];?></option>
                  <?php }?>
                 </select>
               
              </div>

               
               <div class="col-lg-12 del_list">
              	<label class="del_label">Designation&nbsp;<span class="del_str">*</span></label> 
              	<select name="designation" class="form-control del_row">
                  <option value="" >Select Designation</option>
                  <option value="teacher">teacher</option>
                  </select>
               </div>

              <div class="col-lg-12 del_list">
                <label class="del_label">From date&nbsp;<span class="del_str">*</span></label> 
                <input type="date" name="from_date" class="form-control del_row">
                </div>

               <div class="col-lg-12 del_list">
                <label class="del_label">To date&nbsp;<span class="del_str">*</span></label> 
                <input type="date" name="to_date" class="form-control del_row">
                </div>

              <div class="col-lg-12 del_list">
              	<label class="del_label">Reason For leave &nbsp;<span class="del_str">*</span></label>
                <!-- <input type="text" name="leave" placeholder="Leave " class="form-control del_row">   -->
                <textarea name="message" placeholder="message " class="form-control del_row"></textarea>
              </div>

    	<div class="col-lg-12">
  		<button type="submit" name="submit" class="btn btn-primary del_btnn">send</button>
  	</div>
    </div>
  </div>

  			<?php echo form_close();?>
  		</div>


  		<div class="col-lg-6 del_second">          
  <table class="table table-hover table-responsive">
    <thead>


      <tr class="active" style="height: 50px;">
        <th>S No.</th>
        <th>Stf id.</th>
        <th>Leave Type</th>
        <th>Designation</th>
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
        <td><?php echo $i;?></td>
         <td><?php echo $key['stf_id'];?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['designation'];?></td>
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



</body>
</html>

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