<?php
require '../../database/database.php';

$sql = "SELECT id, CONCAT(admin_fname, ' ', admin_lname) AS `full_name`, position, email,
		contact_num, created_by, date_created, account_status FROM tbl_adminusers ORDER BY id DESC";
$result = $conn->prepare($sql);
$result->execute();
$data = array();

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
	$id = $row->id;
	$data[] = array(
		"full_name" => $row->full_name,
		"position" => $row->position,
		"email" => $row->email,
		"contact_num" => $row->contact_num,
		"created_by" => $row->created_by,
		"date_created" => $row->date_created,
		"account_status" => $row->account_status,
		"option" => "<button id='$id' type='button' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#eModal'>
						Manage Account
					 </button>"
	);
}
echo json_encode($data);
$conn = null;
?>