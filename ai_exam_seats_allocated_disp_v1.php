<?php include ('session.php');?>	
<?php include ('header.php');
include('connect.php');?>
<div style="padding:20px;color: #FFF !important">
	<?php
$req_hall_id = $hall_id=$_REQUEST['hall_id'] ;
$examid=$_REQUEST['examid'] ;
$cDay=$_REQUEST['cDay'] ;
$cTime=$_REQUEST['cTime'] ;
$course_name = $_REQUEST['course_name'];
$query = mysqli_query($link,"select * from room where roomid='".$hall_id."'") or die(mysqli_error($link));
if($row = mysqli_fetch_array($query)) {
	$room_name = $row['room_name']; 
	$block_name = $row['block_name'];
    $row_count = $row['row_count']; 
    $col_count = $row['col_count']; 
}
$TotalSeat = $row_count*$col_count;

if(trim($_REQUEST['update'])){
	$query = mysqli_query($link,"select * from examsched WHERE examid='$examid'") or die(mysqli_error($link));
	if($row = mysqli_fetch_array($query)) {
		$room_id=$row['room_id'];
		$room_idARR = explode(",", $room_id);
		if(!in_array($hall_id,$room_idARR)){
			$room_idSTR='';
			$room_idARR[] =$hall_id;
			$room_idSTR = implode(",",$room_idARR);
			$query = mysqli_query($link,"UPDATE examsched SET room_id='$room_idSTR' WHERE examid='$examid' ") or die(mysqli_error($link));
			$hall_id = $room_idSTR;
		} else {			
			$hall_id = $room_id;
		}
		
	}
}

$StudentCourseArr =array();
$Allocated_StudentArr = array();
//echo "select * from examsched WHERE room_id ='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'";
$query = mysqli_query($link,"select * from examsched WHERE room_id ='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
while ($row = mysqli_fetch_array($query)) {
	$courseArr[]=$row['course_name'];
	$examid=$row['examid'];
	$year_joined = $row['year_joined'];
	$fname = $row['fname'];
	//echo "select * from student WHERE department='".$row['department']."'  and course_name='".$row['course_name']."' AND year_joined='$year_joined' order by year_joined ";
	$res = mysqli_query($link,"select * from student WHERE department='".$row['department']."'  and course_name='".$row['course_name']."' AND year_joined='$year_joined' order by year_joined ") or die(mysqli_error($link));
    while ($row1 = mysqli_fetch_array($res)) {
    	$reg_no =  $row1['reg_no']; 
    	$email_id =  $row1['email_id'];
    	$StudentCourseNameArr[$row1['reg_no']] = $row['course_name'];
    	$StudentExamIDArr[$row1['reg_no']] = $row['examid'];
    	$StudentCourseArr[$row['course_name'].'_'.$year_joined][] = $row1['reg_no'];
    	$StudentCourseCNTArr[]=$row['course_name'].'_'.$year_joined;
    	$query2 = mysqli_query($link,"select * from login_details WHERE email_id='".$email_id."' AND usr_type='student'") or die(mysqli_error($link));
        if($row2 = mysqli_fetch_array($query2)){ 
	    	$StudentNameArr[$reg_no] = $row2['fname'].' '.$row2['lname'];
	    }
	    //echo "1.select * from allot_student  WHERE  reg_no='".$reg_no."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'";
		$query11 = mysqli_query($link,"select * from allot_student  WHERE  reg_no='".$reg_no."' AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND exam_id='$examid'") or die(mysqli_error($link));	
		if(mysqli_num_rows($query11)==0){
			$Allocated_StudentArr[]= $reg_no;
		}
	}
}

//print_r($Allocated_StudentArr);
//echo 'ss';
$StudentCourseCNTArr = array_unique($StudentCourseCNTArr);
$courseArr = array_unique($courseArr);
$seatAllocationArr = array();
$StudentIndex = $CourseSLNO= $SlNoTmp= 0;
$CourseCnt = count($StudentCourseCNTArr);
if($CourseCnt==1){
	$CourseCnt=2;
}

foreach ($StudentCourseArr as $courseID=>$StudentArr) {	
	$StudentIndex = $SlNoTmp;	
	//print_r($StudentArr);
	foreach ($StudentArr as $StudentID) {	
		if(in_array($StudentID,$Allocated_StudentArr)){
			$seatAllocationArr[$StudentIndex] = $StudentID;
			$StudentIndex=$StudentIndex+$CourseCnt;	
		}
	}	
	$SlNoTmp++;
}



$AllotCount = $TotalSeat/$CourseCnt;
$ArrIndex=0;
$AllocatedCnt =0;
for($i=0;$i<($row_count);$i++){
	for($j=0;$j<$col_count;$j++){
		$reg_no = $seatAllocationArr[$ArrIndex];
		//echo "$AllocatedCnt<$AllotCount";
		if(trim($reg_no) && $AllocatedCnt<$AllotCount){
			if(in_array($reg_no,$Allocated_StudentArr)){
	  			$StudentExamID = $StudentExamIDArr[$reg_no];
	  			$query1 = mysqli_query($link,"select * from allot_student  WHERE room_id='".$req_hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND reg_no='$reg_no'") or die(mysqli_error($link));
	  			if(mysqli_num_rows($query1)==0){
	  				//echo "3.select * from allot_student  WHERE room_id='".$req_hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND cols_number='$j' AND rows_number='$i'";
	  				$query21 = mysqli_query($link,"select * from allot_student  WHERE room_id='".$req_hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND cols_number='$j' AND rows_number='$i'") or die(mysqli_error($link));
	  				if(mysqli_num_rows($query21)==0){
					  	$ins_sql = "INSERT INTO allot_student(reg_no, room_id, rows_number, cols_number,exam_date,exam_time,exam_id) 
					  	VALUES('$reg_no','$req_hall_id','$i','$j','$cDay','$cTime','$StudentExamID')";
					  	mysqli_query($link,$ins_sql) or die(mysqli_error($link)); 
					  	$ArrIndex++;
					} 
					$AllocatedCnt++;
				}
			}

		}
		
	}
}?>

<h5 style="color: #FFF">Room Name : <?=$room_name?><br>Block Name : <?=$block_name?><br>Total Rows : <?=$row_count?> | Total Cols : <?=$col_count?> | Total Seats : <?=$row_count*$col_count?><br>Examiner: <?=$fname?></h5><hr>
<table class="table table-striped table-bordered table-hover" >

	<thead>
        <tr>
            <th>Exam Type</th>
            <th>Exam Date</th>
            <th>Exam Time</th>                                        
            <th>Department</th>                                        
            <th>Course Name</th>
            <th>Year</th>
            <th>Semester</th> 
            <th>Subject</th>
        </tr>
    </thead>
<?php 
$query = mysqli_query($link,"select * from examsched  WHERE room_id ='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
while ($row = mysqli_fetch_array($query)) {
    $id = $row['examid'];
    $rowCnt++;?>
    <tr class="warning">
        <td><?php echo $row['exam_type']; ?></td>
        <td><?php echo date("d-m-Y",strtotime($row['exam_date'])); ?></td> 
        <td><?php echo $row['exam_time']; ?></td> 
        <td><?php echo $row['department']; ?></td> 
        <td><?php echo $row['course_name']; ?></td> 
        <td><?php echo $row['year_joined']; ?></td> 
        <td><?php echo $row['semester']; ?></td>
        <td><?php echo $row['subject_code']; ?></td>  
    </tr> 
<?php } ?>
</table>
<table class="table table-striped table-bordered table-hover" >

	<tr>
		<th></th>
	<?php for($j=0;$j<$col_count;$j++){?>
		<th>Col <?=$j+1?></th>
	<?php }?>
</tr>
	<?php
	$ArrIndex=0;
	$tempRoomarr  = explode(",",$req_hall_id);

	for($i=0;$i<($row_count);$i++){
		?>
		<tr>
			<td width="20%">Row <?=$i+1?></td>
		  	<?php for($j=0;$j<$col_count;$j++){
		  		

		  		?>
		  		<td width="20%">  		  			
		  			<?php
		  					$query1 = mysqli_query($link,"select * from allot_student  WHERE  room_id ='".$tempRoomarr[0]."'  AND rows_number='$i' AND cols_number='$j' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));		
							if(mysqli_num_rows($query1)>0){
								$row1 = mysqli_fetch_array($query1);
		  						echo '<strong style="color:green">Seat '.($ArrIndex+1).' : '.$row1['reg_no'].' ('.$StudentNameArr[$row1['reg_no']].')</strong>';
		  					}
		  					else echo "<strong style='color:red'>Not Allocated</strong>";
		  				//} else echo "<strong style='color:red'>Another Class Student</strong>";
		  			
		  			$ArrIndex++;?>
		  		</td>
		  	<?php 
		  	}?>
		</tr>
	<?php }?>
</table>

<?php
//echo "select * from allot_student  WHERE room_id='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'";
$query1 = mysqli_query($link,"select * from allot_student  WHERE room_id='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
//echo mysqli_num_rows($query1).">=".$AllotCount;
if(mysqli_num_rows($query1)>=$AllotCount){?>
	<div style="border:1px solid #036;padding:10px;text-align: center;color:#FFFFFF">This Hall/Room Seats is fully allocated. If you need to allocate other pending students Please select any of the below Rooms to allocate the pending.</div>
	<table class="table table-striped table-bordered table-hover" >
 <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;ROOM / HALL List</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>ROOM / HALL</th>
                                        <th>Block Name</th>
                                        <th>Row Count</th>
                                        <th>Column Count</th>
                                        <th>Total Seats</th>
                                        <th>Allocation</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
<?php 
	$query = mysqli_query($link,"select * from room WHERE roomid<>'".$req_hall_id."'") or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['roomid'];
        $rowCnt++;                                                                
        ?>
        <tr class="warning">
           <td><?php echo $row['room_name']; ?></td> 
           <td><?php echo $row['block_name']; ?></td> 
           <td><?php echo $row['row_count']; ?></td>
           <td><?php echo $row['col_count']; ?></td>  
           <td><?php echo $row['row_count']*$row['col_count']; ?></td>  
           <td><a href="javascript:void(0)" onclick="window.location.href='ai_exam_seats_allocated_disp.php?cDay=<?=$cDay?>&cTime=<?=$cTime?>&hall_id=<?=$id?>&course_name=<?=$course_name?>&update=yes&examid=<?=$examid?>'">Schedule</a></td> 
	    </tr>
<?php } }
?>
</tbody>
</table>
</div>