<?php
session_start();
require "../../database/database.php";

if (isset($_POST["identifier"])) {
	$identifier = $_POST["identifier"];
	
	$sectionName = $_SESSION["sched-sectionname"];
	$dayOfSched = implode("|", $_POST["dayofsched"]);
	$schedTimeFrom = $_POST["schedtimefrom"];
	$schedTimeTo = $_POST["schedtimeto"];
	$schedPlace = $_POST["schedplace"];
	$createdBy = $_SESSION["nameofadmin"];
	$id = $_POST["id"];

	$checkSql = "SELECT *
	FROM tbl_schedules
	WHERE nameof_section = :nameof_section AND subject_codeno LIKE :subject_codeno AND status=0";
	$result = $conn->prepare($checkSql);
	$result->bindParam(':subject_codeno', $subjectCodeNo);
	$result->bindParam(':nameof_section', $sectionName);
	$result->execute();
	$subjectCount = $result->rowCount();

	$checkSql = "SELECT * FROM tbl_schedules WHERE (nameof_section = '$sectionName' 
	AND dayof_sched REGEXP '$dayOfSched' AND status=0 AND id!='$id')
	AND 
	(STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p')
	BETWEEN STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	OR
	STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	BETWEEN STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p'))

	";
	$result = $conn->prepare($checkSql);
	$result->execute();
	$dayTimeCount = $result->rowCount();

	$checkSql = "SELECT * FROM tbl_schedules WHERE (sched_place = '$schedPlace' 
	AND dayof_sched REGEXP '$dayOfSched' AND status=0)
	AND 
	(STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p')
	BETWEEN STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	OR
	STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	BETWEEN STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p'))  
	";
	$result = $conn->prepare($checkSql);
	$result->execute();
	$timeRoomCount = $result->rowCount();

	if ($identifier == "update") {
	    
	    $checkSql = "SELECT * FROM tbl_schedules WHERE (nameof_section = '$sectionName' 
	AND dayof_sched REGEXP '$dayOfSched' AND status=0 AND id!='$id')
	AND 
	(STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p')
	BETWEEN STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	OR
	STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	BETWEEN STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p'))

	";
	$result = $conn->prepare($checkSql);
	$result->execute();
	$dayTimeCountp = $result->rowCount();

	$checkSql = "SELECT * FROM tbl_schedules WHERE (sched_place = '$schedPlace' 
	AND dayof_sched REGEXP '$dayOfSched' AND status=0 AND id!='$id')
	AND 
	(STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p')
	BETWEEN STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	OR
	STR_TO_DATE(schedtime_from, '%l:%i %p' ) AND STR_TO_DATE(schedtime_to, '%l:%i %p' )
	BETWEEN STR_TO_DATE('$schedTimeFrom', '%l:%i %p') AND STR_TO_DATE('$schedTimeTo', '%l:%i %p'))  
	";
	$result = $conn->prepare($checkSql);
	$result->execute();
	$timeRoomCountp = $result->rowCount();

		if ($subjectCount > 0) {
			echo "WARNING: There's already a schedule for this subject!";
		}
		elseif ($dayTimeCountp > 0) {
			echo "WARNING: There's already a schedule for this Day and Time!";
		}
		elseif ($timeRoomCountp > 0) {
			echo "WARNING: This room is occupied for this time!";
		}
		else
		{
			$dayOfSched = implode(",", $_POST["dayofsched"]);
			$sql = "UPDATE tbl_schedules
			SET dayof_sched = :dayof_sched, schedtime_from = :schedtime_from, schedtime_to = :schedtime_to,
			sched_place = :sched_place
			WHERE id = :id";
			$query = $conn->prepare($sql);
			$query->bindParam(':dayof_sched', $dayOfSched);
			$query->bindParam(':schedtime_from', $schedTimeFrom);
			$query->bindParam(':schedtime_to', $schedTimeTo);
			$query->bindParam(':sched_place', $schedPlace);
			$query->bindParam(':id', $id);

			if ($query->execute()) {
				echo "Success!";
			} else {
				echo "Failed!";
			}
		}
	} 
	else 
	{
		$subjectCodeNo = $_POST["subject"];

		if ($subjectCount > 0) {
			echo "WARNING: There's already a schedule for this subject!";
		}
		elseif ($dayTimeCount > 0) {
			echo "WARNING: There's already a schedule for this Day and Time!";
		}
		elseif ($timeRoomCount > 0) {
			echo "WARNING: This room is occupied for this time!";
		}
		else {
			$dayOfSched = implode(",", $_POST["dayofsched"]);
			$sql = "INSERT INTO tbl_schedules (nameof_section, subject_codeno, dayof_sched, schedtime_from,
			schedtime_to, sched_place, created_by)
			VALUES (:nameof_section, :subject_codeno, :dayof_sched, :schedtime_from, 
			:schedtime_to,
			:sched_place, :created_by)";
			$query = $conn->prepare($sql);
			$query->bindParam(':nameof_section', $sectionName);
			$query->bindParam(':subject_codeno', $subjectCodeNo);
			$query->bindParam(':dayof_sched', $dayOfSched);
			$query->bindParam(':schedtime_from', $schedTimeFrom);
			$query->bindParam(':schedtime_to', $schedTimeTo);
			$query->bindParam(':sched_place', $schedPlace);
			$query->bindParam(':created_by', $createdBy);

			if ($query->execute()) {
				echo "Success!";
			} else {
				echo "Failed!";
			}
		}
	}
} else {
	echo "Error!";
	exit();
}
$conn = null;
?>