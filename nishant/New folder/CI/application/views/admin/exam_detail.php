<div id="page-wrapper">
<div class="container-fluid">


<div class="col-lg-12 show_lev table-responsive">
<center><h1>Exam DateSheet</h1></center>
<table class="table table-bordered table-hover">
<thead>
<tr class="info">
<th>Edit</th>
<th>#</th>
<th>CLass</th>
<th>Section</th>
<th>Subject</th>
<th>Exam Type</th>
<th>Exam Date</th>
<th>Start Timing</th>
<th>End Timing</th>
<th>Marks</th>
<th>Manage</th>

</tr>
</thead>

<tbody>

<?php 
$i=1;
foreach ($exam_data as $key) { ?>
<tr>
<td><input type="hidden" id="ids<?php echo $key['exam_id'];  ?>" value="<?php echo $key['exam_id'];  ?>">
<input type="checkbox" class="btno" id="toggle_button<?php echo $key['exam_id'];?>"></td>
<?php $exam_id = $key['exam_id'];  ?>
<td><?php echo $i; ?></td>

<td>
<input type="hidden" id="hid7" value="class_id">
<input disabled="disabled" style="width: 90px;" id="myInputId7<?php echo $exam_id;?>"  name="class_id" onblur = "exam_detail7<?php echo $exam_id;?>(this.value);" value="<?php echo $key['class_id']; ?>"></td>



<td><input type="hidden" id="hid1" value="class_section">
<input disabled="disabled" style="width: 120px;" id="myInputId1<?php echo $exam_id;?>"  name="exam_title" onblur = "exam_detail1<?php echo $exam_id;?>(this.value);" value="<?php echo $key['class_section']; ?>"></td>



<td>
        <input type="hidden" id="hid2" value="subject">
<input disabled="disabled" style="width: 90px;" id="myInputId2<?php echo $exam_id;?>"  name="subject" onblur = "exam_detail2<?php echo $exam_id;?>(this.value);" value="<?php echo $key['subject']; ?>"></td>



<td><input type="hidden" id="hid3" value="exam_type">
<input disabled="disabled" style="width: 90px;" id="myInputId3<?php echo $exam_id;?>"  name="exam_type" onblur = "exam_detail3<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_type']; ?>"></td>



<td>
        <input type="hidden" id="hid4" value="exam_date">
<input disabled="disabled" style="width: 90px;" id="myInputId4<?php echo $exam_id;?>"  name="exam_date" onblur = "exam_detail4<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_date']; ?>"></td>



<td>
        <input type="hidden" id="hid5" value="exam_start_time">
<input disabled="disabled" style="width: 90px;" id="myInputId5<?php echo $exam_id;?>"  name="exam_start_time" onblur = "exam_detail5<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_start_time']; ?>"></td>



<td>
        <input type="hidden" id="hid6" value="exam_end_time">
<input disabled="disabled" style="width: 90px;" id="myInputId6<?php echo $exam_id;?>"  name="exam_end_time" onblur = "exam_detail6<?php echo $exam_id;?>(this.value);" value="<?php echo $key['exam_end_time']; ?>"></td>






<td><input type="hidden" id="hid8" value="max_mark">
<input disabled="disabled" style="width: 90px;" id="myInputId8<?php echo $exam_id;?>"  name="max_mark" onblur = "exam_detail8<?php echo $exam_id;?>(this.value);" value="<?php echo $key['max_mark']; ?>"></td>

<td><a href="<?php echo base_url(); ?>index.php/admission/exam_delete/<?php echo $exam_id; ?>">Delete</a></td>
</tr>

 <script type="text/javascript">
  	 var toggle_disabled = function( e ) {
  	 for(var i=1;i<=8;i++){
    	var input = document.getElementById('myInputId'+i+'<?php echo  $key['exam_id'];?>');
    	input.disabled = !(input.disabled);
}
    	if($(this).val() == 'EDIT') {
        $("#toggle_button<?php echo $key['exam_id'];?>").attr("value", "UPDATE");
    	}
    	 else {
        $("#toggle_button<?php echo $key['exam_id'];?>").attr("value", "EDIT");     
    	} 
};

var button = document.getElementById('toggle_button<?php echo  $key['exam_id'];?>');
button.addEventListener( 'click', toggle_disabled);
</script>
<?php $i++;?>
<script type="text/javascript">
<?Php for($i=1;$i<=8;$i++){ ?>
  function exam_detail<?Php echo $i;?><?php echo $exam_id;?>(value){
  var ids=document.getElementById('ids<?php echo $key['exam_id'];?>').value;
 var hid=document.getElementById("hid<?php echo $i;?>").value;
  $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/update_exam_detail/"+value+"/"+hid+"/"+ids+"/",  
    data    : {'value':value,'hid':hid,'ids':ids
  },
  success : function(data){}
  });
  }
 <?php }  ?>
 </script>
<?Php }  ?>
</tbody>	
</table>
</div>	
</div>
</div>
<script type="text/javascript">
   var input = document.getElementById("dateField");
      var today = new Date();
      var day = today.getDate();
      // Set month to string to add leading 0
      var mon = new String(today.getMonth()+1); //January is 0!
      var yr = today.getFullYear();
      
        if(mon.length < 2) { mon = "0" + mon; }
      
        var date = new String( yr + '-' + mon + '-' + day );
      
      input.disabled = false; 
      input.setAttribute('min', date);
</script>


