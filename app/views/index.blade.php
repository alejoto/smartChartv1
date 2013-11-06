@extends('layouts.base')	
@section('sidebar')	
@stop	
@section('content')	
	<h1>SMART CHARTS (TEMPORARY NAME) VERSION 1</h1>
	<form action="file"></form>
	<h2><a href="">Upload csv file</a></h2>
	<h2><a href="{{URL::to('charts')}}">Go to charts</a></h2>
@stop	
