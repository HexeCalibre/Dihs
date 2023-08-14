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
  <title>Dasma Integrated  Highschool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- JQuery DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/general.css">
</head>
<body>
  <!-- Modal for Creating new student-->
  <div class="modal fade" id="cModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Fields</h4>
        </div>
        <form id="cForm" method="post">
          <div class="modal-body">
            <div class="input-group m-bottom">
              <input type="text" class="form-control" name="studentidno" placeholder="Click the generate button for Student's ID Number" readonly>
              <div class="input-group-btn">
                <button id="genstudentid" class="btn btn-primary" type="button">Generate</button>
              </div>
            </div>
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
              <select class="form-control" id="gender-id" name="gender" required>
                <option value="" hidden>Choose what gender</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="fname" placeholder="First Name" required autocomplete="off">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="lname" placeholder="Last Name" required autocomplete="off">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="middlename" placeholder="Middle Name (Not required)" autocomplete="off">
            </div>
            <div class="input-group m-bottom">
              <input type="password" class="form-control passid" name="pass" placeholder="Password" required>
              <div class="input-group-btn password-eye">
                <button class="btn btn-default" type="button">
                  <i class="glyphicon glyphicon-eye-close"></i>
                </button>
              </div>
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
  <!-- Modal for Editing student's information -->
  <div class="modal fade" id="eModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Student Fields</h4>
        </div>
        <form id="eForm" method="post">
          <div class="modal-body">
            <div class="form-group">
              <select class="form-control" id="e-gradelevelid" name="e-gradelevel" required>
                <option value="" hidden>Choose what grade level</option>
                <option>Grade 11</option>
                <option>Grade 12</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="e-fname" placeholder="First Name" required autocomplete="off">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="e-lname" placeholder="Last Name" required autocomplete="off">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="e-middlename" placeholder="Middle Name (Not required)" autocomplete="off">
            </div>
            <div class="input-group m-bottom">
              <input type="password" class="form-control passid" name="e-pass" placeholder="Password" required>
              <div class="input-group-btn password-eye">
                <button class="btn btn-default" type="button">
                  <i class="glyphicon glyphicon-eye-close"></i>
                </button>
              </div>
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
            <li><a href="grades.php">Grades</a></li>
          </ul>
        </li>
        <li><a href="schedules.php">Schedules</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="listofstudents.php">Students</a></li>
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
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#cModal">Add New</button>
    <h3>List of Students</h3>
    <table id="students" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>Student ID No.</th>
          <th>Full Name</th>
          <th>Grade Level</th>
          <th>Track</th>
          <th>Section</th>
          <th>Created By</th>
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
  <script src="../js/admin/listofstudents.js"></script>
</body>
</html>