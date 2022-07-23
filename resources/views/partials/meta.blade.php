@foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <link rel="alternate" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
          hreflang="{{ $localeCode }}">

@endforeach
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<meta property="og:site_name" content="{{ config('app.name', 'ONSET') }}">
<meta property="og:url" content="{{request()->url()}}">
<meta property="og:locale" content="{{app()->getLocale()}}">
<meta name="twitter:card" content="summary_large_image">
<meta property="og:title" content="{{$page}}">
<meta property="og:type" content="article">
<meta name="twitter:title" content="{{$page}}">

<title>{{ config('app.name', 'ONSET') }} - {{$page}}</title>
<meta name="description" content="{{$desc}}">
<meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
<link rel="canonical" href="{{request()->url()}}">
<meta property="og:locale" content="{{app()->getLocale()}}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{ config('app.name', 'ONSET') }} - {{$page}}">
<meta property="og:description" content="{{$desc}}">
<meta property="og:url" content="{{request()->url()}}">
<meta property="og:site_name" content="{{ config('app.name', 'ONSET') }}">
<meta property="og:updated_time" content="{{$updated_time}}">
<meta property="og:image" content="{{$image}}">
<meta property="og:image:secure_url" content="{{$image}}">
<meta property="og:image:width" content="706">
<meta property="og:image:height" content="689">
<meta property="og:image:alt" content="{{$page}}">
<meta property="og:image:type" content="image/jpeg">

<meta property="article:published_time" content="{{$published_time}}">
<meta property="article:modified_time" content="{{$updated_time}}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ config('app.name', 'ONSET') }} - {{$page}}">
<meta name="twitter:description" content="{{$desc}}">
<meta name="twitter:image" content="{{$image}}">
    <meta name="twitter:label1" content="Written by">
    <meta name="twitter:data1" content="ONSET">
<meta name="twitter:label2" content="Time to read">
<meta name="twitter:data2" content="Less than a minute">



<meta name="msapplication-TileImage"
      content="{{$image}}">


<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="{{asset('images/s2.png')}}" sizes="192x192">
<!-- Scripts -->

