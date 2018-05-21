<div  id="page-wrapper">
<h2 class="asmnt_adss">Assignments</h2>
       <div class="col-lg-12 ">
<div class=" table-responsive col-lg-6  ads_nts_assmnt full_view">  
  <table class="table table-hover table-responsive">
    <thead>


      <tr class="active" style="height: 50px;">
        <th>S No.</th>
        <th>Title</th>
        <th>Class</th>
        <th>Section</th>
        <th>Subjects</th>
        <th>Date Of Submission</th>
        <th>Manage</th>
      </tr>


    </thead>
    <tbody>
<?php 
foreach ($assign_get as $key) {  ?>
      <tr>
        <td width="10%"><?php echo $key['assign_id'];    ?></td>
        <td width="30%"><?php echo $key['assign_title'];    ?></td>
        <td><?php echo $key['assign_for_class'];    ?></td>
        <td><?php echo $key['assign_for_section'];    ?></td>
        <td><?php echo $key['assign_subject'];    ?></td>
        <td><?php echo $key['date_of_submission'];    ?></td>
        <td><a href="#" data-toggle="modal" data-target="#myModal<?php echo $key['assign_id'];    ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="<?php echo base_url();  ?>application/assets/uploads/<?php echo $key['assign_file'];    ?>" download><i class="fa fa-pencil " aria-hidden="true"></i></a>
            
        </td>
      </tr>
    <?php  }   ?>
  <?Php  foreach ($assign_get as $key) {  ?>
      <div id="myModal<?php echo $key['assign_id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <iframe  src="<?php echo base_url();  ?>application/assets/uploads/<?php echo $key['assign_file'];    ?>" width="100%" height="500px"></iframe>
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