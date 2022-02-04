
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container" style="overflow-x:auto;">
    <table  id="tabladestacados" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Descripcion</th>
                <th>idCategoria</th>
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($productos as $data)
            <tr>
            <td>{{$data->idProducto}}</td>
            <td>{{ $data->titulo }}</td>
            <td>{{$data->marca}}</td>
            <td>{{ $data->descripcion }}</td>
            <td>{{ $data->idCategoria }}</td>
            
            
            <td><a href="{{ route('admin.destacado.delete', $data->idProducto) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tabladestacados').DataTable();
    </script>
@endsection
@endsection

    