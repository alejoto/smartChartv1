<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php $link_home='/charts'.$userlink; ?>
			{{link_to($link_home,'PNNL Trainning platform v1',$attributes = array('class'=>'brand'))}}
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li  class="">
						{{link_to($link_home,'Home')}}
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
				<div class="pull-right nav-collapse collapse">
					<ul class="nav"><li><a href="{{URL::to('charts/log')}}">Change user different to {{$user}}</a></li></ul>
					
				</div>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>