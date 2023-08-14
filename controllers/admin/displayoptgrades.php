<?php
session_start();
require '../../database/database.php';

if (isset($_SESSION["grades-trackid"]) && isset($_SESSION["grades-sectionname"])) {
	$trackId = $_SESSION["grades-trackid"];
	$sectionName = $_SESSION["grades-sectionname"];

	$sql = "SELECT tbl_students.studentid_no,
		CONCAT(tbl_students.student_fname, ' ', IFNULL(tbl_students.student_middlename, ''), ' ', tbl_students.student_lname) AS `full_name`, IFNULL(tbl_tracks.track_name, 'Not Available') AS `track_name`,
		IFNULL(tbl_sections.nameof_section, 'Not Available') AS `nameof_section`
		FROM tbl_students
		LEFT JOIN tbl_tracks ON tbl_students.track_id = tbl_tracks.track_id
		LEFT JOIN tbl_sections ON tbl_students.nameof_section = tbl_sections.nameof_section
		WHERE tbl_students.track_id = '$trackId' AND tbl_sections.nameof_section = '$sectionName'
		ORDER BY tbl_students.id DESC";
} else {
	$sql = "SELECT tbl_students.studentid_no,
		CONCAT(tbl_students.student_fname, ' ', IFNULL(tbl_students.student_middlename, ''), ' ', tbl_students.student_lname) AS `full_name`, IFNULL(tbl_tracks.track_name, 'Not Available') AS `track_name`,
		IFNULL(tbl_sections.nameof_section, 'Not Available') AS `nameof_section`
		FROM tbl_students
		LEFT JOIN tbl_tracks ON tbl_students.track_id = tbl_tracks.track_id
		LEFT JOIN tbl_sections ON tbl_students.nameof_section = tbl_sections.nameof_section
		ORDER BY tbl_students.id DESC";
}
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->studentid_no;
	$data[] = array(
		"studentid_no" => $row->studentid_no,
		"full_name" => $row->full_name,
		"track" => $row->track_name,
		"section" => $row->nameof_section,
		"option" => "<button id='$id' type='button' class='btn btn-success btn-xs btn-manage'>
						Manage Grades
					 </button>
					 <button id='$id' type='button' class='btn btn-primary btn-xs btn-view'>
						View Grades
					 </button>"
	);
}
echo json_encode($data);
$conn = null;
?>