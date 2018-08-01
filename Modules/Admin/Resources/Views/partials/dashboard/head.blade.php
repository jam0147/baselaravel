    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ ucwords($html['titulo']) }}</title>
    <link rel="icon" href="{{asset('public/img/favicon/favicon.ico')}}" type="image/x-icon">
    @if (isset($html['css']))
    @foreach ($html['css'] as $css)
        <link rel="stylesheet" type="text/css" href="{{ url($css) }}?v={{ env('APP_VERSION') }}" />
    @endforeach
    @endif
    

    <meta name="theme-color" content="#ffffff">

    @stack('css')

    