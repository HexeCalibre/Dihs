$(function(){
	$('.btn-manage').click(function(){
		var id = $(this).attr('id');

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/fetchsections-tpage.php',
			data: "trackid=" + id,
			cache: false,
			success: function(result){
				$('.t-sections').html(result);
			}
		});
	});

	$('.t-sections').on('click', 'li a.section', function(){
		var id = $(this).attr('id');

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/gettrackid.php',
			data: "viewid=" + id,
			cache: false,
			success: function(result){
				if (result == 'view') {
					window.location.href = '../admin/viewremovestud.php';
				} else {
					alert(result);
				}
			}
		});
	});
})