<div id="page-wrapper" >
<div class="container-fluid  thourt">
     <p> <b>Thought of the day</b>     :     A man should never neglect his family for business.</p>
  </div>
<div class="container-fluid all_details">
<div class="col-lg-12 margn_set ">
<div class="col-lg-12 border_btm pading_o">
<div id="chart-container"></div>

<table class="table-bordered">
<tr>
  <th>Class</th>
  <th>Section</th>
  <th>Subject</th>
</tr>
<?php  for($jhg=0;$jhg<count($staff_analysis);$jhg++){   ?>
<tr>
  <td><?php echo $staff_analysis[$jhg]['assign_class'];   ?></td>
   <td><?php echo $staff_analysis[$jhg]['assign_section'];   ?></td>
    <td><?php echo $staff_analysis[$jhg]['sub_name'];   ?></td>
</tr>
<?php } ?>
</table>
<div id="chart-container"></div>

<script type="text/javascript">
FusionCharts.ready(function() {
  var salesChart = new FusionCharts({
      type: 'msline',
      renderAt: 'chart-container',
      width: '1000',
      height: '400',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "caption": "Marks Performance",
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
           <?php for($ewrt=0;$ewrt<count($subjj);$ewrt++){ ?>
          {
            "label": <?php echo json_encode($subjj[$ewrt]);  ?>
          }
          <?Php if($ewrt!=count($subjj)-1) { ?>
          , 
          <?php  }  ?>

           <?php } ?>  ]
        }],
        "dataset": [
        {
          "seriesname": ''
          ,
          "data": [
<?php $er=0; for($ewi=0;$ewi<count($average);$ewi++){    ?>
 {  
  <?php   if(!empty($average[$subjj[$ewi]])) {      ?>
  "value": <?php echo json_encode($average[$subjj[$er]]);?>
  <?php   } else {  ?>
  "value": 0
  <?php }  ?>
          }
<?Php if($ewi!=count($average)-1) { ?>
          , 
     <?php  } $er++;  }  ?> ]}, ]
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
            }, 1000);
        }
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
 


 