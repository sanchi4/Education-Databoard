<?php
session_start();
$regValue = $_SESSION['varname'];
 include 'connection.php';
$query = mysqli_query($con,"SELECT * FROM person_data WHERE teacher_id='".$regValue."'");

$array = array();
while($row = mysqli_fetch_assoc($query)){
  $array[] = $row;
  echo  '<b><h4>' . $row['teacher_name'] . '</h4></b>' ;
}
?>