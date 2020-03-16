@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">INGRESO</div>
                @if ($ingreso)
                    <div class="card-body" align="center">
                        <a href="{{ url('menu_ingresos') }}"><img src="img/stock.png" alt=""></a>
                    </div>
                @else
                    <div class="card-body" align="center">
                        <a href="#"><img src="img/no_disponible.png" alt=""></a>
                    </div>
                @endif               
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">VENTA</div>
                @if ($venta)
                    <div class="card-body" align="center">
                        <a href="{{ url('venta') }}"><img src="img/dinero.jpg" alt=""></a>
                    </div>
                @else
                    <div class="card-body" align="center">
                        <a href="#"><img src="img/no_disponible.png" alt=""></a>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">CAJA</div>
                @if ($caja)
                    <div class="card-body" align="center">
                        <a href="{{ url('caja') }}"><img src="img/caja.jpg" alt=""></a>
                    </div>
                @else
                    <div class="card-body" align="center">
                        <a href="#"><img src="img/no_disponible.png" alt=""></a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">ESTADISTICAS</div>
                @if ($estadistica)
                    <div class="card-body" align="center">
                        <a href="{{url('estadisticas')}}"><img src="img/esta.jpg" alt=""></a>
                    </div>
                @else
                    <div class="card-body" align="center">
                        <a href="#"><img src="img/no_disponible.png" alt=""></a>
                    </div>
                @endif               
            </div>
        </div>
    </div>
</div>
@endsection
