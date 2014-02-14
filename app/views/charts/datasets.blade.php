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
	<div class="span6">
		<h3>
			<a href="" id='addnewdataset'>
				+ Add a new data set
			</a>
		</h3>
		<div class="hmdhide"><input type="text"></div>
			
		@if(Dataset::logged($user)->count()>0)
			<table class="table table-condensed table-hover">
				<tr>
					<th class='span2'>Dataset name</th>
					<th class="span2">Nrs of registers</th>
					<th class="span2">Action</th>
				</tr>
				@foreach(Dataset::logged($user)->get() as $d)
					<tr >
						<td class='span2'>{{$d->name}}</td>
						<td class="span2">11</td>
						<td class="span2">
							<div class="dropdown">
								<button class="btn dropdown-toggle" data-toggle="dropdown">action <b class="caret"></b></button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<li><a href="">see data table</a></li>
									<li><a href="">go to data charts</a></li>
									<li><a href="">import cvs data</a></li>
									<li><a href="">rename</a></li>
									<li><a href="">delete</a></li>
								</ul>
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