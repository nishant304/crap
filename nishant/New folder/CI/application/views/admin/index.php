<?php 
$all_data = $this->session->userdata(); 
$number_of_student = $all_data['all_rows'][0];
$number_of_staff = $all_data['all_rows'][1];
$number_of_parent = $all_data['all_rows'][2];
?>
<div id="page-wrapper" >


  <div class="container-fluid  thourt">
     <p> <b>Thought of the day</b>:A man should never neglect his family for business.</p>
  </div>

  <div class="container-fluid  tabs_show">
     <a href="<?php echo base_url(); ?>index.php/admission/user_listed/student"><div class="col-lg-2 show_tchr">
      <div class="col-lg-8 padding_right">
          <i class="fa fa-briefcase fa-4x" aria-hidden="true"></i>
      <h5>Students </h5>

      <!-- <h4>Active Students:2</h4> -->
      </div></a>

      <div class="col-lg-4 show_tchr1">
        <h1 class="show_totl"><?php echo $number_of_student; ?></h1>
      </div>
    </div>

     <a href="<?php echo base_url(); ?>index.php/admission/user_listed/teacher"><div class="col-lg-2  show_std">
      <div class="col-lg-8 padding_right">
            <i class="fa fa-users fa-4x" aria-hidden="true"></i>
        <h5> Teachers</h5>

        <!-- <h4>Active Teachers:1</h4> -->
      </div>
      
      <div class="col-lg-4 show_tchr2">
        <h1 class="show_totl"><?php echo $number_of_staff; ?></h1>
      </div>
    </div></a>
 <a href="<?php echo base_url(); ?>index.php/admission/user_listed/parent">
    <div class="col-lg-2 show_parnt">
      <div class="col-lg-8 padding_right">
      <i class="fa fa-user-plus fa-4x" aria-hidden="true"></i>
      <h5> Parents</h5>

       <!-- <h4>Active Parents:12</h4> -->
      </div>
      
      <div class="col-lg-4 show_tchr3">
        <h1 class="show_totl"><?php echo $number_of_parent; ?></h1>
      </div>
    </div></a>

    <div class="col-lg-2 show_cors">
      <div class="col-lg-8 padding_right">
      <i class="fa fa-file-text-o fa-4x" aria-hidden="true"></i>
      <h5> Courses</h5>
      </div>
      
      <div class="col-lg-4 show_tchr4">
        <h1 class="show_totl">4</h1>
      </div>
    </div>

  </div>

  <div class="container-fluid all_details">
    <div class="col-lg-12 margn_set ">

<div class="col-lg-12 border_btm pading_o">

  <div class="col-lg-2">
<select class="form-control" name="user_type" id='type'>
<option>select..</option>
<option>Student</option>
<option>Teacher</option>
</select> 
  </div>
<div id='row_dim'>
<div class="col-lg-2">
<select class="form-control" name="class_id" onchange="stu_class(this.value);" id="std_classs">
<option>select..</option>
<?Php foreach($class as $key) {  ?>
<option  ><?php echo  $key['class_name'];  ?></option>
<?php }  ?>
</select> 
  </div>
<div class="col-lg-2">
<select class="form-control" name="class_section" id="tabbb_section"  onchange="student_section(this.value);">
</select> 
  </div>

   <div class="col-lg-2 val_hid1">
<select class="form-control" id="tabbb1" name="subject" onchange="student_sub(this.value);">
</select> 
  </div>

    <div class="col-lg-2 val_hid2">
<select class="form-control" id="tabbb232" name="exam_data" onchange="student_month(this.value);">
  <option value="">Select</option>
  <?php for($yi=1;$yi<=12;$yi++){    
  if($yi<10){   ?>
<option value="<?php  echo '0'.$yi;  ?>"><?php  echo '0'.$yi;  ?></option>
<?php } 
else
{ ?>
<option value="<?php  echo $yi;  ?>"><?php  echo $yi;  ?></option>  
<?php }
} ?>

</select> 
  </div>

 <div class="col-lg-2 val_hid2">
<select class="form-control" name="exam_year" id="tabbb231" class="slct_main col-lg-12" onchange="student_month(this.value);">
   <option value="">Select</option>
  <option value="2017">2017</option>
   <option value="2018">2018</option>
    <option value="2019">2019</option>
     <option value="2020">2020</option>
      <option value="2021">2021</option>
</select> 
  </div>
</div> 
<div id='row_tim'>
<div class="col-lg-2"> 
<select class="form-control" name="designation" onchange="stff_desg(this.value);">
<option>select..</option>
<?php foreach ($stff_fetch as $key) {  ?>
<option value="<?php echo $key['stf_id'];   ?>"><?php echo $key['stf_fname'];   ?></option>
<?php }   ?>

</select>
</div>
</div>

<div id="chart-container"></div>


<script type="text/javascript">
FusionCharts.ready(function() {
  var salesChart = new FusionCharts({
      type: 'msline',
      renderAt: 'chart-container',
      width: '1000',
      height: '500',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "caption": "Subjectwise Performance",
          "subcaption": "",
          "linethickness": "5",
          "numberPrefix": "",
          "showvalues": "0",
          "formatnumberscale": "1",
          "labeldisplay": "ROTATE",
          "slantlabels": "1",
          "divLineAlpha": "40",
          "anchoralpha": "0",
          "animation": "1",
          "legendborderalpha": "20",
          "drawCrossLine": "1",
          "crossLineColor": "#0d0d0d",
          "crossLineAlpha": "100",
          "tooltipGrayOutColor": "#80bfff",
          "theme": "zune"
        },
        "categories": [{
          "category": [
          <?php for($er=0;$er<count($grop_subj);$er++) { ?>
          {
          "label": <?php echo  json_encode($grop_subj[$er]['subject']);  ?>
          }
          <?php if($er!=count($grop_subj)-1){?>
           ,
          <?php  } }  ?>
          ]
        }],
        "dataset": [{
          "seriesname": "School",
          "data": [
          <?php for($ero=0;$ero<count($grop_subj_per);$ero++) { ?>
          {
            "value": <?php echo  json_encode($grop_subj_per[$grop_subj[$ero]['subject']][0]['marks']);  ?>
          }
           <?php if($ero!=count($grop_subj)-1){?>
              ,
          <?php  } }  ?>
          ]
        }]
      }
    })
    .render();
});
</script>

</div>


</div>
 <center><div id="loading"></div></center>
    <div class="col-lg-12" id="fff"></div>
  </div>

    
  <div class="container-fluid cald_notic">
    <div class="col-lg-9 calender_show ">
    
      <div id='calendar'></div>

        <div class="col-lg-12 time_tbl_show">
         <div class="col-lg-2"> 
          <select class="form-control" id="type1"  class="slct_main col-lg-12" >
           <option>Select</option>
            <option>Class</option>
            <option>Staff</option>
          </select>
        </div>
     <div id='row_dimo'>
        <div class="col-lg-2"> 
         <select class="form-control"  id="std_classsss" class="slct_main col-lg-12" onchange="stu_classes(this.value);">
           <option>select..</option>
          <?Php foreach($class as $key) {  ?>
        <option><?php echo  $key['class_name'];  ?></option>
     <?php }  ?>
  </select>
</div>
<div class="col-lg-2"> 
          <select class="form-control" id="fff1"  class="slct_main col-lg-12" onchange="fet_cls_tim(this.value);" >
            <option></option>
          </select>
        </div>
      </div>
        <div id='row_timo'>
     <div class="col-lg-2"> 
     <select class="form-control"  class="slct_main col-lg-12" onchange="staff_timr(this.value);">
            <option>select..</option>
            <?php foreach ($stff_fetch as $key) {  ?>
            <option value="<?php echo $key['stf_id'];   ?>"><?php echo $key['stf_fname'];   ?></option>
            <?php }   ?>
    </select>
    </div>
    </div>
    </div>
        <center><h3 style="padding: 10px;">Teachers Timing</h3></center>
        <table class="table table-bordered" style="margin-bottom: 0px;" id='hhhh'>
        
        </table>
      
    </div>



    <div class="col-lg-3 ">
       <div class="col-lg-12 notic_show pading_o">
        <div class="panel panel-default">
          <div class="panel-heading">Current Notice</div>
          <div class="panel-body">
           <marquee direction="up" scrolldelay="200" >
            <button class="btn btn-primary notic_all">Event</button>
            <button class="btn btn-primary notic_all">parent</button>
            <button class="btn btn-primary notic_all">student</button>
            <button class="btn btn-primary notic_all">parent</button>
            <button class="btn btn-primary notic_all">student</button>
           </marquee>
            
          </div>
        </div>
         </div>

       <div class="col-lg-12 notic_show pading_o">
       <div class="panel panel-default">
         <div class="panel-heading">To do</div>
          <div class="panel-body">
               <div class="col-lg-12 pading_o">
                <input class="form-control" type="" placeholder="Subject" name="">
               </div>
                <div class="col-lg-12 todo_set">
                <textarea class="form-control" type="" placeholder="What's on your mind" name=""></textarea>
               </div>
               <div class="col-lg-12 todo_set">
                <input class="form-control" type="date" name="">
               </div>
               <div class="col-lg-12 todo_set">
                <button class="btn add_todo">Add</button>
               </div>

          </div>
       </div>
       </div>

       <div class="col-lg-12 notic_show pading_o">
       <div class="panel panel-default">
         <div class="panel-heading">To do List</div>
          <div class="panel-body show_list">
            <div class="alert alert-info alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               This alert box could indicate .
            </div>

             <div class="alert alert-info alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               This alert box could indicate .
            </div>

            <div class="alert alert-info alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               This alert box could indicate .
            </div>

          </div>
       </div>
       </div>

    </div>



  </div>



</div>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
  }
  .left { float: left }
  .right { float: right }
  .clear { clear: both }

  #script-warning, #loading { display: none }
  #script-warning { font-weight: bold; color: red }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }

  .tzo {
    color: #000;
  }

</style>


<script type="text/javascript">
function student_section(value)
{
var classs=document.getElementById('std_classs').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record/"+value+"/"+classs+"/",  
    data    : {'secc':value,'clss':classs},
    success : function(data)
    {
      
       $("#tabbb").html(data);
       if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
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

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_xam_typp/"+value+"/"+classs+"/",  
    data    : {'section':value,'classs':classs},
    success : function(data){
       
        $("#tabbb1").html(data);
        if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
    
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://api.github.com/users/jveldboom",
        success: function (d) {
           
            setTimeout(function () {
                $('#loading').html('<img src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif"');
            }, 1000); }
    });
  } 
  }
});
}   
</script>


<script type="text/javascript">
function staff_timr(value)
{

 $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/staff_timr/"+value+"/",  
    data    : {'staff_timr':value},
   
   
success : function(data)
{
alert(data);
console.log(data);
// $("#fff").html(data);
}
});

}
function student_sub(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_exam_typee/"+value+"/"+classs+"/"+Section+"/",  
    data    : {'sub':value,'clss':classs,'secc':Section},
    success : function(data){
     
        $("#to").html(data);
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



<script type="text/javascript">
function student_month12(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
var type=document.getElementById('tabbb1').value;
var yearr=document.getElementById('tabbb231').value;



$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/student_month/"+value+"/"+classs+"/"+Section+"/"+type+"/",  
    data    : {'monthe':value,'clss':classs,'secc':Section,'type':type},
    success : function(data){
  
        $("#tabbb23").html(data);
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







<script type="text/javascript">
function student_exam_type(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
var sub=document.getElementById('tabbb1').value;
var xam=document.getElementById('tabbb23').value;
$.ajax({  
       type    : "POST",
       url     : "<?php echo base_url();?>index.php/admission/class_record_exam_date/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/",  
        data    : {'sub':value,'clss':classs,'secc':Section,'sub':sub,'xam':xam},
        success : function(data){
       
        $("#tabbb231").html(data);
        if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
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
<script type="text/javascript">
function student_month(value)
{
var classs=document.getElementById('std_classs').value;
var Section=document.getElementById('tabbb_section').value;
var xamm=document.getElementById('tabbb1').value;
var mon=document.getElementById('tabbb232').value;
var dat=document.getElementById('tabbb231').value;


$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_exam_idd/"+classs+"/"+Section+"/"+mon+"/"+xamm+"/"+dat+"/",  
    data    : {'clss':classs,'secc':Section,'mon':mon,'xam':xamm,'dat':dat},
   
   
success : function(data)
{


 $("#fff").html(data);
}
});

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record/"+value+"/"+classs+"/"+Section+"/"+sub+"/"+xam+"/"+dat+"/",  
    data    : {'xam_date':value,'clss':classs,'secc':Section,'sub':sub,'xam':xam,'dat':dat
  },
    success : function(data){

  
   
  }
  });
} 
</script>

<script type="text/javascript">
$(function() {
    $('#row_dim').hide(); 
    $('#row_tim').hide(); 
    
    $('#type').change(function(){
        if($('#type').val() == 'Student') {
            $('#row_dim').show();
        } else {
            $('#row_dim').hide(); 
        } 
         if($('#type').val() == 'Teacher') {
            $('#row_tim').show();
        } else { 
            $('#row_tim').hide();
        } 
    });
});


function stff_desg(value)
{

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/staff_analysis/"+value+"/",  
    data    : {'staff_analysis':value
  },
success : function(data)
{
  console.log(data);
   $("#fff").html(data);

}
});
}
function stu_classes(value)
{
  $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_section/"+value+"/",  
    data    : {'uristring':value
  },
success : function(data)
{
  console.log(data);
   $("#fff1").html(data);

}
});
}

function fet_cls_tim(value)
{
  var classs=document.getElementById('std_classsss').value;
   $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/fet_cls_tim/"+value+"/"+classs+"/",  
    data    : {'uristring':value,'clsd':classs
  },
success : function(data)
{
  console.log(data);
   $("#hhhh").html(data);

}
});
}



$(function() {
    $('#row_dimo').hide(); 
    $('#row_timo').hide(); 
    
    $('#type1').change(function(){
        if($('#type1').val() == 'Class') {
            $('#row_dimo').show();
        } else {
            $('#row_dimo').hide(); 
        } 
         if($('#type1').val() == 'Staff') {
            $('#row_timo').show();
        } else { 
            $('#row_timo').hide();
        } 
    });
});

</script>
 


   <!-- bday form start -->
<!-- <div class="panel panel-default sch_frm">
    <div class="panel-heading sch_frmmss"><h2><img src="http://localhost/CI/application/assets/images/happybday.ico">Today Our School's Student Birthday</h2></div>
    <div class="panel-body sch_frm_tble">
      <div class="col-lg-12 padding-o">
        <table class="table table-responsive table-bordered table-hover">
         <thead>
         <tr class="colr">
              <th>Image</th>
         <th>Name</th>
         <th>Class</th>
         <th>Section</th>
         <th>Birthday</th>
         <th>Age</th>
         </tr>
         </thead>
         <tbody>
    <?php foreach ($dob as $key => $value) {
    $date_db = $value['std_dob'];
$date_db1 = date_parse_from_format("Y-m-d", $date_db);
    $date_db1["day"];
    $date_db1["month"];
    $date_db1["year"];

    $date = date('Y-m-d');
    $date_slct = date_parse_from_format("Y-m-d", $date);
    $date_slct["day"];
    $date_slct["month"];
    $date_slct["year"];
    $age = $date_slct["year"] - $date_db1["year"];
  if($date_db1["day"] == $date_slct["day"] && $date_db1["month"] == $date_slct["month"] )
  {

$photo='<img src="http://localhost/CI/application/assets/uploads/'.$value['std_image'].'"/>';
$photo1='<img src="http://localhost/CI/application/assets/images/default_image.jpg"/>';
 ?>
<tr>
          <td><?php if($value['std_image'] == ''){ echo $photo1; } else{ echo $photo; } ?></td>
<td><?php echo $value['std_fname']." ".$value['std_lname']; ?></td>
<td><?php echo $value['std_class']; ?></td>
<td><?php echo $value['std_section']; ?></td>
<td><?php echo "Happy Birthday"." ".$value['std_fname']." ".$value['std_lname']; ?></td>
<td><?php echo $age; ?></td>
</tr>
<?php } }?>
         </tbody>
        </table>
      </div>  
    </div>
</div> -->
<!-- bday form end -->
         <!-- <div class="chart">
            <center><h3>Technical Skills</h3></center>
            <table id="data-table" border="1" cellpadding="10" cellspacing="0"
            summary="Percentage of knowledge acquired during my experience
            for each technology or language.">
               <thead>
                  <tr>
                     <td>&nbsp;</td>
                     <th scope="col"></th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row">MATHS</th>
                     <td>99</td>
                  </tr>
                  <tr>
                     <th scope="row">ENGLISH</th>
                     <td>90</td>
                  </tr>
                  <tr>
                     <th scope="row">HINDI</th>
                     <td>70</td>
                  </tr>
                  <tr>
                     <th scope="row">SCIENCE</th>
                     <td>60</td>
                  </tr>
                  <tr>
                     <th scope="row">GK</th>
                     <td>85</td>
                  </tr>
                  <tr>
                     <th scope="row">SST</th>
                     <td>60</td>
                  </tr>
                  <tr>
                     <th scope="row">SOCIAL</th>
                     <td>50</td>
                  </tr>
                  <tr>
                     <th scope="row">MySQL</th>
                     <td>60</td>
                  </tr>
                  <tr>
                     <th scope="row">ddd</th>
                     <td>90</td>
                  </tr>
                  <tr>
                     <th scope="row">yyy</th>
                     <td>66</td>
                  </tr>
                  <tr>
                     <th scope="row">xxx</th>
                     <td>55</td>
                  </tr>
                   <tr>
                     <th scope="row">ccc</th>
                     <td>30</td>
                  </tr>
                   <tr>
                     <th scope="row">ttt</th>
                     <td>100</td>
                  </tr>



               </tbody>
            </table>
         </div>
 -->