   @php
       $all_data = \App\Models\Slider::latest()->get();
   @endphp
   <!-- Bnner Section -->
   <section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">

        <!-- Slide Item -->
        @foreach($all_data as $data)
        <div class="slide-item" style="background-image: url({{ URL::to($data->slider_img) }});">
            <div class="auto-container clearfix">
                <!-- Content Box -->
                <div class="content-box">
                    <div class="inner">
                        <h2>{{ $data->slider_title }}</h2>
                        <div class="text">{{ $data->slider_descp }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
<!-- End Bnner Section -->
