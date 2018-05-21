
    <div class="container" id="page-wrapper">
  <h2 class="sal_empl_tp">Employee Salary</h2>
    <div class="col-lg-12 ">
    

  <div class="col-lg-6">

  <?php echo form_open('admission/staff_salary_pay');?>
  <div class="panel panel-default sal_empl_bdy ">
    <!-- <div class="panel-heading sal_empl_hed">Employee Salary</div> -->
    <div class="panel-body ">
          <div class="col-lg-12 sal_empl_clm">
                <label class=" ">Designation&nbsp;<span class="sal_empl_str_cls">*</span></label> 
                <select name="designation" class="form-control sal_empl_rms" onchange="abc(this.value);">
                <option value="" selected>Select</option>
                <?php foreach ($fetch_designation as $key) { ?>
               
                  <option value="<?php echo $key['designation'];?>"><?php echo $key['designation'];?></option>
                <?php }?>
                 </select>
               
              </div>

               
                <div class="col-lg-12 sal_empl_clm ">
                <label class="">Employee Name&nbsp;<span class="sal_empl_str_cls">*</span></label> 
                <select name="staff_id" class="form-control sal_empl_rms" id="stf_name">
                 
                </select>
               
              </div>


                  <div class="col-lg-12 sal_empl_clm  ">
                <label class="">Year&nbsp;<span class="sal_empl_str_cls">*</span></label> 
                <select name="year" class="form-control  sal_empl_rms  ">
                  <option value="" selected>Select...</option>
                  <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
                  </select>
               
              </div>


                 <div class="col-lg-12 sal_empl_clm  ">
                <label class="">Month&nbsp;<span class=" sal_empl_str_cls">*</span></label> 
                <select name="month" class="form-control sal_empl_rms  ">
                  <option value="" selected>Select...</option>
                  <?php for($m=1; $m<=12; ++$m){?>
                  <option value="<?php echo date('F', mktime(0, 0, 0, $m));
                   ?>">
                    <?php echo date('F', mktime(0, 0, 0, $m));
                   } ?>
                   </option>
                
                 </select>
               
              </div>


                <div class="col-lg-12  sal_empl_clm ">
                <label class="">Start Date&nbsp;<span class="sal_empl_str_cls">*</span></label>
                <input type="date" placeholder="" class="form-control sal_empl_rms" name="start_date">  
              </div>


                <div class="col-lg-12 sal_empl_clm  ">
                <label class="">End Date&nbsp;<span class=" sal_empl_str_cls">*</span></label>
                <input type="date" placeholder="" class="form-control sal_empl_rms" name="issue_date">  
              </div>

             
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  sal_empl_clm sls_pading ">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 sal_empl">
                <!-- <label class="sallry_set_lbl">End Date&nbsp;<span class="">*</span></label> -->
                <input type="text" placeholder="Payhead"  name="payhead" class="form-control sal_empl_rms">
                </div>  
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 sal_empl">
                <!-- <label class="sallry_set_lbl">End Date&nbsp;<span class="">*</span></label> -->
                <input type="text" placeholder="Amount" name="amount" class="form-control sal_empl_rms  ">
                </div>
                <div class="col-lg-2  col-md-2 col-sm-2 col-xs-2 sal_empl">
                <!-- <label class="sallry_set_lbl">End Date&nbsp;<span class="">*</span></label> -->
                 <a><i class="fa fa-plus sal_empl_pen" aria-hidden="true"></i></a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 sal_empl">
               <!--  <label class="sallry_set_lbl">End Date&nbsp;<span class="">*</span></label> -->
                <a><i class="fa fa-minus sal_empl_pen" aria-hidden="true"></i></a>
                </div>
              </div>
                


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  sal_empl_clm sal_empl_py ">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <p > Pay Head</p>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <p name="amount"> Amnt %</p>
                  </div>


                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <p >Amount</p>
                  </div>

              </div>







      <div class="col-lg-12 ">
      <button type="submit" class="btn btn-primary sal_empl_btns " name="submit"> Save</button>
    </div>
    </div>
  </div>
 <?php echo form_close();?>
      </div>


      <div class="col-lg-6 table-responsive sal_empl_scnd">          
  <table class="table table-bordered">
    <thead>


      <tr class="active" style="height: 50px;">
        <th width="25%">S No.</th>
        <th width="25%" >Designation </th>
        <th width="25%">Employee Name</th>
        <th width="25%">Month</th>
        <th width="25%">start Date</th>
        <th width="25%">Issue Date</th>
        <th width="25%">Issue Date</th>
        <th width="25%">Payhead</th>
        <th width="25%">Amount</th>
        <th width="25%">Manage</th>
      </tr>


    </thead>
    <tbody>
    <?php  
    $i=1;
    foreach($salary as $key){?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $key['designation'];?></td>
        <td><?php echo $key['staff_id'];?></td>
        <td><?php echo $key['year'];?></td>
        <th><?php echo $key['month'];?></th>
        <th><?php echo $key['start_date'];?></th>
        <th><?php echo $key['issue_date'];?></th>
        <th><?php echo $key['payhead'];?></th>
        <th><?php echo $key['amount'];?></th>
        <td>
            <a href="#"><i class="fa fa-times sal_empl_pen1 " aria-hidden="true"></i></a>
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
  .sal_empl{
    margin-top: 16px;
  }
  
  .sal_empl_tp{
    text-align: center;
    color: gray;
    font-family: -webkit-body;
  }

  .sal_empl_hed{
    color: gray !important;
    font-family: -webkit-body;
    text-align: center;
  }

.sal_empl_bdy{
  border-radius: 0px;
}

.sal_empl_clm{
 color: gray;
 font-family: -webkit-body;
 margin-top: 18px;
}


.sal_empl_rms{
  border-radius: 0px;
}

.sal_empl_btns{
  margin-top: 20px;
  border-radius: 0px;
}

 .sal_empl_pen{
    font-size: 27px;
    color: white;
    background-color: #337ab7;
    padding: 4px;
 }

 .sal_empl_py{
  border-bottom: 1px solid #8080806b;
  margin-top: 20px;
 }

 .sal_empl_scnd{
  /*border:1px solid #8080806b;*/
  padding: 0px;
  color: #808080ba;
  font-family: -webkit-body;
 }

 .sal_empl_pen1{
  font-size: 20px;
 }
 .sal_empl_str_cls{
  color: red;
 }
 .sls_pading{
  padding: 0px;
 }


</style>