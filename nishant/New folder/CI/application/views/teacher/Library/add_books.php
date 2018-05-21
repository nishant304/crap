<?php 
$user_listedd=explode(',',$role_autho[0]['add_books']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>
 <div id="page-wrapper">
   <!-- <h2 class="books_adds">Add Books</h2> -->
     <ul class="nav nav-tabs">
       <li class="active"><a data-toggle="tab" href="#home"  class="books_hrff">Add Books</a></li>
         <li><a data-toggle="tab" href="#menu1" class="books_hrff">Book List</a></li>
<!--     <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
     </ul>

  <div class="tab-content">
<?php
// echo "<pre>";

     $libclass   = $all['class'];
     $libcategory   = $all['category'];
    
// print_r($book_add);
?>

    <div id="home" class="tab-pane fade in active">
       <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
                <?php echo form_open('admission/addlibrarybooks'); ?>
                <?php }  ?>
         <div class="panel panel-default books_panel_dflts">
           <div class="panel-heading books_panel_bookss">Add Books</div>
             <div class="panel-body">

              <div class="col-lg-12 ">
                <div class="col-lg-6 books_panel_clmns">
                  <label>Class<span class="books_panel_strs_cl">*</span></label>
                  <select name="Class" class="form-control" >
                    <option>select</option>
                    <?php 
                    foreach ($libclass as $key => $value) {
                    ?>
                    <option value="<?php echo $value['class_name']; ?>"> <?php echo $value['class_name']; ?></option>
                    <?php  } ?>
                  </select>
                  
                </div>
                  <div class="col-lg-6 books_panel_clmns">
                <label>Book Category<span class="books_panel_strs_cl">*</span></label>
                  <select name="Course" class="form-control books_panel_dflts">
                    <option>select</option>

                    <?php  
                     foreach ($libcategory as $key => $value) {
                    ?> 
                       <option value="<?php echo $value['Categoryname']; ?>" ><?php echo $value['Categoryname']; ?></option>
                      <?php  } ?> 
                  </select>
              </div>
              
               <div class="col-lg-6 books_panel_clmns">
                  <label>Author<span class="books_panel_strs_cl">*</span></label>
                  <input type="text" name="Author" class="form-control books_panel_dflts">
                </div>

                <div class="col-lg-6 books_panel_clmns">
                  <label>Title<span class="books_panel_strs_cl">*</span></label>
                  <input type="text" name="Title" class="form-control books_panel_dflts">
                </div>

               
           		<div class="col-lg-6 books_panel_clmns">
           			<label>Book ISBN No.<span class="books_panel_strs_cl">*</span></label>
           			<input type="text" name="Book_ISBN_No" class="form-control books_panel_dflts">
           		</div>
           		<div class="col-lg-6 books_panel_clmns">
           			<label>Book cost<span class="books_panel_strs_cl">*</span></label>
           			<input type="text" name="Book_cost" class="form-control books_panel_dflts">
           		</div>
           
           		<div class="col-lg-6 books_panel_clmns">
           			<label>Edition<span class="books_panel_strs_cl">*</span></label>
           			<input type="text" name="Edition" class="form-control books_panel_dflts">
           		</div>
           		
       
           		<div class="col-lg-6 books_panel_clmns">
           			<label>Publisher<span class="books_panel_strs_cl">*</span></label>
           			<input type="text" name="Publisher" class="form-control books_panel_dflts">
           		</div>
           		<div class="col-lg-6 books_panel_clmns">
           			<label>No.of Copies<span class="books_panel_strs_cl">*</span></label>
                <select class="form-control" name="No_of_Copies">
                    <option>select</option>

               
             <?php  
              for ($x = 1; $x <= 30; $x++) {
              echo "<option>$x</option> ";
              }
              ?>  
                </select>
           		</div>
          
           		<div class="col-lg-6 books_panel_clmns">
           			<label>Shelf No.<span class="books_panel_strs_cl">*</span></label>
                <select class="form-control" name="Shelf_No">
                    <option>select</option>

                  <?php
                  for ($x=1; $x <=40 ; $x++) 
                  { 
                    echo "<option>$x</option> ";
                  }
                  ?>
                </select>

           		</div>
          
            <div class="col-lg-6 books_panel_clmns">
                <label>Book Condition<span class="books_panel_strs_cl">*</span></label>
                  <select name="Book_Condition" class="form-control books_panel_dflts">
                         <option value="Select ">Select ....</option>
                         <option value ="Poor">Poor</option>
                         <option value="Good">Good</option>
                         <option value="Very good">Very good</option>
                         <option value="Execellent">Execellent</option>
                     </select>
              </div>

           
           		<div class="col-lg-6 books_panel_clmns">
           			<label>Language<span class="books_panel_strs_cl">*</span></label>
                <select class="form-control" name="Language">
                  <option>select</option>
                  <option>English</option>
                  <option>Hindi</option>
                  <option>Others...</option>
                </select>
           		</div>
          <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?> 

           	<div class="col-lg-12 books_panel_clmns">
           		<center>
           			<button type="submit" class="btn btn-danger books_panel_btnss">Save</button>
           		</center>
           	</div>
            <?php  }   ?>
        </div>
           </div>
         </div>
    <?php echo form_close(); ?>
    </div>




    <div id="menu1" class="tab-pane fade">
      
        <div class="panel panel-default books_panel_dflts">
          <div class="panel-heading books_panel_bookss">Book List</div>
           <div class="panel-body">
          	 <div class="col-lg-12">
               <form>
                 <center>
                  <input type="text" class="form-control books_ads_btns  " placeholder="Search.." name="search">
                  </center>
              </form>
          	 </div>

          	 <div class=" table-responsive col-lg-12 books_ads_tblss">
          	 	<table class="table table-bordered">
          	 		<thead>
          	 			<tr>
          	 				<th> S No.</th>
          	 				<th> Class</th>
          	 				<th> Author</th>
          	 				<th> Book ISBN No</th>
          	 				<th> Book cost</th>
                    <th> Edition</th>
                    <th> Book Category</th>
                    <th> Publisher</th>
                    <th> No.of Copies</th>
                    <th> Shelf No</th>
                    <th> Book Condition</th>
                    <th> Language</th>
          	 				<th> Manage</th>
          	 			</tr>
          	 		</thead>

          	 		<tbody>
          	 		     <?php 
                            foreach ($book_add as $key => $value) {
                            ?>  
                           
                      <tr>
                        <td><?php echo $value['id']; ?></td>

                        <td>
                           <?php echo $value['Class']; ?>
                        </td>

                          <td>
                          <?php echo $value['Author']; ?>
                        </td>

                          <td>
                          <?php echo $value['BookISBNNo']; ?>
                        </td>

                          <td>
                          <?php echo $value['Bookcost']; ?>
                        </td>

                        <td>
                          <?php echo $value['Edition']; ?>
                        </td>

                        <td>
                          <?php echo $value['BookCategory']; ?>
                        </td>

                        <td>
                          <?php echo $value['Publisher']; ?>
                        </td>

                        <td>
                          <?php echo $value['NoofCopies']; ?>
                        </td>

                        <td>
                          <?php echo $value['ShelfNo']; ?>
                        </td>

                        <td>
                          <?php echo $value['BookCondition']; ?>
                        </td>

                        <td>
                          <?php echo $value['Language']; ?>
                        </td>

                        <td>
                        <a href="#">
                  <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                    <?Php  } ?>
                     <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
                                  <i class="fa fa-times" aria-hidden="true"></i>
                                  <?Php  }  ?>
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
</div>
<?php   }   ?>

 <style type="text/css">
 	
 	.books_ads_btns{
 		width: 20%;
 		border-radius: 0px !important;
 	}


 	.books_adds{
 		color: gray;
 		font-family: -webkit-body;
 		text-align: center;

 	}

 	.books_hrff{
 		color: gray;
 		font-family: -webkit-body;
 		font-size: 22px;
 		border-radius: 0px !important;
 	}

 	.books_panel_dflts{
 		color: gray;
 		font-family: -webkit-body;
 		border-radius: 0px !important;

 	}

 	.books_panel_bookss{
 		color: gray !important;
 		font-family: -webkit-body;
 		text-align: center;
 		font-size: 18px;
 	}

 	.books_panel_clmns{
 		margin-top: 18px;
 	}

 	.books_panel_btnss{
 		border-radius: 0px;
 	}

 	.books_panel_strs_cl{
 		color: red;
 	}
 	.books_ads_tblss{
 		margin-top: 10px;
 	}

 	.books_pncills{
 		font-size: 20px;
 	}


 </style>