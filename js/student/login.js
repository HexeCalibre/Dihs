$(function(){
	$('#loginForm').submit(function(e){
		e.preventDefault();
		var dataForm = $('#loginForm').serialize();

		$.ajax({
			type: 'POST',
			url: '../controllers/student/login.php',
			data: dataForm,
			cache: false,
			success: function(result){
				if (result == '1') {
					window.location.href = '../student/profile.php';
				} else {
					alert(result);
				}
			}
		});
	});
})