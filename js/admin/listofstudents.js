$(function(){
	var idObj = {id: null};

	$('#students').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getstudents.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "studentid_no" },
		{ "data": "full_name" },
		{ "data": "grade_level" },
		{ "data": "track" },
		{ "data": "section" },
		{ "data": "created_by" },
		{ "data": "option" }
		],
	});

	$('#genstudentid').click(function(){
		var genId = 'genid';
		$.ajax({
			type: 'POST',
			url: '../controllers/admin/addnewstudent.php',
			data: "&genid=" + genId,
			cache: false,
			success: function(data){
				$('input[name="studentidno"]').val(data);
			}
		});
	});

	$('.password-eye').click(function(){
		var inputType = $('.passid').prop('type');

		if (inputType == 'password') {
			$('.passid').prop('type', 'text');
		} else if (inputType == 'text') {
			$('.passid').prop('type', 'password');
		} else {
			alert('Error found!');
		}
	});

	$('#cForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#cForm').serialize();
		var studentIdNo = $('input[name="studentidno"]').val();

		if (studentIdNo == '') {
			alert('You need to clickt the generate button for Student ID Number!');
			e.preventDefault();
		} else {
			$.ajax({
				type: 'POST',
				url: '../controllers/admin/addnewstudent.php',
				data: dataForm,
				cache: false,
				success: function(result){
					if (result == 'Success!') {
						$('#cModal').modal('hide');
						$('#students').DataTable().ajax.reload();
						$('#cForm')[0].reset();
						Swal.fire(
							'Success!',
							'Successfully added a new student!',
							'success'
							)
					} else {
						alert(result);
					}
				}
			});
		}
	});

	$('#students tbody').on('click', 'button', function(){
		var id = $(this).attr('id');
		var identifier = 'student';
		LoadUserData(identifier, id);
		idObj.id = id; //passing the value of id
	});

	$('#eForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#eForm').serialize();
		var id = idObj.id;

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/updatestudentdata.php',
			data: dataForm + "&id=" + id,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#eModal').modal('hide');
					$('#students').DataTable().ajax.reload();
					$('#eForm')[0].reset();
					Swal.fire(
						'Success!',
						'Successfully updated!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
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
				if (data.usertype[0] == 'student') {
					$('#e-gradelevelid').val(data.usertype[1][0].grade_level);
					$('input[name="e-fname"]').val(data.usertype[1][0].student_fname);
					$('input[name="e-lname"]').val(data.usertype[1][0].student_lname);
					$('input[name="e-middlename"]').val(data.usertype[1][0].student_middlename);
					$('input[name="e-pass"]').val(data.usertype[1][0].password);
				} else {
					alert(data);
				}
			}
		});
	}
})