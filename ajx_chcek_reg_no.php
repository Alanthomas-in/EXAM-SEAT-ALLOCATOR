<?php 
include ('connect.php');
$sql= "select * from student WHERE reg_no='".$_REQUEST['reg_no']."'";
$query = mysqli_query($link,$sql) or die(mysqli_error($link));
if(mysqli_num_rows($query)>0) echo "<strong style='color:red'>Register no is already entered</strong>";?>