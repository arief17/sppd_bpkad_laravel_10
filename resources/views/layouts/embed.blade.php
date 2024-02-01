<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
<body>
	<!-- Loader -->
	<div id="global-loader">
		<img src="/assets/img/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- /Loader -->
	
	@yield('container')
	
	@yield('js')
</body>
</html>