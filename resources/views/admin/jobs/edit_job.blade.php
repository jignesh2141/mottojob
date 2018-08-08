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
          <form action="{{ route('updateJob',['job_id'=>$en_job[0]->job_id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_title" placeholder="{{ trans('job.title') }}" class="form-control" value="{{ $en_job[0]->title }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_title" placeholder="{{ trans('job.title') }}" class="form-control" value="{{ $ja_job[0]->title }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.corporate_name') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_corporate_name" placeholder="{{ trans('job.corporate_name') }}" class="form-control" value="{{ $en_job[0]->corporate_name }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_corporate_name" placeholder="{{ trans('job.corporate_name') }}" class="form-control" value="{{ $ja_job[0]->corporate_name }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.restaurant') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_restaurant" placeholder="{{ trans('job.restaurant') }}" class="form-control" value="{{ $en_job[0]->restaurant }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_restaurant" placeholder="{{ trans('job.restaurant') }}" class="form-control" value="{{ $ja_job[0]->restaurant }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.designation') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_designation" placeholder="{{ trans('job.designation') }}" class="form-control" value="{{ $en_job[0]->designation }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_designation" placeholder="{{ trans('job.designation') }}" class="form-control" value="{{ $ja_job[0]->designation }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.type') }}</label></div>
                            <div class="col-12 col-md-8">
                              <select name="en_job_type" id="en_job_type" class="form-control">
                                <option value="0">Please select</option>
                                <option {{ $en_job[0]->job_type == "1" ? 'selected':''}} value="1">Restaurant</option>
                                <option {{ $en_job[0]->job_type == "2" ? 'selected':''}} value="2">Hotel & Guesthouse</option>
                              </select>
                            </div>
                            <!-- <div class="col-12 col-md-5">
                              <select name="ja_job_type" id="ja_job_type" class="form-control">
                                <option value="0">Please select</option>
                                <option {{ $ja_job[0]->job_type == "1" ? 'selected':''}} value="1">Restaurant</option>
                                <option {{ $ja_job[0]->job_type == "2" ? 'selected':''}} value="2">Hotel & Guesthouse</option>
                              </select>
                            </div> -->
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.prefecture') }}</label></div>
                            <div class="col-12 col-md-8">
                              <select name="en_prefecture" id="en_prefecture" class="form-control">
                                <option value="0">Please select</option>
                                <option {{ $en_job[0]->prefecture == "Kyoto" ? 'selected':''}} value="Kyoto">Kyoto</option>
                                <option {{ $en_job[0]->prefecture == "Osaka" ? 'selected':''}} value="Osaka">Osaka</option>
                              </select>
                            </div>
                            <!-- <div class="col-12 col-md-5">
                              <select name="ja_prefecture" id="ja_prefecture" class="form-control">
                                <option value="0">Please select</option>
                                <option {{ $ja_job[0]->prefecture == "Kyoto" ? 'selected':''}} value="Kyoto">Kyoto</option>
                                <option {{ $ja_job[0]->prefecture == "Osaka" ? 'selected':''}} value="Osaka">Osaka</option>
                              </select>
                            </div> -->
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.japanese_lavel') }}</label></div>
                            <div class="col-12 col-md-8">
                              <select name="en_japanese_lavel" id="en_japanese_lavel" class="form-control">
                                <option value="0">Please select</option>
                                <option {{ $en_job[0]->japanese_lavel == "JLPT N1" ? 'selected':''}} value="JLPT N1">JLPT N1</option>
                                <option {{ $en_job[0]->japanese_lavel == "JLPT N2" ? 'selected':''}} value="JLPT N2">JLPT N2</option>
                                <option {{ $en_job[0]->japanese_lavel == "JLPT N3" ? 'selected':''}} value="JLPT N3">JLPT N3</option>
                                <option {{ $en_job[0]->japanese_lavel == "JLPT N4" ? 'selected':''}} value="JLPT N4">JLPT N4</option>
                                <option {{ $en_job[0]->japanese_lavel == "JLPT N5" ? 'selected':''}} value="JLPT N4">JLPT N5</option>
                              </select>
                            </div>
                            <!-- <div class="col-12 col-md-5">
                              <select name="ja_japanese_lavel" id="ja_japanese_lavel" class="form-control">
                                <option value="0">Please select</option>
                                <option {{ $ja_job[0]->japanese_lavel == "JLPT N1" ? 'selected':''}} value="JLPT N1">JLPT N1</option>
                                <option {{ $ja_job[0]->japanese_lavel == "JLPT N2" ? 'selected':''}} value="JLPT N2">JLPT N2</option>
                                <option {{ $ja_job[0]->japanese_lavel == "JLPT N3" ? 'selected':''}} value="JLPT N3">JLPT N3</option>
                                <option {{ $ja_job[0]->japanese_lavel == "JLPT N4" ? 'selected':''}} value="JLPT N4">JLPT N4</option>
                              </select>
                            </div> -->
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.image') }}</label></div>
                            <div class="col-12 col-md-6">
                              <input type="file" id="file-input" name="image" class="form-control-file">
                            </div>
                            <div class="col-12 col-md-4">
                              <div class="job-list-thumb">
                                  <img src="{{ asset('images/job/' . $en_job[0]->image) }}" alt="MottoJob" class="img-responsive" height="100" width="100">
                              </div>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.location') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_location" placeholder="{{ trans('job.location') }}" class="form-control" value="{{ $en_job[0]->location }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_location" placeholder="{{ trans('job.location') }}" class="form-control" value="{{ $ja_job[0]->location }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.lat_long') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="latitude" placeholder="{{ trans('job.latitude') }}" class="form-control" value="{{ $en_job[0]->latitude }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="longitute" placeholder="{{ trans('job.longitude') }}" class="form-control" value="{{ $en_job[0]->longitute }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.description') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_description" id="en-description" rows="9" class="form-control">{{ $en_job[0]->description }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_description" id="ja-description" rows="9" class="form-control">{{ $ja_job[0]->description }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.requirements') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_requirements" id="en-requirements" rows="9" class="form-control">{{ $en_job[0]->requirements }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_requirements" id="ja-requirements" rows="9" class="form-control">{{ $ja_job[0]->requirements }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.no_of_vacancy') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_no_of_vacancy" placeholder="{{ trans('job.no_of_vacancy') }}" class="form-control" value="{{ $en_job[0]->no_of_vacancy }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_no_of_vacancy" placeholder="{{ trans('job.no_of_vacancy') }}" class="form-control" value="{{ $ja_job[0]->no_of_vacancy }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.minimum_working_days_per_week') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_minimum_working_days_per_week" placeholder="{{ trans('job.minimum_working_days_per_week') }}" class="form-control" value="{{ $en_job[0]->minimum_working_days_per_week }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_minimum_working_days_per_week" placeholder="{{ trans('job.minimum_working_days_per_week') }}" class="form-control" value="{{ $ja_job[0]->minimum_working_days_per_week }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.minimum_working_hours_per_day') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_minimum_working_hours_per_day" placeholder="{{ trans('job.minimum_working_hours_per_day') }}" class="form-control" value="{{ $en_job[0]->minimum_working_hours_per_day }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_minimum_working_hours_per_day" placeholder="{{ trans('job.minimum_working_hours_per_day') }}" class="form-control" value="{{ $ja_job[0]->minimum_working_hours_per_day }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.community_expenses') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_community_expenses" id="en-expenses" rows="9" class="form-control">{{ $en_job[0]->community_expenses }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_community_expenses" id="ja-expenses" rows="9" class="form-control">{{ $ja_job[0]->community_expenses }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.benefits') }}</label></div>
                            <div class="col-12 col-md-5"><textarea name="en_benefits" id="en-benefits" rows="9" class="form-control">{{ $en_job[0]->benefits }}</textarea></div>
                            <div class="col-12 col-md-5"><textarea name="ja_benefits" id="ja-benefits" rows="9" class="form-control">{{ $ja_job[0]->benefits }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.salary') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_salary" placeholder="{{ trans('job.salary') }}" class="form-control" value="{{ $en_job[0]->salary }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_salary" placeholder="{{ trans('job.salary') }}" class="form-control" value="{{ $ja_job[0]->salary }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.timing') }}</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="en_timing" placeholder="{{ trans('job.timing') }}" class="form-control" value="{{ $en_job[0]->timing }}"></div>
                            <div class="col-12 col-md-5"><input type="text" id="text-input" name="ja_timing" placeholder="{{ trans('job.timing') }}" class="form-control" value="{{ $ja_job[0]->timing }}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">{{ trans('job.company_email') }}</label></div>
                            <div class="col-12 col-md-5"><input type="email" id="text-input" name="en_company_email" placeholder="{{ trans('job.company_email') }}" class="form-control" value="{{ $en_job[0]->company_email }}"></div>
                            <div class="col-12 col-md-5"><input type="email" id="text-input" name="ja_company_email" placeholder="{{ trans('job.company_email') }}" class="form-control" value="{{ $ja_job[0]->company_email }}"></div>
                          </div>

                          <input type="hidden" name="en_id" value="{{ $en_job[0]->id }}">
                          <input type="hidden" name="ja_id" value="{{ $ja_job[0]->id }}">
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