<div class="container" id="page-wrapper">
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

<?php foreach ($exp['class_incharge'] as $key => $value) {
if($value == 2){ ?>
<p class="error_message"><?php 
   	print_r($msgn);
    ?></p>
<?php echo form_open('teacher_controller/insert_class_incharge');   ?>
<div class="col-lg-12 cla_id_su">
    <div class="col-lg-11">

<div class="col-lg-4">
<div class="form-group" id=myspan>
   
<label class="col-lg-4 control-label">Class Id</label>
<div class="input-group col-lg-8">
<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
<!-- <input type="text" class="form-control" name="class_name" placeholder="Class Name"/> -->
<select name="class_name" class="form-control">
                 <option value="">select</option>
                 <?php 
                   foreach($all_class as $key){
                 $class=$key['class_name'];
                 $class1[] =$key['class_name'];
                } 
                $arr = array_unique($class1); 
              foreach ($arr as $key) {  ?>
              <option value="<?Php echo $key;   ?>"> <?Php echo $key;   ?></option>
              <?php
              }
              ?>
              </select>
              </div>
              </div>
              </div>

<div class="col-lg-4">
<div class="form-group">

<label class="col-lg-4 control-label">Section</label>
<div class="input-group col-lg-8">
    <select name="class_section" class="form-control">
                  	<option value="">select</option>
                  	  <?php 
                   foreach($all_class as $key){
                 $class=$key['class_name'];
                 $class2[] =$key['class_section'];
                } 
                $arr2 = array_unique($class2); 
              foreach ($arr2 as $key1) {  ?>
              <option value="<?Php echo $key1;   ?>"> <?Php echo $key1;   ?></option>
              <?php
              }
              ?>
              </select>
</div>
</div>
</div>

<div class="col-lg-4">
<div class="form-group">

<label class="col-lg-4 control-label">Incharge</label>
<div class="input-group col-lg-8">
<span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
<input type="text" class="form-control" name="class_incharge" placeholder="Class Incharge"/>
</div>
</div>

</div>
</div>

<div class="col-lg-1">
<button class="btn btn-warning">Submit</button>
</div>
</div>

<?php  echo form_close();  ?>
  <?php }} ?>
<div class="col-lg-12 cla_id_su" id="myDIV">
<table class="table table-bordered">
<thead>
 <tr>
<th>ID</th>
<th>Class Name</th>
<th>Class Section</th>
<th>Class Incharge</th>
<th>Manage</th>
 </tr>
</thead>

<tbody>
<tr>
<?php 
$i=1;
foreach ($all_class as $key) {
 ?>

<tr>
<td><?php echo  $i; ?></td>
<td><?php echo  $key['class_name']; ?></td>
<td><?php echo  $key['class_section']; ?></td>
<td><?php echo  $key['class_incharge']; ?></td>
<td id="mylink<?php echo $i; ?>"><a href="<?php echo base_url();  ?>/index.php/teacher_controller/remove_incharge/<?php echo $key['id']; ?>">Remove</a></td>
</tr>

<!-- script for delete button disable and enable start -->
      <?php
      foreach ($exp['class_incharge'] as $key => $value1) { }
       foreach ($exp['class_incharge'] as $key => $value2) { 
       if($value2 == '1' && $value1 == '2' || $value1 == '1'){ ?>
      <script type="text/javascript">
        document.getElementById("mylink<?php echo $i; ?>").style.pointerEvents="none";  
      </script>
      <!-- script for delete button disable and enable end -->

<?php $i++;} }} ?>
</tr>

</tbody>

</table>
</div>
<?php
foreach ($exp['class_incharge'] as $key => $value) {
 if($value == '') { ?> 
<script>
document.getElementById("myDIV").style.display = "none";
</script>
<h2 id="err"><?php echo "you have not authority !"; } }?></h2>


</div>
