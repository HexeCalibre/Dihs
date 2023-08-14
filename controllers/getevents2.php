
<?php

require '../database/database.php';
$data = array();
$query = "SELECT * FROM tbl_schedules";


$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();


foreach($result as $row) 
{
	
	$string = $row["dayof_sched"];  
	$str_arr = preg_split ("/\,/", $string);  
	$daynum = date("N", strtotime($string[0]));
	$t = array_keys($str_arr);
	$p = array_map('intval',$t);
	$w = implode($t);
	$l = (int)$w;
	
	if ($l==1) {
		$l = '1,2';
	}
	elseif ($l==0) {
		$l = '1';
	}
	elseif ($l==12) {
		$l = '1,2,3';
	}
	elseif ($l==123) {
		$l = '1,2,3,4';
	}
	elseif ($l==1234) {
		$l = '1,2,3,4,5';
	}
	elseif ($l==12345) {
		$l = '1,23456';
	}

	$start = date("G:i", strtotime($row["schedtime_from"]));
	$end = date("G:i", strtotime($row["schedtime_to"]));
	
	$date = DateTime::createFromFormat('g:i a', $row["schedtime_from"]);
	//$start = $date->format('H:i');
	//$pp = DateTime::createFromFormat('g:i a', $row["schedtime_to"]);
	//$end = $pp->format('H:i');

	$data[] = array(
		'id'   => $row["id"],
		'title'   => $row["subject_codeno"] ."-". $row["nameof_section"]."/".$row["sched_place"],
		'dow'   => $l,
		'start'   => $start,
		'end'   => $end,
	);
}

echo json_encode($data);



?>