@extends('layouts.mottojob_front')
@section('content')

    <!--Job List Section Start-->
    <div class="job-list bg-gray">
        <div class="container  custom-width">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h2 class="serch-job-title">Search Jobs</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <form action="{{ route('loadDataAjax') }}" id="job_search" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12 col-sm-12 hidden-xs">
                                <div class="search-box">
                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <input type="text" placeholder="Job title or keyword" class="form-control" id="job_title" name="title">
                                            <label for="email" class="fa fa-search" rel="tooltip" title="Search"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12 p-r-6 p-media">
                                <div class="filter-box">
                                    <a href="#" id="jobtype">Job Type<i class="fa fa-caret-down"></i></a>
                                    <ul class="filter-menu" id="filter-menu1">
                                        <form>
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="job_type" value="1"> <span class="label-text">Restaurant</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="job_type" value="2"> <span class="label-text">Hotel & Guesthouse</span>
                                                    </label>
                                                </div>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 p-r-6 p-l-6 p-media">
                                <div class="filter-box">
                                    <a href="#" id="prefecture">Prefecture<i class="fa fa-caret-down"></i></a>
                                    <ul class="filter-menu" id="filter-menu2">
                                        
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="prefecture" value="Kyoto"> <span class="label-text">Kyoto</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="prefecture" value="Osaka"> <span class="label-text">Osaka</span>
                                                    </label>
                                                </div>
                                            </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 p-l-6 p-media">
                                <div class="filter-box">
                                    <a href="#" id="level">Japanese Level<i class="fa fa-caret-down"></i></a>
                                    <ul class="filter-menu" id="filter-menu3">
                                        <form>
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="japanese_lavel" value="JLPT N1"> <span class="label-text">JLPT N1</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="japanese_lavel" value="JLPT N2"> <span class="label-text">JLPT N2</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="japanese_lavel" value="JLPT N3"> <span class="label-text">JLPT N3</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li> 
                                                <div class="form-check">
                                                    <label>
                                                        <input type="radio" name="japanese_lavel" value="JLPT N4"> <span class="label-text">JLPT N4</span>
                                                    </label>
                                                </div>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 hidden-md hidden-lg hidden-sm">
                                <div class="search-box">
                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <input type="text" placeholder="Job title or keyword" class="form-control" id="">
                                            <label for="email" class="fa fa-search" rel="tooltip" title="Search"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 hidden-md hidden-lg hidden-sm">
                                <a href="#" class="search-job sky-blue-bg">Search</a>
                            </div>
                        </div>
                    </form>

                    <div class="row infinite-scroll" id="load-data">
                        @foreach($jobs as $job)
                        <div class="col-md-6 col-sm-6">
                            <div class="job-list-box">
                                <h4>{{$job->title}}</h4>
                                <div class="job-list-thumb">
                                    <img src="{{ asset('images/job/' . $job->image) }}" alt="MottoJob" class="img-responsive">
                                </div>
                                <ul class="list-box-detail">
                                    <li>
                                        <label>Salary</label>
                                        <span>{{$job->salary}}</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>
                                            <p>{{$job->location}}</p>
                                        </span>

                                    </li>
                                    <li>
                                        <label>Japanse</label>
                                        <span>{{$job->japanese_lavel}}</span>
                                    </li>
                                    <li>
                                        <label>Hours</label>
                                        <span>
                                            <p>{{$job->timing}}</p>
                                        </span>
                                    </li>
                                </ul>
                                <div class="show-job-detail">
                                    <a href="{{route('jobDetails',['job_id'=>$job->job_id])}}">Show Job Details</a>
                                </div>
                            </div>
                            <div class="ribbon">New!</div>
                        </div>
                        @endforeach
                    </div>
                    {{ $jobs->links() }}
                    <div class="row" id="remove-row">
                        <div class="col-md-12 col-sm-12">
                            <div class="load-more">
                                <button id="btn-more" data-id="{{ $job->job_id }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>

                            </div>
                        </div>
                    </div>
                </div>
                    
                            
                <!-- Right Side -->
                <div class="col-md-3 col-sm-3">
                    <div class="work-process-box">
                        <div class="work-process-title">
                            <h3>How <img src="images/icon-0.png"> works</h3>
                        </div>
                        <div class="flow-box">
                            <img src="images/icon-1.png">
                            <h4>(1)Choose the right job</h4>
                            <p>See job offers and apply  to the job that match your goals and wage requirements.</p>
                        </div>
                        <div class="flow-box">
                            <img src="images/icon-2.png">
                            <h4>(2)Companies contact you</h4>
                            <p>Employers will contact you  by call or email. Responds to it and schedule a interview.</p>
                        </div>
                        <div class="flow-box">
                            <img src="images/icon-3.png">
                            <h4>(3)Take the interview</h4>
                            <p>Complete the interview and start your next chapter!</p>
                        </div>
                    </div>
                    <div class="resume-box">
                        <div class="resume-title">
                            <h3>Japanese Resume</h3>
                        </div>
                        <div class="resume-box-contant">
                            <img src="images/resume-icon.jpg">
                            <p>Need help writing your resume in Japanese? Contact us through <a href="#">facebook</a> or <a href="#">email</a>, our team will help you to write it (free).</p>
                        </div>
                    </div>
                    <div class="sidebar-banner">
                        <a href="#">
                            <img src="images/sidebar-banner.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Job List Section Over-->
    <script type="text/javascript">
        $('ul.pagination').hide();
    </script>
    <script type="text/javascript">
        $("#job_title").keyup(function (e) {
            if (e.keyCode == 13) {
                var formdata = $("#job_search").serialize();
                $.ajax({
                   url : '{{ url("jobs/loaddata") }}',
                   method : "POST",
                   data : formdata,
                   dataType : "text",
                   success : function (data)
                   {
                      console.log(data);
                      if(data != '') 
                      {
                          $('#remove-row').remove();
                          $('#load-data').append(data);
                      }
                      else
                      {
                          $('#btn-more').html("No Data");
                      }
                   }
               });
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
           $(document).on('click','#btn-more',function(){
               var id = $(this).data('id');
               //$("#btn-more").html("Loading....");
               $.ajax({
                   url : '{{ url("jobs/loaddata") }}',
                   method : "POST",
                   data : {id:id, _token:"{{csrf_token()}}"},
                   dataType : "text",
                   success : function (data)
                   {
                      if(data != '') 
                      {
                          $('#remove-row').remove();
                          $('#load-data').append(data);
                      }
                      else
                      {
                          $('#btn-more').html("No Data");
                      }
                   }
               });
           });  
        }); 
        </script>

@endsection