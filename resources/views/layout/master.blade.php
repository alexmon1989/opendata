<!DOCTYPE html>
<!--[if IE 8]> <html lang="uk" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="uk" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="uk"> <!--<![endif]-->
<head>
	<title>Відкриті дані</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

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
        @include('layout.header')
		<!--=== End Header ===-->

		@yield('breadcrumbs')

		<!--=== Content ===-->
		<div class="container content height-500">

			@yield('content', 'Информація відсутня')

		</div>
		<!--=== End Content ===-->

		<!--=== Footer Version 1 ===-->
		<div class="footer-v1">
			<div class="footer">
				<div class="container">
					<div class="row">
						<!-- About -->
						<div class="col-md-4 md-margin-bottom-40">
							<a href="index.html"><img id="logo-footer" class="footer-logo" src="assets/img/logo2-default.png" alt=""></a>
							<p>About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.</p>
							<p>Duis eleifend fermentum ante ut aliquam. Cras mi risus, dignissim sed adipiscing ut, placerat non arcu.</p>
						</div><!--/col-md-3-->
						<!-- End About -->

						<!-- Link List -->
						<div class="col-md-4 md-margin-bottom-40">
							<div class="headline"><h2>Посилання</h2></div>
							<ul class="list-unstyled link-list">
								<li><a href="#">About us</a><i class="fa fa-angle-right"></i></li>
								<li><a href="#">Portfolio</a><i class="fa fa-angle-right"></i></li>
								<li><a href="#">Latest jobs</a><i class="fa fa-angle-right"></i></li>
								<li><a href="#">Community</a><i class="fa fa-angle-right"></i></li>
								<li><a href="#">Contact us</a><i class="fa fa-angle-right"></i></li>
							</ul>
						</div><!--/col-md-3-->
						<!-- End Link List -->

						<!-- Address -->
						<div class="col-md-4 map-img md-margin-bottom-40">
							<div class="headline"><h2>Зв'яжіться з нами</h2></div>
							<address class="md-margin-bottom-40">
								25, Lorem Lis Street, Orange <br />
								California, US <br />
								Phone: 800 123 3456 <br />
								Fax: 800 123 3456 <br />
								Email: <a href="mailto:info@anybiz.com" class="">info@anybiz.com</a>
							</address>
						</div><!--/col-md-3-->
						<!-- End Address -->
					</div>
				</div>
			</div><!--/footer-->

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p>
								{{ date('Y') }} &copy; Всі права захищено.
							</p>
						</div>

						<!-- Social Links -->
						<div class="col-md-6">
							<ul class="footer-socials list-inline">
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
										<i class="fa fa-skype"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
										<i class="fa fa-google-plus"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
										<i class="fa fa-linkedin"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
										<i class="fa fa-pinterest"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
										<i class="fa fa-dribbble"></i>
									</a>
								</li>
							</ul>
						</div>
						<!-- End Social Links -->
					</div>
				</div>
			</div><!--/copyright-->
		</div>
		<!--=== End Footer Version 1 ===-->
	</div>

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/plugins/jquery/jquery-migrate.min.js') }}"></script>
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

	@yield('scripts')
</body>
</html>