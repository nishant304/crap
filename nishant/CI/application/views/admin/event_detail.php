<div  id="page-wrapper">
  <div class="col-lg-12 top_to">
    <div class="panel-heading head_pnl ">Event Details</div>
     <div class="col-lg-12 bordr_rght">
<?php echo form_open('admission/event_detail_insert'); ?>
  <div class="panel panel-default head_bdy">
    <div class="panel-body  head_pnl_bdy">

          <div class="col-lg-3 head_rows_clms ">
 <!-- <span id="validate"><?php echo form_error('event_id');?></span>  -->
              <label class="">Event Name&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" name="event_name" id="participate_stu" onchange="all_prticipate_stu(this.value);">
                <option value="">Select</option>
                <?php foreach ($event as $key => $event_name) { ?>
                <option value="<?php echo $event_name['event_name'];?>"><?php echo $event_name['event_name'];?></option>
                <?php } ?>
              </select> 

          </div>

            <div class="col-lg-3 head_rows_clms ">
 <!-- <span id="validate"><?php //echo form_error('class_name');?></span>  -->
              <label class="">Event Date&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" name="event_date" id="evnt_date" onchange="ev_date(this.value);" >  
               
              
              </select>
          </div>
<!-- =================for first winner ====================== -->

          <div class="col-lg-3 head_rows_clms ">
 <!-- <span id="validate"><?php echo form_error('class_name');?></span>  -->
              <label class="">Class&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="std_class" name="class_name" onchange="section(this.value);">  
              
              </select>
          </div>

          <div class="col-lg-3 head_rows_clms">
 <!-- <span id="validate"><?php //echo form_error('section_name');?></span>  -->
              <label class="">Section&nbsp;<span class="head_wala_str">*</span></label> 
              <select class="form-control" onchange="event_section(this.value);" name="section_name"  id="tabbb_section">
                <option value="">Select</option>
              </select>
          </div>

          <div class="col-lg-3 head_rows_clms ">
 <!-- <span id="validate"><?php echo form_error('winner1st');?></span>  -->
              <label class="">Winner(1st)&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="winner_student1" name="winner1st">
                <option value="">Select</option>
              </select>
            </div>
  <!-- end code ==================================== -->         

<!-- ==============for second winner ================================ -->
        <div class="col-lg-3 head_rows_clms ">
           <label class="">Class&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="std_class_2" name="class_name_2">  
             
              </select>
          </div>
   <div class="col-lg-3 head_rows_clms">
 <!-- <span id="validate"><?php echo form_error('section_name');?></span>  -->
              <label class="">Section&nbsp;<span class="head_wala_str">*</span></label> 
              <select class="form-control"  name="section_name_2"  id="tabbb_section_2" onchange="sec2(this.value);">
                <option value="">Select</option>
              </select>
          </div>
 <div class="col-lg-3 head_rows_clms ">
 <!-- <span id="validate"><?php echo form_error('winner2nd');?></span>  -->
              <label class="">Winner(2nd)&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="winner_student2" name="winner2nd">
                <option value="">Select</option>
              </select>
              
          </div>
<!-- ================end code ========================================== -->


<!-- =================for third winner ====================== -->
 <div class="col-lg-3 head_rows_clms ">
           <label class="">Class&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="std_class_3" name="class_name_3">  
             
              </select>
          </div>
   <div class="col-lg-3 head_rows_clms">
 <!-- <span id="validate"><?php echo form_error('section_name');?></span>  -->
              <label class="">Section&nbsp;<span class="head_wala_str">*</span></label> 
              <select class="form-control"  name="section_name_3"  id="tabbb_section_3" onchange="sec3(this.value);">
                <option value="">Select</option>
              </select>
          </div>

          <div class="col-lg-3 head_rows_clms ">
 <!-- <span id="validate"><?php echo form_error('winner3rd');?></span>  -->
              <label class="">Winner(3rd)&nbsp;<span class="head_wala_str">*</span></label>
              <select class="form-control" id="winner_student3" name="winner3rd">
                <option value="">Select</option>
              </select>  
          </div>
  <!-- ============= end code  ====================-->
          <!--      <div class="col-lg-12 head_rows_clms ">
 <span id="validate"><?php //echo form_error('description');?></span> 
                <label class="">Description&nbsp;<span class="head_wala_str">*</span></label>
                <textarea class="form-control head_frm_inpt" name="description" rows="5" id="comment" placeholder="Enter the decription"></textarea>
              </div> -->
      <div class="col-lg-12 head_rows_clms ">
      <input type="submit" name="submit" value="submit" class="btn btn-primary head_btns_radius">
    </div>
    </div>
  </div>
  </div>
<?php echo form_close(); ?>

  <div class="col-lg-12 head_next_frms table-responsive">          
  <table class="table table-hover ">
    <thead>
      <tr class="active" style="height: 50px;">
        <!-- <th>S.No.</th> -->
        <th>Event Name</th>
        <th>Class Name</th>
        <th>Section Name</th>
        <th>Winner 1st</th>
        <th>Winner 2nd</th>
        <th>Winner 3rd</th>
        
        <th colspan="2">Manage</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1;
     foreach ($event_details as $key => $value) { ?>
      <tr>

 <?php $id= $value['event_details_id']; ?>
      
<input type=hidden value="<?php echo $value['event_details_id']; ?>" id="id<?php echo $value['event_details_id'];?>">
<td>
  <input type="hidden" value="event_id" id="colm1">
  <input type="text" value="<?php echo $value['event_id'];?>" id="myInputId1<?php echo $value['event_details_id'];?>" disabled="disabled" name="event_id" onblur="inpt1<?php echo $value['event_details_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="class_name" id="colm2">
  <input type="text" value="<?php echo $value['class_name'];?>" id="myInputId2<?php echo $value['event_details_id'];?>" disabled="disabled" name="class_name" onblur="inpt2<?php echo $value['event_details_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="section_name" id="colm3">
  <input type="text" value="<?php echo $value['section_name']; ?>" id="myInputId3<?php echo $value['event_details_id'];?>" disabled="disabled" name="section_name" onblur="inpt3<?php echo $value['event_details_id'];?>(this.value);">
</td>
<td>
   <input type="hidden" value="winner1st" id="colm4">
  <input type="text" value="<?php echo $value['winner1st']; ?>" id="myInputId4<?php echo $value['event_details_id'];?>" disabled="disabled" name="winner1st" onblur="inpt4<?php echo $value['event_details_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="winner2nd" id="colm5">
  <input type="text" value="<?php echo $value['winner2nd']; ?>" id="myInputId5<?php echo $value['event_details_id'];?>" disabled="disabled" name="winner2nd" onblur="inpt5<?php echo $value['event_details_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="winner3rd" id="colm6">
  <input type="text" value="<?php echo $value['winner3rd']; ?>" id="myInputId6<?php echo $value['event_details_id'];?>" disabled="disabled" name="winner3rd" onblur="inpt6<?php echo $value['event_details_id'];?>(this.value);">
</td>
<td>
      
<button type="submit" id="toggle_button<?php echo $value['event_details_id'];?>">edit</button>
 <a href="<?php echo base_url(); ?>index.php/admission/event_detail_delete/<?php echo $id; ?>"><i class="fa fa-times head_pen_head" aria-hidden="true"></i></a>
        </td>
      </tr>  


<script type="text/javascript">
<?Php for($i=1;$i<=6;$i++){ ?>
  function inpt<?php echo $i;?><?php echo $value['event_details_id'];?>(value){
  var id=document.getElementById('id<?php echo $value['event_details_id'];?>').value;
  var col_name=document.getElementById("colm<?php echo $i;?>").value;
  $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/update_event_detail/"+value+"/"+id+"/"+col_name+"/",  
    data    : {'value':value,'id':id,'colname':col_name
  },
  success : function(data){}
  });
}
 <?php }  ?>
 </script>


<script type="text/javascript">
var toggle_disabled = function(e){
for(var i=1;i<=6;i++){
var input = document.getElementById('myInputId'+ i +'<?php echo $value['event_details_id'];?>');
input.disabled = !(input.disabled); 
}
};
var button = document.getElementById('toggle_button<?php echo $value['event_details_id'];?>');
button.addEventListener( 'click', toggle_disabled);
</script>
<?php $i++; }?>

</tbody>
  </table>
</div>
</div>
</div>

<script type="text/javascript">
function all_prticipate_stu(value)
  {
$.ajax({
       type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/evnt_date/"+value+"/",  
      data      : {'value':value},
    success   : function(data){
     $("#evnt_date").html(data);
      
    }
    });

  }
  function ev_date(value)
  {
  var evnt = document.getElementById('participate_stu').value;
  $.ajax({
       type    : "POST",
       url     : "detail_event",  
       data      : {'value':value,'evnt_nm':evnt},
    success   : function(data){
      $("#std_class").html(data);
      $("#std_class_2").html(data);
      $("#std_class_3").html(data);
      
   alert(data);
    }
    });

  }
 
</script>

<script type="text/javascript">
function section(value)
  {
    alert(value);
 var evnt = document.getElementById('participate_stu').value;
 $.ajax({
       type    : "POST",
       url     : "section",  
      data      : {'value':value,'evnt_nm':evnt},
    success   : function(data){
     
      $("#tabbb_section").html(data);
      $("#tabbb_section_2").html(data);
      $("#tabbb_section_3").html(data);
     
  
    }
    });

  }
</script>

<script type="text/javascript">
function event_section(value)
  {
    var clas = document.getElementById('std_class').value;
$.ajax({
       type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/participate_stu/"+value+"/"+clas+"/",  
       data      : {'clas':clas,'section':value},
    success   : function(data){
      $("#winner_student1").html(data);
      }
    });

  }
</script>
<script type="text/javascript">
function sec2(value)
  {
    var clas = document.getElementById('std_class_2').value;
$.ajax({
       type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/participate_stu/"+value+"/"+clas+"/",  
       data      : {'clas':clas,'section':value},
    success   : function(data){
      $("#winner_student2").html(data);
      }
    });

  }
</script>

<script type="text/javascript">
function sec3(value)
  {
    var clas = document.getElementById('std_class_3').value;
$.ajax({
       type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/participate_stu/"+value+"/"+clas+"/",  
       data      : {'clas':clas,'section':value},
    success   : function(data){
      $("#winner_student3").html(data);
      }
    });

  }
</script>


