<?php
require "../../database/database.php";

$id = $_POST["id"];
$answer = "No";

$sql = "UPDATE tbl_sections SET is_active = :is_active WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':is_active', $answer);
$query->bindParam(':id', $id);

if ($query->execute()) {
	$sql = "SELECT nameof_section FROM tbl_sections WHERE id = :id";
	$result = $conn->prepare($sql);
	$result->bindParam(':id', $id);
	$result->execute();
	$rowResult = $result->fetchColumn();

	$sql1 = "UPDATE tbl_students SET track_id = NULL, nameof_section = NULL WHERE nameof_section = :nameof_section";
	$query = $conn->prepare($sql1);
	$query->bindParam(':nameof_section', $rowResult);
	$query->execute();
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>