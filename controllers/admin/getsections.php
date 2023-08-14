<?php
require '../../database/database.php';

$sql = "SELECT tbl_sections.id, tbl_sections.track_id, tbl_sections.nameof_section,
		CONCAT(tbl_tracks.track_acronym, ' - ', tbl_tracks.track_name) AS `track_name`,
		(SELECT COUNT(tbl_students.nameof_section) FROM tbl_students WHERE tbl_students.nameof_section = tbl_sections.nameof_section) AS `numof_students`, tbl_sections.created_by
		FROM tbl_sections
		LEFT JOIN tbl_tracks ON tbl_sections.track_id = tbl_tracks.track_id
		WHERE tbl_sections.is_active = 'Yes'
		ORDER BY tbl_sections.id DESC";
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$sectionName = $row->nameof_section; //passing the section name instead of Track ID
	$data[] = array(
		"nameof_section" => $row->nameof_section,
		"track_name" => $row->track_name,
		"numof_students" => $row->numof_students,
		"created_by" => $row->created_by,
		"manage" => "<button id='$sectionName' type='button' class='btn btn-success btn-xs btn-addstud'>
						Add Student
					 </button>
					 <button id='$sectionName' type='button' class='btn btn-primary btn-xs btn-viewstud'>
						View Students
					 </button>",
		"option" => "<button id='$id' type='button' class='btn btn-danger btn-xs btn-removesection'>
						Remove Section
					 </button>"
	);
}
echo json_encode($data);
$conn = null;
?>