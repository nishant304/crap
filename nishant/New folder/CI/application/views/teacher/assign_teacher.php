

<div id="page-wrapper">
<?php
     $stf_id = $this->session->userdata('stfdata');
      
       $data_stf = $this->session->userdata('data_auth');


   foreach ($data_stf as $key => $value)
   {
      foreach ($value as $key1 => $value1)
   {
   
      $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    
   }

?>
<?php
// start set variables for authority
 foreach ($exp['assign_sub_class'] as $key => $value2) {
  if ($value2 == 1){
    $auth_one = 1;
  }elseif($value2 == 2){
    $auth_two = 2;

  }
  elseif($value2 == 3){
    $auth_three = 3;
  }
}
// end set variables for authority


// start condition for 2

if($auth_two == 2)
{
?>
<div class="container-fluid">

<div class="col-lg-12 std_main" >
	<?php echo form_open('teacher_controller/assign_subject_teacher'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Assign Subject and class</h3>
          <center><div id="loading"></div></center>
          <div style="color: red;"><?php echo $dsf; ?></div>
         </div>

  <div class="col-lg-12">
		<div class="form-group col-lg-6">
			<div class="col-lg-12">
			<label class="col-lg-4 control-label">Assign Teacher</label>
				<div class="input-group col-lg-8">
					<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
          <select class="form-control" name="tch_name">
            <option>Select</option>
            <?php foreach ($teacher as $key) { ?> 
            <option>
            <?php echo $key['stf_fname']." ". $key['stf_lname'];  } ?>
            </option>
          </select>
				</div>
			</div>
		</div>


		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Assign Class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                 <select class="form-control" name="assign_class" onchange="stu_class(this.value);">
                    <option>Select</option>
                    <?php foreach ($class_data['class'] as $key) { ?>
                    <option><?php echo $key['class_name']; } ?></option>
                 </select>
               </div>
		     </div>
		</div>
  </div>

   
  <div class="col-lg-12">
    <div class="form-group col-lg-6">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Assign Section</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span> 
                  <select class="form-control" id="tabbb_section" name="assign_section">
                      <option>Select</option>
                </select>
               </div>
         </div>
    </div>
  

		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Subject Name</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>
                  <select class="form-control" name="sub_name">
                    <option>Select</option>
                    <?php foreach ($subject as $key) { ?>

                  <option><?php echo $key['sub_name']; } ?></option>
                  </select>
               </div>
		     </div>
		</div>
    </div>

<div class="col-lg-12">
		<div class="form-group col-lg-6">
		     <div class="col-lg-12">
		   <label class="col-lg-4 control-label">Assign By</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span>	
                  <input type="" class="form-control" name="assign_by" placeholder="Assign By">
               </div>
		     </div>
		</div>
    </div>


  <div class="col-lg-offset-7"><input class="btn btn-warning" type="submit" value="submit" name="submit"></div>
<?php echo form_close(); ?>
</div>	
</div>
<?php } ?>

<!-- end condition for 1 and incharge OR Null Authority and incharge -->
<!-- start condition for no authority and no incharge -->
<?php
if($auth_one == '' && $auth_two == '')
{
  echo "Not Authorised";
}
// end condition for no authority and no incharge
else
 {?>
<!-- start condition for view only if 1 authority is assigned -->

<div class="main-page" id="myDIV">
        <h3 class="title1">Assign List</h3>
<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
      <div class="box_stu_recrd" id="12th">
        <table class="table table-bordered table-hover"> 
               <thead> 
            <tr>
                <th>EDIT</th>
                <th>#</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Subject Name</th>
                <th>Assign By</th>
                <th>Assign Date</th>
                <th>Manage</th>
                 </tr> 
              </thead>

            <tbody>
                <tr class="active">
                 <?php 
            $i = 1;
            foreach ($assign_teacher as $key)
           {
            $assign_id = $key['assign_id'];
            $teacher_name = $key['tch_name'];
            $assign_class = $key['assign_class'];
            $assign_section = $key['assign_section'];
            $subject_name = $key['sub_name'];
            $assign_by = $key['assign_by'];
            $assign_date = $key['assign_date'];

              ?>

        <input type="hidden" id="ids<?php echo $key['assign_id'];?>" value="<?php echo $key['assign_id'];?>">
            <tr class="active">
              <th><input type="checkbox" class="btno" id="toggle_button<?php echo $key['assign_id'];?>" VALUE="EDIT"></th>
              <th scope="row"><?php echo $i; ?></th>
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
          <td>
             <input type="hidden" id="hid5" value="assign_by">
          <input disabled="disabled" style="width: 90px;" id="myInputId5<?php echo  $key['assign_id'];?>" onblur="asg_tech5<?php echo $key['assign_id'];?>(this.value);" name="assign_by" value="<?php echo $assign_by; ?>">
          </td> 
         <td>
         <input type="hidden" id="hid6" value="assign_date">
          <input disabled="disabled" style="width: 90px;" id="myInputId6<?php echo  $key['assign_id'];?>" onblur="asg_tech6<?php echo $key['assign_id'];?>(this.value);" name="assign_date" value="<?php echo $assign_date; ?>">
          </td>

                  <td id="mylink<?php echo $i; ?>">
                  <?php if($auth_three==3){ ?>
                  <a href="<?php echo base_url(); ?>index.php/teacher_controller/assign_sub_delete/<?php echo $assign_id; ?>">Delete</a>
                  <?php } ?>
                  </td> 
                  </tr>



<script type="text/javascript">
<?Php for($i=1;$i<=6;$i++){ ?>
  function asg_tech<?Php echo $i;?><?php echo $key['assign_id'];?>(value){
  var ids=document.getElementById('ids<?php echo $key['assign_id'];?>').value;
  var hid=document.getElementById("hid<?php echo $i;?>").value;
 $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/update_asn_tec/"+value+"/"+hid+"/"+ids+"/",  
    data    : {'value':value,'hid':hid,'ids':ids
  },
  success : function(data){
    if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    // run ajax request
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
 <?php } ?>
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
<?php $i++; }} ?>
</tbody>
</table> 
</div>
</div>
</div>
</div>

