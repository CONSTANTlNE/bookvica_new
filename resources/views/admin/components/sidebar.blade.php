<aside class="app-sidebar" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{asset('assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
            <img src="{{asset('assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
            <img src="{{asset('assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
            <img src="{{asset('assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="toggle-dark">
            <img src="{{asset('assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
            <img src="{{asset('assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                                                         height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg></div>
            <ul class="main-menu">

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Pages</span></li>
                <!-- End::slide__category -->

                <li class="slide"><a href="{{route('upload')}}" class="side-menu__item">Upload</a></li>
                <li class="slide"><a href="{{route('main')}}" class="side-menu__item">Main</a></li>

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-fingerprint side-menu__icon"></i>
                        <span class="side-menu__label">Authentication</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1"><a href="javascript:void(0)">Authentication</a></li>
                        <li class="slide"><a href="comingsoon.html" class="side-menu__item">Coming Soon</a></li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item">Create
                                Password<i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide"><a href="create-password-basic.html" class="side-menu__item">Basic</a></li>
                                <li class="slide"><a href="create-password-cover.html"
                                                     class="side-menu__item">Cover</a></li>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item">Lockscreen<i
                                        class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide"><a href="lockscreen-basic.html" class="side-menu__item">Basic</a></li>
                                <li class="slide"><a href="lockscreen-cover.html" class="side-menu__item">Cover</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item">Reset Password<i
                                        class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide"><a href="reset-password-basic.html" class="side-menu__item">Basic</a></li>
                                <li class="slide"><a href="reset-password-cover.html" class="side-menu__item">Cover</a></li>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item">Sign-Up<i
                                        class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide"><a href="sign-up-basic.html" class="side-menu__item">Basic</a></li>
                                <li class="slide"><a href="sign-up-cover.html" class="side-menu__item">Cover</a></li>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item">Sign-In<i
                                        class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide"><a href="sign-in-basic.html" class="side-menu__item">Basic</a></li>
                                <li class="slide"><a href="sign-in-cover.html" class="side-menu__item">Cover</a></li>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item">Two-Step
                                Verfication<i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide"><a href="two-step-verfication-basic.html" class="side-menu__item">Basic</a></li>
                                <li class="slide"><a href="two-step-verfication-cover.html" class="side-menu__item">Cover</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide"><a href="maintanace.html" class="side-menu__item">Under Maintanace</a></li>
                    </ul>
                </li>
                <!-- End::slide -->

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                                                           height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>