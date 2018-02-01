<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('messages.brs')</title>
    {{ Html::style('/css/app.css') }}
    {{ Html::style('/css/business-frontpage.css') }}
    
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    {{ Html::script('js/app.js') }}

</body>
</html>
