<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('des')">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar top-nav navbar-expand-md navbar-light bg-white">
        <div class="container">
            <div class="menu" onclick="showPanel(this)" data-target="side-panel">
                <img src="/img/menu_burger.svg" alt="">
                <div class="top-menu-text">Меню</div>
            </div>
            <div class="logo">
                <img src="https://static.insales-cdn.com/files/1/6700/16398892/original/logo-stories.svg"
                     alt="Мой интернет-магазин" title="Мой интернет-магазин">
            </div>
            <div class="right-nav">
                <div class="search header__search">
                    <form action="/search" method="get" class="header__search-form">
                        <input type="text" autocomplete="off"
                               class="form-control form-control_size-l header__search-field" name="q" value=""
                               placeholder="Поиск">
                        <input type="hidden" name="lang" value="ru">
                    </form>
                    <div class="action-form-btn header__search-btn js-show-search">
                        <div class="show-form">
                            <img class="" src="/img/search.svg" onclick="showSearchForm(this)" alt="">
                        </div>
                        <div class="close-form">
                            <img class="" src="/img/close.svg" onclick="showSearchForm(this)" alt="">
                        </div>
                    </div>
                </div>
                <div class="favorite">
                    <img src="/img/heart.svg" alt="">
                </div>
            </div>
        </div>
    </nav>
    <div class="header-overlay"></div>
    <main class="py-4 container">
        @yield('content')
    </main>
</div>
<footer>
    <div class="container">
        <div class="social-items">
            <div class="social-item">
                <a href=""><img src="/img/telegram.svg" alt=""></a>
            </div>
        </div>
    </div>

</footer>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">

    </ul>

</div>
</body>
</html>
