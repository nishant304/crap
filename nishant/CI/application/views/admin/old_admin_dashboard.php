<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<?php 
$all_data = $this->session->userdata(); 
$number_of_student = $all_data['all_rows'][0];
$number_of_staff = $all_data['all_rows'][1];
$number_of_parent = $all_data['all_rows'][2];
?>

    <div id="page-wrapper" >
      <div class="main-page">
        <div class="row-one">
          <div class="col-md-4 widget">
            <div class="stats-left ">
              <a href="<?php echo base_url(); ?>index.php/admission/user_listed/teacher"><h5>Total</h5>
              <h4>Teacher</h4></a>
            </div>
            <div class="stats-right">
              <label><?php echo $number_of_staff; ?></label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          <div class="col-md-4 widget states-mdl">
            <div class="stats-left">
              <a href="<?php echo base_url(); ?>index.php/admission/user_listed/student"><h5>Total</h5>
              <h4>Student</h4></a>
            </div>
            <div class="stats-right">
              <label><?php echo $number_of_student; ?></label>
            </div>
            <div class="clearfix"> </div> 
          </div>
          <div class="col-md-4 widget states-last">
            <div class="stats-left">
              <a href="<?php echo base_url(); ?>index.php/admission/user_listed/parent"><h5>Total</h5>
              <h4>Parent</h4></a>
            </div>
            <div class="stats-right">
              <label><?php echo $number_of_parent; ?></label>
            </div>
            <div class="clearfix"> </div> 
          </div>
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
   
   
 
<div class="col-lg-12 main main_div">
 
 <div class="col-lg-2 font_std">
  <i class="fa fa-briefcase fa-4x" aria-hidden="true"></i>
  <a href="<?php echo base_url();?>index.php/admission/add_user"><h5>Student</h5></a>
 </div> 

  <div class="col-lg-2 font_std1">
  <i class="fa fa-user-plus fa-4x" aria-hidden="true"></i>
   <a href="<?php echo base_url();?>index.php/admission/user_listed/teacher"><h5>Teaching staff</h5></a>
 </div> 

  <div class="col-lg-2 font_std2">
  <i class="fa fa-users fa-4x" aria-hidden="true"></i>
  <h5>none Teaching staff</h5>
 </div>

   <div class="col-lg-2 font_std3">
  <i class="fa fa-bus fa-4x" aria-hidden="true"></i>
  <a href="<?php echo base_url();?>index.php/admission/add_vehicle"><h5>Transport</h5></a>
 </div>

  <div class="col-lg-2 font_std4">
  <i class="fa fa-book fa-4x" aria-hidden="true"></i>
  <a href="<?php echo base_url();?>index.php/admission/Add_category_library"><h5>Library</h5></a>
 </div> 

 <div class="col-lg-2 font_std5">
  <i class="fa fa-clock-o fa-4x" aria-hidden="true"></i>
 <a href="<?php echo base_url();?>index.php/admission/time_table"> <h5>Time Table</h5></a>
 </div> 

  <div class="col-lg-2 font_std6">
  <i class="fa fa-money fa-4x" aria-hidden="true"></i>
  <a href="<?php echo base_url();?>index.php/admission/time_table"><h5>Fees</h5></a>
 </div> 

  <div class="col-lg-2 font_std7">
  <i class="fa fa-file-text-o fa-4x" aria-hidden="true"></i>
  <a href="<?php echo base_url();?>index.php/admission/exam_detail"><h5>Exam</h5></a>
 </div> 

  <div class="col-lg-2 font_std8">
  <i class="fa fa-file-text-o fa-4x" aria-hidden="true"></i>
  <h5>Online Text</h5>
 </div> 

  <div class="col-lg-2 font_std9">
  <i class="fa fa-file-text-o fa-4x" aria-hidden="true"></i>
  <h5>Progress Analysis</h5>
 </div> 
 




</div>
 <center><div id="loading"></div></center>
<script type="text/javascript">

</script>



<style type="text/css">
.canvasjs-chart-canvas{
width: 100%;
}
</style>



 <script type="text/javascript">
  $("#techer").change(function(){
    if($(this).val() == 2){
      $(".hid_set").show();
      $(".val_hid").hide();
      $(".val_hid1").show();
      $(".val_hid2").show();

    }else{
      $(".hid_set").hide();
      $(".val_hid").show();
      $(".val_hid1").hide();
      $(".val_hid2").hide();
    }

    
});
 </script>

<style type="text/css">
  body{
    background: #cccccc2e;
}

.main{
    border:1px solid #ccc;
    padding: 0px;
    /*padding: 10px 10px;*/
    background: white;
}

.std_show img{
   width: 100%;
   height: 200px;
}
.std_show{
    border-bottom: 1px solid #ccc;
    padding-bottom: 20px !important;
}
.techer_info_so button{
  margin-bottom: 10px;
  margin-left: 7px;
  width: 91%;
  color: white;
}
.tech_bt{
    background: #e8a1f1;
}
.tech_bt1{
    background: #8be1fc;
}
.tech_bt2{
    background: #87cd99;
}
.tech_bt3{
    background: #f79091;
}
.tech_bt4{
    background: #c6a9a3;
}
.tech_bt5{
    background: #bfdb84;
}
.tech_bt6{
    background: #83a9e8;
}
.tech_bt7{
    background: #b8a3f2;
}
.tech_bt8{
    background: #c4c1d6;
}


.pading_o
{
    padding: 0px;
}
.mian_top{
    border: 1px solid #ccc;
    height: 100px;
}
.bord_right{
    border-right: 1px solid #ccc;
    padding: 10px 10px;
}
.pad_set{
    padding: 10px 10px;
}
.border_btm{
    padding: 7px;
}
.border_right_so{
    border-right: 1px solid #ccc;

}

.border_right_so button{
    width: 100%;
    margin-bottom: 10px;
    color: white;
}
.border_right_so1 button{
    width: 100%;
    margin-bottom: 10px;
    color: white;
}
.border_right_so h3{
    text-align: center;
}
.pad_lft{
    padding-left: 0px;
}
.font_set .fa{
    font-size: 90px;
    color: #35a5e2d9;
}

.hid_set{
    display: none;
}
.main_div{
    margin-top: 50px;
    background: white;
    padding: 10px;
}
.margn_set{
    margin-top: 40px;
}
.font_std{
    background: radial-gradient(#97c379, #74b749);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std .fa{
   margin-top: 20px;
}

.font_std1{
    background: radial-gradient(#73c5ca, #0bc0cb);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std1 .fa{
   margin-top: 20px;
}

.font_std2{
    background: radial-gradient(#9a94c7, #847cc5);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std2 .fa{
   margin-top: 20px;
}

.font_std3{
    background: radial-gradient(#ffd673, #feb400);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std3 .fa{
   margin-top: 20px;
}

.font_std4{
    background: radial-gradient(#699ad0, #446f9d);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std4 .fa{
   margin-top: 20px;
}
.font_std5{
    background: radial-gradient(#c76ac6, #9d4a9c);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std5 .fa{
   margin-top: 20px;
}

.font_std6{
    background: radial-gradient(#cc7dc0, #9e7698);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std6 .fa{
   margin-top: 20px;
}
.font_std7{
    background: radial-gradient(#e06896, #b33062);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std7 .fa{
   margin-top: 20px;
}

.font_std8{
    background: radial-gradient(#f59e82, #f37b53);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std8 .fa{
   margin-top: 20px;
}

.font_std9{
    background: radial-gradient(#73c5ca, #0bc0cb);
    height: 120px;
    margin-bottom: 10px;
    color: white;
    text-align: center;
    margin-left: 30px;
}
.font_std9 .fa{
   margin-top: 20px;
}
.evnt_detl{
    border:1px solid #ccc;
}

</style>




   </div>
</div>
</div>
      <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

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

