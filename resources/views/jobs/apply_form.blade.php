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
                    <form action="{{ route('applyJob') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="job_id" value="{{request()->route('id')}}">
                        <div class="form-sub-title">
                            <h3>Personal</h3>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="form-group">
                                <label class="control-label">First Name<span class="required">*</span></label>
                                <input type="text" required="required" class="form-control" placeholder="Enter First Name" name="first_name" value="{{ old('first_name') }}" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">First Name in hiragana</label>
                                <input type="text" class="form-control" placeholder="First Name in hiragana" name="first_name_hiragana" value="{{ old('first_name_hiragana') }}" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name<span class="required">*</span></label>
                                <input type="text" required="required" class="form-control" placeholder="Enter Last Name" name="last_name" value="{{ old('last_name') }}" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name in hiragana</label>
                                <input type="text" class="form-control" placeholder="Last Name in hiragana" name="last_name_hiragana" value="{{ old('last_name_hiragana') }}" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone number<span class="required">*</span></label>
                                <input type="mobile" required="required" class="form-control" placeholder="Phone number" name="phone_number" value="{{ old('phone_number') }}" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of birth<span class="required">*</span></label>
                                <input type="text" id="date" data-format="DD-MM-YYYY" class="form-control" placeohlder="DD-MM-YYYY" data-template="D MMM YYYY" name="date_of_birth" value="{{ old('date_of_birth') }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nationality<span class="required">*</span></label>
                                <select class="form-control" name="nationality">
                                    <option value="0" selected>Japanes</option>
                                    <option value="Indian">Indian</option>
                                    <option value="Chines">Chines</option>
                                    <option value="Pakishtani">Pakishtani</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender<span class="required">*</span></label>
                                <label class="checkbox-inline"><input type="radio" name="gender" value="1">Male</label>
                                <label class="checkbox-inline"><input type="radio" name="gender" value="2">Female</label>
                                <label class="checkbox-inline"><input type="radio" name="gender" value="3">Others</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Are you currently living in Japan ? <span class="required">*</span></label>
                                <label class="checkbox-inline"><input type="radio" name="living_in_japan" value="Yes">Yes</label>
                                <label class="checkbox-inline"><input type="radio" name="living_in_japan" value="No">No</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Prefecture<span class="required">*</span></label>
                                <select class="form-control" name="prefecture">
                                    <option value="0" selected>Prefecture</option>
                                    <option value="Prefecture 1">Prefecture 1</option>
                                    <option value="Prefecture 2">Prefecture 2</option>
                                    <option value="Prefecture 3">Prefecture 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Visa<span class="required">*</span></label>
                                <select class="form-control" name="visa">
                                    <option value="0" selected>Visa</option>
                                    <option value="1">Example 1</option>
                                    <option value="2">Example 2</option>
                                    <option value="3">Example 3</option>
                                </select>
                            </div>
                            @if (Auth::guest())
                                <div class="form-sub-title">
                                    <h3>Account</h3>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Username<span class="required">*</span></label>
                                    <input type="text" required="required" class="form-control" placeholder="Enter Username" name="name" value="{{ old('name') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email<span class="required">*</span></label>
                                    <input type="email" required="required" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password<span class="required">*</span></label>
                                    <input type="password" required="required" class="form-control" placeholder="Password" name="password" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Verify Password<span class="required">*</span></label>
                                    <input type="password" required="required" class="form-control" placeholder="Verify Password" name="password_confirmation" />
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
                                    <option value="0" selected>Question</option>
                                    <option value="1">Question 1</option>
                                    <option value="2">Question 2</option>
                                    <option value="3">Question 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <select class="form-control" name="requirement">
                                    <option value="0" selected>Requirements</option>
                                    <option value="1">Requirement 1</option>
                                    <option value="2">Requirement 2</option>
                                    <option value="3">Requirement 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <textarea placeholder="Othere (write in Japanese)" required="required" name="comment" class=""></textarea>
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

@endsection