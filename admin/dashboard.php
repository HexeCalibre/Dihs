<?php
session_start();
require '../database/database.php';
require '../controllers/functions/queries.php';
if (!isset($_SESSION["nameofadmin"])) {
  header("Location: index.php");
}
$shiftTrackCount = trackShiftCount($conn);

$db = 'dinh_db';
$con = new mysqli('localhost', 'root', '', $db);
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql="SELECT * FROM tbl_enrollees";
$result=mysqli_query($con,$sql);
$enrollees=mysqli_num_rows($result);
mysqli_free_result($result);

$sql="SELECT * FROM tbl_schedules";
$result=mysqli_query($con,$sql);
$schedules=mysqli_num_rows($result);
mysqli_free_result($result);

$sql="SELECT * FROM tbl_sections";
$result=mysqli_query($con,$sql);
$sections=mysqli_num_rows($result);
mysqli_free_result($result);

$sql="SELECT * FROM tbl_students";
$result=mysqli_query($con,$sql);
$students=mysqli_num_rows($result);
mysqli_free_result($result);

$sql="SELECT * FROM tbl_tracks";
$result=mysqli_query($con,$sql);
$tracks=mysqli_num_rows($result);
mysqli_free_result($result);

$sql="SELECT * FROM tbl_subjects";
$result=mysqli_query($con,$sql);
$subjects=mysqli_num_rows($result);
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasma Integrated National Highschool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- JQuery DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">


</head>
<body>
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">Admin Panel</a>
      </div>
      <ul class="nav navbar-nav">
       <li class="active"><a href="dashboard.php">Dashboard</a></li>
       <li class=""><a href="listofenrollees.php">Enrollees</a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student Management <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="tracks.php">Tracks</a></li>
          <li><a href="sections.php">Sections</a></li>
          <li><a href="subjects.php">Subjects</a></li>
          <li><a href="grades.php">Grades</a></li>
        </ul>
      </li>
      <li><a href="schedules.php">Schedules</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Accounts <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listofstudents.php">Students</a></li>
          <li><a href="admins.php">Administrators</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span> Hi, <?php echo $_SESSION["nameofadmin"]; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container"><br><br><br>
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><h4><b>Total No. of Enrollees</b></h4></center></div>
        <div class="panel-body" style="font-size: 25px"><center><?php echo $enrollees; ?></center></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><h4><b>Total No. of Students</b></h4></center></div>
        <div class="panel-body" style="font-size: 25px"><center><?php echo $students; ?></center></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><h4><b>Total No. of Schedules</b></h4></center></div>
        <div class="panel-body" style="font-size: 25px"><center><?php echo $schedules; ?></center></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><h4><b>Total No. of Subjects</b></h4></center></div>
        <div class="panel-body" style="font-size: 25px"><center><?php echo $subjects; ?></center></div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- JQuery DataTable -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<!--Sweet Alert Box 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>