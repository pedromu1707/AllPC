

@extends('layouts.backend')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Nuevo Producto</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('admin.producto.create.store') }}" role="form" enctype="multipart/form-data" files="true"> 
                        @csrf

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <label for="titulo">Titulo</label>
                                    <div class="form-group">
                                       
                                        <input type="text" name="titulo" id="titulo" class="form-control input-sm"
                                            value="{{old('titulo')}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                     <label for="descripcion">Descripción</label>
                                    <div class="form-group">
                                     
                                        <input type="text" name="descripcion" id="descripcion"
                                            class="form-control input-sm" value="{{old('descripcion')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <label for="categoria">Categoría</label>
                                    <select class="form-control input-sm" name="idCategoria" id="categoria" 
                                        aria-label="Default select example">
                                        
                                        @foreach ($categorias as $data)
                                        <option value="{{$data->idCategoria}}">{{$data->titulo}}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <label for="imagen">Imagen</label>
                                    <div class="form-group">
                                       
                                        <input type="file" name="imagen" id="imagen" class="form-control input-sm"
                                            placeholder="imagen">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <label for="unidadesDispo">Unidades Disponibles</label>
                                    <div class="form-group">
                                        
                                        <input type="number" name="unidadesDispo" id="unidadesDispo" value="{{old('unidadesDispo')}}"
                                            class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <label for="precioUnidad">Precio Unidad</label>
                                    <div class="form-group">
                                        <input type="number" step=any name="precioUnidad" id="precioUnidad" value="{{old('precioUnidad')}}"
                                            class="form-control input-sm" placeholder="Precio Unitario">
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <label for="">¿Está en oferta?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="oferta" id="ofertasi" value="1">
                                    <label class="form-check-label" for="ofertasi">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="oferta" id="ofertano" value=0>
                                    <label class="form-check-label" for="ofertano">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="">¿Es destacado?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="destacado" id="destacadosi"
                                        value=1>
                                    <label class="form-check-label" for="destacadosi">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="destacado" id="destacadono"
                                        value=0>
                                    <label class="form-check-label" for="destacadono">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <label for="estado">Estado</label>
                                    <select class="form-control input-sm" name="estado" id="estado"
                                        aria-label="Default select example">
                                        <option selected value='Nuevo'>Nuevo</option>
                                        <option value='Reacondicionado'>Reacondicionado</option>

                                    </select>

                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                   <label for="marca">Marca</label>
                                    <select class="form-control input-sm" name="idMarca" id="marca"
                                        aria-label="Default select example">
                                       
                                        @foreach ($marcas as $data)
                                        <option value="{{$data->idMarca}}">{{$data->marca}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="btn btn-success btn-block">
                                    <a href="{{ route('admin.producto')}}" class="btn btn-info btn-block">Atrás</a>
                                </div>

                            </div>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </div>
    @endsection