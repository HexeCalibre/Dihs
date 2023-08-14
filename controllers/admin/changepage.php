<?php
session_start();
require '../../database/database.php';

if (isset($_POST["studentidno"])) {
	$studentIdNo = $_POST["studentidno"];

	$sql = "SELECT CONCAT(student_fname, ' ', student_lname) AS `nameof_student`, track_id
			FROM tbl_students WHERE studentid_no = :studentid_no";
	$result = $conn->prepare($sql);
	$result->bindParam(':studentid_no', $studentIdNo);
	if ($result->execute()) {
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$_SESSION["studentid_no"] = $studentIdNo;
			$_SESSION["nameofstudent"] = $row->nameof_student;
			$_SESSION["g-track_id"] = $row->track_id;
			echo "mgtgrades"; //Manage Grades
		}
	} else {
		echo "Failed!";
	}
}

if (isset($_POST["studidnoview"])) {
	$studentIdNo = $_POST["studidnoview"];

	$sql = "SELECT CONCAT(student_fname, ' ', student_lname) AS `nameof_student`, track_id
			FROM tbl_students WHERE studentid_no = :studentid_no";
	$result = $conn->prepare($sql);
	$result->bindParam(':studentid_no', $studentIdNo);
	if ($result->execute()) {
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$_SESSION["studentid_no"] = $studentIdNo;
			$_SESSION["nameofstudent"] = $row->nameof_student;
			echo "viewgrades"; //Manage Grades
		}
	} else {
		echo "Failed!";
	}
}

if (isset($_POST["schedmanageid"])) {
	$id = $_POST["schedmanageid"];

	$sql = "SELECT track_id, nameof_section FROM tbl_sections WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	if ($result->execute()) {
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$_SESSION["sched-trackid"] = $row->track_id;
			$_SESSION["sched-sectionname"] = $row->nameof_section;
			echo "mgtsched";
		}
	} else {
		echo "Failed!";
	}
}

if (isset($_POST["schedviewid"])) {
	$id = $_POST["schedviewid"];

	$sql = "SELECT track_id, nameof_section FROM tbl_sections WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	if ($result->execute()) {
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$_SESSION["schedview-trackid"] = $row->track_id;
			$_SESSION["schedview-sectionname"] = $row->nameof_section;
			echo "viewsched";
		}
	} else {
		echo "Failed!";
	}
}
$conn = null;
?>