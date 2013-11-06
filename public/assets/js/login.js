$(function(){
	valid_email('email','email_msg');

	$('.reset_show').hide();

	$('#reset_request').click(function(e){
		e.preventDefault();
		$('.reset_hide').hide('fast');
		$('#send_reset').show();
		$('.reset_show').show('fast');
		$('#ajax_result').html('');


	});

	function cancel_reset() {
		$('#cancel_reset').click(function(){
			$('.reset_hide').show('fast');
			$('.reset_show').hide('fast');
		});
	}
	cancel_reset();

	$('#send_reset').click(function(){
		var email=$('#email').val();
		$.post('user/reset',{email:email},function(data){
			if (data=='noexist') {
				
				$('#ajax_result').html('It seems that '
					+'entered email does not exist.'
					+'<br>Check spelling or subscribe '
					+'as new user.');
				$('.reset_hide').show('fast');
				$('.reset_show').hide('fast');
			}
			else {
				$('#ajax_result').html('Check your email and '
					+'follow instructions there');
				$('#send_reset').hide('fast');
			}
			
			
		});
	});

	//DO NOT COMPLICATE; CREATE A NEW FORM WITH POST METHOD AND SEND ANSWER TO ANOTHER PAGE; 
	//THERE IS NOT TIME NOW, NO TIME!!!
});

