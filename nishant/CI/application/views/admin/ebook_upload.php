
		<!-- main content start-->		
		<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">Ebook List</h3>
	<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
			<div class="box_stu_recrd" id="12th">
				<table class="table"> 
					     <thead> 
						<tr>
						 <th>#</th>
						  <th>Title</th>
						    <th>Course</th>
						    <th>Class</th>
						    <th>Submitted By</th>
						    <th>File</th>
						    <th>Manage</th>
						     </tr> 
						  </thead>

						<tbody>
						<tr class="active">
						<?php 
						$i = 1;
						foreach ($ebook_data as $ebook)
					 {
					 	$id = $ebook['subject_id'];
					 	$title = $ebook['subject_title'];
					 	$course = $ebook['course'];
					 	$class = $ebook['file_for_class'];
					 	$subject = $ebook['subject'];
					 	$submitted_by = $ebook['submitted_by'];
					 	$file = $ebook['file'];
							?>
						    <tr class="active">
						     <th scope="row"><?php echo $i; ?></th>
						      <td><?php echo $title; ?></td> 
						      <td><?php echo $course; ?></td> 
						      <td><?php echo $class; ?></td>
						      <td><?php echo $submitted_by; ?></td>
						      <td><?php echo $file; ?></td>
						      <td><a href="<?php echo base_url(); ?>index.php/admission/ebook_data_update/<?php echo $id; ?>">Edit</a>/<a href="<?php echo base_url(); ?>index.php/admission/ebook_delete/<?php echo $id; ?>">Delete</a></td> 
						      </tr>
						      <?php $i++; } ?>
						    </tbody>
						</table> 
			        </div>
			    </div>
			
		</div>
			<?php echo form_open_multipart('admission/do_upload'); ?>
			<div class="add_file col-lg-offset-5">

				<div>Title</div>
				<div>
				<input type="text" name="subject_title" value="<?php if($ebook_id != ''){ echo $title; } ?>"></div>

				<div>Class</div>
				<div>
				<input type="text" name="file_for_class" value="<?php if($ebook_id != ''){ echo $course; } ?>"></div>

				<div>Subject</div>
				<div>
				<input type="text" name="subject" value="<?php if($ebook_id != ''){ echo $file_for_class; } ?>"></div>

				<div>Submitted By</div>
				<div>
				<input type="text" name="submitted_by" value="<?php if($ebook_id != ''){ echo $submitted_by; } ?>"></div>

				<div>
				<input type="file" name="userfile">
				<input type = "submit" name="submit" value = "upload" /></div>
				</div>
		</div>
					<?php echo form_close(); ?>
				</div>
	</div>
	</div>
	</div>
	</body>
</html>
	
	
