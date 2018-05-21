<div  id="page-wrapper">
  <div class="col-lg-12 top_to">
<div class="col-lg-6 head_next_frms1 table-responsive">          
  <table class="table table-hover ">
    <thead>
      <tr class="active" style="height: 50px;">
        <th>S.No.</th>
        <th>Event Id</th>
        <th>Student Id</th>
        <th>Status</th>
        <th>Manage</th>
        
        </tr>
    </thead>
    <tbody>
    <?php $i=1;
     foreach ($results as $key => $value1) { 
      if($value1['participate_status'] == 1)
      {
          $value = "Accepted";
      }
      else
      {
        $value = "Pending";
      }
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value1['event_id']; ?></td>
        <td><?php echo $value1['std_id']; ?></td>
        <td><?php echo $value; ?></td>
        <td><a href="#"><i class="fa fa-pencil head_pen_head " aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-times head_pen_head" aria-hidden="true"></i></a>
        </td>
      </tr>  
   <?php $i++; }  ?>
     
   </tbody>
  </table>
    <center><p class="pagination_link"><?php echo $links; ?></p></center>
</div>
</div>
</div>