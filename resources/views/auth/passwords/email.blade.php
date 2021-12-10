@extends('layouts.template')

@section('head')
    Restablecer contraseña
@endsection

@section('content')

<x-header></x-header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 200px;">
            <div class="card">
                <div class="card-header">Restablecer contraseña</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 d-flex justify-content-center">
                            <div class="col-md-10 mt-4">
                                <button type="submit" class="primary-btn ml-sm-3 ml-0 btn-block">Enviar corrreo de recuperación</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
