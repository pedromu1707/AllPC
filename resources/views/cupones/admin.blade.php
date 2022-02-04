
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" src="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container" style="overflow-x:auto;">
    <table  id="tablacupones" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>IdCupon</th>
                <th>Cupon</th>
                <th>Descuento</th>
                <th>Importe Mínimo</th>
               
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($cupones as $data)
            <tr>
            <td>{{$data->idCupon}}</td>
            <td>{{ $data->cupon }}</td>
            <td>{{ $data->descuento }}</td>
            <td>{{ $data->minimo }}</td>
           
            
            <td><a href="{{ route('admin.cupon.delete', $data->idCupon) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp &nbsp<a href="{{ route('admin.cupon.edit', $data->idCupon) }}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tablacupones').DataTable();
    </script>
@endsection
@endsection

    