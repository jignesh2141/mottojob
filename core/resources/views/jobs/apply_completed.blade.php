@extends('layouts.mottojob_front')
@section('content')

    <!--Interview Process Section Start-->
    <section class="interview-process bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="msg-succsess">
                        <h2>{{ trans('job.thanks_msg') }}</h2>
                    </div>
                    <div class="process-title">
                        <h3>{{ trans('job.interview_process') }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">{{ trans('job.interview_date') }}</h3>
                        <p class="step-des">{{ trans('job.interview_date_desc') }}</p>
                    </div>
                </div> 
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">{{ trans('job.interview_prepare') }}</h3>
                        <p class="step-des">{{ trans('job.interview_prepare_desc') }}</p>
                    </div>
                </div>
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">{{ trans('job.interview_take') }}</h3>
                        <p class="step-des">{{ trans('job.interview_take_desc') }}</p>
                    </div>
                </div>
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">{{ trans('job.interview_after') }}</h3>
                        <p class="step-des">{{ trans('job.interview_after_desc') }}</p>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="ok-btn">
                    <a href="{{ route('mottojobs') }}">{{ trans('job.ok') }}</a>
                </div>
            </div>
        </div>
    </section>
    
    <!--Interview Process Section Over-->

@endsection