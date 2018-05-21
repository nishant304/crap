
<div id="page-wrapper">
<div class="col-lg-12 std_main">
  <div class="panel panel-default sch_frm">
    <div class="panel-heading sch_frmmss">Exam</div>
    <div class="panel-body">
      <div class="col-lg-12">
      	<table class="table table-responsive table-bordered table-hover">
      		<thead>
      			<tr>
      				<th>Class</th>
      				<th>Section</th>
      				<th> Subject</th>
      				<th> Exam Type</th>
      				<th> Exam Date</th>
      				<th> Start Timming</th>
      				<th> End Timming</th>
      				<th> Marks</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($exam_get as $key => $value) {
      			 ?>
      			<tr>
      				<td><?php echo $value['class_id'] ?></td>
      				<td><?php echo $value['class_section'] ?></td>
      				<td><?php echo $value['subject'] ?></td>
      				<td><?php echo $value['exam_type'] ?></td>
      				<td><?php echo $value['exam_date'] ?></td>
      				<td><?php echo $value['exam_start_time'] ?></td>
      				<td><?php echo $value['exam_end_time'] ?></td>
      				<td><?php echo $value['max_mark'] ?></td>
      			</tr>
      			<?php } ?>
      		</tbody>
      	</table>
      </div>	
    </div>
	</div>
    </div>
  </div>
</div>


 <style type="text/css">
 	
 	.sch_frm{
 		color: gray;
 		font-family: -webkit-body;
 	}

 	.sch_frmmss{
 		color: gray !important;
 		font-family: -webkit-body;
 		text-align: center;
 	}
 </style>