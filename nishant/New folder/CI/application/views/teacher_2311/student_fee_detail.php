

<div id="page-wrapper">
<?php
    $data_stf = $this->session->userdata('data_auth');

   foreach ($data_stf as $key => $value)
   {
    foreach ($value as $key1 => $value1)
   {
   
    $exp[$key1] = explode(',', $data_stf[0][$key1]);
   }  
    }
   ?>
   <?php foreach ($exp['fees'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid margi_top">

<div class="col-lg-5 col-lg-offset-3 std_main" >
  <?php echo form_open('teacher_controller/student_fee_add');?>
         <div class="col-lg-12">
          <h3 class="std_log">Student Fees Details</h3>
         </div>
    <div class="form-group">

      <div class="col-lg-12">
      <label class="col-lg-4 control-label">Student Id</label>
        <div class="input-group col-lg-8">
          <span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
          <input type="" class="form-control" name="std_id" placeholder="Student Id"/>
        </div>
      </div>
    </div>


    <div class="form-group">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Month</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="month" placeholder="Month">
               </div>
         </div>
    </div>

    <div class="form-group">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Year</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="year" placeholder="Year">
               </div>
         </div>
    </div>

    <div class="form-group">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Paid</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-user" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="paid" placeholder="Paid">
               </div>
         </div>
    </div>

    <div class="form-group">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Pending</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="pending" placeholder="Pending">
               </div>
         </div>
    </div>


    <div class="form-group">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">Fees</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
                  <input type="" class="form-control" name="fees" placeholder="Fees">
               </div>
         </div>
    </div>

     <div class="form-group">
         <div class="col-lg-12">
       <label class="col-lg-4 control-label">class</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
                  <!-- <input type="" class="form-control" name="class" placeholder="class"> -->
                  <select class="form-control" name="class">
                    <option>select-class</option>
                    <?php foreach ($class_data['class'] as $key) {?>
                     <option><?php echo $key['class_name'];}?></option>
                  </select>
               </div>
         </div>
    </div>
<input type="submit" name="submit">
    
  <?php echo form_close();?>

</div>
  <?php }} ?>
<div class="col-lg-12 show_lev table-responsive" id="myDIV">
<h2>Fee Details</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>Student Id</th>
    <th>Month</th>
    <th>Year</th>
    <th>Paid</th>
    <th>Pending</th>
    <th>Fees</th>
    <th>class</th>
    <th>Manage</th>

   </tr>
</thead>
<tbody>
  
    <?php 
    $i=1;
    foreach ($fetch_sfee_data as $key) { ?>
    <tr>
     
    <td><?php echo $i; ?></td>
    <td><?php echo $key['std_id']; ?></td>
    <td><?php echo $key['month']; ?></td>
    <td><?php echo $key['year']; ?></td>
    <td><?php echo $key['paid']; ?></td>
    <td><?php echo $key['pending']; ?></td>
    <td><?php echo $key['fees']; ?></td>
    <td><?php echo $key['class']; ?></td>

  
    <td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url(); ?>index.php/teacher_controller/assignment_delete/<?php echo $assign_id; ?>">Delete</a></td> 
  </tr>

  <!-- script for delete button disable and enable start -->
      <?php
      foreach ($exp['fees'] as $key => $value1) { }
       foreach ($exp['fees'] as $key => $value2) { 
       if($value2 == '1' && $value1 == '2' || $value1 == '1'){ ?>
      <script type="text/javascript">
        document.getElementById("mylink<?php echo $i; ?>").style.pointerEvents="none";  
      </script>
      <!-- script for delete button disable and enable end -->
  <?php $i++;}}} ?>
</tbody>  
</table>
</div>

<?php
foreach ($exp['fees'] as $key => $value) {
 if($value == '') { ?> 
<script>
document.getElementById("myDIV").style.display = "none";
</script>
<h2 id="err"><?php echo "you have not authority !"; } }?></h2>


</div>


