<?php include ('session.php');?>	
<?php //include ('header.php');
include('connect.php');
$hall_id=$_REQUEST['hall_id'] ;
$query = mysqli_query($link,"select * from room where roomid='".$hall_id."'") or die(mysqli_error($link));
if($row = mysqli_fetch_array($query)) {
    $row_count = $row['row_count']; 
    $col_count = $row['col_count'];
}

$fnameArr=$ExamSchedArr = $courseArr = array();
$ssql = "select * from allot_student  WHERE room_id='".$hall_id."'";
$query11 = mysqli_query($link,$ssql) or die(mysqli_error($link));
while ($row11 = mysqli_fetch_array($query11)) {			
	$exam_date = $row11['exam_date'];
	$exam_time = $row11['exam_time'];
	$ExamSchedArr[$exam_date] = $exam_time;
	$query1 = mysqli_query($link,"select * from exam_room_teacher WHERE room_id='".$hall_id."' AND exam_date='".$exam_date."' AND exam_time='".$exam_time."'") or die(mysqli_error($link));
	$row1 = mysqli_fetch_array($query1);
	$fnameArr[$exam_date] = $row1['fname'];
} 


?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>Date</th>
		<th>Time</th>
	<!-- 	<th>Seat Allocation</th> -->
		<th>Teacher</th>
	</tr>
	<?php foreach($ExamSchedArr as $cDay=>$cTime){	?>
		<tr>
			<td width="20%"><?php echo date("d-m-Y",strtotime($cDay)); ?></td>
		    <td width="20%"><?=$cTime?></td><!-- 
		    <td width="20%"><a href="javascript:void(0)" onclick="window.open('ai_exam_seats_allocated_disp.php?cDay=<?=$cDay?>&cTime=<?=$cTime?>&hall_id=<?=$hall_id?>','<?=$cDay?><?=$cTime?>','width=1000px,height=800px,scrolbars=yes')">View Seat Allocation</a></td> -->
		    <td idth="40%"><div class="control-group">
                                    
                                    <div class="controls">
									<select type="text" name="fname" class = "form-control" placeholder="Category" onchange="update_teacher('<?=$hall_id?>','<?=$cDay?>','<?=$cTime?>',this.value)">
                                      <option>--Select--</option>
										<?php $teacher_query=mysqli_query($link,"select * from teachers ")or die(mysqli_error($link));
										while($teacher_row=mysqli_fetch_array($teacher_query)){
											$query1 = mysqli_query($link,"select * from login_details WHERE email_id='".$teacher_row['email']."' AND usr_type='teacher'") or die(mysqli_error($link));
                                        	if($row1 = mysqli_fetch_array($query1)){    
												$TeacherName = $row1['fname'].' '. $row1['lname'];
												?>
												<option <?php if(trim($TeacherName)==trim($fnameArr[$cDay])) echo "selected";?>><?php echo $TeacherName; ?></option>
												<?php } 
											}?>
										</select>
                                    </div>
                                </div></td>
		</tr>
	<?php }?>
</table>