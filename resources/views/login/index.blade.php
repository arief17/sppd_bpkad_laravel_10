<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
	<meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="Keywords"
	content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

	<!-- Title -->
	<title>SPPD | {{ $title }}</title>

	<!-- Favicon -->
	<link rel="icon" href="/assets/img/logo-banten.png" type="image/x-icon" />

	<!-- Icons css -->
	<link href="/assets/css/icons.css" rel="stylesheet">

	<!-- Bootstrap css -->
	<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- style css -->
	<link href="/assets/css/style.css" rel="stylesheet">

	<!--- Animations css-->
	<link href="/assets/css/animate.css" rel="stylesheet">

</head>

<body class="ltr error-page1 main-body bg-light text-dark error-3">
	<!-- Loader -->
	<div id="global-loader">
		<img src="/assets/img/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- /Loader -->

	<!-- Page -->
	<div class="page">

		<div class="main-container container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="/assets/img/login.jpeg" class="my-auto wd-md-100p wd-xl-100p mx-auto" style="height: 100vh" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="main-signup-header">
											<h2>Login Aplikasi Surat Perintah Perjalanan Dinas (SPPD)</h2>
											<h5 class="fw-semibold mb-4">Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD)</h5>
											<hr>
											<form action="{{ route('login') }}" method="post">
												@csrf

												<div class="form-group">
													<label>Username</label>
													<input name="username" class="form-control" placeholder="Masukan Username" type="text" required>
												</div>
												<div class="form-group">
													<label for="password">Password</label>
													<div class="input-group mb-3">
														<input name="password" id="password" class="form-control" placeholder="Masukan Password" type="password" required>
														<span class="input-group-text" id="basic-addon1">
															<i class="fa fa-eye" id="togglePassword" style="cursor: pointer"></i>
														</span>
													</div>
												</div>
												<button class="btn btn-main-primary btn-block">
													Masuk
												</button>

											</form>
											<!-- Footer opened -->
											<div class="main-footer ht-45">
												<div class="container-fluid pd-t-0 ht-100p">
													<span> Copyright © 2024 <a href="/" class="text-primary">SPPD BPKAD PROVINSI BANTEN</a> All rights reserved.</span>
												</div>
											</div>
											<!-- Footer closed -->
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>

	</div>
	<!-- End Page -->

	<!-- JQuery min js -->
	<script src="/assets/plugins/jquery/jquery.min.js"></script>

	<script src="/assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>

	@if(session()->has('loginError'))
	<script>
		$(document).ready(function() {
			var Toast = Swal.mixin({
				toast: true,
				position: 'top',
				showConfirmButton: false,
				timer: 5000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			});

			Toast.fire({
				icon: 'error',
				title: '{{ session('loginError') }}',
				text: 'Username atau Password salah'
			});
		});
	</script>
	@endif

	<script>
		const togglePassword = document.querySelector("#togglePassword");
		const password = document.querySelector("#password");

		togglePassword.addEventListener("click", function () {
			const type = password.getAttribute("type") === "password" ? "text" : "password";
			password.setAttribute("type", type);

			this.classList.toggle('fa-eye');
			this.classList.toggle('fa-eye-slash');
		});
	</script>

	<!-- Bootstrap Bundle js -->
	<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
	<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Moment js -->
	<script src="/assets/plugins/moment/moment.js"></script>

	<!-- P-scroll js -->
	<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

	<!-- eva-icons js -->
	<script src="/assets/js/eva-icons.min.js"></script>

	<!-- Rating js-->
	<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>
	<script src="/assets/plugins/ratings-2/star-rating.js"></script>

	<!--themecolor js-->
	<script src="/assets/js/themecolor.js"></script>

	<!-- custom js -->
	<script src="/assets/js/custom.js"></script>
</body>
</html>