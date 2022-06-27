@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{ URL::to('backend/') }}/images/logo-dark.png" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li>
          <a href="index.html">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{ ($prefix == '/category')? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-codiepie" aria-hidden="true"></i> <span>Service Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'all.category')? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
              <li class="{{ ($route == 'all.subcategory')? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
              <li class="{{ ($route == 'all.subsubcategory')? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
            </ul>
        </li>

        <li class="treeview {{ ($prefix == '/service')? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <span>Service</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'add.service')? 'active' : '' }}"><a href="{{ route('add.service') }}"><i class="ti-more"></i>Add Service</a></li>
              <li class="{{ ($route == 'manage.service')? 'active' : '' }}"><a href="{{ route('manage.service') }}"><i class="ti-more"></i>All Service</a></li>
            </ul>
        </li>

        <li class="treeview {{ ($prefix == '/post-category')? 'active' : '' }}">
            <a href="#">
                <i data-feather="package"></i> <span>Post Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'all.post.category')? 'active' : '' }}"><a href="{{ route('all.post.category') }}"><i class="ti-more"></i>All Category</a></li>
            </ul>
        </li>

        <li class="treeview {{ ($prefix == '/post')? 'active' : '' }}">
            <a href="#">
                <i data-feather="hard-drive"></i>
              <span>Post</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'add.post')? 'active' : '' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add Post</a></li>
              <li class="{{ ($route == 'manage.post')? 'active' : '' }}"><a href="{{ route('manage.post') }}"><i class="ti-more"></i>All Post</a></li>
            </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="ti-settings"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('contractUs.edit') }}"><i class="ti-more"></i>Contract Us</a></li>
            <li><a href="{{ route('social.edit') }}"><i class="ti-more"></i>Social Link</a></li>
            <li class="{{ ($route == 'seo.edit')? 'active' : '' }}"><a href="{{ route('seo.edit') }}"><i class="ti-more"></i>SEO</a></li>
            <li class="{{ ($route == 'about.edit')? 'active' : '' }}"><a href="{{ route('about.edit') }}"><i class="ti-more"></i>About</a></li>
          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/slider')? 'active' : '' }}">
            <a href="#">
            <i class="fa fa-slideshare" aria-hidden="true"></i>
              <span>Slider</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage.slider')? 'active' : '' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
            </ul>
        </li>

        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
            <a href="#">
              <i data-feather="mail"></i> <span>Contact</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('contact.message') }}"><i class="ti-more"></i>Contact Message</a></li>
            </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>

      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
</aside>
