 <!-- Sticky Header  -->
 <div class="sticky-header">
    <div class="auto-container clearfix">
        <!--Logo-->
        <div class="logo pull-left">
            <a href="{{ url('/') }}" title=""><img src="{{ asset('frontend/') }}/images/logo-small.png" alt="" title=""></a>
        </div>
        <!--Right Col-->
        <div class="pull-right">
            <!-- Main Menu -->
            <nav class="main-menu">
                <div class="navbar-collapse show collapse clearfix">
                    <ul class="navigation clearfix">

                        <li><a href="{{ route('about.us') }}">About Us</a></li>

                        @php
                            $categories = \App\Models\Category::limit(3)->get();
                        @endphp

                        <li class="dropdown"><a href="javascipt:void(0)">Services</a>
                            <ul>
                                @foreach($categories as $category)
                                    <li class="dropdown"><a href="{{ url('/category/services/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a>

                                        <ul>
                                            @php
                                                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name', 'ASC')->get();
                                            @endphp

                                            @foreach($subcategories as $sub)
                                                <li class="dropdown"><a href="{{ url('/subcategory/services/'.$sub->id.'/'.$sub->subcategory_slug) }}">{{ $sub->subcategory_name }}</a>

                                                    <ul>
                                                        @php
                                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name', 'ASC')->get();
                                                        @endphp
        
                                                        @foreach($subsubcategories as $subsub)
                                                        <li><a href="{{ url('/subsubcategory/services/'.$subsub->id.'/'.$subsub->subsubcategory_slug) }}">{{ $subsub->subsubcategory_name }}</a></li>
                                                        @endforeach
                                                    </ul>

                                                </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                @endforeach

                                
                            </ul>
                        </li>
                       
                        <li><a href="{{ route('our.capabilities') }}">Our Capabilities</a></li>
                        @php
                            $training_categories = \App\Models\TrainingCategory::all();
                        @endphp

                        <li class="dropdown"><a href="javascipt:void(0)">Training</a>
                            <ul>
                                @foreach($training_categories as $tr_category)
                                    <li class="dropdown"><a href="{{ url('/category/training/'.$tr_category->id.'/'.$tr_category->training_category_slug) }}">{{ $tr_category->training_category_name }}</a>

                                        <ul>
                                            @php
                                                    $training_subcategories = App\Models\TrainingSubCategory::where('training_category_id', $tr_category->id)->orderBy('training_subcategory_name', 'ASC')->get();
                                            @endphp

                                            @foreach($training_subcategories as $sub)
                                                <li><a href="{{ url('/subcategory/training/'.$sub->id.'/'.$sub->training_subcategory_slug) }}">{{ $sub->training_subcategory_name }}</a>

                                                </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                @endforeach

                                
                            </ul>
                        </li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                        <li><a href="{{ route('gri.certified.training') }}">GRI Certified Training Partner</a></li>
                    </ul>
                </div>
            </nav><!-- Main Menu End-->
        </div>
    </div>
</div><!-- End Sticky Menu -->
