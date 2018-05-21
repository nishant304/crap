
    <div class="container" id="page-wrapper">
  <h2 class=" sallry_set_tp">Salary Settings</h2>
  	<div class="col-lg-12 ">
  	

  <div class="col-lg-6">
<?php echo form_open('admission/staff_salary_set');?>
  <div class="panel panel-default sallry_set_setting">
    <div class="panel-heading sallry_set_hed ">Salary Settings</div>
    <div class="panel-body">
    	    <div class="col-lg-12  sallry_set_clm ">
              	<label class=" sallry_set_lbl">Designation&nbsp;<span class="sallry_set_str_clr">*</span></label> 
              	<select name="desigination" class="form-control sallry_set_inpt" onchange="abc(this.value);">
                  <option value="">Select</option>
                  <?php foreach ($fetch_designation as $key) { ?>
                   <option value="<?php echo $key['designation'];?>"><?php echo $key['designation'];?></option>
                  <?php }?>
                 </select>
               
              </div>

               
                <div class="col-lg-12 sallry_set_clm ">
              	<label class="sallry_set_lbl">Employee Name&nbsp;<span class="sallry_set_str_clr">*</span></label> 
              	<select name="staff_id" class="form-control  sallry_set_inpt " id="stf_name">
                  </select>
               
              </div>


                  <div class="col-lg-12 sallry_set_clm ">
              	<label class="sallry_set_lbl">Payhead Master&nbsp;<span class="sallry_set_str_clr">*</span></label> 
              	<select name="pay_head" class="form-control sallry_set_inpt  ">
                  <option value="-1" selected>Select...</option>
                  <?php foreach ($payhead as $key) { ?>
                   <option value="<?php echo $key['pay_head_name'];?>"><?php echo $key['pay_head_name'];?></option>
                  <?php } ?>
                 </select>
               
              </div>



             
              <div class="col-lg-12 sallry_set_clm ">
              	<label class="sallry_set_lbl">Unit&nbsp;<span class="sallry_set_str_clr">*</span></label>
                <input type="text" placeholder="unit...." class="form-control sallry_set_inpt " name="unit">  
              </div>

              
               <div class="col-lg-12 sallry_set_clm ">
              	<label class="sallry_set_lbl">Type&nbsp;<span class="sallry_set_str_clr">*</span></label> 
              	<select name="type" class="form-control sallry_set_inpt  ">
                  <option value="" selected>Type...</option>
                  <option value="Ammount">Ammount</option>
                  <option value="percentage">percentage</option>
                  
                 </select>
               
              </div>

<div class="col-lg-12 sallry_set_clm">
  		<button type="submit" class="btn btn-primary sallry_set_ntnn " name="submit"> Save</button>
  	</div>
    </div>
  </div>

  			<?php echo form_close();?>
  		</div>


  <div class="col-lg-6 table-responsive sallry_set_secon_row ">          
  <table class="table table-bordered">
    <thead>


      <tr class="active" style="height: 50px;">
        <th width="20%">S No.</th>
        <th>Designation</th>
        <th>Employee Name</th>
        <th>Pay Head</th>
        <th>Unit</th>
        <th>Type</th>
        <th>Manage</th>
      </tr>
</thead>
    <tbody>
    <?php
    $i=1;
    foreach ($set_salary as $key) {?>
      <tr>
        <td><?php echo $i;?></td>
        <td width="30%"><?php echo $key['desigination'];?></td>
        <td><?php echo $key['staff_id'];?></td>
        <td><?php echo $key['pay_head'];?></td>
        <th><?php echo $key['unit'];?></th>
        <th><?php echo $key['type'];?></th>
        <td><a href="#"><i class="fa fa-pencil sallry_set_pencil " aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-times sallry_set_pencil" aria-hidden="true"></i></a>
        </td>
      </tr>
<?php $i++;}?>
</tbody>
  </table>




  		</div>


  	</div>
  	
  </div>





</body>
</html>


<style type="text/css">
	
	 .sallry_set_tp{
	 	text-align: center;
	 	color: #8080809c;
	 	font-family: -webkit-body;
	 }

	 .sallry_set_hed{
	 	text-align: center;
	 	color: #55555580 !important;
	 	font-family: -webkit-body;
	 	font-size: 20px;
	 }

	 .sallry_set_setting{
	 border-radius: 0px;
    color: gray;
    font-family: -webkit-body;
	 }

    .sallry_set_clm{
    	margin-top: 18px;
    }

   .sallry_set_lbl{
   	    color: #808080a3;
    /*font-family: -webkit-body;*/
   }

  .sallry_set_inpt{
  	color: #55555580;
  	/*font-family: -webkit-body;*/
  	border-radius: 0px;
  }

  .sallry_set_ntnn{
  	border-radius: 0px;
  }

  
  .sallry_set_secon_row{
  	color: #808080bd;
    /*font-family: -webkit-body;*/
    /*border: 1px solid #8080806b;*/
    padding: 0px;

  }

 .sallry_set_pencil{
 	font-size: 22px;
 }
 .sallry_set_str_clr{
  color: red;
 }


</style>
<script type="text/javascript">
    function abc(value)
{
    $.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/select_designation/"+value+"/",  
    data    : {'uristring':value},
    success : function(data){
       
        $("#stf_name").html(data);

}
});
}
</script>
