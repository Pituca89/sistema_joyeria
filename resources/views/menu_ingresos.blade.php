@extends('layouts.app')
@section('content')

<div class="container">
    <button onclick="document.location.href='{{ url('home') }}'" type="button" class="btn btn-dark">VOLVER</button>
    <div>&nbsp;</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">ARTÍCULOS</div>
                <div class="card-body" align="center">
                    <a class="btn btn-primary" href="{{ url('ingresos') }}">IR</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">PROVEEDORES</div>
                <div class="card-body" align="center">
                    <a class="btn btn-primary" href="{{ url('proveedor') }}">IR</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">MATERIALES</div>
                <div class="card-body" align="center">
                    <a class="btn btn-primary" href="{{ url('material') }}">IR</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection