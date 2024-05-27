<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="dark" data-header-styles="dark" data-menu-styles="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookvica</title>
    <meta name="description"
          content="A Tailwind CSS admin template is a pre-designed web page for an admin dashboard. Optimizing it for SEO includes using meta descriptions and ensuring it's responsive and fast-loading.">
    <meta name="keywords"
          content="html dashboard,tailwind css,tailwind admin dashboard,template dashboard,html and css template,tailwind dashboard,tailwind css templates,admin dashboard html template,tailwind admin,html panel,template tailwind,html admin template,admin panel html">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">


    <!-- Main JS -->
    {{--    <script src="{{asset('assets/js/main.js')}}"></script>--}}

    <!-- Style Css -->
    {{--    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">--}}

    <!-- Simplebar Css -->
    {{--    <link rel="stylesheet" href="{{asset('assets/libs/simplebar/simplebar.min.css')}}">--}}

    <!-- Color Picker Css -->
    {{--    <link rel="stylesheet" href="{{asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}">--}}

    {{--    <link rel="stylesheet" href="{{asset('assets/libs/prismjs/themes/prism-coy.min.css')}}">--}}

    {{--    <link rel="stylesheet" href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}">--}}
    {{--  DATATABLES CSS --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">

    <script src="https://unpkg.com/htmx.org@1.9.12"
            integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2"
            crossorigin="anonymous"></script>

    {{--    <link  rel="stylesheet" href="{{asset('assets/css/glightbox.css')}}">--}}
    <!-- Tom Select Css -->
    {{--    <link rel="stylesheet" href="{{asset('assets/libs/tom-select/css/tom-select.default.min.css')}}">--}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{--    <link rel="stylesheet"--}}
    {{--          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>--}}
    <style>

        div.dt-container {
            margin: 0 auto;
        }

        .hoverable:hover {
            cursor: pointer;
        }

        th {
            text-align: center !important;
        }

        td {
            text-align: center !important;
        }

        #col0 {
            min-width: 60px !important;
            /*padding-right: 0;*/
            /*padding-left: 0;*/
        }

        .logout:hover {
            cursor: pointer;
            color: purple !important;
        }

        .flatpickr-month {
            height: 50px !important;
        }

        .numInputWrapper {
            height: 50px !important;
        }

        .arrowUp {
            color: red !important;
        }


    </style>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>

<body>

<!-- ========== Switcher  ========== -->
<div id="hs-overlay-switcher" class="hs-overlay hidden ti-offcanvas ti-offcanvas-right" tabindex="-1">
    <div class="ti-offcanvas-header z-10 relative">
        <h5 class="ti-offcanvas-title">
            Switcher
        </h5>
        <button type="button"
                class="ti-btn flex-shrink-0 p-0  transition-none text-defaulttextcolor dark:text-defaulttextcolor/70 hover:text-gray-700 focus:ring-gray-400 focus:ring-offset-white  dark:hover:text-white/80 dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                data-hs-overlay="#hs-overlay-switcher">
            <span class="sr-only">Close modal</span>
            <i class="ri-close-circle-line leading-none text-lg"></i>
        </button>
    </div>
    <div class="ti-offcanvas-body !p-0 !border-b dark:border-white/10 z-10 relative !h-auto">
        <div class="flex rtl:space-x-reverse" aria-label="Tabs" role="tablist">
            <button type="button"
                    class="hs-tab-active:bg-success/20 w-full !py-2 !px-4 hs-tab-active:border-b-transparent text-defaultsize border-0 hs-tab-active:text-success dark:hs-tab-active:bg-success/20 dark:hs-tab-active:border-b-white/10 dark:hs-tab-active:text-success -mb-px bg-white font-semibold text-center  text-defaulttextcolor dark:text-defaulttextcolor/70 rounded-none hover:text-gray-700 dark:bg-bodybg dark:border-white/10  active"
                    id="switcher-item-1" data-hs-tab="#switcher-1" aria-controls="switcher-1" role="tab">
                Theme Style
            </button>
            <button type="button"
                    class="hs-tab-active:bg-success/20 w-full !py-2 !px-4 hs-tab-active:border-b-transparent text-defaultsize border-0 hs-tab-active:text-success dark:hs-tab-active:bg-success/20 dark:hs-tab-active:border-b-white/10 dark:hs-tab-active:text-success -mb-px  bg-white font-semibold text-center  text-defaulttextcolor dark:text-defaulttextcolor/70 rounded-none hover:text-gray-700 dark:bg-bodybg dark:border-white/10  dark:hover:text-gray-300"
                    id="switcher-item-2" data-hs-tab="#switcher-2" aria-controls="switcher-2" role="tab">
                Theme Colors
            </button>
        </div>
    </div>
    <div class="ti-offcanvas-body" id="switcher-body">
        <div id="switcher-1" role="tabpanel" aria-labelledby="switcher-item-1" class="">
            <div class="">
                <p class="switcher-style-head">Theme Color Mode:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex items-center">
                        <input type="radio" name="theme-style" class="ti-form-radio" id="switcher-light-theme" checked>
                        <label for="switcher-light-theme"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Light</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="theme-style" class="ti-form-radio" id="switcher-dark-theme">
                        <label for="switcher-dark-theme"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Dark</label>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Directions:</p>
                <div class="grid grid-cols-3  switcher-style">
                    <div class="flex items-center">
                        <input type="radio" name="direction" class="ti-form-radio" id="switcher-ltr" checked>
                        <label for="switcher-ltr"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">LTR</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="direction" class="ti-form-radio" id="switcher-rtl">
                        <label for="switcher-rtl"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">RTL</label>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Navigation Styles:</p>
                <div class="grid grid-cols-3  switcher-style">
                    <div class="flex items-center">
                        <input type="radio" name="navigation-style" class="ti-form-radio" id="switcher-vertical"
                               checked>
                        <label for="switcher-vertical"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Vertical</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="navigation-style" class="ti-form-radio" id="switcher-horizontal">
                        <label for="switcher-horizontal"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Horizontal</label>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Navigation Menu Style:</p>
                <div class="grid grid-cols-2 gap-2 switcher-style">
                    <div class="flex">
                        <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio"
                               id="switcher-menu-click"
                               checked>
                        <label for="switcher-menu-click"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Menu
                            Click</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio"
                               id="switcher-menu-hover">
                        <label for="switcher-menu-hover"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Menu
                            Hover</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio"
                               id="switcher-icon-click">
                        <label for="switcher-icon-click"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Icon
                            Click</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio"
                               id="switcher-icon-hover">
                        <label for="switcher-icon-hover"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Icon
                            Hover</label>
                    </div>
                </div>
                <div class="px-4 text-secondary text-xs"><b class="me-2">Note:</b>Works same for both Vertical and
                    Horizontal
                </div>
            </div>
            <div class=" sidemenu-layout-styles">
                <p class="switcher-style-head">Sidemenu Layout Syles:</p>
                <div class="grid grid-cols-2 gap-2 switcher-style">
                    <div class="flex">
                        <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio"
                               id="switcher-default-menu" checked>
                        <label for="switcher-default-menu"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold ">Default
                            Menu</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio"
                               id="switcher-closed-menu">
                        <label for="switcher-closed-menu"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold ">
                            Closed
                            Menu</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio"
                               id="switcher-icontext-menu">
                        <label for="switcher-icontext-menu"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold ">Icon
                            Text</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio"
                               id="switcher-icon-overlay">
                        <label for="switcher-icon-overlay"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold ">Icon
                            Overlay</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio" id="switcher-detached">
                        <label for="switcher-detached"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold ">Detached</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio"
                               id="switcher-double-menu">
                        <label for="switcher-double-menu"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Double
                            Menu</label>
                    </div>
                </div>
                <div class="px-4 text-secondary text-xs"><b class="me-2">Note:</b>Navigation menu styles won't work
                    here.
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Page Styles:</p>
                <div class="grid grid-cols-3  switcher-style">
                    <div class="flex">
                        <input type="radio" name="data-page-styles" class="ti-form-radio" id="switcher-regular" checked>
                        <label for="switcher-regular"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Regular</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="data-page-styles" class="ti-form-radio" id="switcher-classic">
                        <label for="switcher-classic"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Classic</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="data-page-styles" class="ti-form-radio" id="switcher-modern">
                        <label for="switcher-modern"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">
                            Modern</label>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Layout Width Styles:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input type="radio" name="layout-width" class="ti-form-radio" id="switcher-full-width" checked>
                        <label for="switcher-full-width"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">FullWidth</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="layout-width" class="ti-form-radio" id="switcher-boxed">
                        <label for="switcher-boxed"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Boxed</label>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Menu Positions:</p>
                <div class="grid grid-cols-3  switcher-style">
                    <div class="flex">
                        <input type="radio" name="data-menu-positions" class="ti-form-radio" id="switcher-menu-fixed"
                               checked>
                        <label for="switcher-menu-fixed"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Fixed</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="data-menu-positions" class="ti-form-radio" id="switcher-menu-scroll">
                        <label for="switcher-menu-scroll"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Scrollable </label>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Header Positions:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input type="radio" name="data-header-positions" class="ti-form-radio"
                               id="switcher-header-fixed" checked>
                        <label for="switcher-header-fixed"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">
                            Fixed</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="data-header-positions" class="ti-form-radio"
                               id="switcher-header-scroll">
                        <label for="switcher-header-scroll"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Scrollable
                        </label>
                    </div>
                </div>
            </div>
            <div class="">
                <p class="switcher-style-head">Loader:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input type="radio" name="page-loader" class="ti-form-radio" id="switcher-loader-enable"
                               checked>
                        <label for="switcher-loader-enable"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">
                            Enable</label>
                    </div>
                    <div class="flex">
                        <input type="radio" name="page-loader" class="ti-form-radio" id="switcher-loader-disable">
                        <label for="switcher-loader-disable"
                               class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2  font-semibold">Disable
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="switcher-2" class="hidden" role="tabpanel" aria-labelledby="switcher-item-2">
            <div class="theme-colors">
                <p class="switcher-style-head">Menu Colors:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-white" type="radio"
                               name="menu-colors"
                               id="switcher-menu-light" checked>
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Light Menu
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-dark" type="radio"
                               name="menu-colors"
                               id="switcher-menu-dark" checked>
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Dark Menu
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-primary" type="radio"
                               name="menu-colors"
                               id="switcher-menu-primary">
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Color Menu
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-gradient" type="radio"
                               name="menu-colors"
                               id="switcher-menu-gradient">
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Gradient Menu
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-transparent" type="radio"
                               name="menu-colors"
                               id="switcher-menu-transparent">
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Transparent Menu
            </span>
                    </div>
                </div>
                <div class="px-4 text-[#8c9097] dark:text-white/50 text-[.6875rem]"><b class="me-2">Note:</b>If you want
                    to change color Menu
                    dynamically
                    change from below Theme Primary color picker.
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Header Colors:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-white !border" type="radio"
                               name="header-colors"
                               id="switcher-header-light" checked>
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Light Header
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-dark" type="radio"
                               name="header-colors"
                               id="switcher-header-dark">
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Dark Header
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-primary" type="radio"
                               name="header-colors"
                               id="switcher-header-primary">
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Color Header
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-gradient" type="radio"
                               name="header-colors"
                               id="switcher-header-gradient">
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Gradient Header
            </span>
                    </div>
                    <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                        <input class="hs-tooltip-toggle ti-form-radio color-input color-transparent" type="radio"
                               name="header-colors" id="switcher-header-transparent">
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip">
              Transparent Header
            </span>
                    </div>
                </div>
                <div class="px-4 text-[#8c9097] dark:text-white/50 text-[.6875rem]"><b class="me-2">Note:</b>If you want
                    to change color
                    Header dynamically
                    change from below Theme Primary color picker.
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Theme Primary:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-primary-1" type="radio" name="theme-primary"
                               id="switcher-primary" checked>
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-primary-2" type="radio" name="theme-primary"
                               id="switcher-primary1">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-primary-3" type="radio" name="theme-primary"
                               id="switcher-primary2">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-primary-4" type="radio" name="theme-primary"
                               id="switcher-primary3">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-primary-5" type="radio" name="theme-primary"
                               id="switcher-primary4">
                    </div>
                    <div class="ti-form-radio switch-select ps-0 mt-1 color-primary-light">
                        <div class="theme-container-primary"></div>
                        <div class="pickr-container-primary"></div>
                    </div>
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Theme Background:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-bg-1" type="radio" name="theme-background"
                               id="switcher-background" checked>
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-bg-2" type="radio" name="theme-background"
                               id="switcher-background1">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-bg-3" type="radio" name="theme-background"
                               id="switcher-background2">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-bg-4" type="radio" name="theme-background"
                               id="switcher-background3">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio color-input color-bg-5" type="radio" name="theme-background"
                               id="switcher-background4">
                    </div>
                    <div class="ti-form-radio switch-select ps-0 mt-1 color-bg-transparent">
                        <div class="theme-container-background hidden"></div>
                        <div class="pickr-container-background"></div>
                    </div>
                </div>
            </div>
            <div class="menu-image theme-colors">
                <p class="switcher-style-head">Menu With Background Image:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse flex-wrap gap-3">
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio bgimage-input bg-img1" type="radio" name="theme-images"
                               id="switcher-bg-img">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio bgimage-input bg-img2" type="radio" name="theme-images"
                               id="switcher-bg-img1">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio bgimage-input bg-img3" type="radio" name="theme-images"
                               id="switcher-bg-img2">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio bgimage-input bg-img4" type="radio" name="theme-images"
                               id="switcher-bg-img3">
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input class="ti-form-radio bgimage-input bg-img5" type="radio" name="theme-images"
                               id="switcher-bg-img4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ti-offcanvas-footer sm:flex justify-between">
        <a href="javascript:void(0);" id="reset-all" class="w-full ti-btn ti-btn-danger-full m-1">Reset</a>
    </div>
</div>
<!-- ========== END Switcher  ========== -->

<!-- Loader -->
<div id="loader">
    {{--        <img src="../assets/images/media/loader.svg" alt="">--}}
</div>
<!-- Loader -->
<div class="page">

    <!-- Start::Header -->
    @include('admin.components.header')
    <!-- End::Header -->
    <!-- Start::app-sidebar -->
    @include('admin.components.sidebar')
    <!-- End::app-sidebar -->


    <!-- Start::content  -->
    <div  class="content  main-index">
        <!-- Start::main-content -->
        <div id="main-content" class="main-content">

            @yield('upload')
            @yield('main')
            @yield('editPurchase')
            @yield('editSales')
            @yield('suppliers')
            @yield('customers')
            @yield('deleted')
            @yield('stats')
            @yield('changes')
            @yield('users')
            @yield('stock')
            @yield('htmx')

            @yield('contrahents')

        </div>
    </div>
    <!-- End::content  -->


    <!-- Footer Start -->
    @include('admin.components.footer')
    <!-- Footer End -->

</div>

<!-- Back To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
</div>

<div id="responsive-overlay"></div>

<!-- Preline JS -->
{{--<script src="{{asset('assets/libs/preline/preline.js')}}"></script>--}}

<!-- popperjs -->
<script src="{{asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>

<!-- Color Picker JS -->
{{--<script src="{{asset('assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>--}}

<!-- sidebar JS -->
<script src="{{asset('assets/js/defaultmenu.js')}}"></script>

<!-- sticky JS -->
{{--<script src="{{asset('assets/js/sticky.js')}}"></script>--}}

<!-- Switch JS -->
{{--<script src="{{asset('assets/js/switch.js')}}"></script>--}}

<!-- Simplebar JS -->
{{--<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>--}}


<!-- Custom-Switcher JS -->
{{--<script src="{{asset('assets/js/custom-switcher.js')}}"></script>--}}
<!-- Prism JS -->
{{--<script src="{{asset('assets/libs/prismjs/prism.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/prism-custom.js')}}"></script>--}}
<!-- Modal JS -->
{{--<script src="{{asset('assets/js/modal.js')}}"></script>--}}
<!-- Custom JS -->
{{--<script src="{{asset('assets/js/custom.js')}}"></script>--}}

<!-- Tom Select JS -->
{{--<script src="{{asset('assets/libs/tom-select/js/tom-select.complete.min.js')}}"></script>--}}
{{--@if(request()->routeIs('main')||request()->routeIs('sales.edit')||request()->routeIs('purchase.edit'))--}}
{{--    <script>--}}
{{--        console.log('hi')--}}

{{--    </script>--}}
{{--<script src="{{asset('assets/js/tom-select.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/customerTomSelect.js')}}"></script>--}}
{{--@endif--}}

{{--<script src="{{asset('assets/js/glightbox.js')}}"></script>--}}
<!-- Date & Time Picker JS -->
{{--<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/date-time_pickers.js')}}"></script>--}}

{{--    Datatables--}}

{{--<script src="https://code.jquery.com/jquery-3.7.1.js"></script>--}}
{{--<script src="{{asset('assets/js/datatables/datatableJquery.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/datatables/datatables.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/datatables/datatables.buttons.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/datatables/jszip.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/datatables/buttons.html5.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/datatables/buttons.print.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/datatables/buttons.colVis.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/datatables/dataTables.colReorder.js')}}"></script>--}}



{{--//Deleted--}}

@if(request()->routeIs('deleted'))
    <script>

        let deletedTable = new DataTable('#deleted', {
            //Generall SETTINGS
            lengthMenu: [10, 25, 50, {label: 'All', value: -1}],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/ka.json',
            },
            scrollX: true,
            scrollY: 700,

            layout: {

                topStart: {
                    buttons: ['pageLength', 'colvis', 'excel'],
                    // pageLength: {
                    //   menu: [ 10, 25, 50, 100,5000 ]
                    // }
                },


                topEnd: {
                    search: '',
                }


            },


            // TOTALS
            footerCallback: function (row, data, start, end, display) {
                let api = this.api();

                let intVal = function (i) {
                    return typeof i === 'string'
                        ? i.replace(/[\$,]/g, '') * 1
                        : typeof i === 'number'
                            ? i
                            : 0;
                };

                // Purchase currency Totals
                total = api
                    .column(8)
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                w

                pageTotal = api
                    .column(8, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal);

                const formattotal = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(total);
                // Update footer

                api.column(8).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal;


                // Purchase GEL Totals

                // Total over this page
                pageTotal2 = api
                    .column(8, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal2 = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal2);


                api.column(8).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal2;


                // Sales currency Totals

                // Total over this page
                pageTotal3 = api
                    .column(14, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal3 = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal3);


                api.column(14).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal3;


                // Sales GEL Totals

                pageTotal4 = api
                    .column(15, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal4 = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal4);


                api.column(15).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal4;


            },


        });

        $('#col0').on('keyup', function () {
            table
                .columns(0)
                .search(this.value)
                .draw();
        });


        $('#col1').on('keyup', function () {
            table
                .columns(1)
                .search(this.value)
                .draw();
        });
        $('#col2').on('keyup', function () {
            table
                .columns(2)
                .search(this.value)
                .draw();
        });
        $('#col3').on('keyup', function () {
            table
                .columns(3)
                .search(this.value)
                .draw();
        });
        $('#col4').on('keyup', function () {
            table
                .columns(4)
                .search(this.value)
                .draw();
        });

        // Sales
        $('#col9').on('keyup', function () {
            table
                .columns(9)
                .search(this.value)
                .draw();
        });
        $('#col10').on('keyup', function () {
            table
                .columns(10)
                .search(this.value)
                .draw();
        });
        $('#col11').on('keyup', function () {
            table
                .columns(11)
                .search(this.value)
                .draw();
        });


    </script>
@endif

{{--Main Datatable--}}
{{--<script>--}}


{{--    let table;--}}

{{--    table = new DataTable('#example', {--}}
{{--        //Generall SETTINGS--}}
{{--        lengthMenu: [10, 100, 150, {label: 'All', value: -1}],--}}
{{--        // lengthMenu: [{label: 'All', value: -1}],--}}
{{--        language: {--}}
{{--            url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/ka.json',--}}
{{--        },--}}
{{--        scrollX: true,--}}
{{--        scrollY: 700,--}}

{{--        layout: {--}}

{{--            topStart: {--}}
{{--                buttons: ['pageLength', 'colvis', 'excel'],--}}
{{--                // pageLength: {--}}
{{--                //   menu: [ 10, 25, 50, 100,5000 ]--}}
{{--                // }--}}
{{--            },--}}

{{--            topEnd: {--}}
{{--                search: '',--}}
{{--            }--}}
{{--        },--}}

{{--        // TOTALS--}}
{{--        footerCallback: function (row, data, start, end, display) {--}}
{{--            let api = this.api();--}}

{{--            let intVal = function (i) {--}}
{{--                return typeof i === 'string'--}}
{{--                    ? i.replace(/[\$,]/g, '') * 1--}}
{{--                    : typeof i === 'number'--}}
{{--                        ? i--}}
{{--                        : 0;--}}
{{--            };--}}

{{--            // Purchase currency Totals--}}
{{--            total = api--}}
{{--                .column(7)--}}
{{--                .data()--}}
{{--                .reduce((a, b) => intVal(a) + intVal(b), 0);--}}


{{--            pageTotal = api--}}
{{--                .column(7, {page: 'current'})--}}
{{--                .data()--}}
{{--                .reduce((a, b) => intVal(a) + intVal(b), 0);--}}

{{--            const formatPageTotal = new Intl.NumberFormat('en-US', {--}}
{{--                maximumFractionDigits: 2,--}}
{{--            }).format(pageTotal);--}}

{{--            const formattotal = new Intl.NumberFormat('en-US', {--}}
{{--                maximumFractionDigits: 2,--}}
{{--            }).format(total);--}}
{{--            // Update footer--}}

{{--            api.column(7).footer().innerHTML =--}}
{{--                // '$' + pageTotal + ' ( $' + total + ' total)';--}}
{{--                // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';--}}
{{--                formatPageTotal;--}}


{{--            // Purchase GEL Totals--}}

{{--            // Total over this page--}}
{{--            pageTotal2 = api--}}
{{--                .column(9, {page: 'current'})--}}
{{--                .data()--}}
{{--                .reduce((a, b) => intVal(a) + intVal(b), 0);--}}

{{--            const formatPageTotal2 = new Intl.NumberFormat('en-US', {--}}
{{--                maximumFractionDigits: 2,--}}
{{--            }).format(pageTotal2);--}}


{{--            api.column(9).footer().innerHTML =--}}
{{--                // '$' + pageTotal + ' ( $' + total + ' total)';--}}
{{--                // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';--}}
{{--                formatPageTotal2;--}}


{{--            // Sales currency Totals--}}

{{--            // Total over this page--}}
{{--            pageTotal3 = api--}}
{{--                .column(15, {page: 'current'})--}}
{{--                .data()--}}
{{--                .reduce((a, b) => intVal(a) + intVal(b), 0);--}}

{{--            const formatPageTotal3 = new Intl.NumberFormat('en-US', {--}}
{{--                maximumFractionDigits: 2,--}}
{{--            }).format(pageTotal3);--}}


{{--            api.column(15).footer().innerHTML =--}}
{{--                // '$' + pageTotal + ' ( $' + total + ' total)';--}}
{{--                // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';--}}
{{--                formatPageTotal3;--}}


{{--            // Sales GEL Totals--}}

{{--            pageTotal4 = api--}}
{{--                .column(16, {page: 'current'})--}}
{{--                .data()--}}
{{--                .reduce((a, b) => intVal(a) + intVal(b), 0);--}}

{{--            const formatPageTotal4 = new Intl.NumberFormat('en-US', {--}}
{{--                maximumFractionDigits: 2,--}}
{{--            }).format(pageTotal4);--}}


{{--            api.column(16).footer().innerHTML =--}}
{{--                // '$' + pageTotal + ' ( $' + total + ' total)';--}}
{{--                // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';--}}
{{--                formatPageTotal4;--}}


{{--        },--}}


{{--    });--}}


{{--    $('#col0').on('keyup', function () {--}}
{{--        table--}}
{{--            .columns(1)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}


{{--    $('#col1').on('keyup', function () {--}}
{{--        console.log(table--}}
{{--            .columns(2).search(this.value))--}}
{{--        table--}}
{{--            .columns(2)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}


{{--    $('#col2').on('keyup', function () {--}}
{{--        table--}}
{{--            .columns(3)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}

{{--    $('#col3').on('keyup', function () {--}}
{{--        table--}}
{{--            .columns(4)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}
{{--    $('#col4').on('keyup', function () {--}}
{{--        table--}}
{{--            .columns(5)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}


{{--    // Sales--}}
{{--    $('#col9').on('keyup', function () {--}}
{{--        table--}}
{{--            .columns(10)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}
{{--    $('#col10').on('keyup', function () {--}}
{{--        table--}}
{{--            .columns(11)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}
{{--    $('#col11').on('keyup', function () {--}}
{{--        table--}}
{{--            .columns(12)--}}
{{--            .search(this.value)--}}
{{--            .draw();--}}
{{--    });--}}


{{--</script>--}}

<script>
    // let customerTable = new DataTable('#customerTable', {
    //     //Generall SETTINGS
    //     // lengthMenu: [10, 25, 50, {label: 'All', value: -1}],
    //     lengthMenu: [{label: 'All', value: -1}],
    //     language: {
    //         url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/ka.json',
    //     },
    //     scrollX: true,
    //     scrollY: 700,
    //
    //     layout: {
    //
    //         topStart: {
    //             buttons: ['pageLength', 'excel'],
    //
    //         },
    //
    //     }
    // });
</script>


<script>
    // let changesTable = new DataTable('#changes', {
    //     //Generall SETTINGS
    //     lengthMenu: [{label: 'All', value: -1}],
    //     language: {
    //         url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/ka.json',
    //     },
    //     scrollX: true,
    //     scrollY: 700,
    //
    //     layout: {
    //
    //         topStart: {
    //             buttons: ['pageLength', 'excel'],
    //
    //         },
    //
    //     }
    // });
</script>


<script>
    // let supplierTable = new DataTable('#supplierTable', {
    //     //Generall SETTINGS
    //     lengthMenu: [{label: 'All', value: -1}],
    //     language: {
    //         url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/ka.json',
    //     },
    //     scrollX: true,
    //     scrollY: 700,
    //
    //     layout: {
    //
    //         topStart: {
    //             buttons: ['pageLength', 'excel'],
    //
    //         },
    //
    //     }
    // });


</script>

@if(request()->routeIs('main')||request()->routeIs('purchase.edit')||request()->routeIs('sales.edit'))
    {{--  Purchase   Dynamic Addition--}}
    <script>
        // Initialise the user number
        var userNum = 1;

        document
            .getElementById("addition")
            .addEventListener("click", function () {
                // Get the template and clone it
                var template = document.getElementById("myTemplate");
                var clonedTemplate = document.importNode(template.content, true);

                // Set the user number and ptagX class in the cloned template
                var clone = clonedTemplate.querySelector(".clone");
                clone.classList.add("clone" + userNum);
                // clone.querySelector(".userNum").textContent = userNum;

                // Append the cloned template to the div
                document.getElementById("myDiv").appendChild(clonedTemplate);

                // Increment the user number
                userNum++;
            });

        // Delegate the event
        document.getElementById("myDiv").addEventListener("click", function (e) {

            if (e.target.classList.contains("removeButton")) {
                // Remove the parent node (the paragraph)
                e.target.parentNode.remove();
            }

        });


    </script>
    {{--  Sales   Dynamic Addition--}}
    <script>
        // Initialise the user number
        var userNum = 1;

        document
            .getElementById("addition2")
            .addEventListener("click", function () {
                // Get the template and clone it
                var template2 = document.getElementById("myTemplate2");
                var clonedTemplate2 = document.importNode(template2.content, true);

                // Set the user number and ptagX class in the cloned template
                var clone = clonedTemplate2.querySelector(".tomSelect");
                clone.classList.add("tomSelect" + userNum);
                clone.id = 'salesTomSelect' + userNum
                // clone.querySelector(".userNum").textContent = userNum;

                // Append the cloned template to the div
                document.getElementById("myDiv2").appendChild(clonedTemplate2);


                // Tom select for Remains
                new TomSelect("#salesTomSelect" + userNum, {
                    create: true,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    }
                });
                // Increment the user number
                userNum++;

            });

        // Delegate the event
        document.getElementById("myDiv2").addEventListener("click", function (e) {

            if (e.target.classList.contains("removeButton")) {
                // Remove the parent node (the paragraph)
                e.target.parentNode.remove();
            }

        });


    </script>
@endif

{{--PURCHASE SALES SUM and EX rate--}}
{{--<script src="{{asset('assets/js/nbgPurchase.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/nbgSales.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/purchaseSum.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/salesSum.js')}}"></script>--}}

{{--Changes Page--}}
<script>
    const reviews = document.querySelectorAll('.review');
    const changereviewforms = document.querySelectorAll('.changereviewform');

    reviews.forEach((e, index) => {
        console.log(e)
        e.addEventListener('change', () => {
            changereviewforms[index].submit();
        });
    });
</script>


<script>
    // const stockform=document.getElementById('stockform')
    // const stockselect=document.getElementById('stockselect')
    //
    // stockselect.addEventListener('change', (e) => {
    //     stockform.submit();
    // })
    //
    // const stockdateform=document.getElementById('stockdateform')
    // const stockdate=document.getElementById('date')
    //
    // stockdateform.addEventListener('change', (e) => {
    //     stockdateform.submit();
    // })

</script>


</body>

</html>

