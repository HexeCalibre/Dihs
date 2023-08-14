$(function(){
	var idObj = {id: null};

	$('#subjects').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getsubjects.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "subject_codeno" },
		{ "data": "nameof_subject" },
		{ "data": "track_name" },
		{ "data": "created_by" },
		{ "data": "date_created" },
		{ "data": "option" }
		],
	});

	$('#track-id').on('change', function(){
		var trackId = $(this).val();

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/fixedsubjects.php',
			data: "trackid=" + trackId,
			cache: false,
			success: function(result){
				$('#subject-id').html(result);
			}
		});
	});

	$('#cForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#cForm').serialize();

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/addnewsubject.php',
			data: dataForm,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#cModal').modal('hide');
					$('#subjects').DataTable().ajax.reload();
					$('#cForm')[0].reset();
					Swal.fire(
						'Success!',
						'Successfully added a new subject!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
	});

	$('#subjects tbody').on('click', '.btn-delete', function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of id

		if (confirm('Do you want to delete this subject?')) {
			$.ajax({
				type: 'POST',
				url: '../controllers/admin/deletesubject.php',
				data: "id=" + id,
				cache: false,
				success: function(result){
					if (result == 'Success!') {
						$('#subjects').DataTable().ajax.reload();
						Swal.fire(
							'Success!',
							'Successfully removed a subject!',
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