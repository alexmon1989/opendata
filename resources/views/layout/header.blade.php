<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Відкриті дані ДСІВ</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ app('request')->segment(1) == '' ? 'active' : '' }}"><a href="{{ route('home') }}">Головна</a></li>
                <li class="{{ app('request')->segment(1) == 'search' ? 'active' : '' }}"><a href="{{ route('search') }}">Пошук</a></li>
                <li><a href="#about">Про сервіс</a></li>
                <li><a href="#contact">Контакти</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>