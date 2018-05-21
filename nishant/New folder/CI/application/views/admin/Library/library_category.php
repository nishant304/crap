<!-- <?php print_r($librarycategory); ?> -->
      <div id="page-wrapper">
        <!-- <h2 class="libry_toop">Add Category</h2> -->
        <div class="panel panel-default libry_heds">
          <div class="panel-heading libry_pnalss">Add Category</div>
          <div class="panel-body">
              <div class="col-lg-12">
                <?php echo form_open('admission/insertcatogory'); ?>
              	<div class="col-lg-6">
                       <div class="panel panel-default libry_heds">
                         <div class="panel-heading libry_pnalss">Add Book Category</div>
                         <div class="panel-body">
                               <div class="col-lg-12 libry_pna_clmnss">
                               	 <label>Category Name<span class="libry_pna_strs">*</span></label>
                               	 <input type="text" name="Category_name" class="form-control libry_pna_btnss">
                               </div> 
                               <div class="col-lg-12 libry_pna_clmnss">
                               	 <label>Section Code<span class="libry_pna_strs">*</span></label>
                               	 <input type="text" name="Section_code" class="form-control libry_pna_btnss">
                               </div>
                               <div class="col-lg-12 libry_pna_clmnss">
                               	<center>
                               		<button type="submit" class="btn btn-danger libry_pna_btnss">Save</button>
                               	</center>
                               </div>                        	
                         </div>
                       </div>
              	</div>
                <?php echo form_close(); ?>
              	<div class=" table-responsive col-lg-6">
              		<table class="table table-bordered table-hover">
              			<thead>
              				<tr>
              					<th> S No.</th>
              					<th> Book Category</th>
              					<th> Section Code</th>
              					<th> Manage</th>
              				</tr>
              			</thead>
              			<tbody>

                        <?php 
                            foreach ($librarycategory as $key => $value) {
                            ?>  
                           
              				<tr>
              					<td><?php echo $value['id']; ?></td>

              					<td>
                           <?php echo $value['Categoryname']; ?>
                        </td>

                          <td>
                          <?php echo $value['SectionCode']; ?>
                        </td>

              					<td>
              					<a href="#">
              					  <i class="fa fa-pencil" aria-hidden="true"></i>
                                  <i class="fa fa-times" aria-hidden="true"></i>
              					</a>
              					</td>
              				</tr>
                      <?php  } ?>  
                             
                    

           
              			</tbody>
              		</table>
              	</div>
              </div>	
          </div>
        </div>
      </div>



 <style type="text/css">
 	
 	.libry_toop{
 		text-align: center;
 		color: gray;
 		font-family: -webkit-body;
 	}
 	.libry_heds{
 		color: gray;
 		font-family: -webkit-body;
 		border-radius: 0px;
 	}

 	.libry_pnalss{
 		color: gray !important;
 		font-family: -webkit-body;
 		text-align: center;
 		font-size: 20px;

 	}

 	.libry_pna_btnss{
 		border-radius: 0px;
 	}

 	.libry_pna_clmnss{
 		margin-top: 18px;
 	}

 	.libry_pna_strs{
 		color: red;
 	}




 </style>