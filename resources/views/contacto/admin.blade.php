
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container" style="overflow-x:auto;">
    <table  id="tablacontactos" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($contactos as $data)
            <tr>
            <td>{{$data->idContacto}}</td>
            <td>{{ $data->email }}</td>
            
            
            <td><a href="{{ route('admin.contacto.delete', $data->idContacto) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tablacontactos').DataTable();
    </script>
@endsection
@endsection

    