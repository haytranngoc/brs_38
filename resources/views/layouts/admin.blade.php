<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('messages.brs')</title>
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/sb-admin-2.css') }}
    {{ Html::style('css/metisMenu.css') }}
</head>
<body>
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')
    {{ Html::script('js/app.js') }}
    {{ Html::script('js/sb-admin-2.js') }}
    {{ Html::script('js/metisMenu.js') }}

</body>
</html>
