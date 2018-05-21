
<?php 
$user_listedd=explode(',',$role_autho[0]['feedback']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>




<div id="page-wrapper">
<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>      
   <h1> Access:  </h1>
<label class="switch">

  <input type="checkbox" name="feedback_auth" id="radio_button" <?php if($admin[0]['feedback_access']==1){  ?>  checked  <?php  }  ?> onclick="authhh(this.value)">
  <span class="slider round"></span>
</label>
<?php  }   ?>

<?php if($admin[0]['feedback_access']==1){  ?>
<div class="form_nwss">Feedback</div>
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
    <?php echo form_open('student_controller/student_feedback');
        print_r($msg);
    ?>
  <?php  }  ?>
      <div class="panel panel-default">
        <div class="panel-body new_frms_ankit">
          <div class="col-lg-12 nwe_frm_mrg_ind">
            <div class="col-lg-6">
              <label>Staff Name<span class="nws_frm_clrss">*</span></label>
              <select name="staff_id" class="form-control">
                  <option value="">Select</option>
              <?php  foreach ($sub_class_teacher as $key) { ?>
              <option value="<?php echo  $key['tch_id'];  ?>/<?php echo  $key['tch_name'];  ?>"><?php echo  $key['tch_name'];  ?>(<?php echo  $key['sub_name'];  ?>)</option>
              <?php }   ?>
              </select>
            </div>
        
            <div class="col-lg-6">
              <label>Date<span class="nws_frm_clrss">*</span></label>
              <input type="date" name="date_feedback" class="form-control nwe_frm_submitd">
            </div>
          </div>
          
           <div class="col-lg-12 table-responsive">
             <table class="table table-hover table-bordered">
              <tr class="active">
                <th> </th>
                <th>Very Bad</th>
                <th>Bad</th>
                <th>Good</th>
                <th>Very Good</th>
                <th>Excellent</th>
              </tr>
              <tr>
                <td>CLARITY IN COMMUNICATION</td>
                <td><input type="radio"  name="communication" id="testing_op1" value='1'></td>
                <td><input type="radio"  name="communication" id="testing_op2" value='2'></td>
                <td><input type="radio"  name="communication" id="testing_op3" value='3'></td>
                <td><input type="radio"  name="communication" id="testing_op4" value='4'></td>
                <td><input type="radio"  name="communication" id="testing_op5" value='5'></td>
              </tr>
              <tr>
                <td>FACULTY KNOWLEDGE OF THE SUBJECT</td>
                <td><input type="radio" name="knowledge" id="testing_op6" value='1'></td>
                <td><input type="radio"  name="knowledge" id="testing_op7" value='2'></td>
                <td><input type="radio" name="knowledge" id="testing_op8" value='3'></td>
                <td><input type="radio"  name="knowledge" id="testing_op9" value='4'></td>
                <td><input type="radio"  name="knowledge" id="testing_op10" value="5"></td>
              </tr>
              <tr>
                <td>DISCIPLINE IN THE CLASS</td>
                <td><input type="radio"  name="discipline" id="testing_op11" value="1"></td>
                <td><input type="radio"  name="discipline" id="testing_op12" value="2"></td>
                <td><input type="radio"  name="discipline" id="testing_op13" value="3"></td>
                <td><input type="radio"  name="discipline" id="testing_op14" value="4"></td>
                <td><input type="radio"  name="discipline" id="testing_op15" value="5"></td>
              </tr>
              <tr>
                <td>PUNCTUALITY OF THE FACULTY MEMBER</td>
                <td><input type="radio"  name="punctuality" id="testing_op16" value="1"></td>
                <td><input type="radio"  name="punctuality" id="testing_op17" value="2"></td>
                <td><input type="radio"  name="punctuality" id="testing_op18" value="3"></td>
                <td><input type="radio"  name="punctuality" id="testing_op19" value="4"></td>
                <td><input type="radio"  name="punctuality" id="testing_op20" value="5"></td>
              </tr>
              <tr>
                <td>COVERAGE</td>
                <td><input type="radio"  name="coverage" id="testing_op21" value="1"></td>
                <td><input type="radio"  name="coverage" id="testing_op22" value="2"></td>
                <td><input type="radio"  name="coverage" id="testing_op23" value="3"></td>
                <td><input type="radio"  name="coverage" id="testing_op24" value="4"></td>
                <td><input type="radio"  name="coverage" id="testing_op25" value="5"></td>
               </tr>
               <tr>
                <td>TREATED STUDENTS WITH RESPECT</td>
                <td><input type="radio"  name="respect" id="testing_op26" value="1"></td>
                <td><input type="radio"  name="respect" id="testing_op27" value="2"></td>
                <td><input type="radio"  name="respect" id="testing_op28" value="3"></td>
                <td><input type="radio"  name="respect" id="testing_op29" value="4"></td>
                <td><input type="radio"  name="respect" id="testing_op30" value="5"></td>
               </tr>
               <tr>
                <td>MADE STUDENTS FEEL FREE TO ASK QUESTIONS</td>
                <td><input type="radio"  name="ask_question" id="testing_op31" value="1"></td>
                <td><input type="radio"  name="ask_question" id="testing_op32" value="2"></td>
                <td><input type="radio"  name="ask_question" id="testing_op33" value="3"></td>
                <td><input type="radio"  name="ask_question" id="testing_op34" value="4"></td>
                <td><input type="radio"  name="ask_question" id="testing_op35" value="5"></td>
               </tr>
               <tr>
                <td>ALLOWED SUFFICIENT TIME TO COMPLETE HOMEWORK ASSIGNMENT</td>
                <td><input type="radio"  name="sufficient_time" id="testing_op36" value="1"></td>
                <td><input type="radio"  name="sufficient_time" id="testing_op37" value="2"></td>
                <td><input type="radio"  name="sufficient_time" id="testing_op38" value="3"></td>
                <td><input type="radio"  name="sufficient_time" id="testing_op39" value="4"></td>
                <td><input type="radio"  name="sufficient_time" id="testing_op40" value="5"></td>
               </tr>
               <tr>
                <td>HOW MUCH CLASS YOU ATTEND OF THIS LECTURE</td>
                <td colspan="5"><input type="text"  name="lecture" id="testing_op41"></td>
              
               </tr>
            
             </table>
           </div>
           <div class="col-lg-12 nwe_frm_mrgin">
            <label>Suggestions for improvement <span class="nws_frm_clrss">*</span></label>
            <textarea name='Suggestion' class="form-control nws_frm_inptss"></textarea>
           </div>
           <div class="col-lg-12 nwe_frm_mrgin">
            <label>Additional comments  <span class="nws_frm_clrss">*</span></label>
            <textarea name="additional_comment" class="form-control nws_frm_inptss"></textarea>
           </div>
           <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?> 
           <div class="col-lg-12 nwe_frm_mrgin">
           <center><button type="submit" class="btn btn-default nwe_frm_submitd">Submit</button></center>
           </div>
           <?php  }  ?>
        </div>
      </div>
         <?php echo form_close();?>
<?php  }   ?>
<center><div id="loading"></div></center>
</div>
 <?php  }  ?>





<style>
#loading
{
  z-index: 9999;
}
</style>



<script type="text/javascript">
  function authhh(value)
  {
     if($('#radio_button').is(':checked')) 
      { 
       var admin=1; 
    $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/admin_feedback/"+admin+"/",  
    data    : {'admin':admin},
    success : function(data){
         if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
        setTimeout(function(){
   window.location.reload(1);
}, 1000);
    
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
     else
      {
  var admin=0; 
    $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/admin_feedback/"+admin+"/",  
    data    : {'admin':admin},
    success : function(data){
    
         if(data){
        $('#loading').html('<img  src="<?php echo base_url(); ?>application/assets/images/Preloader_4.gif">');
         setTimeout(function(){
   window.location.reload(1);
}, 1000);
    
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

  }

</script>
