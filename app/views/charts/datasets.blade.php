@extends('layouts.base')

@section('content')
<h1>Datasets</h1>
<div class="row-fluid">
	<div class="span3">
		<h3 class='text-info'>What are data sets?</h3>
		<p class='text-info'>Data sets are groups of data describing particular contexts such as different climatic seasons, calibration errors 
			and some other ilustrative cases related to building retuning systems.  In order to import / create new registers you 
			must select first a dataset.
		</p></div>
	<div class="span8">
		@include('charts.datasetsinclude1')

			
		@if(Dataset::logged($user)->count()>0)
			<table class="table table-condensed table-hover">
				<tr>
					<th class='span4'>Dataset name</th>
					<th class="span2">Nrs of registers</th>
					<th class="span2">Action</th>
				</tr>
				@foreach(Dataset::logged($user)->get() as $d)
					<tr class='dset' id='dset{{$d->id}}'>
						<td class='span4'>
							<div id="current_dsetname{{$d->id}}">{{$d->name}}</div>
							<div class='maureenhide form-inline' id='input_renameds{{$d->id}}'>
								<input type="text" id="rename_ds{{$d->id}}" class='span6' value='{{$d->name}}'>
								<button class="btn" id='confirm_renameds{{$d->id}}'><i class="icon-ok"></i></button>
								<button class="btn" id='cancel_renameds{{$d->id}}'><i class="icon-remove"></i></button>
							</div>
						</td>
						<td class="span2">{{$d->buildingregister->count()}}
						</td>
						<td class="span2">
							<div class="dropdown" id='groupsofactionsfor_ds{{$d->id}}'>
								<button class="btn dropdown-toggle" data-toggle="dropdown">action <b class="caret"></b></button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<li><a href="{{URL::to('/charts/table?user='.$user.'&ds='.$d->id)}}">see data table</a></li>
									<li><a href="{{URL::to('/charts/charts?user='.$user.'&ds='.$d->id)}}">go to data charts</a></li>
									<li><a href="">import cvs data</a></li>
									<li><a href="" id='changename{{$d->id}}'>rename</a></li>
									<li>
										<a href="" id='delete_dsrequest{{$d->id}}'>delete</a>
									</li>
								</ul>
							</div>
							<div class="maureenhide" id="delete_ds_btngroups{{$d->id}}">
								Confirm deleting
								<a href="" id='delete_ds{{$d->id}}'>Yes</a>
								<a href="" id='canceldelete_ds{{$d->id}}'>No</a>
							</div>
						</td>
					</tr>
				@endforeach
			</table>
		@else
		<h2 class="text-error">You do not have any dataset yet.</h2>
		@endif

	</div>
</div>


@stop