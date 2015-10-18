<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('pageTitle') | Dashboard</title>

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">

		@yield('header_styles')

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>
	<body>

		<div id="wrapper">

			@include('admin.partials._menu')

		    <div id="page-wrapper">

		        <div class="container-fluid">

		        	@yield('content')

		        </div>
		    </div>
		</div>
						
		<script src="{{ elixir('js/admin.js') }}"></script>

		@yield('footer_scripts')

		@include('flash')

	</body>
</html>		