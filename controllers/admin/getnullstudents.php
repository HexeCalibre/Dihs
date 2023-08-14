<?php
require '../../database/database.php';

$sql = "SELECT id, studentid_no,
		CONCAT(student_fname, ' ', IFNULL(student_middlename, ''), ' ', student_lname) AS `full_name`,
		'Not Available' AS `track`
		FROM tbl_students
		WHERE track_id IS NULL
		ORDER BY id DESC";
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"studentid_no" => $row->studentid_no,
		"full_name" => $row->full_name,
		"track" => $row->track,
		"option" => "<button id='$id' type='button' class='btn btn-success btn-xs'>Add to Section</button>"
	);
}
echo json_encode($data);
$conn = null;
?>