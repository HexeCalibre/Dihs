
<?php

require '../database/database.php';
$data = array();
$query = "SELECT * FROM `tbl_subjects` WHERE track_id='dinh-abm' AND is_active='Yes'";

$subcount2 =0;
$subcount =0;
$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$subcount =$statement->rowCount();

foreach($result as $row) 
{
	$data[] = array($row['subject_codeno']);
}

$data2 = array();
$query2 = "SELECT DISTINCT subject_codeno FROM `tbl_studentgrades` WHERE studentid_no='DIHS-30152' and grade!=''";


$statement2 = $conn->prepare($query2);

$statement2->execute();

$result2 = $statement2->fetchAll();
$subcount2 =$statement2->rowCount();
$m = $subcount2 * 2;

foreach($result2 as $row2) 
{
	$data2[] = array($row2['subject_codeno']);
}


$diff = array_diff(array_map('serialize', $data), array_map('serialize', $data2));
$multidimensional_diff = array_map('unserialize', $diff);

print_r($multidimensional_diff);


?>