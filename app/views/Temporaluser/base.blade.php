@extends('layouts.base')

@section('content')
<h1>Logged user simulator</h1>
<div>If user is not logged page will redirect to login - subscribe page (not active yet while client send login page URL).</div>
<hr>
<div>Logged user</div>
<div class="row-fluid">
	<?php 
	$user1=Temporaluser::find(1);
	$url1='charts/ds?user='.$user1->id;
	$url1=URL::to($url1);
	?>
	<div class=" span2 text-right">No data:</div>
	<div class="span2"><a href='{{$url1}}'>{{$user1->email}}</a> </div>
	<div class="span1"><button class='btn'>reset</button> </div>
	<div class="span5"><spam class='muted'>reset button will erase all data contained in datasets and measurements tables.</spam></div>
</div>
<div class="row-fluid">
	<?php 
	$user2=Temporaluser::find(2);
	$url2='charts/ds?user='.$user2->id;
	$url2=URL::to($url2);
	?>
	<div class=" span2 text-right">Existent data:</div>
	<div class="span2"><a href='{{$url2}}'>{{$user2->email}}</a> </div>
	<div class="span1"><button class='btn'>reset</button> </div>
	<div class="span5"><spam class='muted'>reset button will reset table with default sample data.</spam></div>
</div>
<div class="row-fluid">
	<?php 
	$user3=Temporaluser::find(3);
	$url3='charts/ds?user='.$user3->id;
	$url3=URL::to($url3);
	?>
	<div class=" span2 text-right">Any usage option:</div>
	<div class="span2"><a href="{{$url3}}">{{$user3->email}}</a> </div>
	<div class="span1">  </div>
	<div class="span5"><spam class='muted'>Data will be stored as decided by user.</spam></div>
</div>

@stop