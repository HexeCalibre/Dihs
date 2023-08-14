<?php
session_start();
if (!isset($_SESSION["studentname"])) {
  header("Location: index.php");
}
unset($_SESSION["schoolyear"]);
unset($_SESSION["semester"]);

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
  <!-- jQuery date picker -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
</head>
<body>
  <!-- Modal for Filtering grades result -->
  <div class="modal fade" id="gModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Filter Grades</h4>
        </div>
        <form id="gForm" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" name="schoolyear" placeholder="Choose school year" required autocomplete="off">
            </div>
            <div class="form-group">
              <select class="form-control" id="semester-id" name="semester" required>
                <option value="" hidden>Choose semester</option>
                <option>1st Semester</option>
                <option>2nd Semester</option>
              </select>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End -->
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">Student Panel</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="profile.php">Your Profile</a></li>
        <li><a href="enrollmentform.php">Enrollment</a></li>
        <li class="active"><a href="grades.php">Grades</a></li>
        <li><a href="schedules.php">Class Schedule</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span> Hi, <?php echo $_SESSION["studentname"]; ?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="changepass.php">Change Password</a></li>
          </ul>
        </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="pull-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#gModal">Filter Grades</button>
      <button type="button" class="btn btn-info btn-refresh">Refresh</button>
    </div>
    <h3 id="page-title">Grades</h3>
    <br>
    <table id="grades" class="table table-striped table-bordered" style="width:100%">
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
  <!-- jQuery date picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <script src="../js/student/grades.js"></script>
</body>
</html>