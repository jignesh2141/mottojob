@extends('layouts.admin')
@section('content')
      <form action="{{ route('manageSession') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                  <div class="col-md-4"></div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4 text-right">
                    <a href="{{route('addJob')}}" class="btn btn-primary">{{ trans('job.add_new') }}</a>
                  </div>
                  
                </div>
            </div>
            
        </div>
      </form>
        
        <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ trans('job.jobs') }}</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">{{ trans('job.title') }}</th>
                                  <th scope="col">{{ trans('job.prefecture') }}</th>
                                  <th scope="col">{{ trans('job.japanese_lavel') }}</th>
                                  <th scope="col">{{ trans('job.location') }}</th> 
                                  <th scope="col">{{ trans('job.action') }}</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($jobs AS $r=>$job)
                                <tr>
                                  <th scope="row">{{ $job->job_id }}</th>
                                  <td>{{ $job->title }}</td>
                                  <td>{{ $job->prefecture }}</td>
                                  <td>{{ $job->japanese_lavel }}</td>
                                  <td>{{ $job->location }}</td>
                                  <td>
                                    <a href="{{ route('addJob',['job_id'=>$job->job_id]) }}" class="btn btn-success btn-sm"><i class="fa fa-link"></i>&nbsp; {{ trans('job.edit') }}</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticModal"><i class="fa fa-remove"></i>&nbsp; {{ trans('job.delete') }}</button>
                                  </td>
                                </tr>
                                <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                  <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">{{ trans('job.delete') }} ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                               Are you sure you want to delete record?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a type="button" class="btn btn-primary" href="{{ route('deleteJob',['job_id'=>$job->job_id]) }}">Confirm</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>


        </div> <!-- .content -->
    
@endsection