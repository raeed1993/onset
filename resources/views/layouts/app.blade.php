<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ str_replace('_', '-', app()->getLocale())=='ar'?'rtl':'ltr'}}">
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">




    @yield('meta')
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <!-- Styles -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    @if (config('app.env')==='production')
        @include('partials.header',['url'=>str_replace('http','https',request()->url())])
    @else
        @include('partials.header',['url'=>str_replace('http','http',request()->url())])
    @endif
        @include('admin.partials.notification.error')
        @include('admin.partials.notification.success')
    @yield('content')
    @include('partials.footer')
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LfxxT0hAAAAANqQO8rsiE9vZMclDrMXMqkTMwy3"></script>
<script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfxxT0hAAAAANqQO8rsiE9vZMclDrMXMqkTMwy3', {action: 'submit'}).then(function(token) {
               console.log('dasdadadadadasdasd')
            });
        });
    }
</script>
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('js')
</body>
</html>
