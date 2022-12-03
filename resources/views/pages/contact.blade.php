@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>$page->primary_image,
                              'page'=>trans('pages.contact_us'),
                              'desc'=>$page->content,
                              'updated_time'=>$page->updated_at,
                              'published_time'=>$page->created_at])



    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endsection
@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner" >
            <img src="{{$page->primary_image}}"  alt="contact us">
        </div>
        <div class="container">
            <div class="page-title">
                <h1>
                    @lang('pages.contact_us')
                </h1>
            </div>
        </div>
    </section>

    <section class="contact-us-form section-padding">
        <div class="container">
            <form action="{{route('contact.store')}}" method="POST" id="contact-form">
                @csrf
                <input type="hidden" class="g-recaptcha" name="recaptcha_token" id="recaptcha_token">

                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="exampleFormControlInput1"
                                value="{{old('name')}}"
                                placeholder="@lang('form.full_name')"
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-4">
                            <input
                                type="email"
                                name="email"
                                value="{{old('email')}}"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder="@lang('form.email')"
                            />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-4">
                            <input
                                type="number"
                                name="phone_number"
                                class="form-control"
                                value="{{old('phone_number')}}"
                                id="exampleFormControlInput1"
                                placeholder="@lang('form.phone_number')"
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-4">
              <textarea
                  class="form-control"
                  name="content"
                  placeholder="@lang('form.message')"
                  id="exampleFormControlTextarea1"
                  rows="10"
              >{{old('content')}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-5">
{{--                        <button--}}
{{--                                class="btn btn-primary g-recaptcha"--}}
{{--                                data-sitekey="{{ config('services.recaptcha.site_key') }}"--}}
{{--                                data-callback='onSubmit'--}}
{{--                                data-action='submit'>--}}
{{--                            @lang('form.submit')--}}
{{--                        </button>--}}
                        <button type="submit" class="btn btn-primary g-recaptcha">
                            @lang('form.submit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@push('js')
    {{--    <script src="https://www.google.com/recaptcha/api.js"></script>--}}

    <script>
        grecaptcha.ready(function () {
            document.getElementById('contact-form').addEventListener("submit", function (event) {
                event.preventDefault();
                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'submit' })
                    .then(function (token) {
                        console.log(token)
                        document.getElementById("recaptcha_token").value = token;
                        document.getElementById('contact-form').submit();
                    });
            });
        });
        {{--function onClick(e) {--}}
        {{--    e.preventDefault();--}}
        {{--    grecaptcha.ready(function() {--}}
        {{--        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'submit'}).then(function(token) {--}}

        {{--        });--}}
        {{--    });--}}
        {{--}--}}
        // function onSubmit(token) {
        //     document.getElementById("contact-form").submit();
        // }
    </script>
@endpush
