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
                    <form>
                        <div class="form-sub-title">
                            <h3>Personal</h3>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="form-group">
                                <label class="control-label">First Name<span class="required">*</span></label>
                                <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">First Name in hiragana</label>
                                <input  maxlength="100" type="text" required="required" class="form-control" placeholder="First Name in hiragana"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name<span class="required">*</span></label>
                                <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name in hiragana</label>
                                <input maxlength="100" type="text" required="required" class="form-control" placeholder="Last Name in hiragana" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone number<span class="required">*</span></label>
                                <input maxlength="100" type="mobile" required="required" class="form-control" placeholder="Phone number" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of birth<span class="required">*</span></label>
                                <input type="text" id="date" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="date" value="09-01-2013">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nationality<span class="required">*</span></label>
                                <select class="form-control">
                                    <option value="0" selected>Japanes</option>
                                    <option value="1">Indian</option>
                                    <option value="2">Chines</option>
                                    <option value="3">Pakishtani</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender<span class="required">*</span></label>
                                <label class="btn gender-btn">Male</label>
                                <label class="btn gender-btn">Female</label>
                                <label class="btn gender-btn">Others</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Are you currently living in Japan ? <span class="required">*</span></label>
                                <label class="btn ans-btn">Yes</label>
                                <label class="btn ans-btn">NO</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Prefecture<span class="required">*</span></label>
                                <select class="form-control">
                                    <option value="0" selected>Prefecture</option>
                                    <option value="1">Prefecture 1</option>
                                    <option value="2">Prefecture 2</option>
                                    <option value="3">Prefecture 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Visa<span class="required">*</span></label>
                                <select class="form-control">
                                    <option value="0" selected>Visa</option>
                                    <option value="1">Example 1</option>
                                    <option value="2">Example 2</option>
                                    <option value="3">Example 3</option>
                                </select>
                            </div>
                            <div class="form-sub-title">
                                <h3>Account</h3>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email<span class="required">*</span></label>
                                <input  maxlength="100" type="email" required="required" class="form-control" placeholder="Enter First Name"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password<span class="required">*</span></label>
                                <input  maxlength="100" type="password" required="required" class="form-control" placeholder="Enter First Name"  />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Verify Password<span class="required">*</span></label>
                                <input  maxlength="100" type="password" required="required" class="form-control" placeholder="Enter First Name"  />
                            </div>
                            <div class="form-sub-title">
                                <h3>Message to the employer</h3>
                            </div>
                            <div class="form-group">
                                <p class="emp-msg">Do you have anything you want your employer to know before applying to this job?</p>
                            </div>
                            <div class="form-group">
                                <!-- <label class="control-label">Question<span class="required">*</span></label> -->
                                <select class="form-control">
                                    <option value="0" selected>Question</option>
                                    <option value="1">Question 1</option>
                                    <option value="2">Question 2</option>
                                    <option value="3">Question 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <select class="form-control">
                                    <option value="0" selected>Requirements</option>
                                    <option value="1">Requirement 1</option>
                                    <option value="2">Requirement 2</option>
                                    <option value="3">Requirement 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <textarea placeholder="Othere (write in Japanese)" required="required" class=""></textarea>
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