@extends('frontend.main_master')

@section('main')

<!--Page Title-->
<section class="page-title" style="background-image:url(/frontend/images/background/8.jpg);">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>My Account</h1>
            </div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>My Account</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Register Section-->
<section class="register-section">
    <div class="auto-container">
        <div class="row clearfix">

            <div class="form-column column col-lg-3 col-md-12 col-sm-12">
            </div>
            
            <!--Form Column-->
            <div class="form-column column col-lg-6 col-md-12 col-sm-12">
            
                <div class="title-box text-center">
                    <h2>Register Here</h2>
                </div>
                
                <!--Login Form-->
                <div class="styled-form register-form">
                    <x-jet-validation-errors class="mb-4 text-danger" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-user"></span></span>
                            <input type="text" name="name" placeholder="Your Name *">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"></span>
                            <input type="text" name="position" placeholder="Position *">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"></span>
                            <input type="text" name="company_name" placeholder="Company Name *">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-envelope-o"></span></span>
                            <input type="email" name="official_email"placeholder="Official Email*">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-envelope-o"></span></span>
                            <input type="email" name="email" placeholder="Personal Email*">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-envelope-o"></span></span>
                            <input type="text" name="number" placeholder="Number*">
                        </div>
                        <div class="form-group">
                            <label for="">Date Of Birth: </label>
                            <input type="date" name="date_of_birth" data-date-inline-picker="true">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-unlock-alt"></span></span>
                            <input type="password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-unlock-alt"></span></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                        </div>
                        <div class="clearfix">
                            <div class="form-group pull-left">
                                <button type="submit" class="theme-btn register-btn">Register <span class="arrow right flaticon-next-7"></span></button>
                            </div>
                            
                        </div>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </form>
                </div>
                
            </div>
            
        </div>
    </div>
</section>
<!--End Register Section-->


@endsection
