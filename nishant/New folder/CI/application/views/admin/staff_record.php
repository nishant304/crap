
		<div id="page-wrapper">
			<div class="main-page">
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

						      <td><a href="<?php echo base_url(); ?>index.php/admission/student_data_update/<?php echo $staff_id; ?>">Edit</a>/<a href="<?php echo base_url(); ?>index.php/admission/staff_delete/<?php echo $staff_id; ?>">Delete</a></td>
						      </tr>
						      <?php $i++; } ?>
						    </tbody>
						</table> 
			        </div>
			    </div>
			
		</div>
	    </div>


