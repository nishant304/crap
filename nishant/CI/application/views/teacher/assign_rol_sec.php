	<?php 
$user_listedd=explode(',',$role_autho[0]['assign_sec_roll']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>
     <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
	<?php echo form_open('admission/assign_roll_section');?>
	<?php  } ?>
	<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Assign Roll Section</h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for class..">

	<div class="bs-example widget-shadow" id="table-wrapper" data-example-id="contextual-table"> 

			<div class="box_stu_recrd"   id="table-scroll">
			<?php  print_r($msg_report); ?>
				<table class="table table-bordered" id="tableData"> 
					     <thead> 
			<tr class="top-row">
			 <th>#</th>
			 <th>image</th>
			  <th>Student Name</th>
			    <th>Class</th>
			    <th>Section</th>
			    <th>Roll No</th>
			    
			     </tr> 
			     <tr><td></td>
			     	<td></td>
			     	<td><input type='search'></td>
			     	<td><input type='search'></td>
			     	<td><input type='search'></td>
			     	<td><input type='search'></td>
			     	
			     </tr>
			  </thead>

			<tbody>
			<tr class="active">
			<?php 
			$selected="selected";
			$i = 1;
			foreach ($results as $student_data)
		 {

		 	$student_id = $student_data['std_id'];
		 	$student_fname = $student_data['std_fname'];
		 	$student_class = $student_data['std_class'];
		 	$student_mobile = $student_data['std_mobile'];
		 	$student_image = $student_data['std_image'];
		 	$std_roll_no = $student_data['std_roll_no'];
		 	$std_section = $student_data['std_section'];
		 	$photo='<img src="http://localhost/CI/application/assets/uploads/'.$student_image.'"/>';
		 	$photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg">';

		 
				?>
		
			     <th scope="row"><?php echo $i; ?></th>
			     <td ><?php if($student_image == '') { echo $photo1; } else { echo $photo; }?></td>
			      <td ><?php echo $student_fname; ?></td> 
			      <td ><?php echo $student_class; ?></td> 
			      <td><select name="std_section" onchange="add_section<?php echo  $student_id ?>(this.value);">
   	<option value="">No Selection</option>
    <option <?php if($std_section == 'A') { echo $selected; } ?>>A</option>
    <option <?php if($std_section == 'B') { echo $selected; } ?>>B</option>
    <option <?php if($std_section == 'C') { echo $selected; } ?>>C</option>
    <option <?php if($std_section == 'D') { echo $selected; } ?>>D</option>
    <option <?php if($std_section == 'E') { echo $selected; } ?>>E</option>

   	<option <?php if($std_section == 'F') { echo $selected; } ?>>F</option>
    <option <?php if($std_section == 'G') { echo $selected; } ?>>G</option>
    <option <?php if($std_section == 'H') { echo $selected; } ?>>H</option>
						       </select>
						       </td>
  <td><input type="text" value="<?php echo $std_roll_no; ?>" name="std_roll_no" onblur="add_roll_no<?php echo  $student_id ?>(this.value);"><input type="hidden" name="std_id" value="<?php echo $student_id ; ?>" id="std_id<?php echo  $student_id ?>"></td>  </tr>
						      <?php $i++; ?>

<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
<script type="text/javascript">
  function add_section<?php echo  $student_id ?>(value)
  {
 var std_id=document.getElementById('std_id<?php echo  $student_id ?>').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/assign_roll_section/"+value+"/"+std_id+"/",  
    data    : {'section':value,'std_id':std_id

},
    
});


  }


 function add_roll_no<?php echo  $student_id ?>(value)
 {

var std_id=document.getElementById('std_id<?php echo  $student_id ?>').value;

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/assign_roll/"+value+"/"+std_id+"/",  
    data    : {'roll':value,'std_id':std_id

},
  success : function(data){
       
      alert(data);
    }
    
});
}
</script>
<?php } } ?>
 </tbody>
</table> 
<center><p class="pagination_link"><?php echo $links; ?></p></center>
				
			        </div>
			    </div>
			
		</div>
		
	
	    </div>
<?php echo form_close();?>
<?php   }   ?>
