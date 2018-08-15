@extends('layouts.mottojob_front')
@section('content')

    <!--Apply Form Section Start-->
    <section class="apply-form bg-gray section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-title">
                        <h2>Apply for this Job</h2>
                    </div>
                </div>
                
                <div class="form-section">
                    <form action="{{ route('applyJob') }}" id="applyForm" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="job_id" value="{{request()->route('id')}}">
                        <div class="form-sub-title">
                            <h3>Personal</h3>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="form-group">
                                <label class="control-label">First Name<span class="required">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" placeholder="Enter First Name" name="first_name" value="{{ @$old->first_name ? @$old->first_name : old('first_name') }}"  required />
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">First Name in hiragana</label>
                                <input type="text" class="form-control" placeholder="First Name in hiragana" name="first_name_hiragana" value="{{ @$old->first_name_hiragana ? @$old->first_name_hiragana : old('first_name_hiragana') }}" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name<span class="required">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="Enter Last Name" name="last_name" value="{{ @$old->last_name ? @$old->last_name : old('last_name') }}" required />
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name in hiragana</label>
                                <input type="text" class="form-control" placeholder="Last Name in hiragana" name="last_name_hiragana" value="{{ @$old->last_name_hiragana ? @$old->last_name_hiragana : old('last_name_hiragana') }}" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone number<span class="required">*</span></label>
                                <input type="mobile" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" placeholder="Phone number" name="phone_number" value="{{ @$old->phone_number ? @$old->phone_number : old('phone_number') }}" required />
                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of birth<span class="required">*</span></label>
                                <div class="col-md-4 no-padding">
                                    <select class="form-control {{ $errors->has('birth_year') ? 'is-invalid' : '' }}" name="birth_year" required>
                                        <option value="" selected></option>
                                        @for ($i = 1970; $i <= 2018; $i++)
                                        <option {{ @$old->birth_year == $i ? 'selected':''}}  value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control col-md-2 {{ $errors->has('birth_month') ? 'is-invalid' : '' }}" name="birth_year" required>
                                        <option value="" selected></option>
                                        @for ($i = 01; $i <= 12; $i++)
                                        <option {{ @$old->birth_month == $i ? 'selected':''}}  value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control col-md-2 {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" name="birth_year" required>
                                        <option value="" selected></option>
                                        @for ($i = 01; $i <= 31; $i++)
                                        <option {{ @$old->birth_date == $i ? 'selected':''}}  value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nationality<span class="required">*</span></label>
                                <select class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality" required>
                                    <option value="" selected>Please Select</option>
                                    <option {{ @$old->nationality == "Japanes" ? 'selected':''}}  value="Japanes">Japanes</option>
                                    <option {{ @$old->nationality == "Indian" ? 'selected':''}} value="Indian">Indian</option>
                                    <option {{ @$old->nationality == "Chines" ? 'selected':''}} value="Chines">Chines</option>
                                    <option {{ @$old->nationality == "Pakishtani" ? 'selected':''}} value="Pakishtani">Pakishtani</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender<span class="required">*</span></label>

                                <label class="checkbox-inline"><input type="radio" name="gender" {{ @$old->gender == "1" ? 'checked':''}} value="1"><span class="label-text">Male</span></label>

                                <label class="checkbox-inline"><input type="radio" name="gender" {{ @$old->gender == "2" ? 'checked':''}} value="2"><span class="label-text">FeMale</span></label>

                                <label class="checkbox-inline"><input type="radio" name="gender" {{ @$old->gender == "3" ? 'checked':''}} value="3"><span class="label-text">Others</span></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Are you currently living in Japan ? <span class="required">*</span></label>
                                <label class="checkbox-inline"><input type="radio" name="living_in_japan" {{ @$old->living_in_japan == "1" ? 'checked':''}} value="1"><span class="label-text">Yes</span></label>

                                <label class="checkbox-inline"><input type="radio" name="living_in_japan" {{ @$old->living_in_japan == "2" ? 'checked':''}} value="2"><span class="label-text">No</span></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Prefecture<span class="required">*</span></label>
                                <select class="form-control {{ $errors->has('prefecture') ? 'is-invalid' : '' }}" name="prefecture" required>
                                    <option value="" selected>Please Select</option>
                                    <option {{ @$old->prefecture == "Prefecture 1" ? 'selected':''}} value="Prefecture 1">Prefecture 1</option>
                                    <option {{ @$old->prefecture == "Prefecture 2" ? 'selected':''}} value="Prefecture 2">Prefecture 2</option>
                                    <option {{ @$old->prefecture == "Prefecture 3" ? 'selected':''}} value="Prefecture 3">Prefecture 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Visa<span class="required">*</span></label>
                                <select class="form-control {{ $errors->has('visa') ? 'is-invalid' : '' }}" name="visa" required>
                                    <option value="" selected>Please Select</option>
                                    <option {{ @$old->visa == "1" ? 'selected':''}} value="1">Example 1</option>
                                    <option {{ @$old->visa == "2" ? 'selected':''}} value="2">Example 2</option>
                                    <option {{ @$old->visa == "3" ? 'selected':''}} value="3">Example 3</option>
                                </select>
                            </div>
                            @if (Auth::guest())
                                <div class="form-sub-title">
                                    <h3>Account</h3>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Username<span class="required">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter Username" name="name" value="{{ old('name') }}" required />
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email<span class="required">*</span></label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter Email" name="email" value="{{ old('email') }}" required />
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password<span class="required">*</span></label>
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password" required />
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Verify Password<span class="required">*</span></label>
                                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Verify Password" name="password_confirmation" required />
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif
                            <div class="form-sub-title">
                                <h3>Message to the employer</h3>
                            </div>
                            <div class="form-group">
                                <p class="emp-msg">Do you have anything you want your employer to know before applying to this job?</p>
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Question<span class="required">*</span></label> -->
                                <select class="form-control" name="question">
                                    <option value="0" selected>Please Select</option>
                                    <option value="1">Question 1</option>
                                    <option value="2">Question 2</option>
                                    <option value="3">Question 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <select class="form-control" name="requirement">
                                    <option value="0" selected>Please Select</option>
                                    <option value="1">Requirement 1</option>
                                    <option value="2">Requirement 2</option>
                                    <option value="3">Requirement 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <textarea placeholder="Othere (write in Japanese)" name="comment" class=""></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <input type="submit" value="Apply" class="form-control" placeholder="Enter First Name"  />
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 col-sm-12 no-padding">
                        <p class="privacy">By applying for this job, I agree to Bunpo’s <a href="#"> Terms of service</a> and <a href="#"> Privacy Policy.</a></p>
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