<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <title>{{ config('app.name', 'Ovum') }}</title>
    @stack('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/loader.js') }}" defer></script>
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/elements/avatar.css') }}" rel="stylesheet">   
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap');
    </style>
    
@yield('script')
@laravelPWA
</head>
<body class="dashboard-analytics">
    
        <!-- BEGIN LOADER -->
        <div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
        <!--  END LOADER -->
        @include('layouts.admin-navbar')
        
    
        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">
    
            <div class="overlay"></div>
            <div class="search-overlay"></div>
            @include('layouts.admin-sidebar')
            
            
            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    <div class="row layout-top-spacing flex-wrap">
                        @yield('content')
                    </div>
                </div>
    
                <div class="footer-wrapper">
                    <div class="footer-section f-section-2">
                        <p class="">Copyright © 2021 Gruncho.</p>
                    </div>
                    <div class="footer-section f-section-1">
                        <p class="">Hecho con <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> por Gruncho</p>
                    </div>
                </div>
            </div>
            <!--  END CONTENT AREA  -->
    
    
        </div>
        


    @include('sweetalert::alert')

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
 
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/dashboard/dash_1.js') }}" defer></script>
    @stack('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>