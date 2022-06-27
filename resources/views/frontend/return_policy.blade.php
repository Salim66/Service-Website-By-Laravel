@extends('frontend.main_master')

@section('main')

	<!-- Faq Banner Section -->
    <section class="faq-banner-section" style="background-image:url(images/background/9.jpg);">
        <div class="auto-container">
            <h1>Return Policy</h1>
        </div>
    </section>
    <!--End Faq Banner Section -->
	
	
	<!-- Faq Page Section -->
    <section class="faq-page-section my-5">
    	<div class="auto-container">
        	
			<!--Accordion Box-->
			<ul class="accordion-box">

		
				<!--Block-->
                @foreach($all_data as $data)
				<li class="accordion block wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="acc-btn"><span class="left-icon flaticon-question"></span><div class="icon-outer"><span class="icon icon-plus flaticon-right-arrow"></span></div> {{ $data->question }}</div>
					<div class="acc-content">
						<div class="content">
							<p>{{ $data->answer }}</p>
						</div>
					</div>
				</li>
                @endforeach
			
			</ul>
		
		</div>
	</section>
	<!-- End Faq Page Section -->

@endsection
