<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="HandheldFriendly" content="True">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('des')">

    @if(View::hasSection('can'))
        <link rel="canonical" href="@yield('can')">
    @endif

    @if(View::hasSection('yandex'))
        <meta name="yandex-verification" content="@yield('yandex')">
    @endif

    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('des')"/>
    <meta property="og:url" content="https://{{ $_SERVER['HTTP_HOST'] }}{{ $_SERVER['REQUEST_URI'] }}"/>
    @if(View::hasSection('img'))
        <meta property="og:image" content="@yield('img')"/>
    @else
        <meta property="og:image" content="/img/logo.svg"/>
    @endif
    <meta property="og:site_name" content="{{ $_SERVER['HTTP_HOST'] }}"/>
    <meta property="og:locale" content="ru_RU"/>
    <meta property="og:type" content="website">

    <!-- Styles -->
    <link href="{{ asset('css/app.css?v=7') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css?v=1') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar top-nav navbar-expand-md navbar-light bg-white">
        <div class="container nav-container">
            <div class="menu" onclick="showPanel(this)" data-target="side-panel">
                <img width="33px" height="33px" src="/img/menu_burger.svg" alt="">
                <div class="top-menu-text">Меню</div>
            </div>
            <div class="logo">
                <a href="/">
                    <svg width="97" height="23" viewBox="0 0 97 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.644 22.493C11.136 22.493 10.382 21.8453 10.382 20.55C10.382 20.1247 10.44 19.6413 10.556 19.1C10.6913 18.5393 10.875 17.824 11.107 16.954C11.3777 16.0453 11.5807 15.272 11.716 14.634C11.8513 13.996 11.919 13.4257 11.919 12.923C11.919 11.6083 11.339 10.951 10.179 10.951C9.86967 10.951 9.55067 10.9897 9.222 11.067L6.902 22H2.726L6.67 3.556L10.962 2.976L9.541 9.675H9.773C10.527 9.675 11.223 9.414 11.861 8.892C12.499 8.37 12.992 7.72233 13.34 6.949C13.7073 6.15633 13.891 5.383 13.891 4.629C13.891 3.73967 13.6203 3.01467 13.079 2.454C12.557 1.874 11.7643 1.584 10.701 1.584C9.135 1.584 7.76233 1.86433 6.583 2.425C5.40367 2.98567 4.48533 3.79767 3.828 4.861C3.19 5.92433 2.871 7.181 2.871 8.631C2.871 9.34633 2.93867 9.849 3.074 10.139C3.20933 10.4097 3.277 10.5643 3.277 10.603C2.233 10.603 1.45 10.3903 0.928 9.965C0.425333 9.52033 0.174 8.79533 0.174 7.79C0.174 6.55267 0.676667 5.354 1.682 4.194C2.70667 3.01467 4.01167 2.06733 5.597 1.352C7.18233 0.617332 8.76767 0.249998 10.353 0.249998C11.803 0.249998 13.021 0.462665 14.007 0.887999C14.993 1.31333 15.7277 1.88367 16.211 2.599C16.6943 3.295 16.936 4.05867 16.936 4.89C16.936 5.79867 16.6557 6.70733 16.095 7.616C15.5343 8.52467 14.7707 9.269 13.804 9.849C14.5387 10.0617 15.051 10.4193 15.341 10.922C15.6503 11.4053 15.805 12.0143 15.805 12.749C15.805 13.3097 15.7373 13.909 15.602 14.547C15.4667 15.1657 15.2733 15.939 15.022 16.867C14.8673 17.4663 14.7223 18.056 14.587 18.636C14.4517 19.216 14.384 19.6993 14.384 20.086C14.384 20.5307 14.4807 20.927 14.674 21.275C14.8867 21.623 15.167 21.8647 15.515 22C14.3357 22.3287 13.3787 22.493 12.644 22.493ZM22.956 22.522C21.1967 22.522 19.8627 22.0387 18.954 21.072C18.0647 20.1053 17.62 18.8873 17.62 17.418C17.62 16.374 17.8327 15.33 18.258 14.286C18.7027 13.2227 19.331 12.2947 20.143 11.502C20.955 10.7093 21.9023 10.1777 22.985 9.907C22.3857 9.48167 21.941 8.96933 21.651 8.37C21.361 7.75133 21.216 7.10367 21.216 6.427C21.216 5.42167 21.4867 4.43567 22.028 3.469C22.5887 2.50233 23.3523 1.71933 24.319 1.12C25.305 0.501332 26.3877 0.191999 27.567 0.191999C28.785 0.191999 29.7807 0.510999 30.554 1.149C31.3273 1.787 31.714 2.67633 31.714 3.817C31.714 4.66767 31.5013 5.383 31.076 5.963C30.6507 6.543 30.148 6.833 29.568 6.833C29.046 6.833 28.5917 6.572 28.205 6.05C28.553 5.934 28.8527 5.615 29.104 5.093C29.3553 4.571 29.481 4.049 29.481 3.527C29.481 2.96633 29.3263 2.56033 29.017 2.309C28.7077 2.03833 28.3307 1.903 27.886 1.903C27.3253 1.903 26.813 2.106 26.349 2.512C25.9043 2.89867 25.5563 3.411 25.305 4.049C25.0537 4.66767 24.928 5.31533 24.928 5.992C24.928 6.92 25.1697 7.74167 25.653 8.457C26.1363 9.153 26.871 9.62667 27.857 9.878C26.871 10.0907 25.9817 10.574 25.189 11.328C24.3963 12.082 23.7777 12.9617 23.333 13.967C22.8883 14.953 22.666 15.9003 22.666 16.809C22.666 17.679 22.8883 18.3847 23.333 18.926C23.797 19.4673 24.493 19.738 25.421 19.738C26.3877 19.738 27.393 19.477 28.437 18.955C29.5003 18.4137 30.2833 17.6887 30.786 16.78L31.453 17.07C30.699 18.7327 29.539 20.057 27.973 21.043C26.407 22.029 24.7347 22.522 22.956 22.522ZM40.0655 12.372L37.9195 2.193C36.5469 2.715 35.4835 3.527 34.7295 4.629C33.9755 5.71167 33.5985 7.04567 33.5985 8.631C33.5985 9.34633 33.6662 9.849 33.8015 10.139C33.9369 10.4097 34.0045 10.5643 34.0045 10.603C32.9605 10.603 32.1775 10.3903 31.6555 9.965C31.1529 9.52033 30.9015 8.79533 30.9015 7.79C30.9015 6.55267 31.4042 5.354 32.4095 4.194C33.4342 3.01467 34.7392 2.06733 36.3245 1.352C37.9099 0.617332 39.4952 0.249998 41.0805 0.249998C41.3512 0.249998 41.7379 0.269332 42.2405 0.307999L43.4875 6.34L46.8515 0.394998H48.8815L44.0095 8.834L46.7355 22H42.1245L40.5875 14.75L36.3825 22H34.6135L40.0655 12.372Z"
                            fill="#F74952"/>
                        <path
                            d="M55.8159 22.522C54.5979 22.522 53.5249 22.3093 52.5969 21.884C51.6689 21.4587 50.9536 20.869 50.4509 20.115C49.9483 19.3417 49.6969 18.4523 49.6969 17.447C49.6969 16.5963 49.8709 15.823 50.2189 15.127C50.5863 14.431 51.0696 13.88 51.6689 13.474C52.2876 13.068 52.9643 12.865 53.6989 12.865C54.3756 12.865 54.9459 13.039 55.4099 13.387C55.8739 13.7157 56.1639 14.1797 56.2799 14.779C55.2746 14.779 54.4723 15.0497 53.8729 15.591C53.2736 16.113 52.9739 16.8283 52.9739 17.737C52.9739 18.5683 53.2253 19.2353 53.7279 19.738C54.2306 20.2407 54.8976 20.492 55.7289 20.492C56.7536 20.492 57.5946 20.1537 58.2519 19.477C58.9286 18.781 59.2669 17.911 59.2669 16.867C59.2669 15.9583 59.0156 15.098 58.5129 14.286C58.0103 13.474 57.2563 12.488 56.2509 11.328C55.2069 10.1293 54.4143 9.10467 53.8729 8.254C53.3509 7.384 53.0899 6.43667 53.0899 5.412C53.0899 4.40667 53.3703 3.50767 53.9309 2.715C54.4916 1.903 55.2649 1.265 56.2509 0.801C57.2369 0.336999 58.3486 0.104998 59.5859 0.104998C61.1519 0.104998 62.3989 0.472332 63.3269 1.207C64.2743 1.94167 64.7479 2.92767 64.7479 4.165C64.7479 4.977 64.5449 5.63433 64.1389 6.137C63.7329 6.63967 63.2013 6.891 62.5439 6.891C61.8093 6.891 61.2196 6.59133 60.7749 5.992C61.1423 5.72133 61.4323 5.36367 61.6449 4.919C61.8576 4.47433 61.9639 4.01033 61.9639 3.527C61.9639 2.90833 61.7803 2.41533 61.4129 2.048C61.0456 1.68067 60.5429 1.497 59.9049 1.497C59.1316 1.497 58.4936 1.77733 57.9909 2.338C57.5076 2.87933 57.2659 3.57533 57.2659 4.426C57.2659 5.19933 57.4883 5.92433 57.9329 6.601C58.3776 7.25833 59.0736 8.109 60.0209 9.153C60.7943 9.98433 61.4129 10.6997 61.8769 11.299C62.3603 11.8983 62.7663 12.5943 63.0949 13.387C63.4429 14.1603 63.6169 15.0013 63.6169 15.91C63.6169 17.1473 63.2689 18.2687 62.5729 19.274C61.8963 20.2793 60.9586 21.072 59.7599 21.652C58.5806 22.232 57.2659 22.522 55.8159 22.522ZM70.789 22.522C69.0297 22.522 67.6957 22.0387 66.787 21.072C65.8977 20.1053 65.453 18.8873 65.453 17.418C65.453 16.374 65.6657 15.33 66.091 14.286C66.5357 13.2227 67.164 12.2947 67.976 11.502C68.788 10.7093 69.7353 10.1777 70.818 9.907C70.2187 9.48167 69.774 8.96933 69.484 8.37C69.194 7.75133 69.049 7.10367 69.049 6.427C69.049 5.42167 69.3197 4.43567 69.861 3.469C70.4217 2.50233 71.1853 1.71933 72.152 1.12C73.138 0.501332 74.2207 0.191999 75.4 0.191999C76.618 0.191999 77.6137 0.510999 78.387 1.149C79.1603 1.787 79.547 2.67633 79.547 3.817C79.547 4.66767 79.3343 5.383 78.909 5.963C78.4837 6.543 77.981 6.833 77.401 6.833C76.879 6.833 76.4247 6.572 76.038 6.05C76.386 5.934 76.6857 5.615 76.937 5.093C77.1883 4.571 77.314 4.049 77.314 3.527C77.314 2.96633 77.1593 2.56033 76.85 2.309C76.5407 2.03833 76.1637 1.903 75.719 1.903C75.1583 1.903 74.646 2.106 74.182 2.512C73.7373 2.89867 73.3893 3.411 73.138 4.049C72.8867 4.66767 72.761 5.31533 72.761 5.992C72.761 6.92 73.0027 7.74167 73.486 8.457C73.9693 9.153 74.704 9.62667 75.69 9.878C74.704 10.0907 73.8147 10.574 73.022 11.328C72.2293 12.082 71.6107 12.9617 71.166 13.967C70.7213 14.953 70.499 15.9003 70.499 16.809C70.499 17.679 70.7213 18.3847 71.166 18.926C71.63 19.4673 72.326 19.738 73.254 19.738C74.2207 19.738 75.226 19.477 76.27 18.955C77.3333 18.4137 78.1163 17.6887 78.619 16.78L79.286 17.07C78.532 18.7327 77.372 20.057 75.806 21.043C74.24 22.029 72.5677 22.522 70.789 22.522ZM87.8985 12.372L85.7525 2.193C84.3799 2.715 83.3165 3.527 82.5625 4.629C81.8085 5.71167 81.4315 7.04567 81.4315 8.631C81.4315 9.34633 81.4992 9.849 81.6345 10.139C81.7699 10.4097 81.8375 10.5643 81.8375 10.603C80.7935 10.603 80.0105 10.3903 79.4885 9.965C78.9859 9.52033 78.7345 8.79533 78.7345 7.79C78.7345 6.55267 79.2372 5.354 80.2425 4.194C81.2672 3.01467 82.5722 2.06733 84.1575 1.352C85.7429 0.617332 87.3282 0.249998 88.9135 0.249998C89.1842 0.249998 89.5709 0.269332 90.0735 0.307999L91.3205 6.34L94.6845 0.394998H96.7145L91.8425 8.834L94.5685 22H89.9575L88.4205 14.75L84.2155 22H82.4465L87.8985 12.372Z"
                            fill="black"/>
                    </svg>
                </a>
            </div>
            <div class="right-nav">
                <div class="filter-btn" onclick="showFilter()">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAB3ElEQVRoge3aL4iUQRzG8c+dniJy6UDw4BCDxWCxmATBAzGZbDabwWAxKFiNNptgsIjpkslwGuRsiogYDAZBEPyL4p81vPO6y553++6+M7vzynxh2bC/eeZ53t2dd37DSyFv1tHryGt90PjcUJBe2ysxZf763zmqIFM2XfD5LQqXEhtpQyNvT1RpH2MxqZ3JWFR56+HpdoX78CIUPsTe5NaaswcPVN5eYXnUgBW8DgPuY3dKdw1ZwJrK0xscbDrwEN6GgfewI4W7hszjTvDyDofHFTiC90HgltmsZHO4GTx8wNFJhY7hUxC6EcXaeFwPc3/F8bZiJ/EtCF5pKzYGV8Oc33E6lugZ/AjCl2KJbsOFMNdPnI0tfg6/8BvnY4tPe56kV8qUv/kkv10z+i9GXU3McHWMtr7L4H7V+o4rox3ExHsgGe7phnel+xuMyXaXPdgnbDSo35Bx37OkfzAwirou20503CDR2Kpn7xwlSG6UILlRguRGCZIbJUhulCC5UYLkRqogq4l0p8Yj/abpruqA4V9Eb6xis4CL+Kgy+gXXbD4hyT5IzTJu6xt+iVMDn3cmSM0JPNM3voYDOhgEduEyPqvM1++dC1KzoloABp8n6TSreG7ooZjC/8Yf4Su0xMabvSQAAAAASUVORK5CYII="/>
                </div>
                <div class="search header__search" itemscope itemtype="https://schema.org/WebSite">
                    <form action="/search" method="get" class="header__search-form"
                          itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
                        <meta itemprop="target" content="https://{{ $_SERVER['HTTP_HOST'] }}/search?q={query}"/>
                        <input type="text" autocomplete="off"
                               itemprop="query"
                               class="form-control form-control_size-l header__search-field"
                               name="q" value=""
                               placeholder="Введите имя или телефон">
                        <input type="hidden" name="lang" value="ru">
                    </form>

                    <div class="action-form-btn header__search-btn js-show-search">
                        <div class="show-form">
                            <img class="" width="33px" height="23px" src="/img/search.svg"
                                 onclick="showSearchForm(this)" alt="">
                        </div>
                        <div class="close-form">
                            <img class="" src="/img/close.svg" onclick="showSearchForm(this)" alt="">
                        </div>
                    </div>
                </div>
                <div class="cabinet-btn">

                    <a @auth
                           href="/cabinet"
                       @endauth
                       @guest
                           href="/login"
                        @endguest
                    >
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAADyklEQVRoge3ZTWhcVRQH8F/aIKJBKGjRJrFqG6M7EbsptQjipp8rEVEKbrUuXFh140Z0IwgKihUXggtJmrYqpO6k1KVfuJNCq+LXogaS1hT75bg49/VN0jczb968maTgHx5v5s27//s/955z7rl3htSDcezFTtyVvsOv+Amz+Ay/1dRfbRjFQVxCo8N1BdPYuCJKC7AHZ4W4C5jCk5jEzemaTM+m0juN1Gb3CuhdgufFiDZwGPeUaLMJR+Szsb9v6jpgTxJwBS9WaH+gqf3AZ2JU7jZVxGc4kDgWcEcNukrjQ7nb9IqjietgDVylMI7LIhjL+HwnbMZFkcFGa+DriP1ixKZq5DyUOJ+tSrCmi3d3pPunVTsrQMa1o+1bNeGkGK2JGjknE+ePNXK2xLnU2UiNnCOJ81xVgm5cqFG1kxL9/9srQRn8me4bqnZWgIzr96oE3RhwKt0fqtpZATKu01UJujFgNt33Vu2sABnXbNu3asKYWHQuiMKsV0wY8EIGH4hgPtIjz5DY4DTwfq+iusEGeTH3Ug88rySOedxeg66usFteDndrxBBebmq/s15p5bFfvqE5KgqzTpgQpUO2oXmub+pKYpeo5xsiGA/hKdwnVtgR3I+n028X5W6zYiO/HLfibeU29ZdE7V/rBmaoJp5RsdXchbstPVY5LfL853pYcf/HakUvLrQeW/CgCNaN6boJtyTuBZzHL/gZ3+JrfIfFHvqujC14Ez+IErhT4LYL6O/xGh7ot+hNeFXsmppF/I0vk0H7sE0E7zoMi0JxnZiVbXgG7+EbeUrNrlN4HXe20DCOGVEFnBWlzGQn4VtFvZItWA38gbfwCG4oOQBFuBGP4t3EmfFfFgvj1mXi51w7i3OiwLwG23Gi6cVFfITHsLYH0a2wBg/jY/zT1GcWn9nJxaxI12M4lp5NNxMN4x25b88JH72tD6JbYb2or5qPWbLisXm0x+Une4hR+EQ+jW+od/NeFcNiNloZMJ89eEE+ddsHKLAV1orEkB3lNITbjAnxX6RnM4SLZNP0xIAENmeVhfR5cwvhJ3FGcRBPEKfMDRwfoPiirHKmQPg+YdQmEcwLcoOvHrAdTw0eH5AB7bLKcuGl8FdqWGZTUgfaZZVFEbilka2WRL1yXSKbukHhsNZZpZILFU1pP3Gv7oN4QhheWAtl/xwek++k+o0xUQYsiMVoWvzr020aHSMsKRqRflxflTSwyJC2tVDziPTTgBMlDcjQqZRYKGq02tAu7c4XtlhlaJe1ZlZQV2m0ylpXa6HrAc0xuqQW+g/ECIvS39xxIAAAAABJRU5ErkJggg=="/>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div id="arrowTop" hidden></div>
    <div class="header-overlay"></div>
    <main class="py-4 container">
        @yield('content')
    </main>
</div>
<footer>
    <div class="container">
        <div class="social-items">
            <div class="social-item">
                <a href="https://t.me/indi_tut"><img width="22px" height="19px" src="/img/telegram.svg" alt=""></a>
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
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" defer></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(88595241, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/88595241" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script src="{{ asset('js/jquery-ui.js') }}" defer></script>
<script src="{{ asset('js/script.js?v=2') }}" defer></script>
@if(View::hasSection('lightbox'))
    <script src="@yield('lightbox')" defer></script>
@endif
@if(View::hasSection('maskedinput'))
    <script src="@yield('maskedinput')" defer></script>
@endif
</html>
