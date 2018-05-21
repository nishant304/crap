<!--footer-->
<?php

foreach ($result_std['selected_student'] as $key) {
  $key['std_class'];
}
 ?>
</body>
</html>


<script src="<?php echo base_url();?>application/assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>application/assets/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>application/assets/js/Chart.js"></script>
<script src="<?php echo base_url();?>application/assets/js/underscore-min.js" type="text/javascript"></script>
<script src= "<?php echo base_url();?>application/assets/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/assets/js/clndr.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>application/assets/js/custom.js"></script>
<script src="<?php echo base_url();?>application/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>application/assets/js/scripts.js"></script>
<script src="<?php echo base_url();?>application/assets/js/bootstrap.js"> </script>
<script src="<?php echo base_url();?>application/assets/js/classie.js"></script>
<script src="<?php echo base_url();?>application/assets/js/jquery-ui.js"></script>
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
        <script type="text/javascript">
   $(function() {
        $('#select_class').change(function(){
            $('.box').hide();
            $('#' + $(this).val()).show();
        });
    });
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


<script type="text/javascript">
    function stu_class(value)
{

$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_record_section/"+value+"/",  
    data    : {'uristring':value},
    success : function(data){
       
        $("#tabbb_section").html(data);
    }
});


$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/teacher_controller/class_record_sub/"+value+"/",  
    data    : {'uristring':value},
    success : function(data){
       
        $("#tabbb1").html(data);
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

$( "#datepicker" ).datepicker({
  inline: true,
  maxDate:new Date(),
  // minDate:new Date()
});

$( "#datepicker1" ).datepicker({
  inline: true,
  maxDate:new Date(),
  minDate:new Date()
});
</script>





<script type="text/javascript">

  function stu_cls(value)
  {
    var class_ajx = document.getElementById('clss_data').value;
    $.ajax({

      type    :  "POST",
      url     :  "<?php echo base_url(); ?>index.php/teacher_controller/all_section/"+class_ajx+"/",
      data    :  {'class3':class_ajx},
      success :function(data){
        
        $("#sec_get").html(data);

      }

    });

  }

  function stu_sec(value)
  {
    var sec_ajx = document.getElementById('sec_get').value;
    var class_ajx = document.getElementById('clss_data').value;
    $.ajax({
      type    : "POST", 
      url     : "<?php echo base_url(); ?>index.php/teacher_controller/stu_ajx_fetch/"+class_ajx+"/"+sec_ajx+"/",
      data    :  {'class3':class_ajx,'sec3':sec_ajx},
      success : function(data)
      {
         $("#std").html(data);
         alert(data);

      }
    })
  }

    
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#stf_pic').click(function(){
    $('#pic').trigger("click");
  });
});
</script>
<!-- End   =============================  -->

<script>
var toggle_disabled = function( e ) {
for(var i=1;i<=2;i++){
var input = document.getElementById('myInputId'+i);
input.disabled = !(input.disabled); 
 }
};
var button = document.getElementById('toggle_button');
button.addEventListener( 'click', toggle_disabled);
</script>

<script type="text/javascript">
  $('#toggle_button').click(function(){
    $('#toggle_button').hide();
    $('#save').show(); 
  });

  $('#save').click(function(){
    $('#toggle_button').show();
    $('#save').hide(); 
  });
</script>