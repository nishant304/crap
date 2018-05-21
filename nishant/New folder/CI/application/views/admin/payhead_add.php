
<div class="container" id="page-wrapper" >
  <h2 class="head_top">Pay Head Type</h2>
  <div class="col-lg-12 top_to">
  	 <div class="col-lg-6">
<?php echo form_open('admission/add_payhead_type'); ?>
  <div class="panel panel-default head_bdy">
    <!-- <div class="panel-heading head_pnl ">Pay Head Type</div> -->
    <div class="panel-body  head_pnl_bdy padig_tp ">
    	    <div class="col-lg-12 head_rows_clms ">
              	<label class="">Pay Head Name&nbsp;<span class="head_wala_str">*</span></label>
                <input type="text" placeholder="Enter pay head name" class="form-control head_frm_inpt" name="pay_head_name">  
              </div>
               
               <div class="col-lg-12 head_rows_clms ">
              	<label class="">Description&nbsp;<span class="head_wala_str">*</span></label>
                <textarea class="form-control head_frm_inpt" name="description" rows="5" id="comment"></textarea>
              </div>


             
                <div class="col-lg-12 head_rows_clms ">
              	<label class="">Select&nbsp;<span class="head_wala_str">*</span></label> 
              	<select name="pay_head_type" class="form-control head_frm_inpt  ">
                  <option value="" selected>Select....</option>
                  <option value="addition">Addition</option>
                  <option value="deduction">Deduction</option>
                 </select>
               
              </div>
    	<div class="col-lg-12 head_rows_clms ">
  		<input type="submit" name="submit" value="submit" class="btn btn-primary head_btns_radius">
  	</div>
    </div>
  </div>
  </div>
<?php echo form_close(); ?>

  <div class="col-lg-6 head_next_frms">          
  <table class="table table-hover table-responsive">
    <thead>
      <tr class="active" style="height: 50px;">
        <th>S.No.</th>
        <th>Pay Head Name</th>
        <th>Description</th>
        <th>Si Addition/Deduction</th>
        <th>Manage</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($payhead_fetc as $key => $value) { ?>
      <tr>
        <td width="10%"><?php echo $i; ?></td>
        <td width="30%"><?php echo $value['pay_head_name']; ?></td>
        <td><?php echo $value['description']; ?></td>
        <td><?php echo $value['pay_head_type']; ?></td>
        <td><a href="#"><i class="fa fa-pencil head_pen_head " aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-times head_pen_head" aria-hidden="true"></i></a>
        </td>
      </tr>  
   <?php  } $i++; ?>
   
      </tbody>
  </table>
  <div class="pager">
<ul id="" class="">
<li class="first"><a href="#">&lt;&lt;</a></li>
<li class="previous"><a href="#">&lt;</a></li>
<li class="page"><a href="#">1</a></li>
<li class="page selected"><a href="#">2</a></li>
<li class="page"><a href="#">3</a></li>
<li class="page"><a href="#">4</a></li>
<li class="next"><a href="#">&gt;</a></li>
<li class="last"><a href="#">&gt;&gt;</a></li>
</ul>
</div>
</div>
</div>
</div>
