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
          <form action="{{ route('updatePage',['page_id'=>$en_page[0]->page_id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}

                    <div class="card">
                      <div class="card-header">
                        <strong>Add/Edit</strong> Page
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Title</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_title" placeholder="EN Title" class="form-control" value="{{ $en_page[0]->title }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_title" placeholder="JA Title" class="form-control" value="{{ $ja_page[0]->title }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Slug</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_slug" placeholder="EN Slug" class="form-control" value="{{ $en_page[0]->slug }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_slug" placeholder="JA Slug" class="form-control" value="{{ $ja_page[0]->slug }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Description</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_description" id="textarea-input" rows="9" placeholder="EN Content..." class="form-control">{{ $en_page[0]->description }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_description" id="textarea-input" rows="9" placeholder="JA Content..." class="form-control">{{ $ja_page[0]->description }}</textarea></div>
                          </div>

                          <input type="hidden" name="en_id" value="{{ $en_page[0]->id }}">
                          <input type="hidden" name="ja_id" value="{{ $ja_page[0]->id }}">
                        
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

   @endsection