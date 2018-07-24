@extends('layouts.mottojob_front')
@section('content')

    <!--Slider Section Start-->
    <section class="slider bg-white">
        <div class="container">
            <ul class="slider-carousel" id="slider-carousel">
                <li class="img1">
                    <h1>Find your jobs in JAPAN</h1>
                    <p>Part time, full time, no japanese jobs.</p>
                    <a href="{{ route('mottojobs') }}" class="secondary-orange-bg cta1">Browse All Jobs</a>
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
            <p>We created MottoWork to make it easy for you to find the right Japanese company to work for.</p>
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
                                <h3>We review each company</h3>
                                <p>We review each companies and only list the ones that meets our requireents.</p>
                            </div>
                            <div class="col-md-4 explore">
                                <div class="service-thumbnail">
                                    <img src="{{ asset('images/services-img-2.jpg') }}">
                                </div>
                                <h3>Be you at work</h3>
                                <p>Tell what you want the company to know first. Cultural, religious and your info.</p>
                            </div>
                            <div class="col-md-4 explore">
                                <div class="service-thumbnail">
                                    <img src="{{ asset('images/services-img-3.jpg') }}">
                                </div>
                                <h3>Our team is always with you!</h3>
                                <p>Our team is here to help anytime, from providing info to after you’re hired.</p>
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
            <h3>Explore Jobs</h3>
        </div>
        <div class="container blog-width">
            <div class="row">
                <div class="col-md-4 col-sm-4 p-l-0 p-media">
                    <a href="#">
                        <div class="job-box">
                            <div class="job-box-thumb">
                                <img src="{{ asset('images/blog-1.jpg') }}" alt="post-1" class="img-responsive">
                            </div>
                            <div class="job-detail">
                                <h4 class="job-name">Traditional sweets shop</h4>
                                <ul class="job-description">
                                    <li>
                                        <label>Salary</label>
                                        <span>900+ yen/ Hour</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>Tokyo, Shibuya</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 p-l-0 p-media">
                    <a href="#">
                        <div class="job-box">
                            <div class="job-box-thumb">
                                <img src="{{ asset('images/blog-2.jpg') }}" alt="post-1" class="img-responsive">
                            </div>
                            <div class="job-detail">
                                <h4 class="job-name">Multilingual assistance</h4>
                                <ul class="job-description">
                                    <li>
                                        <label>Salary</label>
                                        <span>930+ yen/ Hour</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>Tokyo, Harajuku</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 p-l-0 p-media">
                    <a href="#">
                        <div class="job-box">
                            <div class="job-box-thumb">
                                <img src="{{ asset('images/blog-3.jpg') }}" alt="post-1" class="img-responsive">
                            </div>
                            <div class="job-detail">
                                <h4 class="job-name">Multilingual assistance</h4>
                                <ul class="job-description">
                                    <li>
                                        <label>Salary</label>
                                        <span>800+ yen/ Hour</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>Tokyo, kwen</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 p-l-0 p-media">
                    <a href="#">
                        <div class="job-box">
                            <div class="job-box-thumb">
                                <img src="{{ asset('images/blog-1.jpg') }}" alt="post-1" class="img-responsive">
                            </div>
                            <div class="job-detail">
                                <h4 class="job-name">Work at sushi restaurant</h4>
                                <ul class="job-description">
                                    <li>
                                        <label>Salary</label>
                                        <span>930+ yen/ Hour</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>Kyoto, Tebna</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </a>
                </div> 
                <div class="col-md-4 col-sm-4 p-l-0 p-media">
                    <a href="#">
                        <div class="job-box">
                            <div class="job-box-thumb">
                                <img src="{{ asset('images/blog-2.jpg') }}" alt="post-1" class="img-responsive">
                            </div>
                            <div class="job-detail">
                                <h4 class="job-name">Work at designer’s cafe</h4>
                                <ul class="job-description">
                                    <li>
                                        <label>Salary</label>
                                        <span>780+ yen/ Hour</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>Hyogo, hyogo</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 p-l-0 p-media">
                    <a href="#">
                        <div class="job-box">
                            <div class="job-box-thumb">
                                <img src="{{ asset('images/blog-3.jpg') }}" alt="post-1" class="img-responsive">
                            </div>
                            <div class="job-detail">
                                <h4 class="job-name">Make Super cute crape with us</h4>
                                <ul class="job-description">
                                    <li>
                                        <label>Salary</label>
                                        <span>820+ yen/ Hour</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>Osaka, Shibuya</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="browse">
                        <a href="{{ route('mottojobs') }}">Browse All Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog Section Over-->

    <!--Populer Keywords Section Start-->
    <section class="popular-keyword section-padding bg-white">
        <div class="popular-keyword-header">
            <h3>Popular Keywords</h3>
        </div>
        <div class="container populer-section-width">
            <div class="row">
                <div class="col-md-5 col-sm-5 no-padding p-media">
                    <a href="#">
                        <div class="keyword-left">
                            <img src="{{ asset('images/Kyoto.jpg') }}" class="img-responsive" alt="motto">
                            <p>Work in Kyoto</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-7 col-sm-7 p-r-0 p-media">
                    <div class="col-md-12 no-padding">
                        <a href="#">
                            <div class="keyword-right-up">
                                <img src="{{ asset('images/hostel.jpg') }}" class="img-responsive" alt="motto">
                                <p>Work at Hostel & Guesthouse</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 no-padding">
                        <a href="#">
                            <div class="keyword-right-up">
                                <img src="{{ asset('images/guesthouse.jpg') }}" class="img-responsive" alt="motto">
                                <p>Work at Restaurant</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="#" class="see-more">See more keywords <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--Populer Keywords Section Over-->

@endsection