<?php 
function allocate_seat($hall_id,$cDay,$cTime,$course_name){
	$query = mysqli_query($link,"select * from room where roomid='".$hall_id."'") or die(mysqli_error($link));
	if($row = mysqli_fetch_array($query)) {
		$room_name = $row['room_name']; 
		$block_name = $row['block_name'];
	    $row_count = $row['row_count']; 
	    $col_count = $row['col_count']; 
	}
	foreach($row =0;$row<$row_count;$row++){
		foreach($row =0;$row<$row_count;$row++){
		
		}
	}

	$seat_count = $row_count*$col_count;
	$query = mysqli_query($link,"select * from examsched WHERE room_id='".$hall_id."' AND exam_date='".$cDay."' AND exam_time='".$cTime."'") or die(mysqli_error($link));
	while ($row = mysqli_fetch_array($query)) {




	}
}
?>