@extends('layouts.auth')

@section('content')
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{ trans('auth.registro') }}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('auth.registro') }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div><div id="content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">{{ trans('auth.nueva') }}</h2>
                <a class="btn btn-link" href="/login">
                {{ trans('auth.yatienes') }}
                                    </a>
                <p>{{ trans('auth.registrate') }}</p>
                <p class="text-muted">{{ trans('auth.pregunta') }} <a href="{{ route('contacto')}}">{{ trans('auth.contacta') }}</a>, {{ trans('auth.equipo') }}.</p>
                <hr>
                <form method="POST" action="{{ route('register') }}">
                @csrf
                  <div class="form-group">
                    <label for="name">{{ trans('auth.nombre') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">{{ trans('auth.contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">{{ trans('auth.recontraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                               
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i>{{ trans('auth.registrarse') }}</button>
                  </div>
                </form>
              </div>
            </div>
            @endsection