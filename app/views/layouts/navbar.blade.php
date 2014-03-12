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
					<?php 
					$u='?user='.$_GET['user'];
					if (isset($_GET['ds'])) {
						$u=$u.'&ds='.$_GET['ds'];
					}
					$pfx='/charts/';
					$ds_link=$pfx.'ds'.$u;
					$ds_link=URL::to($ds_link);
					$cplk=$pfx.'chp'.$u;
					$cplk=URL::to($cplk);
					$tablelink=$pfx.'table'.$u;
					$tablelink=URL::to($tablelink);
					$chartlink=$pfx.'charts'.$u;
					$chartlink=URL::to($chartlink);
					?>
					<li>
						<a href="{{$ds_link}}">
							<i class="icon-tasks icon-white"></i>
							Data sets
						</a>
					</li>
					<li>
						<a href="{{$tablelink}}">
							<i class="icon-th icon-white"></i>
							Tables
						</a>
					</li>
					<li>
						<a href="{{$cplk}}">
							<i class="icon-list icon-white"></i>
							Chapters
						</a>
					</li>
					<li>
						<a href="{{$chartlink}}">
							<i class="icon-signal icon-white"></i>
							Charts
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