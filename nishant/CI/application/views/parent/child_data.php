  <?php error_reporting(0); ?>
 <div id="page-wrapper" class="child_data">
  <h2 class="in_dxx_dltss">All Details</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" class="in_dxx_hrf">Result</a></li>
    <li><a data-toggle="tab" href="#menu1" class="in_dxx_hrf">Attendance</a></li>
    <li><a data-toggle="tab" href="#menu2" class="in_dxx_hrf">Exam Schedule</a></li>
    <li><a data-toggle="tab" href="#menu3" class="in_dxx_hrf">Test</a></li>
    <li><a data-toggle="tab" href="#menu4" class="in_dxx_hrf">Time Table</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

<?php

$std_marks_id = $this->session->userdata('std1_array');
$selected='selected';
$ids = $this->uri->segment(3);
$id = $this->session->userdata('ids');
echo form_open('parent_controller/marks_analytic/'.$ids);
$std_marks_sess=$this->session->userdata('std_marks_sess1');
$std_marks_sess['subject'];
$std_marks_sess['basis_of'];
$exam_type1=$this->session->userdata('exam_type1');
$test_type1=$this->session->userdata('test_type1');
?>
<input type="hidden" name="std_id" value="<?php echo $std_marks_id[0]['std_id']; ?>">
<!-- <center><h1 class="std_log">Marks Analysis</h1></center> -->
<div class="container-fluid atnd_slc tp_marg">

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
<div class="col-lg-2 exam_basis" <?php if(!empty($exam_type1)){   ?> style="display: block;"        <?php }?>>



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
$total_mark=$this->session->userdata('total_mark1');
$own_mark=$this->session->userdata('own_mark1');
$max_min_mark=$this->session->userdata('max_min_mark1');
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
<td><?php echo $key['batch'];   ?></td>
<td><?php echo $key['subject'];     
$sub[] = $key['subject'];

  ?></td>
<?php if($std_marks_sess['basis_of']=='Exam Basis'){?>
<td><?php echo $key['exam_type'];   ?></td>
<?php  }
  else{
?><td><?php echo $key['test_type'];   ?></td>
<td><?php echo $key['description'];   ?></td>
<?php   } ?>
<td><?php echo $key['marks_obtain'];   ?></td>
<td><?php echo $key['max_mark'];   ?></td>
<td><?php echo round($key['marks_obtain']*100/$key['max_mark']);
$per[] =round($key['marks_obtain']*100/$key['max_mark']);


 ?></td>
<td><?php print_r($max_min_mark[$j][0]['max_marks']);  ?></td>
<td><?php print_r($max_min_mark[$j][0]['min_marks']); ?></td>
<td><?php print_r($max_min_mark[$j][0]['avg_marks']);  ?></td>
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
<th colspan="1"><?php echo round($total_mark[0]['percentage']);
$per1=round($total_mark[0]['percentage']);
?> %</th>
 <th colspan="3"> </th>
</tr>
</table>
</div>
<div class="example-box">
        <div class="example__headline">
            <h2>Marks percentage on the basis of searching</h2>
        </div>
        <div id="chart-1"></div>
    </div>
  <div id="piechart"></div>
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
<?php 
// Database credentials
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'school_project';

// Create connection and select db
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get data from database
$stuu=$this->session->userdata('std_array');
 $std_class=$stuu['data'][0]['std_class'];
 $std_section=$stuu['data'][0]['std_section'];
  $std_id=$stuu['data'][0]['std_id'];
$result = $db->query("SELECT sum(marks_obtain)*100/sum(max_mark) as sun_percentage,subject FROM `student_marks` WHERE std_id=$std_id group by subject order by sun_percentage desc");
?>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['subject']."', ".$row['sun_percentage']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Subject percentage on the basis of exam',
        width: 1200,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>


   
    
    <div id="menu1" class="tab-pane fade">

          <div class="panel panel-default hr_margin">
    <div class="panel-heading hr_atten">Attendance</div>
    <div class="panel-body">
      
       
<div class="col-lg-12 hr_cllm">
<div class="col-lg-6">
<label>MONTH&nbsp;<span class="hr_clr">*</span></label> 
<select name="Course" id="sel_month" class="form-control hr_slt" onchange="view_attendance(this.value);">
<option value="-1" selected>Select Month.....</option>
<option value="1">January</option>
                  <option value="2">Feburary</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">Octuber</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                 </select>
          </div>
<div class="col-lg-6">
<label>YEAR&nbsp;<span class="hr_clr">*</span></label> 
<select name="Course" id="selct_yr" class="form-control hr_slt" onchange="view_attendance(this.value);">
<option value="-1" selected>Select Year.....</option>
<?php for($i = 2000 ; $i<= date('Y')+1 ; $i++) { ?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php } ?>
</select>
</div>
<?php $std_data = $this->session->userdata('std1_array');

 ?>
<input type="hidden" name="" id="std1" value="<?php echo $std_data[0]['std_id']; ?>">
<input type="hidden" name="" id="std2" value="<?php echo $std_data[0]['std_class']; ?>">
<input type="hidden" name="" id="std3" value="<?php echo $std_data[0]['std_section']; ?>">


           
       </div>
    </div>





  </div>
<!-- second panellll -->
  <div class="panel panel-default hr_toop">
    <div class="panel-heading hr_attp">Attendance Report</div>
    <div class="panel-body">
      <div class="table-responsive" > 
  <table class=" table responsive table table-bordered table table-striped">
    <thead id="view">
    </thead>
  </table>
  </div>
  </div>
  </div>

  <div id="container" style="height: 400px"></div>

    </div>





    <div id="menu2" class="tab-pane fade">
          <div class="panel panel-default ind_xx_pnls">
           <div class="panel-heading ind_xx_pn_dflts">Exam Schedule</div>
           <div class="panel-body">
            <div class=" table-responsive col-lg-12">
             <table class="table table-bordered table-hover">
             <thead>
               <tr>
                <th> Class</th>
                <th> Section</th>
                <th> Subject</th>
                <th> Exam Type</th>
                <th> Exam Date</th>
                <th> Start Time</th>
                <th> End Time</th>
                <th> Marks</th>
               </tr>  
             </thead>
             <tbody>
                  <?php foreach ($exam_get as $key => $value) { ?>
               <tr>
             <td><?php echo $value['class_id'] ?></td>
              <td><?php echo $value['class_section'] ?></td>
              <td><?php echo $value['subject'] ?></td>
              <td><?php echo $value['exam_type'] ?></td>
              <td><?php echo $value['exam_date'] ?></td>
              <td><?php echo $value['exam_start_time'] ?></td>
              <td><?php echo $value['exam_end_time'] ?></td>
              <td><?php echo $value['max_mark'] ?></td>
               </tr>  
                  <?php } ?>
             </tbody>
             </table>
            </div>
           </div>
         </div>
     <!--   </div> -->

    </div>
    <div id="menu3" class="tab-pane fade">
<!--        <div class="container">
 -->          <!-- <h2>Panel Heading</h2> -->
          <div class="panel panel-default ind_xx_pnls">
            <div class="panel-heading ind_xx_pn_dflts">Test</div>
            <div class="panel-body">
             <div class="table-responsive col-lg-12">
              <table class="table table-bordered table-hover">
               <thead>
               <tr>
               <th> Class</th>
               <th> Section</th>
               <th> Subject</th>
               <th> Test Type</th>
               <th> Test Date</th>
               <th> Start Time</th>
               <th> End Time</th>
               <th> Marks</th>
               <th> Description</th>
               </tr>
               </thead>
               <tbody>

                  <?php foreach ($test_exam_get as $key => $value) {
             ?>
              <tr>
              <td><?php echo $value['class_id'] ?></td>
              <td><?php echo $value['class_section'] ?></td>
              <td><?php echo $value['subject'] ?></td>
              <td><?php echo $value['test_type'] ?></td>
              <td><?php echo $value['test_date'] ?></td>
              <td><?php echo $value['test_start_time'] ?></td>
              <td><?php echo $value['test_end_time'] ?></td>
              <td><?php echo $value['max_mark'] ?></td>
              <td><?php echo $value['description'] ?></td>
            </tr>
            <?php } ?>
               </tbody>
              </table>
            </div>
          </div>
          </div>
     <!--    </div> -->
     
    </div>
    <div id="menu4" class="tab-pane fade">
      
<!--       <div class="container">
 -->       <!--  <h2>Panel Heading</h2> -->
        <div class="panel panel-default ind_xx_pnls">
          <div class="panel-heading ind_xx_pn_dflts">Time Table</div>
          <div class="panel-body">
            <div class=" table-responsive col-lg-12">
             <table class="table table-bordered table-hover">
             <thead>
             <tr>
             <th> Class</th>
             <th> Section</th>
             <th> Class Start Timming</th>
             <th> Class End Timming</th>
             <th> Monday</th>
             <th> Tuesday</th>
             <th> Wednesday</th>
             <th> Thursday</th>
             <th> Friday</th>
             <th> Saturday</th>
             </tr>
             </thead>
             <tbody>
             <?php foreach ($time_table_data['time_table'] as $key => $value) {
             ?>
            <tr>
              <td><?php echo $value['class'] ?></td>
              <td><?php echo $value['class_section'] ?></td>
              <td><?php echo $value['class_start_time'] ?></td>
              <td><?php echo $value['class_end_time'] ?></td>
              <td><?php echo $value['monday'] ?></td>
              <td><?php echo $value['tuesday'] ?></td>
              <td><?php echo $value['wednesday'] ?></td>
              <td><?php echo $value['thursday'] ?></td>
              <td><?php echo $value['friday'] ?></td>
              <td><?php echo $value['saturday'] ?></td>
            </tr>
            <?php } ?>
             </tbody>
             </table>
            </div>
          </div>
        </div>

    <!--ksuggkj  -->
    
         <div class="panel panel-default ind_xx_pnls">
           <div class="panel-heading ind_xx_pn_dflts">Suject Teacher</div>
           <div class="panel-body">
            <div class=" table-responsive col-lg-12">
             <table class="table table-bordered table-hover">
             <thead>
             <tr>
             <th> Subject</th>
             <th> Teacher</th>
             </tr>
             </thead>
             <tbody>
             <?php
                   foreach ($time_table_data['subject_teacher'] as $key => $value) {
             ?>
            <tr>
              <td><?php echo $value['sub_name'] ?></td>
              <td><?php echo $value['tch_name'] ?></td>
             
            </tr>
            <?php } ?>
             </tbody>
             </table>
            </div>
           </div>
         </div>
    </div>
  </div>
</div>


</body>
</html>

<style type="text/css">
.in_dxx_hrf{
color: gray;
font-family: -webkit-body;
border-radius: 0px !important;
font-size: 20px;
}
  
   .in_dxx_dltss{
    text-align: center;
    color: gray;
    font-family: -webkit-body;
   }
   .ind_xx_pnls{
    color: gray;
    font-family: -webkit-body;
    border-radius: 0px !important;
   }
   .ind_xx_pn_dflts{
    text-align: center;
    color: gray !important;
    font-family: -webkit-body;
    font-size:20px;
   }
   .ind_xx_pn_strss{
    color: red;
   }
.child_data
{
  margin-left: 198px;
  margin-top: 38px;
}
</style>

 <style type="text/css">

.hr_margin{
margin-top: 25px !important;
border-radius: 0px;
}

.hr_href{
    color: gray  !important;
    font-family: -webkit-body;
    font-size: 17px;
     
}

     .hr_href:hover{
     border-top-color:   #2196f3 !important;

     }


    body,html{
      overflow-x: hidden;
    }


    .hr_atten{
    color: gray !important;
    font-size: 22px;
    font-family: -webkit-body;
    }
     

     .hr_cllm{
    margin-top: 20px;
    margin-bottom: 20px;
    color: gray;
     }

  .hr_slt{
    border-radius: 0px;
  }
.hr_clr{
color: red;
}

.hr_view{
text-align: center;
    color: gray;
    font-family: -webkit-body;
    margin-bottom: 29px;

}

.hr_bbnt{
 margin-top: 18px;
    border-radius: 0px;
    margin-bottom: 20px;
}

.hr_prints{
border-radius: 0px;
}

.hr_sec{
border-radius: 0px;
margin-top: 40px;
}

.hr_bdy{
color: gray;
    font-family: -webkit-body;
    font-size: 22px;
}

.hr_secpnl{
border-radius: 0px;
    margin-top: 46px;
}

.hr_hdd{
color: gray !important;
    font-size: 20px;
    font-family: -webkit-body;
}
.hr_tbll{
color: gray;
font-family: -webkit-body;
    font-size: 17px;

}

.hr_inpt{
border-radius: 0px;
}
.hr_attp{
color: gray !important;
    font-size: 20px;
    font-family: -webkit-body;
}

.hr_toop{
border-radius: 0px;
}

</style>



<script type="text/javascript">
  function view_attendance(value)
  {

    var year_ajx1 = document.getElementById('selct_yr').value;
    var month = document.getElementById('sel_month').value;
    var std_idd = document.getElementById('std1').value;
    var std_classs = document.getElementById('std2').value;
    var std_sectionn = document.getElementById('std3').value;

    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/parent_controller/attendance_view/"+month+"/"+year_ajx1+"/"+std_idd+"/"+std_classs+"/"+std_sectionn+"/",

      data    :  {'month':month,'year3':year_ajx1,'stdiddd':std_idd,'stdcls':std_classs,'stdscn':std_sectionn,},
      success : function(data)
      {
         $("#view").html(data);
      }
    });
  }
</script>