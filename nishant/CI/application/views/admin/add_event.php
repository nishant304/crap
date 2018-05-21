
<div id="page-wrapper">
     <h2 class="sub_alct_cationn">Add Events</h2>
       <div class="col-lg-12 ">
          <div class="col-lg-12 bordr_rght">
             <?php echo form_open('admission/add_new_event');?>
             <div class="panel panel-default sub_allot_dprtmnt">
               <!-- <div class="panel-heading sub_alcts_agnsh">Add Events</div> -->
                  <div class="panel-body ">
             <div class="col-lg-3 sub_margs_alloc_sltcs">
       <!-- <span id="validate"><?php //echo form_error('event_name');?></span>  -->
                <label class="">Event Name&nbsp;<span class="alloct_sub_strs">*</span></label> 
              <!-- <input type="" class="form-control" name="event_name" placeholder="Event Name"/> -->
              <select class="form-control" name="event_name" placeholder="Event Name">
              <option value="">select name</option>
              <?php foreach ($name_event as $key ){?>
               <option value="<?php echo $key['event_name']?>"><?php echo $key['event_name'];?></option>  
             <?php }?>  
              </select>
              </div>

             <div class="col-lg-3 sub_margs_alloc_sltcs ">
             <label class="">Start Date&nbsp;<span class=" alloct_sub_strs">*</span></label> 
             <input type="date" class="form-control" name="event_date" placeholder="Event Date">
             </div>

            <div class="col-lg-3 sub_margs_alloc_sltcs ">
             <label class="">End Date&nbsp;<span class=" alloct_sub_strs">*</span></label> 
            <input type="date" class="form-control" name="end_date" placeholder="End Date">
            </div>    

             
  <div class="col-lg-3 sub_margs_alloc_sltcs  ">
    <span id="validate"><?php echo form_error('event_start_time');?></span> 
      <label class="">Event Start Timing&nbsp;<span class="alloct_sub_strs ">*</span></label> 
<input type="time" class="form-control" name="event_start_time" placeholder="Event Start Timing">
</div>

                
                  
<div class="col-lg-3 sub_margs_alloc_sltcs  ">
 <span id="validate"><?php echo form_error('event_end_time');?></span> 
<label class="">Event End Timing&nbsp;<span class="alloct_sub_strs ">*</span></label> 
<input type="time" class="form-control" name="event_end_time" placeholder="Event End Timing">
</div>

<div class="col-lg-3  sub_margs_alloc_sltcs ">
 <span id="validate"><?php echo form_error('event_for');?></span> 
<label class="">Event For&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select name="event_for" class="form-control" id="show" onchange="change(this)">
<option value="">Select...</option>
<option value="common_for_all">Common For All</option>
<option value="selected_class">Selected Class</option>
<option value="Class">Class(eg: 1st to 5th)</option>
</select>
</div>

<div  class="col-lg-3  sub_margs_alloc_sltcs " id="text_area" style="display: none;"  >
 <span id="validate"><?php echo form_error('class');?></span> 
<label class="">Select Class&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select class="form-control" name="class" onchange="stu_class(this.value);" >
<option value="">Select...</option>
<?php foreach ($cls_sec['class'] as $key => $value) { ?> 
<option value="<?php echo $value['class_name'];  ?>"><?php echo $value['class_name']; ?></option>
<?php } ?>
</select>
</div>

<div class="col-lg-3  sub_margs_alloc_sltcs " id="sect_tab" style="display: none;">
 <span id="validate"><?php echo form_error('section');?></span> 
<label class="">Section&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select class="form-control" name="section" id="tabbb_section">
    
</select>
</div>

<div class="col-lg-3  sub_margs_alloc_sltcs " id="from" style="display: none;">
<label class="">From Class&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>

<select class="form-control" name="from_class" id="fromm" onchange="abcaa(this.value);">
  <option value="">select class</option>
  <?php foreach ($all_class as $key ) {?>
  <option  value="<?php echo $key['class_name']?>"><?php echo $key['class_name']?></option>
 <?php }?>
</select>
</div>

<div class="col-lg-3  sub_margs_alloc_sltcs " id="to" style="display: none;">
<label class="">To Class&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>

<select class="form-control" name="to_class" id="to_cls">
 
 </select>
</div>

<div class="col-lg-3 sub_margs_alloc_sltcs ">

 <label class="">Event Description&nbsp;<span class=" alloct_sub_strs">*</span></label>
<textarea class="form-control" name="description" placeholder="Description"></textarea> </div>


<div class="col-lg-3  sub_margs_alloc_sltcs ">
 <span id="validate"><?php echo form_error('staff_id');?></span> 
<label class="">Operated By&nbsp;<span class="alloct_sub_strs ">*</span></label> <br>
<select class="form-control" name="staff_id">
            <option value="">Select</option>
            <?php foreach ($teacher as $key) { ?> 
            <option>
            <?php echo $key['stf_fname']." ". $key['stf_lname'];  } ?>
            </option>
</select>
</div>


<div class="col-lg-12 sub_margs_alloc_sltcs">
<center><button type="submit" class="btn btn-primary sub_margs_alloc_sltcs">Submit</button></center>
</div>
</div>
</div>
<?php echo form_close(); ?>
      </div>


<div class=" table-responsive col-lg-12 sub_aloct_seconds">          
 <table class="table table-bordered table-hover">
<thead>
<tr class="info">
 <!-- <th>#</th>  -->
<th>Event Name</th>
<th>Event Start Date</th>
<th>Event END Date</th>
<th>Event Start Time</th>
<th>Event End Time</th>
<th >Description</th>
<th>Operate By</th>
<th colspan="2">Manage</th>


</tr>
</thead>

<tbody>
<?php 

foreach ($event as $key) { ?>
<tr>

<input type=hidden value="<?php echo $key['event_id']; ?>" id="ids<?php echo $key['event_id'];?>">
<td>
  <input type="hidden" value="event_name" id="colm1">
  <input type="text" value="<?php echo $key['event_name'];?>" id="myInputId1<?php echo $key['event_id'];?>" disabled="disabled" name="event_name" onblur="inpt1<?php echo $key['event_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="event_date" id="colm2">
  <input type="text" value="<?php echo $key['event_date'];?>" id="myInputId2<?php echo $key['event_id'];?>" disabled="disabled" name="event_date" onblur="inpt2<?php echo $key['event_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="end_date" id="colm3">
  <input type="text" value="<?php echo $key['end_date']; ?>" id="myInputId3<?php echo $key['event_id'];?>" disabled="disabled" name="end_date" onblur="inpt3<?php echo $key['event_id'];?>(this.value);">
</td>
<td>
   <input type="hidden" value="event_start_time" id="colm4">
  <input type="text" value="<?php echo $key['event_start_time']; ?>" id="myInputId4<?php echo $key['event_id'];?>" disabled="disabled" name="event_start_time" onblur="inpt4<?php echo $key['event_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="event_end_time" id="colm5">
  <input type="text" value="<?php echo $key['event_end_time']; ?>" id="myInputId5<?php echo $key['event_id'];?>" disabled="disabled" name="event_end_time" onblur="inpt5<?php echo $key['event_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="description" id="colm6">
  <input type="text" value="<?php echo $key['description']; ?>" id="myInputId6<?php echo $key['event_id'];?>" disabled="disabled" name="description" onblur="inpt6<?php echo $key['event_id'];?>(this.value);">
</td>
<td>
  <input type="hidden" value="staff_id" id="colm7">
  <input type="text" value="<?php echo $key['staff_id']; ?>" id="myInputId7<?php echo $key['event_id'];?>" disabled="disabled" name="staff_id" onblur="inpt7<?php echo $key['event_id'];?>(this.value);">
</td>
<td>

<a href="<?php echo base_url(); ?>index.php/admission/event_delete/<?php echo $event_id; ?>">Delete</a>
<button type="submit" class="pull-right btn btn-warning" id="toggle_button<?php echo $key['event_id'];?>">Edit</button> 
</td>
</tr>

<script type="text/javascript">
  <?Php for($i=1;$i<=7;$i++){ ?>
 function inpt<?php echo $i;?><?php echo $key['event_id'];?>(value){
 var clom_name = document.getElementById("colm<?php echo $i;?>").value;
 var evnts_id = document.getElementById("ids<?php echo $key['event_id'];?>").value;
  $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/update_event/"+value+"/"+clom_name+"/"+evnts_id+"/" ,
    data    : {'value':value,'col_nam':clom_name,'evt_id':evnts_id
  },
  success : function(data){}
  });
  }
 <?php }  ?>


</script>

<script type="text/javascript">
var toggle_disabled = function(e){
for(var i=1;i<=7;i++){
var input = document.getElementById('myInputId'+ i +'<?php echo $key['event_id'];?>');
input.disabled = !(input.disabled); 
}
};
var button = document.getElementById('toggle_button<?php echo $key['event_id'];?>');
button.addEventListener( 'click', toggle_disabled);
</script>
<?php $i++; }?>
</tbody>  
</table>
    </div>
    </div>
    
  </div>

</script>


<script>
 function change() {
    var selectBox = document.getElementById("show");
    var selected = selectBox.options[selectBox.selectedIndex].value;
   
    if(selected === 'selected_class'){
         $('#from,#to').hide();
         $('#text_area,#sect_tab').css('display', 'block');
       
    }
    else if(selected === 'Class')
    {
     
        $('#from,#to').css('display', 'block');
        $('#text_area,#sect_tab').hide();
    }
 
   else{
        $('#text_area,#sect_tab,#from,#to').hide();
        

    }
}
</script>
