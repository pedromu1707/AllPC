
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
					<h3 class="panel-title">Editar Categoria</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container"> 
						<form method="GET" action="{{ route('admin.categoria.edit.update', $categoria->idCategoria) }}"  role="form">
							
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									
								</div>
							
							</div>
                            
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
                             
									<div class="form-group">
									<label for="titulo">Titulo</label>
										<input type="text" name="titulo" id="titulo" class="form-control input-sm" placeholder="{{$categoria->titulo}}" value="{{$categoria->titulo}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="descripcion">Descripcion</label>
										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" placeholder="{{$categoria->descripcion}}" value="{{$categoria->descripcion}}">
									</div>
								</div>
							</div>
                            
							
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('admin.categoria')" class="btn btn-info btn-block" >Atrás</a>
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