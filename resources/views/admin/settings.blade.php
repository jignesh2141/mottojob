@extends('layouts.admin')
@section('content')
        
        @if($errors->any())
           @foreach ($errors->all() as $error)
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Error</span>
                    {{$error}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endforeach
        @endif

        @if(session()->has('message'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
                    {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="col-lg-12">
          <form action="{{ route('saveSetting') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}


                    <div class="card">
                      <div class="card-header">
                        <strong>{{ trans('page.settings') }}</strong>
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.title') }}</label></div>
                            <div class="col-12 col-md-8"><input type="text" id="text-input" name="title" placeholder="Title" class="form-control" value="{{ $setting[0]->title }}"></div>
                          </div>
                          
                          
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.meta_keywords') }}</label></div>
                            <div class="col-12 col-md-8"><textarea name="meta_keywords" id="meta_keywords" rows="9" placeholder="Keywords" class="form-control">{{ $setting[0]->meta_keywords }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.meta_description') }}</label></div>
                            <div class="col-12 col-md-8"><textarea name="meta_description" id="meta_description" rows="9" placeholder="Description" class="form-control">{{ $setting[0]->meta_description }}</textarea></div>
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> {{ trans('page.submit') }}
                        </button>
                      </div>
                    </div>
                    </form>
        </div>


        </div> <!-- .content -->

        <script>
            CKEDITOR.replace( 'meta_keywords' );
            CKEDITOR.replace( 'meta_description' );
        </script>

@endsection