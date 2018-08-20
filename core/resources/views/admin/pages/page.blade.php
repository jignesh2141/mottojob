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
                        <strong>{{ trans('page.add') }}/{{ trans('page.edit') }}</strong> {{ trans('page.page') }}
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-2"></div>
                            <div class="col-12 col-md-5">
                              <div class="card-title">
                                  <h4 class="text-center">English</h4>
                              </div>
                            </div>
                            <div class="col-12 col-md-5">
                              <div class="card-title">
                                  <h4 class="text-center">Japanese</h4>
                              </div>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.title') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_title" placeholder="{{ trans('page.title') }}" class="form-control" value="{{ old('en_title') }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_title" placeholder="{{ trans('page.title') }}" class="form-control" value="{{ old('ja_title') }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.slug') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_slug" placeholder="{{ trans('page.slug') }}" class="form-control" value="{{ old('en_slug') }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_slug" placeholder="{{ trans('page.slug') }}" class="form-control" value="{{ old('ja_slug') }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.description') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_description" id="en_description" rows="9" class="form-control">{{ old('en_description') }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_description" id="ja_description" rows="9" class="form-control">{{ old('ja_description') }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.meta_keywords') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_meta_keywords" rows="9" class="form-control">{{ old('en_meta_keywords') }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_meta_keywords" rows="9" class="form-control">{{ old('ja_meta_keywords') }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('page.meta_description') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_meta_description" rows="9" class="form-control">{{ old('en_meta_description') }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_meta_description" rows="9" class="form-control">{{ old('ja_meta_description') }}</textarea></div>
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> {{ trans('page.submit') }}
                        </button>
                        <a href="{{route('pages')}}" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> {{ trans('page.cancel') }}
                        </a>
                      </div>
                    </div>
                    </form>
        </div>


        </div> <!-- .content -->

        <script>
            CKEDITOR.replace( 'en_description' );
            CKEDITOR.replace( 'ja_description' );
        </script>

@endsection