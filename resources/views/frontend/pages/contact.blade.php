@extends('frontend.layouts.skeleton')

@section('inside-head')
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaReady" async defer"></script>
<script>
    function onSubmit(token) {
          document.getElementById("contact-form").submit();
        }
</script>
@endsection

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
                        <span>Hello! Why Are You Contacting Us Today?</span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="subject" class="form-label">Subject<sup>*</sup></label>
                        <div class="form-input">
                            <div class="select-css-wrapper">
                                <select required name="subject" id="subject" class="select-css">
                                    <option value="">Please Select</option>
                                    <option value="1">Subject 1</option>
                                    <option value="2">Subject 2</option>
                                    <option value="3">Subject 3</option>
                                </select>
                            </div>
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
                        <label for="name" class="form-label">Name<sup>*</sup></label>
                        <div class="form-input">
                            <input required type="text" name="name" id="name" class="form-control"
                                placeholder="Type your name">
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="form-col">
                        <label for="email" class="form-label">Email<sup>*</sup></label>
                        <div class="form-input">
                            <input required type="email" name="email" id="email" class="form-control"
                                placeholder="Type your email address">
                        </div>
                    </div>

                    <div class="form-col">
                        <label for="email" class="form-label">Phone<sup>*</sup></label>
                        <div class="form-input">
                            <input required type="text" name="phone" id="phone" class="form-control"
                                placeholder="Type your phone number">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="name" class="form-label">Message</label>
                        <div class="form-input">
                            <textarea name="message" id="message" cols="30" rows="2" class="form-control"
                                placeholder="Type your message here"></textarea>
                        </div>
                    </div>
                </div>

                <div id="grecaptcha"></div>

                <div class="form-row">
                    <div class="form-col text-center form-submit">
                        <button class="btn btn-ghost-crimson btn-submit">SUBMIT</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('before-body-end')
<script src="{{ asset('static/js/parsley.min.js') }}"></script>
<script src="{{ asset('static/js/contact.js') }}"></script>
@endsection
