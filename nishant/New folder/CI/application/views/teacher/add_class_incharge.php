<?php 
$user_listedd=explode(',',$role_autho[0]['add_incharge']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>

<div id="page-wrapper">
     <h2 class="sub_alct_cationn">Add Class Incharge</h2>
       <div class="col-lg-12 ">
          <div class="col-lg-6 bordr_rght">
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>     
  <?php echo form_open('admission/insert_class_incharge'); ?>
  <?php  }  ?>
  <span id="validate"><?php echo $msg;?></span>
             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Add Class Incharge</div> -->
                  <div class="panel-body ">
         <span id="validate"><?php echo form_error('class_name');?></span>
             <div class="col-lg-12 sub_margs_alloc_sltcs">
                <label class="">Class&nbsp;<span class="alloct_sub_strs">*</span></label> 
               <select name="class_name" class="form-control" onchange="stu_class(this.value);">
                 <option value="">select</option>
                 <?php 
                   foreach($all_class as $key){
                 $class=$key['class_name'];
                 $class1[] =$key['class_name'];
                } 
          $arr = array_unique($class1); 
foreach ($arr as $key) {  ?>
<option value="<?Php echo $key;?>"> <?Php echo $key;   ?></option>
<?php
}
         ?>
                 </select>
               
              </div>
               
             

             <span id="validate"><?php echo form_error('class_section');?></span>
             
            <div class="col-lg-12 sub_margs_alloc_sltcs  ">
                <label class="">Section&nbsp;<span class="alloct_sub_strs ">*</span></label> 
                  <select name="class_section" class="form-control" id="tabbb_section">
    <option value="">Select</option>
                    </select>
               </div> 
               <span id="validate"><?php echo form_error('class_incharge');?></span>
<div class="col-lg-12 sub_margs_alloc_sltcs  ">
                <label class="">Incharge&nbsp;<span class="alloct_sub_strs ">*</span></label> 
  <select class="form-control" name="class_incharge">
<option value="">Select</option>
<?php foreach ($teacher as $key => $value) { ?>
<option value="<?php echo $value['stf_id']; ?>"><?php echo $value['stf_fname']." ".$value['stf_lname']; ?></option>
<?php } ?>
</select>
               </div>






              </div>
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
    <div class="col-lg-12 sub_margs_alloc_sltcs">
      <center><button type="submit" class="btn btn-primary sub_margs_alloc_sltcs"> SAVE</button></center>
    </div>
   <?php } ?>
    <?php echo form_close(); ?>
  </div>
 </div>



<div class=" table-responsive col-lg-6 sub_aloct_seconds">          
   <table class="table table-bordered">
<thead>
 <tr>
<th>ID</th>
<th>Class Name</th>
<th>Class Section</th>
<th>Class Incharge</th>
<th>Manage</th>
 </tr>
</thead>

<tbody>
<tr>
<?php foreach ($results as $key) {
 ?>

<tr>
<td><?php echo  $key['id']; ?></td>
<td><?php echo  $key['class_name']; ?></td>
<td><?php echo  $key['class_section']; ?></td>
<td><?php echo  $key['class_incharge']; ?></td>
<td>
 <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
  <a href="<?php echo base_url();  ?>/index.php/admission/remove_incharge/<?php echo $key['id']; ?>">Remove</a>
<?php   }   ?>
</td>
</tr>
<?php }  ?>
</tr>

</tbody>

</table>
<center><p class="pagination_link"><?php echo $links; ?></p></center>
    </div>
    </div>
    
      </div>

<?php  }  ?>