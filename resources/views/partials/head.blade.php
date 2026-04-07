<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>
    {{ filled($title ?? null) ? $title.' - '.config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

<!-- dashboard stylings from templates -->

<link rel="stylesheet" type="text/css" href="/dash/assets/css/font-awesome.css" data-navigate-track>
 <!-- ico-font-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/icofont.css" data-navigate-track>
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/themify.css" data-navigate-track>
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/flag-icon.css" data-navigate-track>
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/feather-icon.css" data-navigate-track>
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/slick.css"    data-navigate-track>
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/slick-theme.css" data-navigate-track>
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/scrollbar.css" data-navigate-track>
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/animate.css" data-navigate-track>
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/datatables.css" data-navigate-track>
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/owlcarousel.css" data-navigate-track>
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/vendors/bootstrap.css" data-navigate-track>
<!-- App css-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/style.css" data-navigate-track>
<link id="color" rel="stylesheet" href="/dash/assets/css/color-1.css" media="screen" data-navigate-track>
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="/dash/assets/css/responsive.css" data-navigate-track>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" data-navigate-track>
<!-- template laravel stylings -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
