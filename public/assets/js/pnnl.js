/*
JS SCRIPT FILE FOR PROJECT "MULTIPLE DATA MEASUREMENTS"
COMPANY(CLIENT) PACIFIC NORTHWEST NATIONAL LABORATORY
DATE OF CREATION: NOV / 11 / 2013;
CREATED BY: BREAKING ORBIT TECHNICAL CONSULTANT
*/
$(function(){
	/*----------------------------
	|
	|
	| 1. javascripts for home view
	*/

	/*----------------------------
	|
	|
	| 2. javascripts for chapters view
	*/
	function togglechapters(id) {
		$('#pnnlchapt'+id).click(function(e){
			e.preventDefault();
			var visible=$('#charthidden'+id).is(":visible");
			if (visible) {
				$('#charthidden'+id).attr('chapter','0');
				$('#charthidden'+id).hide('fast');
			} 
			else {
				$("[chapter='1']").hide('fast');
				$('#charthidden'+id).show('fast');
				$('#charthidden'+id).attr('chapter','1');
				
			}
		});
	}

	$('.pnnlchapt').each(function(){
		var id=$(this).attr('id');
			id=id.replace('pnnlchapt','');

		togglechapters(id);
	});
		
	//togglechapters(1);

	/*----------------------------
	|
	|
	| 3. javascripts for data view
	*/

	/*----------------------------
	|
	|
	| 4. javascripts for charts view
	*/
});
	