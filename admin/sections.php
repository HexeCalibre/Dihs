<?php
session_start();
require '../database/database.php';
require '../controllers/functions/queries.php';
if (!isset($_SESSION["nameofadmin"])) {
  header("Location: index.php");
}
$arrFetchtrack = fetchTrack($conn);
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
  <link rel="stylesheet" type="text/css" href="../css/general.css">
</head>
<body>
  <!-- Modal for Creating new section-->
  <div class="modal fade" id="cModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New Section</h4>
        </div>
        <form id="cForm" method="post">
          <div class="modal-body">
            <div class="form-group">
              <select class="form-control" id="track-id" name="trackid" required>
                <option value="" hidden>Choose what type of track</option>
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
              <select class="form-control" id="gradelevel-id" name="gradelevel" required>
                <option value="" hidden>Choose what grade level</option>
                <option>Grade 11</option>
                <option>Grade 12</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nameofsection" placeholder="Name of Section" required autocomplete="off">
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
            <li class="active"><a href="sections.php">Sections</a></li>
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
  <div class="container">
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#cModal">Create New</button>
    <h3>List of Sections</h3>
    <table id="sections" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>Name of Section</th>
          <th>Track</th>
          <th>Number of Students</th>
          <th>Created By</th>
          <th>Manage Section</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- JQuery DataTable -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <!--Sweet Alert Box 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../js/admin/sections.js"></script>
</body>
</html>