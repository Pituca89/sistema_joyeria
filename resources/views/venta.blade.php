@extends('layouts.app')
@section('content')
@include('modal_total_venta')
@include('modal_venta')
    @if (!empty($modal) && $modal == 1)
        <script>
            setTimeout(() => {
                $('#modal_venta').modal('show');
            }, 100);
        </script>
    @endif
<div class="container">
    @include('flash_alert')
    <div class="form-row">
        <div class="form-group col-md-3">
            <form action="" method="POST">
                @csrf
                <input type="search" value="" name="dato" id="codbar" placeholder="NOMBRE/CÓDIGO DE PRODUCTO" style="width:100% !important">
            </form>
        </div>
        <div class="form-group col-md-3">
            <form action="">
                <button class="btn btn-primary" type="button">BUSCAR PRODUCTO</button>
            </form>
        </div>
        <div class="form-group col-md-3">
            <button type="submit" class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">F2 - FINALIZAR VENTA</button>
        </div> 
        <div class="form-group col-md-3">
            <form action="{{ url('venta/0') }}" method="POST" onsubmit="return confirm('Está a punto de borrar todos los productos listados')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">F3 - ELIMINAR VENTA</button>
            </form>
        </div>  
    </div>       
    <br>        
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                @if (count($keys)>0)
                    @foreach ($keys as $key)
                    <th>{{strtoupper($key)}}</th>           
                    @endforeach
                    <th colspan="2" style="text-align: center">ACCIONES</th>
                @endif           
            </tr> 
        </thead>
              
    @if (count($temporales)>0)       
        @foreach ($temporales as $temporal)  
        <tr>     
            <td>{{$temporal->nombre}}</td>
            <td>{{$temporal->precio}}</td>
            <td>{{$temporal->cantidad}}</td>
            <td>{{$temporal->subtotal_pesos}}</td>
            <td style="text-align: right">
                <form action="{{ url('venta/'.$temporal->id.'') }}" method="GET">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </form>
            </td>
            <td style="text-align: left">
                <form action="{{ url('venta/'.$temporal->id.'') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </form>               
            </td>    
        </tr>             
        @endforeach                    
    @endif
    </table>
</div>
@endsection