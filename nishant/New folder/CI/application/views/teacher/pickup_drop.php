
<div id="page-wrapper">
 <div class="container-fluid">
<div class="panel panel-default">
  <div class="panel-body">
  <ul class="nav nav-tabs tab_show_stdnt">
    <li class="active"><a data-toggle="tab" class="ser_tech combi_inee_dlts" href="#home">Pick Up</a></li>
    <li><a data-toggle="tab" class="ser_tech combi_inee_dlts1" href="#menu1">Drop</a></li>  
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th><input type="checkbox" name="">#</th>
            <th>Student</th>
            <th>Class</th>
            <th>Section</th>
            <th>pickup From</th>
            <th>Pick</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pass as $key => $value) { ?>
          <tr>
          <?php echo form_open('teacher_controller/pickup_drop_detail'); ?>

          <input type="hidden" name="lat1<?php echo $value['t_allocation_id']; ?>" id="lat1<?php echo $value['t_allocation_id']; ?>">
          <input type="hidden" name="long1<?php echo $value['t_allocation_id']; ?>" id="long1<?php echo $value['t_allocation_id']; ?>">

            <td><input type="checkbox" name=""></td>
            <td><input type="text" name="pass_name<?php echo $value['t_allocation_id']; ?>" value="<?php echo $value['passenger_name']; ?>" class="border_no"></td>
            <td><input type="text" name="class<?php echo $value['t_allocation_id']; ?>" value="<?php echo $value['student_class']; ?>" class="border_no"></td>
            <td><input type="text" name="section<?php echo $value['t_allocation_id']; ?>" value="<?php echo $value['student_section']; ?>" class="border_no"></td>
            <td><input type="text" name="pick_up_from<?php echo $value['t_allocation_id']; ?>" value="<?php echo $value['destination']; ?>" class="border_no"></td>
            <!-- <td><button class="btn btn-info" value="<?php echo $value['t_allocation_id']; ?>" name="pickup" type="submit">Pick up</button></td> -->

            <td><button class="btn btn-info" id="btn1<?php echo $value['t_allocation_id']; ?>" value="<?php echo $value['t_allocation_id']; ?>" type="button" onclick="getLocation1<?php echo $value['t_allocation_id']; ?>()">Pick</button>

            <button class="btn btn-info" id="btn2<?php echo $value['t_allocation_id']; ?>" value="<?php echo $value['t_allocation_id']; ?>" name="pickup" type="submit" style="display: none;">Pick</button></td>
          </tr>
<?php echo form_close(); ?>
<script>
function getLocation1<?php echo $value['t_allocation_id']; ?>() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition<?php echo $value['t_allocation_id']; ?>);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition<?php echo $value['t_allocation_id']; ?>(position)
 {

    var lat1<?php echo $value['t_allocation_id']; ?> = position.coords.latitude;
    var long1<?php echo $value['t_allocation_id']; ?> = position.coords.longitude;
    document.getElementById('lat1<?php echo $value['t_allocation_id']; ?>').value = lat1<?php echo $value['t_allocation_id']; ?>;
    document.getElementById('long1<?php echo $value['t_allocation_id']; ?>').value = long1<?php echo $value['t_allocation_id']; ?>;

 }
</script>
<!-- script for insert lat long and trigger button click -->
<script type="text/javascript">
        $(function () {
            $('[id*=btn1<?php echo $value['t_allocation_id']; ?>]').on('click', function () {
                setTimeout(function () {
                    $('[id*=btn2<?php echo $value['t_allocation_id']; ?>]').trigger('click');
                }, 300);
            });
 
            $('[id*=btn2<?php echo $value['t_allocation_id']; ?>]').on('click', function () {
            });
        });
    </script>
          <?php } ?>
        </tbody>
      </table>
    </div>

<!-- drop pannel -->
    <div id="menu1" class="tab-pane fade">
     <table class="table table-bordered">
        <thead>
          <tr>
            <th><input type="checkbox" name="">#</th>
            <th>Student</th>
            <th>Class</th>
            <th>Section</th>
            <th>Drop</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($button_chng as $key => $value1) {  ?>
          <tr>
          <?php echo form_open('teacher_controller/drop_detail'); ?>

          <input type="hidden" name="lat<?php echo $value1['pickup_drop_id']; ?>" id="lat<?php echo $value1['pickup_drop_id']; ?>">
          <input type="hidden" name="long<?php echo $value1['pickup_drop_id']; ?>" id="long<?php echo $value1['pickup_drop_id']; ?>">


            <td><input type="checkbox" name=""></td>
            <td><input type="text" name="pass_name<?php echo $value1['pickup_drop_id']; ?>" value="<?php echo $value1['pass_name']; ?>" class="border_no"></td>
            <td><input type="text" name="class<?php echo $value1['pickup_drop_id']; ?>" value="<?php echo $value1['class']; ?>" class="border_no"></td>
            <td><input type="text" name="section<?php echo $value1['pickup_drop_id']; ?>" value="<?php echo $value1['section']; ?>" class="border_no"></td>

            <td><button class="btn btn-info" id="btn1<?php echo $value1['pickup_drop_id']; ?>" value="<?php echo $value1['pickup_drop_id']; ?>" type="button" onclick="getLocation<?php echo $value1['pickup_drop_id']; ?>()">Drop</button>

            <button class="btn btn-info" id="btn2<?php echo $value1['pickup_drop_id']; ?>" value="<?php echo $value1['pickup_drop_id']; ?>" name="drop" type="submit" style="display: none;">Drop</button></td>
          </tr>
  <?php echo form_close(); ?>

<!-- script for getting lat and long -->
          <script>
function getLocation<?php echo $value1['pickup_drop_id']; ?>() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition<?php echo $value1['pickup_drop_id']; ?>);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition<?php echo $value1['pickup_drop_id']; ?>(position)
 {

    var lat<?php echo $value1['pickup_drop_id']; ?> = position.coords.latitude;
    var long<?php echo $value1['pickup_drop_id']; ?> = position.coords.longitude;
    document.getElementById('lat<?php echo $value1['pickup_drop_id']; ?>').value = lat<?php echo $value1['pickup_drop_id']; ?>;
    document.getElementById('long<?php echo $value1['pickup_drop_id']; ?>').value = long<?php echo $value1['pickup_drop_id']; ?>;

 }
</script>
<!-- script for insert lat long and trigger button click -->
<script type="text/javascript">
        $(function () {
            $('[id*=btn1<?php echo $value1['pickup_drop_id']; ?>]').on('click', function () {
                setTimeout(function () {
                    $('[id*=btn2<?php echo $value1['pickup_drop_id']; ?>]').trigger('click');
                }, 300);
            });
 
            $('[id*=btn2<?php echo $value1['pickup_drop_id']; ?>]').on('click', function () {
            });
        });
    </script>
<?php } ?>
      
        </tbody>      
      </table>
    </div>
  </div>
 </div>
</div>
</div>
  <style type="text/css">
    .border_no
    {
      border: none;
    }
  </style>