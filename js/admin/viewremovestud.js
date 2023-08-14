$(function(){
	var idObj = {id: null};

	$('#students').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getstudsection.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "studentid_no" },
		{ "data": "full_name" },
		{ "data": "track_name" },
		{ "data": "option" }
		],
	});

	$('#students tbody').on('click', 'button', function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of track id
		var delVal = 'one';
		RemoveStudent(id, delVal);
	});

	$('.btn-removeall').click(function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of track id
		var delVal = 'all';

		if (confirm('Do you want to remove all students in this group?')) {
			RemoveStudent(id, delVal);
		}
	});

	//JS Function starts here
	function RemoveStudent(id, delVal){
		$.ajax({
			type: 'POST',
			url: '../controllers/admin/removestudents.php',
			data: "id=" + id + "&delval=" + delVal,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#students').DataTable().ajax.reload();
					Swal.fire(
						'Success!',
						'Successfully removed!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
	}
})