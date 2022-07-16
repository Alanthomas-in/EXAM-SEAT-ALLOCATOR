<?php include ('session.php');	
include('connect.php');
$hall_id=$_REQUEST['hall_id'] ;
$cDay=$_REQUEST['cDay'] ;
$cTime=$_REQUEST['cTime'] ;
$fname=$_REQUEST['fname'] ;
echo "select * from exam_room_teacher WHERE room_id='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'";
$query1 = mysqli_query($link,"select * from exam_room_teacher WHERE room_id='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
if (mysqli_num_rows($query1)==0) {
	$query = mysqli_query($link,"INSERT exam_room_teacher(room_id,exam_date,exam_time,fname) values('$hall_id','$cDay','$cTime','$fname')") or die(mysqli_error($link));
} else {
	$query = mysqli_query($link,"UPDATE exam_room_teacher SET fname='$fname' where room_id='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
}
?>