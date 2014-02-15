<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php //$link_home='/charts'.$userlink; 
			//$linktohome=URL::to($link_home);
			?>
			<a class='brand' href="{{URL::to('/temp')}}">Retuning Training Platform v1</a>
			
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li  class="">
						<a href="{{URL::to('/temp')}}">
							<i class="icon-home icon-white"></i>
							Home
						</a>
						{{--link_to($link_home,'Home')--}}
					</li>
					@if(isset($_GET['user']))
					<li>
						<?php 
						$cplk='/charts/chp?user='.$_GET['user'];
						$cplk=URL::to($cplk);
						?>
						<a href="{{$cplk}}">
							Chapters
						</a>
					</li>
					@endif
					@if(isset($userlink)&&isset($pages)&&$userlink=='')
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