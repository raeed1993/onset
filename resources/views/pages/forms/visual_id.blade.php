@extends('layouts.app')

@section('content')
    <section class="page-banner">
        <div class="container">
            <div class="page-title">
                <h1 class="secondary">
                    @lang('form.visual_identity_request')
                </h1>
            </div>
        </div>
    </section>

    <section class="form-visual section-padding">
        <div class="container">
            <form class="row" method="post" action="{{route('order.store')}}">
                @csrf
                <input type="hidden" name="type" value="visual_identity">
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
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="project_name" class="form-label">
                            @lang('form.project_name')
                        </label>
                        <input
                            type="text"
                            name="project_name"
                            class="form-control"
                            id="project_name"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            @lang('form.project_type_active')
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
                        <label for="exampleFormControlInput1" class="form-label">
                           @lang('from.target_segment')
                        </label>
                        <select class="form-select" aria-label="Default select example" name="target_segment">
                            <option value="childs">
                                @lang('form.childes')
                            </option>
                            <option value="women">
                                @lang('form.women')
                            </option>
                            <option value="men">
                                @lang('form.men')
                            </option>
                            <option value="young">
                                @lang('form.young')
                            </option>
                            <option value="all">
                                @lang('form.all_prev')
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="feature_project" class="form-label">
                            @lang('form.competitive_advantage_the_project')
                        </label>
                        <input
                            type="text"
                            name="feature_project"
                            class="form-control"
                            id="feature_project"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="services_products_project" class="form-label">
                            @lang('form.most_important_services_products_provided_project')
                        </label>
                        <input
                            type="text"
                            name="services_products_project"
                            class="form-control"
                            id="services_products_project"
                        />
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label mb-3">
                        @lang('form.logo_type')
                    </label>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-img">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="type_logo"
                                value="calligraphy"
                                id="calligraphy"
                            />
                            <label class="form-check-label" for="calligraphy">
                                <img src="{{asset('images/logos-arabic-text.jpg')}}" alt="logos-arabic-text"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-img">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="type_logo"
                                value="character"
                                id="character"
                            />
                            <label class="form-check-label" for="character">
                                <img src="{{asset('images/logos-character.jpg')}}" alt="logos-character"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-img">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="type_logo"
                                value="combination"
                                id="combination"
                            />
                            <label class="form-check-label" for="combination">
                                <img src="{{asset('images/logos-combination.jpg')}}" alt="logos-combination"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-img">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="type_logo"
                                value="letter"
                                id="letter"
                            />
                            <label class="form-check-label" for="letter">
                                <img src="{{asset('images/logos-latter.jpg')}}" alt="logos-latter"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-img">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="type_logo"
                                value="symbol"
                                id="symbol"
                            />
                            <label class="form-check-label" for="symbol">
                                <img src="{{asset('images/logos-symbol.jpg')}}" alt="logos-symbol"/>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="form-img">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="type_logo"
                                value="typeface"
                                id="typeface"
                            />
                            <label class="form-check-label" for="typeface">
                                <img src="{{asset('images/logos-text.jpg')}}" alt="logos-text"/>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <div class="mb-3">
                        <label for="logo_prefer" class="form-label">
                            @lang('form.looking_at_other_logos_which_logos_are_better')
                        </label>
                        <input
                            type="text"
                            name="logo_prefer"
                            class="form-control"
                            id="logo_prefer"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="about_project" class="form-label">
                            @lang('form.about_project')
                        </label>
                        <textarea
                            class="form-control"
                            id="about_project"
                            name="about_project"
                            rows="3"
                        ></textarea>
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
                        ></textarea>
                    </div>
                </div>

                <div class="col-12 text-center mt-5">
                    <button type="submit" class="btn btn-secondary">
                        @lang('form.submit')
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
