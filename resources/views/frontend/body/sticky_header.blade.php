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
                       
                        <li class="dropdown"><a href="#">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog Default</a></li>
                                <li><a href="blog-sidebar.html">Blog Large With Sidebar</a></li>
                                <li><a href="blog-single.html">Blog Single Post</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('contact.us') }}">Contact</a></li>
                    </ul>
                </div>
            </nav><!-- Main Menu End-->
        </div>
    </div>
</div><!-- End Sticky Menu -->
