<?php 
$user_listedd=explode(',',$role_autho[0]['add_request']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>


<div id="page-wrapper">

<?php

     $libclass   = $all['class'];
     $libcategory   = $all['category'];
     $bookadd   = $all['Title'];
     $msg   = $all['msg'];
     $book_issued_student   = $all['book_issued_student'];

    
// print_r($libclass);
?>

  <!-- <h2 class="book_request_hedrss">Book Request</h2> -->
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" class="book_hre_reqst">Book Request</a></li>
    <li><a data-toggle="tab" href="#menu1" class="book_hre_reqst">Book Issue</a></li>
<!--     <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>


  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="panel panel-default book_hre_pnls_dflts">
          <div class="panel-heading book_hre_boo_rqssts">Book Request </div>
          <div style="color: red; text-align: center; font-size: 22px;"><?php print_r($msg); ?></div>
          <div class="panel-body ">
      <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>       
    <?php echo form_open('admission/addrequestbooks'); ?>
    <?php } ?>
          	<div class="col-lg-12">

              <div class="col-lg-6 ">
                <label>Class<span class="book_hre_clrss">*</span></label>
                <!-- <input type="text" name="Class" class="form-control "> -->
                 <select name="Class" class="form-control" id="class_vlu" onchange="getcalsslibrary(this.value)" >
                    <option>select</option>
                    <?php 
                    foreach ($libclass as $key => $value) {
                    ?>
                    <option value="<?php echo $value['class_name']; ?>"> <?php echo $value['class_name']; ?></option>
                    <?php  } ?>
                  </select>
              </div>
              <div class="col-lg-6 ">
                <label>Section<span class="book_hre_clrss">*</span></label>
                <!-- <input type="text" name="Section" class="form-control "> -->
          <select name="Section" class="form-control class_section" onchange="getrollnolibrary(this.value)">
                  <option>select..</option>
                </select>
              
              </div>
               <div class="col-lg-6 books_panel_clmns">
                <label>Roll No<span class="book_hre_clrss">*</span></label>
                <select name="Roll_No" class="form-control class_roll_no">
                  <option>select..</option>
                </select>
              </div>
              
              <div class="col-lg-6 books_panel_clmns">
                 <label>Book Category<span class="book_hre_clrss">*</span></label>
                <select name="Book_Category" class="form-control books_panel_dflts" onchange="getcatgorylibrary(this.value)" id="book_cat">
                    <option>select</option>

                    <?php  
                     foreach ($libcategory as $key => $value) {
                      print_r($value);
                    ?> 
                       <option value="<?php echo $value['Categoryname']; ?>" ><?php echo $value['Categoryname']; ?></option>
                      <?php  } ?> 
                  </select>
              </div>
               
                <div class="col-lg-6 books_panel_clmns">
                 <label>Author<span class="book_hre_clrss">*</span></label>
                <select name="Author" id="book_auth" class="form-control addauthor" onchange="getauthorlibrary(this.value)">
                  <option>select..</option>
                </select>
              </div>
              

               <div class="col-lg-6 books_panel_clmns">
                 <label>Title<span class="book_hre_clrss">*</span></label>
                  <select name="Title" id="title" class="form-control title"  onchange="getpublisherlibrary(this.value)">
                    <option>select</option>

                
                  </select>
              </div>

                <div class="col-lg-6 books_panel_clmns">
                 <label>Publisher<span class="book_hre_clrss">*</span></label>
                  <select name="Publisher" id="publish" class="form-control publisher" onchange="getbookedition(this.value)">
                    <option>select</option>

                
                  </select>
              </div>

                <div class="col-lg-6 books_panel_clmns">
                 <label>Edition<span class="book_hre_clrss">*</span></label>
                  <select name="Edition" class="form-control Edition">
                    <option>select</option>

                
                  </select>
              </div>

                <div class="col-lg-6 books_panel_clmns">
                 <label>Date<span class="book_hre_clrss">*</span></label>
                <input type="text" class="form-control" id="datepicker" name="Date">
              </div>

               <div class="col-lg-6 books_panel_clmns">
                 <label>Day<span class="book_hre_clrss">*</span></label>
                <input type="text" class="form-control" name="Day">
              </div>

        
<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>

          		<div class="col-lg-12 boo_rqsts">
          			<center><button type="submit" class="btn btn-danger boo_rqsts_svxs">Issue</button></center>
              </div>
              <?php  }  ?>
            </div>
        <?php echo form_close(); ?>


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
                           <th>Class</th>
                           <th>Section</th>
                           <th>RollNo</th>
                           <th>Title</th>
                           <th>Author</th> 
                           <th>BookCategory</th>
                           <th>Publisher</th>
                           <th>Edition</th>
         				</tr>
         			</thead>
         			<tbody>
                 <?php 

              foreach ($book_issued_student as $key => $value) {
               if($value['issue'] == 1){
               unset($book_issued_student[$key]);
                  
                }}
                  foreach ($book_issued_student as $finalkey => $finalvalue) {

     ?>
         				<tr>
                  <td> <?php echo $finalvalue['Class'] ?></td>
                  <td> <?php echo $finalvalue['Section'] ?></td>
                  <td> <?php echo $finalvalue['RollNo'] ?></td>
                  <td> <?php echo $finalvalue['Title'] ?></td>
                  <td> <?php echo $finalvalue['Author'] ?></td>
                  <td> <?php echo $finalvalue['BookCategory'] ?></td>
                  <td> <?php echo $finalvalue['Publisher'] ?></td>
                  <td> <?php echo $finalvalue['Edition'] ?></td>
               
         					
         				</tr>
         				
       <?php  		         }

?>
         			</tbody>
         		</table>
         	</div>
         </div>
       </div>
    </div>
  </div>
</div>
<?php  }  ?>



 <style type="text/css">
 	.boo_rqsts{
 		margin-top: 24px;
 	}

 	.boo_rqsts_svxs{
 		border-radius: 0px;
 	}
   
   .book_request_hedrss{
   	text-align: center;
   	color: gray;
   	font-family: -webkit-body;
   }

   .book_hre_reqst{
   	 border-radius: 0px !important;
   	 color: gray;
   	 font-family: -webkit-body;
   	 font-size: 18px;
   }

   .book_hre_pnls_dflts{
   	font-family: -webkit-body;
   	color: gray;
   	border-radius: 0px !important
   }

   .book_hre_boo_rqssts{
   	color: gray !important;
   	font-family: -webkit-body;
   	text-align: center;
   	font-size: 18px;
   }
   .book_hre_boo_inputss{
   	border-radius: 0px;
   }
   .book_hre_clrss{
   	color: red;
   }
   .books_panel_clmns{
    margin-top: 18px;
  }


 </style>

 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>