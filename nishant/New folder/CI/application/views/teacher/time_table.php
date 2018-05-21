<?php 
$user_listedd=explode(',',$role_autho[0]['add_time_table']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>



  <div id="page-wrapper">
    <div class="col-lg-12 class_sec ">
   <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>     
<?php 
  $attributes = array('class' => 'frm');
  echo form_open('teacher_controller/time_table', $attributes); ?>
  <?php  }  ?>
    <div class="col-lg-3 col-lg-offset-2">
      <label class="tx1">Class</label>      
      <select name="class_name" class="form-control" id="sel_class" onchange="select_class(this.value);">
      <option value="">select</option>
<?php foreach($all_class as $key){
          $class = $key['class_name'];
          $class1[] = $key['class_name'];
      } 
          $arr = array_unique($class1); 
      foreach ($arr as $key) {  ?>
      <option  <?php  if($dtable_fetch['class_name']==$key){  ?> selected <?php  }  ?>   value="<?Php echo $key;?>"><?Php echo $key; ?></option>
<?php } ?>
      </select>

    </div>

<div class="col-lg-3 col-lg-offset-2">
 <label class="tx1">Section</label>
<select class="form-control" id="selct_section" name="class_section" onchange="select_section(this.value);">
  <option><?php echo  $dtable_fetch['class_section'];?></option>
</select>

</div>
</div>

<div class="container-fluid sec_class">
     <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
  <h2 class="txt">Time Table</h2>         
  <table class="table table table-bordered table-striped table-hover tbl">
    <thead>
      <tr class="heading">
        <th>Start Time</th>
        <th>End Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>

      </tr>
    </thead>
    <tbody>
  
      <tr>

        <td>
          <input  type="text" class="timeheight" value="8:00" name="class_start_time"  id="class_start_time1">
        </td>
       <td>
       <input type="text" class="timeheight" value="9:00" name="class_end_time" onblur="class_end(this.value);"  id="class_end_time1">
       </td>
<?Php 

$day[0]="Monday";
$day[1]="Tuesday";
$day[2]="Wednesday";
$day[3]="Thursday";
$day[4]="Friday";
$day[5]="Saturday";
for($i=0;$i<=5;$i++)  {  ?>
<td>
<input type="hidden" name="day" value="<?Php echo $day[$i];  ?>" id="day<?php echo $i;  ?>" >
        
        <select id="selct_tab<?php echo $i;  ?>" class="form-control" onchange="subject_day<?php echo $i; ?>(this.value);">
      
         <option value="">select</option>
        </select>
        </td>
<script type="text/javascript">
  function subject_day<?php echo $i; ?>(value)
  {  
var clas=document.getElementById("sel_class").value;
var section=document.getElementById("selct_section").value;
var end=document.getElementById("class_end_time1").value;
var start=document.getElementById("class_start_time1").value;
var day=document.getElementById("day<?Php echo $i; ?>").value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/time_table_end/"+value+"/"+clas+"/"+section+"/"+end+"/"+start+"/"+day+"/",  
    data    : {'subject':value,'clas':clas,'section':section,'end':end,'start':start,'day':day
  },
success : function(data){
     alert(data);
    }
});
}
</script>
<?php }  ?>
</tr>
</tbody>
  </table>
  <?Php  }  ?>

<button type="submit" class="btn btn-primary btn_right" name="submit">preview</button>
  </div>

<?php  echo form_close();   ?>
<div class="container-fluid">
  <h2 class="txt">Time Table Preview</h2>         
  <table class="table table table-bordered table-striped table-hover tbl">
    <thead>
      <tr class="heading">
        <th>Start Time</th>
        <th>End Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>

</tr>
</thead>
<tbody>
 
<?php foreach ($table_fetch as $key) {  ?>
<tr>
            <td><?php echo $key['class_start_time']  ;  ?></td>
            <td><?php echo $key['class_end_time']  ;   ?></td>
            <td>  <?php echo $key['monday']  ;   ?></td>
            <td><?php  echo $key['tuesday']  ;  ?></td>
            <td><?php echo $key['wednesday']  ;   ?></td>
            <td><?php echo $key['thursday']  ;   ?></td>
            <td> <?php  echo $key['friday']  ;  ?> </td>
            <td> <?php echo $key['saturday']  ;   ?></td>
</tr>
<?php  }   ?>
</tbody>
  </table>
  </div>
</div>

<?php  }   ?>
<script type="text/javascript">
function select_class(value)
  {
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/time_table_select/"+value+"/",  
    data    : {'class':value
  },
success : function(data){
$("#selct_section").html(data);
    }
    
});
}
</script>
<script type="text/javascript">
function class_end(value){
var clas3=document.getElementById("sel_class").value;
var section3=document.getElementById("selct_section").value;
var class_start=document.getElementById("class_start_time1").value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/time_table_end/"+value+"/",  
    data    : {'end':value,'clas':clas3,'section':section3,'start':class_start
  },
success : function(data){
 }
});
}
function select_section(value)
{
var classs=document.getElementById("sel_class").value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/time_table_subject_fetch/"+value+"/"+classs+"/",  
    data    : {'sec':value,'clas':classs
  },
success : function(data){
for(var i=0;i<=5;i++){
 $("#selct_tab"+i).html(data);
}
 }
});
}
</script>