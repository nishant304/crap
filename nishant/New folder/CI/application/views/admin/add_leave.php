
   
    <div class="container" id="page-wrapper">
  <h2 class="del_top">Add Leave Category</h2>
  	<div class="col-lg-12 ">
  	

  		<div class="col-lg-6 agn_notes_clms">
  		<?php echo form_open('admission/add_leave');?>
  <div class="panel panel-default del_radius">
    <!-- <div class="panel-heading del_hed">Add Leave Category</div> -->
    <div class="panel-body del_clr padig_tp ">
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
                  <?php foreach($fetch_designation as $key){?>
                  <option value="<?php echo $key['designation'];?>"><?php echo $key['designation'];?></option>
                  <?php }?>
                 </select>
               
              </div>


             
              <div class="col-lg-12 del_list">
              	<label class="del_label">Leave &nbsp;<span class="del_str">*</span></label>
                <input type="text" name="leave" placeholder="Leave " class="form-control del_row">  
              </div>

    	<div class="col-lg-12">
  		<button type="submit" name="submit" class="btn btn-primary del_btnn"> Create</button>
  	</div>
    </div>
  </div>

  			<?php echo form_close();?>
  		</div>


  		<div class="col-lg-6 del_second">          
  <table class="table table-bordered">
    <thead>


      <tr class="active" style="height: 50px;">
        <th>S No.</th>
        <th>Leave Type</th>
        <th>Designation</th>
        <th>Leave Count</th>
        <th>Manage</th>
      </tr>


    </thead>
    <tbody>
    <?php
    $i=1;
    foreach ($fetch_leave_data as $key ) {?>
    
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $key['leave_category'];?></td>
        <td><?php echo $key['designation'];?></td>
        <td><?php echo $key['leave'];?></td>
        <td><a href="#"><i class="fa fa-pencil del_pen" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-times del_pen" aria-hidden="true"></i></a>
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

