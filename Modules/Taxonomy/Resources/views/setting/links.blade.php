@extends('admin.layout.master')

@section('content')
    <form action="{{route('admin.website.links-update')}}" method="POST">
        @csrf

        @foreach($data as $item)

            @include('taxonomy::setting.partials.link',['link'=>$item->translate('en')->slug])
        @endforeach

        <button type="submit" class="btn btn-primary"> Save</button>

    </form>

@endsection
