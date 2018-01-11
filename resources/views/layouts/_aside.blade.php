<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0);" class="closebtn sidenav-a sidenav-close-a" onclick="closeNav();">&times;</a>
	<hr />
	<a href="{{ route('guest.about') }}" class="sidenav-a {{ Request::is('about') ? 'active' : '' }}">
		<i class="fa fa-list-alt fa-fw"></i>
		About
	</a>
	<a href="{{ route('guest.contact') }}" class="sidenav-a {{ Request::is('contact') ? 'active' : '' }}">
		<i class="fa fa-id-card fa-fw"></i>
		Contact
	</a>
	<hr />

	<!-- authenticated -->
	@if (Auth::user())
		<!-- admin -->
		@if (Auth::guard('admin')->check())
			<a href="{{ route('siswa.index') }}"
					class="sidenav-a {{ Request::is('admin/data-siswa*') ? 'active' : '' }}">
				Data Siswa
			</a>
			<a href="{{ route('guru.index') }}"
					class="sidenav-a {{ Request::is('admin/data-guru*') ? 'active' : '' }}">
				Data Guru
			</a>
			<a href="{{ route('nilai.index') }}"
					class="sidenav-a {{ Request::is('admin/data-nilai*') ? 'active' : '' }}">
				Data Nilai
			</a>
			<a href="{{ route('detailnilai.index') }}"
					class="sidenav-a {{ Request::is('admin/data-detailnilai*') ? 'active' : '' }}">
				Data Detail Nilai
			</a>
			<hr />
			<a href="{{ route('jurusan.index') }}"
					class="sidenav-a {{ Request::is('admin/data-jurusan*') ? 'active' : '' }}">
				Data Jurusan
			</a>
			<hr />
		@endif

		<!-- guru -->
		@if (Auth::guard('guru')->check())
			<a href="{{ route('guruuser.index') }}"
					class="sidenav-a {{ Request::is('guru*') ? 'active' : '' }}">
				Daftar Raport
			</a>
			<hr />
		@endif

		<!-- siswa -->
		@if (Auth::guard('siswa')->check())
			<!--  -->
			<hr />
		@endif

	<!-- unauthenticated -->
	@else
		<!--  -->
		<hr />
	@endif

	<!-- <div class="dropdown">
		<a href="javascript:void(0);" class="sidenav-a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Input
		</a>
		<div class="dropdown-menu">
			<h6 class="dropdown-header">Admin</h6>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">Data Siswa</a>
			<a href="#" class="dropdown-item">Data Guru</a>
			<a href="#" class="dropdown-item">Data Mata Pelajaran</a>
			<a href="#" class="dropdown-item">Data Kelas</a>
			<a href="#" class="dropdown-item">Data Nilai</a>
			<a href="#" class="dropdown-item">Data Detail Nilai</a>
			<a href="#" class="dropdown-item">Data User</a>
		</div>
	</div>

	<div class="dropdown">
		<a href="javascript:void(0);" class="sidenav-a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			View
		</a>
		<div class="dropdown-menu">
			<h5 class="dropdown-header">Admin</h5>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">Data Siswa</a>
			<a href="#" class="dropdown-item">Data Guru</a>
			<a href="#" class="dropdown-item">Data Mata Pelajaran</a>
			<a href="#" class="dropdown-item">Data Kelas</a>
			<a href="#" class="dropdown-item">Data Nilai</a>
			<a href="#" class="dropdown-item">Data Detail Nilai</a>
			<a href="#" class="dropdown-item">Data User</a>
		</div>
	</div>

	<div class="dropdown">
		<a href="javascript:void(0);" class="sidenav-a dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Print
		</a>
		<div class="dropdown-menu">
			<h5 class="dropdown-header">Admin</h5>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item">Data Siswa</a>
			<a href="#" class="dropdown-item">Data Guru</a>
			<a href="#" class="dropdown-item">Data Mata Pelajaran</a>
			<a href="#" class="dropdown-item">Data Kelas</a>
			<a href="#" class="dropdown-item">Data Nilai</a>
			<a href="#" class="dropdown-item">Data Detail Nilai</a>
			<a href="#" class="dropdown-item">Data User</a>
		</div>
	</div>

	<hr /> -->
</div>
<!--sidenav background-->
<div id="mySidenavBG" class="sidenavBG" onclick="closeNav();"></div>