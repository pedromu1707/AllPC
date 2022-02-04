
      
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        @extends('layouts.backend')
        @section('content')
<div class="container">
<div id="tvesModal" class="modalContainer">
 <div class="modal-content">
 <span class="close">×</span> <h2>Modal</h2>
 <p>Se ha desplegado el modal y bloqueado el scroll del body!</p> </div>
 </div>  
    <table  id="tabladestacados" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
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
            <td>{{ $data->descripcion }}</td>
            <td>{{ $data->idCategoria }}</td>
           
            
            <td><a href=" {{ route('admin.oferta.create.store', $data->idProducto) }}"><i class="fas fa-plus-square"></i></a></td>
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

    