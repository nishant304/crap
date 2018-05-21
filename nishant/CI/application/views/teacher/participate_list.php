
<?php 
$user_listedd=explode(',',$role_autho[0]['participate_list']);
echo $user_listedd1=$user_listedd[0];
echo $user_listedd2=$user_listedd[1];
echo $user_listedd3=$user_listedd[2];
   ?>
<?php if($user_listedd1==1 || $user_listedd1==2  ||$user_listedd1==3 ||$user_listedd2==1 || $user_listedd2==2  ||$user_listedd2==3 || $user_listedd3==1 || $user_listedd3==2  ||$user_listedd3==3)
{     ?>

<div  id="page-wrapper">
  <div class="col-lg-12 top_to">
<div class="col-lg-6 head_next_frms1 table-responsive">          
  <table class="table table-hover ">
    <thead>
      <tr class="active" style="height: 50px;">
        <th>S.No.</th>
        <th>Event Id</th>
        <th>Student Id</th>
        <th>Status</th>
        <th>Manage</th>
        
        </tr>
    </thead>
    <tbody>
    <?php $i=1;
     foreach ($results as $key => $value1) { 
      if($value1['participate_status'] == 1)
      {
          $value = "Accepted";
      }
      else
      {
        $value = "Pending";
      }
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value1['event_id']; ?></td>
        <td><?php echo $value1['std_id']; ?></td>
        <td><?php echo $value; ?></td>
        <td>
          <?php if($user_listedd1==1 && $user_listedd2==2 || $user_listedd1==2){     ?>
          <a href="#"><i class="fa fa-pencil head_pen_head " aria-hidden="true"></i></a>
           <?php  }   ?>
           <?php if($user_listedd1==1 && $user_listedd3==3||$user_listedd1==1 && $user_listedd2==3||$user_listedd1==3||$user_listedd2==3){     ?>
            <a href="#"><i class="fa fa-times head_pen_head" aria-hidden="true"></i></a>
            <?Php  }  ?>
        </td>
      </tr>  
   <?php $i++; }  ?>
     
   </tbody>
  </table>
    <center><p class="pagination_link"><?php echo $links; ?></p></center>
</div>
</div>
</div>

<?php  }  ?>