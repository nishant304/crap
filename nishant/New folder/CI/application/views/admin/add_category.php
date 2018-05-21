
  
  <div class="container" id="page-wrapper">

  	<div class="col-lg-12 ">
  	  <h2 class="lv_headdd">Add Leave Category</h2>

  		<div class="col-lg-6 agn_notes_clms ">
  		<?php echo form_open('admission/add_category');?>
  <div class="panel panel-default lv_tp">
    <!-- <div class="panel-heading lv_add">Add Leave Category</div> -->
    <div class="panel-body padig_tp ">
    	<div class="col-lg-12 lv_topp">
                <label class="lv_label">Leave Category Name&nbsp;<span class="lv_ct">*</span></label>
                <input type="text" name="category" placeholder="Leave Category Name" class="form-control lv_input">
              
    	</div>
    	<div class="col-lg-12">
  		<button type="submit" name="submit" class="btn btn-primary lv_btnn"> Create</button>
  	</div>
    </div>
  </div>

  		<?php echo form_close();?>
  		</div>


  		<div class="col-lg-6 lv_mrg">          
  <table class="table table-bordered">
    <thead>
      <tr class="active" style="height: 50px;">
        <th>S No.</th>
        <th>Leave Category Name</th>
        <th colspan="2">Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach ($fetch_cat as $key) {?>
       <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $key['category'];?></td>
        <td><a href="#"><i class="fa fa-pencil lv_pen" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-times lv_pen" aria-hidden="true"></i></a>
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

