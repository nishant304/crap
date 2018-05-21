<div id="page-wrapper">
     <h2 class="sub_alct_cationn">Add Events</h2>
       <div class="col-lg-12 ">
          <div class="col-lg-6 bordr_rght">
  <?php echo form_open('admission/add_new_event'); ?>
             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Add Events</div> -->
                  <div class="panel-body ">
         
             <div class="col-lg-12 sub_margs_alloc_sltcs">
                <label class="">Event Name&nbsp;<span class="alloct_sub_strs">*</span></label> 
              <input type="" class="form-control" name="event_name" placeholder="Event Name"/>
               
              </div>
               
             <div class="col-lg-12 sub_margs_alloc_sltcs ">
                <label class="">Event Date&nbsp;<span class=" alloct_sub_strs">*</span></label> 
            <input type="date" class="form-control" name="event_date" placeholder="Event Date">
               
              </div>

             
            <div class="col-lg-12 sub_margs_alloc_sltcs  ">
                <label class="">Event Start Timing&nbsp;<span class="alloct_sub_strs ">*</span></label> 
                   <input type="time" class="form-control" name="event_start_time" placeholder="Event Start Timing">
              </div>

                
                  
<div class="col-lg-12 sub_margs_alloc_sltcs  ">
<label class="">Event End Timing&nbsp;<span class="alloct_sub_strs ">*</span></label> 
<input type="time" class="form-control" name="event_end_time" placeholder="Event End Timing">
</div>
<div class="col-lg-12  sub_margs_alloc_sltcs ">
<label class="">Event For&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select name="event_for" class="form-control" id="show" onchange="change(this)">
<option>Select...</option>
<option value="common_for_all">Common For All</option>
<option value="selected_class">Selected Class</option>
</select>
</div>
<div class="col-lg-12  sub_margs_alloc_sltcs " id="text_area">
<label class="">Select Class&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select class="form-control" name="class" onchange="stu_class(this.value);">
<option value="all">Select...</option>
<?php foreach ($cls_sec['class'] as $key => $value) { ?> 
<option><?php echo $value['class_name']; ?></option>
<?php } ?>
</select>
</div>
<div class="col-lg-12  sub_margs_alloc_sltcs " id="sect_tab">
<label class="">Section&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select class="form-control" name="section" id="tabbb_section">
            <option value="all">Select</option>
</select>
</div>
<div class="col-lg-12  sub_margs_alloc_sltcs ">
<label class="">Operate By&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select class="form-control" name="staff_id">
            <option>Select</option>
            <?php foreach ($teacher as $key) { ?> 
            <option>
            <?php echo $key['stf_fname']." ". $key['stf_lname'];  } ?>
            </option>
</select>
</div>


<div class="col-lg-12 sub_margs_alloc_sltcs">
<center><button type="submit" class="btn btn-primary sub_margs_alloc_sltcs"> SAVE</button></center>
</div>
</div>
</div>
<?php echo form_close(); ?>
      </div>


<div class=" table-responsive col-lg-6 sub_aloct_seconds">          
 <table class="table table-bordered table-hover">
<thead>
<tr class="info">
<th>#</th>
<th>Event Name</th>
<th>Event Date</th>
<th>Event Start Time</th>
<th>Event End Time</th>
<th>Operate By</th>
<th>Manage</th>


</tr>
</thead>

<tbody>
<?php 
$i=1;
foreach ($results as $key) { ?>
<tr>
<?php $event_id = $key['event_id']; ?>
<td><?php echo $i; ?></td>
<td><?php echo $key['event_name']; ?></td>
<td><?php echo $key['event_date']; ?></td>
<td><?php echo $key['event_start_time']; ?></td>
<td><?php echo $key['event_end_time']; ?></td>
<td><?php echo $key['staff_id']; ?></td>
<td><a href="<?php echo base_url(); ?>index.php/admission/event_delete/<?php echo $event_id; ?>">Delete</a></td>
</tr>
<?php $i++; }  ?>
</tbody>  
</table>
<center><p class="pagination_link"><?php echo $links; ?></p></center>
    </div>
    </div>
    
  </div>
<script>
 function change() {
    var selectBox = document.getElementById("show");
    var selected = selectBox.options[selectBox.selectedIndex].value;
    if(selected === 'selected_class'){
        $('#text_area').show();
        $('#sect_tab').show();
    }
    else{
        $('#text_area').hide();
        $('#sect_tab').hide();

    }
}</script>