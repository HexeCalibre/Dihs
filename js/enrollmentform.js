$(function(){
	$('#uploadfile').hide();
	$('.ipdropdown').hide();
	$('.spedtextfield').hide();

	$('input[name="gradyear"]').datepicker({
		format: 'yyyy',
		viewMode: 'years', 
		minViewMode: 'years'
	});

	$('input[name="birthdate"]').datepicker();

	$('#track-id').on('change', function(){
		var trackId = $(this).val();

		$.ajax({
			type: 'POST',
			url: 'controllers/student/trackvalidate.php',
			data: "trackid=" + trackId,
			cache: false,
			success: function(result){
				if (result == 'Yes') {
					$('#uploadfile').show();
					$('input[name="gradefile"]').prop('required', true);
				} else {
					$('#uploadfile').hide();
					$('input[name="gradefile"]').prop('required', false);
				}
			}
		});
	})

	$('input[name="birthdate"]').on('changeDate', function(){
		var bdate = $('input[name="birthdate"]').val();
		$.ajax({
			type: 'POST',
			url: 'controllers/getage.php',
			data: "bdate=" + bdate,
			cache: false,
			success: function(result){
				$('input[name="age"]').val(result);
			}
		});
	})

	$('#ipyes').on('click', function(){
		$('.ipdropdown').show();
		$('#ipdropdown-id').prop('required', true);
	})

	$('#ipno').on('click', function(){
		$('.ipdropdown').hide();
		$('#ipdropdown-id').prop('required', false);
		$('#ipdropdown-id').val('');
	})

	$('#spedyes').on('click', function(){
		$('.spedtextfield').show();
		$('#spedtextfield-id').prop('required', true);
	})

	$('#spedno').on('click', function(){
		$('.spedtextfield').hide();
		$('#spedtextfield-id').prop('required', false);
		$('#spedtextfield-id').val('');
	})

	$('#eForm').submit(function(e){
		e.preventDefault();
		//var dataForm = $('#eForm').serialize();
		//console.log($(this).serializeArray());
		var lrn = $('input[name="lrn"]').val();
		var dataForm = new FormData(this);
		
		$.ajax({
			type: 'POST',
			url: 'controllers/eformvalidate.php',
			data: "lrn=" + lrn,
			cache: false,
			success: function(result){
				if (result > 0) {
					alert("Your enrollment form for this school year has been submitted already.");
				} else {
					InsertData(dataForm);
				}
			}
		});
	});

	//JS Function starts here
	function InsertData(dataForm){
		$.ajax({
			type: 'POST',
			url: 'controllers/enrollmentform-insert.php',
			data: dataForm,
			processData: false,
			contentType: false,
			cache: false,
			success: function(result){
				var message = null;
				var anchor = null;
				var swalMessage = 'success';
				if (result) {
					$('#eForm')[0].reset();
					message = 'Success!';
					anchor = '<a href="admin/generateform.php?id=' + result + '" target="_blank">' +
					'Your Enrollment Tracking ID number is: ' + result + '</a>' +
					' (Click the link above to generate the form!)';
					Swal.fire(
						message,
						anchor,
						swalMessage
						)
				} else {
					alert(result);
				}
				$('#uploadfile').hide();
			}
		});
	}
})