<?php
require '../../database/database.php';

$sql = "SELECT tbl_subjects.id, tbl_subjects.subject_codeno, tbl_subjects.nameof_subject,
			   tbl_tracks.track_name, tbl_subjects.created_by, tbl_subjects.date_created
		FROM tbl_subjects
		LEFT JOIN tbl_tracks ON tbl_subjects.track_id = tbl_tracks.track_id
		WHERE tbl_subjects.is_active = 'Yes'
		ORDER BY tbl_subjects.id DESC";
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"subject_codeno" => $row->subject_codeno,
		"nameof_subject" => $row->nameof_subject,
		"track_name" => $row->track_name,
		"created_by" => $row->created_by,
		"date_created" => $row->date_created,
		"option" => "<button id='$id' type='button' class='btn btn-danger btn-xs btn-delete'>
						Delete Subject
					 </button>"
	);
}
echo json_encode($data);
$conn = null;
?>