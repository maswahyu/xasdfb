@extends('frontend.layouts.skeleton')

@section('meta_title', 'Contact Us')
@section('head_title', 'Contact Us')
@section('head_url', url()->current())

@section('content')
<div class="container">

    <div class="row no-gutters">

        <div class="section-title section-title--plain section-title--page">
            <span class="section-title__label section-title__label--category">Contact Us</span>
        </div>

        <div class="span-12 span-lg-8 off-lg-2">

            <form id="contact-form" action="" method="" class="form">

                <div class="form-row group-legend group-legend--top-margin-small">
                    <div class="form-col">
                        <span>Hello! Why Are You Contacting Us Today?</span><br>
                        <span id="contact-war"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="subject" class="form-label">Subject</label>
                        <div class="form-input">
                            <input required type="text" name="subject" id="subject" class="form-control" placeholder="Type your subject">
                        </div>
                    </div>
                </div>

                <div class="form-row group-legend">
                    <div class="form-col">
                        <span>Tell Us Who You Are:</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="name" class="form-label">Name</label>
                        <div class="form-input">
                            <input required type="text" name="name" id="name" class="form-control" value="{{ (auth()->check()) ? auth()->user()->name : '' }}" placeholder="Type your name">
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="form-col">
                        <label for="email" class="form-label">Email</label>
                        <div class="form-input">
                            <input required type="email" name="email" id="email" class="form-control" value="{{ (auth()->check()) ? auth()->user()->email : '' }}" placeholder="Type your email address">
                        </div>
                    </div>

                    <div class="form-col">
                        <label for="email" class="form-label">Phone</label>
                        <div class="form-input">
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Type your phone number" data-parsley-pattern-message="Pastikan format no hp anda benar, contoh (0812xxxxxxxxxx)" maxlength="14" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="name" class="form-label">Message</label>
                        <div class="form-input">
                            <textarea name="message" id="message" cols="30" rows="2" class="form-control" placeholder="Type your message here"></textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                <div class="form-row">
                    <div class="form-col text-center form-submit">
                        <button class="btn btn-ghost-crimson btn-submit" type="submit" >SUBMIT</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="loading"></div>

@endsection

@section('before-body-end')
<script src="{{ asset('static/js/parsley.min.js') }}"></script>
<script src="{{ asset('static/js/contact.js') }}?v={{ filemtime(public_path() . '/static/js/contact.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('app.google_key') }}"></script>
<script type="text/javascript">
    var GOOGLE_KEY = '{{ config('app.google_key') }}'
</script>
@endsection
