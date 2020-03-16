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
        <button onclick="document.location.href='{{ url('menu_ingresos') }}'" type="button" class="btn btn-dark">VOLVER</button>
        <div>&nbsp;</div>
        @include('flash_alert')
        <form action="" method="GET">
            <div class="form-row">                
                <div class="form-group col-md-3">
                    <input type="search" name="codbar" id="codbar" placeholder="NOMBRE/CÓDIGO DEL ARTÍCULO" style="width:100% !important">
                </div> 
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary">BUSCAR</button>
                </div>  
                <div class="form-group col-md-3">
                    <button type="button" id="btn_modal" class="btn btn-success" onclick="location.href='{{ url('ingresos/0') }}'">NUEVO ARTÍCULO</button>
                </div>            
            </div> 
        </form>
        <br>     
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    @if (count($keys)>0)
                        @foreach ($keys as $key)
                        <th style="text-align: center">{{strtoupper($key)}}</th>           
                        @endforeach
                        <th colspan="2" style="text-align: center">ACCIONES</th>
                    @endif           
                </tr>  
            </thead>  
            <tbody>
            @if (count($articulos)>0)       
                @foreach ($articulos as $articulo)  
                <tr>     
                    <td style="text-align: center">{{$articulo->nombre}}</td>
                    <td style="text-align: center">{{$articulo->valor_dolar}}</td>
                    <td style="@if ($articulo->valor_actual <= 0) background:red @endif ;text-align: center">{{$articulo->valor_actual}}</td>
                    <td style="text-align: right">
                    <form action="{{ url('ingresos/'.$articulo->id.'') }}" method="GET">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>                        
                    </form>  
                    </td>  
                    <td style="text-align: left">           
                    <form action="{{ url('ingresos/'.$articulo->id.'') }}" method="POST" onsubmit="return confirm('Desea eliminar el producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form> 
                    </td>    
                </tr>             
                @endforeach                    
            @endif
            </tbody>   
        </table>
    </div>
@endsection
