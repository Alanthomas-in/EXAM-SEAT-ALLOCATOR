<?php 
include ('connect.php');
$sql= "select * from student WHERE email_id='".$_REQUEST['email']."'";
$query = mysqli_query($link,$sql) or die(mysqli_error($link));
if(mysqli_num_rows($query)>0) echo "<strong style='color:red'>Email ID no is already entered</strong>";?>