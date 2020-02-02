@extends('layouts.app')
@section('content')

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
            <form action="" method="POST">
                @csrf
                <button class="btn btn-success" type="button">F2 - FINALIZAR VENTA</button>
            </form>
        </div> 
        <div class="form-group col-md-3">
            <form action="{{ url('venta/'.Auth::id().'') }}" method="POST" onsubmit="return confirm('Está a punto de borrar todos los productos listados')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">F3 - ELIMINAR VENTA</button>
            </form>
        </div>  
    </div>       
    <br>        
    <table class="table">
        <tr>
            @if (count($keys)>0)
                @foreach ($keys as $key)
                <th>{{strtoupper($key)}}</th>           
                @endforeach
                <th colspan="2" style="text-align: center">ACCIONES</th>
            @endif           
        </tr>       
    @if (count($articulos)>0)       
        @foreach ($articulos as $articulo)  
        <tr>     
            <td>{{$articulo->nombre}}</td>
            <td>{{$articulo->precio}}</td>
            <td>{{$articulo->cantidad}}</td>
            <td>{{$articulo->subtotal}}</td>
            <td style="text-align: center"><a href=""><img src="img/edit-icon.png" width="30" height="30" alt=""></a></td>
            <td style="text-align: center"><a href=""><img src="img/delete.png" width="30" height="30" alt=""></a></td>    
        </tr>             
        @endforeach                    
    @endif
    </table>
</div>
@endsection