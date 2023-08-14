$(function(){
	var idObj = {id: null};

	$('#administrators').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getadmins.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "full_name" },
		{ "data": "position" },
		{ "data": "email" },
		{ "data": "contact_num" },
		{ "data": "created_by" },
		{ "data": "date_created" },
		{ "data": "account_status" },
		{ "data": "option" }
		],
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

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/addnewadmin.php',
			data: dataForm,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#cModal').modal('hide');
					$('#administrators').DataTable().ajax.reload();
					$('#cForm')[0].reset();
					Swal.fire(
						'Success!',
						'Successfully added a new administrator!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
	});

	$('#administrators tbody').on('click', 'button', function(){
		var id = $(this).attr('id');
		var identifier = 'admin';
		LoadUserData(identifier, id);
		idObj.id = id; //passing the value of id
	});

	$('#eForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#eForm').serialize();
		var id = idObj.id;

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/updateadmindata.php',
			data: dataForm + "&id=" + id,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#eModal').modal('hide');
					$('#administrators').DataTable().ajax.reload();
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
				if (data.usertype[0] == 'admin') {
					$('input[name="e-fname"]').val(data.usertype[1][0].admin_fname);
					$('input[name="e-lname"]').val(data.usertype[1][0].admin_lname);
					$('input[name="e-position"]').val(data.usertype[1][0].position);
					$('input[name="e-email"]').val(data.usertype[1][0].email);
					$('input[name="e-contactnum"]').val(data.usertype[1][0].contact_num);
					$('input[name="e-username"]').val(data.usertype[1][0].username);
					$('input[name="e-pass"]').val(data.usertype[1][0].password);
					$('#e-accstatusid').val(data.usertype[1][0].account_status);
				} else {
					alert(data);
				}
			}
		});
	}
})