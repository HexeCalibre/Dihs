<?php
session_start();
if (!isset($_SESSION["nameofadmin"])) {
	header("Location: index.php");
}
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	<style type="text/css">
		@media (min-width: 768px) {
			.modal-xl {
				width: 90%;
				max-width:1200px;
			}
		}
		.fc-title{
			font-size: 17px;
		}
	</style>

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
				<li class="active"><a href="schedules.php">Schedules</a></li>
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
		<h3>Class Schedules</h3>
		<button type="button" id="btnviewtimetable" name="addTask" class="btn btn-primary">View Schedules Timetable</button><br><br>

		<table id="managesched" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Name of Section</th>
					<th>Track</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
	<!-- timetable modal -->
	<div id="timetable" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title mt-0" id="myModalLabel">Schedule Timetable</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<div id="calendar"></div>
						</div>

					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="uploaditb" name="uploaditb" class="btn btn-primary">Upload</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- end timetable modal -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<!-- JQuery DataTable -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

<script src="../js/admin/schedules.js"></script>


<script type="text/javascript">
	$(document).on('click', '#btnviewtimetable', function(){ 
		$('#timetable').modal();

	});

	Date.prototype.getWeek = function(start)
	{
        //Calcing the starting point
        start = start || 0;
        var today = new Date(this.setHours(0, 0, 0, 0));
        var day = today.getDay() - start;
        var date = today.getDate() - day;

        // Grabbing Start/End Dates
        var StartDate = new Date(today.setDate(date));
        var EndDate = new Date(today.setDate(date + 6));
        return [StartDate, EndDate];
    }

    // test code
    var Dates = new Date().getWeek();
    for(i = 0; i < Dates.length; i++) {
    	day = Dates[i].getDate();
    	month = (Dates[i].getMonth()) + 1;
    	year = Dates[i].getFullYear();

    	Dates[i] = year + '-' + month + '-' + day;
    }

    $(document).ready(function(){
    	$('#calendar').fullCalendar({
    		header: false,
    		columnFormat: 'dddd',
    		allDaySlot: false,
    		hiddenDays: [0],
    		defaultView: 'agendaWeek',
    		minTime: '07:00:00',
    		maxTime: '21:00:00',
    		editable: false,
    		events: '../controllers/getevents2.php',
    		
    		
    	});






    	$('#timetable').on('shown.bs.modal', function () {
    		$("#calendar").fullCalendar('render');
    	});



    });
</script>

</body>
</html>