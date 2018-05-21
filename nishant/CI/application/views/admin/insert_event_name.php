<div id="page-wrapper">
     <h2 class="sub_alct_cationn">Add Class</h2>
       <div class="col-lg-12 ">
          <div class="col-lg-6  bordr_rght">
  <?php echo form_open('admission/event_name'); ?>
  <span id="validate"><?php echo $msg; ?></span>
             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Add Class</div> -->
                  <div class="panel-body ">
         <!-- <span id="validate"><?php //echo form_error('class_name'); ?></span> -->
             <div class="col-lg-12 sub_margs_alloc_sltcs">
                <label class="">Event Name&nbsp;<span class="alloct_sub_strs">*</span></label> 

             <input type="text" class="form-control" name="event_name" placeholder="Class Name"/>
               
              </div>
               
             

          <!--  <span id="validate"><?php //echo form_error('class_section'); ?></span>  
            <div class="col-lg-12 sub_margs_alloc_sltcs  ">
                <label class="">Section&nbsp;<span class="alloct_sub_strs ">*</span></label> 
                 <select class="form-control" name="class_section">
                    <option value=''>Select</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                  </select>
               </div> -->
              </div> 

            
      <!-- <div class="col-lg-12 sub_margs_alloc_sltcs"> -->
      <center><button type="submit" class="btn btn-primary sub_margs_alloc_sltcs"> SAVE</button></center>
   <!--  </div> -->
   
    <?php echo form_close(); ?>
  </div>
 </div>



<div class=" table-responsive col-lg-6 sub_aloct_seconds">          
   <table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>Class Id</th>
    <th>Event name</th>
   <th>Manage</th>
  </tr>
</thead>

<tbody>
<?php foreach ($event_name as $key) {
 ?>

  <tr>
    <td><?php echo  $id = $key['event_name_id']; ?></td>
    <td><?php echo  $key['event_name']; ?></td>
   
    <td><a href="<?php echo base_url('index.php/admission/event_name_delete/'.$id);?>">Remove</a></td>
  </tr>
  <?php }  ?>
</tbody>

  
</table>
    </div>
    
    
      </div>

