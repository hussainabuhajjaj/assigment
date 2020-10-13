<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>تطبيق عفيف</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{ asset('favicon.ico') }}">
                        </a>
                    </div>

                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">اعادة تعيين كلمة المرور</h3>
                        </div>
                        <form class="kt-form" action="{{ route('panel.password.update') }}" method="post">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input-group">
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                                       value="{{ $email }}" placeholder="البريد الإلكتروني" name="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="input-group">
                                <input id="password" type="password" placeholder="كلمة المرور" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control" placeholder="تاكيد كلمة المرور"  name="password_confirmation" required>
                            </div>



                            <div class="kt-login__actions">
                                <button class="btn btn-brand btn-elevate kt-login__btn-primary">اعادة تعيين كلمة المرور</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<script src="{{ asset('panelAssets') }}//js/jquery.js" type="text/javascript"></script>



</body>

<!-- end::Body -->
</html>
