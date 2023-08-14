$(function(){
	var idObj = {id: null};
	var idfObj = {idf: null};

	$('.timepicker').timepicker({
		minTime: '08:00:00',
		maxTime: '19:00:00'
	});

	$('#schedules').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/displayschedules.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "subject_codeno" },
		{ "data": "nameof_subject" },
		{ "data": "dayof_sched" },
		{ "data": "sched_place" },
		{ "data": "created_by" },
		{ "data": "option" }
		],
	});

	$('#btn-create').click(function(){
		$('#schedform').css('display', '');
		$('#subject-id').prop('disabled', false);
		$('.btn-delete').css('display', 'none');
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
			url: '../controllers/admin/addnewschedule.php',
			data: dataForm + "&identifier=" + idf + "&id=" + id,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#schedules').DataTable().ajax.reload();
					$('#cForm')[0].reset();
					$('#subject-id').prop('disabled', false);
					$('.btn-delete').css('display', 'none');
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
		$('#subject-id').prop('disabled', false);
	});

	$('#schedules tbody').on('click', '.btn-edit', function(){
		$('#schedform').css('display', '');
		$('#subject-id').prop('disabled', true);
		$('.btn-delete').css('display', '');
		var id = $(this).attr('id');
		var identifier = 'schedule';
		LoadUserData(identifier, id);
		idObj.id = id; //passing the value of id
		idfObj.idf = 'update';
	});

	$('.btn-delete').click(function(){
		var id = idObj.id; //id for the update query

		if (confirm('Do you want to delete this schedule?')) {
			$.ajax({
				type: 'POST',
				url: '../controllers/admin/deleteschedule.php',
				data: "id=" + id,
				cache: false,
				success: function(result){
					if (result == 'Success!') {
						$('#schedules').DataTable().ajax.reload();
						$('#cForm')[0].reset();
						$('#subject-id').prop('disabled', false);
						$('.btn-delete').css('display', 'none');
						Swal.fire(
							'Success!',
							'Successfully deleted a schedule!',
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
	function LoadUserData(idf, id){
		$.ajax({
			type: 'POST',
			url: '../controllers/admin/fetchuserdata.php',
			data: "identifier=" + idf + "&id=" + id,
			dataType: 'json',
			cache: false,
			success: function(data){
				if (data.usertype[0] == 'schedule') {
					$('#subject-id').val(data.usertype[1][0].subject_codeno);
					$('input[name="schedtimefrom"]').val(data.usertype[1][0].schedtime_from);
					$('input[name="schedtimeto"]').val(data.usertype[1][0].schedtime_to);
					$('input[name="schedplace"]').val(data.usertype[1][0].sched_place);
				} else {
					alert(data);
				}
			}
		});
	}
})