

    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <link rel="alternate" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}">

    @endforeach



    <meta property="og:site_name" content="{{ config('app.name', 'ONSET') }}">
    <meta property="og:url" content="{{request()->url()}}">
    <meta property="og:locale" content="{{app()->getLocale()}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:title" content="{{$page}}">
    <meta property="og:type" content="article">
    <meta name="twitter:title" content="{{$page}}">
    <!-- Search Engine Optimization by Rank Math - https://s.rankmath.com/home -->
        <title>{{ config('app.name', 'ONSET') }} - {{$page}}</title>
    <meta name="description"
          content="{{$desc}}">

    <link rel="canonical" href="{{request()->url()}}">
    <meta property="og:locale" content="{{app()->getLocale()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name', 'ONSET') }} - {{$page}}">
    <meta property="og:description"
          content="{{$desc}}">
    <meta property="og:url" content="{{request()->url()}}">
    <meta property="og:site_name" content="{{ config('app.name', 'ONSET') }}">
{{--    <meta property="og:updated_time" content="2022-03-09T13:23:24+03:00">--}}
{{--    <meta property="article:published_time" content="2021-10-27T02:13:12+03:00">--}}
{{--    <meta property="article:modified_time" content="2022-03-09T13:23:24+03:00">--}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name', 'ONSET') }} - {{$page}}">
    <meta name="twitter:description"
          content="{{$desc}}">
{{--    <meta name="twitter:label1" content="Written by">--}}
{{--    <meta name="twitter:data1" content="Asans">--}}
{{--    <meta name="twitter:label2" content="Time to read">--}}
{{--    <meta name="twitter:data2" content="Less than a minute">--}}

{{--    <meta name="generator" content="Mharty 6.4.3">--}}


{{--    <meta name="generator" content="Site Kit by Google 1.79.1">--}}


    <meta name="msapplication-TileImage"
          content="{{$image}}">


