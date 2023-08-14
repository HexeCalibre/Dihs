$(function(){
	$('#managesched').DataTable({
		'order': [],
		'ajax':{
			'url': '../controllers/admin/managesched.php',
			'type': 'GET', 
			'datatype': 'json',
			'dataSrc': ''
		},
		"columns": [
		{ "data": "nameof_section" },
		{ "data": "track_name" },
		{ "data": "option" }
		],
	});

	$('#managesched tbody').on('click', '.btn-manage', function(){
		var id = $(this).attr('id');
		var data = "&schedmanageid=" + id;
		ChangePage(data);
	});

	$('#managesched tbody').on('click', '.btn-view', function(){
		var id = $(this).attr('id');
		var data = "&schedviewid=" + id;
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
				if (result == 'mgtsched') {
					window.location.href = '../admin/manageschedule.php';
				} else if (result == 'viewsched') {
					window.location.href = '../admin/viewschedule.php';
				} else {
					alert(result);
				}
			}
		});
	}
})