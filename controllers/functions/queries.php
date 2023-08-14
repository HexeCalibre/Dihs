<?php
function fetchTrack($conn)
{
	$sql = "SELECT track_id, track_name FROM tbl_tracks";
	$result = $conn->prepare($sql);
	$result->execute();
	$data = array();
	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		$data[] = $row;
	}
	return $data;
}

function fetchSubjByTrackId($conn, $trackid)
{
	$sql = "SELECT subject_codeno, nameof_subject FROM tbl_subjects WHERE track_id = :track_id AND is_active = 'Yes'";
	$result = $conn->prepare($sql);
	$result->bindParam(':track_id', $trackid);
	$result->execute();
	$data = array();
	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		$data[] = $row;
	}
	return $data;
}

function trackShiftCount($conn)
{
	$sql = "SELECT COUNT(request_trackshift) AS `total_count` FROM tbl_enrollees
			WHERE request_trackshift = 'Yes' AND status != 2";
	$result = $conn->prepare($sql);
	$result->execute();
	$rowResult = $result->fetchColumn();
	return $rowResult;
}

function fetchSectionName($conn, $trackid, $gradelevel, $sex)
{
	$data = array();
	$sql = "SELECT nameof_section
			FROM tbl_sections
			WHERE track_id = '$trackid' AND grade_level = '$gradelevel'
			AND (SELECT COUNT(tbl_students.sex) != 2 FROM tbl_students
				 WHERE tbl_students.nameof_section = tbl_sections.nameof_section AND tbl_students.sex = '$sex')
			AND is_active = 'Yes'
			ORDER BY id
			LIMIT 1";
	$result = $conn->prepare($sql);
	$result->execute();
	$rowCount = $result->rowCount();

	if ($rowCount > 0) {
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$data[] = $row;
		}
	} else {
		$data = null;
	}
	return $data;
}

function gradeTwelveEFormValidation($conn, $studentIdNo)
{
	$sql = "SELECT COUNT(studentid_no) FROM tbl_enrollees WHERE studentid_no = '$studentIdNo'";
	$result = $conn->prepare($sql);
	$result->execute();
	$rowResult = $result->fetchColumn();
	return $rowResult;
}
?>