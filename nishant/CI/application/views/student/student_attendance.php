<?php 
$user_email = $this->session->userdata('user_email'); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>student assignment</title>
<script type="text/javascript">
    function ShowHideDiv() {
        var select_data = document.getElementById("purpose");
        var show_div = document.getElementById("showMe");
        show_div.style.display = select_data.value == "January" ? "block" : "none";
    }
</script>
</head>
<body>
<div class="container assign">
  <h2>Student Note</h2> 

  <table class="table table-bordered">
    <thead>
      <tr style="background:lavender; ">
        <th style="width: 1200px; height: 50px;">Attendance</th>
      </tr>
    </thead>

    <tbody>
      <tr style="height: 130px;">

        <td>
         <h4 style="margin-left: 550px; margin-bottom: 10px; font-family: sans-serif;">Month</h4>
        	<select id="purpose" style="margin-left: 500px;width: 156px;height: 45px;font-family: sans-serif;" onchange = "ShowHideDiv()">
        		<option>Select</option>
        		<option value="January">January</option>
        		<option value="February">February</option>
        		<option value="March">March</option>
        		<option value="April">April</option>
        		<option value="June">June</option>
        		<option value="July">July</option>
        		<option value="August">August</option>
        		<option value="September">September</option>
        		<option value="October">October</option>
        		<option value="November">November</option>
        		<option value="December">December</option>
        	</select>
        </td>
      </tr>
    </tbody>
  </table>



  <div id="showMe" style="display: none;">
  <table class="table table-bordered">
    <thead>
    
    <h4>Attendance Report : - for the month of June</h4>
      <tr>
      <?php for($i = 1 ; $i <= 31; $i++) { ?>
        <th style="font-family: sans-serif;"><?php echo $i; ?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php for($i = 1 ; $i <= 31 ; $i++) { if($i == 7 || $i == 14 || $i == 21 || $i == 28) {?>
        <td style="color: red;"><?php echo "S"; } elseif($i == 5 || $i == 10 || $i == 15 || $i == 20 || $i == 25 || $i == 30) { ?></td>
        <td style="color: red;"><?php echo "A"; } else { ?></td>
        <td style="color: lightgreen;"><?php echo "P"; } }?></td>
      </tr>
    </tbody>
    </div>
  </table>
<div class="footer">
       <p>&copy; 2016 Admin Panel. All Rights Reserved | Design by Tecinso</p>
    </div>
    </div>
</body>
</html>
<style type="text/css">
	.assign
	{
		margin-top: 100px;
		margin-left: 196px;
	}
</style>