
<div id="page-wrapper">
<div class="col-lg-12 std_main">
  <div class="panel panel-default sch_frm">
    <div class="panel-heading sch_frmmss">Lession Plan</div>
    <div class="panel-body">
      <div class="col-lg-12">
      	<table class="table table-responsive table-bordered table-hover">
      		<thead>
      			<tr>
      				<th>Class</th>
      				<th>Section</th>
      				<th> Subject</th>
      				<th>Date From</th>
      				<th>Date To</th>
      				<th>Description</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($lession_plan_data as $key => $value) {
      			 ?>
      			<tr>
      				<td><?php echo $value['class_id']; ?></td>
      				<td><?php echo $value['section_id']; ?></td>
      				<td><?php echo $value['sub_id']; ?></td>
      				<td><?php echo $value['from_date']; ?></td>
      				<td><?php echo $value['to_date']; ?></td>
      				<td><?php echo $value['description']; ?></td>
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