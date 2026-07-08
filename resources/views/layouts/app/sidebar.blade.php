<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">

        

        <!-- loader starts-->
        <div class="loader-wrapper">
        <div class="theme-loader">    
            <div class="loader-p"></div>
        </div>
        </div>

        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->


        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            <div class="page-header">
                <div class="header-wrapper row m-0">
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="index-2.html"> <img class="img-fluid for-light" src="/dash/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="/dash/assets/images/logo/logo_dark.png" alt=""></a></div>
                    <div class="toggle-sidebar">
                    <svg class="sidebar-toggle"> 
                        <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#stroke-animation"></use>
                    </svg>
                    </div>
                </div>
                <form class="col-sm-4 form-inline search-full d-none d-xl-block" action="#" method="get">
                    <div class="form-group">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Type to Search .." name="q" title="" autofocus>
                        <svg class="search-bg svg-color">
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#search"></use>
                        </svg>
                        </div>
                    </div>
                    </div>
                </form>
                <div class="nav-right col-xl-8 col-lg-12 col-auto pull-right right-header p-0">
                    <ul class="nav-menus">
                    <li class="serchinput">
                        <div class="serchbox">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="form-group search-form">
                        <input type="text" placeholder="Search here...">
                        </div>
                    </li>
                    
                         <!-- Notification LI's should go here, but I removed them for now to save space. You can add them back in if you want to use them.     -->
                    <li class="profile-nav onhover-dropdown pe-0 py-0">
                        <div class="d-flex align-items-center profile-media"><img class="b-r-25" src="/dash/assets/images/dashboard/profile.png" alt="">
                        <div class="flex-grow-1 user"><span>Clinton Brown</span>
                            <p class="mb-0 font-nunito">Admin 
                            <svg>
                                <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#header-arrow-down"></use>
                            </svg>
                            </p>
                        </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                        <li><a href="user-profile.html"><i data-feather="user"></i><span>Account </span></a></li>
                        <li><a href="letter-box.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                        <li><a href="task.html"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                        <li><a href="edit-profile.html"><i data-feather="settings"></i><span>Settings</span></a></li>
                        <li><a href="login.html"> <i data-feather="log-in"></i><span>Log Out</span></a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">              
                    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                    <div class="ProfileCard-details">
                    <div class="ProfileCard-realName">Clinton Brown</div>
                    </div>
                    </div>
                </script>
                <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
                </div>
            </div>
            <!-- Page Header Ends -->
            <!-- Page body Start -->
            <div class="page-body-wrapper"> 
                <!-- Page Sidebar Start-->
                {{-- <div class="sidebar-wrapper" data-layout="stroke-svg"> --}}
                    <div class="sidebar-wrapper" id="sidebarWrapper" data-layout="stroke-svg" style="transition:0.3s ease;">
                    <div>
                        <div class="logo-wrapper">
                            
                            <a href="{{ route('dashboard') }}"> <img class="img-fluid for-light" style="width: 60px; height: auto;" src="/dash/logo/iandm_logo_black.png" alt=""><img class="img-fluid for-dark" src="/dash/assets/images/logo/logo_dark.png" alt=""></a>
                            
                                {{-- <div class="toggle-sidebar">
                                    <i class="fa fa-bars"></i>
                                
                                </div> --}}

                                <div class="toggle-sidebar" onclick="hideSidebar()" style="cursor:pointer;">
                                    <i class="fa fa-bars"></i>
                                </div>
                        </div>
                        <!-- <div class="logo-icon-wrapper"><a href="index-2.html"><img class="img-fluid" src="/dash/assets/images/logo/logo-icon.png" alt=""></a></div> -->
                        <flux:sidebar class="sidebar-main">

                            <!-- General Section -->
                            <flux:sidebar.group label="General">

                                <flux:sidebar.item 
                                    href="{{ route('dashboard') }}" 
                                    wire:navigate 
                                    current
                                    icon="home"
                                >
                                    Dashboard
                                </flux:sidebar.item>

                            </flux:sidebar.group>


                            <!-- Administration Dropdown -->
                            <flux:sidebar.group label="Administration" collapsible>

                                <!-- Roles & Permissions -->
                                <div x-data="{ open: false }">

                                    <flux:sidebar.item 
                                        href="javascript:void(0)" 
                                        @click="open = !open"
                                        icon="shield-check"
                                    >
                                        <span style="display:flex; align-items:center; justify-content:space-between; width:100%;">
                                            
                                            <span>Roles</span>

                                            <flux:icon 
                                                name="chevron-down" 
                                                style="width:16px; transition:0.3s;"
                                                x-bind:style="open ? 'transform:rotate(180deg)' : ''"
                                            />
                                        </span>
                                    </flux:sidebar.item>

                                    <div x-show="open" x-transition style="margin-left: 25px;">

                                        <flux:sidebar.item 
                                            href="{{ route('admin.roles-perm') }}" 
                                            wire:navigate
                                        >
                                            All Roles
                                        </flux:sidebar.item>

                                        <flux:sidebar.item href="#">
                                            Add Role
                                        </flux:sidebar.item>

                                    </div>

                                </div>


                                <!-- Models (already done) -->
                                <div x-data="{ open: false }">

                                    <flux:sidebar.item 
                                        href="javascript:void(0)" 
                                        @click="open = !open"
                                        icon="cube"
                                    >
                                        <span style="display:flex; align-items:center; justify-content:space-between; width:100%;">
                                            
                                            <span>Customers</span>

                                            <flux:icon 
                                                name="chevron-down" 
                                                style="width:16px; transition:0.3s;"
                                                x-bind:style="open ? 'transform:rotate(180deg)' : ''"
                                            />
                                        </span>
                                    </flux:sidebar.item>

                                    <div x-show="open" x-transition style="margin-left: 25px;">

                                        <flux:sidebar.item 
                                            href="{{ route('admin.customers') }}" 
                                            wire:navigate
                                        >
                                            All Customers
                                        </flux:sidebar.item>

                                        <flux:sidebar.item href="#">
                                            Add New
                                        </flux:sidebar.item>

                                    </div>

                                </div>


                                <!-- Users -->
                                <div x-data="{ open: false }">

                                    <flux:sidebar.item 
                                        href="javascript:void(0)" 
                                        @click="open = !open"
                                        icon="users"
                                    >
                                        <span style="display:flex; align-items:center; justify-content:space-between; width:100%;">
                                            
                                            <span>Users</span>

                                            <flux:icon 
                                                name="chevron-down" 
                                                style="width:16px; transition:0.3s;"
                                                x-bind:style="open ? 'transform:rotate(180deg)' : ''"
                                            />
                                        </span>
                                    </flux:sidebar.item>

                                    <div x-show="open" x-transition style="margin-left: 25px;">

                                        <flux:sidebar.item 
                                            href="{{ route('admin.users') }}" 
                                            wire:navigate
                                        >
                                            All Users
                                        </flux:sidebar.item>

                                        <flux:sidebar.item href="#">
                                            Add User
                                        </flux:sidebar.item>

                                    </div>

                                </div>

                            </flux:sidebar.group>

                            <!-- Settings Dropdown -->
                            <flux:sidebar.group label="Settings" collapsible>

                                <div x-data="{ open: false }">

                                    <flux:sidebar.item 
                                        href="javascript:void(0)" 
                                        @click="open = !open"
                                        icon="cog"
                                    >
                                        <span style="display:flex; align-items:center; justify-content:space-between; width:100%;">
                                            
                                            <span>Manage Verbs</span>

                                            <flux:icon 
                                                name="chevron-down" 
                                                style="width:16px; transition:0.3s;"
                                                x-bind:style="open ? 'transform:rotate(180deg)' : ''"
                                            />
                                        </span>
                                    </flux:sidebar.item>

                                    <div x-show="open" x-transition style="margin-left: 25px;">

                                        <flux:sidebar.item 
                                            href="{{ route('admin.verbs.index') }}" 
                                            wire:navigate
                                        >
                                            All Verbs
                                        </flux:sidebar.item>

                                        

                                    </div>

                                </div>


                            </flux:sidebar.group>

                            <!-- Optional: More Dropdown -->
                            <flux:sidebar.group label="Settings" collapsible>

                                <flux:sidebar.item 
                                    href="#" 
                                    icon="cog"
                                >
                                    General Settings
                                </flux:sidebar.item>

                                <flux:sidebar.item 
                                    href="#" 
                                    icon="lock-closed"
                                >
                                    Security
                                </flux:sidebar.item>

                            </flux:sidebar.group>

                        </flux:sidebar>
                    </div>
                </div>

               <div id="openSidebarBtn"
                    onclick="showSidebar()"
                    style="
                        display:none;
                        position:fixed;
                        top:20px;
                        left:20px;
                        z-index:9999;
                        background:#E94E1B;
                        color:white;
                        width:45px;
                        height:45px;
                        border-radius:50%;
                        justify-content:center;
                        align-items:center;
                        cursor:pointer;
                        box-shadow:0 4px 10px rgba(0,0,0,0.2);
                    ">
                    <i class="fa fa-bars"></i>
                </div>

                <!-- Page Sidebar Ends-->
                
                 {{ $slot }}
            </div>
        </div>

        @fluxScripts

        // sidebar toggle functions
        <script>
            function hideSidebar() {
                document.getElementById('sidebarWrapper').style.display = 'none';
                document.getElementById('openSidebarBtn').style.display = 'flex';

                 // Expand page body
                document.getElementById('pageBody').style.marginLeft = '0';
                document.getElementById('pageBody').style.paddingLeft = '0';
                document.getElementById('pageBody').style.width = '100%';
            }

            function showSidebar() {
                document.getElementById('sidebarWrapper').style.display = 'block';
                document.getElementById('openSidebarBtn').style.display = 'none';

                // Restore spacing
                document.getElementById('pageBody').style.marginLeft = '';
                document.getElementById('pageBody').style.paddingLeft = '';
                document.getElementById('pageBody').style.width = '';
            }
        </script>

        <!-- The template js -->
        <!-- latest jquery-->
        <script src="/dash/assets/js/jquery.min.js" data-navigate-track></script>
        <!-- Bootstrap js-->
        <script src="/dash/assets/js/bootstrap/bootstrap.bundle.min.js" data-navigate-track></script>
        <!-- feather icon js-->
        <script src="/dash/assets/js/icons/feather-icon/feather.min.js" data-navigate-track></script>
        <script src="/dash/assets/js/icons/feather-icon/feather-icon.js" data-navigate-track></script>
        <!-- scrollbar js-->
        <script src="/dash/assets/js/scrollbar/simplebar.js" data-navigate-track></script>
        <script src="/dash/assets/js/scrollbar/custom.js" data-navigate-track></script>
        <!-- Sidebar jquery-->
        <script src="/dash/assets/js/config.js" data-navigate-track></script>
        <!-- Plugins JS start-->
        <script src="/dash/assets/js/sidebar-menu.js"data-navigate-track></script>
        <script src="/dash/assets/js/sidebar-pin.js" data-navigate-track></script>
        <script src="/dash/assets/js/slick/slick.min.js" data-navigate-track></script>
        <script src="/dash/assets/js/slick/slick.js" data-navigate-track></script>
        <script src="/dash/assets/js/header-slick.js" data-navigate-track></script>
        <script src="/dash/assets/js/chart/morris-chart/raphael.js" data-navigate-track></script>
        <script src="/dash/assets/js/chart/morris-chart/morris.js" data-navigate-track> </script>
        <script src="/dash/assets/js/chart/morris-chart/prettify.min.js" data-navigate-track></script>
        <script src="/dash/assets/js/chart/apex-chart/apex-chart.js" data-navigate-track></script>
        <script src="/dash/assets/js/chart/apex-chart/stock-prices.js" data-navigate-track></script>
        <script src="/dash/assets/js/chart/apex-chart/moment.min.js" data-navigate-track></script>
        <script src="/dash/assets/js/notify/bootstrap-notify.min.js" data-navigate-track></script>
        <script src="/dash/assets/js/dashboard/default.js" data-navigate-track></script>
        <script src="/dash/assets/js/notify/index.js" data-navigate-track></script>
        <script src="/dash/assets/js/datatable/datatables/jquery.dataTables.min.js" data-navigate-track></script>
        <script src="/dash/assets/js/datatable/datatables/datatable.custom.js" data-navigate-track></script>
        <script src="/dash/assets/js/datatable/datatables/datatable.custom1.js" data-navigate-track></script>
        <script src="/dash/assets/js/owlcarousel/owl.carousel.js" data-navigate-track></script>
        <script src="/dash/assets/js/owlcarousel/owl-custom.js" data-navigate-track></script>
        <script src="/dash/assets/js/typeahead/handlebars.js" data-navigate-track></script>
        <script src="/dash/assets/js/typeahead/typeahead.bundle.js" data-navigate-track></script>
        <script src="/dash/assets/js/typeahead/typeahead.custom.js" data-navigate-track></script>
        <script src="/dash/assets/js/typeahead-search/handlebars.js" data-navigate-track></script>
        <script src="/dash/assets/js/typeahead-search/typeahead-custom.js" data-navigate-track></script>
        <script src="/dash/assets/js/height-equal.js" data-navigate-track></script>
       
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="/dash/assets/js/script.js" data-navigate-track></script>
        <!-- <script src="/dash/assets/js/theme-customizer/customizer.js" data-navigate-track></script> -->
        <!-- Plugin used-->
        <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9e263577fee8b28b',t:'MTc3NDUyODY2OQ=='};var a=document.createElement('script');a.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/ea2d291c0fdc/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"ad651ca6cb1442c28591d5acd632a6c4","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>

            
           
            @if(session('success'))
            <script>
                (function ($) {
                    "use strict";

                    $.notify(
                        '<i class="fa fa-check"></i><strong> Success </strong> {{ session('success') }}',
                        {
                            type: "success",
                            allow_dismiss: true,
                            delay: 3000,
                            showProgressbar: true,
                            timer: 800,
                            animate: {
                                enter: "animated fadeInDown",
                                exit: "animated fadeOutUp",
                            },
                        }
                    );

                })(jQuery);
            </script>
            @endif


            @if(session('warning'))
            <script>
                (function ($) {
                    "use strict";

                    $.notify(
                        '<i class="fa fa-exclamation-triangle"></i><strong> Warning </strong> {{ session('warning') }}',
                        {
                            type: "warning",
                            allow_dismiss: true,
                            delay: 3000,
                            showProgressbar: true,
                            timer: 800,
                            animate: {
                                enter: "animated fadeInDown",
                                exit: "animated fadeOutUp",
                            },
                        }
                    );

                })(jQuery);
            </script>
            @endif


            @if(session('error'))
            <script>
                (function ($) {
                    "use strict";

                    $.notify(
                        '<i class="fa fa-times"></i><strong> Error </strong> {{ session('error') }}',
                        {
                            type: "danger",
                            allow_dismiss: true,
                            delay: 4000,
                            showProgressbar: true,
                            timer: 1000,
                            animate: {
                                enter: "animated shake",
                                exit: "animated fadeOutUp",
                            },
                        }
                    );

                })(jQuery);
            </script>
            @endif

            <script>
                document.addEventListener('livewire:navigated', function () {
                    // Re-init feather icons
                    if (typeof feather !== 'undefined') {
                        feather.replace();
                    }

                    // Re-init simplebar
                    if (typeof SimpleBar !== 'undefined') {
                        document.querySelectorAll('[data-simplebar]').forEach(function(el) {
                            new SimpleBar(el);
                        });
                    }

                    // Hide loader
                    const loader = document.querySelector('.loader-wrapper');
                    if (loader) loader.style.display = 'none';
                });
            </script>

            @livewireScripts


            <script>
                document.addEventListener('livewire:init', () => {

                    window.addEventListener('notify', (event) => {

                        let { type, message } = event.detail;

                        let icon = 'fa fa-bell';
                        let notifyType = 'info';

                        if (type === 'success') {
                            icon = 'fa fa-check';
                            notifyType = 'success';
                        }

                        if (type === 'warning') {
                            icon = 'fa fa-exclamation-triangle';
                            notifyType = 'warning';
                        }

                        if (type === 'error') {
                            icon = 'fa fa-times';
                            notifyType = 'danger';
                        }

                        $.notify(
                            `<i class="${icon}"></i><strong> ${type.toUpperCase()} </strong> ${message}`,
                            {
                                type: notifyType,
                                allow_dismiss: true,
                                delay: 3000,
                                showProgressbar: true,
                                timer: 800,
                                animate: {
                                    enter: "animated fadeInDown",
                                    exit: "animated fadeOutUp",
                                },
                            }
                        );
                    });

                });
            </script>
    </body>
</html>
