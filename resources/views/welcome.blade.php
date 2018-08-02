@extends('layouts.mottojob_front')
@section('content')

    <!--Slider Section Start-->
    <section class="slider bg-white">
        <div class="container">
            <ul class="slider-carousel" id="slider-carousel">
                <li class="img1">
                    <h1>{{ trans('general.find_job') }}</h1>
                    <p>{{ trans('general.part_full_job') }}</p>
                    <a href="{{ route('mottojobs') }}" class="secondary-orange-bg cta1">{{ trans('general.browse_jobs') }}</a>
                    <!-- <a href="#" class="secondary-sky-blue-bg cta2">Contact Us</a> -->
                </li>
                <!-- <li class="img1">
                    <h1>Find your jobs in JAPAN</h1>
                    <p>Part time, full time, no japanese jobs.</p>
                    <a href="#" class="secondary-orange-bg cta1">Browse All Jobs</a>
                </li>
                <li class="img1">
                    <h1>Welcome to <span class="primary">Corporate</span></h1>
                    <p>It is a long established fact that a reader will be distracted by the readable <br/>content of a page when looking at its layout</p>
                    <a href="#" class="primary-bg cta1">Get Started</a>
                </li>  -->

            </ul>
            <ul class="sliderpager">
                <li><a href="#"><i class="fa fa-circle"></i></a></li>
                <li><a href="#"><i class="fa fa-circle"></i></a></li>
                <li><a href="#"><i class="fa fa-circle"></i></a></li>
            </ul>
        </div>
    </section>
    <!--Slider Section Over-->

    <!--Services Section Start-->
    <section class="services section-padding bg-white">

        <div class="services-header">
            <p>{{ trans('general.we_create') }}</p>
        </div>
        <div class="services-content">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <div class="table">
                            <div class="col-md-4 explore">
                                <div class="service-thumbnail">
                                    <img src="{{ asset('images/services-img-1.jpg') }}">
                                </div>
                                <h3>{{ trans('general.review_company') }}</h3>
                                <p>{{ trans('general.review_company_desc') }}</p>
                            </div>
                            <div class="col-md-4 explore">
                                <div class="service-thumbnail">
                                    <img src="{{ asset('images/services-img-2.jpg') }}">
                                </div>
                                <h3>{{ trans('general.be_at_work') }}</h3>
                                <p>{{ trans('general.be_at_work_desc') }}</p>
                            </div>
                            <div class="col-md-4 explore">
                                <div class="service-thumbnail">
                                    <img src="{{ asset('images/services-img-3.jpg') }}">
                                </div>
                                <h3>{{ trans('general.our_team') }}</h3>
                                <p>{{ trans('general.our_team_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Services Section Over-->

    <!--Blog Section Start-->
    <section class="blog section-padding bg-gray">
        <div class="blog-header">
            <h3>{{ trans('general.explore_jobs') }}</h3>
        </div>
        <div class="container blog-width">
            <div class="row">
                @foreach($jobs as $job)
                <div class="col-md-4 col-sm-4 p-l-0 p-media">
                    <a href="{{route('jobDetails',['job_id'=>$job->job_id])}}">
                        <div class="job-box">
                            <div class="job-box-thumb">
                                <img src="{{ asset('images/job/' . $job->image) }}" alt="post-1" class="img-responsive">
                            </div>
                            <div class="job-detail">
                                <h4 class="job-name">{{$job->title}}</h4>
                                <ul class="job-description">
                                    <li>
                                        <label>{{ trans('general.salary') }}</label>
                                        <span>{{$job->salary}}</span>
                                    </li>
                                    <li>
                                        <label>{{ trans('general.location') }}</label>
                                        <span>{{$job->location}}</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="browse">
                        <a href="{{ route('mottojobs') }}">{{ trans('general.browse_jobs') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog Section Over-->

    <!--Populer Keywords Section Start-->
    <section class="popular-keyword section-padding bg-white">
        <div class="popular-keyword-header">
            <h3>{{ trans('general.popular_keywords') }}</h3>
        </div>
        <div class="container populer-section-width">
            <div class="row">
                <div class="col-md-5 col-sm-5 no-padding p-media">
                    <a href="#">
                        <div class="keyword-left">
                            <img src="{{ asset('images/Kyoto.jpg') }}" class="img-responsive" alt="motto">
                            <p>{{ trans('general.work_in_kyoto') }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-7 col-sm-7 p-r-0 p-media">
                    <div class="col-md-12 no-padding">
                        <a href="#">
                            <div class="keyword-right-up">
                                <img src="{{ asset('images/hostel.jpg') }}" class="img-responsive" alt="motto">
                                <p>{{ trans('general.work_at_guesthouse') }}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 no-padding">
                        <a href="#">
                            <div class="keyword-right-up">
                                <img src="{{ asset('images/guesthouse.jpg') }}" class="img-responsive" alt="motto">
                                <p>{{ trans('general.work_at_restaurant') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="#" class="see-more">{{ trans('general.see_more_keywords') }} <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--Populer Keywords Section Over-->

@endsection