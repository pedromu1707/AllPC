
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container" style="overflow-x:auto;">
    <table  id="tablacategorias" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($categorias as $data)
            <tr>
            <td>{{$data->idCategoria}}</td>
            <td>{{ $data->titulo }}</td>
            <td>{{$data->descripcion}}</td>
            
            
            <td><a href="{{ route('admin.categoria.delete', $data->idCategoria) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp &nbsp<a href="{{ route('admin.categoria.edit', $data->idCategoria) }}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tablacategorias').DataTable();
    </script>
@endsection
@endsection

    