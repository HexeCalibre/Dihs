<?php
session_start();
require '../database/database.php';
if (!isset($_SESSION["nameofadmin"])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasma Integrated Highschool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/general.css">
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
            <li class="active"><a href="tracks.php">Tracks</a></li>
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
  <div class="container">
    <h3>Tracks</h3>
    <?php
    $sql = "SELECT track_id, track_name, track_acronym,
           (SELECT COUNT(tbl_students.track_id) FROM tbl_students
            WHERE tbl_students.track_id = tbl_tracks.track_id) AS `countof_section`
            FROM tbl_tracks";
    $result = $conn->prepare($sql);
    $result->execute();
    $rowCount = $result->rowCount();

    if ($rowCount > 0) {
      ?>
      <div class="row">
        <div id="div-panel">
          <div class="panel-group">
            <?php
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
              ?>
              <div class="col-md-4">
                <div class="panel panel-success" id="panel-mbottom">
                  <div class="panel-heading">
                    <label><?php echo $row->track_acronym . " - " . $row->track_name; ?></label>
                  </div>
                  <div class="panel-body">

                    <div class="dropdown pull-right">
                      <button id="<?php echo $row->track_id; ?>" class="btn btn-primary dropdown-toggle btn-xs btn-manage" type="button" data-toggle="dropdown">Manage Sections
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu t-sections">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                      </ul>
                    </div>
                    <label>Total Students Allocated: <?php echo $row->countof_section; ?></label>

                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
      <?php
    } else {
      ?>
      <h4>No data found!</h4>
      <?php
    }
    $conn = null;
    ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../js/admin/tracks.js"></script>
</body>
</html>