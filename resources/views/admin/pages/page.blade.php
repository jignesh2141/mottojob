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

        <div class="col-lg-12">
          <form action="{{ route('savePage') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}
                    <div class="card">
                      <div class="card-header">
                        <strong>Add/Edit</strong> Page
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Title</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_title" placeholder="EN Title" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_title" placeholder="JA Title" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Slug</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_slug" placeholder="EN Slug" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_slug" placeholder="JA Slug" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Description</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_description" id="en-ckeditor'" rows="9" placeholder="EN Content..." class="form-control"></textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_description" id="ja-ckeditor'" rows="9" placeholder="JA Content..." class="form-control"></textarea></div>
                          </div>
                        
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <a href="{{route('pages')}}" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Cacel
                        </a>
                      </div>
                    </div>
                    </form>
        </div>


        </div> <!-- .content -->

        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'en-ckeditor' );
            CKEDITOR.replace( 'ja-ckeditor' );
        </script>

@endsection