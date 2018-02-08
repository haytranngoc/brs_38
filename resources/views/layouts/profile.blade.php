<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('messages.brs')</title>
    {{ Html::style('/css/app.css') }}
    {{ Html::style('/css/business-frontpage.css') }}
    {{ Html::style('/css/style.css') }}
    
</head>
<body>
    @include('layouts.header')
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>@lang('messages.profile')</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="{{ route('users.show', $user->id) }}">@lang('messages.book')</a>
                </li>
                <li class="active">
                    <a href="{{ route('users.suggests', $user->id) }}">@lang('messages.suggests')</a>
                </li>
                <li class="active">
                    <a href="{{ route('users.borrowed', $user->id) }}">@lang('messages.borrowed')</a>
                </li>
            </ul>
        </nav>
        @yield('content')
    </div>
    {{ Html::script('js/app.js') }}

</body>
</html>
