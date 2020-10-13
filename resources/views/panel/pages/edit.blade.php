@extends('panel.layout.master' , ['title' => 'تعديل صفحة'])


@push('css')
    <link href="{{ asset('panelAssets/js/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>
@endpush


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">تعديل صفحة</h3>
            </div>
        </div>
    </div>

@endsection
@section('content')
    <form class="kt-form" action="" method="" id="kt_form_1">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-9">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__body">

                        <div class="form-group">
                            <label>عنوان الصفحة</label>
                            <input class="form-control m-input" type="text" name="title"
                                   placeholder="عنوان الصفحة" value="{{ $page->getTranslation('ar')->title }}">

                        </div>
                        <div class="form-group">
                            <label>المحتوى</label>
                            <textarea class="summernote form-control" style="display:none!important;" id="kt_summernote_1"
                                      name="content" placeholder="المحتوى">{{ $page->getTranslation('ar')->content }}</textarea>
                        </div>

                    </div>
                </div>

                <!--end::Portlet-->

            </div>

            <div class="col-lg-3">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label" style="width: 100%;">
                            <button type="submit" style="width: 100%;" id="save"
                                    class="btn btn-brand">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </form>
@endsection


@push('js')

    <script src="{{ asset('panelAssets/js/summernote/dist/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panelAssets/js/summernote.min.js') }}" type="text/javascript"></script>


    <script>

        var KTFormControls = function () {
            // Private functions

            var demo1 = function () {
                $( "#kt_form_1" ).validate({
                    // define validation rules
                    rules: {
                        title: {
                            required: true,
                        },
                        content: {
                            required: true
                        },
                    },

                    //display error alert on form submit
                    invalidHandler: function(event, validator) {
                        var alert = $('#kt_form_1_msg');
                        alert.removeClass('kt--hide').show();
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

        $('form#kt_form_1').submit(function (e) {
            e.preventDefault();
            var fd = new FormData(this);

            if ($(this).valid()){
                $('#save').attr('disabled', 'disabled')
                    .html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');

                $.ajax({
                    url: "{{ route('panel.pages.update' , $page->id) }}",
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: fd,
                    success: function (response) {
                        $('#save').removeAttr('disabled').html('حفظ');
                        swal.fire(response.msg, "", "success");
                    },
                    error: function (response) {
                        $('#save').removeAttr('disabled').html('حفظ');
                        swal.fire(response.responseJSON.msg, "", "error");

                    }
                });
            }

        });
    </script>

@endpush
