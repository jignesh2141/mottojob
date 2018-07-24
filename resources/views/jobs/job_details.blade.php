@extends('layouts.mottojob_front')
@section('content')

    <!--Job Detail Section Start-->
    <div class="job-detail-main bg-gray r-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 no-padding p-media">
                    <div class="top-bar bg-white">
                        <div class="col-md-10 col-sm-10 col-sm-push-2 col-md-push-2">
                            <div class="top-bar-detail">
                                <h3>Work at sushi restaurant</h3>
                                <p>Izakaya Tabiki</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sm-pull-10 no-padding col-md-pull-10">
                            <div class="top-bar-thumb">
                                <img src="images/blog-1.jpg" alt="post-1" class="img-responsive">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4 col-sm-4 col-sm-push-8 col-md-push-8">
                    <div class="detail-right-sidebar">
                        <div class="col-md-12 col-sm-12 no-padding">
                            <a href="{{route('applyForm')}}" class="apply-job">Apply for this Job</a>
                        </div>
                        <div class="col-md-12 col-sm-12 no-padding">
                            <div class="job-summary-box">
                                <div class="summary-title">
                                    <h4>Job Summary</h4>
                                </div>
                                <div class="summary-detail">
                                    <ul class="summary-detail-list">
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ico">
                                                <i class="fa fa-jpy"></i>
                                                <span>Pay</span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 no-padding summary-contant">
                                                <p>850+ yen/ hour</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ico">
                                                <i class="fa fa-map-marker"></i>
                                                <span>Location</span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 no-padding summary-contant">
                                                <p>Tokyo, Shibuya</p>
                                                <p>2 minutes from shibuya station</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ico">
                                                <i class="fa fa-user"></i>
                                                <span>Job</span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 no-padding summary-contant">
                                                <p>Waiter / Waitress staff</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ico">
                                                <i class="fa fa-jpy"></i>
                                                <span>Hours</span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 no-padding summary-contant">
                                                <p>9:00~17:00、10:00~19:00、</p>
                                                <p>17:30~22:30</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-sm-pull-4 no-padding  col-md-pull-4 p-media">
                    <div class="detail-left-sidebar bg-white">
                        <ul class="detail-list">
                            <li>
                                <h3>Job description</h3>
                                <p>Hospitality for our customers through atmosphere, service, and our delicious food!</p>
                            </li>
                            <li>
                                <h3>In this position, you will:</h3>
                                <p>
                                    <ul class="inner-list">
                                        <li>[Servers] Seating customers, taking and serving orders, etc.</li>
                                        <li>[Kitchen Staff] Dish washing, Simple dish preparation, etc.</li>
                                    </ul>
                                </p>
                            </li>
                            <li>
                                <h3>Requirements</h3>
                                <p>
                                    <ul class="inner-list">
                                        <li class="sub-title">Language Requirements <p>Ability to use basic Japanese (JLPT N4 or higher)</p></li>
                                        <li class="sub-title">VISA Requirements<P>A valid visa with eligibility to work (Students, etc. with work permission are also welcome)</P></li>
                                    </ul>
                                </p>
                            </li>
                            <li>
                                <h3>Minimum Working Hours/days</h3>
                                <p>
                                    <ul class="inner-list">
                                        <li>Minimum hours  ・・・3 hours / day</li>
                                        <li>Minimum days    ・・・2 days / week</li>
                                    </ul>
                                </p>
                            </li>
                            <li>
                                <h3>Commuting Expenses</h3>
                                <p>Partially paid</p>
                            </li>
                            <li>
                                <h3>Benefits</h3>
                                <p>Hospitality for our customers through atmosphere, service, and our delicious food!</p>
                            </li>
                            <li>
                                <h3>300 yen</h3>
                                <p>Hospitality for our customers through atmosphere, service, and our delicious food!</p>
                            </li>
                            <li>
                                <h3>Corporate name</h3>
                                <p>naiew</p>
                            </li>
                            <li>
                                <h3>Location</h3>
                                <p>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926789.323477777!2d136.91566477117132!3d36.07808147257953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34674e0fd77f192f%3A0xf54275d47c665244!2sJapan!5e0!3m2!1sen!2sin!4v1530369033317" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 hidden-md hidden-lg hidden-sm">
                    <a href="#" class="apply-job">Apply for this Job</a>
                </div>
                <div class="col-md-12 col-sm-12 hidden-md hidden-lg hidden-sm bg">
                    <a href="#" class="apply-job sky-blue-bg">Find Other Job</a>
                </div>
            </div>
        </div>
    </div>
    <!--Job Detail Section Over-->

@endsection