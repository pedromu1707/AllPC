
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container" style="overflow-x:auto;">
    <table  id="tablausuarios" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($usuarios as $data)
            <tr>
            <td>{{$data->id}}</td>
            <td>{{ $data->name }}</td>
            <td>{{$data->email}}</td>
            <td>@if($data->is_admin==0)
            Usuario
            @else
            Admin
            @endif
            </td>
            
            
            <td><a href="{{ route('admin.usuario.delete', $data->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp &nbsp<a href="{{ route('admin.usuario.edit', $data->id) }}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tablausuarios').DataTable();
    </script>
@endsection
@endsection

    