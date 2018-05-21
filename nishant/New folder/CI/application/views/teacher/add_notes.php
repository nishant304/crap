<?php 
$user_listedd=explode(',',$role_autho[0]['add_notes']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>
 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
<?php echo form_open_multipart('admission/do_upload'); ?>
<?php  }   ?>
<div id="page-wrapper">
<div class="container-fluid margi_top">
<div class="col-lg-12 std_main">
     <h2 class="agn_notes_hed">Add Notes</h2>
  	   <div class="col-lg-12 ">
  	      <div class="col-lg-6 agn_notes_clms ">

             <div class="panel panel-default ">
               <!-- <div class="panel-heading  agn_lvss_cat">Add Notes</div> -->
                  <div class="panel-body padig_tp ">
    	   
              <div class="col-lg-12 agn_nts_rwss ">
              	<label class="">Title&nbsp;<span class=" agmn_strs_adds">*</span></label>
                <input type="text" placeholder="Notes Title...." value="<?php echo $notes_title1; ?>" name="notes_title" class="form-control agn_inp_form ">  
              </div>

               
              <div class="col-lg-12 agn_nts_rwss ">
        	  	<label>Description<span class="agmn_strs_adds">*</span></label>
        	  	<textarea class="form-control agn_inp_form " value="<?php echo $notes_desc1; ?>" name="notes_desc" placeholder="enter notes Description"></textarea>
        	  </div>

             
              <div class="col-lg-12 agn_nts_rwss ">
              	<label>Attachment</label>
              	<input type="file" accept=".pps,.jpg,.txt,application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.slideshow,application/vnd.openxmlformats-officedocument.presentationml.presentation" name="notes_file" class="form-control agn_inp_form">
              </div>

              
               <div class="col-lg-12  agn_nts_rwss">
              	<label class="">Class&nbsp;<span class=" agmn_strs_adds">*</span></label> 
              	<select class="form-control agn_inp_form" onchange="stu_class(this.value);" id="std_classs" name="notes_for_class">
                  <option value="None">Select ....</option>
                  <?php foreach ($class_data['class'] as $key) { ?>
                    <option value="<?php echo $key['class_name']; ?>"><?php echo $key['class_name']; ?></option>
                    <?php } ?>
                 </select>
               
              </div>

<div class="col-lg-12 agn_nts_rwss ">
<label class="del_label">Section&nbsp;<span class="agmn_strs_adds">*</span></label> 
<select class="form-control agn_inp_form" id="tabbb_section" onchange="clas_sec(this.value);" name="notes_for_section">
<option value="none">Select ....</option> 
  </select>
               
              </div>


              <div class="col-lg-12 agn_nts_rwss ">
                <label class="del_label">Batch&nbsp;<span class="agmn_strs_adds">*</span></label> 
                <select name="notes_batch" class="form-control agn_inp_form">
                  <option value="Not Define" selected>Select ....</option>
                  <option value="<?php echo date("Y"); ?>-<?php echo date("Y")+1; ?>"><?php echo date("Y"); ?>-<?php echo date("Y")+1; ?></option>
                 </select>
               
              </div>

               <div class="col-lg-12 agn_nts_rwss  ">
              	<label class="del_label">Subject&nbsp;<span class="agmn_strs_adds">*</span></label> 
              	<select class="form-control agn_inp_form" name="notes_subject" id="tabbb">
                <option value="-1" selected>Select ....</option>
              
                 </select>
               
              </div>

  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
    	<div class="col-lg-12">
  		<input type="submit" value="submit" class="btn btn-primary agn_nts_rwss"></button>
  	  </div>
  <?Php  }  ?>
      </div>
       </div>
  		</div>
<?php echo form_close(); ?>
  <div class=" table-responsive col-lg-6  agan_nxt_nots ">
 
  <table class="table table-bordered ">
  <thead>
      <tr class="active" style="height: 50px;">
        <th>Title</th>
        <th>Description</th>
        <th>Batch</th>
        <th>Subject</th>
        <th>Class</th>
        <th>Section</th>
        <th>Manage</th>
      </tr>

    </thead>

    <tbody>
    <?php foreach ($results as $key => $value) {
    ?>
      <tr>
        <td><?php echo $value['notes_title']; ?></td>
        <td><?php echo $value['notes_desc']; ?></td>
        <td><?php echo $value['notes_batch']; ?></td>
        <td><?php echo $value['notes_subject']; ?></td>
        <td><?php echo $value['notes_for_class']; ?></td>
        <td><?php echo $value['notes_for_section']; ?></td>
        <td>

         <a href="#" data-toggle="modal" data-target="#myModal<?php echo $value['notes_id'];    ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>

   <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
      <a href="#"><i class="fa fa-times " aria-hidden="true"></i></a>
   <?Php  }   ?>
      <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
      <a href="<?php echo base_url();?>application/assets/uploads/<?php echo $value['notes_file'];?>" download><i class="fa fa-pencil " aria-hidden="true"></i></a>
       <?Php   }  ?>
        </td>
      </tr>
      <?php } ?>

<?Php  foreach ($results as $key => $value) {  ?>
      <div id="myModal<?php echo $value['notes_id'];    ?>" class="modal fade model_open" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <iframe  src="<?php echo base_url();  ?>application/assets/uploads/<?php echo $value['notes_file'];?>" width="100%" height="500px"></iframe>
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
</div>
</div>
<?Php  }  ?>




<script type="text/javascript">
function clas_sec(value)
{
 var classs=document.getElementById('std_classs').value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_record_sub/"+value+"/"+classs+"/",  
    data    : {'section':value,'classs':classs},
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

 