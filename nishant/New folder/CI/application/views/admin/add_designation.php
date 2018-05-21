
  
  <div class="container" id="page-wrapper">

  	<div class="col-lg-12 ">
  	  <h2 class="lv_headdd">Add designation</h2>

  		<div class="col-lg-6 ">
  			<?php echo form_open('admission/add_designation');?>
  <div class="panel panel-default lv_tp">
    <!-- <div class="panel-heading lv_add">Add designation</div> -->
    <div class="panel-body padig_tp">
    	<div class="col-lg-12 lv_topp">
                <label class="lv_label">designation Name&nbsp;<span class="lv_ct">*</span></label>
                <input type="text" name="designation" placeholder="designation Name" class="form-control lv_input">
              
    	</div>
    	<div class="col-lg-12">
  		<button type="submit" name="submit" class="btn btn-primary lv_btnn"> Create</button>
  	</div>
    </div>
  </div>
<?php echo form_close();?>
  		</div>


  		<div class="col-lg-6 lv_mrg agn_notes_bdr">          
  <table class="table table-bordered">
    <thead>
      <tr class="active" style="height: 50px;">
        <th>S No.</th>
        <th>designation Name</th>
        <th colspan="2">Manage</th>
      </tr>
    </thead>
    <tbody>
<?php
$i=1;
foreach ($fetch_designation as $key) {?>
 <tr>
<td><?php echo $i;?></td>
<td><?php echo $key['designation'];?></td>
<td><a href="">Edit</a></td>
<td><a href="">Delete</a></td>
</tr>
<?php $i++;}?>
   </tbody>
 </table>

</div>

</div>
  	
  </div>

</body>
</html>

