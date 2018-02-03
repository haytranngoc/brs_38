<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                @lang('messages.book')
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}">@lang('messages.login')</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}">@lang('messages.register')</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            @if(Auth::check() && Auth::user()->isAdmin())
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('admin.') }}">@lang('messages.dashbroad')</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">@lang('messages.profile')</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    @lang('messages.logout')
                                </a>

                                {{ Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form']) }}
                                {{ Form::close() }}
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
