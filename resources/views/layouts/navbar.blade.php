<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @php
                $routes = request()->route()->uri();
            @endphp

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('diagnosa.index') }}" class="nav-link @if(\Illuminate\Support\Str::isMatch('/diagnosa/',$routes)) active fw-bold @endif">Diagnosa</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item">
                        <a href="{{ route('gejalas.index') }}" class="nav-link @if(\Illuminate\Support\Str::isMatch('/gejalas/',$routes)) active fw-bold @endif">Gejala</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('stuntings.index') }}" class="nav-link @if(\Illuminate\Support\Str::isMatch('/stuntings/',$routes)) active fw-bold @endif">Stunting</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bobots.index') }}" class="nav-link @if(\Illuminate\Support\Str::isMatch('/bobots/',$routes)) active fw-bold @endif">Probabilitas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
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
