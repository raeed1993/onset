@extends('layouts.app')

@section('content')
    <section class="page-banner photography">
        <div class="container">
            <div class="page-title">
                <h4>طلب عرض التصوير</h4>
            </div>
        </div>
    </section>

    <section class="photography-form section-padding">
        <div class="container">
            <form class="row" method="post" action="{{route('order.store')}}">
                @csrf
                <input type="hidden" name="type" value="photography_show">
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
                        <label for="project_name" class="form-label">
                            اسم المشروع - الشركة
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
                            نوع نشاط المشروع - الشركة
                        </label>

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
                        <label for="purpose_photography_video" class="form-label">الغرض من التصوير والفيديو</label>
                        <input
                            type="text"
                            name="purpose_photography_video"
                            class="form-control"
                            id="purpose_photography_video"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="type_services" class="form-label"
                        >نوع الخدمة</label
                        >
                        <select class="form-select" aria-label="Default select example" name="type_services">
                            <option value="photo">
                                تصوير فوتو
                            </option>
                            <option value="video">
                                تصوير فيديو
                            </option>
                            <option value="dron">
                                تصوير درون
                            </option>
                            <option value="live">
                                بث مباشر
                            </option>
                            <option value="video_editor">
                                مونتاج الفيديو
                            </option>
                            <option value="photography_editor">
                                التصوير والمونتاج
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="number_shooting_days" class="form-label"
                        >عدد أيام التصوير</label
                        >
                        <input
                            type="text"
                            name="number_shooting_days"
                            class="form-control"
                            id="number_shooting_days"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="camera_count" class="form-label"
                        >عدد الكاميرات</label
                        >
                        <input
                            type="text"
                            name="camera_count"
                            class="form-control"
                            id="camera_count"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="video_duration" class="form-label"
                        >مدة الفيديو</label
                        >
                        <input
                            type="text"
                            name="video_duration"
                            class="form-control"
                            id="video_duration"
                        />
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <label class="form-label">تصوير جوّي</label>
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
                                <label class="btn btn-secondary" for="option2">نعم</label>
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
                                <label class="btn btn-secondary" for="option4">لا</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <label class="form-label">يتضمن الفيديو جرافيك</label>
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
                                <label class="btn btn-secondary" for="option21">نعم</label>
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
                                <label class="btn btn-secondary" for="option41">لا</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">
                        <label class="form-label">يتضمن الفيديو تعليق صوتي</label>
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
                                <label class="btn btn-secondary" for="o22">نعم</label>
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
                                <label class="btn btn-secondary" for="o33">لا</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="link_like_video" class="form-label"
                        >رابط لفيديو أعجبك</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="link_like_video"
                            name="link_like_video"
                        />
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
