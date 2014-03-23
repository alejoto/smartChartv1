@extends('layouts.base')

@section('content')
<h1>Logged user simulator</h1>
<div>If user is not logged page will redirect to login/subscribe page (not active yet -unknown login URL-).</div>
<hr>
<div>Logged user</div>
<div class="row-fluid">
	<?php 
	$user1=Temporaluser::find(1);
	$url1='charts/ds?user='.$user1->id;
	$url1=URL::to($url1);
	?>
	<div class=" span2 text-right">Test data 1:</div>
	<div class="span2"><a href='{{$url1}}'>{{$user1->email}}</a> </div>
</div>
<div class="row-fluid">
	<?php 
	$user2=Temporaluser::find(2);
	$url2='charts/ds?user='.$user2->id;
	$url2=URL::to($url2);
	?>
	<div class=" span2 text-right">Test data 2:</div>
	<div class="span2"><a href='{{$url2}}'>{{$user2->email}}</a> </div>
</div>
<div class="row-fluid">
	<?php 
	$user3=Temporaluser::find(3);
	$url3='charts/ds?user='.$user3->id;
	$url3=URL::to($url3);
	?>
	<div class=" span2 text-right">Test data 3:</div>
	<div class="span2"><a href="{{$url3}}">{{$user3->email}}</a> </div>
</div>

@stop