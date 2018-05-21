<div id="page-wrapper">
     <h2 class="sub_alct_cationn">Add Class</h2>
       <div class="col-lg-12 ">
          <div class="col-lg-6  bordr_rght">
  <?php echo form_open('admission/add_classes'); ?>
  <span id="validate"><?php echo $msg; ?></span>
             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Add Class</div> -->
                  <div class="panel-body ">
         <span id="validate"><?php echo form_error('class_name'); ?></span>
             <div class="col-lg-12 sub_margs_alloc_sltcs">
                <label class="">Class&nbsp;<span class="alloct_sub_strs">*</span></label> 

             <input type="text" required class="form-control" name="class_name" placeholder="Class Name"/>
               
              </div>
               
             

           <span id="validate"><?php echo form_error('class_section'); ?></span>  
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
               </div> 
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
    <th>Class</th>
    <th>Section</th>
      <th>Manage</th>
  </tr>
</thead>

<tbody>
<?php foreach ($results as $key) {
 ?>

  <tr>
    <td><?php echo  $key['id']; ?></td>
    <td><?php echo  $key['class_name']; ?></td>
    <td><?php echo  $key['class_section']; ?></td>
    <td><a href="<?php echo base_url('index.php/admission/class_remove/');echo $key['id']; ?>">Remove</a></td>
  </tr>
  <?php }  ?>
</tbody>

  
</table>
<center><p class="pagination_link"><?php echo $links; ?></p></center>
    </div>
    
    
      </div>

