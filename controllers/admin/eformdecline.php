<?php
require "../../database/database.php";
require '../../controllers/functions/queries.php';

$values = array();
$id = $_POST["id"];
$status = 2;

$sql = "UPDATE tbl_enrollees SET status = :status WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':status', $status);
$query->bindParam(':id', $id);

if ($query->execute()) {
	$values["message"] = "Success!";
} else {
	$values["message"] = "Failed!";
}
$shiftTrackCount = trackShiftCount($conn); //fetch total count of shift track employees
$values["count"] = $shiftTrackCount;

echo json_encode($values);
$conn = null;
?>