
<div id="page-wrapper">
 <div class="container-fluid">
<div class="panel panel-default">
  <?php echo form_open('admission/pickup_drop_detail'); ?>
  <div class="panel-heading morg_dtl">
      <label><input type="radio" name="mr">Morning</label>
      <label><input type="radio" name="mr">Evening</label>
  </div>
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
            <th>Pick</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pass as $key => $value) { ?>
          <tr>
            <td><input type="checkbox" name=""></td>
            <td><?php echo $value['passenger_name']; ?></td>
            <td><?php echo $value['student_class']; ?></td>
            <td><?php echo $value['student_section']; ?></td>
            <td><button class="btn btn-info">Pick up</button></td>
          </tr>
        </tbody>
      </table>
    </div>

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
          <tr>
            <td><input type="checkbox" name=""></td>
            <td>Abc</td>
            <td>9th</td>
            <td>a</td>
            <td><button class="btn btn-info">Drop</button></td>
          </tr>
        </tbody>      
      </table>
    </div>
  </div>
 </div>
</div>
</div>
