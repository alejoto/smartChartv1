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
					<li  class="active">
						{{link_to($link_home,'Home')}}
					</li>
					<!-- <li  class="">
						{{link_to('/charts/chapters','Chapters')}}
					</li>
					<li  class="">
						{{link_to('/charts/data','Data')}}
					</li>
					<li  class="">
						{{link_to('/charts/chart','Charts')}}
					</li> -->
					{{--unchecked users--}}
					@if (!Auth::check())
						
					    <!-- 
					    <li>
					    	<a href="#about">Wellcome user</a>
					    </li>
						<li>
							{{link_to('user/subscribe','if new user subscribe')}}
						</li> -->
					@endif
					
					
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li class="nav-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li> -->
					@if (Auth::check())
					<li>
						{{link_to('logged',"Wellcome, logged user")}}
					</li>
					<!-- <li>
						<a href="#contact">Button for logged user only2</a>
					</li> -->
					<li>
						{{link_to('logged/logout','Log off')}}
					</li>
						

					@endif
					
				</ul>
				<div class="pull-right nav-collapse collapse">
					<ul class="nav"><li><a href="">Wellcome {{$user}}</a></li></ul>
					
				</div>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>