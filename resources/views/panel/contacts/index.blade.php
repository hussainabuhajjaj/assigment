@extends('panel.layout.master' , ['title' => 'البريد الوارد'])

@push('css')
    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
@endpush


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">البريد الوارد</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')


    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand fa fa-mail-bulk"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    البريد الوارد
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="row align-items-center">
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <input type="text" class="form-control"
                                           placeholder="بحث.." id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <!--begin: Datatable -->
            <div class="kt-datatable text-center"  id="ajax_data"></div>

            <!--end: Datatable -->
        </div>
    </div>


@endsection

@push('js')
    <script src="{{asset('panelAssets/js/jquery.dataTables.js')}}" type="text/javascript"></script>
    <script src={{asset('panelAssets/js/data-ajax.js')}}  type="text/javascript"></script>

    <script>
        window.data_url = '{{url('panel/contacts/datatable')}}';

        window.columns = [
             {
                field: 'name',
                title: "الإسم",
                'class':"text-center",
                textAlign : "center",
            },{
                field: 'email',
                title: "البريد الإلكتروني",
                'class':"text-center",
                textAlign : "center",
            },{
                field: 'phone',
                title: "رقم الهاتف",
                'class':"text-center",
                textAlign : "center",
            },{
                field: 'subject',
                title: "عنوان الرسالة",
                'class':"text-center",
                textAlign : "center",
            },
            {
                field: 'created_at',
                title: "تاريخ الإنشاء",
                textAlign : "center",
            },
            {
                field: 'Actions',
                title: "العمليات",
                sortable: false,
                overflow: 'visible',
                textAlign : "center",
                autoHide: false,
                width:100,
                template: function (data) {
                    return `
                        <input value=` + data.id + ` type="hidden" class="id">
						<div class="dropdown">
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
                                <i class="la la-cog"></i>
                            </a>
						  	<div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="contacts/` + data.id + `/show"><i class="fa fa-eye"></i> عرض الرسالة</a>
                                    <a class="dropdown-item" href="contacts/`+ data.id +`/show-replay"><i class="fa fa-reply"></i> عرض الردود</a>
                                    <a class="dropdown-item delete"  data-url="contacts/` + data.id + `" href="#" id="deleteContact"><i class="fa fa-trash"></i>حذف الرسالة </a>
                                </div>
						</div>`;
                },
            }
        ];
    </script>

@endpush
