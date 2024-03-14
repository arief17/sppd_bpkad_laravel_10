<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
	<meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

	<!-- Title -->
	<title>SPPD | {{ $title }}</title>

	<!-- Favicon -->
	<link rel="icon" href="/assets/img/logo-banten.png" type="image/x-icon"/>

	<!-- Icons css -->
	<link href="/assets/css/icons.css" rel="stylesheet">

	<!-- Bootstrap css -->
	<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- style css -->
	<link href="/assets/css/style.css" rel="stylesheet">

	<!--- Animations css-->
	<link href="/assets/css/animate.css" rel="stylesheet">

</head>

<body class="main-body app sidebar-mini ltr">

	<!-- Loader -->
	<div id="global-loader">
		<img src="/assets/img/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- /Loader -->

	<!-- Page -->
	<div class="page custom-index">
		<div>
			<!-- main-header -->
			<div class="main-header side-header sticky nav nav-item">
				<div class="container-fluid main-container ">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="/" class="header-logo">
								<img src="/assets/img/logo-banten.png" class="logo-1" alt="logo">
								<img src="/assets/img/logo-banten.png" class="dark-logo-1" alt="logo">
							</a>
						</div>
						<div class="app-sidebar__toggle" data-bs-toggle="sidebar">
							<a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="javascript:void(0);"><i class="header-icons fe fe-x"></i></a>
						</div>
					</div>
					<div class="main-header-right">
						<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon fe fe-more-vertical "></span>
						</button>
						<div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
							<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
								<ul class="nav nav-item  navbar-nav-right ms-auto">
									<li class="dropdown nav-item main-layout">
										<a class="new nav-link theme-layout nav-link-bg layout-setting" >
											<span class="dark-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24"><path d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z"/></svg></span>
											<span class="light-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24"><path d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z"/></svg></span>
										</a>
									</li>
									<li class="nav-link search-icon d-lg-none d-block">
										<form class="navbar-form" role="search">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Search">
												<span class="input-group-btn">
													<button type="reset" class="btn btn-default">
														<i class="fas fa-times"></i>
													</button>
													<button type="submit" class="btn btn-default nav-link resp-btn">
														<svg xmlns="http://www.w3.org/2000/svg" height="24px" class="header-icon-svgs" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
													</button>
												</span>
											</div>
										</form>
									</li>

									<li class="nav-item full-screen fullscreen-button">
										<a class="new nav-link full-screen-link" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
									</li>
									<li class="dropdown main-profile-menu nav nav-item nav-link">
										<a class="profile-user d-flex" href=""><img alt="" src="/assets/img/profile.jpg"></a>
										<div class="dropdown-menu">
											<div class="main-header-profile bg-primary p-3">
												<div class="d-flex wd-100p">
													<div class="main-img-user"><img alt="" src="/assets/img/profile.jpg" class=""></div>
													<div class="ms-3 my-auto">
														<h6>{{ auth()->user()->username }}</h6>
													</div>
												</div>
											</div>
											<a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
											<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>
											<a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out"></i> Sign Out</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /main-header -->

			<!-- main-sidebar -->
			<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
			<div class="sticky">
				<aside class="app-sidebar sidebar-scroll">
					<div class="main-sidebar-header active">
						<a class="desktop-logo logo-light active text-decoration-none" href="/">
							<div class="d-flex justify-content-center align-items-center">
								<img src="/assets/img/logo-banten.png" class="main-logo m-0" alt="logo">
								<h4 class="mb-0 ms-2 text-black">SPPD</h4>
							</div>
						</a>
						<a class="desktop-logo logo-dark active text-decoration-none" href="/">
							<div class="d-flex justify-content-center align-items-center">
								<img src="/assets/img/logo-banten.png" class="main-logo m-0" alt="logo">
								<h4 class="mb-0 ms-2 text-light">SPPD</h4>
							</div>
						</a>
						<a class="logo-icon mobile-logo icon-light active text-decoration-none" href="/">
							<div class="d-flex justify-content-center align-items-center">
								<img src="/assets/img/logo-banten.png" alt="logo">
								<h4 class="mb-0 ms-2 text-black">SPPD</h4>
							</div>
						</a>
						<a class="logo-icon mobile-logo icon-dark active text-decoration-none" href="/">
							<div class="d-flex justify-content-center align-items-center">
								<img src="/assets/img/logo-banten.png" alt="logo">
								<h4 class="mb-0 ms-2 text-light">SPPD</h4>
							</div>
						</a>
					</div>
					<div class="main-sidemenu">
						<div class="app-sidebar__user clearfix">
							<div class="dropdown user-pro-body">
								<div class="">
									<img alt="user-img" class="avatar avatar-xl brround" src="/assets/img/profile.jpg"><span class="avatar-status profile-status bg-green"></span>
								</div>
								<div class="user-info px-2">
									<h4 class="fw-semibold mt-3 mb-0">{{ auth()->user()->username }}</h4>
								</div>
							</div>
						</div>
						<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
						<ul class="side-menu">
							<li class="side-item side-item-category">Main</li>
							<li class="slide">
								<a class="side-menu__item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
									<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg>
									<span class="side-menu__label">Dashboard</span>
								</a>
							</li>

							<li class="side-item side-item-category">General</li>
							@can('isAdmin')
							<li class="slide {{ request()->routeIs('bidang*', 'seksi*', 'kegiatan*', 'kegiatan-sub*', 'lama*', 'pangkat*', 'pegawai*', 'tanda-tangan*', 'alat-angkut*', 'jabatan*', 'bendahara*', 'ketentuan*', 'user*', 'golongan*', 'jenis-perdin*', 'wilayah*', 'kabupaten*', 'uang-harian*', 'uang-transport*', 'uang-penginapan*', 'golongan*', 'jenis-perdin*', 'wilayah*') ? 'is-expanded' : '' }}">
								<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
									<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z" opacity=".3"></path><path d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"></path></svg>
									<span class="side-menu__label">Master</span><i class="angle fe fe-chevron-down"></i>
								</a>
								<ul class="slide-menu">
									<li class="side-menu__label1"><a href="javascript:void(0);">Icons</a></li>
									<li><a class="slide-item {{ request()->routeIs('bidang.index') ? 'active' : '' }}" href="{{ route('bidang.index') }}">Bidang </a></li>
									<li><a class="slide-item {{ request()->routeIs('seksi.index') ? 'active' : '' }}" href="{{ route('seksi.index') }}">Seksi </a></li>
									<li><a class="slide-item {{ request()->routeIs('kegiatan.index') ? 'active' : '' }}" href="{{ route('kegiatan.index') }}">Kegiatan </a></li>
									<li><a class="slide-item {{ request()->routeIs('kegiatan-sub.index') ? 'active' : '' }}" href="{{ route('kegiatan-sub.index') }}">Sub Kegiatan </a></li>
									<li><a class="slide-item {{ request()->routeIs('lama.index') ? 'active' : '' }}" href="{{ route('lama.index') }}">Lama </a></li>
									<li><a class="slide-item {{ request()->routeIs('golongan.index') ? 'active' : '' }}" href="{{ route('golongan.index') }}">Golongan</a></li>
									<li><a class="slide-item {{ request()->routeIs('jenis-perdin.index') ? 'active' : '' }}" href="{{ route('jenis-perdin.index') }}">Jenis Perdin</a></li>
									<li><a class="slide-item {{ request()->routeIs('wilayah.index') ? 'active' : '' }}" href="{{ route('wilayah.index') }}">Wilayah</a></li>
									<li><a class="slide-item {{ request()->routeIs('kabupaten.index') ? 'active' : '' }}" href="{{ route('kabupaten.index') }}">Kota/Kabupaten</a></li>

									<li class="sub-slide {{ request()->routeIs('uang-harian*', 'uang-transport*', 'uang-penginapan*') ? 'is-expanded' : '' }}">
										<a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);">
											<span class="sub-side-menu__label">Setting Biaya</span><i class="sub-angle fe fe-chevron-down"></i>
										</a>
										<ul class="sub-slide-menu">
											<li><a class="sub-side-menu__item {{ request()->routeIs('uang-harian.index') ? 'active' : '' }}" href="{{ route('uang-harian.index') }}">Uang Harian</a></li>
											<li><a class="sub-side-menu__item {{ request()->routeIs('uang-transport.index') ? 'active' : '' }}" href="{{ route('uang-transport.index') }}">Uang Transport</a></li>
											<li><a class="sub-side-menu__item {{ request()->routeIs('uang-penginapan.index') ? 'active' : '' }}" href="{{ route('uang-penginapan.index') }}">Uang Penginapan</a></li>
										</ul>
									</li>

									<li><a class="slide-item {{ request()->routeIs('pegawai.index') ? 'active' : '' }}" href="{{ route('pegawai.index') }}">Pegawai </a></li>
									<li><a class="slide-item {{ request()->routeIs('pangkat.index') ? 'active' : '' }}" href="{{ route('pangkat.index') }}">Pangkat </a></li>
									<li><a class="slide-item {{ request()->routeIs('tanda-tangan.index') ? 'active' : '' }}" href="{{ route('tanda-tangan.index') }}">Tanda Tangan </a></li>
									<li><a class="slide-item {{ request()->routeIs('alat-angkut.index') ? 'active' : '' }}" href="{{ route('alat-angkut.index') }}">Alat Angkut </a></li>
									<li><a class="slide-item {{ request()->routeIs('jabatan.index') ? 'active' : '' }}" href="{{ route('jabatan.index') }}">Jabatan </a></li>
									<li><a class="slide-item {{ request()->routeIs('bendahara.index') ? 'active' : '' }}" href="{{ route('bendahara.index') }}">Bendahara </a></li>
									<li><a class="slide-item {{ request()->routeIs('ketentuan.index') ? 'active' : '' }}" href="{{ route('ketentuan.index') }}">Ketentuan </a></li>
									<li><a class="slide-item {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">User </a></li>
								</ul>
							</li>
							@endcan
							<li class="slide {{ request()->routeIs('data-perdin*', 'rekap-pegawai', 'rekap-bidang') ? 'is-expanded' : '' }}">
								<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
									<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>
									<span class="side-menu__label">Perdin</span>
									<i class="angle fe fe-chevron-down"></i>
								</a>
								<ul class="slide-menu">
									<li class="side-menu__label1"><a href="javascript:void(0);">Icons</a></li>
									@can('isOperator')
									<li><a class="slide-item {{ request()->routeIs('data-perdin.create') ? 'active' : '' }}" href="{{ route('data-perdin.create') }}">Input Perdin </a></li>
									@endcan
									<li class="sub-slide {{ request()->routeIs('data-perdin*') ? 'is-expanded' : '' }}">
										<a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);">
											<span class="sub-side-menu__label">Data Perdin</span>
											<i class="sub-angle fe fe-chevron-down"></i>
										</a>

										<ul class="sub-slide-menu">
											<li>
												<a class="sub-side-menu__item {{ request()->routeIs('data-perdin.index') && request('status') == 'baru' ? 'active' : '' }}" href="{{ route('data-perdin.index', 'baru') }}">Baru
													<span class="badge bg-success text-light" id="bg-side-text">{{ $totalBaru ?? 0 }}</span>
												</a>
											</li>
											<li>
												<a class="sub-side-menu__item {{ request()->routeIs('data-perdin.index') && request('status') == 'tolak' ? 'active' : '' }}" href="{{ route('data-perdin.index', 'tolak') }}">Ditolak
													<span class="badge bg-danger text-light" id="bg-side-text">{{ $totalDitolak ?? 0 }}</span>
												</a>
											</li>
											<li>
												<a class="sub-side-menu__item {{ request()->routeIs('data-perdin.index') && request('status') == 'no_laporan' ? 'active' : '' }}" href="{{ route('data-perdin.index', 'no_laporan') }}">Belum Ada Laporan
													<span class="badge bg-warning text-light" id="bg-side-text">{{ $totalNoLaporan ?? 0 }}</span>
												</a>
											</li>
											<li>
												<a class="sub-side-menu__item {{ request()->routeIs('data-perdin.index') && request('status') == 'belum_bayar' ? 'active' : '' }}" href="{{ route('data-perdin.index', 'belum_bayar') }}">Belum Administrasi
													<span class="badge bg-danger text-light" id="bg-side-text">{{ $totalBelumBayar ?? 0 }}</span>
												</a>
											</li>
											<li>
												<a class="sub-side-menu__item {{ request()->routeIs('data-perdin.index') && request('status') == 'sudah_bayar' ? 'active' : '' }}" href="{{ route('data-perdin.index', 'sudah_bayar') }}">Sudah Administrasi
													<span class="badge bg-success text-light" id="bg-side-text">{{ $totalSudahBayar ?? 0 }}</span>
												</a>
											</li>
										</ul>
									</li>
									@can('isAdmin')
									<li class="sub-slide {{ request()->routeIs('rekap-pegawai', 'rekap-bidang') ? 'is-expanded' : '' }}">
										<a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);">
											<span class="sub-side-menu__label">Rekap Data</span><i class="sub-angle fe fe-chevron-down"></i>
										</a>
										<ul class="sub-slide-menu">
											<li><a class="sub-side-menu__item {{ request()->routeIs('rekap-pegawai') ? 'active' : '' }}" href="{{ route('rekap-pegawai') }}">Rekap Pegawai</a></li>
											<li><a class="sub-side-menu__item {{ request()->routeIs('rekap-bidang') ? 'active' : '' }}" href="{{ route('rekap-bidang') }}">Rekap Bidang</a></li>
										</ul>
									</li>
									@endcan
								</ul>
							</li>
							<li class="slide {{ request()->routeIs('laporan-perdin*') ? 'is-expanded' : '' }}">
								<a class="side-menu__item {{ request()->routeIs('laporan-perdin.index') ? 'active' : '' }}" href="{{ route('laporan-perdin.index') }}">
									<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24" ><g><rect fill="none"/></g><g><g/><g>
										<path d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z"/>
										<path d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z" opacity=".3"/></g><g>
										<path d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z"/>
										<path d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z"/>
										<path d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z"/></g></g>
									</svg>
									<span class="side-menu__label">Arsip Laporan</span>
								</a>
							</li>
							<li class="slide {{ request()->routeIs('kwitansi-perdin*') ? 'is-expanded' : '' }}">
								<a class="side-menu__item {{ request()->routeIs('kwitansi-perdin.index') ? 'active' : '' }}" href="{{ route('kwitansi-perdin.index') }}">
									<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24" ><g><rect fill="none"/></g><g><g/><g>
										<path d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z"/>
										<path d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z" opacity=".3"/></g><g>
										<path d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z"/>
										<path d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z"/>
										<path d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z"/></g></g>
									</svg>
									<span class="side-menu__label">Laporan Bendahara</span>
								</a>
							</li>
							<li class="slide {{ request()->routeIs('ttd-visum.create') ? 'is-expanded' : '' }}">
								<a class="side-menu__item {{ request()->routeIs('ttd-visum.create') ? 'active' : '' }}" href="{{ route('ttd-visum.create') }}">
									<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" >
										<path d="M0 0h24v24H0V0z" fill="none"/>
										<path d="M10.9 19.91c.36.05.72.09 1.1.09 2.18 0 4.16-.88 5.61-2.3L14.89 13l-3.99 6.91zm-1.04-.21l2.71-4.7H4.59c.93 2.28 2.87 4.03 5.27 4.7zM8.54 12L5.7 7.09C4.64 8.45 4 10.15 4 12c0 .69.1 1.36.26 2h5.43l-1.15-2zm9.76 4.91C19.36 15.55 20 13.85 20 12c0-.69-.1-1.36-.26-2h-5.43l3.99 6.91zM13.73 9h5.68c-.93-2.28-2.88-4.04-5.28-4.7L11.42 9h2.31zm-3.46 0l2.83-4.92C12.74 4.03 12.37 4 12 4c-2.18 0-4.16.88-5.6 2.3L9.12 11l1.15-2z" opacity=".3"/>
										<path d="M12 22c5.52 0 10-4.48 10-10 0-4.75-3.31-8.72-7.75-9.74l-.08-.04-.01.02C13.46 2.09 12.74 2 12 2 6.48 2 2 6.48 2 12s4.48 10 10 10zm0-2c-.38 0-.74-.04-1.1-.09L14.89 13l2.72 4.7C16.16 19.12 14.18 20 12 20zm8-8c0 1.85-.64 3.55-1.7 4.91l-4-6.91h5.43c.17.64.27 1.31.27 2zm-.59-3h-7.99l2.71-4.7c2.4.66 4.35 2.42 5.28 4.7zM12 4c.37 0 .74.03 1.1.08L10.27 9l-1.15 2L6.4 6.3C7.84 4.88 9.82 4 12 4zm-8 8c0-1.85.64-3.55 1.7-4.91L8.54 12l1.15 2H4.26C4.1 13.36 4 12.69 4 12zm6.27 3h2.3l-2.71 4.7c-2.4-.67-4.35-2.42-5.28-4.7h5.69z"/>
									</svg>
									<span class="side-menu__label">TandaTangan Visum 2</span>
								</a>
							</li>
						</ul>
						<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
					</div>
				</aside>
			</div>
			<!-- main-sidebar -->
		</div>

		<!-- main-content -->
		<div class="main-content app-content">

			<!-- container -->
			<div class="main-container container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Halo {{ auth()->user()->username }}, Selamat Datang Kembali!</h2>
						<p class="mg-b-0">{{ auth()->user()->bidang->nama ?? 'Bidang belum ditentukan' }}</p>
					</div>
					<div class="main-dashboard-header-right">

					</div>
				</div>
				<!-- breadcrumb -->

				@yield('container')

			</div>
			<!-- /Container -->
		</div>
		<!-- /main-content -->

		<!-- Footer opened -->
		<div class="main-footer ht-45">
			<div class="container-fluid pd-t-0 ht-100p">
				<span> Copyright © 2023 <a href="/" class="text-primary">SPPD</a> Provinsi Banten All rights reserved.</span>
			</div>
		</div>
		<!-- Footer closed -->

	</div>
	<!-- End Page -->

	@yield('js')
</body>
</html>