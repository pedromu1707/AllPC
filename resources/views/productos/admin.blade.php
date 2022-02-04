
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container" style="overflow-x:auto;">
    <table  id="tablaproductos" class="table table-responsive">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>idMarca</th>
                <th>Descripcion</th>
                <th>idCategoria</th>
                <th>Precio</th>
                <th>UnidadesDisponibles</th>
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($productos as $data)

            <tr>
            <td>{{$data->idProducto}}</td>
            <td>{{ $data->titulo }}</td>
            <td>{{$data->idMarca}}</td>
            <td>{{ Str::limit($data->descripcion, 50) }}</td>
            <td>{{ $data->idCategoria }}</td>
            <td>{{ $data->precioUnidad }}€</td>
            <td>{{ $data->unidadesDispo }}</td>
            <td><a href="{{ route('admin.producto.delete', $data->idProducto) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>  &nbsp &nbsp<a href="{{ route('admin.producto.edit', $data->idProducto) }}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tablaproductos').DataTable();
    </script>
@endsection
@endsection

    