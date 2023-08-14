<?php
require '../../database/database.php';

$sql = "SELECT tbl_students.id, tbl_students.studentid_no,
		CONCAT(tbl_students.student_fname, ' ', IFNULL(tbl_students.student_middlename, ''), ' ', tbl_students.student_lname) AS `full_name`, tbl_students.grade_level, IFNULL(tbl_tracks.track_name, 'Not Available') AS `track_name`,
		IFNULL(tbl_sections.nameof_section, 'Not Available') AS `nameof_section`, tbl_students.created_by
		FROM tbl_students
		LEFT JOIN tbl_tracks ON tbl_students.track_id = tbl_tracks.track_id
		LEFT JOIN tbl_sections ON tbl_students.nameof_section = tbl_sections.nameof_section
		ORDER BY tbl_students.id DESC";
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"studentid_no" => $row->studentid_no,
		"full_name" => $row->full_name,
		"grade_level" => $row->grade_level,
		"track" => $row->track_name,
		"section" => $row->nameof_section,
		"created_by" => $row->created_by,
		"option" => "<button id='$id' type='button' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#eModal'>
						Edit Information
					 </button>"
	);
}
echo json_encode($data);
$conn = null;
?>