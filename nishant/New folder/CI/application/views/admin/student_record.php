<div id="page-wrapper">
<div class="main-page">
<h3 class="title1">Student List</h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for class..">
<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
<div class="box_stu_recrd" id="12th">
<table class="table" id="tableData"> 
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
						      <td><a href="<?php echo base_url(); ?>index.php/admission/student_info/<?php echo $student_id; ?>">Edit</a>/<a href="<?php echo base_url(); ?>index.php/admission/student_delete/<?php echo $student_id; ?>">Delete</a></td> 
						      </tr>
						      <?php $i++; } ?>
</tbody>
</table> 
</div>
</div>
</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
	    </div>
