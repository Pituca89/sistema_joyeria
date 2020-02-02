@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">INGRESO</div>
                <div class="card-body" align="center">
                    <a href="{{ url('ingresos') }}"><img src="img/stock.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">VENTA</div>
                <div class="card-body" align="center">
                    <a href="{{ url('venta') }}"><img src="img/dinero.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">CAJA</div>
                <div class="card-body" align="center">
                    <a href="{{ url('caja') }}"><img src="img/caja.jpg" alt=""></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" align="center">ESTADISTICAS</div>
                <div class="card-body" align="center">
                    <a href="{{url('estadisticas')}}"><img src="img/esta.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
