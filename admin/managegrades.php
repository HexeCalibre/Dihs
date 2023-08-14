<?php
session_start();
require '../database/database.php';
require '../controllers/functions/queries.php';
if (!isset($_SESSION["nameofadmin"])) {
	header("Location: index.php");
}
$studentName = $_SESSION["nameofstudent"];
$trackId = $_SESSION["g-track_id"];
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
	<!-- jQuery date picker -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
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
			<button id="btn-input" type="button" class="btn btn-success" data-toggle="collapse" data-parent="#accordion" data-target="#inputdiv">Input Grade</button>
			<a href="grades.php"><button type="button" class="btn btn-warning">Go Back</button></a>
		</div>
		<h3>Student Name: <?php echo $studentName; ?></h3>
		<div class="panel-group" id="accordion">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#subjectdiv">
							Subjects Grades <span class="glyphicon glyphicon-plus pull-right"></span>
						</a>
					</h4>
				</div>
				<div id="subjectdiv" class="panel-collapse collapse in">
					<div class="panel-body">
						<table id="students" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Subject Code No.</th>
									<th>Subject Name</th>
									<th>School Year</th>
									<th>Semester</th>
									<th>Midterm Grade</th>
									<th>Final Term Grade</th>
									<th>Final Grade</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div id="gradeFields" class="panel panel-success" style="display: none">
				<div class="panel-heading">
					<h4 class="panel-title">
						Grade Fields
					</h4>
				</div>
				<div id="inputdiv" class="panel-collapse collapse">
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
										<label>School Year</label>
										<input type="text" class="form-control" name="schoolyear" placeholder="Choose school year" required autocomplete="off" value="<?php echo date("Y"); ?>" readonly>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Semester</label>
										<select class="form-control" id="semester-id" name="semester" required>
											<option value="" hidden>Choose semester</option>
											<option>1st Semester</option>
											<option>2nd Semester</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-4">
									<label>Midterm Grade</label>
									<div class="form-group">
										<input type="text" class="form-control" name="midterm_grade" id="midterm_grade" placeholder="Input Midterm Grade"  autocomplete="off">
									</div>
								</div>
								<div class="col-md-4">
									<label>Final Term Grade</label>
									<div class="form-group">
										<input type="text" class="form-control" name="final_term_grade" placeholder="Input Final Term Grade" autocomplete="off">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-success">Submit</button>
							<button type="button" class="btn btn-info btn-clear">Clear</button>
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
	<!-- jQuery date picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	<!--Sweet Alert Box 2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="../js/admin/managegrades.js"></script>
</body>
</html> 