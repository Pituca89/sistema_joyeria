@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Fecha: {{date('d-m-Y')}}</h3>
        <br>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr align="center">
                    <th>EFECTIVO</th>
                    <th>TARJETA</th>
                    <th>DOLARES</th>
                    <th>ORO</th>
                    <th>PILA/REP</th>
                    <th>GASTOS MANTENIMIENTO</th>
                    <th>PROVEEDORES</th>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td>{{$pesos}}</td>
                    <td>0</td>
                    <td>{{$dolares}}</td>
                    <td>{{$oro}}</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>                           
            </tbody>
        </table>
    </div>
@endsection
