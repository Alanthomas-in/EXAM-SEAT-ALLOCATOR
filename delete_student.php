<?php
include('connect.php');

$get_id=$_GET['id'];
$query = mysqli_query($link,"select * from student where reg_no='$get_id'") or die(mysqli_error($link));
$row = mysqli_fetch_array($query);
$department=$row['department']; 
mysqli_query($link,"delete from student where reg_no='$get_id'")or die(mysqli_error($link));
header('location:forstudent.php?department='.$department);
?>
