$('.timepicker').timepicker({
	template: 'dropdown',
	showSeconds: true,
	minuteStep: 30,
	//secondStep: 0,
	showInputs: false,
	disableFocus: true,
	defaultTime: '8:00:00',
	showMeridian: false
});
$(function(){
	$('.datepicker').datepicker({
		format : 	'yyyy/mm/dd'
	});

	$('.floatnumber').each(function(){
		var id=$(this).attr('id');
		hmdfloatnumb($('#'+id));
	});
});