    <table  class="table table-bordered">

        	<th>STUDENT NAME</th>
        	<th>MARKS OBTAINED</th> 
        	<?Php
$class_id = $this->input->post('clss');
$class_section = $this->input->post('secc');
$xam_date = $this->input->post('xam_date');
$exam_type = $this->input->post('xam');
$subject = $this->input->post('sub');

foreach ($result_std["result_std"] as $key) {
$std_id=$key['std_id'];
$result_mark["result_mark"]=$this->login_model->std_marks($class_id,$class_section,$subject,$exam_type,$xam_date,$std_id);
print_r($result_mark["result_mark"][0]['marks_obtain']);


        	?>
<tr>
<td>

<input type="hidden" name="std_id"  id="std_id<?Php echo $key['std_id']; ?>"  value="<?Php echo $key['std_id']; ?>">
   <?php echo $key['std_fname']." ". $key['std_lname']; ?>
  </td> <td><input type="text" value="<?php echo $result_mark["result_mark"][0]['marks_obtain'];   ?>" id="std_std<?Php echo $key['std_id']; ?>"  class="marks_obtained" name="marks_obtain"  onblur="marks_obtained<?Php echo $key['std_id']; ?>(this.value);"></td><tr> 
             
<script type="text/javascript">
function marks_obtained<?Php echo $key['std_id']; ?>(value)
{
var sstd_id=document.getElementById("std_id<?Php echo $key['std_id']; ?>").value;
var std_classs=document.getElementById("std_classs").value;
var tabbb_section=document.getElementById("tabbb_section").value;
var std_sub=document.getElementById("tabbb1").value;
var xam_typ=document.getElementById("tabbb23").value;
var xam_date=document.getElementById("tabbb231").value;
var exam_id_sec=document.getElementById("exam_id_sec").value;
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/class_marks_insert/"+value+"/"+sstd_id+"/"+std_classs+"/"+tabbb_section+"/"+std_sub+"/"+xam_typ+"/"+xam_date+"/"+exam_id_sec+"/",  
    data    : {'marks_obtain':value,'class_id':std_classs,'class_section':tabbb_section,'subject':std_sub,'exam_type':xam_typ,'batch':xam_date,'exam_id':exam_id_sec,'std_id':sstd_id},
    success : function(data){
       
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
<?Php }  ?>
</table>