@extends('layouts.cart')

@section('content')
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{ trans('carrito.direccion') }}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('carrito.direccion') }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row">
            <div id="checkout" class="col-lg-9">
              <div class="box border-bottom-0">
              @if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
                <form method="POST" action="{{ route('envio')}}">
                @csrf
                  <ul class="nav nav-pills nav-fill">
                    <li class="nav-item"><a href="#" class="nav-link active"> <i class="fa fa-map-marker"></i><br>{{ trans('carrito.direccion') }}</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-truck"></i><br>{{ trans('carrito.metodoenvio') }}</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-university"></i><br>{{ trans('carrito.metodopago') }}</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-eye"></i><br>{{ trans('carrito.resumen') }}</a></li>
                  </ul>
                  <div class="content">
                 
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="nombre">{{ trans('carrito.nombre') }}</label>
                          <input id="nombre" name="nombre" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="apellido">{{ trans('carrito.apellidos') }}</label>
                          <input id="apellido" name="apellido" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="calle">{{ trans('carrito.calle') }}</label>
                          <input id="calle" name="calle"type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="numero">{{ trans('carrito.numero') }}</label>
                          <input id="numero" name="numero" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label for="ciudad">{{ trans('carrito.ciudad') }}</label>
                          <input id="ciudad" name="ciudad" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label for="cp">CP</label>
                          <input id="cp" name="cp" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label for="provincia">{{ trans('carrito.provincia') }}</label>
                          <input type="text" name="provincia" id="provincia" class="form-control"></input>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label for="pais">{{ trans('carrito.pais') }}</label>
                          <input type="text" name="pais" id="pais" class="form-control"></input>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="telefono">{{ trans('carrito.telefono') }}</label>
                          <input id="telefono" name="telefono" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input id="email" name="email" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="">
                   
                    <div class="float-right">
                      <button type="submit" class="btn btn-primary">{{ trans('carrito.continuapago') }}<i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
                </form>
              </div>
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
                        <td>Descuento{{ trans('carrito.descuento') }}</td>
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
                        <td>Total</td>
                        <td>{{Cart::getTotal()}}€</td>
                        </tr>
                        @endif
                      @if(Cart::getTotal()<=50)
                      <tr>
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
            </div>
          </div>
        </div>
      </div>
      </div>
      @endsection