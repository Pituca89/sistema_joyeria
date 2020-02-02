@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar nueva Licencia</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('flash_alert')
                    <form id="id-form" method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Host') }}</label>

                            <div class="col-md-6">
                                <input id="mac" type="text" class="form-control" name="mac" value="{{ $mac }}" required autocomplete="mac" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Licencia') }}</label>

                            <div class="col-md-6">
                                <input id="licencia" type="text" class="form-control" name="licencia" value="{{ old('email') }}" required autocomplete="licencia" autofocus onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
