@extends('panel.layout.master' , ['title' => 'صفحات الموقع'])



@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">صفحات الموقع</h3>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            صفحات الموقع
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin::Section-->
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="70%">العنوان</th>
                                    <th width="20%">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($pages)
                                    @foreach($pages as $page)
                                        <tr>
                                            <th scope="row">{{ $loop->index +1  }}</th>


                                            <td>{{ $page->title }}</td>
                                            <td>
                                                <a href="{{ route('panel.pages.edit' , $page->id ) }}"
                                                   class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                   title="تعديل">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--end::Section-->

                </div>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>


@endsection

