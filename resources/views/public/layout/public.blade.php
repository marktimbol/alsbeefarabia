<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="google-site-verification" content="5Asi2M7HHz9urL_aoP9B4FT2tHRALO7-qKUe5WMI1qA" />
		<title>@yield('pageTitle') | Al's Beef Arabia</title>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<link href="{{ elixir('css/public.css') }}" rel="stylesheet">
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
		@yield('header_styles')

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>
	
	<body class="@yield('bodyClass')">

		@include('public.partials._header')

		<div class="container">
			<div class="row">
				<div class="col-md-2 col-xs-12">
					<div class="logo">
						<h1>
							<a href="{{ route('home') }}">
								<img src="{{ asset('images/logo.png') }}" width="165" height="115" alt="Al's Beef Arabia" title="Al's Beef Arabia" />
							</a>
						</h1>			
					</div>	
					@include('public.partials._menu')
				</div>

				<div class="col-md-10 col-xs-12">
					<div class="als-main-content">
						@yield('content')
					</div>
				</div>
			</div>
		</div>

		<footer></footer>
						
		<script src="{{ elixir('js/public.js') }}"></script>

		@yield('footer_scripts')

		@include('flash')

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-69275004-1', 'auto');
		  ga('send', 'pageview');

		</script>		

	</body>
</html>		