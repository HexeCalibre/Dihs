<?php
session_start();
require '../database/database.php';
if (!isset($_SESSION["studentname"])) {
  header("Location: index.php");
}
$studentIdNo = $_SESSION["studentid_no"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasma Integrated National Highschool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand">Student Panel</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="profile.php">Your Profile</a></li>
        <li><a href="enrollmentform.php">Enrollment</a></li>
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
    <div class="panel panel-success">
      <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-list-alt"></span> Profile Information</strong>
      </div>
      <div class="panel-body">
        <?php
        $track_id = "";
        $sql = "SELECT tbl_students.studentid_no, tbl_tracks.track_name, tbl_tracks.track_id, tbl_students.nameof_section, tbl_students.grade_level
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
            <label>Student ID Number: <?php echo $row->studentid_no; ?></label><br>
            <label>Track: <?php echo $row->track_name; ?></label><br>
            <label>Name of Section: <?php echo $row->nameof_section; ?></label><br>
            <?php
            $track_id =$row->track_id ;
          }
        } else {
          echo "No data found!";
        }
        ?>
      </div>
    </div>
    <div class="panel panel-success">
      <div class="panel-heading">
        <strong><span class="glyphicon glyphicon-list-alt"></span> Curriculum</strong>
      </div>
      <div class="panel-body">
        <?php
        $sql = "SELECT * FROM tbl_subjects 
                WHERE track_id = :track_id AND is_active='Yes'";
        $result = $conn->prepare($sql);
        $result->bindParam(':track_id', $track_id);
        $result->execute();
        $rowCount = $result->rowCount();

        if ($rowCount > 0) {
          while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            ?>
            <label><?php echo $row->subject_codeno." - ".$row->nameof_subject; ?></label><br>
            <?php
          }
        } else {
          echo "No data found!";
        }
        $conn = null;
        ?>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>