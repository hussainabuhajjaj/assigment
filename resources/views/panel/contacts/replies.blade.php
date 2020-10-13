@extends('panel.layout.master' , ['title' => 'الردود' ])




@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">الردود</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if($contact->replies->count())
        <div class="row">
            @foreach($contact->replies as $reply)
                <div class="col-lg-12">

                    <!--Begin::Section-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <div class="row row-no-padding row-col-separator-xl">

                                <div class="col-md-12 col-lg-12 col-xl-4">

                                    <div class="kt-widget1">
                                        <div class="kt-widget1__item">
                                            <div class="kt-widget1__info">
                                                <h3 class="kt-widget1__title">الرد</h3>
                                                <span class="kt-widget1__desc">{!! $reply->message !!}</span>
                                            </div>
                                            <span class="kt-widget1__number kt-font-brand">{{ $reply->created_at->format('Y-m-d') }}</span>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--End::Section-->

                    </div>

                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-md-12 alert alert-danger">
                لا يوجد ردود
            </div>
        </div>

    @endif

@endsection

