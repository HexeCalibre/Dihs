<?php
session_start();
require '../../database/database.php';
$sectionName = $_SESSION["sched-sectionname"];
$isActive = "Yes";

$sql = "SELECT tbl_schedules.id, tbl_schedules.subject_codeno, tbl_subjects.nameof_subject,
		CONCAT(tbl_schedules.dayof_sched, ' ', '(', tbl_schedules.schedtime_from, ' - ', tbl_schedules.schedtime_to, ')')
		AS `dayof_sched`,
			   tbl_schedules.sched_place, tbl_schedules.created_by
		FROM tbl_schedules
		LEFT JOIN tbl_subjects ON tbl_schedules.subject_codeno = tbl_subjects.subject_codeno
		WHERE tbl_schedules.nameof_section = :nameof_section AND tbl_schedules.status = 0 
		AND tbl_subjects.is_active = :is_active GROUP BY tbl_schedules.id
		ORDER BY tbl_schedules.id DESC";
$result = $conn->prepare($sql);
$result->bindParam(':nameof_section', $sectionName);
$result->bindParam(':is_active', $isActive);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"subject_codeno" => $row->subject_codeno,
		"nameof_subject" => $row->nameof_subject,
		"dayof_sched" => $row->dayof_sched,
		"sched_place" => $row->sched_place,
		"created_by" => $row->created_by,
		"option" => "<button id='$id' type='button' class='btn btn-primary btn-xs btn-edit'
						data-toggle='collapse' data-parent='#accordion' data-target='#createDiv'>
						Edit Schedule
					 </button>"
	);
}
echo json_encode($data);
$conn = null;
?>