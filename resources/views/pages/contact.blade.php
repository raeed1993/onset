@extends('layouts.app')

@section('content')
    <section class="page-banner contact-us">
        <div class="img-banner">
            <img src="./assets/images/bgServices.jpg" alt="">
        </div>
        <div class="container">
            <div class="page-title">
                <h4>تواصل معنا</h4>
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
                                placeholder="الاسم"
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
                                placeholder="البريد الالكتروني"
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
                                placeholder="رقم الهاتف"
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
                  placeholder="نص الرسالة"
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
                        <button type="submit" class="btn btn-primary">إرسال</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@push('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"
    ></script>
@endpush
