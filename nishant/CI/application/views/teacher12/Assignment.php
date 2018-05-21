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

<?php foreach ($exp['assignment'] as $key => $value) {
if($value == 2){ ?>
<div class="container-fluid margi_top"">

<div class="col-lg-12 std_main" >
<?php echo form_open_multipart('teacher_controller/upload_assignment'); ?>
         <div class="col-lg-12">
         	<h3 class="std_log">Assignment</h3>
         </div>

<div class="col-lg-12">

<div class="form-group col-lg-6">
<div class="col-lg-12 pading_o">
  <label class="col-lg-4 control-label">Assignment title</label>
  <div class="input-group col-lg-8">
    <span class="input-group-addon std_fnt"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
    <input type="text" class="form-control" name="assign_title" placeholder="Assignment title"/>
  </div>
</div>
</div>

<div class="form-group col-lg-6">
   <div class="col-lg-12 pading_o">
   <label class="col-lg-4 control-label">Class</label>
      <div class="input-group col-lg-8">
        <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
        <select name="assign_for_class" class="slct_main form-control">
         <option>Select</option>
         <?php 
         foreach ($class_data['class'] as $key) {
            $class = $key['class_name'];?>
         <option><?php echo $class; ?></option> 
           <?php } ?>
        </select>
      </div>
   </div>
</div>
</div>

<div class="col-lg-12">
<div class="form-group col-lg-6">
   <div class="col-lg-12 pading_o">
    <label class="col-lg-4 control-label">Section</label>
    <div class="input-group col-lg-8">
      <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
      <select class="slct_main form-control" name="assign_for_section">
       <option>Select</option>
       <?php
         foreach ($class_data['section'] as $key) {
         $section = $key['class_section'];?>
         <option><?php echo $section; ?></option> 
       <?php } ?>
      </select>
    </div>
   </div>
</div>




<div class="form-group col-lg-6">
   <div class="col-lg-12 pading_o">
   <label class="col-lg-4 control-label">Subject</label>
    <div class="input-group col-lg-8">
      <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
        <!--  <input type="text" class="form-control" name="assign_subject" placeholder="Assignment Subject"> -->
      <select class="slct_main form-control" name="assign_subject">
        <option>Select</option>
        <?php foreach ($subject as $key) { ?>

        <option><?php echo $key['sub_name']; } ?></option>
      </select>
    </div>
   </div>
</div>
</div>



<div class="col-lg-12">
<div class="form-group col-lg-6">
   <div class="col-lg-12 pading_o">
   <label class="col-lg-4 control-label">Submission Date</label>
    <div class="input-group col-lg-8">
      <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span>	
      <input type="" class="form-control" name="date_of_submission" placeholder="Date Of Submission">
    </div>
   </div>
</div>


<div class="form-group col-lg-6">
     <div class="col-lg-12 pading_o">
   <label class="col-lg-4 control-label">Submitted By</label>
      <div class="input-group col-lg-8">
        <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
        <input type="text" class="form-control" name="submitted_by" placeholder="Submitted By">
      </div>
     </div>
</div>

</div>

<div class="col-lg-12">
<div class="form-group col-lg-6">
     <div class="col-lg-12 pading_o">
   <label class="col-lg-4 control-label">Description</label>
               <div class="input-group col-lg-8">
                  <!-- <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span> 
                  <input type="text" class="form-control" name="assign_desc" placeholder="Assignment Description"> 
                  -->
                 
                  <textarea name="assign_desc" rows="4" cols="37"></textarea>
               </div>
     </div>
</div>



<div class="form-group col-lg-6">
     <div class="col-lg-12 pading_o">
   <label class="col-lg-4 control-label">Assignment File</label>
               <div class="input-group col-lg-8">
                  <span class="input-group-addon std_fnt" ><i  class="fa fa-file-text-o" aria-hidden="true"></i></span>	
                  <input type="file" class="form-control" name="assign_file" placeholder="Assignment File">
               </div>
     </div>
</div>
</div>




<center><input class="btn btn-warning" type="submit" name="submit"></center>
<?php echo form_close();   ?>
</div>
  <?php }} ?>
<div class="col-lg-12 show_lev table-responsive">
<h2>Assignment List</h2>
<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>#</th>
    <th>Title</th>
    <th>Class</th>
    <th>Section</th>
    <th>Subject</th>
    <th>Submit date</th>
    <th>Submit By</th>
    <th>Description</th>
    <th>File</th>
    <th>Manage</th>
  
  </tr>
</thead>

<tbody>
  
    <?php 
    $i=1;
    foreach ($assignment as $key) { ?>
    <tr>
      <?php $assign_id = $key['assign_id'];  ?>
    <td><?php echo $i; ?></td>
    <td><?php echo $key['assign_title']; ?></td>
    <td><?php echo $key['assign_for_class']; ?></td>
    <td><?php echo $key['assign_for_section']; ?></td>
    <td><?php echo $key['assign_subject']; ?></td>
    <td><?php echo $key['date_of_submission']; ?></td>
    <td><?php echo $key['submitted_by']; ?></td>
    <td><?php echo $key['assign_desc']; ?></td>
    <td><?php echo $key['assign_file']; ?></td>
    <td><a href="<?php echo base_url(); ?>index.php/teacher_controller/assignment_delete/<?php echo $assign_id; ?>">Delete</a></td> 
  </tr>
  <?php $i++;} ?>
</tbody>  
</table>
</div>
</div>
</div>
