
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container"style="overflow-x:auto;">
    <table  id="tablapedidos" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>IdCliente</th>
                <th>Direccion</th>
                <th>Fecha</th>
                <th>Articulos</th>
                <th>MétodoEnvio</th>
                <th>MétodoPago</th>
                <th>Total</th>
                <th width="100px">Action</th>
            </tr>
        
            
        </thead>
        <tbody>
        @foreach ($pedidos as $data)

            <tr>
            <td>{{$data->idPedido}}</td>
            <td>{{ $data->idCliente }}</td>
            <td>{{$data->direccion}}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->articulos }}</td>
            <td>{{ $data->MetodoEnvio }}</td>
            <td>{{ $data->metodoPago }}</td>
            <td>{{ $data->total }}€</td>
            <td><a href="{{ route('admin.pedido.delete', $data->idPedido) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('js')
    <script>
        $('#tablapedidos').DataTable();
    </script>
@endsection
@endsection

    