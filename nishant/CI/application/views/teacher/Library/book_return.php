<?php 
$user_listedd=explode(',',$role_autho[0]['books_request']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>

     
<div id="page-wrapper">
  <?php

     $libclass   = $all['class'];


?>
<?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?> 
<?php echo form_open('teacher_controller/book_return'); ?>
<?php }  ?>
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

 <?php  }  ?>


 <script type="text/javascript">
function getcalsslibrary(value){
$('.section').remove();
  $.ajax({
    type : "POST",
    url  : "getcalsslibrary",
    data : {'click_value':value},
    dataType: "json",
    success :function(data){


  $.each(data, function(key,val){
               var opt = $('<option class="section">'+val.class_section+'</option>'); 
                    $('.class_section').append(opt);
                    });


    }
  });

}

function getrollnolibrary(value){
  var class_vlu =document.getElementById('class_vlu').value;
 
$('.roll_no').remove();
  $.ajax({
    type : "POST",
    url  : "getrolllibrary",
    data : {'class_section':value, 'class':class_vlu },
    dataType: "json",
    success :function(data){


  $.each(data, function(key,val){
               var opt = $('<option class="roll_no">'+val.std_roll_no+'</option>'); 
                    $('.class_roll_no').append(opt);
                    });


    }
  });

}


function getauthorlibrary(value){
  var book_cat =document.getElementById('book_cat').value;

$('.add_titl').remove();
  $.ajax({
    type : "POST",
    url  : "getauthorlibrary",
    data : {'catgory':value, 'class':book_cat },
    dataType: "json",
    success :function(data){
alert(data);
  $.each(data, function(key,val){
               var opt = $('<option class="add_titl">'+val.Title+'</option>'); 
                    $('.title').append(opt);
                    });


    }
  });

}


 <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>

function getbooklibrary(value){
  var class_vlu =document.getElementById('class_vlu').value;
  var Section_val =document.getElementById('Section_val').value;
$('.REMOVE_TR').remove();
  $.ajax({
    type : "POST",
    url  : "getbooklibrary",
    data : {'RollNo':value, 'class':class_vlu ,'section':Section_val },
    dataType: "json",
    success :function(data){
      
  $.each(data, function(key,val){

  $('<tr class="REMOVE_TR">').html(
    "<td>" + val.id + "</td><td>"
     + val.Class + "</td><td>" 
     + val.Section + "</td><td>"
     + val.RollNo+ "</td><td>"
     + val.Title+ "</td><td>"
     + val.Author+ "</td><td>"
     + val.BookCategory+ "</td><td>"
     + val.Date+ "</td><td>"
     + val.Day+ "</td><td>"
     + '<input  type="text">' + "</td><td>"
     + '<button class="btn btn-succes" type="submit">Edit</button><button class="btn btn-danger" type="submit">Done</button>'+ "</td>"



    ).appendTo('#records_table');
                    });


    }
  });

}
 <?php  }  ?>
function getpublisherlibrary(value){

  var book_cat =document.getElementById('book_cat').value;
  var book_auth =document.getElementById('book_auth').value;

$('.pub').remove();
  $.ajax({
    type : "POST",
    url  : "get_publisher",
    data : {'book_cat':book_cat, 'book_auth':book_auth ,'title':value },
    dataType: "json",
    success :function(data){
     
  $.each(data, function(key,val){ 
    var opt = $('<option class="pub">'+val.Publisher +'</option>'); 
                    $('.publisher').append(opt);
                    });

        
                 


    }
  });

}
function getbookedition(value){

  var book_cat =document.getElementById('book_cat').value;
  var book_auth =document.getElementById('book_auth').value;
  var book_title =document.getElementById('title').value;
 
$('.edi').remove();
  $.ajax({
    type : "POST",
    url  : "getbookedition",
    data : {'book_cat':book_cat, 'book_auth':book_auth ,'title':book_title, 'publisher':value },
    dataType: "json",
    success :function(data){
     console.log(data);
  $.each(data, function(key,val){ 
    var opt = $('<option class="edi">'+val.Edition +'</option>'); 
                    $('.Edition').append(opt);
                    });

    }
  });

}




function getcatgorylibrary(value){
    alert(value);
// $('.section').remove();
  $.ajax({
    type : "POST",
    url  : "getcatgorylibrary",
    data : {'author':value},
    dataType: "json",
    success :function(data){
   // console.log(data);

  $.each(data, function(key,val){
               var opt = $('<option class="add_author">'+val.Author+'</option>'); 
                    $('.addauthor').append(opt);
                    });
 }
  });

}

function getcalss(value){
$('.app').remove();
  $.ajax({
    type : "POST",
    url  : "getclassgate",
    data : {'click_value':value},
    dataType: "json",
    success :function(data){
      

if(value == 2){
        $.each(data, function(key,val){
               var opt = $('<option class="app">'+val+'</option>'); 
                    $('.bb').append(opt);
        });
}else{
  $.each(data, function(key,val){
               var opt = $('<option class="app">'+val.stf_dept+'</option>'); 
                    $('.department_staff').append(opt);
                    });
}


    }
  });

}

function getclassgate(value){
    var department_staff = document.getElementById('department_staff').value;

  $('.repeatname').remove();
  $.ajax({
    type : "POST",
    url  : "gatetimimg",
    data : {'class':value ,'department_staff':department_staff},
    dataType: "json",
    success :function(data){
      if(department_staff == 2){
        $.each(data, function(key,val){
        var opt = $('<option class="repeatname"></option>'); 
        opt.text(val.std_fname + ' ,  '+ val.std_father_name+ ' ,  '+ val.std_permanent_address);
        $('.bbb').append(opt);
        });
      }else{
        $.each(data, function(key,val){
          var opt = $('<option class="repeatname"></option>'); 
          opt.text(val.stf_fname+', '+ val.stf_lname);
          $('.bbb').append(opt);
          });
      }




    }
  });

}


</script>