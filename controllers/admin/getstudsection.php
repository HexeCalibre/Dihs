<?php
session_start();
require '../../database/database.php';
$nameof_section = $_SESSION["sectionname-view"];

$sql = "SELECT tbl_students.id, tbl_students.studentid_no,
		CONCAT(tbl_students.student_fname, ' ', IFNULL(tbl_students.student_middlename, ''), ' ', tbl_students.student_lname) AS `full_name`, tbl_tracks.track_name
		FROM tbl_students
        LEFT JOIN tbl_tracks ON tbl_students.track_id = tbl_tracks.track_id
		WHERE nameof_section = :nameof_section AND tbl_students.track_id IS NOT NULL
		ORDER BY tbl_students.id DESC";
$result = $conn->prepare($sql);
$result->bindParam(':nameof_section', $nameof_section);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"studentid_no" => $row->studentid_no,
		"full_name" => $row->full_name,
		"track_name" => $row->track_name,
		"option" => "<button id='$id' type='button' class='btn btn-danger btn-xs'>Remove From Section</button>"
	);
}
echo json_encode($data);
$conn = null;
?>