<?php echo $parent = $this->session->userdata('parent');
$login_from1 = $this->session->userdata('login_from'); 
$student_detailed1 = $this->session->userdata('student_detailed');

  ?>

<div class="container" id="page-wrapper">
 <center>
<button type="button"  class="btn btn-default add_form_btnnn"  id="btn1">For Request Form</button>
<button type="button"  class="btn btn-default add_form_btnnn" id="btn2">For Add Access</button>
 </center>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 well add_form_div1" >

  <div class="row">
<?php echo form_open('parent_controller/request_form_responce'); ?>
<center><h1>Request Form</h1></center>
          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <h4 class="head_you">Request Send To:</h4>
            <div class="row">
            <?php if($parent!='father'){ ?>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
                <label for="request1" class="father_req">Student Father &nbsp;</label>
                <input type="radio" id="request1" name="request_email" value="father">
              </div>
              <?php }  ?>
              <?php if($parent!='mother'){ ?>
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
                <label for="request2" class="father_req">Student Mother &nbsp;</label>
                <input type="radio" id="request2" name="request_email" value="mother">
              </div>
               <?php }  ?>
               <?php if($parent!='guardian'){ ?>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  form-group">
                <label for="request3" class="father_req">Student Guardian &nbsp;</label>
                <input type="radio" id="request3" name="request_email" value="guardian"> 
              </div>
              <?php }  ?>
            </div> 
            </div> 
        


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row">
 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group">
                <label>Student Name &nbsp;</label>
                <input type="hidden" name="request_send" value="<?php print_r($student_detailed1[0][$login_from1]); ?>" >
                <input type="text" name="std_fname" placeholder="Full Name" class="form-control inpt">
              </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group inpt">
                <label>Student Class &nbsp;</label>
                <input type="text" placeholder="class" name="std_class" class="form-control inpt">
              </div>
           
           
    
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-group">
<label>Request Email &nbsp;</label>
<input type="text" placeholder=" Email" name="std_parent_email" class="form-control inpt">
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-group">
 <label>Student Email &nbsp;</label>
<input type="text" placeholder="Student Name" name="std_email" class="form-control inpt">
              </div>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group">
<button type="submit" class="btn btn-danger request_btno">Request</button>
</div>

</div> 
</div> 
</div> 
<?php echo form_close(); ?>
</div> 




  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 well add_form_div2">
  <div class="row">
<?php echo form_open('parent_controller/add_form_responce'); ?>
<center><h1>Add Access</h1></center>
          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <h4 class="head_you">Email Send To:</h4>
            <div class="row">
            <?php if($parent!='father'){ ?>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
                <label for="to_email1" class="father_req">Student Father &nbsp;</label>
                <input type="radio" id="to_email1" name="to_email" value="father">
              </div>
              <?php }  ?>
              <?php if($parent!='mother'){ ?>
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
                <label for="to_email2" class="father_req">Student Mother &nbsp;</label>
                <input type="radio" id="to_email2" name="to_email" value="mother">
              </div>
               <?php }  ?>
               <?php if($parent!='guardian'){ ?>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  form-group">
                <label for="to_email3" class="father_req">Student Guardian &nbsp;</label>
                <input type="radio" id="to_email3" name="to_email" value="guardian"> 
              </div>
              <?php }  ?>
            </div> 
            </div> 
        


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row">
 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
                <label>Add Email &nbsp;</label>
                <input type="hidden" name="email_active" value="<?php print_r($student_detailed1[0][$login_from1]); ?>" >

                <input type="text" name="add_email" placeholder="Full Name" class="form-control inpt">
              </div>
  
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
<button type="submit" class="btn btn-danger request_btno">Request</button>
</div>

            </div> 
            </div> 
            </div> 
            <?php echo form_close(); ?>
           </div>

</div>





<script type="text/javascript">
 $('button').click(function(){    
  if(this.id == 'btn1'){
    $('.add_form_div1').show();
    $('.add_form_div2').hide();
  }else{
    $('.add_form_div1').hide();
    $('.add_form_div2').show();
  }
});
</script>