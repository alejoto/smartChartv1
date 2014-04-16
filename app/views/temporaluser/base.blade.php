@extends('layouts.base')

@section('content')
<h1>Retuning Training Platform</h1>
<div>Please click the link below to go to the home page.</div>
<hr>
<div>Logged user</div>
<div class="row-fluid">
	<?php 
	$user1=Temporaluser::find(1);
	$url1='charts/ds?user='.$user1->id;
	$url1=URL::to($url1);
	?>
	<div class=" span2 text-right">User 1:</div>
	<div class="span2"><a href='{{$url1}}'>{{$user1->email}}</a> </div>
</div>

@stop
