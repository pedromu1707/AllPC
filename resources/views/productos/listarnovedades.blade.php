@extends('layouts.cart')

@section('content')
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{ trans('categorias.novedades') }}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('index')}}">HOME</a></li>
                <li class="breadcrumb-item active">{{ trans('categorias.novedades') }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
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
                <div class="panel-heading">
                  <h3 class="h4 panel-title">{{ trans('categorias.categorias') }}</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{route('filtrar.novedades')}}">
                    @csrf
                        <ul class="nav nav-pills flex-column text-sm category-menu">

                            <ul class="nav nav-pills flex-column">
                            @foreach ($categorias as $data)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$data->idCategoria}}" name="idCategoria[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$data->titulo}}
                                    </label>
                                </div>
                                @endforeach
                            </ul>


                        </ul>
                    </div>
                    <div class="panel-heading">
                        <h3 class="h4 panel-title">{{ trans('categorias.marcas') }}</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills flex-column text-sm category-menu">

                            <ul class="nav nav-pills flex-column">
                            
                            
                                @foreach ($marcas as $data)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$data->idMarca}}" name="idMarca[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$data->marca}}
                                    </label>
                                </div>
                                @endforeach
                            </ul>


                        </ul>
                    </div>
                    <div class="panel-heading">
                        <h3 class="h4 panel-title">{{ trans('categorias.precio') }}</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills flex-column text-sm category-menu">

                           
                            
                            
                                
                               <div class="row justify-content-around">
                                    <input class="col-lg-5 col-md-5" type="number"name="minimo" id="minimo"placeholder="Mínimo">
                                    <input class="col-lg-5 col-md-5"type="number"name="maximo" id="maximo"placeholder="Máximo">
                                    </div>
                                   
                                
                                
                          


                        </ul>
                    </div>
                    <div class="row justify-content-around pt-3">
                                    <input class="col-lg-5 col-md-5 btn btn-ligh" type="submit"value="Filtar">
                                    <a class="col-lg-5 col-md-5 btn btn-ligh"href="{{route('novedades')}}">Eliminar Filtros</a>
                                    </div>
                    </form>
                </div>



            </div>
            <div class="col-md-9">
              
            <div class="row">
@foreach ($productos as $data)

<div class="col-lg-4 col-md-6">
                  <div class="product">  
                    <div class="maxproduct"><a href="{{ route('show', $data->idProducto) }}"><img src="{{asset("{$data->imagen}")}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="{{ route('show', $data->idProducto) }}">{{ $data->titulo }}</a></h3>
                      <p class="price">{{ $data->precioUnidad }}€/Unidad</p>
                      
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
@if($paginar==1)
{{ $productos->links() }}
@endif
              
            </div>
          </div>
        </div>
      </div>
      @endsection