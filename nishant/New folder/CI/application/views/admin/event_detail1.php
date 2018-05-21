<div  id="page-wrapper">
  <div class="col-lg-12 top_to">
    <div class="panel-heading head_pnl ">Event Details</div>
     <div class="col-lg-6 bordr_rght">
<?php echo form_open('admission/event_detail_insert'); ?>
  <div class="panel panel-default head_bdy">
    <div class="panel-body  head_pnl_bdy">
          <div class="col-lg-12 head_rows_clms ">
              <label class="">Event Name&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" name="event_id" id="participate_stu" onchange="all_prticipate_stu(this.value);">
                <option>Select</option>
                <?php foreach ($event as $key => $event_name) { ?>
                <option value="<?php echo $event_name['event_id']; ?>"><?php echo $event_name['event_name']; ?></option>
                <?php } ?>
              </select> 
          </div>
          <div class="col-lg-12 head_rows_clms ">
              <label class="">Class&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="std_class" name="class_name" onchange="stu_class(this.value);">  
              <option>Select</option>
              <?php foreach ($cls_sec['class'] as $key => $class_name) { ?>
                <option><?php echo $class_name['class_name']; ?></option>
                <?php } ?>
              </select>
          </div>

          <div class="col-lg-12 head_rows_clms">
              <label class="">Section&nbsp;<span class="head_wala_str">*</span></label> 
              <select class="form-control" onchange="event_section(this.value);" name="section_name"  id="tabbb_section">
                <option>Select</option>
              </select>
          </div>
          <div class="col-lg-12 head_rows_clms ">
              <label class="">Winner(1st)&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="winner_student1" name="winner1st">
                <option>Select</option>
              </select>
                
          </div>
          <div class="col-lg-12 head_rows_clms ">
              <label class="">Winner(2nd)&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="winner_student2" name="winner2nd">
                <option>Select</option>
              </select>
              
          </div>
          <div class="col-lg-12 head_rows_clms ">
              <label class="">Winner(3rd)&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="winner_student3" name="winner3rd">
                <option>Select</option>
              </select>  
          </div>
               
               <div class="col-lg-12 head_rows_clms ">
                <label class="">Description&nbsp;<span class="head_wala_str">*</span></label>
                <textarea class="form-control head_frm_inpt" name="description" rows="5" id="comment" placeholder="Enter the decription"></textarea>
              </div>
      <div class="col-lg-12 head_rows_clms ">
      <input type="submit" name="submit" value="submit" class="btn btn-primary head_btns_radius">
    </div>
    </div>
  </div>
  </div>
<?php echo form_close(); ?>

  <div class="col-lg-6 head_next_frms table-responsive">          
  <table class="table table-hover ">
    <thead>
      <tr class="active" style="height: 50px;">
        <th>S.No.</th>
        <th>Event Name</th>
        <th>Class Name</th>
        <th>Section Name</th>
        <th>Winner 1st</th>
        <th>Winner 2nd</th>
        <th>Winner 3rd</th>
        <th>Description</th>
        <th>Manage</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1;
     foreach ($results as $key => $value) { ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['event_id']; ?></td>
        <td><?php echo $value['class_name']; ?></td>
        <td><?php echo $value['section_name']; ?></td>
        <td><?php echo $value['winner1st']; ?></td>
        <td><?php echo $value['winner2nd']; ?></td>
        <td><?php echo $value['winner3rd']; ?></td>
        <td><?php echo $value['description']; ?></td>
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


<script type="text/javascript">
function event_section(sec)
  {
var std_class=document.getElementById('std_class').value;
var value=document.getElementById('participate_stu').value;
$.ajax({
      type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/participate_stu/"+value+"/"+std_class+"/"+sec+"/",  
    data      : {'event_id_ajax':value,'clss':std_class,'section':sec},
    success   : function(data){
      $("#winner_student1").html(data);
      $("#winner_student2").html(data);
      $("#winner_student3").html(data);
    }
    });

  }


</script>
