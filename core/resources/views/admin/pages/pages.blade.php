@extends('layouts.admin')
@section('content')
      
        <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-right">
                  <a href="{{route('addPage')}}" class="btn btn-primary">{{ trans('page.add_new') }}</a>
                </div>
              </div>
            </div>
        </div>
      
        
        <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ trans('page.pages') }}</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">{{ trans('page.title') }}</th>
                                  <th scope="col">{{ trans('page.slug') }}</th>
                                  <th scope="col">{{ trans('page.action') }}</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($pages AS $r=>$page)
                                <tr>
                                  <th scope="row">{{ $page->page_id }}</th>
                                  <td>{{ $page->title }}</td>
                                  <td>{{ $page->slug }}</td>
                                  <td>
                                    <a href="{{ route('addPage',['page_id'=>$page->page_id]) }}" class="btn btn-success btn-sm"><i class="fa fa-link"></i>&nbsp; {{ trans('page.edit') }}</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticModal"><i class="fa fa-remove"></i>&nbsp; {{ trans('page.delete') }}</button>
                                  </td>
                                </tr>
                                <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                  <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">{{ trans('page.delete') }} ?</h5>
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
                                            <a type="button" class="btn btn-primary" href="{{ route('deletePage',['page_id'=>$page->page_id]) }}">Confirm</a>
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