
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="">
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
				<div class="panel-heading">Nuevo Cupon</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('admin.cupon.create.store') }}"  role="form">
                        @csrf
                            
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="cupon" id="cupon" class="form-control input-sm" placeholder="Código Cupon" value="{{old('cupon')}}">
									</div>
								</div>
</div>
                                <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="descuento" id="descuento" class="form-control input-sm" placeholder="Descuento" value="{{old('descuento')}}">
									</div>
								</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" step=any name="minimo" id="minimo" class="form-control input-sm" placeholder="Importe Mínimo" value="{{old('minimo')}}">
									</div>
								</div>
                            </div>

							
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('admin.cupon')}}" class="btn btn-info btn-block" >Atrás</a>
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