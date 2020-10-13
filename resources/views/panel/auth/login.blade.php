<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>تسجيل الدخول للوحة التحكم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">


    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('panelAssets/css/login-3.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('panelAssets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />


    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <style>
        *{
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<!-- end::Head -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  style="background-image: url({{ asset('panelAssets/image/bg-3.jpg') }});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">


                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">تسجيل الدخول للوحة التحكم</h3>
                        </div>
                        <form class="kt-form" action="{{ route('panel.login') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" type="email" placeholder="البريد الإلكتروني" name="email">
                            </div>

                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="كلمة المرور" name="password">
                            </div>

                            <div class="row kt-login__extra">
                                <div class="col">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="remember"> تذكرني
                                        <span></span>
                                    </label>
                                </div>
{{--                                <div class="col kt-align-right">--}}
{{--                                    <a href="javascript:;" id="kt_login_forgot" class="kt-link kt-login__link">نسيت كلمة المرور ؟</a>--}}
{{--                                </div>--}}
                            </div>

                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">تسجيل الدخول</button>
                            </div>
                        </form>
                    </div>
{{--                    <div class="kt-login__forgot">--}}
{{--                        <div class="kt-login__head">--}}
{{--                            <h3 class="kt-login__title">نسيت كلمة المرور ؟ </h3>--}}
{{--                            <div class="kt-login__desc">أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور الخاصة بك :</div>--}}
{{--                        </div>--}}
{{--                        <form class="kt-form" action="{{ route('panel.password.email') }}" method="post">--}}
{{--                            <div class="input-group">--}}
{{--                                <input class="form-control" type="text" placeholder="البريد الإلكتروني" name="email" id="kt_email" autocomplete="off">--}}
{{--                            </div>--}}
{{--                            <div class="kt-login__actions">--}}
{{--                                <button id="kt_login_forgot_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">طلب رمز التعيين</button>&nbsp;&nbsp;--}}
{{--                                <button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">رجوع</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('panelAssets/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/sticky.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/jquery.form.min.js') }}/" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/jquery-validation.init.js') }}" type="text/javascript"></script>

<script>
    var KTAppOptions = {};

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="{{ asset('panelAssets/js/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/login-general.js') }}" type="text/javascript"></script>

</body>

<!-- end::Body -->
</html>
