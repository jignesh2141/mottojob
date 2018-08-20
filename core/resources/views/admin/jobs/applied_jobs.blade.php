@extends('layouts.admin')
@section('content')
             
        <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ trans('page.applied_jobs') }}</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">{{ trans('job.user_name') }}</th>
                                  <th scope="col">{{ trans('job.user_email') }}</th>
                                  <th scope="col">{{ trans('job.title') }}</th>
                                  <th scope="col">{{ trans('job.location') }}</th>
                                  <th scope="col">{{ trans('job.created_at') }}</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($jobs AS $r=>$job)
                                <tr>
                                  <th scope="row">{{ $job->name }}</th>
                                  <td>{{ $job->email }}</td>
                                  <td>{{ $job->title }}</td>
                                  <td>{{ $job->location }}</td>
                                  <td>{{ Carbon\Carbon::parse($job->created_at)->format('M d Y') }}</td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>


        </div> <!-- .content -->
    
@endsection