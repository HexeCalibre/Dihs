<?php
require '../../database/database.php';

$sql = "SELECT tbl_sections.id, tbl_sections.nameof_section, tbl_tracks.track_name
		FROM tbl_sections 
		LEFT JOIN tbl_tracks ON tbl_sections.track_id = tbl_tracks.track_id 
		ORDER BY tbl_sections.id  DESC";
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"nameof_section" => $row->nameof_section,
		"track_name" => $row->track_name,
		"option" => "<button id='$id' type='button' class='btn btn-success btn-xs btn-manage'>
						Manage Class Schedule
					 </button>
					 <button id='$id' type='button' class='btn btn-primary btn-xs btn-view'>
						View Class Schedule
					 </button>"
	);
}
echo json_encode($data);
$conn = null;
?>