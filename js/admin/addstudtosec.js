$(function(){
	var idObj = {id: null};

	$('#students').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/getnullstudents.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "studentid_no" },
		{ "data": "full_name" },
		{ "data": "track" },
		{ "data": "option" }
		],
	});

	$('#students tbody').on('click', 'button', function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of track id
		var updateVal = 'one';
		AddStudentToSection(id, updateVal);
	});

	$('.btn-addall').click(function(){
		var id = $(this).attr('id');
		idObj.id = id; //passing the value of track id
		var updateVal = 'all';

		if (confirm('Do you want to add all students?')) {
			AddStudentToSection(id, updateVal);
		}
	});

	//JS Function starts here
	function AddStudentToSection(id, updateVal){
		$.ajax({
			type: 'POST',
			url: '../controllers/admin/updatestudtrackid.php',
			data: "id=" + id + "&updateval=" + updateVal,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#students').DataTable().ajax.reload();
					Swal.fire(
						'Success!',
						'Successfully added!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
	}
})