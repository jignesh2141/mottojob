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
                        <strong>{{ trans('job.add') }}/{{ trans('job.edit') }}</strong> {{ trans('job.job') }}
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
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.title') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_title" placeholder="{{ trans('job.title') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_title" placeholder="{{ trans('job.title') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.corporate_name') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_corporate_name" placeholder="{{ trans('job.corporate_name') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_corporate_name" placeholder="{{ trans('job.corporate_name') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.restaurant') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_restaurant" placeholder="{{ trans('job.restaurant') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_restaurant" placeholder="{{ trans('job.restaurant') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.designation') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_designation" placeholder="{{ trans('job.designation') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_designation" placeholder="{{ trans('job.designation') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.type') }}</label></div>
                            <div class="col-12 col-md-8">
                              <select name="en_job_type" id="en_job_type" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Restaurant</option>
                                <option value="2">Hotel & Guesthouse</option>
                              </select>
                            </div>
                            <!-- <div class="col-12 col-md-5">
                              <select name="ja_job_type" id="ja_job_type" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Restaurant</option>
                                <option value="2">Hotel & Guesthouse</option>
                              </select>
                            </div> -->
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.prefecture') }}</label></div>
                            <div class="col-12 col-md-8">
                              <select name="en_prefecture" id="en_prefecture" class="form-control">
                                <option value="0">Please select</option>
                                <option value="Kyoto">Kyoto</option>
                                <option value="Osaka">Osaka</option>
                              </select>
                            </div>
                            <!-- <div class="col-12 col-md-5">
                              <select name="ja_prefecture" id="ja_prefecture" class="form-control">
                                <option value="0">Please select</option>
                                <option value="Kyoto">Kyoto</option>
                                <option value="Osaka">Osaka</option>
                              </select>
                            </div> -->
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.japanese_lavel') }}</label></div>
                            <div class="col-12 col-md-8">
                              <select name="en_japanese_lavel" id="en_japanese_lavel" class="form-control">
                                <option value="0">Please select</option>
                                <option value="JLPT N1">JLPT N1</option>
                                <option value="JLPT N2">JLPT N2</option>
                                <option value="JLPT N3">JLPT N3</option>
                                <option value="JLPT N4">JLPT N4</option>
                              </select>
                            </div>
                            <!-- <div class="col-12 col-md-5">
                              <select name="ja_japanese_lavel" id="ja_japanese_lavel" class="form-control">
                                <option value="0">Please select</option>
                                <option value="JLPT N1">JLPT N1</option>
                                <option value="JLPT N2">JLPT N2</option>
                                <option value="JLPT N3">JLPT N3</option>
                                <option value="JLPT N4">JLPT N4</option>
                              </select>
                            </div> -->
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.location') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_location" placeholder="{{ trans('job.location') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_location" placeholder="{{ trans('job.location') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.description') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_description" id="en-description" rows="9" class="form-control"></textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_description" id="ja-description" rows="9" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.requirements') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_requirements" id="en-requirements" rows="9" class="form-control"></textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_requirements" id="ja-requirements" rows="9" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.no_of_vacancy') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_no_of_vacancy" placeholder="{{ trans('job.no_of_vacancy') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_no_of_vacancy" placeholder="{{ trans('job.no_of_vacancy') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.minimum_working_days_per_week') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_minimum_working_days_per_week" placeholder="{{ trans('job.minimum_working_days_per_week') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_minimum_working_days_per_week" placeholder="{{ trans('job.minimum_working_days_per_week') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.minimum_working_hours_per_day') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_minimum_working_hours_per_day" placeholder="{{ trans('job.minimum_working_hours_per_day') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_minimum_working_hours_per_day" placeholder="{{ trans('job.minimum_working_hours_per_day') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.community_expenses') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_community_expenses" id="en-expenses" rows="9" class="form-control"></textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_community_expenses" id="ja-expenses" rows="9" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.benefits') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_benefits" id="en-benefits" rows="9" class="form-control"></textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_benefits" id="ja-benefits" rows="9" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.salary') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_salary" placeholder="{{ trans('job.salary') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_salary" placeholder="{{ trans('job.salary') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.timing') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_timing" placeholder="{{ trans('job.timing') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_timing" placeholder="{{ trans('job.timing') }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.company_email') }}</label></div>
                            <div class="col-12 col-md-5"><input type="email" id="text-input" name="en_company_email" placeholder="{{ trans('job.company_email') }}" class="form-control"></div>
                            <div class="col-12 col-md-5"><input type="email" id="text-input" name="ja_company_email" placeholder="{{ trans('job.company_email') }}" class="form-control"></div>
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> {{ trans('job.submit') }}
                        </button>
                        <a href="{{route('jobs')}}" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> {{ trans('job.cancel') }}
                        </a>
                      </div>
                    </div>
                    </form>
        </div>


        </div> <!-- .content -->
        <script>
            CKEDITOR.replace( 'en-description' );
            CKEDITOR.replace( 'ja-description' );
            CKEDITOR.replace( 'en-requirements' );
            CKEDITOR.replace( 'ja-requirements' );
            CKEDITOR.replace( 'en-expenses' );
            CKEDITOR.replace( 'ja-expenses' );
            CKEDITOR.replace( 'en-benefits' );
            CKEDITOR.replace( 'ja-benefits' );
        </script>

@endsection