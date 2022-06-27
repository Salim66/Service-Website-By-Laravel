<!--Sponsors Section-->
<section class="sponsors-section">
    <div class="auto-container">
        @php
            $all_data = \App\Models\Spnsor::all();
        @endphp
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @foreach($all_data as $data)
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ URL::to($data->image) }}" alt=""></a></figure></li>
                @endforeach
            </ul>
        </div>

    </div>
</section>
<!--End Sponsors Section-->
