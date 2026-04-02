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
                    <li class="onhover-dropdown"> 
                        <div class="notification-box">
                        <!-- <svg> 
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#Bell"></use>
                        </svg> -->

                         <i class="fa fa-bell"></i>
                        </div>
                        <div class="onhover-show-div notification-dropdown"> 
                        <h6 class="f-18 mb-0 dropdown-title">Notifications</h6>
                        <div class="notification-card">
                            <ul>
                            <li>
                                <div class="user-notification">
                                <div><img src="/dash/assets/images/avtar/2.jpg" alt="avatar"></div>
                                <div class="user-description"><a href="letter-box.html">
                                    <h4>You have new finical page design.</h4></a><span>Today 11:45pm</span></div>
                                </div>
                                <div class="notification-btn">
                                <button class="btn btn-pill btn-primary" type="button" title="btn btn-pill btn-primary">Accpet</button>
                                <button class="btn btn-pill btn-secondary" type="button" title="btn btn-pill btn-primary">Decline</button>
                                </div>
                                <div class="show-btn"><a href="index-2.html"> <span>Show</span></a></div>
                            </li>
                            <li>
                                <div class="user-notification">
                                <div><img src="/dash/assets/images/avtar/17.jpg" alt="avatar"></div>
                                <div class="user-description"><a href="letter-box.html">
                                    <h4>Congrats! you all task for today.</h4></a><span>Today 01:05pm</span></div>
                                </div>
                                <div class="notification-btn">
                                <button class="btn btn-pill btn-primary" type="button" title="btn btn-pill btn-primary">Accpet</button>
                                <button class="btn btn-pill btn-secondary" type="button" title="btn btn-pill btn-primary">Decline</button>
                                </div>
                                <div class="show-btn"><a href="index-2.html"> <span>Show</span></a></div>
                            </li>
                            <li> 
                                <div class="user-notification">
                                <div> <img src="/dash/assets/images/avtar/18.jpg" alt="avatar"></div>
                                <div class="user-description"><a href="letter-box.html">
                                    <h4>You have new in landing page design.</h4></a><span>Today 06:55pm</span></div>
                                </div>
                                <div class="notification-btn">
                                <button class="btn btn-pill btn-primary" type="button" title="btn btn-pill btn-primary">Accpet</button>
                                <button class="btn btn-pill btn-secondary" type="button" title="btn btn-pill btn-primary">Decline</button>
                                </div>
                                <div class="show-btn"><a href="index-2.html"> <span>Show</span></a></div>
                            </li>
                            <li>
                                <div class="user-notification">
                                <div><img src="/dash/assets/images/avtar/19.jpg" alt="avatar"></div>
                                <div class="user-description"><a href="letter-box.html">
                                    <h4>Congrats! you all task for today.</h4></a><span>Today 06:55pm</span></div>
                                </div>
                                <div class="notification-btn">
                                <button class="btn btn-pill btn-primary" type="button" title="btn btn-pill btn-primary">Accpet</button>
                                <button class="btn btn-pill btn-secondary" type="button" title="btn btn-pill btn-primary">Decline</button>
                                </div>
                                <div class="show-btn"> <a href="index-2.html"> <span>Show</span></a></div>
                            </li>
                            <li> <a class="f-w-700" href="letter-box.html">Check all </a></li>
                            </ul>
                        </div>
                        </div>
                    </li>
                    <li class="onhover-dropdown">
                        <!-- <svg>
                        <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#Bookmark"></use>
                        </svg> -->

                        <i class="fa fa-bookmark"></i>

                        <div class="onhover-show-div bookmark-flip">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                            <div class="front">
                                <h6 class="f-18 mb-0 dropdown-title">Bookmark</h6>
                                <ul class="bookmark-dropdown">
                                <li>
                                    <div class="row">
                                    <div class="col-4 text-center"><a href="form-validation.html">
                                        <div class="bookmark-content">
                                            <div class="bookmark-icon bg-light-primary"><i data-feather="file-text"></i></div><span>Forms</span>
                                        </div></a></div>
                                    <div class="col-4 text-center"><a href="user-profile.html">
                                        <div class="bookmark-content"> 
                                            <div class="bookmark-icon bg-light-secondary"><i data-feather="user"></i></div><span>Profile</span>
                                        </div></a></div>
                                    <div class="col-4 text-center"><a href="bootstrap-basic-table.html">
                                        <div class="bookmark-content">
                                            <div class="bookmark-icon bg-light-warning"> <i data-feather="server"> </i></div><span>Tables </span>
                                        </div></a></div>
                                    </div>
                                </li>
                                <li class="text-centermedia-body"> <a class="flip-btn f-w-700" id="flip-btn" href="javascript:void(0)">Add New Bookmark</a></li>
                                </ul>
                            </div>
                            <div class="back">
                                <ul>
                                <li>
                                    <div class="bookmark-dropdown flip-back-content">
                                    <input type="text" placeholder="search...">
                                    </div>
                                </li>
                                <li><a class="f-w-700 d-block flip-back" id="flip-back" href="javascript:void(0)">Back</a></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                    </li>
                    <li class="onhover-dropdown"> 
                        <div class="message position-relative">
                        <!-- <svg>
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#Message"></use>
                        </svg> -->

                        <i class="fa fa-message"></i>   
                        
                        <span class="rounded-pill badge-danger"></span>
                        </div>
                        <div class="onhover-show-div message-dropdown">
                        <h6 class="f-18 mb-0 dropdown-title">Message</h6>
                        <ul>
                            <li>
                            <div class="d-flex align-items-start">
                                <div class="message-img bg-light-primary"><img src="/dash/assets/images/user/3.jpg" alt=""></div>
                                <div class="flex-grow-1">
                                <h5><a href="letter-box.html">Emay Walter</a></h5>
                                <p>Do you want to go see movie?</p>
                                </div>
                                <div class="notification-right"><i data-feather="x"></i></div>
                            </div>
                            </li>
                            <li>
                            <div class="d-flex align-items-start">
                                <div class="message-img bg-light-primary"><img src="/dash/assets/images/user/6.jpg" alt=""></div>
                                <div class="flex-grow-1">
                                <h5> <a href="letter-box.html">Jason Borne</a></h5>
                                <p>Thank you for rating us.</p>
                                </div>
                                <div class="notification-right"><i data-feather="x"></i></div>
                            </div>
                            </li>
                            <li>
                            <div class="d-flex align-items-start"> 
                                <div class="message-img bg-light-primary"><img src="/dash/assets/images/user/10.jpg" alt=""></div>
                                <div class="flex-grow-1">
                                <h5> <a href="letter-box.html">Sarah Loren</a></h5>
                                <p>What`s the project report update?</p>
                                </div>
                                <div class="notification-right"><i data-feather="x"></i></div>
                            </div>
                            </li>
                            <li> <a class="f-w-700" href="private-chat.html">Check all</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="cart-nav onhover-dropdown">
                        <div class="cart-box"> 
                            <!-- <svg>
                                <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#Buy"></use>
                            </svg> -->
                            <i class="fa fa-cart-shopping"></i>
                        
                        </div>
                        <div class="cart-dropdown onhover-show-div">
                        <h6 class="f-18 mb-0 dropdown-title">Cart</h6>
                        <ul>
                            <li>
                            <div class="d-flex"><img class="img-fluid b-r-5 img-50" src="/dash/assets/images/ecommerce/05.jpg" alt="">
                                <div class="flex-grow-1"> <span>Women's Track Suit</span>
                                <h6 class="font-primary">8 x $65.00</h6>
                                </div>
                                <div class="close-circle"><a class="bg-primary" href="#"><i data-feather="x"></i></a></div>
                            </div>
                            </li>
                            <li>
                            <div class="d-flex"><img class="img-fluid b-r-5 img-50" src="/dash/assets/images/ecommerce/02.jpg" alt="">
                                <div class="flex-grow-1"><span>Men's Jacket</span>
                                <h6 class="font-primary">10 x $50.00</h6>
                                </div>
                                <div class="close-circle"><a class="bg-primary" href="#"><i data-feather="x"></i></a></div>
                            </div>
                            </li>
                            <li class="total">
                            <h6 class="mb-0">Order Total :<span class="f-right">$1020.00</span></h6>
                            </li>
                            <li class="text-center"> <a href="cart.html">
                                <button class="btn btn-outline-primary" type="button">View Cart</button></a><a class="btn btn-primary view-checkout" href="checkout.html">Checkout  </a></li>
                        </ul>
                        </div>
                    </li>
                    
                    <li class="language-nav">
                        <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang"><i class="flag-icon flag-icon-gb"></i><span class="lang-txt box-col-none">EN            </span></div>
                        </div>
                        <div class="more_lang">
                            <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span> (US)</span></span></div>
                            <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span class="lang-txt">Deutsch</span></div>
                            <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span class="lang-txt">Español</span></div>
                            <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span class="lang-txt">Français</span></div>
                            <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span class="lang-txt">Português<span> (BR)</span></span></div>
                            <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span class="lang-txt">简体中文</span></div>
                            <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span class="lang-txt">لعربية <span> (ae)</span></span></div>
                        </div>
                        </div>
                    </li>
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
                <div class="sidebar-wrapper" data-layout="stroke-svg">
                <div>
                    <div class="logo-wrapper">
                        
                    <a href="index-2.html"> <img class="img-fluid for-light" style="width: 60px; height: auto;" src="/dash/logo/iandm_logo_black.png" alt=""><img class="img-fluid for-dark" src="/dash/assets/images/logo/logo_dark.png" alt=""></a>
                    
                    <div class="toggle-sidebar">
                        <i class="fa fa-bars"></i>
                       
                    </div>
                    </div>
                    <!-- <div class="logo-icon-wrapper"><a href="index-2.html"><img class="img-fluid" src="/dash/assets/images/logo/logo-icon.png" alt=""></a></div> -->
                    <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn"><a href="index-2.html"><img class="img-fluid" src="/dash/assets/images/logo/logo-icon.png" alt=""></a>
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li class="pin-title sidebar-main-title">
                                <div> 
                                <h6>Pinned</h6>
                                </div>
                            </li>
                            <li class="sidebar-main-title">
                                <div>
                                <h6 class="lan-1">General</h6>
                                </div>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                            
                                <a class="sidebar-link " href="#">
                                    <span class="lan-3">Dashboard</span>
                                </a>
                            </li>
                           
                            <li class="sidebar-list"><i class="fa fa-thumb-tack">    </i>
                                <a class="sidebar-link " href="{{route('admin.roles-perm')}}">
                                 <span>Roles & Permissions</span>
                                </a>
                               
                            </li>
                            <li class="sidebar-list"><i class="fa fa-thumb-tack">    </i><a class="sidebar-link " href="{{route('admin.models')}}">
                                <span>Models</span></a>
                            </li>
                            <li class="sidebar-list"><i class="fa fa-thumb-tack">    </i><a class="sidebar-link " href="{{route('admin.users')}}">
                                <span>Users</span></a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
                </div>
                <!-- Page Sidebar Ends-->
                
                 {{ $slot }}

                
            </div>
        </div>

        @fluxScripts

        <!-- The template js -->
        <!-- latest jquery-->
        <script src="/dash/assets/js/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="/dash/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="/dash/assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="/dash/assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <script src="/dash/assets/js/scrollbar/simplebar.js"></script>
        <script src="/dash/assets/js/scrollbar/custom.js"></script>
        <!-- Sidebar jquery-->
        <script src="/dash/assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <script src="/dash/assets/js/sidebar-menu.js"></script>
        <script src="/dash/assets/js/sidebar-pin.js"></script>
        <script src="/dash/assets/js/slick/slick.min.js"></script>
        <script src="/dash/assets/js/slick/slick.js"></script>
        <script src="/dash/assets/js/header-slick.js"></script>
        <script src="/dash/assets/js/chart/morris-chart/raphael.js"></script>
        <script src="/dash/assets/js/chart/morris-chart/morris.js"> </script>
        <script src="/dash/assets/js/chart/morris-chart/prettify.min.js"></script>
        <script src="/dash/assets/js/chart/apex-chart/apex-chart.js"></script>
        <script src="/dash/assets/js/chart/apex-chart/stock-prices.js"></script>
        <script src="/dash/assets/js/chart/apex-chart/moment.min.js"></script>
        <script src="/dash/assets/js/notify/bootstrap-notify.min.js"></script>
        <script src="/dash/assets/js/dashboard/default.js"></script>
        <script src="/dash/assets/js/notify/index.js"></script>
        <script src="/dash/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
        <script src="/dash/assets/js/datatable/datatables/datatable.custom.js"></script>
        <script src="/dash/assets/js/datatable/datatables/datatable.custom1.js"></script>
        <script src="/dash/assets/js/owlcarousel/owl.carousel.js"></script>
        <script src="/dash/assets/js/owlcarousel/owl-custom.js"></script>
        <script src="/dash/assets/js/typeahead/handlebars.js"></script>
        <script src="/dash/assets/js/typeahead/typeahead.bundle.js"></script>
        <script src="/dash/assets/js/typeahead/typeahead.custom.js"></script>
        <script src="/dash/assets/js/typeahead-search/handlebars.js"></script>
        <script src="/dash/assets/js/typeahead-search/typeahead-custom.js"></script>
        <script src="/dash/assets/js/height-equal.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="/dash/assets/js/script.js"></script>
        <script src="/dash/assets/js/theme-customizer/customizer.js"></script>
        <!-- Plugin used-->
        <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9e263577fee8b28b',t:'MTc3NDUyODY2OQ=='};var a=document.createElement('script');a.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/ea2d291c0fdc/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"ad651ca6cb1442c28591d5acd632a6c4","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>


    </body>
</html>
