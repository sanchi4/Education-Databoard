<?php
session_start();
    include 'connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION['varname'] = $username;

    $statement = mysqli_prepare($con, "SELECT * FROM student WHERE user = ? AND pass = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
   
    mysqli_stmt_store_result($statement);
    
    if(!($username==null || $password==null)){
   if(mysqli_stmt_fetch($statement)){
        header("Location: student_dashboard.php");   
    }
    else{
    $statement1 = mysqli_prepare($con, "SELECT * FROM teacher WHERE user = ? AND pass = ?");
    mysqli_stmt_bind_param($statement1, "ss", $username, $password);
    mysqli_stmt_execute($statement1);
    mysqli_stmt_store_result($statement1);
   if(mysqli_stmt_fetch($statement1)){
        header("Location: faculty_dashboard.php"); 
        }
else{echo "Wrong credentials";echo $username , $password;}
    }}else{echo "Wrong credentials";echo $username , $password;}
?>