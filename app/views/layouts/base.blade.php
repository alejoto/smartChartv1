<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	{{HTML::style('assets/css/bootstrap.css');}}
	{{HTML::style('assets/css/bootstrap-responsive.css');}}
	{{HTML::style('assets/css/sticky-footer-navbar.css');}}
	{{HTML::script('assets/js/jquery-1.10.2.min.js');}}
	{{HTML::script('assets/js/bootstrap.min.js');}}
	{{HTML::script('assets/js/pnnl.js');}}

</head>
    <body>
    	<div class='hide'  id='base'>{{URL::to('/')}}</div>
    	<div id="wrap">
    		@include('layouts.navbar')
	    		

	        <div class="container">
	        	@section('sidebar')
		        @show
		        
	            @yield('content')
	        </div>
	        <div id="push"></div>
	    </div>
	    @include('layouts.footer')
    </body>
</html>
@section('scripts')
@show
