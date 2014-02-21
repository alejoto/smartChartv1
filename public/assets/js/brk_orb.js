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
			var iconvisible=$('#chapt_hidden'+id).is(":visible");
			if (visible) {
				$('#charthidden'+id).attr('chapter','0');
				$('#charthidden'+id).hide('fast');
				$('#chapt_hidden'+id).show();
				$('#chapt_active'+id).hide();
			} 
			else {
				//$('#chapt_hidden'+id).hide();
				$("[chapter='1']").hide('fast');
				$('#charthidden'+id).show('fast');
				$('#charthidden'+id).attr('chapter','1');
				$('#chapt_hidden'+id).hide();
				$('#chapt_active'+id).show();
			}
		});
	}
/*chapt_hidden
chapt_active*/
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
	$('#add_new_row_of_data').click(function(e){
		e.preventDefault();
		$('#add_data').show('fast');
		$(this).hide();
		$('#cancel_add_new_row_of_data').show();
	});



	$('#savenewrow').click(function(e){
		e.preventDefault();
		var datereading=$('#datadate').val();
		var timereading=$('#datatime').val();
		var dataset=$('#dataset').html().trim();
		var ts=datereading+' '+timereading;

		var datakeys=new Array; var i=0;
		$('.datakeys').each(function(){
			datakeys[i]=$(this).attr('id');
			i++;
		});

		var datatobesent=new Array();
		for (var i = 0; i < datakeys.length; i++) {
			var datakey=datakeys[i];
			datatobesent[i]=$('#newinput'+datakey).val();
		};
		var datarow='';
		for (var i = 0; i < datakeys.length; i++) {
			datarow=datarow+'<td>'+$('#newinput'+datakeys[i]).val()+'</td>';
		};
		if (datereading.trim()=='') {
			$('#datadate').focus();
		}
		else if (timereading.trim()=='') {
			$('#datatime').focus();
		}
		else {
			var base=$('#base').html();
			$.post(base+'/charts/anewrow',{
				dataset:dataset
				,datereading:datereading
				,timereading:timereading
				,datatobesent:datatobesent
				,datakeys:datakeys},function(d){

					if (d==0) {
						$('#newbuildingreg_result').html('<h3>You cannot overwrite existent register from here</h3>');
						location.href = "#newbuildingreg_result";
						$(window).scrollLeft((Number($(window).scrollLeft())+0)+'px');
					}
				else if (d==1) {
					location.reload();
				}
			});
		}
	});

	$('#dataset_to_receive_csv').change(function(e){
		e.preventDefault();
		if ($(this).val()!='' ) {
			$('#upload_group').show('fast');
		}
		else {
			$('#upload_group').hide('fast');
		}
	});


	$('#upload_button').click(function(e){
		//e.preventDefault();
		$(this).hide();
		$('#uploading_csv_div').show('fast');
		$('#import_form').submit();
	});

	$('#cancel_add_new_row_of_data').click(function(e){
		e.preventDefault();
		$('#add_data').hide('fast');
		$(this).hide();
		$('#add_new_row_of_data').show();
	});

	$('#openmodal_modal_import').click(function(e){
		e.preventDefault();
		$('#modal_import').modal('show');
	});


	function showeditabledata(id) {
		$('#edit'+id).click(function(e){
			e.preventDefault();
			$('#editable'+id).show();
			$(this).hide();
			$('#editdata'+id).val($('#editdata'+id).val());
			$('#editdata'+id).focus();
		});
		$('#editdata'+id).blur(function(e){
			e.preventDefault();
			var editdata=$(this).val().trim();
			var dataid=$(this).attr('dataid');
			var datacolumn=$(this).attr('datacolumn');
			$('#editable'+id).hide();
			$('#edit'+id).show();
			if (editdata==''&&$('#edit'+id).html().trim()=='__') {}
				else
			if (editdata!=$('#edit'+id).html().trim() ) {
				var base=$('#base').html();
				$.post(base+'/charts/celledition',{editdata:editdata,dataid:dataid,datacolumn:datacolumn},function(d){
					$('#edit'+id).html(editdata);
				});
			}
			
			//if (editdata) {};
			/*if ($('#edit'+id).html.trim()!=editdata) {
				
			}*/
				
		});
	}

	$('#addnewdataset').click(function(e){
		e.preventDefault();
		$(this).hide('fast');
		$('#hidden_dataset_field').show('fast');
	});

	$('#cancel_newdataset').click(function(e){
		e.preventDefault();
		$('#addnewdataset').show('fast');
		$('#hidden_dataset_field').hide('fast');
		$('#newdatasetinput').val('');
		$('#newdatasetmssg').html('');
	});

	$('#confirm_newdataset').click(function(e){
		e.preventDefault();
		var ds=$('#newdatasetinput').val().trim();
		var user=$('#loggeduser').html();
		var base=$('#base').html();
		$.post(base+'/charts/datasetnew',{ds:ds,user:user},function(d){
			if (d==0) {
				$('#newdatasetmssg').html('Data set name cannot be repeated, choose another name').show('fast');
			}
			else if (d==1) {
				location.reload();
			}
		});
	});

	$('.dset').each(function(){
		var id=$(this).attr('id');
		id=id.replace('dset','');
		delete_dsrequest(id);
		delete_ds(id);
		canceldelete_ds(id);
		rename_ds(id);
		cancel_renameds(id);
		confirm_renameds(id);
	});

	function confirm_renameds(id){
		$('#confirm_renameds'+id).click(function(e){
			e.preventDefault();
			var name=$('#rename_ds'+id).val();
			var base=$('#base').html();
			$.post(base+'/charts/datasetrename',{id:id,name:name},function(d){
				if (d==1) {
					location.reload();
				}
			});
		});
	}

	function rename_ds(id){
		$('#changename'+id).click(function(e){
			e.preventDefault();
			$('#current_dsetname'+id).hide('fast');
			$('#input_renameds'+id).show('fast');
		});
	}

	function cancel_renameds(id){
		$('#cancel_renameds'+id).click(function(e){
			e.preventDefault();
			$('#current_dsetname'+id).show('fast');
			$('#input_renameds'+id).hide('fast');
		});
	}
	function delete_dsrequest(id){
		$('#delete_dsrequest'+id).click(function(e){
			e.preventDefault();
			$('#groupsofactionsfor_ds'+id).hide('fast');
			$('#delete_ds_btngroups'+id).show('fast');
		});
	}
	function canceldelete_ds(id){
		$('#canceldelete_ds'+id).click(function(e){
			e.preventDefault();
			$('#groupsofactionsfor_ds'+id).show('fast');
			$('#delete_ds_btngroups'+id).hide('fast');
		});
	}

	function delete_ds(id){
		$('#delete_ds'+id).click(function(e){
			e.preventDefault();
			var base=$('#base').html();
			$('#delete_ds_btngroups'+id).hide();
			$('#deleting_dataset'+id).show();
			$.post(base+'/charts/datasetdelete',{id:id},function(d){
				if (d==1) {
					location.reload();
				}
			});
			
		});
	}


	$('.catcheditable').each(function(){
		id=$(this).attr('id');
		id=id.replace('edit','');
		showeditabledata(id);
	});

	function deleterequest(id) {
		$('#delete'+id).click(function(e){
			e.preventDefault();
			$('#delete'+id).hide();
			$('#confirmdelete'+id).show();
		});
		$('#yesdelete'+id).click(function(e){
			e.preventDefault();
			var base=$('#base').html();
			$.post(base+'/charts/deleterow',{id:id},function(d){
				if (d==1) {
					location.reload();
					//$('#datarow'+id).hide('fast');
				}
				
			});
			
		});
		$('#nodelete'+id).click(function(e){
			e.preventDefault();
			$('#delete'+id).show();
			$('#confirmdelete'+id).hide();
		});
	}

	$('.datarow').each(function(){
		id=$(this).attr('id');
		id=id.replace('datarow','');
		deleterequest(id);
		//confirmdelete(id);
	});

	/*----------------------------
	|
	|
	| 4. javascripts for charts view
	*/
});
	