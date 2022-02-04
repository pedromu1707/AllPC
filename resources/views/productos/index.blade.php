@extends('layouts.app')

@section('content')
@if (Session::has('error'))
<div class="bg-danger">
    <span> <b>{{ session('error') }}</b> </span>
</div>
@endif
<div class="item header margin-top-0">
    <div class="wrapper">

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="text-homeimage">
                        <div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">

                        </div>
                        <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- STEPS =============================-->
<div class="item content">
    <div class="container toparea">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="col editContent">
                    <span class="numberstep"><i class="fa fa-shopping-cart"></i></span>
                    <h3 class="numbertext">{{ trans('home.calidad') }}</h3>
                    <p>
                        {{ trans('home.calidad2') }}
                    </p>
                </div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.col-md-4 col -->
            <div class="col-md-4 editContent">
                <div class="col">
                    <span class="numberstep"><i class="fa fa-gift"></i></span>
                    <h3 class="numbertext">{{ trans('home.pago') }}</h3>
                    <p>
                        {{ trans('home.pago2') }}
                    </p>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.col-md-4 col -->
            <div class="col-md-4 editContent">
                <div class="col">
                    <span class="numberstep"><i class="fa fa-download"></i></span>
                    <h3 class="numbertext">{{ trans('home.garantia') }}</h3>
                    <p>
                        {{ trans('home.garantia2') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- LATEST ITEMS =============================-->
<section class="item content">
    <div class="container">
        <div class="underlined-title">
            <div class="editContent">
                <h1 class="text-center latestitems">{{ trans('home.ultimos') }}</h1>
            </div>
            <div class="wow-hr type_short">
                <span class="wow-hr-h">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </span>
            </div>
        </div>
        <div class="row">
            @foreach ($productos as $data)

            <div class="col-md-4 col-sm-12">
                <div class="productbox">
                    <div class="fadeshop" align="center">
                        <div class="captionshop text-center" style="display: none;">
                            <h3>{{ $data->titulo }}</h3>
                            <p>
                                {{ $data->descripcion }}
                            </p>
                            <p>
                                <a href="#" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i>
                                    Purchase</a>
                                <a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
                            </p>
                        </div>
                        <span class="maxproduct"><a href="{{ route('show', $data->idProducto) }}"><img src="{{asset("{$data->imagen}")}}" alt="Imagen no disponible"></span>
                    </div>
                    <div class="product-details">
                        <a href="{{ route('show', $data->idProducto) }}">
                            <h1>{{ $data->titulo }}</h1>
                        </a> <br>
                        <span class="price">
                            <span class="edd_price">{{ $data->precioUnidad }}€/Unidad</span>
                        </span>
                       
                    </div>
                </div>
                <div class="ribbon-holder">
                    @if($data->oferta)
                    <div class="ribbon sale">{{ trans('home.oferta') }}</div>
                    @endif

                    @if($data->destacado)
                    <div class="ribbon new">TOP</div>
                    @endif

                </div>
            </div>


            @endforeach


        </div>
    </div>
    </div>
</section>


<!-- BUTTON =============================-->
<div class="item content">
    <div class="container text-center">
        <a href="{{route('novedades')}}" class="homebrowseitems">{{ trans('home.novedades') }}
            <div class="homebrowseitemsicon">
                <i class="fa fa-star fa-spin"></i>
            </div>
        </a>
    </div>
</div>
<br />


<!-- BANNER =============================-->

<section class="item content">
    <div class="container">
        <div class="underlined-title">
            <div class="editContent">
                <h1 class="text-center latestitems">{{ trans('home.ofertas') }}</h1>
            </div>
            <div class="wow-hr type_short">
                <span class="wow-hr-h">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </span>
            </div>
        </div>
        <div class="row">
            @foreach ($ofertas as $data)

            <div class="col-md-4">
                <div class="productbox">
                    <div class="fadeshop"  align="center">

                        <span class="maxproduct"><a href="{{ route('show', $data->idProducto) }}"><img src="{{asset("{$data->imagen}")}}" alt="Imagen no disponible"></span>
                    </div>
                    <div class="product-details">

                        <a href="{{ route('show', $data->idProducto) }}">
                            <h1>{{ $data->titulo }}</h1>
                        </a> <br>
                        <span class="price">

                            <span class="edd_price">{{ $data->precioUnidad }}€/Unidad</span>
                        </span>
                       
                    </div>
                </div>
                <div class="ribbon-holder">


                    @if($data->destacado)
                    <div class="ribbon new">TOP</div>
                    @endif

                </div>
            </div>

            @endforeach


        </div>
    </div>
    </div>
</section>


<!-- BUTTON =============================-->
<div class="item content">
    <div class="container text-center">
        <a href="{{route('ofertas')}}" class="homebrowseitems">{{ trans('home.ofertas2') }}
            <div class="homebrowseitemsicon">
                <i class="fa fa-star fa-spin"></i>
            </div>
        </a>
    </div>
</div>
<br />

<!-- AREA =============================-->
<div class="item content">
    <div class="container">
        <div class="row justify-content-around">

            <!-- /.col-md-4 col -->
            <div class="col-md-4">
                <i class="fa fa-comments infoareaicon"></i>
                <div class="infoareawrap">
                    <h1 class="text-center subtitle">{{ trans('home.duda') }}</h1>
                    <p class="text-center">
                        {{ trans('home.duda2') }}
                    </p>
                    <p class="text-center">
                        <a href="/contacto">- {{ trans('home.contacto') }} -</a>
                    </p>
                </div>
            </div>
            <!-- /.col-md-4 col -->

            <div class="col-md-4">
                <i class="fa fa-microphone infoareaicon"></i>
                <div class="infoareawrap">
                    <h1 class="text-center subtitle">{{ trans('home.sugerencia') }}</h1>
                    <p class="text-center">
                        {{ trans('home.sugerencia2') }}
                    </p>
                    <p class="text-center">
                        <a href="{{route('sugerencias')}}">- {{ trans('home.sugerencia3') }} -</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- TESTIMONIAL =============================-->


@endsection