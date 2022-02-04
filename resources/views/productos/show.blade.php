
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.app')
        @section('content')
        @if (Session::has('error'))
                                        <div class="bg-danger">
                                            <span> <b>{{ session('error') }}</b> </span>
                                        </div>
                                    @endif
        <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{$producto->titulo}}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active">{{$producto->titulo}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <!-- LEFT COLUMN _________________________________________________________-->
            <div class="col-lg-9">
              
              <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">{{ trans('producto.clic') }}</a></p>
              <div id="productMain" class="row">
                <div class="col-sm-6">
                <div> <img src="{{asset("{$producto->imagen}")}}" alt="" class="img-fluid"></div>
                 <!--  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div> <img src="{{$producto->imagen}}" alt="" class="img-fluid"></div>
                    <div> <img src="img/detailbig2.jpg" alt="" class="img-fluid"></div>
                    <div> <img src="img/detailbig3.jpg" alt="" class="img-fluid"></div>
                  </div>-->
                </div>
                <div class="col-sm-6">
                  <div class="box">
                  <form  action="{{route('cart.add')}}" method="POST">
                      @csrf
                      <div class="unidades">
                        <h3>{{ trans('producto.unidades') }}</h3>
                        <select class="unidadesselect" name="unidades">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                      <p class="price">{{$producto->precioUnidad}}€</p>
                      <p class="text-center">
                     
                      <input type="hidden" name="idProducto" value="{{$producto->idProducto}}">
                        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i>{{ trans('producto.add') }}</button>
                        </form>
                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                      </p>
                    
                  </div>
                  
                </div>
              </div>
              <div id="details" class="box mb-4 mt-4">
                <p></p>
                <h4>{{ trans('producto.detalles') }}</h4>
                <p> {{$producto->descripcion}}</p>
                <h4>{{ trans('producto.marca') }}</h4>
                <p> {{$marca}}</p>
                <h4>{{ trans('producto.estado') }}</h4>
                <p> {{$producto->estado}}</p>
                <blockquote class="blockquote">
                  <p class="mb-0"><em>{{ trans('producto.img') }}</em></p>
                </blockquote>

              </div>
             
              
              <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="box text-uppercase mt-0 mb-small">
                    <h3>{{ trans('producto.interesar') }}</h3>
                  </div>
                </div>
                @foreach($ofertas as $oferta)
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="imagecart"><a href="{{ route('show', $oferta->idProducto) }}"><img src="{{asset("{$oferta->imagen}")}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="{{ route('show', $oferta->idProducto) }}">{{$oferta->titulo}}</a></h3>
                      <p class="price">{{$oferta->precioUnidad}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="box text-uppercase mt-0 mb-small">
                    <h3>{{ trans('producto.novedades') }}</h3>
                  </div>
                </div>
                @foreach($recientes as $reciente)
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="imagecart"><a href="{{ route('show', $reciente->idProducto) }}"><img src="{{asset("{$reciente->imagen}")}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="{{ route('show', $reciente->idProducto) }}">{{$reciente->titulo}}</a></h3>
                      <p class="price">{{$reciente->precioUnidad}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
               </div>
            </div>
            <div class="col-lg-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">{{ trans('producto.categorias') }}</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm category-menu">
                  @foreach ($categorias as $data)
                        <li class="nav-item"><a href="{{ route('productoscat', $data->idCategoria) }}" class="nav-link">{{$data->titulo}}</a></li>
                      @endforeach
                    
                  </ul>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
      @endsection