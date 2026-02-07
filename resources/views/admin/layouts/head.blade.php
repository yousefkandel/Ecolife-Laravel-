@php
    $adminAssets = asset('admin/assets');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zono admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Zono admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('user/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('user/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <title>Ecolife</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">

    <!-- CSS Vendors -->
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/icofont.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/select2.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/owlcarousel.css">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/range-slider.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/vendors/bootstrap.css">

    <!-- App CSS -->
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/style.css">
    <link id="color" rel="stylesheet" href="{{ $adminAssets }}/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ $adminAssets }}/css/responsive.css">
</head>

<body>
    {{-- Loader (اختياري) --}}
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>


    <!-- Tap on top -->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <!-- Page Wrapper Start -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page Body Wrapper Start -->
        <div class="page-body-wrapper">

            {{-- هنا يجي محتوى الصفحة: Header + Sidebar + Content + Footer --}}
