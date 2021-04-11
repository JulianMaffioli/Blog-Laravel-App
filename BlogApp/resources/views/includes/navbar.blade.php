<nav class="navbar navbar-inverse navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @else
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @endguest

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                {{-- Index --}}
                <li class="nav-item">
                    @guest
                        <a class="nav-link " aria-current="page" href="/">Home</a>
                    @else
                        <a class="nav-link " aria-current="page" href="/home">Home</a>
                    @endguest
                </li>

                {{-- About --}}
                <li class="nav-item">
                    <a class="nav-link" href="/about">About Us</a>
                </li>

                {{-- Services --}}
                <li class="nav-item">
                    <a class="nav-link" href="/services">Services</a>
                </li>

                {{-- Posts --}}
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Blog</a>
                </li>

            </ul>
        </div>

        <div class="d-flex">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->.
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <a class="nav-link " href="/posts/create">Create Post</a>

                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
