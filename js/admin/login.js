$(function(){
	$('#loginForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#loginForm').serialize();

		$.ajax({
			type: 'POST',
			url: '../controllers/admin/login.php',
			data: dataForm,
			cache: false,
			success: function(result){
				if (result == 'SA' || result == '1') {
					window.location.href = '../admin/listofenrollees.php';
				} else {
					alert(result);
				}
			}
		});
	});
})