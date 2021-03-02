<?php
require "dbconnect.php";
$id=base64_decode( $_GET['id']);
$result="DELETE FROM `student_info` WHERE `id`='$id'";
$result1=mysqli_query($link,$result);

if ($result1=mysqli_query($link,$result))
 {
	echo "<script>alert('Are you sure?delete the date!');</script>";
	header("location:index.php?page=all_students");

}
else
{
 echo "something went wrong";
}

?>