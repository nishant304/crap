
  ................... 
<div id="page-wrapper">

        <div class="container-fluid  thourt">
     <p> <b>Thought of the day</b>     :     A man should never neglect his family for business.</p>
  </div>

<div class="container-fluid all_details pading_o">
   <div class="col-lg-12 pading_o">
       <div class="col-lg-8 pading_o" >
         <div id="piechart" style="width: 100%; height: 400px; padding: 10px;margin-top: -10px;"></div>
       </div>

       <?php 
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'project_school';

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


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
        width: 750,
        height: 400,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>

       <div class="col-lg-4 pading_o" style="margin-top: 10px;">
        <div class="col-lg-12 pading_o">
          <div class="col-lg-3 set_shotcuts">
            <i class="fa fa-bars fa-2x"></i>
            <p>Assignments</p>
          </div>
          <div class="col-lg-3 set_shotcuts">
            <i class="fa fa-book fa-2x"></i>
            <p>Notes</p>
          </div>
          <div class="col-lg-3 set_shotcuts">
            <i class="fa fa-recycle fa-2x"></i>
            <p>Circular</p>
          </div>
          <div class="col-lg-3 set_shotcuts">
            <i class="fa fa-edit fa-2x"></i>
            <p>Exam</p>
          </div>
       </div>

      <div class="panel-group col-lg-12 recnt_home_work" id="accordion">
        <div class="panel panel-default">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <div class="panel-heading">
            <h4 class="panel-title">
              Recent home work
            </h4>
          </div>
          </a>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
          </div>
        </div>

      </div>

      <div class="panel-group col-lg-12 recnt_home_work" id="accordion1">
        <div class="panel panel-default">
         <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_cls">
          <div class="panel-heading">
            <h4 class="panel-title">
              Subjets
            </h4>
          </div>
          </a>
          <div id="collapse_cls" class="panel-collapse collapse in">
            <div class="panel-body">
             <p><strong>ENG-</strong> English </p>
             <p><strong>HIND-</strong> Hindi</p>
             <p><strong>MAT-</strong>  Maths</p>
             <p><strong>SCI-</strong> Science</p>
             <p><strong>SOC-</strong> Social Science</p>
             <p><strong>COM-</strong> Commerce</p>
             </div>
          </div>
        </div>

      </div>
     </div>

   </div>

</div>


   <div class="container-fluid all_details">
    <h3>Marks Analysis</h3>
    <div class="col-lg-12" id="chart-container" style="height: 340px;margin-top: 30px;"></div>
   </div>
<script type="text/javascript">
FusionCharts.ready(function() {
  var salesChart = new FusionCharts({
      type: 'msline',
      renderAt: 'chart-container',
      width: '1000',
      height: '420',
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


  <div class="container-fluid cald_notic">
    <div class="col-lg-9 calender_show ">
       <div class="cal1 col-lg-12 pading_o"></div>
       
        <div class="col-lg-12 time_tbl_show">
        <center><h3 style="padding: 10px;">Time Table</h3></center>
        <table class="table table-bordered" style="margin-bottom: 0px;">
          <thead>
            <tr>
              <th>Day</th>
              <th>8:30 To 9:30</th>
              <th>9:30 To 10:30</th>
              <th>10:30 To 11:30</th>
              <th>11:30 To 12:30</th>
              <th>12:30 To 1:30</th>
              <th>1:30 To 2:30</th>
              <th>2:30 To 3:30</th>
             
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Sun</td>
              <td>-</td>
              <td>-</td>
              <td colspan="3"><center> Holiday</center></td>
              
              <td>- </td>
              <td>-</td>
            </tr>
            <tr>
              <td>Mon</td>
              <td>Eng</td>
              <td>Hindi</td>
              <td>Physical</td>
              <td>Mahts</td>
              <td>Lunch</td>
              <td>Soc sce</td>
              <td>Science</td>
            </tr>
            <tr>
              <td>Tue</td>
              <td>Eng</td>
              <td>Hindi</td>
              <td>Physical</td>
              <td>Mahts</td>
              <td>Lunch</td>
              <td>Sports</td>
              <td>Computer</td>
            </tr>
            <tr>
              <td>Wed</td>
              <td>Eng</td>
              <td>Hindi</td>
              <td>Physical</td>
              <td>Mahts</td>
              <td>Lunch</td>
              <td>Sports</td>
              <td>Computer</td>
            </tr>
            <tr>
              <td>Thu</td>
              <td>Eng</td>
              <td>Hindi</td>
              <td>Physical</td>
              <td>Mahts</td>
              <td>Lunch</td>
              <td>Sports</td>
              <td>Computer</td>
            </tr>
            <tr>
              <td>Fri</td>
              <td>Eng</td>
              <td>Hindi</td>
              <td>Physical</td>
              <td>Mahts</td>
              <td>Lunch</td>
              <td>Sports</td>
              <td>Computer</td>
            </tr>
            <tr>
              <td>Sat</td>
              <td>Eng</td>
              <td>Hindi</td>
              <td>Physical</td>
              <td>Mahts</td>
              <td>Lunch</td>
              <td>Sports</td>
              <td>Computer</td>
            </tr>

          </tbody>
        </table>
       </div>
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

