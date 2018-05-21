<?php 
$user_listedd=explode(',',$role_autho[0]['assignment']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
<?php echo form_open_multipart('admission/upload_assignment'); ?>
<?php  }  ?>
<div  id="page-wrapper">
<h2 class="asmnt_adss">Add Assignments</h2>
       <div class="col-lg-12 ">
          <div class="col-lg-6 agn_notes_clms ">
             <div class="panel panel-default ">
               <!-- <div class="panel-heading  cat_ads_lvs">Add Assignments</div> -->
                  <div class="panel-body padig_tp">
         
              <div class="col-lg-12 samnt_titles">
                <label class="">Title&nbsp;<span class="">*</span></label>
                <input type="text" name="assign_title" placeholder="Assignment...." class="form-control ads_inpts_frms">  
              </div>

               
              <div class="col-lg-12 samnt_titles">
              <label>Description<span class="">*</span></label>
              <textarea class="form-control ads_inpts_frms permanet" name="assign_desc" placeholder="Description"></textarea>
            </div>

             
              <div class="col-lg-12 samnt_titles">
                <label>Attachment</label>
                <input type="file" name="assign_file" placeholder="Attachment" class="form-control ads_inpts_frms">
              </div>

                
                  
               <div class="col-lg-12 samnt_titles">
                <label class="">Class&nbsp;<span class="">*</span></label> 
                <select name="assign_for_class" id="std_classs" class="form-control ads_inpts_frms" onchange="base_clss(this.value);">
                <option value="">select</option>
                <?php foreach ($class_data['class'] as $key) { ?>
                 <option value="<?php echo $key['class_name'];   ?>"><?php echo $key['class_name'];   ?></option>
                <?php  }    ?>
                 </select>
               
              </div>



               <div class="col-lg-12 samnt_titles">
                <label class="del_label">Section&nbsp;<span class="">*</span></label> 
                <select name="assign_for_section" class="form-control ads_inpts_frms " id="tabbb_section" onchange="student_fetch(this.value);">
                 </select>
               
              </div>


               <div class="col-lg-12 sub_margs_alloc_sltcs studentdiv"  id="student_get" name="std_name[]">
           
          </div>




               <div class="col-lg-12 samnt_titles ">
                <label class="del_label">Subject&nbsp;<span class="">*</span></label> 
                <select name="assign_subject" class="form-control ads_inpts_frms " id="tabbb">
                  
                 </select>
</div>

<div class="col-lg-12 samnt_titles ">
                <label class="">Date of Submission&nbsp;<span class="">*</span></label>
   <input type="date" placeholder="Date of Submission...." name="date_of_submission" class="form-control ads_inpts_frms ">  
              </div>
  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
      <div class="col-lg-12">
      <button type="submit" class="btn btn-primary ads_btns_ss "> SAVE</button>
    </div>
    <?php  }  ?>
    </div>
  </div>
 </div>
<?php echo form_close();    ?>
<div class=" table-responsive col-lg-6  ads_nts_assmnt">  
  <table class="table table-bordered">
    <thead>


      <tr class="active" style="height: 50px;">
        <th>S No.</th>
        <th>Title</th>
        <th>Class</th>
        <th>Section</th>
        <th>Subjects</th>
        <th>Date Of Submission</th>
        <th>Manage</th>
      </tr>


    </thead>
    <tbody>
<?php 
foreach ($results as $key) {  ?>
      <tr>
        <td width="10%"><?php echo $key['assign_id'];    ?></td>
        <td width="30%"><?php echo $key['assign_title'];    ?></td>
        <td><?php echo $key['assign_for_class'];    ?></td>
        <td><?php echo $key['assign_for_section'];    ?></td>
        <td><?php echo $key['assign_subject'];    ?></td>
        <td><?php echo $key['date_of_submission'];    ?></td>
        <td>
          <a href="#" data-toggle="modal" data-target="#myModal<?php echo $key['assign_id'];    ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
            <a href="#"><i class="fa fa-times " aria-hidden="true"></i></a>
        <?Php  }  ?>

            <a href="<?php echo base_url();  ?>application/assets/uploads/<?php echo $key['assign_file'];    ?>" download><i class="fa fa-pencil " aria-hidden="true"></i></a>
            
        </td>
      </tr>
    <?php  }   ?>
  <?Php  foreach ($results as $key) {  ?>
      <div id="myModal<?php echo $key['assign_id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <iframe  src="<?php echo base_url();  ?>application/assets/uploads/<?php echo $key['assign_file'];    ?>" width="100%" height="500px"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
      <?php  }   ?>
    </tbody>
  </table>
  <center><p class="pagination_link"><?php echo $links; ?></p></center>
    </div>
    </div>
    
  </div>
<?Php }  ?>

<script type="text/javascript">
function base_clss(value)
{
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_section/"+value+"/",  
    data    : {'uristring':value},
    success : function(data){
       
        $("#tabbb_section").html(data);
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
  function student_fetch(value)
  {
    class_data = document.getElementById("std_classs").value;
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/admission/stu_transport_fetch/"+class_data+"/"+value+"/",
      data    :  {'class_data':class_data,'sec_data':value},
      success : function(data)
      {
         $("#student_get").html(data);

      }
    });

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_sub/"+value+"/"+class_data+"/",  
    data    : {'section':value,'classs':class_data},
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




  }




</script>