<header>
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
		<div class="container">
			<a class="navbar-brand d-flex align-items-center py-0" href="{{ url('http://localhost:5173/') }}">
				<div id="logo-container" class="d-flex align-items-center">
					<img src="{{ URL::asset('/img/bnb-logo.png')}}" alt="bnb-logo" style="width: 60px" class="me-2">
					<h2>bool</h2>
					<h2 class="color-blue">b</h2>
					<h2 class="color-yellow">n</h2>
					<h2 class="color-red">b</h2>
				</div>
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
		  </button>


		  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				{{-- <!-- Left Side Of Navbar -->
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
					</li>
				</ul> --}}

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
					@endif
					@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->nome }}
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ url('admin') }}"><i class="fa-solid fa-house color-blue"></i> {{__('Dashboard')}}</a>
							<a class="dropdown-item" href="{{ url('profile') }}"><i class="fa-solid fa-circle-user color-yellow"></i> {{__('Profile')}}</a>
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
								<i class="fa-solid fa-right-from-bracket color-red"></i> {{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			  </div>
		</div>
	</nav>
</header>