
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
      				<th> Test Type</th>
      				<th> Test Date</th>
      				<th> Start Timming</th>
      				<th> End Timming</th>
              <th> Marks</th>
      				<th> Description</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($test_exam_get as $key => $value) {
      			 ?>
      			<tr>
      				<td><?php echo $value['class_id'] ?></td>
      				<td><?php echo $value['class_section'] ?></td>
      				<td><?php echo $value['subject'] ?></td>
      				<td><?php echo $value['test_type'] ?></td>
      				<td><?php echo $value['test_date'] ?></td>
      				<td><?php echo $value['test_start_time'] ?></td>
      				<td><?php echo $value['test_end_time'] ?></td>
              <td><?php echo $value['max_mark'] ?></td>
      				<td><?php echo $value['description'] ?></td>
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