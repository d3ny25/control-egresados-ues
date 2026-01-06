@extends('layouts.app')

@section('Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow border-0">

            <div class="card-header text-center bg-umb text-white">
                <strong>Acceso al Sistema</strong>
            </div>

            <div class="card-body">

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger py-2">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <button class="btn btn-umb w-100 fw-semibold">
                        Iniciar Sesión
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
