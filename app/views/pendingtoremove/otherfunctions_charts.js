$(function(){
	/*$('#timepicker_from').timepicker({
		template: 'dropdown',
		showSeconds: true,
		minuteStep: 30,
		//secondStep: 0,
		showInputs: false,
		disableFocus: true,
		defaultTime: '8:00:00',
		showMeridian: false
	});

	$('#timepicker_to').timepicker({
		template: 'dropdown',
		showSeconds: true,
		minuteStep: 30,
		//secondStep: 0,
		showInputs: false,
		disableFocus: true,
		defaultTime: '20:00:00',
		showMeridian: false
	});*/

	/*var mindate=$('#mindate').text();
	var maxdate= $('#maxdate').text();

	var startdate = new Date(mindate);
	var enddate = new Date(maxdate);*/
	 
	/*var checkin = $('#datepicker_from').datepicker({
		format : 	'yyyy/mm/dd',
	  onRender: function(date) {
	    return date.valueOf() <= startdate.valueOf() || date.valueOf()>=enddate.valueOf()  ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  if (ev.date.valueOf() > checkout.date.valueOf()) {
	    var newDate = new Date(ev.date)
	    newDate.setDate(newDate.getDate() + 1);
	    enddate.setValue(newDate);
	  }
	  checkin.hide();
	  $('#datepicker_to')[0].focus();
	}).data('datepicker');*/

	/*var checkout = $('#datepicker_to').datepicker({
		format : 	'yyyy/mm/dd',
	  onRender: function(date) {
	    return date.valueOf() <= startdate.valueOf() || date.valueOf()>enddate.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  checkout.hide();
	}).data('datepicker');*/

	/*$('#datepicker_to').on('change blur',function(e){
		//e.preventDefault();
		var enddate=$('#datepicker_to').html().trim;
		var startdate=$('#datepicker_from').html().trim;
		if (enddate<startdate) {
			$('#datepicker_to').html('');
		}
	});*/
});

