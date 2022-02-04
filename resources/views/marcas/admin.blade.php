
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container" style="overflow-x:auto;">
    <table  id="tablamarcas" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Marca</th>
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($marcas as $data)
            <tr>
            <td>{{$data->idMarca}}</td>
            <td>{{ $data->marca }}</td>
            
            
            <td><a href="{{ route('admin.marca.delete', $data->idMarca) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp &nbsp<a href="{{ route('admin.marca.edit', $data->idMarca) }}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tablamarcas').DataTable();
    </script>
@endsection
@endsection

    