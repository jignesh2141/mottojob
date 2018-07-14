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
          <form action="{{ route('saveJob') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}
                    <div class="card">
                      <div class="card-header">
                        <strong>Add/Edit</strong> Job
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Title</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_title" placeholder="EN Title" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_title" placeholder="JA Title" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Corporate Name</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_corporate_name" placeholder="EN Corporate Name" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_corporate_name" placeholder="JA Corporate Name" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Type</label></div>
                            <div class="col-12 col-md-5">
                              <select name="en_job_type" id="en_job_type" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Restaurant</option>
                                <option value="2">Hotel & Guesthouse</option>
                              </select>
                            </div>
                            <div class="col-12 col-md-5">
                              <select name="ja_job_type" id="ja_job_type" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Restaurant</option>
                                <option value="2">Hotel & Guesthouse</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Prefecture</label></div>
                            <div class="col-12 col-md-5">
                              <select name="en_prefecture" id="en_prefecture" class="form-control">
                                <option value="0">Please select</option>
                                <option value="Kyoto">Kyoto</option>
                                <option value="Osaka">Osaka</option>
                              </select>
                            </div>
                            <div class="col-12 col-md-5">
                              <select name="ja_prefecture" id="ja_prefecture" class="form-control">
                                <option value="0">Please select</option>
                                <option value="Kyoto">Kyoto</option>
                                <option value="Osaka">Osaka</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Japanese Lavel</label></div>
                            <div class="col-12 col-md-5">
                              <select name="en_japanese_lavel" id="en_japanese_lavel" class="form-control">
                                <option value="0">Please select</option>
                                <option value="JLPT N1">JLPT N1</option>
                                <option value="JLPT N2">JLPT N2</option>
                                <option value="JLPT N3">JLPT N3</option>
                                <option value="JLPT N4">JLPT N4</option>
                              </select>
                            </div>
                            <div class="col-12 col-md-5">
                              <select name="ja_japanese_lavel" id="ja_japanese_lavel" class="form-control">
                                <option value="0">Please select</option>
                                <option value="JLPT N1">JLPT N1</option>
                                <option value="JLPT N2">JLPT N2</option>
                                <option value="JLPT N3">JLPT N3</option>
                                <option value="JLPT N4">JLPT N4</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Location</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_location" placeholder="EN Location" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_location" placeholder="JA Location" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Description</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_description" id="en-ckeditor'" rows="9" placeholder="EN Content..." class="form-control"></textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_description" id="ja-ckeditor'" rows="9" placeholder="JA Content..." class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Requirements</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_requirements" id="en-ckeditor'" rows="9" placeholder="EN Content..." class="form-control"></textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_requirements" id="ja-ckeditor'" rows="9" placeholder="JA Content..." class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">No. of Vacancy</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_no_of_vacancy" placeholder="EN Vacancy" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_no_of_vacancy" placeholder="JA Vacancy" class="form-control"></div>
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <a href="{{route('jobs')}}" class="btn btn-danger btn-sm">
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