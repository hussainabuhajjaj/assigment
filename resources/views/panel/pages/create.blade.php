@extends('panel.layout.master' , ['title' => 'إضافة صفحة'])


@push('css')
    <link href="{{ asset('panelAssets/js/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>
@endpush


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">إضافة صفحة</h3>
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
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x"
                            role="tablist">
                            @php $i=1; @endphp
                            @foreach(locales() as $key=>$language)
                                <li class="nav-item">
                                    <a class="nav-link {{$i==1?'active':''}}" data-toggle="tab"
                                       href="#kt_tabs_{{$i}}" role="tab">
                                        {{__('translate.'.$key)}}
                                    </a>
                                </li>
                                @php $i++; @endphp

                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <div class="tab-content">
                        @php $i=1; @endphp
                        @foreach(locales() as $key=>$language)

                            <div class="tab-pane {{$i==1?'active':''}}" id="kt_tabs_{{$i}}" role="tabpanel">


                                <div class="form-group">
                                    <label>عنوان الصفحة</label>
                                    <input class="form-control m-input" type="text" name="{{ 'title_'.$key }}"
                                           placeholder="عنوان الصفحة" required value="{{ isset($item) ? $item->getTranslation($key)->title : "" }}">

                                </div>
                                <div class="form-group">
                                    <label>المحتوى</label>
                                    <textarea class="summernote form-control" style="display:none!important;" id="kt_summernote_1"
                                              name="{{ 'content_'.$key }}" required placeholder="المحتوى">{{ isset($item) ? $item->getTranslation($key)->content : ""  }}</textarea>
                                </div>

                            </div>

                            @php $i++; @endphp

                        @endforeach

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
        </div>
    </div>
    {!! Form::close() !!}

@endsection


@push('js')

    <script src="{{ asset('panelAssets/js/summernote/dist/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panelAssets/js/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>

@endpush
