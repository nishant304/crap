<div id="page-wrapper" class="tab-pane fade in active">   
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
    <div class="container">
        <div class="cal1"></div>
        <div class="cal2">
        <script type="text/template" id="template-calendar">
            <div class="clndr-controls">
                <div class="clndr-previous-button">&lsaquo;</div>
                <div class="month"><%= intervalStart.format('M/DD') + ' &mdash; ' + intervalEnd.format('M/DD') %></div>
                <div class="clndr-next-button">&rsaquo;</div>
            </div>
            <div class="clndr-grid">
                <div class="days-of-the-week">
                <% _.each(daysOfTheWeek, function(day) { %>
                    <div class="header-day"><%= day %></div>
                <% }); %>
                    <div class="days">
                    <% _.each(days, function(day) { %>
                        <div class="<%= day.classes %>"><%= day.day %></div>
                    <% }); %>
                    </div>
                </div>
            </div>
            <div class="clndr-today-button">Today</div>
        </script>
        </div>
        <div class="cal3">
        <script type="text/template" id="template-calendar-months">
            <div class="clndr-controls top">
                <div class="clndr-previous-button">&lsaquo;</div>
                <div class="clndr-next-button">&rsaquo;</div>
            </div>
            <div class="clearfix">
            <% _.each(months, function(cal) { %>
                <div class="cal">
                    <div class="clndr-controls">
                        <div class="month"><%= cal.month.format('MMMM') %></div>
                    </div>
                    <div class="clndr-grid">
                        <div class="days-of-the-week">
                        <% _.each(daysOfTheWeek, function(day) { %>
                            <div class="header-day"><%= day %></div>
                        <% }); %>
                            <div class="days">
                            <% _.each(cal.days, function(day) { %>
                                <div class="<%= day.classes %>"><%= day.day %></div>
                            <% }); %>
                            </div>
                        </div>
                    </div>
                </div>
            <% }); %>
            </div>
         <!--    <div class="clndr-today-button">Today</div> -->
        </script>
        </div>
    </div>

    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
  </div>
 -->

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
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/student_controller/attendance_view/"+month+"/"+year_ajx1+"/",

      data    :  {'month':month,'year3':year_ajx1},
      success : function(data)
      {

         $("#view").html(data);
      }
    });
  }
</script>


 





