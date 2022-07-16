<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query($link,"delete from room where roomid='$get_id'")or die(mysqli_error($link));
header('location:forroom.php');
?>
