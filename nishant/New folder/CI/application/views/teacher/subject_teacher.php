 <?php 
$user_listedd=explode(',',$role_autho[0]['assign_subject_teacher']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>

 <div id="page-wrapper">
     <h2 class="sub_alct_cationn">Subject Allocation</h2>
  	   <div class="col-lg-12 ">
  	      <div class="col-lg-5 agn_notes_clms ">
     <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>         
  <?php echo form_open('admission/assign_subject_teacher'); ?>
  <?php }  ?>
             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Subject Allocation</div> -->
                  <div class="panel-body padig_tp ">
    	   
             <div class="col-lg-12 sub_margs_alloc_sltcs">
              	<label class="">Department&nbsp;<span class="alloct_sub_strs">*</span></label> 
              	<select name="department" class="form-control aub_alots_inputs">
                  <option value="" >Select ....</option>
                  <option >HR</option>
                  <option >TEACHER</option>
                  <option >FEE DEPARTMENT</option>
                  <option >DEAN</option>
                 </select>
               
              </div>
               
             <div class="col-lg-12 sub_margs_alloc_sltcs ">
              	<label class="">Teacher Name&nbsp;<span class=" alloct_sub_strs">*</span></label> 
              <select class="form-control" name="tch_name">
            <option>Select</option>
            <?php foreach ($teacher as $key) { ?> 
            <option value="<?php echo $key['stf_id'].'/'.$key['stf_fname']." ". $key['stf_lname'];?>">
            <?php echo $key['stf_fname']." ". $key['stf_lname'];  } ?>
            </option>
          </select>
               
              </div>

             
            <div class="col-lg-12 sub_margs_alloc_sltcs  ">
              	<label class="">Class&nbsp;<span class="alloct_sub_strs ">*</span></label> 
              	  <select class="form-control" name="assign_class" onchange="stu_class(this.value);" id="std_classs">
                    <option>Select</option>
                    <?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
                 </select>
              </div>

                
                  
              <div class="col-lg-12 sub_margs_alloc_sltcs  ">
              	<label class="">Section&nbsp;<span class="alloct_sub_strs ">*</span></label> 
              	  <select class="form-control" name="assign_section" id="tabbb_section" onchange="student_section(this.value);">
                </select>
               
              </div>



             <div class="col-lg-12  sub_margs_alloc_sltcs ">
              	<label class="">Subject&nbsp;<span class="alloct_sub_strs ">*</span></label> 
              <select class="form-control" name="sub_name" id="tabbb1">
          
                  </select>
               
              </div>

   <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
    	<div class="col-lg-12 sub_margs_alloc_sltcs">
  		<center><button type="submit" class="btn btn-primary sub_margs_alloc_sltcs"> SAVE</button></center>
  	</div>
    <?php   }  ?>
    </div>
  </div>
<?php echo form_close(); ?>
  		</div>


<div class=" table-responsive col-lg-7 sub_aloct_seconds">          
   <table class="table table-bordered table-hover"> 
               <thead> 
            <tr>
                <th>EDIT</th>
                <th>#</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Subject</th>
            <!--     <th>Assign Date</th> -->
                <th>Manage</th>
                 </tr> 
              </thead>

            <tbody>
                <tr class="active">
                 <?php 
            $o = 1;
            foreach ($results as $key)
           {
            $assign_id = $key['assign_id'];
            $teacher_name = $key['tch_name'];
            $assign_class = $key['assign_class'];
            $assign_section = $key['assign_section'];
            $subject_name = $key['sub_name'];
            $assign_by = $key['assign_by'];
            $assign_date = $key['assign_date'];

              ?>

       
            <tr class="active">
              <th> 
                <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
                <input type="hidden" id="ids<?php echo $key['assign_id'];?>" value="<?php echo $key['assign_id'];?>"><input type="checkbox" class="btno" id="toggle_button<?php echo $key['assign_id'];?>" VALUE="EDIT">
                <?Php  }  ?>
              </th>
              <th scope="row"><?php echo $o; ?></th>
                 <td>
                 <input type="hidden" id="hid1" value="tch_name">
        <input disabled="disabled" style="width: 90px;" id="myInputId1<?php echo $key['assign_id'];?>" onblur="asg_tech1<?php echo $key['assign_id'];?>(this.value);" name="tch_name" value="<?php echo $teacher_name; ?>">
        </td> 
        <td>
         <input type="hidden" id="hid2" value="assign_class">
        <input disabled="disabled" style="width: 90px;" id="myInputId2<?php echo  $key['assign_id'];?>"  onblur="asg_tech2<?php echo $key['assign_id'];?>(this.value);" name="assign_class" value="<?php echo $assign_class; ?>">
        </td>
         <td>
           <input type="hidden" id="hid3" value="assign_section">
         <input disabled="disabled" style="width: 90px;" id="myInputId3<?php echo  $key['assign_id'];?>" onblur="asg_tech3<?php echo $key['assign_id'];?>(this.value);" name="assign_section" value="<?php echo $assign_section; ?>">
         </td> 
         <td>
          <input type="hidden" id="hid4" value="sub_name">
         <input disabled="disabled" style="width: 90px;" id="myInputId4<?php echo  $key['assign_id'];?>" onblur="asg_tech4<?php echo $key['assign_id'];?>(this.value);" name="sub_name" value="<?php echo $subject_name; ?>">
         </td>
      
    <!--      <td>
         <input type="hidden" id="hid6" value="assign_date">
          <input disabled="disabled" style="width: 90px;" id="myInputId6<?php echo  $key['assign_id'];?>" onblur="asg_tech6<?php echo $key['assign_id'];?>(this.value);" name="assign_date" value="<?php echo $assign_date; ?>">
          </td>
 -->         
                  <td>
                    <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
                    <a href="<?php echo base_url(); ?>index.php/admission/assign_sub_delete/<?php echo $assign_id; ?>">Delete</a>
                    <?php }  ?>
                  </td> 
                  </tr>

<script type="text/javascript">
<?Php for($i=1;$i<=6;$i++){ ?>
  function asg_tech<?Php echo $i;?><?php echo $key['assign_id'];?>(value){
  var ids=document.getElementById('ids<?php echo $key['assign_id'];?>').value;
  var hid=document.getElementById("hid<?php echo $i;?>").value;
 $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/update_asn_tec/"+value+"/"+hid+"/"+ids+"/",  
    data    : {'value':value,'hid':hid,'ids':ids
  },
  success : function(data){}
  });
  }
 <?php }  ?>
 </script>



<script type="text/javascript">
var toggle_disabled = function( e ) {
for(var i=1;i<=6;i++){
var input = document.getElementById('myInputId'+i+'<?php echo $key['assign_id'];?>');
input.disabled = !(input.disabled); 
}
};
var button = document.getElementById('toggle_button<?php echo $key['assign_id'];?>');
button.addEventListener( 'click', toggle_disabled);


</script>
<?php $o++; } ?>
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

<?php   }   ?>