<?php
require "../database/database.php";
require '../phpmailer/PHPMailerAutoload.php';


$enrollmentId = mt_rand(100000000, 999999999);
$track = $_POST["track"];
$learnabl = $_POST["learnabl"];
$lastSchool = $_POST["lastschool"];
$schoolId = ($_POST["schoolid"] == "") ? null : $_POST["schoolid"];
$formerSchool = $_POST["formerschool"];
$gradYear = $_POST["gradyear"];
$lrn = ($_POST["lrn"] == "") ? null : $_POST["lrn"];
$birthCerti = ($_POST["birthcerti"] == "") ? null : $_POST["birthcerti"];
$lastName = $_POST["lname"];
$firstName = $_POST["fname"];
$middleName = ($_POST["middlename"] == "") ? null : $_POST["middlename"];
$nameExtension = ($_POST["nameextension"] == "") ? null : $_POST["nameextension"];
$dateTime = new DateTime($_POST["birthdate"]);
$birthDate = $dateTime->format("Y-m-d");
$age = $_POST["age"];
$sex = $_POST["sex"];
$address = $_POST["address"];
$contactNum = $_POST["contactnum"];
$email = $_POST["email"];
$fbAccount = $_POST["fbaccount"];
$fourpsAnswer = $_POST["4ps"];
$ipAnswer = $_POST["ip"];
$ipdropdownName = ($_POST["ipdropdown-name"] == "") ? null : $_POST["ipdropdown-name"];
$motherTongue = $_POST["mothertongue"];
$religion = $_POST["religion"];
$spedAnswer = $_POST["sped"];
$spedSpecify = ($_POST["spedspecify"] == "") ? null : $_POST["spedspecify"];
$fatherName = $_POST["nameoffather"];
$fatherEdu = ($_POST["fatheredu"] == "") ? null : $_POST["fatheredu"];
$fatherEstatus = ($_POST["femploymentstatus"] == "") ? null : $_POST["femploymentstatus"];
$fatherOccupation = ($_POST["fatheroccu"] == "") ? null : $_POST["fatheroccu"];
$fatherCnum = ($_POST["fathercnum"] == "") ? null : $_POST["fathercnum"];
$motherName = $_POST["nameofmother"];
$motherEdu = ($_POST["motheredu"] == "") ? null : $_POST["motheredu"];
$motherEstatus = ($_POST["memploymentstatus"] == "") ? null : $_POST["memploymentstatus"];
$motherOccupation = ($_POST["motheroccu"] == "") ? null : $_POST["motheroccu"];
$motherCnum = ($_POST["mothercnum"] == "") ? null : $_POST["mothercnum"];
$guardianName = $_POST["nameofguardian"];
$relToGuardian = $_POST["relguardian"];
$guardianEdu = $_POST["guardianedu"];
$guardianEstatus = $_POST["gemploymentstatus"];
$guardianOccupation = ($_POST["guardianoccu"] == "") ? null : $_POST["guardianoccu"];
$guardianCnum = $_POST["guardiancnum"];
$gradeLevel = "Grade 11";
$requestTrackShift = "No";

//for uploading grade file
$fileName = null;
if ($_FILES["gradefile"]["name"] != '') {
	$fileName = $_FILES["gradefile"]["name"];
	$pathFile = "../files/" . $fileName;
	move_uploaded_file($_FILES["gradefile"]["tmp_name"], $pathFile);
}

$sql = "INSERT INTO tbl_enrollees (enrollment_id, track, learning_modality, last_school, schoolid_ofprev, typeof_school,
								   gradyear, lrn, birth_certificatenum, last_name, first_name,
								   middle_name, name_extension, dateof_birth, age, sex,
								   complete_address, contact_num,email, fb_account, fourps_answer, ip_answer,
								   ip_specify, mother_tongue, religion, sped_answer, sped_specify,
								   nameof_father, father_educ, father_estatus, father_occupation, father_contactnum,
								   nameof_mother, mother_educ, mother_estatus, mother_occupation, mother_contactnum,
								   nameof_guardian, rel_to_guardian, guardian_educ, guardian_estatus, guardian_occupation,
								   guardian_contactnum, grade_level, request_trackshift, attached_file)
		VALUES (:enrollment_id, :track, :learning_modality, :last_school, :schoolid_ofprev, :typeof_school,
				:gradyear, :lrn, :birth_certificatenum, :last_name, :first_name,
				:middle_name, :name_extension, :dateof_birth, :age, :sex,
				:complete_address, :contact_num, :email, :fb_account, :fourps_answer, :ip_answer,
				:ip_specify, :mother_tongue, :religion, :sped_answer, :sped_specify,
				:nameof_father, :father_educ, :father_estatus, :father_occupation, :father_contactnum,
				:nameof_mother, :mother_educ, :mother_estatus, :mother_occupation, :mother_contactnum,
				:nameof_guardian, :rel_to_guardian, :guardian_educ, :guardian_estatus, :guardian_occupation,
				:guardian_contactnum, :grade_level, :request_trackshift, :attached_file)";

$query = $conn->prepare($sql);
$query->bindParam(':enrollment_id', $enrollmentId);
$query->bindParam(':track', $track);
$query->bindParam(':learning_modality', $learnabl);
$query->bindParam(':last_school', $lastSchool);
$query->bindParam(':schoolid_ofprev', $schoolId);
$query->bindParam(':typeof_school', $formerSchool);
$query->bindParam(':gradyear', $gradYear);
$query->bindParam(':lrn', $lrn);
$query->bindParam(':birth_certificatenum', $birthCerti);
$query->bindParam(':last_name', $lastName);
$query->bindParam(':first_name', $firstName);
$query->bindParam(':middle_name', $middleName);
$query->bindParam(':name_extension', $nameExtension);
$query->bindParam(':dateof_birth', $birthDate);
$query->bindParam(':age', $age);
$query->bindParam(':sex', $sex);
$query->bindParam(':complete_address', $address);
$query->bindParam(':contact_num', $contactNum);
$query->bindParam(':email', $email);
$query->bindParam(':fb_account', $fbAccount);
$query->bindParam(':fourps_answer', $fourpsAnswer);
$query->bindParam(':ip_answer', $ipAnswer);
$query->bindParam(':ip_specify', $ipdropdownName);
$query->bindParam(':mother_tongue', $motherTongue);
$query->bindParam(':religion', $religion);
$query->bindParam(':sped_answer', $spedAnswer);
$query->bindParam(':sped_specify', $spedSpecify);
$query->bindParam(':nameof_father', $fatherName);
$query->bindParam(':father_educ', $fatherEdu);
$query->bindParam(':father_estatus', $fatherEstatus);
$query->bindParam(':father_occupation', $fatherOccupation);
$query->bindParam(':father_contactnum', $fatherCnum);
$query->bindParam(':nameof_mother', $motherName);
$query->bindParam(':mother_educ', $motherEdu);
$query->bindParam(':mother_estatus', $motherEstatus);
$query->bindParam(':mother_occupation', $motherOccupation);
$query->bindParam(':mother_contactnum', $motherCnum);
$query->bindParam(':nameof_guardian', $guardianName);
$query->bindParam(':rel_to_guardian', $relToGuardian);
$query->bindParam(':guardian_educ', $guardianEdu);
$query->bindParam(':guardian_estatus', $guardianEstatus);
$query->bindParam(':guardian_occupation', $guardianOccupation);
$query->bindParam(':guardian_contactnum', $guardianCnum);
$query->bindParam(':grade_level', $gradeLevel);
$query->bindParam(':request_trackshift', $requestTrackShift);
$query->bindParam(':attached_file', $fileName);

if ($query->execute()) {
	echo $enrollmentId;
	
} else {
	echo "Failed!";
}

$conn = null;
?>