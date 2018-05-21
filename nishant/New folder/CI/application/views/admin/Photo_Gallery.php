<?php
foreach ($map as $key) {
  $folder_name = $key['folder_name'];
 
}

?>
<div id="page-wrapper">
<!-- tabs strat here -->
  <ul class="nav nav-tabs">
    <li ><a data-toggle="tab" href="#home">Create Album Name</a></li>
    <li><a data-toggle="tab" href="#menu1">Upload Image</a></li>
    <li><a data-toggle="tab" href="#menu2">Gallery</a></li>
   
   </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="panel panel-default">
   <?php echo form_open('admission/create_album_name'); ?>      
        <div class="panel-heading crt_albnmsss_agnss">Create Album</div>
          <div class="panel-body">
       <div class="col-lg-12 albumn_names_albbmn">
        <div class="col-lg-3">
          <label>Album Name<span class="">*</span></label>
          <input type="text" name="folder_name" class="form-control">
        </div>
        <div class="col-lg-2 albumn_names_buttonss">
          <button type="submit" class="btn btn-danger albumn_names_subb">Create</button>
        </div>
     </div>
    </div>
  </div>
<?php echo form_close();?>

    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="panel panel-default albm_gllry_pnlss">
    <div class="panel-heading albmms_gllr_hdrs">Album Gallery</div>
<?php echo form_open_multipart('admission/photo_upload'); ?>  
    <div class="panel-body">
  <div class="col-lg-12">
   <div class="col-lg-5">
     <input type="file" display="none" name="image[]" id="pic" class="form-control" multiple>
     <img src="<?php echo base_url('application/assets/images/upload.png'); ?>" id=pic1>
   </div>
   <div class="col-lg-5">
   <select name='folder_name'  id="type"  class="form-control albmms_gllr_selct" onchange="image(this.value);">
     <option value=''>Select album name</option>
     <!-- <option value='vandu' >Create Album</option> -->
     <?php foreach($photo as $key) {?>
     <option value="<?php echo $key['folder_name'];?>"><?php echo $key['folder_name'];?></option>
     <?php }?>
   </select>
<?php echo form_close(); ?>


 </div>
 <div class="col-lg-2 label_clss_lbls_clmns">
    <button type="submit" class="btn btn-primary submit_ctgrryyss">submit</button>
</div>

 </div>

</div>
</div>

    </div>
  
<div id="menu2" class="tab-pane fade">
    <div class="panel panel-default">
   <div class="panel-heading">
    
<!--  <select name='folder_name'  id="type"  class="form-control albmms_gllr_selct" onchange="image(this.value);">
     <option value='' >Select album name</option>
    <?php foreach($photo as $key) {?>
     <option value="<?php echo $key['folder_name'];?>"><?php echo $key['folder_name'];?></option>
     <?php }?>
   </select>
 -->
 <div class="col-lg-12 foder_margin" id="div1" >
 <?php foreach($photo as $key) {?>
      <a class="atag" data-value="<?php echo $key['folder_name'];?>">
        <i class="fa fa-folder fl_dorrss" aria-hidden="true" >
          </i>
        </a><?php echo $key['folder_name'];?>
 <?php }?>
 </div> 

</div>

  <div class="panel-body" id='show_images'> </div>

</div>
</div>
 <!-- tabs ends herer -->

<script type="text/javascript">
    // function image(value){
   $("#div1").on("click",".atag", function(){
    var val = $(this).data("value");
  
   $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/fetch_images/"+val+"/",  
    data    : {'name_f':val},
    success : function(data){
   $("#show_images").html(data);
}
});
 });
  </script>


<script type="text/javascript">
   $("#type").on("change", function () {        
      $modal = $('#myModal');
      if($(this).val() === 'vandu'){
        $modal.modal('show');
    }
 });
 </script>
 <script type="text/javascript">
  $(function() {
    $('a').click(function() {
        $(this).find('i').toggleClass('fa fa-folder fa fa-folder-open');
    });
});
</script>
<script type="text/javascript">
   $("pic1").click(function(){
        $("pic").trigger("select");
    });
</script>

<style type="text/css">
       #pic1
       {
        height: 50%;
        width: 50%;
       }

       .img_path_bigss_margin{
        margin-top: 20px;
       }

     .img_path_bigss{
      width: 100%;
      height: 100%;
     }
     
     .crt_albnmsss_agnss{
      text-align: center;
      color: gray !important ;
      font-family: -webkit-body;
      font-size: 20px;
     }

    .submit_ctgrryyss{
      border-radius: 0px;
    }
   .albumn_names_subb{
    border-radius: 0px;
   }

   .albumn_names_buttonss{
    margin-top: 20px;
   }
   
    .albumn_names_albbmn{
      color: gray;
      font-family: -webkit-body;
      padding: 0px;
    }

 .crete_gllry_clmns{
  margin-top: 15px;
 }
   
   .nxt_divs{
    margin-top: 20px;
   }
    
   .modl_cont_hdrss{
    border-radius: 0px;
   }

   .label_clss_lbls_clmns{
    margin-top: 0px;
   }
 
   .label_clss_lbls_inputs{
    border-radius: 0px;
   }
    
   .label_clss label{
    color: gray;
    font-family: -webkit-body;
   }

  .albmms_gllry{
   color: gray;
   font-family: -webkit-body;
   text-align: center;
  }
    
    .albmms_gllr_hdrs{
      text-align: center;
      color: gray !important;
      font-family: -webkit-body;
      font-size: 25px;
    }
    .albmms_gllr_selct{
      border-radius: 0px;
    }
    .crt_albmns_gllry{
      text-align: center;
      color: gray;
      font-family: -webkit-body;
      font-size: 20px;
    }
    .label_clss_clicks{
      border-radius: 0px !important;
    }
   
   .albm_gllry_pnlss{
    border-radius: 0px;
   }

   .crete_gllry{
    border-radius: 0px;
   }

 </style>



<style type="text/css">
  .fl_dorrss{
    color: #efd396;
    font-size: 50px;

  }
  
   .fldrrt_opnss{
    display: none;
   }
   .foder_margin
   {
    margin-top: 20px;
   }

</style>

