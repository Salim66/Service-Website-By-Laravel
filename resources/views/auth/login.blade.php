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
            
                <div class="title-box">
                    <h2>Login Now</h2>
                </div>
                
                <!--Login Form-->
                <div class="styled-form login-form">

                    <x-jet-validation-errors class="mb-4 text-danger" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                        @csrf

                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-envelope-o"></span></span>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus  placeholder="Emai Address*">
                        </div>
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-unlock-alt"></span></span>
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter Password">
                        </div>
                        <div class="clearfix">
                            <div class="form-group pull-left">
                                <button type="submit" class="theme-btn register-btn">Login <span class="arrow right flaticon-next-7"></span></button>
                            </div>
                        </div>
                        
                        <div class="clearfix">
                            <div class="pull-left">
                                <input type="checkbox" id="remember-me" name="remember"><label class="remember-me" for="remember-me">&nbsp; Remember Me</label>
                            </div>
                            <div class="pull-right">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </div>
                        </div>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __("Don't have account please register?") }}
                        </a>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!--End Register Section-->


@endsection
