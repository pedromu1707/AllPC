 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ __('AllPC') }}</title>
     <link rel="icon" href="{{ asset('imagenes/favicon.PNG') }}">
     <script src="{{asset('/js/app.js')}}"></script>

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


     <!-- Navbar Start-->
     <header class="nav-holder make-sticky">
         <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
             <div class="container"><a href="{{route('index')}}" class="navbar-brand home"><img src="{{asset('/imagenes/logo.png')}}"
                         alt="Universal logo" class="d-none d-md-inline-block"><span class="sr-only">Inicio</span></a>
                 <button type="button" data-toggle="collapse" data-target="#navigation"
                     class="navbar-toggler btn-template-outlined"><span class="sr-only"></span><i
                         class="fa fa-align-justify"></i></button>
                 <div id="navigation" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav ml-auto">
                         <li class="nav-item"><a href="{{route('index')}}" class="">{{ trans('app.inicio') }}<b class=""></b></a>
                         </li>
                         <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown"
                                 class="dropdown-toggle">{{ trans('app.categorias') }} <b class="caret"></b></a>
                             <ul class="dropdown-menu">
                                 @foreach ($categorias as $data)
                                 <li class="dropdown-item"><a href="{{ route('productoscat', $data->idCategoria) }}"
                                         class="nav-link">{{ $data->titulo }}</a></li>
                                 @endforeach
                             </ul>
                         </li>
                         <li class="nav-item"><a href="{{route('ofertas')}}" class="nav-link">{{ trans('app.ofertas') }}</a>
                         </li>
                         <li class="nav-item"><a href="{{route('contacto')}}" class="nav-link">{{ trans('app.contacto') }}<b
                                     class="caret"></b></a>
                         </li>
                         <li class="nav-item"><a href="{{route('cart.show')}}" class="nav-link">{{ trans('app.carrito') }}<b
                                     class="caret"></b></a>
                         </li>
                     </ul>
                 </div>
                 <div id="search" class="collapse clearfix">
                     <form role="search" class="navbar-form">
                         <div class="input-group">
                             <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                                 <button type="submit" class="btn btn-template-main"><i
                                         class="fa fa-search"></i></button></span>
                         </div>
                     </form>
                 </div>

             </div>
         </div>
     </header>
     <main class="py-4">
         @yield('content')
     </main>
     <footer class="main-footer">
         <div class="container">
             <div class="row justify-content-around">
                 <div class="col-lg-4">
                     <h4 class="h6">{{ trans('app.sobre') }}</h4>
                     <p>{{ trans('app.allpc') }}</p>
                     <p>{{ trans('app.allpc2') }}</p>
                     <hr>
                     <h4 class="h6">{{ trans('app.suscribete') }}</h4>
                     <form method="POST" action="{{route('newsletter')}}">
                         @csrf
                         <div class="input-group">
                             <input type="text" class="form-control" name="email" id="email">
                             <div class="input-group-append">
                                 <button type="submit" class="btn btn-secondary"><i class="fa fa-send"></i></button>
                             </div>
                         </div>
                     </form>
                     <hr class="d-block d-lg-none">
                 </div>
                 
                 <div class="col-lg-4">
                     <h4 class="h6">{{ trans('app.contacto') }}</h4>
                     <p class="text-uppercase"><strong>{{ trans('app.avenida') }}</strong><br>S/N<br>14006<br>Córdoba<br><strong>España</strong></p><a
                         href="{{route('contacto')}}" class="btn btn-template-main">{{ trans('app.pagcontacto') }}</a>
                     <hr class="d-block d-lg-none">
                 </div>
                
             </div>
         </div>
         <div class="copyrights">
             <div class="container">
                 <div class="row justify-content-between">
                     <div class="col-lg-2 text-center-md">
                         <p>&copy; 2021. AllPc</p>
                     </div>
                     <div class="col-lg-2 text-center-md">
                         <div class="dropdown">
                             <a class="dropdown-toggle" type="" id="idioma" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                 {{ trans('app.idioma') }}
                             </a>
                             <div class="dropdown-menu" aria-labelledby="idioma">
                                 <a class="dropdown-item" href="{{ route('language','en') }}">{{ trans('app.en') }}</a>
                                 <a class="dropdown-item" href="{{ route('language','es') }}">{{ trans('app.es') }}</a>

                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </footer>
     </div>

    

     <script src="{{asset('/js/app.js')}}"></script>



     <!--   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.3/jquery.scrollTo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"> </script>
 
    
    <script src="js/front.js"></script>
   
   
   
    -->

 </html>