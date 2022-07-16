<?php include ('session.php');?>	
<?php include ('header.php');
include('connect.php');?>
<?php
$req_hall_id = $hall_id=$_REQUEST['hall_id'] ;
$examid=$_REQUEST['examid'] ;
$cDay=$_REQUEST['cDay'] ;
$cTime=$_REQUEST['cTime'] ;
$update=$_REQUEST['update'] ;
$course_name = $_REQUEST['course_name'];
$hall_idDet = explode(",",$_REQUEST['hall_id']);
$hall_id= $hall_idDet[0];
if($update=='yes'){
	$temphall_id = $hall_id;
	$alloctohall_id= $hall_idDet[1];
} else {
	if(count($hall_idDet)>1){
		$temphall_id = $hall_idDet[1];
		$alloctohall_id= $hall_idDet[1];
	} else {
		$temphall_id = $hall_id;
		$alloctohall_id= $hall_id;
	}
}
$query = mysqli_query($link,"select * from room where roomid='".$alloctohall_id."'") or die(mysqli_error($link));
if($row = mysqli_fetch_array($query)) {
	$room_name = $row['room_name']; 
	$block_name = $row['block_name'];
    $row_count = $row['row_count']; 
    $col_count = $row['col_count']; 
}
$TotalSeat = $row_count*$col_count;
if($_REQUEST['display']!='yes'){
 $query2 = mysqli_query($link,"delete from allot_student  WHERE room_id='".$alloctohall_id."' 
  		AND exam_date='".$cDay."' AND exam_time='".$cTime."' ") or die(mysqli_error($link));
}
$StudentCourseArr =array();
$examArr = $StudentsArr = $StudentExamArr = array();
$slno=0;

function alternateMerge($arr1, $arr2, $n1,$n2)
{
    $i = 0;
    $j = 0;
    $k = 0;
 
    // Traverse both array
    while ($i<$n1 && $j <$n2)
    {
        $arr3[$k++] = $arr1[$i++];
        $arr3[$k++] = $arr2[$j++];
    }
 
    // Store remaining elements of first array
    while ($i < $n1)
        $arr3[$k++] = $arr1[$i++];
 
    // Store remaining elements of second array
    while ($j < $n2)
        $arr3[$k++] = $arr2[$j++];
    return $arr3;
}

if($update=='yes'){
	$FirstExamid = 0;
	$AlreadyAllocatedArr = $TotalStudentsPerExamArr = $TotalAllocStudentsPerExamArr =  $StudExamIDArr = array();
	$query3 = mysqli_query($link,"select * from examsched WHERE room_id ='".$temphall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
	while ($row = mysqli_fetch_array($query3)) {
		$courseArr[]=$row['course_name'];
		$examid=$row['examid'];
		$examArr[] = $examid;
		$year_joined = $row['year_joined'];
		if($FirstExamid==0) $FirstExamid = $examid;
		$res = mysqli_query($link,"select * from student WHERE department='".$row['department']."'  and course_name='".$row['course_name']."' AND year_joined='$year_joined' order by year_joined ") or die(mysqli_error($link));
	    while ($row1 = mysqli_fetch_array($res)) {
	    	
	    	$reg_no =  $row1['reg_no']; 
	    	$email_id =  $row1['email_id'];
	    	
	    	$StudExamIDArr[$reg_no] = $examid;
	    	$query2 = mysqli_query($link,"select * from login_details WHERE email_id='".$email_id."' AND usr_type='student'") or die(mysqli_error($link));
	        if($row2 = mysqli_fetch_array($query2)){ 
		    	$StudentNameArr[$reg_no] = $row2['fname'].' '.$row2['lname'];
		    }
	    	$StudentExamArr[$reg_no] = $examid;
	    	$ssql = "select * from allot_student  WHERE exam_id='".$examid."' 
			AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND reg_no='$reg_no'";
	    	$query11 = mysqli_query($link,$ssql) or die(mysqli_error($link));
			while ($row11 = mysqli_fetch_array($query11)) {			
				$AlreadyAllocatedArr[] = $reg_no;
			} 
			if(!in_array($reg_no,$AlreadyAllocatedArr)) {
				$StudentsArr[$examid][] = $reg_no;
				$TotalStudentsPerExamArr[$row['examid']]++;
			}

	    }
	}
	$ResultArr = array();
	$ResultArr = $StudentsArr[$FirstExamid];
	$index=0;
	foreach($StudentsArr as $examid=>$regnoArr){
		if($index>0){
			$n1= count($ResultArr);
			$n2= count($regnoArr);
			$ResultArr = alternateMerge($ResultArr, $regnoArr, $n1, $n2);
		}
		$index++;
	}
	$query1 = mysqli_query($link,"select * from exam_room_teacher WHERE room_id='".$alloctohall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
	while($row1 = mysqli_fetch_array($query1)){
		$fname = $row1['fname'];
	}



	 
	//print_r($StudAllocArr);
	$Curr=0;
	$serial_no=1;
	$AllocArr = $AllocatedArr = array();
	$index1 = 0;
	$i1=0;
	$j1=0;
	for($i=0;$i<$row_count;$i++){
		for($j=0;$j<$col_count;$j++){	
						
			// echo "select * from allot_student  WHERE room_id='".$alloctohall_id."' 
			//AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND rows_number='$i' AND cols_number='$j'<br>";
			$query2 = mysqli_query($link,"select * from allot_student  WHERE room_id='".$alloctohall_id."' 
			AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND rows_number='$i' AND cols_number='$j'") or die(mysqli_error($link));
			if(mysqli_num_rows($query2)==0){
				$index1 = $i*$col_count +$j;
				$reg_no = $ResultArr[$index1];
				$StudentExamID = $StudentExamArr[$reg_no];		
				
				if(trim($reg_no)){
					if(!in_array($reg_no, $AlreadyAllocatedArr)){
						
						//echo "select * from allot_student  WHERE exam_date='".$cDay."' AND exam_time='".$cTime."' AND reg_no='$reg_no'";
						$query1 = mysqli_query($link,"select * from allot_student  WHERE exam_date='".$cDay."' AND exam_time='".$cTime."' AND reg_no='$reg_no'") or die(mysqli_error($link));
						if(mysqli_num_rows($query1)==0){
							$AllocArr[$i][$j] = $reg_no;
							$AllocatedArr[] = $reg_no;
							if($_REQUEST['display']!='yes'){
								$ins_sql = "INSERT INTO allot_student(reg_no, room_id, rows_number, cols_number,exam_date,exam_time,exam_id) 
						  		VALUES('$reg_no','$alloctohall_id','$i','$j','$cDay','$cTime','$StudentExamID')";
						  		mysqli_query($link,$ins_sql) or die(mysqli_error($link)); 		
						  	}					  						  		
					  	}
					}			
			  	}			  		
			}	
			$serial_no++; 
		}
	}

	$AllotCount = $TotalSeat/$ExamCnt;
} else {


	$FirstExamid = 0;
	$AlreadyAllocatedArr = $TotalStudentsPerExamArr = $TotalAllocStudentsPerExamArr =  $StudExamIDArr = array();
	$query3 = mysqli_query($link,"select * from examsched WHERE room_id ='".$temphall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
	while ($row = mysqli_fetch_array($query3)) {
		$courseArr[]=$row['course_name'];
		$examid=$row['examid'];
		$examArr[] = $examid;
		$year_joined = $row['year_joined'];
		if($FirstExamid==0) $FirstExamid = $examid;
		$res = mysqli_query($link,"select * from student WHERE department='".$row['department']."'  and course_name='".$row['course_name']."' AND year_joined='$year_joined' order by year_joined ") or die(mysqli_error($link));
	    while ($row1 = mysqli_fetch_array($res)) {
	    	$TotalStudentsPerExamArr[$row['examid']]++;
	    	$reg_no =  $row1['reg_no']; 
	    	$email_id =  $row1['email_id'];
	    	$StudentsArr[$examid][] = $reg_no;
	    	$StudExamIDArr[$reg_no] = $examid;
	    	$query2 = mysqli_query($link,"select * from login_details WHERE email_id='".$email_id."' AND usr_type='student'") or die(mysqli_error($link));
	        if($row2 = mysqli_fetch_array($query2)){ 
		    	$StudentNameArr[$reg_no] = $row2['fname'].' '.$row2['lname'];
		    }
	    	$StudentExamArr[$reg_no] = $examid;
	    	$ssql = "select * from allot_student  WHERE exam_id='".$examid."' 
			AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND reg_no='$reg_no'";
	    	$query11 = mysqli_query($link,$ssql) or die(mysqli_error($link));
			while ($row11 = mysqli_fetch_array($query11)) {			
				$AlreadyAllocatedArr[] = $reg_no;
			} 
	    }
	}
	$ResultArr = array();
	$ResultArr = $StudentsArr[$FirstExamid];
	$index=0;
	foreach($StudentsArr as $examid=>$regnoArr){
		if($index>0){
			$n1= count($ResultArr);
			$n2= count($regnoArr);
			$ResultArr = alternateMerge($ResultArr, $regnoArr, $n1, $n2);
		}
		$index++;
	}


	$query1 = mysqli_query($link,"select * from exam_room_teacher WHERE room_id='".$alloctohall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
	$row1 = mysqli_fetch_array($query1);
	$fname = $row1['fname'];
	$Curr=0;
	$serial_no=1;
	$AllocArr = $AllocatedArr = array();
	$index1 = 0;
	$i1=0;
	$j1=0;
	for($i=0;$i<$row_count;$i++){
		for($j=0;$j<$col_count;$j++){	
			$query2 = mysqli_query($link,"select * from allot_student  WHERE room_id='".$alloctohall_id."' 
			AND exam_date='".$cDay."' AND exam_time='".$cTime."' AND rows_number='$i' AND cols_number='$j'") or die(mysqli_error($link));
			if(mysqli_num_rows($query2)==0){
				$index1 = $i*$col_count +$j;
				$reg_no = $ResultArr[$index1];
				$StudentExamID = $StudentExamArr[$reg_no];						
				if(trim($reg_no)){
					if(!in_array($reg_no, $AlreadyAllocatedArr)){
						
						//echo "select * from allot_student  WHERE exam_date='".$cDay."' AND exam_time='".$cTime."' AND reg_no='$reg_no'";
						$query1 = mysqli_query($link,"select * from allot_student  WHERE exam_date='".$cDay."' AND exam_time='".$cTime."' AND reg_no='$reg_no'") or die(mysqli_error($link));
						if(mysqli_num_rows($query1)==0){
							$AllocArr[$i][$j] = $reg_no;
							$AllocatedArr[] = $reg_no;
							if($_REQUEST['display']!='yes'){
								$ins_sql = "INSERT INTO allot_student(reg_no, room_id, rows_number, cols_number,exam_date,exam_time,exam_id) 
						  		VALUES('$reg_no','$alloctohall_id','$i','$j','$cDay','$cTime','$StudentExamID')";
						  		mysqli_query($link,$ins_sql) or die(mysqli_error($link)); 	
						  	}						  						  		
					  	}
					}			
			  	}			  		
			}	
			$serial_no++; 
		}
	}
	$AllotCount = $TotalSeat/$ExamCnt;
}
//print_r($StudentNameArr);?>
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
		  			
		  					$query1 = mysqli_query($link,"select * from allot_student  WHERE  room_id ='".$alloctohall_id."'  AND rows_number='$i' AND cols_number='$j' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));		
							if(mysqli_num_rows($query1)>0){
								$row1 = mysqli_fetch_array($query1);
		  						echo '<strong style="color:green">Seat '.($ArrIndex+1).' : '.$row1['reg_no'];
		  						 if($_REQUEST['display']!='yes'){
		  						 	echo ' ('.$StudentNameArr[$row1['reg_no']].')</strong>';
		  						 }
		  						$TotalAllocStudentsPerExamArr[$StudExamIDArr[$row1['reg_no']]]++;	
		  					}
		  					else echo "<strong style='color:red'>Not Allocated</strong>";
		  			
		  			$ArrIndex++;?>
		  		</td>
		  	<?php 
		  	}?>
		</tr>
	<?php }?>
</table>

<?php

$needAllocation=0;
foreach ($examArr as $examid) {
	$regnoArr = $StudentsArr[$examid];
	if($TotalAllocStudentsPerExamArr[$examid]<$TotalStudentsPerExamArr[$examid]){
		$needAllocation=1;
	}
}
if($_REQUEST['display']=='yes') $needAllocation=0;
if($needAllocation==1){?>
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
           <td><a href="javascript:void(0)" onclick="window.location.href='ai_exam_seats_allocated_disp.php?cDay=<?=$cDay?>&cTime=<?=$cTime?>&hall_id=<?=$req_hall_id.','.$id?>&course_name=<?=$course_name?>&update=yes&examid=<?=$examid?>'">Schedule</a></td> 
	    </tr>
<?php } 
?>
</tbody>
</table>
</div>

<?php }?>
