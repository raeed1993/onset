@extends('layouts.app')
@section('meta')
    @include('partials.meta',['image'=>$page->primary_image,
                              'page'=>trans('pages.contact_us'),
                              'desc'=>$page->content,
                              'updated_time'=>$page->updated_at,
                              'published_time'=>$page->created_at])



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
            <form action="{{route('contact.store')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder=@lang('form.full_name')
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-4">
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder=@lang('form.email')
                            />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-4">
                            <input
                                type="number"
                                name="phone_number"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder=@lang('form.phone_number')
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-4">
              <textarea
                  class="form-control"
                  name="content"
                  id="exampleFormControlTextarea1"
                  rows="10"
              ></textarea>
                        </div>
                    </div>
                    <div class="col-12 captcha">
                        <div
                            class="g-recaptcha"
                            data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
                            data-callback="onRecaptchaSuccess"
                            data-expired-callback="onRecaptchaResponseExpiry"
                            data-error-callback="onRecaptchaError"
                        ></div>

                    </div>
                    <div class="col-12 text-center mt-5">
                        <button
                                class="btn btn-primaryg-recaptcha"
                                data-sitekey="reCAPTCHA_site_key"
                                data-callback='onSubmit'
                                data-action='submit'>
                            @lang('form.submit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

