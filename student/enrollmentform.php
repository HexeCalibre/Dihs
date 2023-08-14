<?php
session_start();
require '../database/database.php';
require '../controllers/functions/queries.php';
if (!isset($_SESSION["studentname"])) {
  header("Location: index.php");
}
$studentIdNo = $_SESSION["studentid_no"];
$arrFetchtrack = fetchTrack($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasma Integrated National Highschool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/general.css">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">Student Panel</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="profile.php">Your Profile</a></li>
        <li class="active"><a href="enrollmentform.php">Enrollment</a></li>
        <li><a href="grades.php">Grades</a></li>
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
    <h3>Student Name: <?php echo $_SESSION["studentname"]; ?></h3>
    <div id="schedform" class="panel panel-success">
      <div class="panel-heading">
        <h4 class="panel-title">Grade 12 - Enrollment Form</h4>
      </div>
      <div class="panel-body">
        <form id="eForm" method="post">
          <?php
          $sql = "SELECT tbl_students.studentid_no, tbl_students.email, tbl_tracks.track_name, tbl_tracks.track_id, tbl_students.nameof_section
          FROM tbl_students
          INNER JOIN tbl_tracks ON tbl_students.track_id = tbl_tracks.track_id
          WHERE tbl_students.studentid_no = :studentid_no";
          $result = $conn->prepare($sql);
          $result->bindParam(':studentid_no', $studentIdNo);
          $result->execute();
          $rowCount = $result->rowCount();

          if ($rowCount > 0) {
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
              ?>
              <div class="form-group">
                <label>Student ID Number:</label>
                <input type="text" class="form-control" name="studentidno" readonly value="<?php echo $row->studentid_no; ?>">
                <input type="text" class="form-control" name="email" readonly value="<?php echo $row->email; ?>">
              </div>
              <div class="form-group">
                <label>Track:</label>
                <input type="text" class="form-control" name="trackcurrent" readonly value="<?php echo $row->track_name; ?>">
                <input type="hidden"  class="form-control" name="trackid" value="<?php echo $row->track_id; ?>">
              </div>
              <div class="form-group">
                <label>Name of Section:</label>
                <input type="text" class="form-control" readonly value="<?php echo $row->nameof_section; ?>">
              </div>
              <div class="form-group">
                <p><strong>Do you want to request of shift track? *</strong></p>
                <div class="radio">
                  <label><input type="radio" name="shiftanswer" required value="Yes"> Yes</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="shiftanswer" required value="No"> No</label>
                </div>
              </div>
              <div class="form-group trackform" style="display: none">
                <p><strong>What strand and track are you applying for? *</strong></p>
                <select class="form-control" id="track-id" name="track">
                  <option value="" hidden>Choose</option>
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
              <div id="uploadfile" style="display: none">
                <div class="form-group">
                  <p class="warning"><strong>The track you choose has a grade requirement. Kindly upload your grade below on the upload file button! *</strong></p>
                  <input type="file" name="gradefile">
                </div>
              </div>
              <div class="form-group">
                <label>Grade Level</label>
                <select class="form-control" id="gradelevel-id" name="gradelevel" required>
                  <option value="" hidden>Choose what grade level</option>
                  <option>Grade 12</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
              <?php
            }
          } else {
            echo "No data found!";
          }
          $conn = null;
          ?>
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--Sweet Alert Box 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../js/student/enrollmentform.js"></script>
</body>
</html>