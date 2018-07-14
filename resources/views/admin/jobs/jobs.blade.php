@extends('layouts.admin')
@section('content')
      <form action="{{ route('manageSession') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                      <a href="{{route('addJob')}}" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="col-md-4">
                      <select name="lang_locale" id="lang_locale" class="form-control">
                        <option value="0">Please select</option>
                        <option {{ Session::get('lang_locale') == "en" ? 'selected':''}} value="en">EN</option>
                        <option {{ Session::get('lang_locale') == "ja" ? 'selected':''}} value="ja">にほんご</option>
                      </select>
                      {{ csrf_field() }}
                      <input type="hidden" name="route" value="jobs">
                    </div>
                </div>
            </div>
            
        </div>
      </form>
        
        <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Jobs</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Prefecture</th>
                                  <th scope="col">Japanese Lavel</th>
                                  <th scope="col">Location</th> 
                                  <th scope="col">Action</th>
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
                                    <a href="{{ route('addJob',['job_id'=>$job->job_id]) }}" class="btn btn-outline-link btn-sm"><i class="fa fa-link"></i>&nbsp; Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticModal"><i class="fa fa-remove"></i>&nbsp; Danger</button>
                                  </td>
                                </tr>
                                <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                  <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">Delete ?</h5>
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

        <script type="text/javascript">
          var select = document.getElementById('lang_locale');
          select.addEventListener('change', function(){
              this.form.submit();
          }, false);
        </script>
    
@endsection