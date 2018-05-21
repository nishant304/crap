<body>
  <div id="page-wrapper">
    <div class="col-lg-12 class_sec ">
<?php 
  $attributes = array('class' => 'frm');
  echo form_open('teacher_controller/time_table', $attributes); ?>
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
      <option value="<?Php echo $key;?>"><?Php echo $key; ?></option>
<?php } ?>
      </select>

    </div>

<div class="col-lg-3 col-lg-offset-2">
 <label class="tx1">Section</label>
<select class="form-control" id="sel_section" name="class_section" onchange="select_section(this.value);">
                <option value="">select</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
</select>

</div>
</div>

<div class="container sec_class">
  <h2 class="txt">Time Table</h2>  
  <center><div id="loading"></div></center>       
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
var section=document.getElementById("sel_section").value;
var end=document.getElementById("class_end_time1").value;
var start=document.getElementById("class_start_time1").value;
var day=document.getElementById("day<?Php echo $i; ?>").value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/time_table_end/"+value+"/"+clas+"/"+section+"/"+end+"/"+start+"/"+day+"/",  
    data    : {'subject':value,'clas':clas,'section':section,'end':end,'start':start,'day':day
  },
success : function(data){
    if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    // run ajax request
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
            }, 1000);
        }
    });



}
    }
});
}
</script>
<?php }  ?>
</tr>
</tbody>
  </table>
  </div>
<button type="submit" class="btn_right" name="submit">preview</button>

<?php  echo form_close();   ?>
<div class="container">
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
            <?php $class2 = $key['class']; ?>
            <?php $section2 = $key['class_section']; ?>

            <td><?php echo $key['class_start_time']; ?></td>
            <td><?php echo $key['class_end_time']; ?></td>
            <td><?php echo $key['monday'];  ?></td>
            <td><?php echo $key['tuesday']; ?></td>
            <td><?php echo $key['wednesday']; ?></td>
            <td><?php echo $key['thursday']; ?></td>
            <td><?php echo $key['friday']; ?> </td>
            <td><?php echo $key['saturday']; ?></td>
</tr>
<?php  }   ?>

</tbody>
  </table>
  <?php if($class2 != '') { ?> 
<h3>Class:<?php echo $class2; ?></h3>
<h3>Section:<?php echo $section2; ?></h3>
  <?php } ?>
  </div>
</div>
<script type="text/javascript">
  function select_class(value)
  {
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/time_table_select/"+value+"/",  
    data    : {'class':value
  },
   success : function(data){
  if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    // run ajax request
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
            }, 1000);
        }
    });



}
      for(i=0;i<=5;i++)
      {

 $("#selct_tab"+i).html(data);
 }

    }
    
});
}
</script>
<script type="text/javascript">
   function class_end(value){

var clas3=document.getElementById("sel_class").value;

    var section3=document.getElementById("sel_section").value;


 var class_start=document.getElementById("class_start_time1").value;

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/time_table_end/"+value+"/",  
    data    : {'end':value,'clas':clas3,'section':section3,'start':class_start
  },
success : function(data){
  if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    // run ajax request
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
            }, 1000);
        }
    });



}
 }
});
}
</script>