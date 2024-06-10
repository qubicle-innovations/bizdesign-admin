<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" height="28">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="{{ url('admin/banner') }}">
                        <i class="bx bx-home-circle icon nav-icon"></i>
                        <span class="menu-item" data-key="t-banner">Home Banner</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/aboutus') }}">
                        <i class="bx bx-user-pin icon nav-icon"></i>
                        <span class="menu-item" data-key="t-aboutus">About Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/expertise') }}">
                        <i class="bx bx-badge-check icon nav-icon"></i>
                        <span class="menu-item" data-key="t-expertise">The Expertise</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/difference') }}">
                        <i class="bx bx-minus-circle icon nav-icon"></i>
                        <span class="menu-item" data-key="t-difference">The Differences</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/clients') }}">
                        <i class="bx bxs-user-detail icon nav-icon"></i>
                        <span class="menu-item" data-key="t-clients">Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/testimonials') }}">
                        <i class='bx bxs-quote-alt-left icon nav-icon'></i>
                        <span class="menu-item" data-key="t-testimonials">Testimonials</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/enquiry') }}">
                        <i class='bx bx-user-voice icon nav-icon'></i>
                        <span class="menu-item" data-key="t-enquiry">Enquiry Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/socialmedia') }}">
                        <i class='bx bx-mobile icon nav-icon'></i>
                        <span class="menu-item" data-key="t-socialmedia">Social Media Management</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-buildings icon nav-icon"></i>
                        <span class="menu-item" data-key="t-business">Business Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/business') }}" data-key="t-detail">Details</a></li>
                        <li><a href="{{ url('admin/business/category') }}" data-key="t-category">Category Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-box icon nav-icon"></i>
                        <span class="menu-item" data-key="t-servicemain">Service</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/service/details') }}" data-key="t-detail">Main Details</a></li>
                        <li><a href="{{ url('admin/service/category') }}" data-key="t-category">Category Details</a></li>
                        <li><a href="{{ url('admin/service') }}" data-key="t-service">New Service</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->