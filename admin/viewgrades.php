<?php
session_start();
if (!isset($_SESSION["nameofadmin"])) {
  header("Location: index.php");
}
$studentName = $_SESSION["nameofstudent"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasma Integrated Highschool</title>
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
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="listofenrollees.php">Enrollees</a></li>
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
        <li><a><span class="glyphicon glyphicon-user"></span>  Hi, <?php echo $_SESSION["nameofadmin"]; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <a href="grades.php"><button type="button" class="btn btn-warning pull-right">Go Back</button></a>
    <h3>Student Name: <?php echo $studentName; ?></h3>
    <table id="students" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>Subject Code No.</th>
          <th>Subject Name</th>
          <th>School Year</th>
          <th>Semester</th>
          <th>Midterm Grade</th>
          <th>Final Term Grade</th>
          <th>Grade</th>
        </tr>
      </thead>
    </table>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- JQuery DataTable -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script src="../js/admin/viewgrades.js"></script>
</body>
</html>