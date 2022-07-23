@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>asset('images/logo-media.png'),'page'=>trans('pages.home'),'desc'=>$about->content,'updated_time'=>$about->updated_at,'published_time'=>$about->created_at])
@endsection
@section('content')

    @include('home.slider')
    @include('home.services')
    @include('home.projects')
    @include('home.clients')
    @include('home.blogs')
    @include('home.partners')
@endsection
