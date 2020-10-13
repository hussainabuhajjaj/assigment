@extends('panel.layout.master' , ['title' => 'عرض البريد الوارد' ])

@push('css')
    <link href="{{ asset('panelAssets/js/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>
@endpush


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">عرض البريد الوارد</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <!--Begin::Section-->
            <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-xl">


                        <div class="col-md-12 col-lg-12 col-xl-4">

                            <!--begin:: Widgets/Stats2-3 -->
                            <div class="kt-widget1">
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">الإسم</h3>
                                        <span class="kt-widget1__desc">{{ $contact->name }}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">البريد الإلكتروني</h3>
                                        <span class="kt-widget1__desc">{{ $contact->email }}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">رقم الجوال</h3>
                                        <span class="kt-widget1__desc">{{ $contact->phone }}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">العنوان</h3>
                                        <span class="kt-widget1__desc">{{ $contact->subject }}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">الرسالة</h3>
                                        <span class="kt-widget1__desc">{{ $contact->message }}</span>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Stats2-3 -->
                        </div>

                    </div>
                </div>
            </div>

            <!--End::Section-->

        </div>

        <div class="col-lg-12">

            <!--begin:: Widgets/Tasks -->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            الرد على البريد الوارد
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    {!! Form::open(['method'=> 'POST', 'url'=> route('panel.contacts.replay') ,'to'=>url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}
                    <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                    <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="summernote form-control" style="display:none!important;" id="kt_summernote_1" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="row">
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-success">ارسال</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>

            <!--end:: Widgets/Tasks -->
        </div>

    </div>




@endsection

@push('js')
    <script src="{{ asset('panelAssets/js/summernote/dist/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panelAssets/js/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>


    <script>

        var KTFormControls = function () {
            // Private functions

            var demo1 = function () {
                $( "#kt_form_1" ).validate({
                    // define validation rules
                    rules: {
                        message: {
                            required: true,
                        },
                    },

                    //display error alert on form submit
                    invalidHandler: function(event, validator) {
                        var alert = $('#kt_form_1_msg');
                        alert.removeClass('kt--hide').show();
                        // KTUtil.scrollTop();
                    },

                    submitHandler: function (form) {
                        form[0].submit(); // submit the form
                    }
                });
            }




            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormControls.init();
        });

    </script>

@endpush
