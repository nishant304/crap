<?php 
$user_listedd=explode(',',$role_autho[0]['add_notice']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>




<div id="page-wrapper">
     <h2 class="sub_alct_cationn">Add Notice</h2>
  	   <div class="col-lg-12 ">
  	      <div class="col-lg-12 ">
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>          
  <?php echo form_open('admission/add_new_notice'); ?>
  <?php  }  ?>
             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Add Notice</div> -->
                  <div class="panel-body ">
    	   
             <div class="col-lg-4 sub_margs_alloc_sltcs">
              	<label class="">Notice Name&nbsp;<span class="alloct_sub_strs">*</span></label> 
              	<input type="" class="form-control" name="notice_name" placeholder="Notice Name"/>
               
              </div>
               
             <div class="col-lg-4 sub_margs_alloc_sltcs ">
              	<label class="">Notice Date&nbsp;<span class=" alloct_sub_strs">*</span></label> 
             <input type="date" class="form-control" name="notice_date" placeholder="Notice Date">
               
              </div>

             
            <div class="col-lg-4 sub_margs_alloc_sltcs  ">
              	<label class="">Remove Date&nbsp;<span class="alloct_sub_strs ">*</span></label> 
              	 <input type="date" class="form-control" name="remove_date" placeholder="Notice Date">
              </div>

                
                  
              <div class="col-lg-6 sub_margs_alloc_sltcs  ">
              	<label class="">Operated By&nbsp;<span class="alloct_sub_strs ">*</span></label> 
              	  <select class="form-control" name="submit_by">
            <option>Select</option>
            <?php foreach ($teacher as $key) { ?> 
            <option>
            <?php echo $key['stf_fname']." ". $key['stf_lname'];  } ?>
            </option>
          </select>
               
              </div>



             <div class="col-lg-6  sub_margs_alloc_sltcs ">
              	<label class="">Notice Description&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
              	<textarea name="notice_desc" rows="2" cols="76"></textarea>
               
              </div>
<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
    	<div class="col-lg-12 sub_margs_alloc_sltcs">
  		<center><button type="submit" class="btn btn-primary sub_margs_alloc_sltcs"> SAVE</button></center>
  	</div>
    <?php  }  ?>
    </div>
  </div>
<?php echo form_close(); ?>
  		</div>


<div class=" table-responsive col-lg-12 sub_aloct_seconds">          
  <table class="table table-bordered table-hover">
<thead>
	<tr class="info">
		<th>#</th>
		<th>Notice Name</th>
		<th>Notice Date</th>
		<th>Remove Date</th>
		<th>Notice Description</th>
		<th>Submited By</th>
		<th>Status</th>
		<th>Submited Date</th>
		<th>Manage</th>
	
	
	</tr>
</thead>

<tbody>
		<?php 
		$i=1;
		foreach ($results as $key) { ?>
		<tr>
		<?php $notice_id = $key['notice_id']; ?>
		<td><?php echo $i; ?></td>
		<td><?php echo $key['notice_name']; ?></td>
		<td><?php echo $key['notice_date']; ?></td>
		<td><?php echo $key['remove_date']; ?></td>
		<td width="100px;"><div style="overflow-x:scroll; overflow-y:hidden; width: 200px; height:40px;"><?php echo $key['notice_desc']; ?></div></td>
		<td><?php echo $key['submit_by']; ?></td>
		<td><?php echo $key['status']; ?></td>
		<td><?php echo $key['submit_date']; ?></td>
		<td>
   <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
      <a href="<?php echo base_url(); ?>index.php/admission/notice_delete/<?php echo $notice_id; ?>">Delete</a>
 <?php   } ?> 
    </td>
		</tr>
	<?php $i++; }  ?>
</tbody>	
</table>
<center><p class="pagination_link"><?php echo $links; ?></p></center>
		</div>
  	</div>
  	
  </div>
<?php  }  ?>