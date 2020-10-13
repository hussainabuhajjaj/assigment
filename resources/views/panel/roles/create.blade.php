@extends('panel.layout.master' , ['title' => 'إضافة مجموعة صلاحيات'])


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">إضافة مجموعة صلاحيات</h3>
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
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label>الإسم</label>
                        <input class="form-control m-input" required value="{{ isset($item) ? $item->name : "" }}"
                               type="text" name="name" placeholder="الإسم">
                    </div>
                </div>
            </div>
            <div class="kt-portlet">
                <div class="kt-portlet__body">

                    @include('panel.roles.permissions')
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
        </div>
    </div>
    {!! Form::close() !!}



@endsection


@push('js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
    <script>
        $(".checkAll").click(function () {
            $(this).closest('.form-group').find('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
