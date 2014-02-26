@extends('layouts.base')

@section('content')
<h1>Data Sets</h1>
<div class="row-fluid">
	<div class="span3">
		<h3 class='text-info'>What are data sets?</h3>
		<p class='text-info'>A data set is any group of data about which you would like to view the charts in this module.  
			Data sets can represent a specific timeframe, a specific location such as a building or a site, or a 
			combination of both.  Before importing any data, you must first create a data set.  Each data set you
			create must have a unique name.
		</p></div>
	<div class="span8">
		@include('charts.datasetsinclude1')

			
		@if(Dataset::logged($user)->count()>0)
			<table class="table table-condensed table-hover">
				<tr>
					<th class='span3'>Data set name</th>
					<th class="span2">Number of rows</th>
					<th class="span3">Action</th>
				</tr>
				@foreach(Dataset::logged($user)->get() as $d)
					<tr class='dset' id='dset{{$d->id}}'>
						<td class='span3'>
							<div id="current_dsetname{{$d->id}}">{{$d->name}}</div>
							<div class='maureenhide form-inline' id='input_renameds{{$d->id}}'>
								<input type="text" id="rename_ds{{$d->id}}" class='span6' value='{{$d->name}}'>
								<button class="btn" id='confirm_renameds{{$d->id}}'><i class="icon-ok"></i></button>
								<button class="btn" id='cancel_renameds{{$d->id}}'><i class="icon-remove"></i></button>
							</div>
						</td>
						<td class="span2">{{$d->buildingregister->count()}}
						</td>
						<td class="span3">
							<div class="dropdown" id='groupsofactionsfor_ds{{$d->id}}'>
								<button class="btn dropdown-toggle" data-toggle="dropdown">action <b class="caret"></b></button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<li><a href="{{URL::to('/charts/table?user='.$user.'&ds='.$d->id)}}">see data table</a></li>
									<li><a href="{{URL::to('/charts/charts?user='.$user.'&ds='.$d->id)}}">go to data charts</a></li>
									<li><a href="" id='changename{{$d->id}}'>rename</a></li>
									<li>
										<a href="" id='delete_dsrequest{{$d->id}}'>delete</a>
									</li>
								</ul>
							</div>
							<div class="maureenhide" id="delete_ds_btngroups{{$d->id}}">
								Destroy whole data set? ({{$d->buildingregister->count()}} rows)
								<br>
								<a href="" id='delete_ds{{$d->id}}'>Yes</a> | 
								<a href="" id='canceldelete_ds{{$d->id}}'>Cancel</a>
							</div>
							<div id="deleting_dataset{{$d->id}}" class="hide">
								<img src="{{URL::to('assets/img/progressBar.gif')}}" alt="">
								Deleting data set...
							</div>
						</td>
					</tr>
				@endforeach
			</table>
		@else
		<h2 class="text-error">You have not yet created any data sets.</h2>
		@endif

	</div>
</div>


@stop
