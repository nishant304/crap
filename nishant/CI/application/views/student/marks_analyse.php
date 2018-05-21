<?php
error_reporting(0);
$selected='selected';
echo form_open('student_controller/marks_analytic');
$std_marks_sess=$this->session->userdata('std_marks_sess');
$std_marks_sess['subject'];
$std_marks_sess['basis_of'];
$exam_type1=$this->session->userdata('exam_type');
$test_type1=$this->session->userdata('test_type');
?>
<div id="page-wrapper">
<center><h1 class="std_log">Marks Analysis</h1></center>
<div class="container atnd_slc tp_marg">

<div class="col-lg-12 ">
<div class="col-lg-10 col-lg-offset-2">
<center>
<div class="col-lg-2">
<label>Subject</label>
<select name="subject" class="slct_main col-lg-12" >
<option value="all">All</option>
<?php foreach ($mark as $key) {
?>
<option   <?php if($key['sub_name']==$std_marks_sess['subject']){   echo $selected; }      ?>  value="<?php echo $key['sub_name'];?>"><?php echo $key['sub_name'];?></option> 
<?php }  ?>
</select>
</div>
<div class="col-lg-2">
<label>Basis Of</label>
<select name="basis_of" class="slct_main col-lg-12 opt" id="opt1">
<option <?php if($std_marks_sess['basis_of']==''){ echo $selected; } ?> value="">Select One</option>
<option <?php if($std_marks_sess['basis_of']=='Daily Basis'){ echo $selected; } ?> value="Daily Basis">Daily Basis</option>
<option <?php if($std_marks_sess['basis_of']=='Exam Basis'){ echo $selected; } ?> value="Exam Basis">Exam Basis</option>
</select>
</div>
<div class="col-lg-2 exam_basis" <?php if(!empty($exam_type1)){   ?> style="display: block;"        <?php        }?>>
<label>Exam Type</label>
<select class="slct_main col-lg-12" name="exam_type" onchange="form_submit();" >
<option <?php if($exam_type1==''){ echo $selected; } ?> value="">Select</option>
<option <?php if($exam_type1=='all') { echo $selected;  }   ?> value="all">All</option>
<option <?php if($exam_type1=='Monthly') { echo $selected;  }   ?> value="Monthly">Monthly</option>
<option <?php if($exam_type1=='Quartly') { echo $selected;  }   ?> value="Quartly">Quartly</option>
<option  <?php if($exam_type1=='Half Yearly') { echo $selected;  }   ?> value="Half Yearly">Half Yearly</option>
<option <?php if($exam_type1=='Annualy') { echo $selected;  }   ?> value="Annualy">Annualy</option>
</select>
</div>
<div class="col-lg-2 daily_basis" <?php if(!empty($test_type1)){ ?> style="display: block;"        <?php }?>>
<label>Test Type</label>
<select class="slct_main col-lg-12 " name="test_type" onchange="form_submit();" >
<option <?php if($test_type1=='select'){ echo $selected; } ?> value="select">Select</option>
<option <?php if($test_type1=='all') { echo $selected;  }   ?> value="all">All</option>
<option <?php if($test_type1=='Daily Basis') { echo $selected;  }   ?> value="Daily Basis">Daily Basis</option>
<option <?php if($test_type1=='Surprise') { echo $selected;  }   ?> value="Surprise">Surprise</option>
</select>
</div>
<div class='col-lg-2'>
<label>Month</label>
<select name="month" class="slct_main col-lg-12" onchange="form_submit();">
  <option <?php if($std_marks_sess['month']=='all'){ echo $selected;   } ?> value='all'>All</option>
  <option <?php if($std_marks_sess['month']=='1'){ echo $selected;   } ?> value='1'>January</option>
  <option <?php if($std_marks_sess['month']=='2'){ echo $selected;   } ?> value='2'>Febuary</option>
  <option <?php if($std_marks_sess['month']=='3'){ echo $selected;   } ?> value='3'>March</option>
  <option <?php if($std_marks_sess['month']=='4'){ echo $selected;   } ?> value='4'>April</option>
  <option <?php if($std_marks_sess['month']=='5'){ echo $selected;   } ?>  value='5'>May</option>
  <option <?php if($std_marks_sess['month']=='6'){ echo $selected;   } ?> value='6'>June</option>
  <option <?php if($std_marks_sess['month']=='7'){ echo $selected;   } ?> value='7'>July</option>
  <option <?php if($std_marks_sess['month']=='8'){ echo $selected;   } ?> value='8'>August</option>
  <option <?php if($std_marks_sess['month']=='9'){ echo $selected;   } ?> value='9'>September</option>
  <option <?php if($std_marks_sess['month']=='10'){ echo $selected;   } ?> value='10'>October</option>
  <option <?php if($std_marks_sess['month']=='11'){ echo $selected;   } ?> value='11'>November</option>
  <option <?php if($std_marks_sess['month']=='12'){ echo $selected;   } ?> value='12'>December</option>
</select>
</div>

<div class='col-lg-2'>
<label>Year</label>
<select name="year" class="slct_main col-lg-12" onchange="form_submit();">

<option <?php if($std_marks_sess['year']=='2017'){ echo $selected;   } ?> value='2017'>2017</option>
<option <?php if($std_marks_sess['year']=='2018'){ echo $selected;   } ?> value='2018'>2018</option>
<option <?php if($std_marks_sess['year']=='2019'){ echo $selected;   } ?> value='2019'>2019</option>
<option <?php if($std_marks_sess['year']=='2020'){ echo $selected;   } ?> value='2020'>2020</option>
<option <?php if($std_marks_sess['year']=='2021'){ echo $selected;   } ?> value='2021'>2021</option>
<option <?php if($std_marks_sess['year']=='2022'){ echo $selected;   } ?> value='2022'>2022</option>
</select>
</div>





<input type="submit" name="submit" value="submit" id='submitty'>  
</center>
</div>
</div>
<?php
$total_mark=$this->session->userdata('total_mark');
$own_mark=$this->session->userdata('own_mark');
$max_min_mark=$this->session->userdata('max_min_mark');
?>
</div>
<div class="table-responsive">
<table class="table" border="2" id="t01">
<tr>
<th>DATE</th>
  <th>SUBJECT</th>
  <?php if($std_marks_sess['basis_of']=='Exam Basis'){?>
  <th>EXAM TYPE</th>
  <?php  } else {  ?>
 <th>TEST TYPE</th>
  <th>TOPICS</th>
  <?php  }  ?>
<th>YOUR MARKS</th>
  <th>OUT OF</th>
  <th>PERCENTAGE(%)</th>
   <th>CLASS MAX</th>
  <th>CLASS MIN</th>
  <th>CLASS AVG</th>
  </tr>
 <?php  $j=0;  foreach ($own_mark as $key) { ?>
<tr>
<td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>><?php echo $key['batch'];   ?></td>
<td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>><?php echo $key['subject'];     
$sub[] = $key['subject'];

  ?></td>
<?php if($std_marks_sess['basis_of']=='Exam Basis'){?>
<td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>><?php echo $key['exam_type'];   ?></td>
<?php  }
  else{
?><td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>><?php echo $key['test_type'];   ?></td>
<td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>><?php echo $key['description'];   ?></td>
<?php   } ?>
<td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>><?php echo $key['marks_obtain'];   ?></td>
<td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>><?php echo $key['max_mark'];   ?></td>
<td <?php if(round($key['marks_obtain']*100/$key['max_mark'])<50){ ?>
 class="tab_red" 
  <?php }
   elseif(round($key['marks_obtain']*100/$key['max_mark'])<75 && round($key['marks_obtain']*100/$key['max_mark'])>50){
    ?>  class="tab_blue" 
    <?php }
elseif(round($key['marks_obtain']*100/$key['max_mark'])>75){   ?>
 class="tab_green"  <?php  }  ?>
 > <?php echo round($key['marks_obtain']*100/$key['max_mark']);
$per[] =round($key['marks_obtain']*100/$key['max_mark']);


 ?></td>
<td
<?php if($max_min_mark[$j][0]['max_marks']<50){ ?>
 class="tab_red" 
  <?php }
   elseif($max_min_mark[$j][0]['max_marks']<75 && $max_min_mark[$j][0]['max_marks']>50){
    ?>  class="tab_blue" 
    <?php }
elseif($max_min_mark[$j][0]['max_marks']>75){   ?>
 class="tab_green"  <?php  }  ?>
><?php print_r($max_min_mark[$j][0]['max_marks']); 
$max[] =round($max_min_mark[$j][0]['max_marks']);

 ?></td>
<td
<?php if($max_min_mark[$j][0]['min_marks']<50){ ?>
 class="tab_red" 
  <?php }
   elseif($max_min_mark[$j][0]['min_marks']<75 && $max_min_mark[$j][0]['min_marks']>50){
    ?>  class="tab_blue" 
    <?php }
elseif($max_min_mark[$j][0]['min_marks']>75){   ?>
 class="tab_green"  <?php  }  ?>
><?php print_r($max_min_mark[$j][0]['min_marks']);
$min[] =round($max_min_mark[$j][0]['min_marks']);
 ?></td>
<td
<?php if($max_min_mark[$j][0]['avg_marks']<50){ ?>
 class="tab_red" 
  <?php }
   elseif($max_min_mark[$j][0]['avg_marks']<75 && $max_min_mark[$j][0]['avg_marks']>50){
    ?>  class="tab_blue" 
    <?php }
elseif($max_min_mark[$j][0]['avg_marks']>75){   ?>
 class="tab_green"  <?php  }  ?>>
 <?php print_r($max_min_mark[$j][0]['avg_marks']);  
$avg[] =round($max_min_mark[$j][0]['avg_marks']);
 ?>
   
 </td>
</tr>
<?php $j++;
 }  ?>
<tr>
 <?php if($std_marks_sess['basis_of']=='Exam Basis'){?>
   <th colspan="3">TOTAL MARKS</th>
  
 <?php } else {  ?>
  <th colspan="4">TOTAL MARKS</th>
 
<?php }  ?>
  <th><?Php echo $total_mark[0]['total_marks_obtained']; ?></th>
  <th><?php echo $total_mark[0]['total_marks']; ?></th>
 <th colspan="4"> </th>
</tr>
<tr>
<?php if($std_marks_sess['basis_of']=='Exam Basis'){?>
<th colspan="5">PERCENTAGE</th>
<?php } else {  ?>
<th colspan="6">PERCENTAGE</th>
<?php }  ?>
<th colspan="1" ><?php echo round($total_mark[0]['percentage']);
$per1=round($total_mark[0]['percentage']);
?> %</th>
 <th colspan="3"> </th>
</tr>
</table>
</div>
ss
<script type="text/javascript">
  window.onload = function () {

     var sub_per = <?php echo json_encode($per) ?>;
     var max = <?php echo json_encode($max) ?>;
     var min = <?php echo json_encode($min) ?>;
     var avg = <?php echo json_encode($avg) ?>;
     var sub = <?php echo json_encode($sub) ?>;
   
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
      text: "Analysis Your Position"  
      },
      data: [
      {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[0] },
        { x: 20, label: "Your Marks", y: sub_per[0] , indexLabel: sub[0],markerColor: "DarkSlateGrey", markerType: "cross"  },
        { x: 30, label: "Class Avg", y:  avg[0]},
        { x: 40, label: "Class Max", y: max[0] }
       
      
        ]
      },

        {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[1] },
        { x: 20,label: "Your Marks", y: sub_per[1], indexLabel: sub[1],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[1]},
        { x: 40, label: "Class Max", y: max[1]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[2] },
        { x: 20,label: "Your Marks", y: sub_per[2] , indexLabel: sub[2],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[2]},
        { x: 40, label: "Class Max", y: max[2]}
                     ]
      },
        {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[3] },
        { x: 20,label: "Your Marks", y: sub_per[3] , indexLabel: sub[3],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[3]},
        { x: 40, label: "Class Max", y: max[3]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[4] },
        { x: 20,label: "Your Marks", y: sub_per[4] , indexLabel: sub[4],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[4]},
        { x: 40, label: "Class Max", y: max[4]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[5] },
        { x: 20,label: "Your Marks", y: sub_per[5] , indexLabel:sub[5],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[5]},
        { x: 40, label: "Class Max", y: max[5]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[6] },
        { x: 20,label: "Your Marks", y: sub_per[6] , indexLabel: sub[6],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[6]},
        { x: 40, label: "Class Max", y: max[6]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[7] },
        { x: 20,label: "Your Marks", y: sub_per[7] , indexLabel: sub[7],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[7]},
        { x: 40, label: "Class Max", y: max[7]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[8] },
        { x: 20,label: "Your Marks", y: sub_per[8] , indexLabel: sub[8],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[8]},
        { x: 40, label: "Class Max", y: max[8]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[9] },
        { x: 20,label: "Your Marks", y: sub_per[9] , indexLabel: sub[9],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[9]},
        { x: 40, label: "Class Max", y: max[9]}
                     ]
      },
  {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[10] },
        { x: 20,label: "Your Marks", y: sub_per[10] , indexLabel: sub[10],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[10]}, 
        { x: 40, label: "Class Max", y: max[10]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[11] },
        { x: 20,label: "Your Marks", y: sub_per[11] , indexLabel: sub[11],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[11]},
        { x: 40, label: "Class Max", y: max[11]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[12] },
        { x: 20,label: "Your Marks", y: sub_per[12] , indexLabel: sub[12],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[12]},
        { x: 40, label: "Class Max", y: max[12]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[13] },
        { x: 20,label: "Your Marks", y: sub_per[13] , indexLabel: sub[13],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[13]},
        { x: 40, label: "Class Max", y: max[13]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[14] },
        { x: 20,label: "Your Marks", y: sub_per[14] , indexLabel: sub[14],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[14]},
        { x: 40, label: "Class Max", y: max[14]}
                     ]
      },
       {        
        type: "line",
        dataPoints: [
        { x: 10, label: "Class Min", y: min[15] },
        { x: 20,label: "Your Marks", y: sub_per[15] , indexLabel: sub[15],markerColor: "DarkSlateGrey", markerType: "cross" },
        { x: 30,label: "Class Avg", y:avg[15]},
        { x: 40, label: "Class Max", y: max[15]}
                     ]
      }
       
       
      ]
    });

    chart.render();
  }
  </script>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>

<div class="example-box">
        <div class="example__headline">
            <h2>Marks percentage on the basis of searching</h2>
        </div>
        <div id="chart-1"></div>
    </div>
 
</div>
<?php 
array_push($sub,"Total");  
array_push($per,$per1);  
 ?>
<script type="text/javascript">
  var sub_obj = <?php echo json_encode($sub) ?>;
  var sub_per = <?php echo json_encode($per) ?>;

</script>
<?php 

 echo form_close();  ?>
<script type="text/javascript">
function form_submit()
{
  $('form').find('input[type="submit"]').trigger('click');
}
</script>
<script>
$('#opt1').change(function(){
if($('#opt1').val() == 'Daily Basis') {
$('.daily_basis').show();  
$('.exam_basis').hide();     
} 
else {
$('.daily_basis').hide();  
$('.exam_basis').show();  
} 
});
</script>
