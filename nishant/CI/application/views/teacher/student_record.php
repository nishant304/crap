
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
 foreach ($exp['student'] as $key => $value2) {
  if ($value2 == 1){
    $auth_one = 1;
  }elseif($value2 == 2){
    $auth_two = 2;

  }
}
// end set variables for authority



if($auth_one == '' && $auth_two == '')
{
  echo "Not Authorised";
}
// start condition for 2 and 1

if($auth_two == 2 || $auth_one == 1)
{
?>
			<div class="main-page" id="dim">
				<h3 class="title1">Student List</h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for class..">
	<div class="bs-example widget-shadow" data-example-id="contextual-table"> 

			<div class="box_stu_recrd" id="12th">
				<table class="table table-bordered table-hover" id="tableData"> 
					     <thead> 
						<tr>
						 <th>#</th>
						 <th>image</th>
						  <th>Student Name</th>
						    <th>Class</th>
						    <th>Mobile</th>
						    <th>Manage</th>
						     </tr> 
						  </thead>

						<tbody>
						<tr class="active">
						<?php 
						$i = 1;
						foreach ($all_student as $student_data)
					 {

					 	$student_id = $student_data['std_id'];
					 	$student_fname = $student_data['std_fname'];
					 	$student_class = $student_data['std_class'];
					 	$student_mobile = $student_data['std_mobile'];
					 	$student_image = $student_data['std_image'];
					 	$photo='<img src="http://localhost/CI/application/assets/uploads/'.$student_image.'"/>';
					 	$photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg">';

					 
							?>
						    <!-- <tr class="active"> -->
						     <th scope="row"><?php echo $i; ?></th>
						     <td style="width: 146px;"><?php if($student_image == '') { echo $photo1; } else { echo $photo; }?></td>
						      <td style="width: 200px;"><?php echo $student_fname; ?></td> 
						      <td style="width: 175px;"><?php echo $student_class; ?></td> 
						      <td><?php echo $student_mobile; ?></td>
						      <td ><a href="<?php echo base_url(); ?>index.php/teacher_controller/student_data_update/<?php echo $student_id; ?>">Edit</a>/<a id="mylink<?php echo $i; ?>" href="<?php echo base_url(); ?>index.php/teacher_controller/student_delete/<?php echo $student_id; ?>">Delete</a></td> 
						      </tr>
						      <?php $i++; }} ?>
						    </tbody>
						</table> 
			        </div>
		 </div>
		</div>
	    </div>

