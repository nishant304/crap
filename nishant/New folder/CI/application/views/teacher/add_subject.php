<?php 
$user_listedd=explode(',',$role_autho[0]['add_subject']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>
<div id="page-wrapper">
     <h2 class="sub_alct_cationn">Subject Allocation</h2>
       <div class="col-lg-12 ">
          <div class="col-lg-6 bordr_rght ">
     <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>          
  <?php echo form_open('admission/add_new_subject'); ?>
  <?php  }   ?>
  <span id="validate"><?php echo $msg;?></span>

             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Subject Allocation</div> -->
                  <div class="panel-body ">
         <span id="validate"><?php echo form_error('sub_name');?></span>
             <div class="col-lg-12 sub_margs_alloc_sltcs">
                <label class="">Department&nbsp;<span class="alloct_sub_strs">*</span></label> 
              <input type="text" class="form-control" name="sub_name" placeholder="Subject Name"/>
               
              </div>
               
             

              <span id="validate"><?php echo form_error('class_id');?></span>
            <div class="col-lg-12 sub_margs_alloc_sltcs  ">
                <label class="">Class&nbsp;<span class="alloct_sub_strs ">*</span></label> 
                  <select class="form-control" name="class_id" onchange="stu_class(this.value);" id="std_classs">
                    <option value="">Select</option>
                    <?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
                 </select>
              </div>

                
               <span id="validate"><?php echo form_error('class_section');?></span>     
              <div class="col-lg-12 sub_margs_alloc_sltcs  ">
                <label class="">Section&nbsp;<span class="alloct_sub_strs ">*</span></label> 
                  <select class="form-control" name="class_section" id="tabbb_section" onchange="student_section(this.value);">
                </select>
               
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


<div class=" table-responsive col-lg-6 sub_aloct_seconds">          
   <table class="table table-bordered table-hover">
<thead>
<tr class="info">
<th>#</th>
<th>Subject Name</th>
<th>Class Name</th>
<th>Class Section</th>
<th>Manage</th>

</tr>
</thead>

<tbody>

<?php 
$i=1;
foreach ($subject as $key) { ?>
<tr>
<?php  $sub_id = $key['sub_id']; ?>
<td><?php echo $i; ?></td>
<td><?php echo $key['sub_name']; ?></td>
<td><?php echo $key['class_id']; ?></td>
<td><?php echo $key['class_section']; ?></td>
<td>
 <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
  <a href="<?php echo base_url(); ?>index.php/admission/subject_delete/<?php echo $sub_id; ?>">Delete</a>
  <?php }  ?>

</td>
</tr>
<?php $i++; }  ?>
</tbody>  
</table>
<center><p class="pagination_link"><?php echo $links; ?></p></center>
    </div>
    </div>
    
  </div>
<script type="text/javascript">   
function student_section(value)
{
var classs=document.getElementById('std_classs').value;

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_sub/"+value+"/"+classs+"/",  
    data    : {'section':value,'classs':classs},
    success : function(data){
        $("#tabbb1").html(data);
        if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
            }, 1000);
        }
    });



}
}
 });
}
</script>

<?php  }   ?>