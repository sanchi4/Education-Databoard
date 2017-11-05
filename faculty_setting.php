<!DOCTYPE html>
<html lang="en">
<head>
  <title>Education-DataBoard/register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="files_select.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
  .btn-register {
  	background-color: #f2f2f2;
  	outline: none;
  	color: #000;
  	font-size: 12px;
  	height: 30px;
    width:170px;
  	font-weight: normal;
  	border-color: #1CB94A;
  }
  .btn-register:hover,
  .btn-register:focus {
  	color: #fff;
  	background-color: #a6a6a6;
  	border-color: #a6a6a6;
  }
  </style>
</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><b>Education DataBoard</b></a>
      </div>
    </div>
  </nav>

<!-- Modal for change password-->
  <div class="modal fade" id="mymodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
          <form id="lecture-form" action="#" method="post" role="form" >
            <div class="form-group">
              <input type="text" name="pass" id="pass" tabindex="1" class="form-control" placeholder="Password" value="">
            </div>
            <div class="form-group">
              <input type="text" name="cpass" id="cpass" tabindex="1" class="form-control" placeholder="Confirm Password" value="">
            </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-2">
                <input type="submit" name="sunmit" id="submit" tabindex="4" class="form-control btn btn-register" value="Submit">
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change E-mail</h4>
        </div>
        <div class="modal-body">
          <form id="lecture-form" action="#" method="post" role="form" >
            <div class="form-group">
              <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="E-mail Eg..abc@xyz.com" value="">
            </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-2">
                <input type="submit" name="sunmit" id="submit" tabindex="4" class="form-control btn btn-register" value="Submit">
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <hr><hr>
    <div class="container">
      	<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<div class="panel panel-login">
              <div class="panel-heading">
    						<div class="row">
    							<div class="col-xs-12">
    								<h3>Account Information</h3>
    							</div>
    						</div>
    						<hr>
    					</div>
<?php
session_start();
$regValue = $_SESSION['varname'];
 include 'connection.php';
$query = mysqli_query($con,"SELECT * FROM person_data WHERE teacher_id='".$regValue."'");
$q=mysqli_query($con,"SELECT * teacher WHERE teacher_id='".$regValue."'");

$array = array();
while($row = mysqli_fetch_assoc($query)){
  $array[] = $row;
  ?>
              <div class="panel-body">
    						<div class="row">
    							<div class="col-lg-6">
                    <label>Institute Name</label>
                  </div>
                  <div class="col-lg-6">
<?php 
      echo '<label>' .$row['institute_name'] .'</label>';
	 ?>
                  </div>
                </div>
                <div class="row">
    							<div class="col-lg-6">
                    <label>Faculty ID</label>
                  </div>
                  <div class="col-lg-6">
                    <?php 
      echo '<label>' .$regValue .'</label>';
	 ?>
                  </div>
                </div>
                <div class="row">
    							<div class="col-lg-6">
                    <label>Name</label>
                  </div>
                  <div class="col-lg-6">
                    <?php 
      echo '<label>' .$row['teacher_name'] .'</label>';
	  }
	 ?>
                  </div>
                </div>
                <div class="row">
    							<div class="col-lg-6">
                    <label>E-mail</label>
                  </div>
                  <div class="col-lg-6">
                  <a href="#" data-toggle="modal" data-target="#edit">Edit</a>
                  </div>
                </div>
                <div class="row">
    							<div class="col-lg-6">
                    <a href="#" data-toggle="modal" data-target="#mymodal">Change Password</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <a href="faculty_dashboard.php"><button type="button" class="btn btn-register">Save Changes</button></a>
          </div>
        </div>
    </div>
    </div>
  </body>
</html>