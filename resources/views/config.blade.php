@extends('layouts.app')
@section('content')
<div class="container">
    @include('flash_alert')
    <form action="{{ url('config/0') }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th>GRAMO ORO NACIONAL</th>
                <th>DOLAR</th>
                <th>GRAMO PLATA</th>
                <th>GRAMO ORO IMPORTADO</th>
                <th>HECHURA</th>
            </thead>
            <tbody>
                <tr>
                    <td><input class="form-control" type="text" name="gramo_oro_nacional" id="" value="{{ $item->gramo_oro_nacional }}"></td>
                    <td><input class="form-control" type="text" name="dolar" id="" value="{{ $item->dolar }}"></td>
                    <td><input class="form-control" type="text" name="gramo_plata" id="" value="{{ $item->gramo_plata }}"></td>
                    <td><input class="form-control" type="text" name="gramo_oro_importado" id="" value="{{ $item->gramo_oro_importado }}"></td>
                    <td><input class="form-control" type="text" name="hechura" id="" value="{{ $item->hechura }}"></td>
                </tr>
            </tbody>
        </table>
        <div class="form-row">
            <div class="for-group col-md-12" align="center">
                <button type="submit" class="btn btn-primary">GUARDAR</button>
            </div>
        </div>
    </form>  
</div>
@endsection