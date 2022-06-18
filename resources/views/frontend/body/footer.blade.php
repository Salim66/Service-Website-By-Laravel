<!--Main Footer-->
<footer class="main-footer">

    <div class="auto-container">

        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget about-widget">
                                <h3>Let’s create something creative & innovative together for your business.</h3>
                                <div class="text">Our goal is to help our companies maintain or achieve best- in-class positions in their respective industries and our team works.</div>
                                <a href="{{ asset('frontend/') }}/about.html" class="theme-btn btn-style-five">Read More <span class="arrow flaticon-next-8"></span></a>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h2>Usefull links</h2>
                                <ul class="footer-link-list">
                                    <li><a href="{{ asset('frontend/') }}/#">About Company</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Meet Team</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Testimonials</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Our Projects</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">News & Updates</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h2>Solution For</h2>
                                <ul class="footer-link-list">
                                    <li><a href="{{ asset('frontend/') }}/#">Advanced Analytics</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Change Management</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Corporate Finance</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Customer Marketing</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Information Technology</a></li>
                                    <li><a href="{{ asset('frontend/') }}/#">Private Equity</a></li>
                                </ul>
                            </div>
                        </div>

                        @php
                            $contract_us = \App\Models\ContactUs::findOrFail(1);
                        @endphp
                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget services-widget">
                                <h2>General Quries</h2>
                                <!-- Services List -->
                                <ul class="service-list">
                                    <li><span>Email:</span> {{ $contract_us->general_email }}</li>
                                    <li><span>Phone:</span> {{ $contract_us->general_phone }}</li>
                                </ul>
                                <h2>Service Quries</h2>
                                <!-- Services List -->
                                <ul class="service-list">
                                    <li><span>Email:</span> {{ $contract_us->business_email }}</li>
                                    <li><span>Phone:</span> {{ $contract_us->business_phone }}</li>
                                </ul>
                                <a href="{{ route('contact.us') }}" class="read-more">Location in Map <span class="arrow flaticon-next-8"></span></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="clearfix">

                <div class="pull-left">
                    <div class="copyright"><span>&copy; 2019 Consoul,</span> Finance & Consulting Theme.</div>
                </div>
                <div class="pull-right">
                    <ul class="footer-list">
                        <li><a href="{{ asset('frontend/') }}/#">Privacy Policy</a></li>
                        <li><a href="{{ asset('frontend/') }}/#">Legal Terms</a></li>
                        <li><a href="{{ asset('frontend/') }}/#">FAQ’s</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</footer>
