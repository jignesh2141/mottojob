@extends('layouts.mottojob_front')
@section('content')

    <!--Job Detail Section Start-->
    <div class="job-detail-main bg-gray r-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 no-padding p-media">
                    <div class="top-bar bg-white">
                        <div class="col-md-10 col-sm-10">
                            <div class="top-bar-detail">
                                <h3>{{$page->title}}</h3>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="row">
              
                <div class="col-md-12 no-padding p-media">
                    <div class="detail-left-sidebar bg-white">
                      <ul class="detail-list">
                          <li>
                              {!!$page->description!!}
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Job Detail Section Over-->

@endsection