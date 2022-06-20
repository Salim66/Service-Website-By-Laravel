<!--Header Top-->
<div class="header-top">
    <div class="auto-container clearfix">

        <!-- Top Left -->
        {{-- <div class="top-left">
            <!--Language-->
            <div class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#"><span class="flar-icon"><img src="images/icons/flag.png" alt=""/></span>English &nbsp;<span class="icon fa fa-angle-down"></span></a>
                <ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu2">
                    <li><a href="#">German</a></li>
                    <li><a href="#">Arabic</a></li>
                    <li><a href="#">French</a></li>
                </ul>
            </div>
        </div> --}}

        @php
            $contract_us = \App\Models\ContactUs::findOrFail(1);
        @endphp
        <!-- Top Left -->
        <div class="top-left">
            <ul class="top_left_header">
                <li><span class="icon flaticon-pin"></span> {{ $contract_us->address }}</li>
                <li><span class="icon flaticon-mail-1"></span> {{ $contract_us->business_email }}</li>
            </ul>
        </div>

        @php
            $social = \App\Models\Social::findOrFail(1);
        @endphp
        <!-- Top Right -->
        <div class="top-right clearfix">
            <ul class="social-box">
                <li><a href="{{ $social->facebook }}"><span class="icon fab fa-facebook-f"></span></a></li>
                <li><a href="{{ $social->twitter }}"><span class="icon fab fa-twitter"></span></a></li>
                <li><a href="{{ $social->skype }}"><span class="icon fab fa-skype"></span></a></li>
                <li><a href="{{ $social->linkedin }}"><span class="icon fab fa-linkedin-in"></span></a></li>
            </ul>
        </div>

    </div>
</div>
<!-- End Header Top -->
