<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title')</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<!-- Iconos -->
	<link rel="stylesheet" href="{{ asset('css/icon.css') }}">
	
	<!-- Otros estilos -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
	<!-- dOC estilos -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
	
    
	@yield('css')
</head>
<body>
	<div class="container background">
			<div class="row">
				<div class="col-md-12">
					@yield('content')	
				</div>
			</div>
	</div>
	<!--Jquery -->
	<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
	<!--bootstrap -->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	@yield('scripts')
</body>
</html>