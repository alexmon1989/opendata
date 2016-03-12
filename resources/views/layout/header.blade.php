<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{ url() }}">
            <img src="{{ url('assets/img/logo1-default.png') }}" alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Верхнее меню -->
                <li class="{{ app('request')->segment(1) == '' ? 'active' : '' }}"><a href="{{ route('home') }}">Головна</a></li>
                <li class="{{ app('request')->segment(1) == 'search' ? 'active' : '' }}"><a href="{{ route('search_default') }}">Пошук</a></li>
                <li><a href="#about">Про сервіс</a></li>
                <li><a href="#contact">Контакти</a></li>
                <!-- End Верхнее меню -->
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>