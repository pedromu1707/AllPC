<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="{{ asset('imagenes/favicon.PNG') }}">

  <title>AllPC Backend</title>
 
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
<!--dataTables-->
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('backend/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('backend/css/sleek.css') }}" />

  

  <!-- FAVICON -->
  

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


     
     <script src="https://ajax.googleapta.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    

     <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>
  <![endif]-->
  
</head>


  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
   
 
    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
      
              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="{{route('index')}}">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">AllPc</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                
                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="#" data-toggle="collapse" data-target="#pedidos"
                      aria-expanded="false" aria-controls="pedidos">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Pedidos</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="pedidos"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.pedido') }}">Listar Pedidos</a></span></b>
                        </li>
                        
                        
                        </li>
                      </div>
                    </ul>
                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="#" data-toggle="collapse" data-target="#productos"
                      aria-expanded="false" aria-controls="productos">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Productos</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="productos"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.producto') }}">Listar Productos</a></span></b>
                        </li>
                        <li  class="" >
                          <a href="{{ route('admin.producto.create') }}">Añadir Productos</a></span></b>
                        </li>
                        
                        </li>
                      </div>
                    </ul>
                  </li>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="#" data-toggle="collapse" data-target="#marcas"
                      aria-expanded="false" aria-controls="marcas">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Marcas</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="marcas"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.marca') }}">Listar Marcas</a></span></b>
                        </li>
                        <li  class="" >
                          <a href="{{ route('admin.marca.create') }}">Añadir Marcas</a></span></b>
                        </li>
                        
                        </li>
                      </div>
                    </ul>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="alert.html" data-toggle="collapse" data-target="#ofertas"
                      aria-expanded="false" aria-controls="ofertas">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Ofertas</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="ofertas"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.ofertas') }}">Listar Ofertas</a></span></b>
                        </li>
                        <li  class="" >
                          <a href="{{ route('admin.ofertas.create') }}">Añadir Ofertas</a></span></b>
                        </li>
                        
                        </li>
                      </div>
                    </ul>
                  </li>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="alert.html" data-toggle="collapse" data-target="#destacados"
                      aria-expanded="false" aria-controls="destacados">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Destacados</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="destacados"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.destacado') }}">Listar Destacados</a></span></b>
                        </li>
                        <li  class="" >
                          <a href="{{ route('admin.destacado.create') }}">Añadir Destacados</a></span></b>
                        </li>
                        
                        </li>
                      </div>
                    </ul>
                  </li>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="alert.html" data-toggle="collapse" data-target="#categorias"
                      aria-expanded="false" aria-controls="categorias">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Categorias</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="categorias"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.categoria') }}">Listar Categorias</a></span></b>
                        </li>
                        <li  class="" >
                          <a href="{{ route('admin.categoria.create') }}">Añadir Categorias</a></span></b>
                        </li>
                        
                        </li>
                      </div>
                    </ul>
                  </li>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="alert.html" data-toggle="collapse" data-target="#usuarios"
                      aria-expanded="false" aria-controls="usuarios">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Usuarios</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="usuarios"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.usuario') }}">Listar Usuarios</a></span></b>
                        </li>
                        <li  class="" >
                          <a href="{{ route('admin.usuario.create') }}">Añadir Usuarios</a></span></b>
                        </li>
                        
                        </li>
                      </div>
                    </ul>
                  </li>
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="alert.html" data-toggle="collapse" data-target="#cupones"
                      aria-expanded="false" aria-controls="cupones">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Cupones Descuento</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="cupones"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.cupon') }}">Listar Cupones</a></span></b>
                        </li>
                        <li  class="" >
                          <a href="{{ route('admin.cupon.create') }}">Añadir Cupones</a></span></b>
                        </li>
                        
                       
                      </div>
                    </ul>
                  </li>
                   <li  class="has-sub" >
                    <a class="sidenav-item-link" href="alert.html" data-toggle="collapse" data-target="#contactos"
                      aria-expanded="false" aria-controls="contactos">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Contactos</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="contactos"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li  class="" >
                          <a href="{{ route('admin.contacto') }}">Listar Contactos</a></span></b>
                        </li>
                       
                        
                       
                      </div>
                    </ul>
                  </li>
                  
                

                

                
              
            <hr class="separator" />

            
          </div>
        </aside>

      

      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              

              
            </nav>


          </header>

          @yield('content')

                  <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year">2021</span> Copyright AllPC by Pedro Muñoz
                
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>
    

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>

<script src="{{ asset('backend/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>

<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>

<script src="{{ asset('backend/plugins/toaster/toastr.min.js') }}"></script>

<script src="{{ asset('backend/plugins/charts/Chart.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ladda/ladda.min.js') }}"></script>

<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('backend/js/sleek.js') }}"></script>
<script src="{{ asset('backend/js/chart.js') }}"></script>
<script src="{{ asset('backend/js/date-range.js') }}"></script>
<script src="{{ asset('backend/js/map.js') }}"></script>

<script src="{{ asset('backend/js/custom.js')}}"></script>-->

<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('backend/plugins/nprogress/nprogress.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>



<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('backend/js/sleek.js') }}"></script>
<script src="{{ asset('backend/js/chart.js') }}"></script>
<script src="{{ asset('backend/js/map.js') }}"></script>


@yield('js')

  </body>
</html>
