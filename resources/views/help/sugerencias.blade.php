@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">{{ trans('contacto.sugerencias') }}</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{ trans('contacto.sugerencias') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div id="contact" class="container">
        <section class="bar">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ trans('contacto.sugerencias2') }}</h2>
                    </div>
                    <p class="lead">{{ trans('contacto.sugerencias3') }}</p>
                    
                </div>
            </div>
        </section>
        <section>
            
        </section>
        <section class="bar pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>{{ trans('contacto.sugerencias4') }}</h2>
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
                    </div>
                </div>
                <div class="col-md-8 mx-auto">
                    <form action="{{ route('sugerenciaform')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">{{ trans('contacto.nombre') }}</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="apellidos">{{ trans('contacto.apellidos') }}</label>
                                    <input id="apellidos" name="apellidos"type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="asunto">{{ trans('contacto.asunto') }}</label>
                                    <input id="asunto" name="asunto" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mensaje">{{ trans('contacto.mensaje') }}</label>
                                    <textarea id="mensaje" name="mensaje" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-template-outlined"><i
                                        class="fa fa-envelope-o"></i>{{ trans('contacto.enviar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    
</div>
@endsection