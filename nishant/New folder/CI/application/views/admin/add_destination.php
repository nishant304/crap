<?php 
$dest_id = $this->uri->segment(3);
$rute_code = $destination_update[0]['rute_code'];
$pickup_drop = $destination_update[0]['pickup_drop'];
$stop_time = $destination_update[0]['stop_time'];
$ammount = $destination_update[0]['ammount'];
$fees_type1 = $destination_update[0]['fees_type'];
$selected = 'selected';
 ?>
 <div id="page-wrapper">
 <ul class="nav nav-tabs tab_show_stdnt">
  <li class="active"><a data-toggle="tab" class="ser_tech combi_inee_dlts cv" href="#home">Add Destination & Fees</a></li>
  <li><a data-toggle="tab" class="ser_tech combi_inee_dlts1 cv1" href="#menu1"> List  </a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="panel panel-default">
      <div class="panel-body"> 
<?php echo form_open('admission/add_destination_detail/'.$dest_id); ?>
         <div class="col-lg-4 sub_margs_alloc_sltcs">
            <label  class="empll_labell">Route Code&nbsp;<span class="empll_spn">*</span></label> 
              <select class="form-control" name="rute_code">
              <option>Select</option>
              <?php foreach ($rute as $key => $value) { ?>
              <option <?php if($rute_code == $value['rute_code']){ echo $selected; } ?> value="<?php echo $value['rute_code']; ?>"><?php echo $value['rute_code']; ?></option>
              <?php } ?>
            </select>
         </div>

         <div class="col-lg-4 sub_margs_alloc_sltcs">
           <label class="empll_labell">Pick up & Drop&nbsp;<span class="empll_spn">*</span></label>
           <input class="form-control empll_input" type="" name="pickup_drop" value="<?php if($dest_id != ''){ echo $pickup_drop; } ?>">
         </div>

          <div class="col-lg-4 sub_margs_alloc_sltcs">
           <label class="empll_labell"> Stop Time&nbsp;<span class="empll_spn">*</span></label>
           <input class="form-control empll_input" type="Time" name="stop_time" value="<?php if($dest_id != ''){ echo $stop_time; } ?>">
         </div>

          <div class="col-lg-4 sub_margs_alloc_sltcs">
           <label class="empll_labell">Amount&nbsp;<span class="empll_spn">*</span></label>
           <input class="form-control empll_input" type="" name="ammount" value="<?php if($dest_id != ''){ echo $stop_time; } ?>">
         </div>

          <div class="col-lg-4 sub_margs_alloc_sltcs">
           <label class="empll_labell"> Fee Type&nbsp;<span class="empll_spn">*</span></label>
           <select class="form-control" name="fees_type">
              <option>Select</option>
              <?php foreach ($fees_type as $key => $value) { ?>
              <option <?php if($fees_type1 == $value['fees_category']){ echo $selected; } ?> value="<?php echo $value['fees_category']; ?>"><?php echo $value['fees_category']; ?></option>
              <?php } ?>
           </select>
         </div>

        <div class="col-lg-12 sub_margs_alloc_sltcs">
          <input class="btn btn-info" type="submit" name="submit" value="Save">
        </div>
      </div>
      
    </div>
  </div>
<?php echo form_close(); ?>

  <div id="menu1" class="tab-pane fade">
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Route Code</th>
              <th>Stop Position</th>
              <th>Stop Time</th>
              <th>Amount</th>
              <th>Fees Type</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($destination as $key => $value) { ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $value['rute_code']; ?></td>
              <td><?php echo $value['pickup_drop']; ?></td>
              <td><?php echo $value['stop_time']; ?></td>
              <td><?php echo $value['ammount']; ?></td>
              <td><?php echo $value['fees_type']; ?></td>
              <td>
                <a href="<?php echo base_url();?>index.php/admission/add_destination/<?php echo $value['destination_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                <a href="<?php echo base_url();?>index.php/admission/destination_delete/<?php echo $value['destination_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php $i++; } ?>
          </tbody>          
        </table>
      </div>    
    </div>
  </div>
</div>
</div>



<script type="text/javascript">
      $('.combi_inee_dlts1').click(function() {
      $('.cv1').removeClass("combi_inee_dlts1");
      $('.cv1').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
});
    $('.combi_inee_dlts').click(function() {
     $('.cv1').removeClass("combi_inee_dlts");
      $('.cv1').addClass("combi_inee_dlts1");
      $('.cv').removeClass("combi_inee_dlts1");
       $('.cv').addClass("combi_inee_dlts");
});
</script>