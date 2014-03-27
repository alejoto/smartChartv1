@extends('layouts.base')

@section('content')
<div class="row-fluid">
	<div class="offset3 span6">
		<h1>Building datasets</h1>
		@if(isset($_GET['mssg']))
			@if($_GET['mssg']==1)
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					SORRY, YOU FORGOT SELECTING A FILE WHILE IMPORTING. PLEASE CHOOSE A CSV FILE WHEN IMPORTING DATA. TRY AGAIN.
				</div>
			@endif
		@endif
	</div>
</div>
@if(isset($_GET['user']))
<div id="user_dataset" class='hide'>{{$_GET['user']}}</div>
@endif
<div class="row-fluid">
	<div class="offset3 span6 whitebox">
		@include('charts.datasetsinclude1')
		@if(Dataset::logged($user)->count()>0)
			<table class="table table-condensed table-hovermaureen">
				<tr>
					<th class='span9 muted'>DATASET</th>
					<th class="span3 muted">Action</th>
				</tr>
				@foreach(Dataset::logged($user)->get() as $d)
					<tr class='dset' id='dset{{$d->id}}'>
						<td class='span9'>
							<div class='' id="current_dsetname{{$d->id}}">
								<b class="text-info">{{$d->name}}</b>
								<spam class="muted">
									({{$d->buildingregister->count()}} registers)
								</spam>
							</div>
							<div class="maureenhide muted" id="delete_ds_btngroups{{$d->id}}">
								Destroy whole dataset? ({{$d->buildingregister->count()}} registers)
								<br>
								<a href="" id='delete_ds{{$d->id}}'>Yes</a> | 
								<a href="" id='canceldelete_ds{{$d->id}}'>Cancel</a>
							</div>
							<div class='maureenhide form-inline' id='input_renameds{{$d->id}}'>
								<input type="text" id="rename_ds{{$d->id}}" class='span9' value='{{$d->name}}'>
								<i class="icon-ok icon-white maureenpointer" id='confirm_renameds{{$d->id}}'></i>
								<i class="icon-remove icon-white maureenpointer" id='cancel_renameds{{$d->id}}'></i>
							</div>
						</td>
						<td class="span3"> 
							<div  id='groupsofactionsfor_ds{{$d->id}}'>
								<a href="{{URL::to('/charts/table?user='.$user.'&ds='.$d->id)}}"><i 
									class="icon-calendar icon-white"  
									id='datatable{{$d->id}}'></i>
								</a>
								<a href="{{URL::to('/charts/charts?user='.$user.'&ds='.$d->id)}}"> <i 
									class="icon-signal icon-white" 
									id='datachartpage{{$d->id}}'
									></i>
								</a>
								
								<i class="icon-edit icon-white" id='changename{{$d->id}}'></i>
								<i class="icon-trash icon-white" id='delete_dsrequest{{$d->id}}'></i>
								<i class="icon-upload icon-white" id="openmodal_modal_import{{$d->id}}" building='{{$d->name}}'></i>
							</div>
							<div id="deleting_dataset{{$d->id}}" class="hide muted">
								<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
								Deleting whole building dataset...
							</div>
						</td>
					</tr>
				@endforeach
			</table>
			@include('charts.modal_import2')
		@else
		<h2 class="text-error">Please create a new dataset before importing any data.</h2>
		@endif

	</div>
</div>


@stop
