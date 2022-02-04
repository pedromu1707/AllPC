<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/app.css')}}">

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
                    <h3 class="panel-title">Editar Usuario</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="GET" action="{{ route('admin.usuario.edit.update', $usuario->id) }}" role="form">



                            <div class="row">

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$usuario->name}}"
                                            placeholder="{{$usuario->name}}">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rol" id="admin" value=1>
                                    <label class="form-check-label" for="admin">Admin &nbsp
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rol" id="usuario" value=0>
                                    <label class="form-check-label" for="usuario">
                                        Usuario
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" value="{{old('password')}}"
                                            class="form-control input-sm" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar contraseña</label>
                                        <input type="password" name="confirm-password" id="confirm-password"
                                            class="form-control input-sm" placeholder="Confirmar Contraseña" value="{{old('confirm-password')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="btn btn-success btn-block">
                                    <a href="{{ route('admin.usuario')}}" class="btn btn-info btn-block">Atrás</a>
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