<aside class="app-sidebar" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="desktop-logo">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="toggle-logo">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="desktop-dark">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="toggle-dark">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="desktop-white">
            <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">


        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                     height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Pages</span></li>
                <!-- End::slide__category -->

                <li class="slide"><a href="{{route('main')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">airplay</span>
                        <span style="margin-left: 5px;" class="side-menu__label">Main</span>
                    </a></li>

                <li class="slide">

                    <a href="{{route('changes')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">change_circle</span>
                        <span style="margin-left: 5px; " class="side-menu__label">Changes</span>
                    </a>

                </li>

                <li class="slide"><a href="{{route('suppliers')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">group</span>
                        <span style="margin-left: 5px" class="side-menu__label">Suppliers</span>
                    </a></li>
                <li class="slide">
                    <a href="{{route('customers')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">group</span>
                        <span style="margin-left: 5px;" class="side-menu__label">Customers</span>
                    </a>
                </li>
                <li class="slide"><a href="{{route('upload')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">upload_2</span>
                        <span style="margin-left: 5px;" class="side-menu__label">Upload</span>
                    </a></li>
                <li class="slide"><a href="{{route('log')}}" class="side-menu__item" target="_blank">
                        <span class="material-symbols-outlined">history</span>
                        <span style="margin-left: 5px;" class="side-menu__label">LOG</span>
                    </a>
                </li>

                <li class="slide"><a href="{{route('deleted')}}" class="side-menu__item" target="_blank">
                        <span class="material-symbols-outlined">restore_page</span>
                        <span style="margin-left: 5px;" class="side-menu__label">Deleted</span>
                    </a>
                </li>



                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <span class="material-symbols-outlined">bar_chart_4_bars</span>
                        <span style="margin-left: 5px;" class="side-menu__label">Stats</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide"><a href="{{route('stats')}}" class="side-menu__item" target="_blank">
                                <span class="side-menu__label"> Purchase / Sales</span>
                            </a>
                        </li>
                        <li class="slide"><a href="{{route('stats.contrahents')}}" class="side-menu__item" target="_blank">
                                <span class="side-menu__label">Contrahents</span>
                            </a>
                        </li>
                        <li class="slide"><a href="{{route('stock')}}" class="side-menu__item" target="_blank">
                                <span class="side-menu__label">Stock</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @role('admin')
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">ADMIN</span></li>
                <!-- End::slide__category -->
                <li class="slide">
                    <a href="javascript:void(0);" class="side-menu__item" data-hs-overlay="#todo-compose">
                        <span class="material-symbols-outlined">checklist_rtl</span>
                        <span style="margin-left: 5px; " class="side-menu__label">Close Period</span>
                    </a>
                </li>
                <li class="slide"><a href="{{route('users')}}" class="side-menu__item" >
                      <span class="material-symbols-outlined">manage_accounts</span>
                        <span style="margin-left: 5px;" class="side-menu__label">Users</span>
                    </a>
                </li>
                @endrole
                <!-- End::slide -->

            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                     height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>

{{--        Period Modal--}}
<div id="todo-compose" class="hs-overlay hidden ti-modal">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
        <div class="ti-modal-content">
            <form action="{{route('closePeriod')}}" method="post">
                @csrf

                <div class="ti-modal-header">
                    <h6 class="modal-title text-[1rem] font-semibold" id="mail-ComposeLabel">Close Reviewed Period</h6>
                    <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor"
                            data-hs-overlay="#todo-compose">
                        <span class="sr-only">Close</span>
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="ti-modal-body px-4">
                    <div class="input-group flex flex-row justify-center gap-4 ">
                        <div class="input-group-text text-[#8c9097] dark:text-white/50"><i class="ri-calendar-line"></i>
                        </div>
                        <input name="range" type="text" class="form-control flatpickr-input active" id="daterange"
                               placeholder="Date Range" readonly="readonly">

                    </div>
                </div>
                <div class="ti-modal-footer">

                    <button class="w ti-btn ti-btn-outline-secondary  ti-btn-wave ">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
