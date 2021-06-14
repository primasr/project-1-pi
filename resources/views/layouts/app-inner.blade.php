<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ config('app.name') }}</title> --}}
    <title>@yield('title')</title>

    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    

    <!-- Favicons -->
    <link href="{{ asset('Arsha/assets/img/Logo.png') }}" rel="icon">
    <link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Arsha/assets/css/style.css') }}" rel="stylesheet">

    {{-- Language programming logos --}}
    <link href="https://languages.abranhe.com/logos.css" rel="stylesheet">

        <style>
            /* .breadcrumbs {
                margin-top: 0px;
            } */
            .btn-info {
                color: #fff;
                background-color: #37517e;
                border-color: #37517e;
            }

            .text-info {
                color: #37517e!important;
            }

            .bg-info {
                background-color: #37517e!important;
            }

            .border-primary {
                border-color: #37517e!important;
            }

            /* Accordion things */
            .accordion {
                /* background-color: #eee; */
                /* color: #444; */
                background-color: #5489c2;
                color: white;
                cursor: pointer;                                
                padding: 18px;
                width: 100%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 15px;
                transition: 0.4s;
            }

            .active2, .accordion:hover {
                /* background-color: #ccc; */
                background-color: #37517e;
            }

            .accordion:after {
                content: '\002B';
                /* color: #777; */
                color: white;
                font-weight: bold;
                float: right;
                margin-left: 5px;
            }

            .active2:after {
                content: "\2212";
            }

            .panel {
                padding: 0 18px;
                /* background-color: white; */
                background-color: #eee;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.2s ease-out;
            }

            #header {
                transition: all 0.5s;
                z-index: 997;
                padding: 15px 0;
                background: rgba(40, 58, 90, 0.9);
            }

            html {
                min-height: 100vh;
            }

            .pagination li:hover{
                cursor: pointer;
            }

        </style>
</head>
<body class="d-flex flex-column" style="min-height: 100vh">    
    @php
        $name_of_file = "default";
    @endphp

    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="/">GCC</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            {{-- <a href="/" class="logo mr-auto"><img src="{{ asset('Arsha/assets/img/Logo.png') }}" alt="" class="img-fluid"></a> --}}
    
            {{-- <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    {{-- <li><a href="#team">Features</a></li>
                </ul>
            </nav> --}}
    
            <a href="/" class="get-started-btn scrollto">Home</a>
    
        </div>
    </header> 

    <div style="flex-grow: 1">
       @yield('content') 
    </div>    

    <footer id="footer"> 
        @include('layouts.footer')
    </footer>

    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div>
    
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
            this.classList.toggle("active2");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            } 
            });
        }

        $(document).ready(function() {
            $('#example').DataTable( {
                select: true
            } );
        } );

        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>
    
</body>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>        

    <!-- Vendor JS Files -->
    <script src="{{ asset('Arsha/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Arsha/assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->    
    <script src="{{ asset('Arsha/assets/js/main.js') }}"></script>

</html>