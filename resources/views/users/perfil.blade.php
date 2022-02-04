
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.app')
        @section('content')
        @if (Session::has('error'))
<div class="bg-danger">
    <span> <b>{{ session('error') }}</b> </span>
</div>
@endif
        
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{ trans('perfil.cuenta') }}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="/">HOME</a></li>
                <li class="breadcrumb-item active">{{ trans('perfil.cuenta') }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
        
          <div class="row bar">
            <div id="customer-account" class="col-lg-9 clearfix">
              <p class="lead">{{ trans('perfil.cambiar') }}</p>
              
              <div class="box mt-5">
                <div class="heading">
                  <h3 class="text-uppercase">{{ trans('perfil.cambiar') }}</h3>
                </div>
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
                <form  action="{{route('password.edit')}}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">{{ trans('perfil.antigua') }}</label>
                        <input id="password_old" name="password_old" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_1">{{ trans('perfil.nueva') }}</label>
                        <input id="password_1" name="password_1" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_2">{{ trans('perfil.nueva2') }}</label>
                        <input id="password_2" name="password_2" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i>{{ trans('perfil.enviar') }}</button>
                  </div>
                </form>
              </div>
             
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">{{ trans('perfil.seccion') }}</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="{{route('pedidos')}}" class="nav-link"><i class="fa fa-list"></i>{{ trans('perfil.pedidos') }}</a></li>
                    <li class="nav-item"><a href="{{route('perfil')}}" class="nav-link active"><i class="fa fa-user"></i>{{ trans('perfil.cuenta2') }}</a></li>
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