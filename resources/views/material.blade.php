@extends('layouts.app')
@section('content')  
    <div class="container">
        @include('modal_nuevo_material')
        @include('modal_editar_material')
        @if (!empty($modal) && $modal == 1)
        <script>
            setTimeout(() => {
                $('#editar_material').modal('show');
            }, 100);
        </script>
        @endif
        @include('flash_alert')
        <button onclick="document.location.href='{{ url('menu_ingresos') }}'" type="button" class="btn btn-dark">VOLVER</button>
        <div>&nbsp;</div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr align="center">
                    <th>NOMBER</th>
                    <th>MULTIPLICADOR</th>
                    <th>HECHURA</th>
                    <th colspan="2">ACCIÓN</th>
                </tr>              
            </thead>
            <tbody>
                
                @foreach ($materiales as $material)
                    <tr align="center">
                        <td>{{$material->descripcion}}</td>
                        <td>{{$material->precio}}</td>
                        <td>
                        @if ($material->hechura == 1)
                            CON HECHURA
                        @else
                            SIN HECHURA
                        @endif
                        </td>
                        <td>
                            <form action="{{ url('material/'.$material->id.'') }}" method="GET">
                                <button id="{{'editar_material#'.$material->id.''}}" type="submit" class="btn btn-success btn_editar">EDITAR</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('material/'.$material->id.'') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevo_material">NUEVO MATERIAL</button>
    </div>
@endsection