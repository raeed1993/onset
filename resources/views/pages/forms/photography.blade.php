@extends('layouts.app')

@section('content')
    <section class="page-banner photography">
        <div class="container">
            <div class="page-title">
                <h1 class="secondary">
                    @lang('form.request_photoshoot')
                </h1>
            </div>
        </div>
    </section>

    <section class="photography-form section-padding">
        <div class="container">
            <form class="row" method="post" action="{{route('order.store')}}" id="photography-form">
                @csrf
                <input type="hidden" name="type" value="photography_show">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">
                            @lang('form.full_name')
                        </label>
                        <input
                            type="text"
                            name="full_name"
                            class="form-control"
                            id="full_name"

                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">
                            @lang('form.phone_number')
                        </label>
                        <input
                            type="text"
                            name="phone_number"
                            class="form-control"
                            id="phone_number"
                            value="{{old('phone_number')}}"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            @lang('form.email')
                        </label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            id="email"
                            value="{{old('email')}}"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="project_name" class="form-label">
                            @lang('form.project_name_company')
                        </label>
                        <input
                            type="text"
                            name="project_name"
                            class="form-control"
                            id="project_name"
                            value="{{old('project_name')}}"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            @lang('form.project_type_active_company')
                        </label>

                        <select class="form-select" name="type_project">
                            <option value="company">
                                @lang('form.company')
                            </option>
                            <option value="activity">
                                @lang('form.activity')
                            </option>
                            <option value="product">
                                @lang('form.product')
                            </option>
                            <option value="personal">
                                @lang('form.personal')
                            </option>
                            <option value="other">
                                @lang('form.other')
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="purpose_photography_video" class="form-label">
                            @lang('form.purpose_photography_video')
                        </label>
                        <input
                            type="text"
                            name="purpose_photography_video"
                            class="form-control"
                            id="purpose_photography_video"
                            value="{{old('purpose_photography_video')}}"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="type_services" class="form-label">
                            @lang('form.service_type')
                        </label>
                        <select class="form-select" aria-label="Default select example" name="type_services">
                            <option value="photo">
                                @lang('form.photo')
                            </option>
                            <option value="video">
                                @lang('form.video')
                            </option>
                            <option value="dron">
                                @lang('form.drone')
                            </option>
                            <option value="live">
                                @lang('form.live')
                            </option>
                            <option value="video_editor">
                                @lang('form.video_editor')
                            </option>
                            <option value="photography_editor">
                                @lang('form.photography_editor')
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="number_shooting_days" class="form-label">
                            @lang('form.number_shooting_days')
                        </label>
                        <input
                            type="text"
                            name="number_shooting_days"
                            class="form-control"
                            id="number_shooting_days"
                            value="{{old('number_shooting_days')}}"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="camera_count" class="form-label">
                            @lang('form.camera_count')
                        </label>
                        <input
                            type="text"
                            name="camera_count"
                            class="form-control"
                            id="camera_count"
                            value="{{old('camera_count')}}"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="video_duration" class="form-label">
                            @lang('form.video_duration')
                        </label>
                        <input
                            type="text"
                            name="video_duration"
                            class="form-control"
                            id="video_duration"
                            value="{{old('video_duration')}}"
                        />
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <label class="form-label">
                            @lang('form.aerial_photography')
                        </label>
                        <div class="btn-radio-group">
                            <div class="btn-radio">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="aerial_photography"
                                    value="1"
                                    id="option2"
                                    autocomplete="off"

                                />
                                <label class="btn btn-secondary" for="option2">
                                    @lang('form.yes')
                                </label>
                            </div>
                            <div class="btn-radio">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="aerial_photography"
                                    value="0"
                                    id="option4"
                                    autocomplete="off"
                                />
                                <label class="btn btn-secondary" for="option4">
                                    @lang('form.no')
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <label class="form-label">
                            @lang('form.include_grafic_video')
                        </label>
                        <div class="btn-radio-group">
                            <div class="btn-radio">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="include_grafic_video"
                                    value="1"
                                    id="option21"
                                    autocomplete="off"
                                />
                                <label class="btn btn-secondary" for="option21">@lang('form.yes')</label>
                            </div>
                            <div class="btn-radio">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    value="0"
                                    name="include_grafic_video"
                                    id="option41"
                                    autocomplete="off"
                                />
                                <label class="btn btn-secondary" for="option41"> @lang('form.no')</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <label class="form-label">
                            @lang('form.include_voice_comment')
                        </label>
                        <div class="btn-radio-group">
                            <div class="btn-radio">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="include_voice_comment"
                                    value="1"
                                    id="o22"
                                    autocomplete="off"
                                />
                                <label class="btn btn-secondary" for="o22">   @lang('form.yes')</label>
                            </div>
                            <div class="btn-radio">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="include_voice_comment"
                                    value="0"
                                    id="o33"
                                    autocomplete="off"
                                />
                                <label class="btn btn-secondary" for="o33"> @lang('form.no')</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="link_like_video" class="form-label">
                            @lang('form.link_like_video')
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="link_like_video"
                            name="link_like_video"
                            value="{{old('link_like_video')}}"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="note" class="form-label">
                            @lang('form.additional_note')
                        </label>
                        <textarea
                            name="note"
                            class="form-control"
                            id="note"
                            rows="3"
                        >{{old('note')}}</textarea>
                    </div>
                </div>

                <div class="col-12 text-center mt-5">
                    <button class="btn btn-secondary g-recaptcha"
                            data-sitekey="6LfxxT0hAAAAANqQO8rsiE9vZMclDrMXMqkTMwy3"
                            data-callback='onSubmit'
                            data-action='submit'>
                        @lang('form.submit')
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfxxT0hAAAAANqQO8rsiE9vZMclDrMXMqkTMwy3"></script>
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LfxxT0hAAAAANqQO8rsiE9vZMclDrMXMqkTMwy3', {action: 'submit'}).then(function(token) {

                });
            });
        }
        function onSubmit(token) {
            document.getElementById("photography-form").submit();
        }
    </script>
@endpush
