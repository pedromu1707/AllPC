@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">{{ trans('contacto.contacto') }}</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contacto</li>
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
                        <h2>{{ trans('contacto.nosotros') }}</h2>
                    </div>
                    <p class="lead">{{ trans('contacto.duda') }}</p>
                    <p class="text-sm">{{ trans('contacto.centro') }}</p>
                </div>
            </div>
        </section>
        <section>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="box-simple">
                        <div class="icon-outlined"><i class="fa fa-map-marker"></i></div>
                        <h3 class="h4">{{ trans('contacto.direccion') }}</h3>
                        <p>{{ trans('contacto.calle') }}<br> 14006 Córdoba <br><strong>{{ trans('contacto.pais') }}</strong></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-simple">
                        <div class="icon-outlined"><i class="fa fa-phone"></i></div>
                        <h3 class="h4">{{ trans('contacto.telefono') }}</h3>
                        <p>{{ trans('contacto.telefono2') }}</p>
                        <p><strong>+34 555 444 333</strong></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-simple">
                        <div class="icon-outlined"><i class="fa fa-envelope"></i></div>
                        <h3 class="h4">{{ trans('contacto.correo') }}</h3>
                        <p>{{ trans('contacto.correo2') }}</p>
                        <ul class="list-unstyled text-sm">
                            <li><strong><a href="mailto:">info@allpc.com</a></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="bar pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>{{ trans('contacto.formulario') }}</h2>
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
                    <form action="{{ route('contactform')}}" method="POST">
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
    <div id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3148.6625827123903!2d-4.799921084720638!3d37.89157287973841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6cdf5b069498d9%3A0x810d06e06b60e1b4!2sIES%20Trassierra!5e0!3m2!1ses!2ses!4v1621441586504!5m2!1ses!2ses"
            width="100%" height="295" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
@endsection