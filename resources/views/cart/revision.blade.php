@extends('layouts.cart')

@section('content')


<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">{{ trans('carrito.resumen') }}</h1>
      </div>
      <div class="col-md-5">
       <ul class="breadcrumb d-flex justify-content-end">
        <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ trans('carrito.resumen') }}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
 <div id="content">
  <div class="container">
   <div class="row">
    <div id="checkout" class="col-lg-9">
     <div class="box">
    
        <ul class="nav nav-pills nav-fill">
          <li class="nav-item"><a href="#" class="nav-link disabled"> <i class="fa fa-map-marker"></i><br>{{ trans('carrito.direccion') }}</a></li>
          <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-truck"></i><br>{{ trans('carrito.metodoenvio') }}</a></li>
          <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-university"></i><br>{{ trans('carrito.metodopago') }}</a></li>
          <li class="nav-item"><a href="#" class="nav-link active"><i class="fa fa-eye"></i><br>{{ trans('carrito.resumen') }}</a></li>
        </ul>
    
      <div class="content">
        <div class="table-responsive">
          <table class="table">
            @if (count(Cart::getContent()))
              <thead>
               <tr>
                <th>{{ trans('carrito.idproducto') }}</th>
                <th>{{ trans('carrito.nombreproducto') }}</th>
                <th>{{ trans('carrito.cantidad') }}</th>
                <th>{{ trans('carrito.preciounidad') }}</th>
                <th>Total</th>
               </tr>
              </thead>
              <tbody>
                @foreach (Cart::getContent() as $data)
                 <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->quantity}}</td>
                  <td>{{$data->price}}€</td>
                  <td>{{$data->price*$data->quantity}}€</td>
                 </tr>
                @endforeach
                </tbody>
              @endif
               <tfoot>
               @if (session('total'))
                <tr>
                 <th colspan="4">Total</th>
                 <th>{{Cart::getSubTotal()}}€</th>
                </tr>
                <tr>
                 <th colspan="4">Descuento</th>
                 <th>{{session('total')-Cart::getSubTotal()}}€</th>
                </tr>
               @else
                 <tr>
                  <th colspan="4">Total</th>
                  <th>{{Cart::getSubTotal()}}€</th>
                 </tr>
               @endif        
               </tfoot>    
              </table>       
            <div class="box box mt-0 mb-4 p-0">          
            </div>
                  </div>
                </div>
                <div class="">
                  <div class="float-right">
                  <form action="{{ route('paypal.pay')}}">
                    <button type="submit" class="btn btn-primary">{{ trans('carrito.finalizar') }}<i class="fa fa-chevron-right"></i></button>
                </form >
             
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
            <div id="order-summary" class="box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                  <h3>{{ trans('carrito.resumen') }}</h3>
                </div>
                
                <div class="table-responsive">
                  <table class="le">
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
         



@endsection