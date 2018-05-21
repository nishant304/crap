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
 foreach ($exp['staff'] as $key => $value2) {
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
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Email..">
	<div class="bs-example widget-shadow" data-example-id="contextual-table"> 

			<div class="box_stu_recrd" id="12th">
				<table class="table table-bordered table-hover" id="tableData"> 
					     <thead> 
						<tr>
						 <th>#</th>
						 <th>image</th>
						  <th>Staff Name</th>
						    <th>Staff Email</th>
						    <th>Staff Mobile</th>
						    <th>Staff Role</th>
						    <th>Staff Address</th>
						    <th>Manage</th>
						     </tr> 
						  </thead>

						<tbody>
						<tr class="active">
						<?php 
						$i = 1;
						foreach ($teacher as $staff_data)
					 {

					 	$staff_id = $staff_data['stf_id'];
					 	$staff_fname = $staff_data['stf_fname'];
					 	$staff_lname = $staff_data['stf_lname'];
					 	$staff_email = $staff_data['stf_email'];
					 	$staff_mobile = $staff_data['stf_mobile'];
					 	$staff_image = $staff_data['stf_image'];
					 	$staff_role = $staff_data['stf_role'];
					 	$staff_address = $staff_data['stf_address'];
					 	$photo='<img src="http://localhost/CI/application/assets/uploads/'.$staff_image.'"/>';
					 	$photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg">';

					 
							?>
						    <!-- <tr class="active"> -->
						     <th scope="row"><?php echo $i; ?></th>

						     <td style="width: 146px;"><?php if($staff_image == '') { echo $photo1; } else { echo $photo; }?></td>

						      <td style="width: 200px;"><?php echo $staff_fname;echo $staff_lname; ?></td> 

						      <td style="width: 175px;"><?php echo $staff_email; ?></td> 

						      <td><?php echo $staff_mobile; ?></td>
 
						      <td><?php echo $staff_role; ?></td>
						      <td><?php echo $staff_address; ?></td>

						      <td><a href="<?php echo base_url(); ?>index.php/teacher_controller/student_data_update/<?php echo $staff_id; ?>">Edit</a>/<a id="mylink<?php echo $i; ?>" href="<?php echo base_url(); ?>index.php/teacher_controller/staff_delete/<?php echo $staff_id; ?>">Delete</a></td>
						      </tr>

						      <?php $i++; }} ?>
						    </tbody>
						</table> 
			        </div>
			    </div>
		</div>
	    </div>


