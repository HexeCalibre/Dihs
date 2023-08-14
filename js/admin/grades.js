$(function(){
	$('#students').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/displayoptgrades.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "studentid_no" },
		{ "data": "full_name" },
		{ "data": "track" },
		{ "data": "section" },
		{ "data": "option" }
		],
	});

	$('#track-id').on('change', function(){
		var trackId = $(this).val();

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/fetchsections.php',
			data: "trackid=" + trackId,
			cache: false,
			success: function(result){
				$('#section-id').html(result);
			}
		});
	});

	$('#gForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#gForm').serialize();
		var idparam = 'id';

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/gradesession.php',
			data: dataForm + "&idparam=" + idparam,
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#gModal').modal('hide');
					$('#students').DataTable().ajax.reload();
					$('#gForm')[0].reset();
				} else {
					alert(result);
				}
			}
		});
	});

	$('.btn-refresh').click(function(){
		location.reload();
	});

	$('#students tbody').on('click', '.btn-manage', function(){
		var id = $(this).attr('id');
		var data = "&studentidno=" + id;
		ChangePage(data);
	});

	$('#students tbody').on('click', '.btn-view', function(){
		var id = $(this).attr('id');
		var data = "&studidnoview=" + id;
		ChangePage(data);
	});

	//JS Function starts here
	function ChangePage(data){
		$.ajax({
			type: 'POST',
			url: '../controllers/admin/changepage.php',
			data: data,
			cache: false,
			success: function(result){
				if (result == 'mgtgrades') {
					window.location.href = '../admin/managegrades.php';
				} else if (result == 'viewgrades') {
					window.location.href = '../admin/viewgrades.php';
				} else {
					alert(result);
				}
			}
		});
	}
})