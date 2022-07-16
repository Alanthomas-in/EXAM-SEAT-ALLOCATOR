<?php include ('session.php');?>	
<?php include ('header.php');
include('connect.php');

$examid = $_REQUEST['examid'] ;
$reg_no = $_SESSION['id'];

$ssql = "select * from allot_student  WHERE exam_id='".$examid."'";
$query11 = mysqli_query($link,$ssql) or die(mysqli_error($link));
while ($row11  = mysqli_fetch_array($query11)) {			
	$exam_date = $row11['exam_date'];
	$exam_time = $row11['exam_time'];
	$room_id   = $row11['room_id'];
	
	$query1 = mysqli_query($link,"select * from exam_room_teacher WHERE room_id='".$room_id."' AND exam_date='".$exam_date."' AND exam_time='".$exam_time."'") or die(mysqli_error($link));
	$row1 = mysqli_fetch_array($query1);
	$fnameArr[$exam_date] = $row1['fname'];
} 
?>
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