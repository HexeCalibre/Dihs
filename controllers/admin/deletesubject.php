<?php
require "../../database/database.php";

$id = $_POST["id"];
$answer = "No";

$sql = "UPDATE tbl_subjects SET is_active = :is_active WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':is_active', $answer);
$query->bindParam(':id', $id);

if ($query->execute()) {
	echo "Success!";
} else {
	echo "Failed!";
}

$conn = null;
?>