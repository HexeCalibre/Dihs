<?php
require "../../database/database.php";

$id = $_POST["id"];
$status = 1;

$sql = "UPDATE tbl_schedules SET status = :status WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':status', $status);
$query->bindParam(':id', $id);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>