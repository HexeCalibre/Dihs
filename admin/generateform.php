<?php
require '../database/database.php';
require("../fpdf/fpdf.php");

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$pdf = new FPDF();
	$pdf->AddPage();

	$pdf->SetFont("Arial","B",16);
	$pdf->Cell(40,10,"Dasma Integrated Highschool - Enrollment Form");
	$pdf->Ln();
	$pdf->SetFont("Arial","",12);

	$sql = "SELECT tbl_enrollees.*, tbl_tracks.track_name
			FROM tbl_enrollees
			LEFT JOIN tbl_tracks ON tbl_enrollees.track = tbl_tracks.track_id
			WHERE enrollment_id = :enrollment_id";
	$result = $conn->prepare($sql);
	$result->bindParam(':enrollment_id', $id);
	$result->execute();
	if ($result->rowCount() > 0) {
		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$pdf->Cell(40,10,"Full Name: " . $row->first_name . " " . $row->last_name);
			$pdf->Ln();
			$pdf->Cell(40,10,"Name Extension: " . $row->name_extension);
			$pdf->Ln();
			$pdf->Cell(40,10,"Track: " . $row->track_name);
			$pdf->Ln();
			$pdf->Cell(40,10,"Learning Modality: " . $row->learning_modality);
			$pdf->Ln();
			$pdf->Cell(40,10,"Last School Attended: " . $row->last_school);
			$pdf->Ln();
			$pdf->Cell(40,10,"School ID in the previous school: " . $row->schoolid_ofprev);
			$pdf->Ln();
			$pdf->Cell(40,10,"Type of School (Public / Private): " . $row->typeof_school);
			$pdf->Ln();
			$pdf->Cell(40,10,"Graduate Year from Junior High School: " . $row->gradyear);
			$pdf->Ln();
			$pdf->Cell(40,10,"Learner's Reference Number (LRN): " . $row->lrn);
			$pdf->Ln();
			$pdf->Cell(40,10,"PSA Birth Certificate Number: " . $row->birth_certificatenum);
			$pdf->Ln();
			$pdf->Cell(40,10,"Date of Birth: " . $row->dateof_birth);
			$pdf->Ln();
			$pdf->Cell(40,10,"Age: " . $row->age);
			$pdf->Ln();
			$pdf->Cell(40,10,"Sex: " . $row->sex);
			$pdf->Ln();
			$pdf->Cell(40,10,"Complete Address: " . $row->complete_address);
			$pdf->Ln();
			$pdf->Cell(40,10,"Contact Number: " . $row->contact_num);
			$pdf->Ln();
			$pdf->Cell(40,10,"Email: " . $row->email);
			$pdf->Ln();
			$pdf->Cell(40,10,"Facebook Account: " . $row->fb_account);
			$pdf->Ln();
			$pdf->Cell(40,10,"4ps Beneficiary (Yes / No): " . $row->fourps_answer);
			$pdf->Ln();
			$pdf->Cell(40,10,"Belong to Indigenous Peoples (IP) Community / Indigenous Cultural Community? (Yes / No): " . $row->ip_answer);
			$pdf->Ln();
			$pdf->Cell(40,10,"If yes, please specify: " . $row->ip_specify);
			$pdf->Ln();
			$pdf->Cell(40,10,"Mother Tongue: " . $row->mother_tongue);
			$pdf->Ln();
			$pdf->Cell(40,10,"Religion: " . $row->religion);
			$pdf->Ln();
			$pdf->Cell(40,10,"Does the learner have special education (SPED) needs? (Yes / No): " . $row->sped_answer);
			$pdf->Ln();
			$pdf->Cell(40,10,"If yes, please specify: " . $row->sped_specify);
			$pdf->Ln();
			$pdf->Cell(40,10,"Father's Name (Last Name, First Name, Middle Name): " . $row->nameof_father);
			$pdf->Ln();
			$pdf->Cell(40,10,"Father's Highest Educational Attainment: " . $row->father_educ);
			$pdf->Ln();
			$pdf->Cell(40,10,"Father's Employment Status: " . $row->father_estatus);
			$pdf->Ln();
			$pdf->Cell(40,10,"Father's Occupation (if Working): " . $row->father_occupation);
			$pdf->Ln();
			$pdf->Cell(40,10,"Contact Number: " . $row->father_contactnum);
			$pdf->Ln();
			$pdf->Cell(40,10,"Mother's Name (Last Name, First Name, Middle Name): " . $row->nameof_mother);
			$pdf->Ln();
			$pdf->Cell(40,10,"Mother's Highest Educational Attainment: " . $row->mother_educ);
			$pdf->Ln();
			$pdf->Cell(40,10,"Mother's Employment Status: " . $row->mother_estatus);
			$pdf->Ln();
			$pdf->Cell(40,10,"Mother's Occupation (if Working): " . $row->mother_occupation);
			$pdf->Ln();
			$pdf->Cell(40,10,"Contact Number: " . $row->mother_contactnum);
			$pdf->Ln();
			$pdf->Cell(40,10,"Guardian's Name (Last Name, First Name, Middle Name): " . $row->nameof_guardian);
			$pdf->Ln();
			$pdf->Cell(40,10,"Relationship to Guardian: " . $row->rel_to_guardian);
			$pdf->Ln();
			$pdf->Cell(40,10,"Guardian's Highest Educational Attainment: " . $row->guardian_educ);
			$pdf->Ln();
			$pdf->Cell(40,10,"Guardian's Employment Status: " . $row->guardian_estatus);
			$pdf->Ln();
			$pdf->Cell(40,10,"Guardian's Occupation (if Working): " . $row->guardian_occupation);
			$pdf->Ln();
			$pdf->Cell(40,10,"Contact Number: " . $row->guardian_contactnum);
		}
	}
	$pdf->Output();
}
$conn = null;
?>