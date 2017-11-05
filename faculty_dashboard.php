<!DOCTYPE html>
<html>
<title>Education-DataBoard/newvideo</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.btn-register {
	background-color: #f2f2f2;
	outline: none;
	color: #000;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #a6a6a6;
	border-color: #a6a6a6;
}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><b>Education DataBoard</b></a>
    </div>
    <form class="navbar-form navbar-left" action="search_teacher.php" method="post">
      <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search" id="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    <form class="navbar-form navbar-right">
      <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
            <i class="glyphicon glyphicon-user"></i>
          </button>
          <ul class="dropdown-menu">
            <li><a href="index.html"><span class="glyphicon glyphicon-log-out w3-margin-right"></span>Log Out</a></li>
          </ul>
      </div>
    </form>
    <form class="navbar-form navbar-right">
        <a href="lecture_details.html">
          <button class="btn btn-default" type="button">
            <i class="glyphicon glyphicon-plus"></i>
          </button>
        </a>
    </form>
  </div>
</nav>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <hr><hr>
    <img src="user.jpg" style="width:45%;" class="w3-round"><br><br>
<?php
session_start();
$regValue = $_SESSION['varname'];
 include 'connection.php';
$query = mysqli_query($con,"SELECT * FROM person_data WHERE teacher_id='".$regValue."'");

$array = array();
while($row = mysqli_fetch_assoc($query)){
  $array[] = $row;
  echo  '<b><h4>' . $row['teacher_name'] . '</h4></b>' ;
  echo '<p class="w3-text-grey">' .$row['institute_name']. '</p>';
}
?>
    
  </div>
  <div class="w3-bar-block">
    <a href="faculty_dashboard.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="glyphicon glyphicon-home w3-margin-right"></i></i>HOME</a>
    <a href="#popular" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="glyphicon glyphicon-fire w3-margin-right"></i>POPULAR</a>
    <a href="faculty_setting.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="glyphicon glyphicon-cog w3-margin-right"></i></i>SETTINGS</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="home">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <hr><hr>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span>
      <button class="w3-button w3-black" OnClick="location.href='faculty_dashboard.php'">All</button>
      <button class="w3-button w3-white" data-toggle="modal" data-target="#mymodal1">Institute Specific</button>
      <button class="w3-button w3-white w3-hide-small" data-toggle="modal" data-target="#mymodal2">Semester Specific</button>
      <button class="w3-button w3-white w3-hide-small" data-toggle="modal" data-target="#mymodal3"></i>Department Specific</button>
    </div>
    </div>
  </header>

  <!-- Filter Modals-->
  <!-- Institute Specific Modal -->
  <div class="modal fade" id="mymodal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Institute Id</h4>
        </div>
        <div class="modal-body">
          <form id="lecture-form" action="institute_filter_teacher.php" method="post" role="form" >
            <div class="form-group">
              <input type="text" name="inst" id="inst" tabindex="1" class="form-control" placeholder="Institute" value="">
            </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="instname" id="instname" tabindex="4" class="form-control btn btn-register" value="OK">
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Semester Specific Modal -->
  <div class="modal fade" id="mymodal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Semester Number</h4>
        </div>
        <div class="modal-body">
          <form id="lecture-form" action="sem_filter_teacher.php" method="post" role="form" >
            <div class="form-group">
              <input type="text" name="sem" id="sem" tabindex="1" class="form-control" placeholder="Sem" value="">
            </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="instname" id="instname" tabindex="4" class="form-control btn btn-register" value="OK">
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Department Specific Modal -->
  <div class="modal fade" id="mymodal3" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Department Name</h4>
        </div>
        <div class="modal-body">
          <form id="lecture-form" action="dept_filter_teacher.php" method="post" role="form" >
            <div class="form-group">
              <input type="text" name="dept" id="dept" tabindex="1" class="form-control" placeholder="Department" value="">
            </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="instname" id="instname" tabindex="4" class="form-control btn btn-register" value="OK">
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>


  <!-- First Video Grid-->
  <div class="container">
    <hr><hr>
    <div class="row">
      <h5><b>Recently Uploaded</b></h5>
      <hr>
    </div>

    <?php
	include 'connection.php';
$query ="SELECT * FROM lecture,person_data where lecture.teacher_id=person_data.teacher_id ORDER BY Time_created DESC";
$stmt = mysqli_query($con,$query);
$array = array();
while($row = $stmt->fetch_assoc()){
  $array[] = $row;
  //echo $row['link'];
?>
 <div class="row">
      <div class="media">
       <div class="media-left">
         <iframe width="250" height="125" src=<?=$row['link']?> frameborder="0" allowfullscreen></iframe>
</div>
        <div class="media-body">
          <h4 class="media-heading"><?=$row['lecture_title'];?></h4>
          <p><?=$row['teacher_name'];?></p>
<p><?=$row['institute_name'];?></p>
        </div>
      </div>
      </div>
    <div class="row">
      <hr>
    </div>
 <?php       
}
?>

</div>

  <!-- Second Video Grid-->
  <div class="container" id="popular">
    <hr><hr>
    <div class="row">
      <h5><b>Popular</b></h5>
      <hr>
    </div>

     <?php
	include 'connection.php';
$query ="SELECT * FROM lecture,person_data where lecture.teacher_id=person_data.teacher_id ORDER BY priority DESC";
$stmt = mysqli_query($con,$query);
$array = array();
while($row = $stmt->fetch_assoc()){
  $array[] = $row;
  //echo $row['link'];
?>
 <div class="row">
      <div class="media">
       <div class="media-left">
         <iframe width="250" height="125" src=<?=$row['link']?> frameborder="0" allowfullscreen></iframe>
</div>
        <div class="media-body">
          <h4 class="media-heading"><?=$row['lecture_title'];?></h4>
         <p><?=$row['teacher_name'];?></p>
<p><?=$row['institute_name'];?></p>
        </div>
      </div>
    </div>

    <div class="row">
      <hr>
    </div>
 <?php       
}
?>

</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>