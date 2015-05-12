<!DOCTYPE html>
<html lang="en">
<head>
<base href="{{ URL::to('/') }}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	
	<link rel="icon" href="/favicon.ico" type="image/png">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/photobooth.min.js"></script>
	<script src="js/jquery-custom.js"></script>
	
</head>
<body>

	<div class="container">
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="js/script.js"></script>
</body>
</html>
