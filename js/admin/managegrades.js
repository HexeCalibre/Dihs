$(function(){
	var idObj = {id: null};
	var idfObj = {idf: null};

 
	$('#students').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getgrades.php',
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
		{ "data": "grade" },
		{ "data": "option" }
		],
	});

	$('#btn-input').click(function(){
		$('#gradeFields').css('display', '');
		$('#cForm')[0].reset();
		idfObj.idf = null;
	});

	$('#cForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#cForm').serialize();
		var idf = idfObj.idf; //identifer if insert or update
		var id = idObj.id; //id for the update query

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/addnewgrade.php',
			data: dataForm + "&identifier=" + idf + "&id=" + id,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#students').DataTable().ajax.reload();
					$('#cForm')[0].reset();
					Swal.fire(
						'Success!',
						'Completed!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
	});

	$('.btn-clear').click(function(){
		$('#cForm')[0].reset();
	});

	$('#students tbody').on('click', '.btn-edit', function(){
		$('#gradeFields').css('display', '');
		var id = $(this).attr('id');
		var identifier = 'grade';
		LoadUserData(identifier, id);
		idObj.id = id; //passing the value of id
		idfObj.idf = 'update';
	});

	//JS Function starts here
	function LoadUserData(idf, id){
		$.ajax({ 
			type: 'POST',
			url: '../controllers/admin/fetchuserdata.php',
			data: "identifier=" + idf + "&id=" + id,
			dataType: 'json',
			cache: false,
			success: function(data){
				if (data.usertype[0] == 'grade') {
					$('#subject-id').val(data.usertype[1][0].subject_codeno);
					$('input[name="schoolyear"]').val(data.usertype[1][0].school_year);
					$('#semester-id').val(data.usertype[1][0].school_semester);
					$('#term-id').val(data.usertype[1][0].grade_term);
					$('#midterm_grade').val(data.usertype[1][0].midterm_grade);
					$('input[name="final_term_grade"]').val(data.usertype[1][0].final_term_grade);
					$('input[name="grade"]').val(data.usertype[1][0].grade);
				} else {
					alert(data);
				}
			}
		});
	}
})