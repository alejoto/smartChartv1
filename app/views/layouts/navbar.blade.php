<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php $link_home='/charts'.$userlink; 
			$linktohome=URL::to($link_home);
			?>
			{{link_to($link_home,'Retuning Training Platform v1',$attributes = array('class'=>'brand'))}}
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li  class="">
						<a href="{{$linktohome}}">
							<i class="icon-home icon-white"></i>
							Home
						</a>
						{{--link_to($link_home,'Home')--}}
					</li>
					@if(!isset($userlink)||$userlink=='')
						<li>
							<a href="{{URL::to('charts/log')}}">
								YOU ARE NOT LOGGED IN! (click here)
							</a>
						</li>
					@else
						@foreach($pages as $k=>$v)
							<?php $url_address=URL::to($linktopreffix.$k.$userlink) ?>
							<li class="">
								<a href="{{$url_address}}" class="  ">
									{{$v}}
								</a>
							</li>
						@endforeach
					@endif
				</ul>
				@if($user!='')
				<div class="pull-right nav-collapse collapse">
					<ul class="nav">
						<li>
							<a href="{{URL::to('charts/log')}}">
								<i class="icon-user icon-white"></i>
								<b>Logged in as {{$user}}</b>
								(change user)
							</a>
						</li>
					</ul>
				</div>
				@endif
				
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>