<?php
session_start();
require "../../database/database.php";

if (isset($_POST["identifier"])) {
	$identifier = $_POST["identifier"];
	

	if ($identifier == "update") {
		$subject = $_POST["subject"];
		$schoolYear = $_POST["schoolyear"];
		$semester = $_POST["semester"];
		$midterm_grade = $_POST["midterm_grade"];
		$grade = intval($_POST["midterm_grade"]) + intval($_POST["final_term_grade"]) / 200;
		$final_term_grade = $_POST["final_term_grade"];
		$id = $_POST["id"];

		$sql = "UPDATE tbl_studentgrades
		SET subject_codeno = :subject_codeno, school_year = :school_year, school_semester = :school_semester,
		grade = :grade,midterm_grade=:midterm_grade,final_term_grade=:final_term_grade
		WHERE id = :id";
		$query = $conn->prepare($sql);
		$query->bindParam(':subject_codeno', $subject);
		$query->bindParam(':school_year', $schoolYear);
		$query->bindParam(':school_semester', $semester);
		$query->bindParam(':midterm_grade', $midterm_grade);
		$query->bindParam(':final_term_grade', $final_term_grade);
		$query->bindParam(':grade', $grade);
		$query->bindParam(':id', $id);

		if ($query->execute()) {
			echo "Success!";
		} else {
			echo "Failed!";
		}
	} else {
		$grade = null;
		$subject = $_POST["subject"];
		$studentIdNo = $_SESSION["studentid_no"];
		$schoolYear = $_POST["schoolyear"];
		$semester = $_POST["semester"];
		$midterm_grade = $_POST["midterm_grade"];
		$final_term_grade = $_POST["final_term_grade"];

		if ($_POST["midterm_grade"]=="" || $_POST["final_term_grade"]=="") {
			$grade = null;
		}
		else
		{
			$grade = intval($_POST["midterm_grade"]) + intval($_POST["final_term_grade"]) / 200;
		}

		$sqll = "SELECT * FROM tbl_studentgrades
		WHERE subject_codeno = :subject AND studentid_no = :studentid_no AND school_year = :school_year AND school_semester = :school_semester";
		$queryy = $conn->prepare($sqll);
		$queryy->bindparam(':school_year', $schoolYear);
		$queryy->bindparam(':subject', $subject);
		$queryy->bindparam(':studentid_no', $studentIdNo);
		$queryy->bindparam(':school_semester', $semester);
		$queryy->execute();
		$rowCount = $queryy->rowCount();
        
        $sqlll = "SELECT * FROM tbl_studentgrades
		WHERE subject_codeno = :subject AND studentid_no = :studentid_no AND school_year = :school_year";
		$queryyy = $conn->prepare($sqlll);
		$queryyy->bindparam(':school_year', $schoolYear);
		$queryyy->bindparam(':subject', $subject);
		$queryyy->bindparam(':studentid_no', $studentIdNo);
		$queryyy->execute();
		$rowCountt = $queryyy->rowCount();

        
		if ($rowCount > 0) {
			echo "You already inputted a grade for this subject, school year and semester!";
		}
		else if($rowCountt > 0) 
		{
		    echo "You already inputted a grade for this subject!";
		}
		else
		{
			$sql = "INSERT INTO tbl_studentgrades (subject_codeno, studentid_no, school_year, school_semester,midterm_grade,final_term_grade, grade)
			VALUES (:subject_codeno, :studentid_no, :school_year, :school_semester, :midterm_grade, :final_term_grade, :grade)";
			$query = $conn->prepare($sql);
			$query->bindParam(':subject_codeno', $subject);
			$query->bindParam(':studentid_no', $studentIdNo);
			$query->bindParam(':school_year', $schoolYear);
			$query->bindParam(':school_semester', $semester);
			$query->bindParam(':midterm_grade', $midterm_grade);
			$query->bindParam(':final_term_grade', $final_term_grade);
			$query->bindParam(':grade', $grade);

			if ($query->execute()) {
				echo "Success!";
			} else {
				echo "Failed!";
			}
		}

		
	}
} else {
	echo "Error!";
	exit();
}
$conn = null;
?>