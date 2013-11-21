<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	{{--Styles--}}
	{{HTML::style('assets/css/bootstrap.css');}}
	{{HTML::style('assets/css/bootstrap-responsive.css');}}
	{{HTML::style('assets/css/sticky-footer-navbar.css');}}
	{{HTML::style('assets/css/pnnl.css');}}
	{{HTML::style('assets/css/datepicker.css');}}
	{{HTML::style('assets/css/bootstrap-timepicker.css');}}
	
</head>
<?php 
$bodyclass='';
if ($title=='Home'||$title=='Chapters') {
	$bodyclass='maureenhome';
}
$containerclass='';
if ($title=='Charts') {
	$containerclass='maureenhome';
}

$linktopreffix='/charts/';
$pages=array(
	'chapters'	=>'View course chapters'
	,'data'		=>'Manage building data'
	,'mycharts'	=>'Charts'
	);
?>

    <body class='{{$bodyclass}}'>

    	<div class='hide'  id='base'>{{URL::to('/')}}</div>
    	<div id="wrap">
    		@include('layouts.navbar')
	    		

	        <div class="container {{$containerclass}} ">
	        	@section('sidebar')
		        @show
		        
	            @yield('content')
	        </div>
	        <div id="push"></div>
	    </div>
	    @include('layouts.footer')
    </body>
</html>
{{--Scripts--}}
{{HTML::script('assets/js/jquery-1.10.2.min.js');}}
{{HTML::script('assets/js/bootstrap.min.js');}}
{{HTML::script('assets/js/pnnl.js');}}
{{HTML::script('assets/js/hmd_valid.js');}}
{{HTML::script('assets/js/bootstrap-datepicker.js');}}
{{HTML::script('assets/js/bootstrap-timepicker.js');}}
@section('scripts')
@show
