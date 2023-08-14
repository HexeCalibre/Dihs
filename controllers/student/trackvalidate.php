<?php
require '../../database/database.php';
$trackId = $_POST["trackid"];

$sql = "SELECT require_grade FROM tbl_requiregrades WHERE track_id = :track_id";
$result = $conn->prepare($sql);
$result->bindParam(':track_id', $trackId);
$result->execute();
$rowResult = $result->fetchColumn();
echo $rowResult;

$conn = null;
?>