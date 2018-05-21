
 <div class="container" id="page-wrapper">
  <h2 class="roval_top">Event Details</h2>
  <div class=" revoal_tab">
    <div id="home" class="tab-pane roval_box">           
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Event Start Time</th>
        <th>Event End Time</th>
        <th>Operate By</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($event_data as $key => $value) { ?>
      <tr>
        <td><?php echo $value['event_name']; ?></td>
        <td><?php echo $value['event_date']; ?></td>
        <td><?php echo $value['event_start_time']; ?></td>
        <td><?php echo $value['event_end_time']; ?></td>
        <td><?php echo $value['staff_id']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>


