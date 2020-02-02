@extends('layouts.app')
@section('content')
    @include('modal_articulo')
    @if (!empty($modal) && $modal == 1)
        <script>
            setTimeout(() => {
                $('#modal_articulo').modal('show');
            }, 100);
        </script>
    @endif
    <div class="container">
        @include('flash_alert')
        <form action="" method="GET">
            <div class="form-row">                
                <div class="form-group col-md-3">
                    <input type="search" name="codbar" id="codbar" placeholder="NOMBRE/CÓDIGO DE PRODUCTO" style="width:100% !important">
                </div> 
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary">BUSCAR</button>
                </div>  
                <div class="form-group col-md-3">
                    <button type="button" id="btn_modal" class="btn btn-success" onclick="location.href='{{ url('ingresos/0') }}'">NUEVO PRODUCTO</button>
                </div>            
            </div> 
        </form>
        <br>     
        <table class="table">
            <tr>
                @if (count($keys)>0)
                    @foreach ($keys as $key)
                    <th style="text-align: center">{{strtoupper($key)}}</th>           
                    @endforeach
                    <th colspan="2" style="text-align: center">ACCIONES</th>
                @endif           
            </tr>       
        @if (count($articulos)>0)       
            @foreach ($articulos as $articulo)  
            <tr>     
                <td style="text-align: center">{{$articulo->nombre}}</td>
                <td style="text-align: center">{{$articulo->valor_venta}}</td>
                <td style="@if ($articulo->valor_actual <= 0) background:red @endif ;text-align: center">{{$articulo->valor_actual}}</td>
                <td style="text-align: center"><a href="{{ url('ingresos/'.$articulo->id.'') }}"><img src="img/edit-icon.png" width="30" height="30" alt=""></a></td>
                <td style="text-align: center"><a href=""><img src="img/delete.png" width="30" height="30" alt=""></a></td>    
            </tr>             
            @endforeach                    
        @endif
        </table>
    </div>
@endsection
