<!DOCTYPE html>
<!--[if IE 8]> <html lang="uk" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="uk" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="uk"> <!--<![endif]-->
<head>
	<title>@yield('page_title', 'Головна (пошук)') - Набори відкритих даних</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="{{ url('assets/css/headers/header-default.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/footers/footer-v1.css') }}">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="{{ url('assets/plugins/animate.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/line-icons/line-icons.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css') }}">
	<!--[if lt IE 9]><link rel="stylesheet" href="{{ url('assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css') }}"><![endif]-->

	<!-- CSS Theme -->
	<link rel="stylesheet" href="{{ url('assets/css/theme-colors/blue.css') }}" id="style_color">

	@yield('styles')

	<!-- CSS Customization -->
	<link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">
</head>

<body>

	<div class="wrapper">
		<!--=== Header ===-->
        @include('layout._partials.header')
		<!--=== End Header ===-->

		@yield('breadcrumbs')

		<!--=== Content ===-->
		<div class="container content height-600">

			@yield('content', 'Информація відсутня')

		</div>
		<!--=== End Content ===-->

		<!--=== Footer Version 1 ===-->
		@include('layout._partials.footer')
		<!--=== End Footer Version 1 ===-->
	</div>

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="{{ url('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="{{ url('assets/plugins/back-to-top.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/plugins/smoothScroll.js') }}"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="{{ url('assets/js/custom.js') }}"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="{{ url('assets/js/app.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/plugins/style-switcher.js') }}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
		});
	</script>
    <!--[if lt IE 9]>
	<script src="{{ url('assets/plugins/respond.js') }}"></script>
	<script src="{{ url('assets/plugins/html5shiv.js') }}"></script>
	<script src="{{ url('assets/plugins/placeholder-IE-fixes.js') }}"></script>
	<![endif]-->

	<script type="text/javascript" src="{{ url('assets/js/custom.js') }}"></script>

	@yield('scripts')
</body>
</html>