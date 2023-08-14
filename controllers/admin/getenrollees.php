<?php
require '../../database/database.php';

$sql = "SELECT tbl_enrollees.id, tbl_enrollees.enrollment_id, tbl_tracks.track_name, tbl_enrollees.last_name,
			   tbl_enrollees.first_name, tbl_enrollees.grade_level, tbl_enrollees.request_trackshift,
			   tbl_enrollees.attached_file, tbl_enrollees.status,
		CASE WHEN tbl_enrollees.status = 0 THEN 'For Approval'
		WHEN tbl_enrollees.status = 1 THEN 'Approved'
		END AS `status`
		FROM tbl_enrollees
        LEFT JOIN tbl_tracks ON tbl_enrollees.track = tbl_tracks.track_id
        WHERE tbl_enrollees.status != 2
		ORDER BY tbl_enrollees.id DESC";
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$enrollmentId = $row->enrollment_id;

	$attachedFile = null;
	if ($row->attached_file != null) {
		$attachedFile = "<a href='../../files/$row->attached_file'>See Attached File</a>";
	} else {
		$attachedFile = "<a>No File Found</a>";
	}
	
	if ($row->status == 'For Approval') {
		$option = "<div class='dropdown'>
				 		<button class='btn btn-primary dropdown-toggle btn-xs' type='button' data-toggle='dropdown'>
				 			Manage Entry <span class='caret'></span>
    			 		</button>
    					<ul class='dropdown-menu'>
    						<li><a href='generateform.php?id=$enrollmentId' target='_blank'>Generate PDF</a></li>
    						<li>$attachedFile</li>
    						<li style='cursor: pointer'><a id='$id' class='approve'>Approve Entry</a></li>
    						<li style='cursor: pointer'><a id='$id' class='decline'>Decline Entry</a></li>
    					</ul>
  			   		</div>";
	} elseif ($row->status == 'Approved') {
		$option = "<div class='dropdown'>
				 		<button class='btn btn-primary dropdown-toggle btn-xs' type='button' data-toggle='dropdown'>
				 			Manage Entry <span class='caret'></span>
    			 		</button>
    					<ul class='dropdown-menu'>
    						<li><a href='generateform.php?id=$enrollmentId' target='_blank'>Generate PDF</a></li>
    						<li>$attachedFile</li>
    					</ul>
  			   	   </div>";
	}

	$data[] = array(
		"enrollment_id" => $row->enrollment_id,
		"track" => $row->track_name,
		"last_name" => $row->last_name,
		"first_name" => $row->first_name,
		"grade_level" => $row->grade_level,
		"request_trackshift" => $row->request_trackshift,
		"status" => $row->status,
		"option" => $option
	);
}
echo json_encode($data);
$conn = null;
?>