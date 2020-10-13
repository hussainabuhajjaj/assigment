@extends('panel.layout.master' , ['title' => 'إضافة مدير'])

@push('css')
    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">إضافة مدير</h3>
            </div>
        </div>
    </div>

@endsection

@section('content')



    @php
        $item = isset($item) ? $item: null;
    @endphp

    {!! Form::open(['method'=>isset($item) ? 'PUT' : 'POST', 'url'=> url()->current() ,'to'=>url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}

    @csrf
    <div class="row">

        <div class="col-md-8">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label>الإسم</label>
                        <input class="form-control m-input" type="text" name="name"
                               value="{{ isset($item) ? $item->name : "" }}" required placeholder="الإسم">
                    </div>
                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input class="form-control m-input" type="email" required name="email"
                               placeholder="البريد الإلكتروني" value="{{ isset($item) ? $item->email : "" }}" >
                    </div>
                    <div class="form-group">
                        <label>كلمة المرور</label>
                        <input class="form-control m-input" type="password" {{ isset($item) ? '' : "required" }}  name="password" id="password"
                               placeholder="كلمة المرور">
                    </div>
                    <div class="form-group">
                        <label>تاكيد كلمة المرور</label>
                        <input class="form-control m-input" type="password" {{ isset($item) ? '' : "required" }}  name="password_confirmation"
                               placeholder="تاكيد كلمة المرور">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label" style="width: 100%;">
                        <button type="submit" style="width: 100%;" id="m_login_signin_submit" class="btn btn-brand">
                            حفظ
                        </button>
                    </div>
                </div>
            </div>

            <div class="kt-portlet">
                <div class="kt-portlet__body ">


                    <div class="form-group">
                        <label>الصلاحيات</label>
                        <select class="form-control kt-selectpicker" name="role_id">
                            @foreach(roles() as $role)
                                <option
                                    value="{{ $role->id }}" {{ isset($item) ? ($role->id == $item->roles[0]->id ? 'selected' : '') : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>


        </div>
    </div>
    {!! Form::close() !!}

@endsection


@push('js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>

    <script>

        var KTFormControls = function () {
            // Private functions

            var demo1 = function () {
                $("#form").validate({
                    // define validation rules
                    rules: {
                        name: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password",
                        },
                    },

                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                        var alert = $('#kt_form_1_msg');
                        alert.removeClass('kt--hide').show();
                    },

                    submitHandler: function (form) {
                        form[0].submit(); // submit the form
                    }
                });
            };


            return {
                // public functions
                init: function () {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormControls.init();
        });




    </script>

@endpush
