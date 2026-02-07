


@include('user.layouts.head')
@include('user.layouts.header')
@include('user.layouts.breadcrumb', ['title' => $pageTitle ?? ''])

 @yield('section')
@include('user.layouts.footer')
