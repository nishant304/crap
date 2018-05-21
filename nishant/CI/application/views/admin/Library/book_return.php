
     
<div id="page-wrapper">
  <?php

     $libclass   = $all['class'];


?>

<?php echo form_open('admission/book_return'); ?>
    	<div class="col-lg-12">
          	 <div class="panel panel-default books_pnls_returnss">
              <div class="panel-heading books_books_rtrn">Book Return </div>
              <div class="panel-body">
              	 <div class="col-lg-12 books_pnnlss_clmns">
              	   <div class="col-lg-4 ">
                   <label>Class<span class="book_hre_clrss">*</span></label>
              	 	<!-- <input type="search" name="Class" class="form-control books_pnls_returnss"> -->
                  <select class="form-control" name="Class" id="class_vlu" onchange="getcalsslibrary(this.value)">
                      
                     <option>select..</option>
                    <?php 
                    foreach ($libclass as $key => $value) {
                    ?>
                    <option value="<?php echo $value['class_name']; ?>"> <?php echo $value['class_name']; ?></option>
                    <?php  } ?>
                  </select>
              	   </div>


                   <div class="col-lg-4 ">
                   <label>Section<span class="book_hre_clrss">*</span></label>
                 <select name="Section" class="form-control class_section" id="Section_val" onchange="getrollnolibrary(this.value)">
                  <option>select..</option>
                </select>
                    
                   </div>


                   <div class="col-lg-4 ">
                  <label>Roll No<span class="book_hre_clrss">*</span></label>
                  <select name="Roll_No" class="form-control class_roll_no" onchange="getbooklibrary(this.value)">
                  <option>select..</option>
                </select>
                   </div>
              	 
              	 </div>
             
              	<!--  <div class="col-lg-12 books_pnnlss_clmns">
              	 	<center>
              	 		<button type="submit" class="btn btn-danger books_pnn_btnss">Search</button>
              	 	</center>
              	 </div> -->
              </div>
           </div>

    	</div>
        <?php echo form_close(); ?>


<div class="col-lg-12">
        <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" class="book_hre_reqst">Book Pending</a></li>
    <li><a data-toggle="tab" href="#menu1" class="book_hre_reqst">Book Done</a></li>
<!--     <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="panel panel-default book_hre_pnls_dflts">
          <div class="panel-heading book_hre_boo_rqssts">Book Request</div>
          <div class="panel-body ">
            <div class="col-lg-12">
              <table id="records_table" class="table table-bordered table-hover">
              <thead>
                <tr>
                 <th> S No.</th>
                 <th> Class</th>
                 <th> Section</th>
                 <th> Roll no</th>
                 <th> Title</th> 
                 <th> Author</th>
                 <th>Book Category</th>
                 <th>Date</th>
                 <th>Day</th>
                 <th>Fine</th>
                 <th>Manage</th>
                </tr>
              </thead>
              <tbody>
              <!--   <tr class="tr">
                  <td> 1</td>
                  <td> 12th</td>
                  <td> A</td>
                  <td> 23</td>
                  <td>  d wdbbd</td>
                  <td> BDB</td>
                  <td> hindi</td>
                  <td> 2018/02/10</td>
                  <td> 4</td>
               
                </tr> -->

              
                
             
             
              </tbody>
            </table>

          </div>
        </div>
    </div>
  </div>
    <div id="menu1" class="tab-pane fade">
       <div class="panel panel-default book_hre_pnls_dflts">
         <div class="panel-heading book_hre_boo_rqssts">Book List</div>
         <div class="panel-body">
          <div class="table-responsive col-lg-12">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                 <th> S No.</th>
                 <th> Class</th>
                 <th> Section</th>
                 <th> Roll no</th>
                 <th> Title</th> 
                 <th> Author</th>
                 <th>Book Category</th>
                 <th>Date</th>
                 <th>Day</th>
              
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> 1</td>
                  <td> 12th</td>
                  <td> A</td>
                  <td> 23</td>
                  <td>  d wdbbd</td>
                  <td> BDB</td>
                  <td> hindi</td>
                  <td> 2018/02/10</td>
                  <td> 4</td>
                  
                </tr>

                 <tr>
                  <td> 2</td>
                  <td> 12th</td>
                  <td> A</td>
                  <td> 23</td>
                  <td>  d wdbbd</td>
                  <td> BDB</td>
                  <td> hindi</td>
                  <td> 2018/02/10</td>
                  <td> 4</td>
                 
                </tr>
                
             
             
              </tbody>
            </table>

          </div>
         </div>
       </div>
    </div>
  </div>
</div>
    <!-- </div> -->
  <!-- </div> -->
</div>



 <style type="text/css">

 	.books_retuns_clmnss{
 		padding: 0px;
 	}

 	.books_retuns_hdss{
 		text-align: center;
 		color: gray;
 		font-family: -webkit-body;
 	}

 	.books_pnls_returnss{
 		color: gray;
 		font-family: -webkit-body;
 		border-radius: 0px;
 	}

 	.books_books_rtrn{
 		text-align: center;
 		color: gray !important;
 		font-family: -webkit-body;
 		font-size: 18px;
 	}

 	.books_pnnlss_clmns{
 		margin-top: 16px;
 	}

 	.books_pnn_btnss{
 		border-radius: 0px;
 	}

 	.books_pnn_strss{
 		color: red;
 	}

 	.books_pnn_agn_pnls{
    border: 1px solid #8080803b;
    padding: 0px;
 	}

 	.books_retun_eyes{
 		font-size: 18px;
 	}
.book_hre_reqst {
    border-radius: 0px !important;
    color: gray;
    font-family: -webkit-body;
    font-size: 18px;
}


 </style>