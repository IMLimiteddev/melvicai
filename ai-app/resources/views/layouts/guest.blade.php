<!DOCTYPE html>
<!-- <html lang="en"> -->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-navigate-scheme="dark">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melvic AI</title>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <!-- favicon -->
    <link rel="icon" type="image/png"  href="/onboarding/assets/images/favicon.ico" data-navigate-track>

    <!-- Google Fonts (deferred) -->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&amp;display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Load Font Awesome CSS asynchronously -->
    <link rel="stylesheet" href="/onboarding/assets/css/font-awesome.min.css" media="print" onload="this.media='all'" data-navigate-track>

    <!-- fontello font css -->
    <link rel="stylesheet" href="/onboarding/assets/css/plugins/fontello-enqueue.css" media="print" onload="this.media='all'" data-navigate-track>
    <link rel="stylesheet" href="/onboarding/assets/css/plugins/fontello-icons.css" media="print" onload="this.media='all'" data-navigate-track>

    <!-- others css -->
    <!-- Keep these normal - needed for initial page load -->
    <link rel="stylesheet" href="/onboarding/assets/css/plugins/bootstrap.min.css" data-navigate-track>
    <link rel="stylesheet" href="/onboarding/assets/css/style.css" data-navigate-track>

    <!-- Make these async - only used for specific components -->
    <link rel="stylesheet" href="/onboarding/assets/css/plugins/swiper-bundle.min.css" media="print" onload="this.media='all'" data-navigate-track>
    <noscript>
        <link rel="stylesheet" href="/onboarding/assets/css/plugins/swiper-bundle.min.css" data-navigate-track>
    </noscript>

    <link rel="stylesheet" href="/onboarding/assets/css/plugins/lightgallery-bundle.min.css" media="print" onload="this.media='all'" data-navigate-track>
    <noscript>
        <link rel="stylesheet" href="/onboarding/assets/css/plugins/lightgallery-bundle.min.css" data-navigate-track>
    </noscript>
    <style>
        /* Hide preloader on wire:navigate - only show on first load */
        [wire\:navigate-in-progress] #preloader {
            display: none !important;
        }
    </style>

    @livewireStyles   
    <!-- @fluxStyles        -->

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader">
            <img src="/onboarding/assets/images/preloader-dark.png" alt="Loading...">
        </div>
    </div>
    <!-- End Preloader -->

    <button id="themeBtn"><i class="far fa-moon"></i></button>

    <div class="video-modal">
        <div class="video-modal-content">
            <span class="close-btn">&times;</span>
            <iframe allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>

    <div class="search-popup" data-popup="1">
        <div class="search-popup-content">
            <form>
                <button type="submit"><i class="fa fa-search"></i></button>
                <input type="text" placeholder="Type Your Search..." required>
            </form>
            <button type="button" class="close-popup"></button>
        </div>
    </div>

    <!-- Side Menu -->
    <div class="side-menu" id="sideMenu">
        <div class="overlay" id="overlay"></div>
        <a href="javascript:void(0)" class="close-btn" id="closeBtn"><i class="fa fa-close"></i> close</a>
        <div class="menu-content">
            <a class='logo' href='index1.html'><img src="/onboarding/assets/images/logo2.svg" alt="logo"></a>
            <div class="sidebar-menu">
                <h4 class="title">contacts</h4>
                <p>GRM, Berlin - 1060 <br> Str. First Avenue 1</p>
                <a href="tel:+13685678954" title="" class="nmbr">800 100 975 20 34</a>
                <a href="tel:8003508431" title="" class="nmbr">+ (123) 1800-234-5678</a>
                <a href="mailto:aiero@mail.co" class="email">Melvicai.com</a>
                <a href="#" title="" class="ibt-btn ibt-btn-outline-3 ibt-btn-rounded"><span>Get in Touch</span></a>
            </div>
            <ul class="social-icon">
                <li><a href="www.facebook.html" title=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://x.com/i/flow/login?lang=en" title=""><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.linked.com/" title=""><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="https://www.youtube.com/" title=""><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- New Mobile Menu -->
    <div data-menu="mobileMenu" class="side-menu2">
        <div class="menu-btns">
            <a href="#" class="popup-search" data-popup="1"><i class="fa fa-search"></i></a>
            <button id="mobileCloseBtn2" class="close-btn"></button>
        </div>
        <ul>
            <li>
                <a href="#">Home</a>
                <ul>
                    <li><a href='index1.html'>Modern Technology</a></li>
                    <!-- <li><a href='index2.html'>Neural Networks</a></li>
                    <li><a href='index3.html'>AI Agency</a></li>
                    <li><a href='index4.html'>Chatbot</a></li>
                    <li><a href='index5.html'>Startup</a></li>
                    <li><a href='index6.html'>AI Consulting</a></li>
                    <li><a href='index7.html'>Futurism</a></li>
                    <li><a href='index8.html'>Hi-Tech</a></li>
                    <li><a href='index9.html'>Voiceover</a></li>
                    <li><a href='index10.html'>Science</a></li>
                    <li><a href='index11.html'>Creative Bureau</a></li>
                    <li><a href='index12.html'>Video Voiceover</a></li>
                    <li><a href='index13.html'>IT Services</a></li>
                    <li><a href='index14.html'>AI Devices</a></li>
                    <li><a href='index15.html'>AI Solutions</a></li>
                    <li><a href='index16.html'>Image Generator</a></li>
                    <li><a href='index17.html'>Content Generator</a></li>
                    <li><a href='index.html'>Intro</a></li> -->
                </ul>
            </li>
            <li>
                <a href="#">pages</a>
                <ul>
                    <li><a href='about-us.html'>About us</a></li>
                    <li class="sub-menu">
                        <a href="#">Team</a>
                        <ul>
                            <li><a href='team.html' title>Creative team</a></li>
                            <li><a href='team-single.html' title>Team Single</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="#">Projects</a>
                        <ul>
                            <li><a href='project.html'>Projects Grid</a></li>
                            <li><a href='project2.html'>Projects Modern</a></li>
                            <li><a href='project-single.html'>Project Single</a></li>
                        </ul>
                    </li>
                    <li><a href='gallery-grid.html'>Gallery Grid</a></li>
                    <li><a href='gallery-masonry.html'>Gallery Masonry</a></li>
                    <li><a href='pricing.html'>Pricing plans</a></li>
                    <li><a href='faq.html'>FAQ</a></li>
                    <li><a href='typography.html'>Typography</a></li>
                    <li><a href='404.html'>404</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Services</a>
                <ul>
                    <li><a href='service.html'>Services Page</a></li>
                    <li><a href='service-single.html'>Service Single</a></li>
                </ul>
            </li>
            
            <li><a href="#">Contact us</a></li>
        </ul>
        <div class="menu-contact">
            <span>Contacts</span>
            <a href="tel:+13685678954" class="nmbr" title="">+1 800 529 10 37</a>
            <a href="mailto:melvicai@mail.co" title="" class="gmail">melvicai@mail.co</a>
        </div>
        <div class="menu-links">
            <span>Follow us:</span>
            <ul class="social-icon">
                <li><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-youtube"></i></a></li>
            </ul>
            <a href="#" title="" class="ibt-btn ibt-btn-outline-3 ibt-btn-rounded">
                <span>Get in Touch</span>
            </a>
        </div>
    </div>
    <!-- Overlay for Mobile Menu -->
    <div class="overlay2"></div>

    <!-- sticky header -->
    <header class="sticky-active">
        <div class="header-menu-area3">
            <div class="row gx-20 align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="header-logo">
                        <a href="javascript:void(0)" class="menu-toggle"></a>
                        <a href='index1.html'>
                            <img src="/onboarding/assets/images/logo.svg" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <nav class="main-menu menu-style1">
                        <ul>
                            <li>
                                <a class='active' href='index.html'>
                                    <span class="menu-item">Home</span>
                                    <span class="menu-item2">Home</span>
                                </a>
                                <ul class="mega-sub-menu">
                                    <li class="mega-menu-column">
                                        <ul>
                                            <li><a href='index1.html'>Modern Technology</a></li>
                                          
                                        </ul>
                                      
                                    </li>
                                    <li class="mega-menu-column">
                                        <a class='darkModeTriggerImg' href='index1.html'><img src="/onboarding/assets/images/event/dark-version.png" alt="AI Agency & Technology HTML Template"></a>
                                        <a class='darkModeTriggerImg2' href='index1.html'><img src="/onboarding/assets/images/event/light-version.png" alt="AI Agency & Technology HTML Template"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                               
                                <ul class="sub-menu">
                                    <li><a href='about-us.html'>About us</a></li>
                                    
                                   
                                </ul>
                            </li>
                            <li>
                                <a href='{{ route("onboard.services") }}' wire:navigate>
                                    <span class="menu-item">services</span>
                                    <span class="menu-item2">services</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href='{{ route("onboard.services") }}' wire:navigate>Services Page</a></li>
                                    <li><a href='service-single.html'>Service Single</a></li>
                                </ul>
                            </li>
                            
                            
                            <li>
                                <a href='contact.html'>
                                    <span class="menu-item">Contacts</span>
                                    <span class="menu-item2">Contacts</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-auto d-none d-xl-block">
                    <div class="btn-box">
                        <a href="#" class="popup-search" data-popup="1"><i class="fa fa-search"></i></a>
                        <a class='ibt-btn ibt-btn-outline-3 ibt-btn-rounded' href="{{route('login')}}" wire:navigate title>
                            <span>Login</span>
                        </a>
                    </div>
                </div>
            </div>
            <button class="hamburger popup-menu" data-menu="mobileMenu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
    <!-- End sticky header -->

    <!--======== Header ========-->
    <header class="vs-header3">
        <div class="container2 position-relative">
            <div class="header-menu-area3">
                <div class="row gx-20 align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="javascript:void(0)" class="menu-toggle"></a>
                            <a href='index1.html'>
                                <img src="/onboarding/assets/images/logo.svg" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu menu-style1">
                            <ul>
                                <li>
                                    <a class='active' href='{{route("home")}}' wire:navigate>
                                        <span class="menu-item">Home</span>
                                        <span class="menu-item2">Home</span>
                                    </a>
                                    <ul class="mega-sub-menu">
                                        <li class="mega-menu-column">
                                            <ul>
                                                <li><a href='{{route("home")}}' wire:navigate>Modern Technology</a></li>
                                               
                                            </ul>
                                            <ul>
                                                <li><a href='{{route("home")}}' wire:navigate>Science</a></li>
                                              
                                            </ul>
                                        </li>
                                        <li class="mega-menu-column">
                                            <a class='darkModeTriggerImg' href='{{route("home")}}' wire:navigate><img src="/onboarding/assets/images/event/dark-version.png" alt="AI Agency & Technology HTML Template"></a>
                                            <a class='darkModeTriggerImg2' href='{{route("home")}}' wire:navigate><img src="/onboarding/assets/images/event/light-version.png" alt="AI Agency & Technology HTML Template"></a>
                                        </li>
                                    </ul>
                                </li>
                                
                                 <li>
                                    <a href='{{ route("onboard.services") }}' wire:navigate>
                                        <span class="menu-item">services</span>
                                        <span class="menu-item2">services</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href='{{ route("onboard.services") }}' wire:navigate>Services Page</a></li>
                                        <li><a href='service-single.html'>Service Single</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href='{{ route("onboard.about") }}' wire:navigate>
                                        <span class="menu-item">About Us</span>
                                        <span class="menu-item2">About Us</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href='{{ route("onboard.about") }}' wire:navigate>About us</a></li>
                                        
                                    </ul>
                                </li>

                                <li>
                                    <a href='{{ route("onboard.contact") }}' wire:navigate>
                                        <span class="menu-item">contact Us</span>
                                        <span class="menu-item2">contact Us</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href='{{ route("onboard.contact") }}' wire:navigate>contact</a></li>
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="btn-box">
                            <a href="#" class="popup-search" data-popup="1"><i class="fa fa-search"></i></a>
                            <a class='ibt-btn ibt-btn-outline-3 ibt-btn-rounded' href='{{ route("onboard.contact") }}' title>
                                <span>Get in Touch</span>
                            </a>
                        </div>
                    </div>
                </div>
                <button class="hamburger popup-menu" data-menu="mobileMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
    <!--======== / Header ========-->

   <main>
        {{ $slot }}
    </main>

    <!-- main-sec -->
    <section class="main-sec">
        <!-- contact-sec -->
        <div class="contact-sec ibt-section-gap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <div class="sec-title white">
                                <span class="sub-title">get in touch</span>
                                <h2 class="title animated-heading">We are always ready to help you and answer your
                                    questions</h2>
                                <p>Pacific hake false trevally queen parrotfish black prickleback mosshead
                                    warbonnet sweeper! Greenling sleeper.
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="contact-info">
                                        <div class="call-center">
                                            <h4 class="title">Call Center</h4>
                                            <a href="tel:8003508431" class="nmbr">800 100 975 20 34</a>
                                            <a href="mailto:support@aiero.com" class="nmbr">+ (123) 1800-234-5678</a>
                                        </div>
                                        <div class="call-center mb-0">
                                            <h4 class="title">Email</h4>
                                            <a href="mailto:support@aiero.com" class="gmail">aiero@mail.co</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="contact-info">
                                        <div class="call-center">
                                            <h4 class="title">Our Location</h4>
                                            <p>USA, New York - 1060 <br>Str. First Avenue 1</p>
                                        </div>
                                        <div class="call-center mb-0">
                                            <h4 class="title">Social network</h4>
                                            <ul class="social-icon">
                                                <li><a href="https://www.facebook.com/" target="_blank" title=""><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="http://www.twitter.com/" target="_blank" title=""><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="http://www.linkedin.com/" target="_blank" title=""><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="https://www.youtube.com/" target="_blank" title=""><i
                                                            class="fab fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="#" method="post" class="custom-form">
                                <h2>Get in Touch</h2>
                                <input type="text" id="name" name="name" placeholder="Full name" required>
                                <input type="email" id="email" name="email" placeholder="Email" required>
                                <input type="text" id="subject" name="subject" placeholder="Subject" required>
                                <textarea id="message" name="message" rows="5" placeholder="Write your message..." required></textarea>

                                <button type="submit" class="ibt-btn ibt-btn-outline">
                                    <span>Send message</span>
                                    <i class="icon-arrow-top"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End contact-sec -->

        <!-- footer-style1 -->
        <footer class="footer-style1">
            <div class="footer-top">
                <div class="container">
                    <div class="footer-content">
                        <h2 class="title">It’s blow your mind! Meet Neural Networks</h2>
                        <a href="#" title="" class="ibt-btn ibt-btn-outline">
                            <span>Get a Quote</span>
                            <i class="icon-arrow-top"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="widget-area ibt-section-gapTop">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-6">
                            <div class="about-widget footer-widget">
                                <div class="footer-logo">
                                    <img src="/onboarding/assets/images/logo2.svg" alt="AI Agency & Technology HTML Template">
                                </div>
                                <ul class="social-icon">
                                    <li><a href="https://www.facebook.com/" target="_blank" title=""><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="http://www.twitter.com/" target="_blank" title=""><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="http://www.linkedin.com/" target="_blank" title=""><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://www.youtube.com/" target="_blank" title=""><i
                                                class="fab fa-youtube"></i></a></li>
                                </ul>
                                <h2 class="title">since 2025</h2>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="footer-menu">
                                <div class="footer-links footer-widget">
                                    <h4 class="widget-title">Company</h4>
                                    <ul>
                                        <li><a href='about-us.html' title>About</a></li>
                                        <li><a href="#" title="">Expertise</a></li>
                                        <li><a href="#" title="">Sustainability</a></li>
                                        <li><a href="#" title="">News & Media</a></li>
                                        <li><a href="#" title="">Case Studies</a></li>
                                        <li><a href="#" title="">Contacts</a></li>
                                    </ul>
                                </div>
                                <div class="footer-links footer-widget">
                                    <h4 class="widget-title">Services</h4>
                                    <ul>
                                        <li><a href="#" title="">Air Freight</a></li>
                                        <li><a href="#" title="">Sea Freight</a></li>
                                        <li><a href="#" title="">Land Transport</a></li>
                                        <li><a href="#" title="">Groupage</a></li>
                                        <li><a href="#" title="">Consultancy</a></li>
                                        <li><a href="#" title="">Value Added Services</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-botom">
                <div class="container">
                    <div class="footer-box">
                        <p><a href="#">©Aiero</a> 2025. All rights reserved.</p>
                        <span>Terms of use <a href="#">Privacy Policy</a></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-style1 -->
    </section>
    <!-- End main-sec -->

    <!-- Scroll Button -->
    <button id="scrollBtn" title="Go to top">
        <i class="fas fa-angle-up"></i>
    </button>


    <!-- Js Plugin -->
    <script src="/onboarding/assets/js/bootstrap.min.js" data-navigate-track></script>
    <script src="/onboarding/assets/js/vendor/swiper-bundle.min.js" data-navigate-track></script>
    <script src="/onboarding/assets/js/vendor/lenis.min.js" data-navigate-track></script>
    <script src="/onboarding/assets/js/vendor/gsap.min.js" data-navigate-track></script>
    <script src="/onboarding/assets/js/vendor/ScrollTrigger.min.js" data-navigate-track></script>
    <script src="/onboarding/assets/js/main.js" data-navigate-track></script>

    @livewireScripts

    @fluxScripts

    <script>

        // Customize progress bar
        document.addEventListener('livewire:init', function () {
            Livewire.navigate.progress({
                color: '#your-brand-color',  // e.g. '#6366f1' or '#ff6600'
                height: '3px',
            });
        });

        // Re-initialize template JS after every wire:navigate
        document.addEventListener('livewire:navigated', function () {
            // Re-init Swiper
            if (typeof Swiper !== 'undefined') {
                document.querySelectorAll('.swiper').forEach(function(el) {
                    if (!el.swiper) {
                        new Swiper(el, {
                            loop: true,
                            autoplay: { delay: 3000 },
                        });
                    }
                });
            }

            // Re-init counters
            document.querySelectorAll('.percent-counter').forEach(function(el) {
                el.textContent = '0';
                const target = parseInt(el.dataset.target);
                let count = 0;
                const interval = setInterval(function() {
                    count += Math.ceil(target / 50);
                    if (count >= target) {
                        el.textContent = target;
                        clearInterval(interval);
                    } else {
                        el.textContent = count;
                    }
                }, 30);
            });

            // Hide preloader on navigate
            const preloader = document.getElementById('preloader');
            if (preloader) preloader.style.display = 'none';
        });


        

    </script>

</body>


</html>