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
                                <h3>{{$job[0]->title}}</h3>
                                <p>{{$job[0]->restaurant}}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sm-pull-10 no-padding col-md-pull-10">
                            <div class="top-bar-thumb">
                                <img src="{{ asset('images/job/' . $job[0]->image) }}" alt="post-1" class="img-responsive">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4 col-sm-4 col-sm-push-8 col-md-push-8">
                    <div class="detail-right-sidebar">
                        <div class="col-md-12 col-sm-12 no-padding">
                            <a href="{{route('applyForm',['job_id'=>$job[0]->job_id])}}" class="apply-job">Apply for this Job</a>
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
                                                <p>{{$job[0]->salary}}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ico">
                                                <i class="fa fa-map-marker"></i>
                                                <span>Location</span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 no-padding summary-contant">
                                                <p>{{$job[0]->location}}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ico">
                                                <i class="fa fa-user"></i>
                                                <span>Job</span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 no-padding summary-contant">
                                                <p>{{$job[0]->designation}}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 no-padding ico">
                                                <i class="fa fa-jpy"></i>
                                                <span>Hours</span>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 no-padding summary-contant">
                                                <p>{{$job[0]->timing}}</p>
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
                                {!!$job[0]->description!!}
                            </li>
                            
                            <li>
                                <h3>Requirements</h3>
                                {!!$job[0]->requirements!!}
                            </li>
                            <li>
                                <h3>Minimum Working Hours/days</h3>
                                <p>
                                    <ul class="inner-list">
                                        <li>{{$job[0]->minimum_working_hours_per_day}}</li>
                                        <li>{{$job[0]->minimum_working_days_per_week}}</li>
                                    </ul>
                                </p>
                            </li>
                            <li>
                                <h3>Commuting Expenses</h3>
                                {!!$job[0]->community_expenses!!}
                            </li>
                            <li>
                                <h3>Benefits</h3>
                                {!!$job[0]->benefits!!}
                            </li>
                            <li>
                                <h3>Corporate name</h3>
                                <p>{{$job[0]->corporate_name}}</p>
                            </li>
                            <li>
                                <h3>Location</h3>
                                <p>
                                    <div id="map" style="width: 100%; height: 300px;"></div>  

                                </p>
                            </li>
                        </ul>
                        <input type="hidden" id="latitude" value="{{$job[0]->latitude}}">
                        <input type="hidden" id="longitute" value="{{$job[0]->longitute}}">
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

    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAAENuXYNKUcbXz5wBoEFJtPKvHOE14Hn0"></script>
    <script type="text/javascript">
    function initialize(){
         var lat = $('#latitude').val();
         var lng = $('#longitute').val();
         console.log(lat,lng);
         var myLatlng = new google.maps.LatLng(lat,lng);
         var myOptions = {
             zoom: 12,
             center: myLatlng,
             mapTypeId: google.maps.MapTypeId.ROADMAP
             }
          map = new google.maps.Map(document.getElementById("map"), myOptions);
          var marker = new google.maps.Marker({
              position: myLatlng, 
              map: map,
          title:"Fast marker"
         });
    } 

    google.maps.event.addDomListener(window,'load', initialize);
    </script>

@endsection