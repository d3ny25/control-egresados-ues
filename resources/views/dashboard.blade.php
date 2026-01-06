@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


@extends('layouts.app')

@section('Dashboard')

@section('content')
    <h2>Panel del Administrador</h2>
    <p>Bienvenido al sistema de control de egresados.</p>

    <form method="POST" action="/logout">
        @csrf
        <button class="btn btn-danger">Cerrar Sesión</button>
    </form>
@endsection

