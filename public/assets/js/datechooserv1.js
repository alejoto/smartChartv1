$(function(){
	//var start=new Date($('#mindate').html().trim());
	var start=$('#mindate').html().trim();
	var endd=$('#maxdate').html().trim();
	$('#datepicker_from').datepicker({
		format: 'yyyy-mm-dd',
		startDate: start,
		endDate: endd
	});

	$('#datepicker_to').datepicker({
		format: 'yyyy-mm-dd',
		startDate: start,
		endDate: endd
	});

	$('.chart_type').each(function(){
		var id=$(this).attr('id');
		id=id.replace('chart_type','');
		charttype(id);
		$('.chartchange'+id).each(function(){
			var sub_id=$(this).attr('id');
			sub_id=sub_id.replace('chart','');
			changecharttype(id,sub_id);
		});
	});

	function charttype(id){
		$('#chart_type'+id).click(function(e){
			e.preventDefault();
			$('.chartgroup').hide('fast');
			$('#chartgroup'+id).show('fast');
			$('#chart_title').html($(this).html().trim());

			var param=$(this).attr('param');
			param=param.split('~');
			for (var i = 0; i < param.length; i++){
				param[i]=param[i].trim();
				param[i]=param[i].split('|');
			}
			createnewchart2('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},param,'chartdiv');
		});
	}

	function changecharttype(id,sub_id){
		$('#chartoption'+id+'_'+sub_id).on('change',function(e){
			e.preventDefault();
			var typechart=$(this).val();
			var alltypechart=$('.selecttypechart'+id);
			var param='';
			var gnu='';
			$('.selecttypechart'+id).each(function(){
				param=param+gnu+$(this).val();
				gnu='~';
			});
			param=param.split('~');
			for (var i = 0; i < param.length; i++){
				param[i]=param[i].trim();
				param[i]=param[i].split('|');
			}
			//$('#target_change'+id).html(param);
			createnewchart2('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},param,'chartdiv');
		});
	}

	$(window).on('load', function() {
		var id=$('#chartidfromchapter').html();
		$('#chartgroup'+id).show('fast');
		if ($('#parameters').length>0 ) {
			var param=$('#parameters').html().trim();
			param=param.split('~');
			for (var i = 0; i < param.length; i++) {
				param[i]=param[i].trim();//important! this trim removes an unnecesary space after the gnu that messes the chart
				param[i]=param[i].split('|');
			}
			createnewchart2('data_as_json','time',{"leftaxis":"Temperature (F)","rightaxis":"Percent (%)"},param,'chartdiv');
		}
	});

});