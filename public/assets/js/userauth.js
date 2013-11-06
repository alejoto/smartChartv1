
$(function() {
// Shorthand for $( document ).ready()
	valid_email('new_email','subscribe_email_msg');
	pwd_match(
		'new_email',
		'new_password',
		'confirm_new_password',
		'error_msg_pwd',
		'subscribe'
		);

});