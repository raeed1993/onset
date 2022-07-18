@extends('layouts.app')

@section('content')
    <section class="page-banner">
        <div class="container">
            <div class="page-title">
                <h4>طلب الهوية البصرية</h4>
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
                            الاسم الكامل
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
                        <label for="phone_number" class="form-label">رقم الهاتف</label>
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
                        <label for="email" class="form-label">البريد الالكتروني</label>
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
                        <label for="project_name" class="form-label">اسم المشروع</label>
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
                        <label for="exampleFormControlInput1" class="form-label">نوع نشاط المشروع</label>

                        <select class="form-select" name="type_project">
                            <option value="company">
                                شركة / مؤسسة
                            </option>
                            <option value="activity">
                                فعالية / حملة
                            </option>
                            <option value="product">
                                منتج
                            </option>
                            <option value="personal">
                                شخصي
                            </option>
                            <option value="other">
                                غير ذلك
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            الشريحة المستهدفة
                        </label>
                        <select class="form-select" aria-label="Default select example" name="target_segment">
                            <option value="childs">
                                أطفال
                            </option>
                            <option value="women">
                                نساء
                            </option>
                            <option value="men">
                                رجال
                            </option>
                            <option value="young">
                                شباب
                            </option>
                            <option value="all">
                                كل ماسبق
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="feature_project" class="form-label"
                        >الميزة التنافسية للمشروع</label
                        >
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
                        <label for="services_products_project" class="form-label"
                        >أهم الخدمات أو المنتجات التي يقدمها المشروع</label
                        >
                        <input
                            type="text"
                            name="services_products_project"
                            class="form-control"
                            id="services_products_project"
                        />
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label mb-3">نوع الشعار</label>
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
                                <img src="{{asset('images/logos-arabic-text.jpg')}}" alt=""/>
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
                                <img src="{{asset('images/logos-character.jpg')}}" alt=""/>
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
                                <img src="{{asset('images/logos-combination.jpg')}}" alt=""/>
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
                                <img src="{{asset('images/logos-latter.jpg')}}" alt=""/>
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
                                <img src="{{asset('images/logos-symbol.jpg')}}" alt=""/>
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
                                <img src="{{asset('images/logos-text.jpg')}}" alt=""/>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <div class="mb-3">
                        <label for="logo_prefer" class="form-label"
                        >بالنظر إلى شعارات اخرى, أي الشعارات أفضل</label
                        >
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
                        <label for="about_project" class="form-label"
                        >نبذة عن المشروع</label
                        >
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
                        <label for="note" class="form-label"
                        >ملاحظات اضافية</label
                        >
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
                        ارسال النموذج
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
