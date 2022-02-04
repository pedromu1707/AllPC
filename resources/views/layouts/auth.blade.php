<!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ __('AllPC') }}</title>
     <link rel="icon" href="{{ asset('imagenes/favicon.PNG') }}">
     <script src="/js/app.js"></script>

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
         integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
     </script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
         integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
     </script>




<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">

     <!-- owl carousel-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


     <!-- theme stylesheet-->
     <link rel="stylesheet" href="{{asset('css/style.blue.css')}}" id="theme-stylesheet">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">


     <!-- Custom stylesheet - for your changes-->
     <!-- <link rel="stylesheet" href="css/custom.css">-->
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <!-- Styles -->

 </head>

 <body>
     <div class="top-bar">
         <div class="container">
             <div class="row">




                 <div class="col-md-12 col-sm-12 col align-self-end">

                     @guest






                     <div class="">






                         <div class="login-btn d-md-inline-block float-right">
                             @if (Route::has('login'))

                             <a href="{{ route('login') }}" class="login-btn"><i class="fa fa-address-card"></i><span
                                     class="d-none d-md-inline-block">Sign In</span></a>

                             @endif
                             @if (Route::has('register'))

                             <a href="{{ route('register') }}" class="signup-btn"><i class="fa fa-user"></i><span
                                     class="d-none d-md-inline-block">Sign Up</span></a>
                             @endif
                             @else



                             <li class="login-btn d-md-inline-block float-right">
                                 <a id="navbarDropdown" class="dropdown-toggle login-btn" href="#" role="button"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     {{ Auth::user()->name }}

                                 </a>

                                 <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                     @if (Auth::user()->is_admin==true)
                                     <a class="dropdown-item" href="{{route('admin.pedido')}}">
                                         <i class="fas fa-wrench mr-3"></i>Admin
                                     </a>


                                     @endif
                                     <a class="dropdown-item" href="{{route('perfil')}}">
                                         <i class=""></i>{{ trans('app.perfil') }}
                                     </a>
                                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>


                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                                 </div>



                             </li>
                             @endguest



                         </div>


                     </div>
                 </div>
             </div>
         </div>
     </div>

     @yield('content')




     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"> </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.3/jquery.scrollTo.min.js"></script>
    <script src="{{asset('/js/front.js')}}"></script>