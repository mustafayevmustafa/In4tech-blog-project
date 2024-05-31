@extends('user.layout')

@if($slider)
@section('content')

@include('user.include.header',['slider' => $slider, 'is_header' => true])
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">

        <div class="col-md-10 col-lg-8 col-xl-7">
            <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
            <div class="my-5">
                <form id="contactForm" method="post" action="/contact">
                    @csrf
                    <div class="form-floating">
                        <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" data-sb-can-submit="no">
                        <label for="name">Name</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-floating">
                        <input name="email" class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" data-sb-can-submit="no">
                        <label for="email">Email address</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="form-floating">
                        <input name="phone" class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" data-sb-can-submit="no">
                        <label for="phone">Phone Number</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <div class="form-floating">
                        <textarea name="message" class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required" data-sb-can-submit="no"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <br>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br>
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <!-- Submit Button-->
                    <button type="submit" class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@else
<h1 class="text-center">There is no info at Server</h1>
@endif
