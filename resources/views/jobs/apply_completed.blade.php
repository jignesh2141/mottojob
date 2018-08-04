@extends('layouts.mottojob_front')
@section('content')

    <!--Interview Process Section Start-->
    <section class="interview-process bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="msg-succsess">
                        <h2>Thank you. Your application was submitted succssfully.</h2>
                    </div>
                    <div class="process-title">
                        <h3>Process of interview</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">1. Decide a date of interview</h3>
                        <p class="step-des">The company will contact you by email or call in a fewdays.In case of email, you have to register a date of interview through registration form which is linked in the email. In case of call, you have to decide a date of interview by communicating with the manager of store. If youdon’t take any emails and calls from the company in a few days, you may be rejected by the company.</p>
                    </div>
                </div> 
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">2. Prepare for the interview</h3>
                        <p class="step-des">You should prepare Japanese CV to take a interview. Write why you want to work for the company to give a good impression to the manager You also should be careful about cloth when you go to the interview. You should be in formal style. Keep in mind that you arrive 5 or 10 minutes before the time you made an appointment.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">3. Take an interview</h3>
                        <p class="step-des">You should answer questions clearly. Then you can give a good impression by showing that you are motivated to the job. You should ask anything about transportation expense, shift time and so on. The result of the interview will be notified within a week.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="col-md-4 col-sm-5">
                        <div class="step-thumb">
                            <img src="images/blog-1.jpg">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <h3 class="step-title">4. After interview</h3>
                        <p class="step-des">When you get call or email which notify your success you should ask when you start to work and what you bring. If you get rejection, you should apply to another job.</p>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="ok-btn">
                    <a href="{{ route('mottojobs') }}">OK</a>
                </div>
            </div>
        </div>
    </section>
    
    <!--Interview Process Section Over-->

@endsection