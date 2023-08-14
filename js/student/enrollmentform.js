$(function(){
	$('input[name="shiftanswer"]').on('change', function(){
		var value = $(this).val();

		if (value == 'Yes') {
			$('.trackform').css('display', '');
			$('#track-id').prop('required', true);
		} else if (value == 'No') {
			$('.trackform').css('display', 'none');
			$('#track-id').prop('required', false);
		}
	});

	$('#track-id').on('change', function(){
		var trackId = $(this).val();

		$.ajax({
			type: 'POST',
			url: '../controllers/student/trackvalidate.php',
			data: "trackid=" + trackId,
			cache: false,
			success: function(result){
				if (result == 'Yes') {
					$('#uploadfile').css('display', '');
					$('input[name="gradefile"]').prop('required', true);
				} else {
					$('#uploadfile').css('display', 'none');
					$('input[name="gradefile"]').prop('required', false);
				}
			}
		});
	});

	$('#eForm').submit(function(e){
		e.preventDefault();
		//var dataForm = $('#eForm').serialize();
		//console.log($(this).serializeArray());
		var dataForm = new FormData(this);

		$.ajax({
			type: 'POST',
			url: '../controllers/student/enrollmentform-insert.php',
			data: dataForm,
			processData: false,
			contentType: false, 
			cache: false,
			success: function(result){
				if (result == 'Success!') {
					$('#eForm')[0].reset();
					$('.trackform').css('display', 'none');
					$('#uploadfile').css('display', 'none');
					$('input[name="gradefile"]').prop('required', false);
					$('#track-id').prop('required', false);
					Swal.fire(
						'Success!',
						'Success!',
						'success'
						)
				} else {
					alert(result);
				}
			}
		});
	});
})