$(function(){
	$('#enrollees').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getenrollees.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "enrollment_id" },
		{ "data": "track" },
		{ "data": "last_name" },
		{ "data": "first_name" },
		{ "data": "grade_level" },
		{ "data": "request_trackshift" },
		{ "data": "status" },
		{ "data": "option" }
		],
	});

	$('#enrollees tbody').on('click', '.dropdown-menu a.approve', function(){
		var id = $(this).attr('id');

		if (confirm('Do you want to approve this enrollment entry?')) {
			$.ajax({
				type: 'POST',
				url: '../controllers/admin/eformapprove.php',
				data: "id=" + id,
				cache: false,
				success: function(result){ 
					if (result == 'Success!') {
						$('#enrollees').DataTable().ajax.reload();
						Swal.fire(
							'Success!',
							'Successfully confirmed an enrollment entry!',
							'success'
							)
					} else {
						alert(result);
					}
				}
			});
		}
	});

	$('#enrollees tbody').on('click', '.dropdown-menu a.decline', function(){
		var id = $(this).attr('id');

		if (confirm('Do you want to decline this enrollment entry?')) {
			$.ajax({
				type: 'POST',
				url: '../controllers/admin/eformdecline.php',
				data: "id=" + id,
				dataType: 'json',
				cache: false,
				success: function(data){ 
					if (data.message == 'Success!') {
						$('#enrollees').DataTable().ajax.reload();
						$('#count').html('(' + data.count + ')');
						Swal.fire(
							'Success!',
							'Successfully declined an enrollment entry!',
							'success'
							)
					} else {
						alert(result);
					}
				}
			});
		}
	});
})