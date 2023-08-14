<?php
require "../database/database.php";
$lrn = $_POST["lrn"];

$sql = "SELECT COUNT(*) FROM tbl_enrollees WHERE lrn = :lrn";
$result = $conn->prepare($sql);
$result->bindParam(':lrn', $lrn);
$result->execute();
$rowResult = $result->fetchColumn(); 
echo $rowResult;

$conn = null;
?>