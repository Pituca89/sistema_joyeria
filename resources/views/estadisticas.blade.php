@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-2">
            <a class="dropdown-item" href="{{ url('home') }}">VOLVER</a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">DIARIO</div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">MENSUAL</div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection