<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Administracion</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{route('admin.producto')}}" class="btn btn-info" >Administrar Productos</a>
            </div>
            <div class="btn-group">
              <a href="{{route('admin.categoria')}}" class="btn btn-info" >Administrar Categorias</a>
            </div>
            <div class="btn-group">
              <a href="{{route('admin.usuario')}}" class="btn btn-info" >Administrar Usuarios</a>
            </div>
          </div>
         


      
       
      </div>
     
    </div>
  </div>
</section>
 
@endsection