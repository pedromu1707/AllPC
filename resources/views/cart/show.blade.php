@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">{{ trans('carrito.carrito') }}</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}">HOME</a></li>
                    <li class="breadcrumb-item active">Carrito</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <p class="text-muted lead">{{ trans('carrito.tienes') }} {{count(Cart::getContent())}} {{ trans('carrito.producto') }}</p>
            </div>
            <div id="basket" class="col-lg-9">
                <div class="box mt-0 pb-0 no-horizontal-padding">

                    <div class="table-responsive">
                        @if (count(Cart::getContent()))
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>{{ trans('carrito.nombre') }}</th>
                                <th>{{ trans('carrito.precio') }}</th>
                                <th>{{ trans('carrito.cantidad') }}</th>
                            </thead>
                            <tbody>

                                @foreach (Cart::getContent() as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->price}}€</td>
                                    <td>{{$data->quantity}}</td>
                      
                                          
                                    <td>
                                        <form action="{{ route('cart.remove')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="cantidad" value="{{$data->quantity}}">
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="cart-clear" class="btn btn-danger">{{ trans('carrito.vaciar') }}</a>



                        @endif
                    </div>
                    <div class="">

                        <div class="float-right">
                            <form  method="get">
                                @csrf
                                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                           
                                <a class="btn btn-primary" href="{{ route('pedido')}}"> <i class="fa fa-chevron-right"></i>{{ trans('carrito.pago') }}</a>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="box text-uppercase mt-0 mb-2">
                            <h3>{{ trans('carrito.interesar') }}</h3>
                        </div>
                    </div>
                    @foreach ($destacados as $destacado)
                    <div class="col-lg-3 col-md-6">
                        <div class="product">
                            <div class="imagecart"><a href="{{ route('show', $destacado->idProducto) }}"><img
                                        src="{{asset("{$destacado->imagen}")}}" alt="" class="img-fluid image1"></a></div>
                            <div class="text">
                                <h3 class="h5"><a
                                
                                        href="{{ route('show', $destacado->idProducto) }}">{{$destacado->titulo}}</a></h3>
                                <p class="price">{{$destacado->precioUnidad}}€</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="text-center">{{ $destacados->links() }}</div>

            </div>
            <div class="col-lg-3">
                <div id="order-summary" class="box mt-0 mb-4 p-0">
                    <div class="box-header mt-0">
                        <h3>{{ trans('carrito.resumen') }}</h3>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @if(session('total'))
                                <tr>
                                    <td>{{ trans('carrito.total') }}</td>
                                    <th>{{session('total')-session('total')*0.21}}€</th>
                                </tr>
                                <tr>
                                    <td>{{ trans('carrito.descuento') }}</td>
                                    <th>{{session('total')-Cart::getTotal()}}€</th>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ trans('carrito.total') }}</td>
                                    <th>{{Cart::getTotal()-Cart::getTotal()*0.21}}€</th>
                                </tr>
                                @endif
                                @if(Cart::getTotal()<=50 && Cart::getTotal()>0)
                                    <tr>
                                        <td>{{ trans('carrito.envio') }}</td>
                                        <th>10.00€</th>
                                    </tr>
                                    @elseif(Cart::getTotal()==0)
                                    <tr>
                                        <td>{{ trans('carrito.envio') }}</td>
                                        <th>0.00€</th>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{ trans('carrito.envio') }}</td>
                                        <th>{{ trans('carrito.gratis') }}</th>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>{{ trans('carrito.impuestos') }}</td>
                                        <th>{{Cart::getTotal()*0.21}}€</th>
                                    </tr>
                                    @if(Cart::getTotal()<=50 && Cart::getTotal()>0)
                                        <tr class="total">
                                            <td>Total</td>
                                            <td>{{Cart::getTotal()+10}}€</td>
                                        </tr>
                                        @else
                                        <tr class="total">
                                            <td>{{ trans('carrito.total2') }}</td>
                                            <td>{{Cart::getTotal()}}€</td>
                                        </tr>
                                        @endif
                                        @if(Cart::getTotal()<=50) <tr>
                                            <td>{{ trans('carrito.faltan') }} {{50-Cart::getTotal()}}€ {{ trans('carrito.enviogratis') }}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td>{{ trans('carrito.enviogratis2') }}</td>
                                            </tr>
                                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                    <h4>{{ trans('carrito.cupon') }}</h4>
                </div>
                <p class="text-muted">{{ trans('carrito.cupon2') }}</p>
                <form action="{{ route('cupon')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" id="cupon" name="cupon"><span class="input-group-btn">
                            <button type="submit" class="btn btn-template-main"><i
                                    class="fa fa-gift"></i></button></span><br>
                        @if(isset($cuponactivo))
                        <p>{{$cuponactivo}}</p>

                        @endif

                    </div>
                </form>
            </div>
            </div>
            






        </div>




    </div>





</div>





@endsection