<?php
session_start();
require '../database/database.php';
require '../controllers/functions/queries.php';
if (!isset($_SESSION["nameofadmin"])) {
  header("Location: index.php");
}
$sectionName = $_SESSION["sched-sectionname"];
$trackId = $_SESSION["sched-trackid"];
$arrFetchSubj = fetchSubjByTrackId($conn, $trackId);
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
  <!-- jQuery time picker -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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
    <div class="pull-right">
      <button id="btn-create" type="button" class="btn btn-success" data-toggle="collapse" data-parent="#accordion" data-target="#createDiv">Create Schedule</button>
      <a href="schedules.php"><button type="button" class="btn btn-warning">Go Back</button></a>
    </div>
    <h3>Section Name: <?php echo $sectionName; ?></h3>
    <div class="panel-group" id="accordion">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#schedDiv">Class Schedules <span class="glyphicon glyphicon-plus pull-right"></span></a>
          </h4>
        </div>
        <div id="schedDiv" class="panel-collapse collapse in">
          <div class="panel-body">
            <table id="schedules" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Subject Code No.</th>
                  <th>Subject Name</th>
                  <th>Schedule Day & Time</th>
                  <th>Place (Room/Building No.)</th>
                  <th>Created By</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div id="schedform" class="panel panel-success" style="display: none">
        <div class="panel-heading">
          <h4 class="panel-title">
            Schedule Form
          </h4>
        </div>
        <div id="createDiv" class="panel-collapse collapse">
          <div class="panel-body">
            <form id="cForm" method="post">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Subject Name</label>
                    <select class="form-control" id="subject-id" name="subject" required>
                      <option value="" hidden>Choose subject</option>
                      <?php
                      foreach ($arrFetchSubj as $subj) {
                        ?>
                        <option value="<?php echo $subj->subject_codeno; ?>"><?php echo $subj->nameof_subject; ?></option>
                        <?php
                      }
                      $conn = null;
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Schedule Time (From)</label>
                    <input type="text" class="form-control timepicker" name="schedtimefrom" placeholder="Pick schedule time" required autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Schedule Time (To)</label>
                    <input type="text" class="form-control timepicker" name="schedtimeto" placeholder="Pick schedule time" required autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Day (hold shift to select more than one)</label>
                    <select multiple class="form-control" id="day-id" name="dayofsched[]" required>
                      <option value="" hidden>Choose subject</option>
                    
                      <option>Monday</option>
                      <option>Tuesday</option>
                      <option>Wednesday</option>
                      <option>Thursday</option>
                      <option>Friday</option>
                      <option>Saturday</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Place (Room/Building No.)</label>
                    <input type="text" class="form-control" name="schedplace" placeholder="Input schedule place" required autocomplete="off">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
              <button type="button" class="btn btn-info btn-clear">Clear</button>
              <button type="button" class="btn btn-danger btn-delete pull-right" style="display: none">
                <span class="glyphicon glyphicon-trash"></span> Delete Schedule
              </button>
            </form>
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
  <!-- jQuery time picker -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <!--Sweet Alert Box 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../js/admin/manageschedule.js"></script>
</body> 
</html>