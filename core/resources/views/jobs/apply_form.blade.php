@extends('layouts.mottojob_front')

@section('content')



    <!--Apply Form Section Start-->

    <section class="apply-form bg-gray section-padding">

        <div class="container">

            <div class="row">

                <div class="col-md-12 col-sm-12">

                    <div class="form-title">

                        <h2>{{ trans('job.apply_job') }}</h2>

                    </div>

                </div>



                <div class="form-section">

                    <form action="{{ route('applyJob') }}" id="applyForm" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <input type="hidden" name="job_id" value="{{request()->route('id')}}">

                        <div class="form-sub-title">

                            <h3>{{ trans('job.personal') }}</h3>

                        </div>

                        <div class="col-md-12 no-padding">

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.first_name') }}<span class="required">*</span></label>

                                <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" placeholder="{{ trans('job.first_name') }}" name="first_name" value="{{ @$old->first_name ? @$old->first_name : old('first_name') }}"  required />

                                @if ($errors->has('first_name'))

                                    <span class="invalid-feedback text-danger" role="alert">

                                        <strong>{{ $errors->first('first_name') }}</strong>

                                    </span>

                                @endif

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.first_name_hir') }}</label>

                                <input type="text" class="form-control" placeholder="{{ trans('job.first_name_hir') }}" name="first_name_hiragana" value="{{ @$old->first_name_hiragana ? @$old->first_name_hiragana : old('first_name_hiragana') }}" />

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.last_name') }}<span class="required">*</span></label>

                                <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="{{ trans('job.last_name') }}" name="last_name" value="{{ @$old->last_name ? @$old->last_name : old('last_name') }}" required />

                                @if ($errors->has('last_name'))

                                    <span class="invalid-feedback text-danger" role="alert">

                                        <strong>{{ $errors->first('last_name') }}</strong>

                                    </span>

                                @endif

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.last_name_hir') }}</label>

                                <input type="text" class="form-control" placeholder="{{ trans('job.last_name_hir') }}" name="last_name_hiragana" value="{{ @$old->last_name_hiragana ? @$old->last_name_hiragana : old('last_name_hiragana') }}" />

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.phone_number') }}<span class="required">*</span></label>

                                <input type="mobile" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" placeholder="{{ trans('job.phone_number') }}" name="phone_number" value="{{ @$old->phone_number ? @$old->phone_number : old('phone_number') }}" required />

                                @if ($errors->has('phone_number'))

                                    <span class="invalid-feedback text-danger" role="alert">

                                        <strong>{{ $errors->first('phone_number') }}</strong>

                                    </span>

                                @endif

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.date_of_birth') }}<span class="required">*</span></label>

                                <div class="col-md-4 no-padding r-mb-10">

                                    <select class="form-control {{ $errors->has('birth_year') ? 'is-invalid' : '' }}" name="birth_year" required>

                                        <option value="" selected>{{ __('general.year') }}</option>

                                        @for ($i = 1970; $i <= 2018; $i++)

                                        <option {{ @$old->birth_year == $i ? 'selected':''}}  value="{{$i}}">{{$i}}</option>

                                        @endfor

                                    </select>

                                </div>

                                <div class="col-md-3 r-p-0 r-mb-10">

                                    <select class="form-control col-md-2 {{ $errors->has('birth_month') ? 'is-invalid' : '' }}" name="birth_month" required>

                                        <option value="" selected>{{ __('general.month') }}</option>

                                        @foreach($months as $month)

                                        <option {{ @$old->birth_month == $month ? 'selected':''}}  value="{{$month}}">{{$month}}</option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-3 r-p-0">

                                    <select class="form-control col-md-2 {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" name="birth_date" required>

                                        <option value="" selected>{{ __('general.day') }}</option>

                                        @for ($i = 01; $i <= 31; $i++)

                                        <option {{ @$old->birth_date == $i ? 'selected':''}}  value="{{$i}}">{{$i}}</option>

                                        @endfor

                                    </select>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.nationality') }}<span class="required">*</span></label>

                                <select class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality" required>

                                    <option value="" selected>{{ trans('job.please_select') }}</option>

                                    <option {{ @$old->nationality == "Japanes" ? 'selected':''}}  value="Japanes">Japanes</option>

                                    <option {{ @$old->nationality == "Indian" ? 'selected':''}} value="Indian">Indian</option>

                                    <option {{ @$old->nationality == "Chines" ? 'selected':''}} value="Chines">Chines</option>

                                    <option {{ @$old->nationality == "Pakishtani" ? 'selected':''}} value="Pakishtani">Pakishtani</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.gender') }}<span class="required">*</span></label>



                                <label class="checkbox-inline"><input type="radio" name="gender" {{ @$old->gender == "1" ? 'checked':''}} value="1"><span class="label-text">Male</span></label>



                                <label class="checkbox-inline"><input type="radio" name="gender" {{ @$old->gender == "2" ? 'checked':''}} value="2"><span class="label-text">FeMale</span></label>



                                <label class="checkbox-inline"><input type="radio" name="gender" {{ @$old->gender == "3" ? 'checked':''}} value="3"><span class="label-text">Others</span></label>

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.living_in_japan') }} <span class="required">*</span></label>

                                <label class="checkbox-inline"><input type="radio" name="living_in_japan" {{ @$old->living_in_japan == "1" ? 'checked':''}} value="1"><span class="label-text">Yes</span></label>



                                <label class="checkbox-inline"><input type="radio" name="living_in_japan" {{ @$old->living_in_japan == "2" ? 'checked':''}} value="2"><span class="label-text">No</span></label>

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.prefecture') }}<span class="required">*</span></label>

                                <select class="form-control {{ $errors->has('prefecture') ? 'is-invalid' : '' }}" name="prefecture" required>

                                    <option value="" selected>{{ trans('job.please_select') }}</option>

                                    <option {{ @$old->prefecture == "Prefecture 1" ? 'selected':''}} value="Prefecture 1">Prefecture 1</option>

                                    <option {{ @$old->prefecture == "Prefecture 2" ? 'selected':''}} value="Prefecture 2">Prefecture 2</option>

                                    <option {{ @$old->prefecture == "Prefecture 3" ? 'selected':''}} value="Prefecture 3">Prefecture 3</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label class="control-label">{{ trans('job.visa') }}<span class="required">*</span></label>

                                <select class="form-control {{ $errors->has('visa') ? 'is-invalid' : '' }}" name="visa" required>

                                    <option value="" selected>{{ trans('job.please_select') }}</option>

                                    <option {{ @$old->visa == "1" ? 'selected':''}} value="1">Example 1</option>

                                    <option {{ @$old->visa == "2" ? 'selected':''}} value="2">Example 2</option>

                                    <option {{ @$old->visa == "3" ? 'selected':''}} value="3">Example 3</option>

                                </select>

                            </div>

                            @if (Auth::guest())

                                <div class="form-sub-title">

                                    <h3>{{ trans('job.account') }}</h3>

                                </div>

                                <div class="form-group">

                                    <label class="control-label">{{ trans('job.username') }}<span class="required">*</span></label>

                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="{{ trans('job.username') }}" name="name" value="{{ old('name') }}" required />

                                    @if ($errors->has('name'))

                                        <span class="invalid-feedback text-danger" role="alert">

                                            <strong>{{ $errors->first('name') }}</strong>

                                        </span>

                                    @endif

                                </div>

                                <div class="form-group">

                                    <label class="control-label">{{ trans('job.email') }}<span class="required">*</span></label>

                                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="{{ trans('job.email') }}" name="email" value="{{ old('email') }}" required />

                                    @if ($errors->has('email'))

                                        <span class="invalid-feedback text-danger" role="alert">

                                            <strong>{{ $errors->first('email') }}</strong>

                                        </span>

                                    @endif

                                </div>

                                <div class="form-group">

                                    <label class="control-label">{{ trans('job.password') }}<span class="required">*</span></label>

                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="{{ trans('job.password') }}" name="password" required />

                                    @if ($errors->has('password'))

                                        <span class="invalid-feedback text-danger" role="alert">

                                            <strong>{{ $errors->first('password') }}</strong>

                                        </span>

                                    @endif

                                </div>

                                <div class="form-group">

                                    <label class="control-label">{{ trans('job.verify_pass') }}<span class="required">*</span></label>

                                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="{{ trans('job.verify_pass') }}" name="password_confirmation" required />

                                    @if ($errors->has('password_confirmation'))

                                        <span class="invalid-feedback text-danger" role="alert">

                                            <strong>{{ $errors->first('password_confirmation') }}</strong>

                                        </span>

                                    @endif

                                </div>

                            @endif

                            <div class="form-sub-title">

                                <h3>{{ trans('job.msg_employer') }}</h3>

                            </div>

                            <div class="form-group">

                                <p class="emp-msg">{{ trans('job.before_job') }}</p>

                            </div>

                            <div class="form-group">

                                <!-- <label class="control-label">Question<span class="required">*</span></label> -->

                                <select class="form-control" name="question">

                                    <option value="0" selected>{{ trans('job.please_select') }}</option>

                                    <option value="1">Question 1</option>

                                    <option value="2">Question 2</option>

                                    <option value="3">Question 3</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label class="control-label"></label>

                                <select class="form-control" name="requirement">

                                    <option value="0" selected>{{ trans('job.please_select') }}</option>

                                    <option value="1">Requirement 1</option>

                                    <option value="2">Requirement 2</option>

                                    <option value="3">Requirement 3</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label class="control-label"></label>

                                <textarea placeholder="{{ trans('job.other') }}" name="comment" class=""></textarea>

                            </div>

                            <div class="form-group">

                                <label class="control-label"></label>

                                <input type="submit" value="{{ trans('job.apply') }}" class="form-control" />

                            </div>

                        </div>

                    </form>

                    <div class="col-md-12 col-sm-12 no-padding">

                        <p class="privacy">{{ trans('job.by_applying') }} <a href="{{ url('/page/terms-of-service') }}">{{ trans('general.terms of service') }}</a> {{ trans('job.and') }} <a href="{{ url('/page/privacy-policy') }}">{{ trans('general.privacy policy') }}</a></p>

                    </div>

                </div>



            </div>

        </div>

    </section>

    <!--Apply Form Section Over-->



    <script>

    $().ready(function() {

        // validate the comment form when it is submitted

        $("#applyForm").validate();

    });

    </script>



@endsection
