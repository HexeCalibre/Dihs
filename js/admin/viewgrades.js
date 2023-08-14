$(function(){
	$('#students').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getstudgrades.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "subject_codeno" }, 
		{ "data": "nameof_subject" },
		{ "data": "school_year" },
		{ "data": "school_semester" },
		{ "data": "midterm_grade" },
		{ "data": "final_term_grade" },
		{ "data": "grade" }
		],
	});
})