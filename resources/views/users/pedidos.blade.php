
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.app')
        @section('content')

<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{ trans('perfil.pedidos') }}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Mis Pedidos</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar mb-0">
            <div id="customer-orders" class="col-md-9">
              <p class="text-muted lead">{{ trans('perfil.duda') }} <a href="{{route('contacto')}}">{{ trans('perfil.contactanos') }}</a>, {{ trans('perfil.equipo') }}</p>
              <div class="box mt-0 mb-lg-0">
                <div class="table-responsive">
                <table  id="tablapedidos" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>{{ trans('perfil.fecha') }}</th>
                <th>{{ trans('perfil.direccion') }}</th>
                <th>{{ trans('perfil.articulos') }}</th>
                <th width="100px">{{ trans('perfil.total') }}</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($pedidos as $data)
            <tr>
            <td>{{$data->idPedido}}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->direccion }}</td>
            <td>{{ $data->articulos }}</td>
            <td>{{ $data->total }}€</td>
            
            
            
           
            </tr>
            @endforeach
            
        </tbody>
    </table>
    {{ $pedidos->links() }}
    
                </div>
              </div>
            </div>
            <div class="col-md-3 mt-4 mt-md-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">{{ trans('perfil.seccion') }}</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="{{route('pedidos')}}" class="nav-link active"><i class="fa fa-list"></i>{{ trans('perfil.pedidos') }}</a></li>
                    <li class="nav-item"><a href="{{route('perfil')}}" class="nav-link"><i class="fa fa-user"></i> {{ trans('perfil.cuenta2') }}</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
      @endsection
      @section('js')
    <script>
        $('#tablapedidos').DataTable();
    </script>
@endsection