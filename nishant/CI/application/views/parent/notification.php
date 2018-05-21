<div class="container well notification_front" id="page-wrapper"> <?php //print_r($noti);?>
<h3 class="notification_hdding">Respond Your Notification</h3>
<?php 
foreach ($noti as $key => $value) {
 $value['request_id'];?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 notification_marginn"> 
<img src="<?php echo base_url();?>/application/assets/images/user.jpg" class="img-thumbnail" width="100">
</div>
<div class="col-lg-9 col-md-9 col-sm-4 col-xs-4 notification_marginn"> 

<div class="ss pull-right">
<p><?php  $value['request_id'];  ?>  </p><?php echo  $value['request_send'];?> send  you request  to allow your child as a <?php echo  $value['relation']; ?> into their email...  </p>
           	   	   </div>
           	   	   </div>
           	       </div>



<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="notification_bbtn pull-right">
<a href="<?php echo base_url();  ?>/index.php/parent_controller/approved/<?php echo $value['request_id'];  ?>"><button type="submit" class="btn btn-primary notification_Confirm_bttn" value="<?php echo $value['request_id'];  ?>" name='request_id'>Approved</button></a>
<a href="<?php echo base_url();?>/index.php/parent_controller/request_del/<?php echo $value['request_id'];?>"><button type="button" class="btn btn-default notification_Confirm_bttn">Delete</button></a>
</div>
</div>
<?php echo  $value['send_date'];  ?>
           </div>

         <?php   
       } 
        ?>  
	
         </div>