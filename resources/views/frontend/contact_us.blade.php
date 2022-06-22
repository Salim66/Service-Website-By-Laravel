@extends('frontend.main_master')

@section('main')

@php
    $contract_us = \App\Models\ContactUs::findOrFail(1);
@endphp

	<!--Page Title-->
    <section class="page-title" style="background-image:url(frontend/images/background/8.jpg);">
        <div class="auto-container">
            <div class="clearfix">
				<div class="pull-left">
					<h1>Get Touch With Us</h1>
					<div class="text">Interested in our consulting services or need advice?</div>
				</div>
				<div class="pull-right">
					<ul class="bread-crumb clearfix">
						<li><a href="index.html">Home</a></li>
						<li>contact</li>
					</ul>
				</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->

	<!-- In Touch Section -->
	<section class="in-touch-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Get In Touch</div>
				<h2>We’d Love To Here From You</h2>
				<div class="text">For genereal enquires you can touch with our front desk supporting team <br> at <a class="theme_color" href="mailto:{{ $contract_us->general_email }}">{{ $contract_us->general_email }}</a> or call on <span class="theme_color">{{ $contract_us->general_phone }}</span></div>
			</div>

			<div class="row clearfix">

				<!-- Contact Info Boxed -->
				<div class="contact-info-boxed col-lg-4 col-md-6 col-sm-12">
					<div class="info-inner">
						<div class="content">
							<div class="icon-box">
								<span class="icon flaticon-world-1"></span>
							</div>
							<div class="text">{{ $contract_us->address }} <a href="{{ route('contact.us') }}">Find Us On Map  <span class="arrow flaticon-next-8"></span></a></div>
						</div>
					</div>
				</div>

				<!-- Contact Info Boxed -->
				<div class="contact-info-boxed col-lg-4 col-md-6 col-sm-12">
					<div class="info-inner">
						<div class="content">
							<div class="icon-box">
								<span class="icon flaticon-phone-receiver"></span>
							</div>
							<div class="text"><strong>Support 24/7</strong> {{ $contract_us->business_phone }}</div>
						</div>
					</div>
				</div>

				<!-- Contact Info Boxed -->
				<div class="contact-info-boxed col-lg-4 col-md-6 col-sm-12">
					<div class="info-inner">
						<div class="content">
							<div class="icon-box">
								<span class="icon flaticon-mail-2"></span>
							</div>
							<div class="text"><strong>Business Quiry</strong> {{ $contract_us->business_email }} <span class="arrow flaticon-next-8"></span></div>
						</div>
					</div>
				</div>

			</div>


		</div>
	</section>
	<!-- End In Touch Section -->

	<!-- Contact Form Section -->
	<section class="contact-form-section">
		<div class="auto-container">

			<!-- Sec Title -->
			<div class="sec-title">
				<div class="clearfix">
					<div class="pull-left">
						<div class="title">Send Your Message</div>
						<h2>Send Your Message</h2>
					</div>
					<div class="pull-right">
						<div class="text">Our goal is to help our companies maintain or achieve best- in-class positions in their <br> respective industries and our team works.</div>
					</div>
				</div>
			</div>

			<!-- Inner Container -->
			<div class="inner-container">

				<!-- Contact Form -->
				<div class="contact-form">
                    @if(session()->has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                      {{ session()->get('success_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
					<!--Contact Form-->
					<form method="post" action="{{ route('contact.store') }}" >
                        @csrf
						<div class="row clearfix">

							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<label>Your name *</label>
								<input type="text" name="name" placeholder="Name" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<label>Email address *</label>
								<input type="email" name="email" placeholder="example@example.com" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<label>Phone num *</label>
								<input type="text" name="phone" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<label>Website <small>(Optional)</small></label>
								<input type="text" name="website" placeholder="www.example.com">
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<label>Your Message</label>
								<textarea class="" name="message" placeholder="Write your message here. . ."></textarea>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
								<button class="theme-btn submit-btn" type="submit" name="submit-form">Send Message <span class="arrow flaticon-next-8"></span></button>
							</div>

						</div>
					</form>

				</div>
				<!--End Contact Form -->

			</div>

		</div>
	</section>
	<!-- End Contact Form Section -->

	<!-- Branches Section -->
	<section class="contact-form-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Our Branches</div>
				<div class="text">Our goal is to help our companies maintain or achieve best- in-class positions in their <br> respective industries and our team works.</div>
			</div>

			<div class="location">
				<div class="google_map_link">
                    {!! $contract_us->google_map_link !!}
                </div>
            </div>

		</div>
	</section>
	<!-- End Branches Section -->
@endsection
