
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
      				<th>Class Start Timming</th>
      				<th>Class End Timming</th>
              <th>Monday</th>
              <th>Tuesday</th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
      				<th>Saturday</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($time_table_data['time_table'] as $key => $value) {
      			 ?>
      			<tr>
      				<td><?php echo $value['class'] ?></td>
      				<td><?php echo $value['class_section'] ?></td>
      				<td><?php echo $value['class_start_time'] ?></td>
      				<td><?php echo $value['class_end_time'] ?></td>
      				<td><?php echo $value['monday'] ?></td>
      				<td><?php echo $value['tuesday'] ?></td>
              <td><?php echo $value['wednesday'] ?></td>
              <td><?php echo $value['thursday'] ?></td>
              <td><?php echo $value['friday'] ?></td>
      				<td><?php echo $value['saturday'] ?></td>
      			</tr>
      			<?php } ?>
      		</tbody>
      	</table>
      </div>
      <div class="col-lg-12">
    <div class="panel-heading sch_frmmss">Subject Teacher</div>

        <table class="table table-responsive table-bordered table-hover">
          <thead>
            <tr>
              <th>Subject</th>
              <th>Teacher</th>
             
            </tr>
          </thead>
          <tbody>
            <?php foreach ($time_table_data['subject_teacher'] as $key => $value) {
             ?>
            <tr>
              <td><?php echo $value['sub_name'] ?></td>
              <td><?php echo $value['tch_name'] ?></td>
             
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