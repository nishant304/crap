<?php
foreach ($result_std['selected_student'] as $key) {
echo  $key['std_class'];
}
 ?>

</body>
</html>

<script src='<?php echo base_url();?>application/assets/js/moment.min.js'></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src='<?php echo base_url();?>application/assets/js/fullcalendar.min.js'></script>
<script src="<?php echo base_url();?>application/assets/js/canvas.js"></script>
<script src="<?php echo base_url();?>application/assets/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>application/assets/js/Chart.js"></script>
<script src="<?php echo base_url();?>application/assets/js/underscore-min.js" type="text/javascript"></script>
<script src= "<?php echo base_url();?>application/assets/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>application/assets/js/custom.js"></script>
<script src="<?php echo base_url();?>application/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>application/assets/js/scripts.js"></script>
<script src="<?php echo base_url();?>application/assets/js/bootstrap.js"> </script>
<script src="<?php echo base_url();?>application/assets/js/classie.js"></script>
<!-- <script src="<?php// echo base_url();?>application/assets/js/jquery-ui.js"></script> -->
<script src="<?php echo base_url();?>application/assets/js/graph.js"></script>

<!-- claender start -->

<script>
 $(document).ready(function() {
 $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2018-02-12',
      navLinks: true, 
      editable: true,
      selectable: true,
      eventLimit: true, 
       events: [
        {
          title: 'All Day Event',
          start: '2018-02-01'
        },
        {
          title: 'Long Event',
          start: '2018-02-07',
          end: '2018-02-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-02-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-02-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2018-02-11',
          end: '2018-02-13'
        },
        {
          title: 'Meeting',
          start: '2018-02-12T10:30:00',
          end: '2018-02-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2018-02-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2018-02-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2018-02-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2018-02-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2018-02-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2018-02-28'
        }
      ],
      loading: function(bool) {
        $('#loading').toggle(bool);
      },
      eventRender: function(event, el) {
        // render the timezone offset below the event title
        if (event.start.hasZone()) {
          el.find('.fc-title').after(
            $('<div class="tzo"/>').text(event.start.format('Z'))
          );
        }
      },
      dayClick: function(date) {
        console.log('dayClick', date.format());
      },
      select: function(startDate, endDate) {
        console.log('select', startDate.format(), endDate.format());
      }
    });

    // load the list of available timezones, build the <select> options
    $.getJSON('php/get-timezones.php', function(timezones) {
      $.each(timezones, function(i, timezone) {
        if (timezone != 'UTC') { // UTC is already in the list
          $('#timezone-selector').append(
            $("<option/>").text(timezone).attr('value', timezone)
          );
        }
      });
    });

    // when the timezone selector changes, dynamically change the calendar option
    $('#timezone-selector').on('change', function() {
      $('#calendar').fullCalendar('option', 'timezone', this.value || false);
    });
  });

</script>
<!-- claender end -->






<script type="text/javascript">
    function stu_class(value)
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

<script>
$(function () {
        $("#select_all").change(function () {
            $('.sto_name').prop('checked', this.checked);
        });
        $(".sto_name").change(function () {
            if ($(".sto_name").length == $(".sto_name:checked").length) {
                $('#select_all').prop('checked', this.checked);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>
 <script>
            var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
                showLeftPush = document.getElementById( 'showLeftPush' ),
                body = document.body;
                
            showLeftPush.onclick = function() {
                classie.toggle( this, 'active' );
                classie.toggle( body, 'cbp-spmenu-push-toright' );
                classie.toggle( menuLeft, 'cbp-spmenu-open' );
                disableOther( 'showLeftPush' );
            };
            

            function disableOther( button ) {
                if( button !== 'showLeftPush' ) {
                    classie.toggle( showLeftPush, 'disabled' );
                }
            }
        </script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableData");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>

$("#datepicker").datepicker({
  inline: true,
  dateFormat: 'yy/mm/dd',
 
});
</script>

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

$(document).ready(function(){
  $("#pic1").click(function(){
  $("#pic").trigger('click');
});
});

 $('.std_pro_edit').click(function(){
    $('.std_pro_edit').hide();
    $('.std_pro_save').show(); 
  });

  $('.std_pro_save').click(function(){
    $('.std_pro_edit').show();
    $('.std_pro_save').hide(); 
  });



</script>
<script type="text/javascript">
$(document).ready(function () {
    setInterval(refreshPartial, 5000)
});
function refreshPartial() {
  $.ajax({
    url: "http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']",
    dataType: 'script',
    format: 'js'
 });
}


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

  $.each(data, function(key,val){
               var opt = $('<option class="add_titl">'+val.Title+'</option>'); 
                    $('.title').append(opt);
                    });


    }
  });

}




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
<script type="text/javascript">
  $("#select_vlu").change(function(){
    if($(this).val() == 2){
      $(".value_show").show();
      $(".value_show_dep").hide();
    }else{
      $(".value_show").hide();
      $(".value_show_dep").show();
    }

    
});
 </script>


<script type="text/javascript">
function abcaa(value){
 // var from_cls = document.getElementById("fromm").value;
 
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/cls_value/"+value+"/",
    data    : {'value':value
  },
  success : function(data){
  $('#to_cls').html(data);

  }

  });

  }
 </script>

<script type="text/javascript">

    $("#yu").click(function(){  
       $("#fa").css({"margin-left": "1125px"});
       $("#fa").css({"transition": "1s"});
      
    });


</script>


<script type="text/javascript">
// header color////
function black() {
  
  var black='black';
document.getElementById("my").style.backgroundColor = "black";
document.getElementById("showLeftPush").style.backgroundColor = "black";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });


}

function blue() {
   var black='blue';
document.getElementById("my").style.backgroundColor = "blue";
document.getElementById("showLeftPush").style.backgroundColor = "blue";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){

  }

  });
}

function fuchsia() {
   var black='fuchsia';
document.getElementById("my").style.backgroundColor = "fuchsia";
document.getElementById("showLeftPush").style.backgroundColor = "fuchsia";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function green() {
var black='green';
document.getElementById("my").style.backgroundColor = "green";
document.getElementById("showLeftPush").style.backgroundColor = "green";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function orange() {
  var black='#c44000';
document.getElementById("my").style.backgroundColor = "#c44000";
document.getElementById("showLeftPush").style.backgroundColor = "#c44000";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function purple() {
  var black='purple';
document.getElementById("my").style.backgroundColor = "purple";
document.getElementById("showLeftPush").style.backgroundColor = "purple";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function red() {
  var black='red';
document.getElementById("my").style.backgroundColor = "red";
document.getElementById("showLeftPush").style.backgroundColor = "red";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function oil() {
  var black='#808000';
document.getElementById("my").style.backgroundColor = "#808000";
document.getElementById("showLeftPush").style.backgroundColor = "#808000";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function white() {
  var black='white';
document.getElementById("my").style.backgroundColor = "white";
document.getElementById("showLeftPush").style.backgroundColor = "white";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function brown() {
  var black='brown';
document.getElementById("my").style.backgroundColor = "brown";
document.getElementById("showLeftPush").style.backgroundColor = "brown";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function yellow() {
  var black='yellow';
document.getElementById("my").style.backgroundColor = "yellow";
document.getElementById("showLeftPush").style.backgroundColor = "yellow";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}

function lgreen() {
  var black='#00ff00';
document.getElementById("my").style.backgroundColor = "#00ff00";
document.getElementById("showLeftPush").style.backgroundColor = "#00ff00";
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed/"+black+"/",
    data    : {'black':black
  },
  success : function(data){
 
  }

  });
}
// hearder color //



// sidebar color////
function black1() {
 
  document.getElementById("cbp-spmenu-s1").style.backgroundColor = "black";
    var black1='black';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){

  }

  });





}

function blue1() {
  document.getElementById("cbp-spmenu-s1").style.backgroundColor = "blue";
  var black1='blue';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });


}

function fuchsia1() {
  var black1='fuchsia';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "fuchsia";
}

function green1() {
  var black1='green';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "green";
}

function orange1() {
  var black1='#c44000';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "#c44000";
}

function purple1() {
  var black1='purple';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "purple";
}

function red1() {
  var black1='red';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "red";
}

function oil1() {
  var black1='#808000';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "#808000";
}

function white1() {
  var black1='white';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "white";
}

function brown1() {
  var black1='brown';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "brown";
}

function yellow1() {
  var black1='yellow';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "yellow";
}

function lgreen1() {
  var black1='#00ff00';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed1/"+black1+"/",
    data    : {'black':black1
  },
  success : function(data){
 
  }

  });

document.getElementById("cbp-spmenu-s1").style.backgroundColor = "#00ff00";
}
// sidebar color////



// body color////
function black2() {

document.getElementById("page-wrapper").style.backgroundColor = "black";
 var black2='black';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
    if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }


  }

  });

}

function blue2() {
document.getElementById("page-wrapper").style.backgroundColor = "blue";
 var black2='blue';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function fuchsia2() {
document.getElementById("page-wrapper").style.backgroundColor = "fuchsia";
 var black2='fuchsias';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function green2() {
document.getElementById("page-wrapper").style.backgroundColor = "green";
 var black2='green';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function orange2() {
document.getElementById("page-wrapper").style.backgroundColor = "#c44000";
 var black2='#c44000';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function purple2() {
document.getElementById("page-wrapper").style.backgroundColor = "purple";
 var black2='purple';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function red2() {
document.getElementById("page-wrapper").style.backgroundColor = "red";
 var black2='red';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function oil2() {
document.getElementById("page-wrapper").style.backgroundColor = "#808000";
 var black2='#808000';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function white2() {
document.getElementById("page-wrapper").style.backgroundColor = "white";
 var black2='white';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function brown2() {
document.getElementById("page-wrapper").style.backgroundColor = "brown";
 var black2='brown';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function yellow2() {
document.getElementById("page-wrapper").style.backgroundColor = "yellow";
 var black2='yellow';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}

function lgreen2() {
document.getElementById("page-wrapper").style.backgroundColor = "#00ff00";
 var black2='#00ff00';
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/color_feed2/"+black2+"/",
    data    : {'black2':black2
  },
  success : function(data){
   if(data)
    {
setTimeout(function(){
   window.location.reload(1);
}, 500);
    }
  }

  });
}
// body color////






function closeNav() {
document.getElementById("fa").style.cssText = "margin-left: 1400px; transition: 1s;";
}



  $( function() {
    $( "#side-menu" ).sortable();
    $( "#side-menu" ).disableSelection();
  } );




  $("#yu").click(function(){
    var x = document.getElementById("bu");
    if (x.style.display === "none") {
        x.style.display = "block";
   $("#yu").css("margin-left", "0px");
  $("#fa").css("margin-left", "1400px");
    } else {
        x.style.display = "none";
    $("#yu").css("margin-left", "-238px");
    }

    
   
});
 

    $("#mySidenav").click(function(){
    $("#yu").css("margin-left", "0px");    
});

</script>
 <div class="footer">
       <p>&copy; 2018 School Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">tecinso.in</a></p>
    </div>
      
 </body>
  </html>