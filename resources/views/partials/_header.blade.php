<head>

    <title>TENDO - @yield('title')</title>

    
</head>

<body>
    <div
        class="nav">


        <h1 class="tendo-logo-new">TENDO</h1>

        @if (Route::has('login'))
            <div class="nav-login">
                @auth

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}"
                        class="header-link"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            LOG OUT
                        </a>

                    </form>
                @else
                    <a href="{{ route('login') }}" class="header-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="header-link">Register</a>
                    @endif
                @endauth
            </div>
        @endif


    </div>


</body>
