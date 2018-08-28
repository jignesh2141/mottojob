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

                        <input type="hidden" name="page" value="2" id="result_page">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 hidden-xs desktop_search_box">

                                <div class="search-box">

                                    <div class="form-group">

                                        <div class="icon-addon addon-lg">

                                            <input type="text" onkeypress="return event.keyCode != 13;" placeholder="Job title or keyword" class="form-control job_title_desktop" id="job_title">

                                            <label for="job_title" class="fa fa-search" rel="tooltip" title="Search"></label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-3 col-sm-3 col-xs-12 p-r-6 p-media">

                                <div class="filter-box">

                                    <a href="javascript:void(0);" id="jobtype">Job Type<i class="fa fa-caret-down"></i></a>

                                    <ul class="filter-menu" id="filter-menu1">



                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="job_type[]" value="1" onclick="load_data(1)"> <span class="label-text">Restaurant</span>

                                                    </label>

                                                </div>

                                            </li>

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="job_type[]" value="2" onclick="load_data(1)"> <span class="label-text">Hotel & Guesthouse</span>

                                                    </label>

                                                </div>

                                            </li>



                                    </ul>

                                </div>

                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12 p-r-6 p-l-6 p-media">

                                <div class="filter-box">

                                    <a href="javascript:void(0)" id="prefecture">Prefecture<i class="fa fa-caret-down"></i></a>

                                    <ul class="filter-menu" id="filter-menu2">

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="prefecture[]" value="Kyoto" onclick="load_data(1)"> <span class="label-text">Kyoto</span>

                                                    </label>

                                                </div>

                                            </li>

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="prefecture[]" value="Osaka" onclick="load_data(1)"> <span class="label-text">Osaka</span>

                                                    </label>

                                                </div>

                                            </li>



                                    </ul>

                                </div>

                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12 p-l-6 p-media">

                                <div class="filter-box">

                                    <a href="javascript:void(0);" id="level">Japanese Level<i class="fa fa-caret-down"></i></a>

                                    <ul class="filter-menu" id="filter-menu3">

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="japanese_lavel[]" value="JLPT N1" onclick="load_data(1)"> <span class="label-text">JLPT N1</span>

                                                    </label>

                                                </div>

                                            </li>

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="japanese_lavel[]" value="JLPT N2" onclick="load_data(1)"> <span class="label-text">JLPT N2</span>

                                                    </label>

                                                </div>

                                            </li>

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="japanese_lavel[]" value="JLPT N3" onclick="load_data(1)"> <span class="label-text">JLPT N3</span>

                                                    </label>

                                                </div>

                                            </li>

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="japanese_lavel[]" value="JLPT N4" onclick="load_data(1)"> <span class="label-text">JLPT N4</span>

                                                    </label>

                                                </div>

                                            </li>

                                            <li>

                                                <div class="form-check">

                                                    <label>

                                                        <input type="checkbox" name="japanese_lavel[]" value="JLPT N5" onclick="load_data(1)"> <span class="label-text">JLPT N5</span>

                                                    </label>

                                                </div>

                                            </li>



                                    </ul>

                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12 hidden-md hidden-lg hidden-sm mobile_search_box">

                                <div class="search-box">

                                    <div class="form-group">

                                        <div class="icon-addon addon-lg">

                                            <input type="text" placeholder="Job title or keyword" class="form-control job_title_mobile" id="">

                                            <label for="email" class="fa fa-search" rel="tooltip" title="Search"></label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12 hidden-md hidden-lg hidden-sm">

                                <button onclick="load_data(1)" type="button" class="search-job sky-blue-bg">Search</button>

                            </div>

                        </div>

                        <input type="hidden" name="title" value="" id="search_box_title">

                    </form>

                    <div class="row infinite-scroll" id="load-data">

                        @foreach($jobs as $job)

                        <div class="col-md-6 col-sm-6">

                            <div class="job-list-box">

                                <a href="{{route('jobDetails',['job_id'=>$job->job_id])}}">

                                    <h4>

                                      {{$job->title}}

                                    </h4>

                                    <div class="job-list-thumb">

                                        <img src="{{ asset('images/job/' . $job->image) }}" alt="{{$job->title}}" class="img-responsive">

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

                                        <span>Show Job Details</span>

                                    </div>

                                </a>

                            </div>



                            @if ($job->day_diff <= 21)

                                <div class="ribbon">New!</div>

                            @endif

                        </div>

                        @endforeach

                    </div>

                    <div class="display-none" id="jobs_loading">

                      <img src="{{ asset('images/loading.gif') }}">

                    </div>

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

                            <img src="{{ asset('images/icon-1.png') }}">

                            <h4>(1)Choose the right job</h4>

                            <p>See job offers and apply  to the job that match your goals and wage requirements.</p>

                        </div>

                        <div class="flow-box">

                            <img src="{{ asset('images/icon-2.png') }}">

                            <h4>(2)Companies contact you</h4>

                            <p>Employers will contact you  by call or email. Responds to it and schedule a interview.</p>

                        </div>

                        <div class="flow-box">

                            <img src="{{ asset('images/icon-3.png') }}">

                            <h4>(3)Take the interview</h4>

                            <p>Complete the interview and start your next chapter!</p>

                        </div>

                    </div>

                    <div class="resume-box">

                        <div class="resume-title">

                            <h3>Japanese Resume</h3>

                        </div>

                        <div class="resume-box-contant">

                            <img src="{{ asset('images/resume-icon.jpg') }}">

                            <p>Need help writing your resume in Japanese? Contact us through <a href="#">facebook</a> or <a href="mailto:bunpoapp@gmail.com">email</a>, our team will help you to write it (free).</p>

                        </div>

                    </div>

                    <div class="sidebar-banner">

                        <a href="#">

                            <img src="{{ asset('images/sidebar-banner.png') }}">

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

        var page = 2;



        $(document).ready(function(){

           $(document).on('click','#btn-more',function(){

             load_data(0);

           });



           $("#job_title").keyup(function (e) {

               if (e.keyCode == 13) {

                   load_data(1);

                   e.preventDefault();

                   return false;

               }else{

                 e.preventDefault();

                 return false;

               }

           });



        });



        function load_data(new_result = 0) {

          $("#jobs_loading").fadeIn();

          $("#btn-more").prop('disabled', true);

          if(new_result == 1){

            $("#load-data").html('');

            $('#result_page').val(1);

            page = 1;

          }



          if($('.desktop_search_box').css('display') != 'none'){

            $("#search_box_title").val($('.job_title_desktop').val());

          }else{

            $("#search_box_title").val($('.job_title_mobile').val());

          }



          var formdata = $("#job_search").serialize();



          if($('[name="job_type[]"]:checked').length > 0){

            add_search_indicator($("#filter-menu1"));

          }else{

            remove_search_indicator($("#filter-menu1"));

          }



          if($('[name="prefecture[]"]:checked').length > 0){

            add_search_indicator($("#filter-menu2"));

          }else{

            remove_search_indicator($("#filter-menu2"));

          }



          if($('[name="japanese_lavel[]"]:checked').length > 0){

            add_search_indicator($("#filter-menu3"));

          }else{

            remove_search_indicator($("#filter-menu3"));

          }





          $.ajax({

              url : '{{ url("jobs/loaddata") }}',

              method : "POST",

              data : formdata,

              dataType : "text",

              success : function (data){

                if(data != ''){

                  result        = jQuery.parseJSON(data);

                  if(result.data.length > 0){

                    $(make_html(result.data,page)).appendTo('#load-data').fadeIn(1500);

                    page++;

                    $('#result_page').val(page);

                    if(page > result.last_page){

                      $("#btn-more").fadeOut();

                    }else{

                      $("#btn-more").removeAttr("disabled");

                      $("#btn-more").fadeIn();

                    }

                  }else{

                    if(result.total == 0){
                      
                      not_found = "<div class='no_job_message'><h2>Sorry, we don’t currently have any jobs <br>meeting these requirements.😿</h2></div>";

                      $(not_found).appendTo('#load-data').fadeIn(1500);
                    }

                    $("#btn-more").fadeOut();

                  }



                  $("#jobs_loading").fadeOut();

                }else{

                  $('#btn-more').html("No Jobs found");

                  $("#jobs_loading").fadeOut();

                }

              }

          });

        }



        function make_html(data,page) {

          html = '<div id="page' + page + '" style="display:none">';



          $.each(data, function(i, job) {

            url = 'job/' + job.id;

            if(job.day_diff <= 21) {

                new_tag = '<div class="ribbon">New!</div>';

            } else {

                new_tag = '';

            }

            img_url = "{{url('/')}}/images/job/" + job.image;

            html  += '<div class="col-md-6 col-sm-6"><div class="job-list-box"><a href="' + url + '"><h4>' + job.title + '</h4> <div class="job-list-thumb"><img src="' + img_url + '" alt="' + job.title + '" class="img-responsive"></div><ul class="list-box-detail"> <li> <label>Salary</label> <span>' + job.salary + '</span> </li><li> <label>Location</label> <span> <p>' + job.location + '</p></span> </li><li> <label>Japanse</label> <span>' + job.japanese_lavel + '</span> </li><li> <label>Hours</label> <span> <p>' + job.timing + '</p></span> </li></ul> <div class="show-job-detail"> <span>Show Job Details</span> </div></a></div>'+new_tag+'</div>';

          });



          return html + '</div>';

        }



        function add_search_indicator(search_element) {

          $(search_element).parent('div').after('<div class="filter-ribbon ' + search_element.attr('id') + '_indicator "></div>');

        }



        function remove_search_indicator(search_element) {

          $('.' + search_element.attr('id') + '_indicator').remove();

        }



        $(document).click(function(event) {

          clickedElementId = $(event.target).attr('id');

          if (typeof clickedElementId === 'undefined' || !clickedElementId){

              $("[id^=filter-menu]").removeClass('active');

          }else{

            if(clickedElementId != 'jobtype' && clickedElementId != 'prefecture' && clickedElementId != 'level'){

              $("[id^=filter-menu]").removeClass('active');

            }

          }



        });



        </script>



@endsection
