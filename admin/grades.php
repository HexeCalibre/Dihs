<?php
session_start();
require '../database/database.php';
require '../controllers/functions/queries.php';
if (!isset($_SESSION["nameofadmin"])) {
  header("Location: index.php");
}
unset($_SESSION["grades-trackid"]);
unset($_SESSION["grades-sectionname"]);
$arrFetchtrack = fetchTrack($conn);
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
  <link rel="stylesheet" type="text/css" href="../css/general.css">
</head>
<body>
   <!-- Modal for Filtering the results -->
   <div class="modal fade" id="gModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Filter Student Grades</h4>
        </div>
        <form id="gForm" method="post">
          <div class="modal-body">
            <div class="form-group">
              <select class="form-control" id="track-id" name="trackid" required>
                <option value="" hidden>Choose what track to filter</option>
                <?php
                foreach ($arrFetchtrack as $track) {
                  ?>
                  <option value="<?php echo $track->track_id; ?>"><?php echo $track->track_name; ?></option>
                  <?php
                }
                $conn = null;
                ?>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="section-id" name="sectionname" required>
                <option value="" hidden>Choose what section to filter</option>
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
            <li class="active"><a href="grades.php">Grades</a></li>
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
    <div class="pull-right">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#gModal">Filter Student Grades</button>
      <button type="button" class="btn btn-warning btn-refresh">Refresh</button>
    </div>
    <h3>Students Grades</h3>
    <div class="panel-group" id="accordion">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h4 class="panel-title">List of Students</h4>
        </div>
        <div id="gradesDiv" class="panel-collapse collapse in">
          <div class="panel-body">
            <table id="students" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Student ID No.</th>
                  <th>Full Name</th>
                  <th>Track</th>
                  <th>Section</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- JQuery DataTable -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script src="../js/admin/grades.js"></script>
</body>
</html>