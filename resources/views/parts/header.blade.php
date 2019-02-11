<header class="header push-down-45">
    <div class="container">
        <div class="logo pull-left">
            <a href="{{ route('site.main.index') }}">
                <img src="assets/images/logo.png" alt="Logo" width="352" height="140">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#readable-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="collapse navbar-collapse" id="readable-navbar-collapse">
                <ul class="navigation">
                    {!! $mainMenu ?? '' !!}
                </ul>
            </div>
        </nav>
        <div class="hidden-xs hidden-sm">
            <a href="#" class="search__container  js--toggle-search-mode"> <span class="glyphicon  glyphicon-search"></span> </a>
        </div>
    </div>
</header>
