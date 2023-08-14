$(function(){
	$('input[name="schoolyear"]').datepicker({
		format: 'yyyy',
		viewMode: 'years', 
		minViewMode: 'years'
	});

	$('#grades').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/student/getgrades.php',
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

	$('#gForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#gForm').serialize();
		var idparam = 'id';
		var schoolYear = $('input[name="schoolyear"]').val();
		var semester = $('#semester-id').val();
		var term = $('#term-id').val();

		$.ajax({
			type: 'POST',
			url: '../controllers/student/gradesession.php',
			data: dataForm + "&idparam=" + idparam,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#gModal').modal('hide');
					$('#grades').DataTable().ajax.reload();
					$('#gForm')[0].reset();
					$('#page-title').html('Grades for School Year ' + schoolYear + ' - ' + semester);
				} else {
					alert(result);
				}
			}
		});
	});

	$('.btn-refresh').click(function(){
		location.reload();
	});
})