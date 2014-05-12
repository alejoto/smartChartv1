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
	}).on('changeDate',function(){$('.datepicker').datepicker('hide');});

	$('.floatnumber').each(function(){
		var id=$(this).attr('id');
		hmdfloatnumb($('#'+id));
	});
});