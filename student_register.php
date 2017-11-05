<?php
$user=$_POST["enroll_id"];
$pass=$_POST["password"];
$institute_id=$_POST["institute_id"];
$email=$_POST["email"];

include 'connection.php';
$sql = "Insert into student values ('$institute_id','$user','$email','$pass')";
$stmt = mysqli_query($con,$sql);
if($stmt)
echo "Success";
else
echo "false";
?>