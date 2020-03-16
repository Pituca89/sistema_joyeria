@extends('layouts.app')
@section('content')
    <div class="container">
        @include('modal_nuevo_proveedor')
        @include('flash_alert')
        <button onclick="document.location.href='{{ url('menu_ingresos') }}'" type="button" class="btn btn-dark">VOLVER</button>
        <div>&nbsp;</div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr align="center">
                    <th>NOMBER</th>
                    <th>CUIT</th>
                    <th>ACCIÓN</th>
                </tr>              
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr align="center">
                        <td>{{$proveedor->nombre}}</td>
                        <td>{{$proveedor->cuit}}</td>
                        <td>
                        <form action="{{ url('proveedor/'.$proveedor->id.'') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">ELIMINAR</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevo_proveedor">NUEVO PROVEEDOR</button>
    </div>
@endsection