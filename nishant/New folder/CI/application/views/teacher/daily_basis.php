
<?php 
$user_listedd=explode(',',$role_autho[0]['add_daily_basis']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>




<div class="ser_contc" id="page-wrapper">
 <h2 class="cmbi_frms">Add/Manage Daily Basis</h2>

  <ul class="nav nav-tabs tab_show_stdnt">
    <li class="active"><a data-toggle="tab" href="#home"  class="combi_inee_dlts cv">Add Daily Basis</a></li>
    <li><a data-toggle="tab"  href="#menu1" class="combi_inee_dlts1 cv1" >Manage Daily Basis</a></li>
     </ul>

<div class="tab-content">
<div id="home" class="tab-pane fade in active">
<div class="panel-heading empll_emplll">Add Daily Basis</div>
    <div class="panel-body">
      <div class="col-lg-12">
<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
  <?php
$attribute= array('id' => 'form1');
 echo form_open('teacher_controller/test_add',$attribute); 
$arr_sec_class=$this->session->userdata('arr_sec_class');
$selected='selected';
?>
<?php  }  ?>
        <div class="panel panel-default empll_top">
   <div class="panel-body empll_clr">
      <div class="col-lg-12 empll_margin">
                  
                  <div class="col-lg-6">
                <label  class="empll_labell">Class&nbsp;<span class="empll_spn">*</span></label> 
                <select class="form-control" name="class_id" onchange="select_class_val1(this.value);" >
                    <option>select</option>
                     <?php foreach ($class_data['class'] as $key) { ?>
                    <option <?php if($arr_sec_class['class_id']==$key['class_name']){ echo $selected;     }  ?> value="<?php echo $key['class_name'];?>"><?php echo $key['class_name']; } ?></option>
                  </select>
               
              </div>


              <div class="col-lg-6 ">
                <label  class="empll_labell">Section&nbsp;<span class="empll_spn">*</span></label> 
                 <select class="form-control" name="class_section" onchange='form_submit1();' id="selct_section3">
              
               <option> <?php echo $arr_sec_class['class_section'];?></option>
               </select>
               
              </div>

      </div>
<div class="col-lg-offset-6"><input class="btn btn-warning" type="submit" name="submit" value="submit" id='submitty'></div>
<?php echo form_close(); ?>

    </div>
  </div>

    <hr>
   
      </div>
</div>


<?php echo form_open('admission/test_insert');  ?>
<div class=" table-responsive col-lg-12 sub_aloct_seconds1">          
 <table class="table table-bordered table-hover tbl">
<th>SUBJECT</th>
<th>DESCRIPTION(topics)</th>
<th>TEST TYPE</th>
<th>TEST DATE</th>
<th>MAX MARKS</th>
<th>START TIME</th>
<th>END TIME</th>
<?Php $subbj=$this->session->userdata('subbj');
foreach ($subbj as $key) { ?>

<tr>
<input type="hidden" name="class_id[]" value="<?php echo $arr_sec_class['class_id']; ?>">
<input type="hidden" name="class_section[]" value="<?php echo $arr_sec_class['class_section']; ?>">
<td><input type="text" name="subject[]" class="widths" value="<?Php echo $key['sub_name'];?>" readonly></td>
<td><textarea name="description[]" rows="3" cols="20"  value="<?Php echo $key['description'];?>"><?Php echo $key['description'];?>
  
</textarea></td>
<td><select name='test_type[]'>
<option value="">Select</option>
<option>Daily Basis</option>
<option>Surprise</option>
</select></td>
<td><input type="date" name="test_date[]" class="height"></td>
<td><input type="text" name="max_mark[]" class="widths"></td>
<td><input type="time" name="test_start_time[]" class="height"></td>
<td><input type="time" name="test_end_time[]" class="height"></td>
</tr>
<?php } ?>
</table>


 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
<center>
<input class="btn btn-primary" type="submit" name="submit" value="submit">
</center>
 <?php  }   ?>

<?php echo form_close(); ?>
    </div>
<script type="text/javascript">
function form_submit1()
{
  $('#form1').find('input[type="submit"]').trigger('click');
}
</script>

<script type="text/javascript">
function select_class_val1(value)
{
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/time_table_select/"+value+"/",  
    data    : {'class':value
  },
success : function(data){
$("#selct_section3").html(data);
}
    
});
}
</script>

        
</div>
<div id="menu1" class="tab-pane fade">
<br>
<div class=" table-responsive col-lg-12 sub_aloct_seconds1">          
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Edit</th>
<th>#</th>
<th>CLass</th>
<th>Section</th>
<th>Subject</th>
<th>Test Type</th>
<th>Test Date</th>
<th>Start Timing</th>
<th>End Timing</th>
<th>Marks</th>
<th>Manage</th>

</tr>
</thead>

<tbody>

<?php 
$k=1;


foreach ($results as $key) { ?>
<tr>
<td>
 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
  <input type="hidden" id="ids<?php echo $key['test_id'];  ?>" value="<?php echo $key['test_id'];  ?>">
<input type="checkbox" class="btno" id="toggle_button<?php echo $key['test_id'];?>">
<?php   }  ?>

</td>
<?php $test_id = $key['test_id'];  ?>
<td><?php echo $k; ?></td>

<td>
<input type="hidden" id="hid7" value="class_id">
<input disabled="disabled" style="width: 90px;" id="myInputId17<?php echo $test_id;?>"  name="class_id" onblur = "exam_detail7<?php echo $test_id;?>(this.value);" value="<?php echo $key['class_id']; ?>"></td>



<td><input type="hidden" id="hid1" value="class_section">
<input disabled="disabled" style="width: 120px;" id="myInputId11<?php echo $test_id;?>"  name="exam_title" onblur = "exam_detail1<?php echo $test_id;?>(this.value);" value="<?php echo $key['class_section']; ?>"></td>



<td>
        <input type="hidden" id="hid2" value="subject">
<input disabled="disabled" style="width: 90px;" id="myInputId12<?php echo $test_id;?>"  name="subject" onblur = "exam_detail2<?php echo $test_id;?>(this.value);" value="<?php echo $key['subject']; ?>"></td>



<td><input type="hidden" id="hid3" value="test_type">
<input disabled="disabled" style="width: 90px;" id="myInputId13<?php echo $test_id;?>"  name="test_type" onblur = "exam_detail3<?php echo $test_id;?>(this.value);" value="<?php echo $key['test_type']; ?>"></td>



<td>
        <input type="hidden" id="hid4" value="test_date">
<input disabled="disabled" style="width: 90px;" id="myInputId14<?php echo $test_id;?>"  name="test_date" onblur = "exam_detail4<?php echo $test_id;?>(this.value);" value="<?php echo $key['test_date']; ?>"></td>



<td>
        <input type="hidden" id="hid5" value="test_start_time">
<input disabled="disabled" style="width: 90px;" id="myInputId15<?php echo $test_id;?>"  name="test_start_time" onblur = "exam_detail5<?php echo $test_id;?>(this.value);" value="<?php echo $key['test_start_time']; ?>"></td>



<td>
        <input type="hidden" id="hid6" value="exam_end_time">
<input disabled="disabled" style="width: 90px;" id="myInputId16<?php echo $test_id;?>"  name="test_end_time" onblur = "exam_detail6<?php echo $test_id;?>(this.value);" value="<?php echo $key['test_end_time']; ?>"></td>






<td><input type="hidden" id="hid8" value="max_mark">
<input disabled="disabled" style="width: 90px;" id="myInputId18<?php echo $test_id;?>"  name="max_mark" onblur = "exam_detail8<?php echo $test_id;?>(this.value);" value="<?php echo $key['max_mark']; ?>"></td>

<td>
     <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
  <a href="<?php echo base_url(); ?>index.php/admission/test_delete/<?php echo $test_id; ?>">Delete</a>
  <?php  }  ?>
</td>
</tr>

 <script type="text/javascript">
     var toggle_disabled = function( e ) {
  
     for(var i=1;i<=8;i++){
      var input = document.getElementById('myInputId1'+i+'<?php echo  $key['test_id'];?>');
      input.disabled = !(input.disabled);
}
      if($(this).val() == 'EDIT') {
        $("#toggle_button<?php echo $key['test_id'];?>").attr("value", "UPDATE");
      }
       else {
        $("#toggle_button<?php echo $key['test_id'];?>").attr("value", "EDIT");     
      } 
};

var button = document.getElementById('toggle_button<?php echo  $key['test_id'];?>');
button.addEventListener( 'click', toggle_disabled);
</script>
<?php $i++;?>
<script type="text/javascript">
<?Php for($i=1;$i<=8;$i++){ ?>
  function exam_detail<?Php echo $i;?><?php echo $test_id;?>(value){
  var ids=document.getElementById('ids<?php echo $key['test_id'];?>').value;
 var hid=document.getElementById("hid<?php echo $i;?>").value;
  $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/update_test_detail/"+value+"/"+hid+"/"+ids+"/",  
    data    : {'value':value,'hid':hid,'ids':ids
  },
  success : function(data){}
  });
  }
 <?php }  ?>
 </script>
<?Php  $k++; }  ?>
</tbody>  
</table>
<center><p class="pagination_link"><?php echo $links; ?></p></center>
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


    </div>

</div>
</div>
</div>

<?php  }  ?>
<script type="text/javascript">
function form_submit1()
{
  $('#form1').find('input[type="submit"]').trigger('click');
}
</script>

<script type="text/javascript">
function select_class_val(value)
  {
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/time_table_select/"+value+"/",  
    data    : {'class':value
  },
success : function(data){
$("#selct_section2").html(data);
    }
    
});
}
</script>
<script type="text/javascript">
      $('.combi_inee_dlts1').click(function() {
      $('.cv1').removeClass("combi_inee_dlts1");
      $('.cv1').addClass("combi_inee_dlts");
      $('.cv').removeClass("combi_inee_dlts");
       $('.cv').addClass("combi_inee_dlts1");
});
    $('.combi_inee_dlts').click(function() {
     $('.cv1').removeClass("combi_inee_dlts");
      $('.cv1').addClass("combi_inee_dlts1");
      $('.cv').removeClass("combi_inee_dlts1");
       $('.cv').addClass("combi_inee_dlts");
});
</script>