<!-- <div class="jumbotron">
	<h1 class="display-3">Jumbotron</h1>
	<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	<p><a class="btn btn-primary btn-lg" href="#">Learn more</a></p>
</div> -->

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" role="navigation">
	<div class="container-fluid">

		<!-- sidenav -->
		<button type="button" class="btn btn-outline-light border-dark navbar-brand" onclick="openNav();openNavBG();">
			<i class="fa fa-navicon fa-fw"></i>
		</button>

		<!-- brand -->
		<a href="{{ url('/') }}" class="navbar-brand mt-1.5 pt-2">RaportApp</a>

		<!-- toggler / collapsible button -->
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- navbar link -->
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<!-- navbar left link -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="{{ url('/home') }}" class="nav-link">
						<i class="fa fa-home fa-fw"></i>
						Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
			</ul>

			<!-- navbar right link -->
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<button type="button" class="btn btn-outline-light border-dark nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Menu
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<!-- authenticated -->
						@if (Auth::user())
							<!-- admin -->
							@if (Auth::guard('admin')->check())
								<a href="javascript:void(0);" class="dropdown-item disabled">
									<i class="fa fa-user fa-fw"></i>
									{{ Auth::guard('admin')->user()->username }}
								</a>

								<div class="dropdown-divider"></div>

								<a href="{{ route('admin.logout') }}" class="dropdown-item"
										onclick="event.preventDefault();
										document.getElementById('admin-logout-form').submit();">
									<i class="fa fa-sign-out fa-fw"></i>
									Logout Admin
								</a>
								<form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
								<div class="dropdown-divider border-dark"></div>
							@else
								<a href="{{ route('admin.login') }}" class="dropdown-item">
									<i class="fa fa-sign-in fa-fw"></i>
									Login Admin
								</a>
								<div class="dropdown-divider border-dark"></div>
							@endif

							<!-- guru -->
							@if (Auth::guard('guru')->check())
								<a href="javascript:void(0);" class="dropdown-item disabled">
									<i class="fa fa-user fa-fw"></i>
									{{ Auth::guard('guru')->user()->nip }}
								</a>

								<div class="dropdown-divider"></div>

								<a href="{{ route('guru.logout') }}" class="dropdown-item"
										onclick="event.preventDefault();
										document.getElementById('guru-logout-form').submit();">
									<i class="fa fa-sign-out fa-fw"></i>
									Logout Guru
								</a>
								<form id="guru-logout-form" action="{{ route('guru.logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
								<div class="dropdown-divider border-dark"></div>
							@else
								<a href="{{ route('guru.login') }}" class="dropdown-item">
									<i class="fa fa-sign-in fa-fw"></i>
									Login Guru
								</a>
								<div class="dropdown-divider border-dark"></div>
							@endif

							<!-- siswa -->
							@if (Auth::guard('siswa')->check())
								<a href="javascript:void(0);" class="dropdown-item disabled">
									<i class="fa fa-user fa-fw"></i>
									{{ Auth::guard('siswa')->user()->nis }}
								</a>

								<div class="dropdown-divider"></div>

								<a href="{{ route('siswa.logout') }}" class="dropdown-item"
										onclick="event.preventDefault();
										document.getElementById('siswa-logout-form').submit();">
									<i class="fa fa-sign-out fa-fw"></i>
									Logout Siswa
								</a>
								<form id="siswa-logout-form" action="{{ route('siswa.logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
								<div class="dropdown-divider border-dark"></div>
							@else
								<a href="{{ route('siswa.login') }}" class="dropdown-item">
									<i class="fa fa-sign-in fa-fw"></i>
									Login Siswa
								</a>
								<div class="dropdown-divider border-dark"></div>
							@endif

						<!-- unauthenticated -->
						@else
							<a href="{{ route('admin.login') }}" class="dropdown-item">
								<i class="fa fa-sign-in fa-fw"></i>
								Login Adminx
							</a>
							<div class="dropdown-divider border-dark"></div>

							<a href="{{ route('guru.login') }}" class="dropdown-item">
								<i class="fa fa-sign-in fa-fw"></i>
								Login Gurux
							</a>
							<div class="dropdown-divider border-dark"></div>

							<a href="{{ route('siswa.login') }}" class="dropdown-item">
								<i class="fa fa-sign-in fa-fw"></i>
								Login Siswax
							</a>
							<div class="dropdown-divider border-dark"></div>
						@endif

						<a href="javascript:void(0);" class="dropdown-item disabled">
							<i class="fa fa-gear fa-fw"></i>
							Settings (<small>beta</small>)
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- button go to top -->
<button type="button" class="btn btn-outline-info" onclick="topFunction();" id="btnGoToTop">
	<i class="fa fa-chevron-up"></i>
</button>