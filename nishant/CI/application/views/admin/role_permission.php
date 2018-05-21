<div id="page-wrapper">
  <div class="form-group col-lg-5 col-lg-offset-3">
   <?php  $role_perm=$this->session->userdata('role_perm');
           $role_staff=$this->session->userdata('role_staff');
    ?>
    <?php echo form_open('admission/role_auth');?>
    <div class="col-lg-12 pading_o">
    <label class="col-lg-4 control-label">Staff Name</label>
    <div class="input-group col-lg-8">
    <span class="input-group-addon std_fnt" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
    <select name="staff_id" id="selected_staff" class="form-control" onchange="role_staff(this.value);" >
    <option  value="">Select </option>
    <?php foreach ($teacher as $key) {  ?>
    <option  value="<?php echo $key['stf_id'];?>"  <?php if($key['stf_id']==$role_staff){  ?>
    selected   <?php }?> ><?php echo $key['stf_fname']; ?></option>
    <?php  	}   ?>
    </select>
    </div>
    </div>
  </div>
<div class="col-lg-10 col-lg-offset-1" style="margin-top: 30px;">
 <div class="panel panel-default">
    <div class="panel-heading"><b>Authority</b></div>
    <div class="panel-body" style="padding: 0px;">
       <table class="table table-striped" style="margin: 0px;">
    <thead>
      <tr>
        <th class="Authority"><h4 class="Auth">Authority</h4></th>
        <th><h4 class="Auth">Read</h4></th>
        <th><h4 class="Auth">Write</h4></th>
        <th><h4 class="Auth">Delete</h4></th>
      </tr>
    </thead>
    <tbody>
     <tr>
<?php 
$add_user=explode(',',$role_perm[0]['add_user']);
$manage_user=explode(',',$role_perm[0]['manage_user']);
$add_class=explode(',',$role_perm[0]['add_class']);
$add_subject=explode(',',$role_perm[0]['add_subject']);
$add_incharge=explode(',',$role_perm[0]['add_incharge']);

$add_exam=explode(',',$role_perm[0]['add_exam']);
$add_daily_basis=explode(',',$role_perm[0]['add_daily_basis']);
$add_time_table=explode(',',$role_perm[0]['add_time_table']);
$add_notice=explode(',',$role_perm[0]['add_notice']);
$insert_event=explode(',',$role_perm[0]['insert_event']);

$participate_list=explode(',',$role_perm[0]['participate_list']);
$add_notes=explode(',',$role_perm[0]['add_notes']);
$assignment=explode(',',$role_perm[0]['assignment']);

$add_event=explode(',',$role_perm[0]['add_event']);
$event_detail=explode(',',$role_perm[0]['event_detail']);
$lesson_plan=explode(',',$role_perm[0]['lesson_plan']);
$staff_attendance=explode(',',$role_perm[0]['staff_attendance']);
$class_attendance=explode(',',$role_perm[0]['class_attendance']);
$exam_marks=explode(',',$role_perm[0]['exam_marks']);
$test_marks=explode(',',$role_perm[0]['test_marks']);

$assign_subject_teacher=explode(',',$role_perm[0]['assign_subject_teacher']);
$assign_sec_roll=explode(',',$role_perm[0]['assign_sec_roll']);
$add_vehicle=explode(',',$role_perm[0]['add_vehicle']);
$add_routes=explode(',',$role_perm[0]['add_routes']);
$add_driver=explode(',',$role_perm[0]['add_driver']);
$add_destination=explode(',',$role_perm[0]['add_destination']);
$transport_allocation=explode(',',$role_perm[0]['transport_allocation']);
$transport=explode(',',$role_perm[0]['transport']);
$feedback=explode(',',$role_perm[0]['feedback']);
$visitor_entry=explode(',',$role_perm[0]['visitor_entry']);
$promotion=explode(',',$role_perm[0]['promotion']);
$authority=explode(',',$role_perm[0]['authority']);
$books_request=explode(',',$role_perm[0]['books_request']);
$add_request=explode(',',$role_perm[0]['add_request']);

$gallery=explode(',',$role_perm[0]['gallery']);
$library_category=explode(',',$role_perm[0]['library_category']);
$add_books=explode(',',$role_perm[0]['add_books']);
?>  
 <td>Add User</td>
        <td>
        	<input id="a1" type="checkbox" value='1' <?php  for($poi=0;$poi<count($add_user);$poi++){   if($add_user[$poi]=='1'){ ?> checked  <?php  } }   ?>  name="add_user[]"   class="with-font" />
                    <label for="a1"></label>
        </td> 
        <td>
        	<input id="a2" type="checkbox" <?php  for($poi=0;$poi<count($add_user);$poi++){   if($add_user[$poi]=='2'){ ?> checked  <?php  } }   ?> value='2' name="add_user[]"  class="with-font" />
                    <label for="a2"></label>
        </td>
        <td>
        	<!-- <input id="a3" type="checkbox" <?php  for($poi=0;$poi<count($add_user);$poi++){   if($add_user[$poi]=='3'){ ?> checked  <?php  } }   ?> value='3' name="add_user[]"  class="with-font" />
                    <label for="a3"></label> -->
        </td>  
      </tr>
 
      <tr>
        <td>Manage User</td>
        <td>
        	<input id="b1" type="checkbox" <?php  for($poi=0;$poi<count($manage_user);$poi++){   if($manage_user[$poi]=='1'){ ?> checked  <?php  } }   ?> value="1" name="manage_user[]" class="with-font" />
                    <label for="b1"></label>
        </td> 
        <td>
        	<input id="b2" type="checkbox" <?php  for($poi=0;$poi<count($manage_user);$poi++){   if($manage_user[$poi]=='2'){ ?> checked  <?php  } }   ?> value="2" name="manage_user[]" class="with-font" />
                    <label for="b2"></label>
        </td>
        <td>
        	<input id="b3" type="checkbox" <?php  for($poi=0;$poi<count($manage_user);$poi++){   if($manage_user[$poi]=='3'){ ?> checked  <?php  } }   ?> value="3" name="manage_user[]" class="with-font" />
                    <label for="b3"></label>
        </td>  
      </tr>
      <tr>
        <td>Add Class</td>
        <td>
        	<input id="c1" type="checkbox" <?php  for($poi=0;$poi<count($add_class);$poi++){   if($add_class[$poi]=='1'){ ?> checked  <?php  } }   ?> value="1" name="add_class[]" class="with-font" />
                    <label for="c1"></label>
        </td> 
        <td>
        	<input id="c2" type="checkbox" <?php  for($poi=0;$poi<count($add_class);$poi++){   if($add_class[$poi]=='2'){ ?> checked  <?php  } }   ?> value="2" name="add_class[]" class="with-font" />
                    <label for="c2"></label>
        </td>
        <td>
        	<input id="c3" type="checkbox" <?php  for($poi=0;$poi<count($add_class);$poi++){   if($add_class[$poi]=='3'){ ?> checked  <?php  } }   ?> value="3" name="add_class[]" class="with-font" />
                    <label for="c3"></label>
        </td>  
      </tr>
       <tr>
        <td>Add Subject</td>
        <td>
        	<input id="d1" type="checkbox" <?php  for($poi=0;$poi<count($add_subject);$poi++){   if($add_subject[$poi]=='1'){ ?> checked  <?php  } }   ?> value="1" name="add_subject[]" class="with-font" />
                    <label for="d1"></label>
        </td> 
        <td>
        	<input id="d2" type="checkbox" <?php  for($poi=0;$poi<count($add_subject);$poi++){   if($add_subject[$poi]=='2'){ ?> checked  <?php  } }   ?> value="2" name="add_subject[]" class="with-font" />
                    <label for="d2"></label>
        </td>
        <td>
        	<input id="d3" type="checkbox" <?php  for($poi=0;$poi<count($add_subject);$poi++){   if($add_subject[$poi]=='3'){ ?> checked  <?php  } }   ?> value="3" name="add_subject[]" class="with-font" />
                    <label for="d3"></label>
        </td>  
      </tr>
       <tr>
        <td>Add Incharge</td>
        <td>
        	<input id="e1" type="checkbox" <?php  for($poi=0;$poi<count($add_incharge);$poi++){   if($add_incharge[$poi]=='1'){ ?> checked  <?php  } }   ?> value="1" name="add_incharge[]" class="with-font" />
                    <label for="e1"></label>
        </td> 
        <td>
        	<input id="e2" type="checkbox" <?php  for($poi=0;$poi<count($add_incharge);$poi++){   if($add_incharge[$poi]=='2'){ ?> checked  <?php  } }   ?> value="2" name="add_incharge[]" class="with-font" />
                    <label for="e2"></label>
        </td>
        <td>
        	<input id="e3" type="checkbox" <?php  for($poi=0;$poi<count($add_incharge);$poi++){   if($add_incharge[$poi]=='3'){ ?> checked  <?php  } }   ?> value="3" name="add_incharge[]" class="with-font" />
                    <label for="e3"></label>
        </td>  
      </tr>
       <tr>
        <td>Add Exam</td>
        <td>
        	<input id="f1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($add_exam);$poi++){   if($add_exam[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_exam[]" class="with-font" />
                    <label for="f1"></label>
        </td> 
        <td>
        	<input id="f2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($add_exam);$poi++){   if($add_exam[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_exam[]" class="with-font" />
                    <label for="f2"></label>
        </td>
        <td>
        	<input id="f3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($add_exam);$poi++){   if($add_exam[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_exam[]" class="with-font" />
                    <label for="f3"></label>
        </td>  
      </tr>
       <tr>
        <td>Add Daily basis</td>
        <td>
        	<input id="g1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($add_daily_basis);$poi++){   if($add_daily_basis[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_daily_basis[]" class="with-font" />
                    <label for="g1"></label>
        </td> 
        <td>
        	<input id="g2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($add_daily_basis);$poi++){   if($add_daily_basis[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_daily_basis[]" class="with-font" />
                    <label for="g2"></label>
        </td>
        <td>
        	<input id="g3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($add_daily_basis);$poi++){   if($add_daily_basis[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_daily_basis[]" class="with-font" />
                    <label for="g3"></label>
        </td>  
      </tr>
       <tr>
        <td>Add Time Table</td>
        <td>
        	<input id="h1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($add_time_table);$poi++){   if($add_time_table[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_time_table[]" class="with-font" />
                    <label for="h1"></label>
        </td> 
        <td>
        	<input id="h2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($add_time_table);$poi++){   if($add_time_table[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_time_table[]" class="with-font" />
                    <label for="h2"></label>
        </td>
        <td>
        	<input id="h3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($add_time_table);$poi++){   if($add_time_table[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_time_table[]" class="with-font" />
                    <label for="h3"></label>
        </td>  
      </tr>
       <tr>
        <td>Add Notice</td>
        <td>
        	<input id="i1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($add_notice);$poi++){   if($add_notice[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_notice[]" class="with-font" />
                    <label for="i1"></label>
        </td> 
        <td>
        	<input id="i2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($add_notice);$poi++){   if($add_notice[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_notice[]" class="with-font" />
                    <label for="i2"></label>
        </td>
        <td>
        	<input id="i3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($add_notice);$poi++){   if($add_notice[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_notice[]" class="with-font" />
                    <label for="i3"></label>
        </td>  
      </tr>
       <tr>
        <td>Insert Event Name</td>
        <td>
        	<input id="j1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($insert_event);$poi++){   if($insert_event[$poi]=='1'){ ?> checked  <?php  } }   ?> name="insert_event[]" class="with-font" />
                    <label for="j1"></label>
        </td> 
        <td>
        	<input id="j2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($insert_event);$poi++){   if($insert_event[$poi]=='2'){ ?> checked  <?php  } }   ?> name="insert_event[]" class="with-font" />
                    <label for="j2"></label>
        </td>
        <td>
        	<input id="j3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($insert_event);$poi++){   if($insert_event[$poi]=='3'){ ?> checked  <?php  } }   ?> name="insert_event[]" class="with-font" />
                    <label for="j3"></label>
        </td>  
      </tr>
        <tr>
        <td>Add Event</td>
        <td>
        	<input id="k1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($add_event);$poi++){   if($add_event[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_event[]" class="with-font" />
                    <label for="k1"></label>
        </td> 
        <td>
        	<input id="k2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($add_event);$poi++){   if($add_event[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_event[]" class="with-font" />
                    <label for="k2"></label>
        </td>
        <td>
        	<input id="k3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($add_event);$poi++){   if($add_event[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_event[]" class="with-font" />
                    <label for="k3"></label>
        </td>  
      </tr>
        <tr>
        <td>Event Details</td>
        <td>
        	<input id="l1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($event_detail);$poi++){   if($event_detail[$poi]=='1'){ ?> checked  <?php  } }   ?> name="event_detail[]" class="with-font" />
                    <label for="l1"></label>
        </td> 
        <td>
        	<input id="l2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($event_detail);$poi++){   if($event_detail[$poi]=='2'){ ?> checked  <?php  } }   ?> name="event_detail[]" class="with-font" />
                    <label for="l2"></label>
        </td>
        <td>
        	<input id="l3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($event_detail);$poi++){   if($event_detail[$poi]=='3'){ ?> checked  <?php  } }   ?> name="event_detail[]" class="with-font" />
                    <label for="l3"></label>
        </td>  
      </tr>
        <tr>
        <td>Participate List</td>
        <td>
        	<input id="m1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($participate_list);$poi++){   if($participate_list[$poi]=='1'){ ?> checked  <?php  } }   ?> name="participate_list[]" class="with-font" />
                    <label for="m1"></label>
        </td> 
        <td>
        	<input id="m2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($participate_list);$poi++){   if($participate_list[$poi]=='2'){ ?> checked  <?php  } }   ?> name="participate_list[]" class="with-font" />
                    <label for="m2"></label>
        </td>
        <td>
        	<input id="m3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($participate_list);$poi++){   if($participate_list[$poi]=='3'){ ?> checked  <?php  } }   ?> name="participate_list[]" class="with-font" />
                    <label for="m3"></label>
        </td>  
      </tr>
        <tr>
        <td>Add Notes</td>
        <td>
        	<input id="n1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($add_notes);$poi++){   if($add_notes[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_notes[]" class="with-font" />
                    <label for="n1"></label>
        </td> 
        <td>
        	<input id="n2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($add_notes);$poi++){   if($add_notes[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_notes[]" class="with-font" />
                    <label for="n2"></label>
        </td>
        <td>
        	<input id="n3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($add_notes);$poi++){   if($add_notes[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_notes[]" class="with-font" />
                    <label for="n3"></label>
        </td>  
      </tr>
        <tr>
        <td>Assignment</td>
        <td>
        	<input id="o1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($assignment);$poi++){   if($assignment[$poi]=='1'){ ?> checked  <?php  } }   ?> name="assignment[]" class="with-font" />
                    <label for="o1"></label>
        </td> 
        <td>
        	<input id="o2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($assignment);$poi++){   if($assignment[$poi]=='2'){ ?> checked  <?php  } }   ?> name="assignment[]" class="with-font" />
                    <label for="o2"></label>
        </td>
        <td>
        	<input id="o3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($assignment);$poi++){   if($assignment[$poi]=='3'){ ?> checked  <?php  } }   ?> name="assignment[]" class="with-font" />
                    <label for="o3"></label>
        </td>  
      </tr>
        <tr>



        <td>Lesson Plan</td>
        <td>
        	<input id="p1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($lesson_plan);$poi++){   if($lesson_plan[$poi]=='1'){ ?> checked  <?php  } }   ?> name="lesson_plan[]" class="with-font" />
                    <label for="p1"></label>
        </td> 
        <td>
        	<input id="p2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($lesson_plan);$poi++){   if($lesson_plan[$poi]=='2'){ ?> checked  <?php  } }   ?> name="lesson_plan[]" class="with-font" />
                    <label for="p2"></label>
        </td>
        <td>
        	<input id="p3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($lesson_plan);$poi++){   if($lesson_plan[$poi]=='3'){ ?> checked  <?php  } }   ?> name="lesson_plan[]" class="with-font" />
                    <label for="p3"></label>
        </td>  
      </tr>
        <tr>
        <td>Staff Attendance</td>
        <td>
        	<input id="q1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($staff_attendance);$poi++){   if($staff_attendance[$poi]=='1'){ ?> checked  <?php  } }   ?> name="staff_attendance[]" class="with-font" />
                    <label for="q1"></label>
        </td> 
        <td>
        	<input id="q2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($staff_attendance);$poi++){   if($staff_attendance[$poi]=='2'){ ?> checked  <?php  } }   ?> name="staff_attendance[]" class="with-font" />
                    <label for="q2"></label>
        </td>
        <td>
        	<input id="q3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($staff_attendance);$poi++){   if($staff_attendance[$poi]=='3'){ ?> checked  <?php  } }   ?> name="staff_attendance[]" class="with-font" />
                    <label for="q3"></label>
        </td>  
      </tr>
        <tr>
        <td>Class Attandance</td>
        <td>
        	<input id="r1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($class_attendance);$poi++){   if($class_attendance[$poi]=='1'){ ?> checked  <?php  } }   ?> name="class_attendance[]" class="with-font" />
                    <label for="r1"></label>
        </td> 
        <td>
        	<input id="r2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($class_attendance);$poi++){   if($class_attendance[$poi]=='2'){ ?> checked  <?php  } }   ?> name="class_attendance[]" class="with-font" />
                    <label for="r2"></label>
        </td>
        <td>
        	<input id="r3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($class_attendance);$poi++){   if($class_attendance[$poi]=='3'){ ?> checked  <?php  } }   ?> name="class_attendance[]" class="with-font" />
                    <label for="r3"></label>
        </td>  
      </tr>
        <tr>

        <td>Exam Marks</td>
        <td>
        	<input id="s1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($exam_marks);$poi++){   if($exam_marks[$poi]=='1'){ ?> checked  <?php  } }   ?> name="exam_marks[]" class="with-font" />
                    <label for="s1"></label>
        </td> 
        <td>
        	<input id="s2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($exam_marks);$poi++){   if($exam_marks[$poi]=='2'){ ?> checked  <?php  } }   ?> name="exam_marks[]" class="with-font" />
                    <label for="s2"></label>
        </td>
        <td>
        	<input id="s3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($exam_marks);$poi++){   if($exam_marks[$poi]=='3'){ ?> checked  <?php  } }   ?> name="exam_marks[]" class="with-font" />
                    <label for="s3"></label>
        </td>  
      </tr>
        <tr>
        <td>Test Marks</td>
        <td>
        	<input id="t1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($test_marks);$poi++){   if($test_marks[$poi]=='1'){ ?> checked  <?php  } }   ?> name="test_marks[]" class="with-font" />
                    <label for="t1"></label>
        </td> 
        <td>
        	<input id="t2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($test_marks);$poi++){   if($test_marks[$poi]=='2'){ ?> checked  <?php  } }   ?> name="test_marks[]" class="with-font" />
                    <label for="t2"></label>
        </td>
        <td>
        	<input id="t3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($test_marks);$poi++){   if($test_marks[$poi]=='3'){ ?> checked  <?php  } }   ?> name="test_marks[]" class="with-font" />
                    <label for="t3"></label>
        </td>  
      </tr>
        <tr>

        <td>Assign Subject Teacher</td>
        <td>
        	<input id="u1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($assign_subject_teacher);$poi++){   if($assign_subject_teacher[$poi]=='1'){ ?> checked  <?php  } }   ?> name="assign_subject_teacher[]" class="with-font" />
                    <label for="u1"></label>
        </td> 
        <td>
        	<input id="u2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($assign_subject_teacher);$poi++){   if($assign_subject_teacher[$poi]=='2'){ ?> checked  <?php  } }   ?> name="assign_subject_teacher[]" class="with-font" />
                    <label for="u2"></label>
        </td>
        <td>
        	<input id="u3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($assign_subject_teacher);$poi++){   if($assign_subject_teacher[$poi]=='3'){ ?> checked  <?php  } }   ?> name="assign_subject_teacher[]" class="with-font" />
                    <label for="u3"></label>
        </td>  
      </tr>
      
        <tr>
        <td>Assign Section And Roll Number</td>
        <td>
        	<input id="v1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($assign_sec_roll);$poi++){   if($assign_sec_roll[$poi]=='1'){ ?> checked  <?php  } }   ?> name="assign_sec_roll[]" class="with-font" />
                    <label for="v1"></label>
        </td> 
        <td>
        	<input id="v2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($assign_sec_roll);$poi++){   if($assign_sec_roll[$poi]=='2'){ ?> checked  <?php  } }   ?> name="assign_sec_roll[]" class="with-font" />
                    <label for="v2"></label>
        </td>
        <td>
        	<input id="v3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($assign_sec_roll);$poi++){   if($assign_sec_roll[$poi]=='3'){ ?> checked  <?php  } }   ?> name="assign_sec_roll[]" class="with-font" />
                    <label for="v3"></label>
        </td>  
      </tr>
  <tr>
        <td>Transport</td>
        <td>
            <input id="w1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($transport);$poi++){   if($transport[$poi]=='1'){ ?> checked  <?php  } }   ?> name="transport[]" class="with-font" />
                    <label for="w1"></label>
        </td> 
        <td>
            <input id="w2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($transport);$poi++){   if($transport[$poi]=='2'){ ?> checked  <?php  } }   ?> name="transport[]" class="with-font" />
                    <label for="w2"></label>
        </td>
        <td>
            <input id="w3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($transport);$poi++){   if($transport[$poi]=='3'){ ?> checked  <?php  } }   ?> name="transport[]" class="with-font" />
                    <label for="w3"></label>
        </td>  
      </tr>

        <tr>
        <td>Add Vehicle</td>
        <td>
        	<input id="w1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($add_vehicle);$poi++){   if($add_vehicle[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_vehicle[]" class="with-font" />
                    <label for="w1"></label>
        </td> 
        <td>
        	<input id="w2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($add_vehicle);$poi++){   if($add_vehicle[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_vehicle[]" class="with-font" />
                    <label for="w2"></label>
        </td>
        <td>
        	<input id="w3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($add_vehicle);$poi++){   if($add_vehicle[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_vehicle[]" class="with-font" />
                    <label for="w3"></label>
        </td>  
      </tr>
        <tr>
        <td>Add Routes</td>
        <td>
        	<input id="x1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($add_routes);$poi++){   if($add_routes[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_routes[]" class="with-font" />
                    <label for="x1"></label>
        </td> 
        <td>
        	<input id="x2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($add_routes);$poi++){   if($add_routes[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_routes[]" class="with-font" />
                    <label for="x2"></label>
        </td>
        <td>
        	<input id="x3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($add_routes);$poi++){   if($add_routes[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_routes[]" class="with-font" />
                    <label for="x3"></label>
        </td>  
      </tr>
        <tr>
        <td>Add Driver</td>
        <td>
            <input id="y1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($add_driver);$poi++){   if($add_driver[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_driver[]" class="with-font" />
                    <label for="y1"></label>
        </td> 
        <td>
            <input id="y2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($add_driver);$poi++){   if($add_driver[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_driver[]" class="with-font" />
                    <label for="y2"></label>
        </td>
        <td>
            <input id="y3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($add_driver);$poi++){   if($add_driver[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_driver[]" class="with-font" />
                    <label for="y3"></label>
        </td>  
      </tr>
   
     <tr>
        <td>Add Destination</td>
        <td>
            <input id="z1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($add_destination);$poi++){   if($add_destination[$poi]=='1'){ ?> checked  <?php  } }   ?> name="add_destination[]" class="with-font" />
                    <label for="z1"></label>
        </td> 
        <td>
            <input id="z2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($add_destination);$poi++){   if($add_destination[$poi]=='2'){ ?> checked  <?php  } }   ?> name="add_destination[]" class="with-font" />
                    <label for="z2"></label>
        </td>
        <td>
            <input id="z3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($add_destination);$poi++){   if($add_destination[$poi]=='3'){ ?> checked  <?php  } }   ?> name="add_destination[]" class="with-font" />
                    <label for="z3"></label>
        </td>  
      </tr>
   
     <tr>
        <td>Transport Allocation</td>
        <td>
            <input id="aa1" type="checkbox" value="1" <?php  for($poi=0;$poi<count($transport_allocation);$poi++){   if($transport_allocation[$poi]=='1'){ ?> checked  <?php  } }   ?> name="transport_allocation[]" class="with-font" />
                    <label for="aa1"></label>
        </td> 
        <td>
            <input id="aa2" type="checkbox" value="2" <?php  for($poi=0;$poi<count($transport_allocation);$poi++){   if($transport_allocation[$poi]=='2'){ ?> checked  <?php  } }   ?> name="transport_allocation[]" class="with-font" />
                    <label for="aa2"></label>
        </td>
        <td>
            <input id="aa3" type="checkbox" value="3" <?php  for($poi=0;$poi<count($transport_allocation);$poi++){   if($transport_allocation[$poi]=='3'){ ?> checked  <?php  } }   ?> name="transport_allocation[]" class="with-font" />
                    <label for="aa3"></label>
        </td>  
      </tr>
   
     <tr>
        <td>Gallery</td>
        <td>
            <input id="ab1" type="checkbox" value="1"v <?php  for($poi=0;$poi<count($gallery);$poi++){   if($gallery[$poi]=='1'){ ?> checked  <?php  } }   ?>  name="gallery[]" class="with-font" />
                    <label for="ab1"></label>
        </td> 
        <td>
            <input id="ab2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($gallery);$poi++){   if($gallery[$poi]=='2'){ ?> checked  <?php  } }   ?>  name="gallery[]" class="with-font" />
                    <label for="ab2"></label>
        </td>
        <td>
            <input id="ab3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($gallery);$poi++){   if($gallery[$poi]=='3'){ ?> checked  <?php  } }   ?>  name="gallery[]" class="with-font" />
                    <label for="ab3"></label>
        </td>  
      </tr>
   
     <tr>
        <td>Library Category</td>
        <td>
            <input id="ac1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($library_category);$poi++){   if($library_category[$poi]=='1'){ ?> checked  <?php  } }   ?>  name="library_category[]" class="with-font" />
                    <label for="ac1"></label>
        </td> 
        <td>
            <input id="ac2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($library_category);$poi++){   if($library_category[$poi]=='2'){ ?> checked  <?php  } }   ?>  name="library_category[]" class="with-font" />
                    <label for="ac2"></label>
        </td>
        <td>
            <input id="ac3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($library_category);$poi++){   if($library_category[$poi]=='3'){ ?> checked  <?php  } }   ?>  name="library_category[]" class="with-font" />
                    <label for="ac3"></label>
        </td>  
      </tr>
       <tr>

        <td>Add Books</td>
        <td>
            <input id="ad1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($add_books);$poi++){   if($add_books[$poi]=='1'){ ?> checked  <?php  } }   ?>  name="add_books[]" class="with-font" />
                    <label for="ad1"></label>
        </td> 
        <td>
            <input id="ad2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($add_books);$poi++){   if($add_books[$poi]=='2'){ ?> checked  <?php  } }   ?>  name="add_books[]" class="with-font" />
                    <label for="ad2"></label>
        </td>
        <td>
            <input id="ad3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($add_books);$poi++){   if($add_books[$poi]=='3'){ ?> checked  <?php  } }   ?>  name="add_books[]" class="with-font" />
                    <label for="ad3"></label>
        </td>  
      </tr>
          <tr>
        <td>Add Request</td>
        <td>
            <input id="ae1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($add_request);$poi++){   if($add_request[$poi]=='1'){ ?> checked  <?php  } }   ?>  name="add_request[]" class="with-font" />
                    <label for="ae1"></label>
        </td> 
        <td>
            <input id="ae2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($add_request);$poi++){   if($add_request[$poi]=='2'){ ?> checked  <?php  } }   ?>  name="add_request[]" class="with-font" />
                    <label for="ae2"></label>
        </td>
        <td>
            <input id="ae3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($add_request);$poi++){   if($add_request[$poi]=='3'){ ?> checked  <?php  } }   ?>  name="add_request[]" class="with-font" />
                    <label for="ae3"></label>
        </td>  
      </tr>
          <tr>
        <td>Books Return</td>
        <td>
            <input id="af1" type="checkbox" value="1"  <?php  for($poi=0;$poi<count($books_request);$poi++){   if($books_request[$poi]=='1'){ ?> checked  <?php  } }   ?>  name="books_request[]" class="with-font" />
                    <label for="af1"></label>
        </td> 
        <td>
            <input id="af2" type="checkbox" value="2"  <?php  for($poi=0;$poi<count($books_request);$poi++){   if($books_request[$poi]=='2'){ ?> checked  <?php  } }   ?>  name="books_request[]" class="with-font" />
                    <label for="af2"></label>
        </td>
        <td>
            <input id="af3" type="checkbox" value="3"  <?php  for($poi=0;$poi<count($books_request);$poi++){   if($books_request[$poi]=='3'){ ?> checked  <?php  } }   ?>  name="books_request[]" class="with-font" />
                    <label for="af3"></label>
        </td> 

      </tr>
  
          <tr>

        <td>Visitor Entry</td>
        <td>
            <input id="ai1" type="checkbox" <?php  for($poi=0;$poi<count($visitor_entry);$poi++){   if($visitor_entry[$poi]=='1'){ ?> checked  <?php  } }   ?>  value="1" name="visitor_entry[]" class="with-font" />
                    <label for="ai1"></label>
        </td> 
        <td>
            <input id="ai2" type="checkbox" <?php  for($poi=0;$poi<count($visitor_entry);$poi++){   if($visitor_entry[$poi]=='2'){ ?> checked  <?php  } }   ?>  value="2" name="visitor_entry[]" class="with-font" />
                    <label for="ai2"></label>
        </td>
        <td>
            <input id="ai3" type="checkbox" <?php  for($poi=0;$poi<count($visitor_entry);$poi++){   if($visitor_entry[$poi]=='3'){ ?> checked  <?php  } }   ?>  value="3" name="visitor_entry[]" class="with-font" />
                    <label for="ai3"></label>
        </td>  
      </tr>

    <tr>
        <td>Feedback</td>
        <td>
            <input id="aj1" type="checkbox" <?php  for($poi=0;$poi<count($feedback);$poi++){   if($feedback[$poi]=='1'){ ?> checked  <?php  } }   ?>  value="1" name="feedback[]"  class="with-font" />
                    <label for="aj1"></label>
        </td> 
        <td>
            <input id="aj2" type="checkbox" <?php  for($poi=0;$poi<count($feedback);$poi++){   if($feedback[$poi]=='2'){ ?> checked  <?php  } }   ?>  value="2" name="feedback[]" class="with-font" />
                    <label for="aj2"></label>
        </td>
        <td>
            <input id="aj3" type="checkbox" <?php  for($poi=0;$poi<count($feedback);$poi++){   if($feedback[$poi]=='3'){ ?> checked  <?php  } }   ?>  value="3" name="feedback[]" class="with-font" />
                    <label for="aj3"></label>
        </td>  
      </tr>

      <tr>
        <td>Promotion</td>
        <td>
            <input id="faj1" type="checkbox" <?php  for($poi=0;$poi<count($promotion);$poi++){   if($promotion[$poi]=='1'){ ?> checked  <?php  } }   ?>  value="1" name="promotion[]"  class="with-font" />
                    <label for="faj1"></label>
        </td> 
        <td>
            <input id="faj2" type="checkbox" <?php  for($poi=0;$poi<count($promotion);$poi++){   if($promotion[$poi]=='2'){ ?> checked  <?php  } }   ?>  value="2" name="promotion[]" class="with-font" />
                    <label for="faj2"></label>
        </td>
        <td>
            <input id="faj3" type="checkbox" <?php  for($poi=0;$poi<count($promotion);$poi++){   if($promotion[$poi]=='3'){ ?> checked  <?php  } }   ?>  value="3" name="promotion[]" class="with-font" />
                    <label for="faj3"></label>
        </td>  
      </tr>

        <tr>
        <td>Authority</td>
        <td>
            <input id="dfaj1" type="checkbox" <?php  for($poi=0;$poi<count($authority);$poi++){   if($authority[$poi]=='1'){ ?> checked  <?php  } }   ?>  value="1" name="authority[]"  class="with-font" />
                    <label for="dfaj1"></label>
        </td> 
        <td>
            <input id="dfaj2" type="checkbox" <?php  for($poi=0;$poi<count($authority);$poi++){   if($authority[$poi]=='2'){ ?> checked  <?php  } }   ?>  value="2" name="authority[]" class="with-font" />
                    <label for="dfaj2"></label>
        </td>
        <td>
            <input id="dfaj3" type="checkbox" <?php  for($poi=0;$poi<count($authority);$poi++){   if($authority[$poi]=='3'){ ?> checked  <?php  } }   ?>  value="3" name="authority[]" class="with-font" />
                    <label for="dfaj3"></label>
        </td>  
      </tr>
     
    </tbody>
  </table>
    </div>
  </div>
  <center><button class="btn-success">Save</button></center>
</div>
</div>

<?php echo form_close();?>
<style type="text/css">
.Auth{
margin: 0px;
font-size: 25px;
}
.Authority{
width: 640px;
}



input[type=radio].with-font,
input[type=checkbox].with-font {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}
    
input[type=radio].with-font ~ label:before,
input[type=checkbox].with-font ~ label:before {
    font-family: FontAwesome;
    display: inline-block;
    content: "\f1db";
    letter-spacing: 10px;
    font-size: 1.5em;
    margin-left: 10px;
    color: #535353;
    width: 1.4em;
}

input[type=radio].with-font:checked ~ label:before,
input[type=checkbox].with-font:checked ~ label:before  {
    content: "\f00c";
    font-size: 1.5em;
    margin-left: 10px;
    color: #408eee;
    letter-spacing: 5px;
}
input[type=checkbox].with-font ~ label:before {      
    content: "\f096";
}
input[type=checkbox].with-font:checked ~ label:before {
    content: "\f046";        
    color: #408eee;
}

</style>

<script type="text/javascript">
function role_staff(value)
{
$.ajax({  
    type    : "POST",
    url     : "<?php echo base_url();?>index.php/admission/role_staff/"+value+"/",  
    data    : {'role_staff':value},
    success : function(data){
    if(data){
    location.reload();
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