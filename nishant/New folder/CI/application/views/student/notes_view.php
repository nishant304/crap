
<div id="page-wrapper">
<div class="col-lg-12 std_main">
<div class="panel-heading sch_frmmss"><h2>Notes</h2></div>
<div class=" table-responsive col-lg-6  agan_nxt_nots full_view">          
  <table class="table table-hover table-responsive">
  <thead>
      <tr class="active" style="height: 50px;">
        <th>Title</th>
        <th>Description</th>
        <th>Batch</th>
        <th>Subject</th>
        <th>Class</th>
        <th>Section</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($notes_data as $key => $value) {
    ?>
      <tr>
        <td><?php echo $value['notes_title']; ?></td>
        <td><?php echo $value['notes_desc']; ?></td>
        <td><?php echo $value['notes_batch']; ?></td>
        <td><?php echo $value['notes_subject']; ?></td>
        <td><?php echo $value['notes_for_class']; ?></td>
        <td><?php echo $value['notes_for_section']; ?></td>
        <td> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $value['notes_id'];    ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>

       <a href="<?php echo base_url();?>application/assets/uploads/<?php echo $value['notes_file'];?>" download><i class="fa fa-pencil " aria-hidden="true"></i></a>
        </td>
      </tr>
      <?php } ?>

<?Php  foreach ($notes_data as $key => $value) {  ?>
      <div id="myModal<?php echo $value['notes_id'];    ?>" class="modal fade model_open" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <iframe  src="<?php echo base_url();  ?>application/assets/uploads/<?php echo $value['notes_file'];?>" width="100%" height="500px"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php  }   ?>
</tbody>
  </table>
		</div>
  	</div>
  </div>

<style type="text/css">
  .full_view
  {
    width: 100%;
  }
</style>