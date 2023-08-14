$(function(){
	var idObj = {id: null};

	$('#sections').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getsections.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "nameof_section" },
		{ "data": "track_name" },
		{ "data": "numof_students" },
		{ "data": "created_by" },
		{ "data": "manage" },
		{ "data": "option" }
		],
	});

	$('#cForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#cForm').serialize();

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/addnewsection.php',
			data: dataForm,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#cModal').modal('hide');
					$('#sections').DataTable().ajax.reload();
					$('#cForm')[0].reset();
					Swal.fire(
						'Success!',
						'Successfully added a new section!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
	});

	$('#sections tbody').on('click', '.btn-addstud', function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of track id
		var data = "&trackid=" + id;
		ManageSection(data);
	});

	$('#sections tbody').on('click', '.btn-viewstud', function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of track id
		var data = "&viewid=" + id;
		ManageSection(data);
	});

	$('#sections tbody').on('click', '.btn-removesection', function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of section id

		if (confirm('Do you want to remove this section?')) {
			$.ajax({
				type: 'POST',
				url: '../controllers/admin/removesection.php',
				data: "id=" + id,
				cache: false,
				success: function(result){
					if (result == 'Success!') {
						$('#sections').DataTable().ajax.reload();
						Swal.fire(
							'Success!',
							'Successfully removed a new section!',
							'success'
							)
					} else {
						alert(result);
					}
				}
			});
		}
	});

	//JS Function starts here
	function ManageSection(data){
		$.ajax({
			type: 'POST',
			url: '../controllers/admin/gettrackid.php',
			data: data,
			cache: false,
			success: function(result){
				if (result == 'add') {
					window.location.href = '../admin/addstudtosec.php';
				} else if (result == 'view') {
					window.location.href = '../admin/viewremovestud.php';
				} else {
					alert(result);
				}
			}
		});
	}
})