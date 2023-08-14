<?php
session_start();
require '../database/database.php';
if (!isset($_SESSION["studentname"])) {
  header("Location: index.php");
}
$sectionName = $_SESSION["nameofsection"];
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
        <li><a href="profile.php">Your Profile</a></li>
        <li><a href="enrollmentform.php">Enrollment</a></li>
        <li><a href="grades.php">Grades</a></li>
        <li class="active"><a href="schedules.php">Class Schedule</a></li>
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
    <button type="button" class="btn btn-primary pull-right" onclick="CallPrint(this.value)">
      <span class="glyphicon glyphicon-print"></span> Print Schedule
    </button>
    <div id="printdiv">
      <h3>Section Name: <?php echo $sectionName; ?></h3>
      <div class="panel panel-success">
        <div class="panel-heading"><h4 class="panel-title">Class Schedules</h4></div>
        <div class="panel-body">
          <?php
          $sql = "SELECT tbl_schedules.subject_codeno, tbl_subjects.nameof_subject,
          CONCAT(tbl_schedules.dayof_sched, ' ', '(', tbl_schedules.schedtime_from, ' - ', tbl_schedules.schedtime_to, ')')
          AS `dayof_sched`, tbl_schedules.sched_place, tbl_schedules.created_by
          FROM tbl_schedules
          LEFT JOIN tbl_subjects ON tbl_schedules.subject_codeno = tbl_subjects.subject_codeno
          WHERE tbl_schedules.nameof_section = :nameof_section AND tbl_schedules.status = 0
          ORDER BY tbl_schedules.id DESC";
          $result = $conn->prepare($sql);
          $result->bindParam(':nameof_section', $sectionName);
          $result->execute();
          $rowCount = $result->rowCount();

          if ($rowCount > 0) {
            ?>
            <div class="table-responsive">          
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Subject Code No.</th>
                    <th>Subject Name</th>
                    <th>Schedule Day & Time</th>
                    <th>Place (Room/Building No.)</th>
                    <th>Created By</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                      <td><?php echo $row->subject_codeno; ?></td>
                      <td><?php echo $row->nameof_subject; ?></td>
                      <td><?php echo $row->dayof_sched; ?></td>
                      <td><?php echo $row->sched_place; ?></td>
                      <td><?php echo $row->created_by; ?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <?php
          } else {
            echo "No data found!";
          }
          $conn = null;
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function CallPrint(strid) {
      var prtContent = document.getElementById("printdiv");
      var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
    }
  </script>
</body>
</html>