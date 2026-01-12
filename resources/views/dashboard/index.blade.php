@extends('layouts.app')

@section('Dashboard')

@section('content')




<h2 class="mb-4 fw-bold text-success border-bottom pb-2">
    {{ auth()->user()->esAdmin() ? 'Panel del Administrador' : 'Consulta de Egresados' }}
</h2>


@if(auth()->user()->esAdmin())
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h5>Total Egresados</h5>
                <h3>{{ $totalEgresados }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-success">
            <div class="card-body">
                <h5>Titulados</h5>
                <h3>{{ $totalTitulados }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-warning">
            <div class="card-body">
                <h5>En Seguimiento</h5>
                <h3>{{ $totalSeguimiento }}</h3>
            </div>
        </div>
    </div>
</div>
@endif


<div class="card mt-4">
    <div class="card-header">Total de Egresados por Carrera</div>
    <ul class="list-group list-group-flush">
        @foreach($totalesPorCarrera as $carrera)
            <li class="list-group-item d-flex justify-content-between">
                {{ $carrera->nombre }}
                <span class="badge bg-primary">
                    {{ $carrera->egresados_count }}
                </span>
            </li>
        @endforeach
    </ul>
</div>



<hr>




<div class="d-flex gap-2">

    @if(auth()->user()->esAdmin())
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalEgresado">
        Registrar Egresado
    </button>
    @endif


</div>

<div class="card mt-4">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Listado de Egresados</h5>
    </div>

    <div class="card mb-4">
    <div class="card-header bg-secondary text-white">
        <strong>Filtros de búsqueda</strong>
    </div>

    <div class="card-body">
        <form method="GET" action="{{ route('dashboard') }}" class="row g-3">

            <!-- Carrera -->
            <div class="col-md-3">
                <label class="form-label">Carrera</label>
                <select name="carrera_id" class="form-select">
                    <option value="">Todas</option>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}"
                            {{ request('carrera_id') == $carrera->id ? 'selected' : '' }}>
                            {{ $carrera->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Generación -->
            <div class="col-md-3">
                <label class="form-label">Generación</label>
                <select name="generacion_id" class="form-select">
                    <option value="">Todas</option>
                    @foreach($generaciones as $gen)
                        <option value="{{ $gen->id }}"
                            {{ request('generacion_id') == $gen->id ? 'selected' : '' }}>
                            {{ $gen->periodo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Estatus -->
            <div class="col-md-3">
                <label class="form-label">Estatus</label>
                <select name="estatus_id" class="form-select">
                    <option value="">Todos</option>
                    @foreach($estatuses as $estatus)

                        <option value="{{ $estatus->id }}"
                            {{ request('estatus_id') == $estatus->id ? 'selected' : '' }}>
                            {{ $estatus->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botones -->
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button class="btn btn-success w-100">
                    Filtrar
                </button>

                <a href="{{ route('dashboard') }}"  class="btn btn-outline-secondary w-100">
                    Limpiar
                </a>
            </div>

        </form>
    </div>
</div>


    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Generación</th>
                    <th>Estatus</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    @if(auth()->user()->esAdmin())
                    <th class="text-center">Acciones</th>
                    @endif

                </tr>
            </thead>

            <tbody>
                @forelse($egresados as $egresado)
                    <tr>
                        <td>{{ $egresado->matricula }}</td>
                        <td>{{ $egresado->nombre_completo }}</td>
                        <td>{{ $egresado->carrera->nombre ?? 'N/A' }}</td>
                        <td>{{ $egresado->generacion->periodo ?? 'N/A' }}</td>
                        <td>
                            @php
                                $colorEstatus = match(optional($egresado->estatus)->nombre) {
                                    'Titulado' => 'success',
                                    'En seguimiento' => 'warning',
                                    default => 'secondary'
                                };
                            @endphp


                            <span class="badge bg-{{ $colorEstatus }}">
                                {{ $egresado->estatus->nombre ?? 'Sin estatus' }}
                            </span>

                        </td>
                        <td>{{ $egresado->telefono }}</td>
                        <td>{{ $egresado->correo }}</td>
                        <td class="text-center">

                        @if(auth()->user()->esAdmin())
                            <button class="btn btn-warning btn-sm btnEditar"
                                data-id="{{ $egresado->id }}"
                                data-matricula="{{ e($egresado->matricula) }}"
                                data-nombre="{{ e($egresado->nombre_completo) }}"
                                data-carrera="{{ $egresado->carrera_id }}"
                                data-generacion="{{ $egresado->generacion_id }}"
                                data-estatus="{{ $egresado->estatus_id }}"
                                data-genero="{{ $egresado->genero }}"
                                data-telefono="{{ e($egresado->telefono) }}"
                                data-correo="{{ e($egresado->correo) }}"
                                data-domicilio="{{ e($egresado->domicilio) }}"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditarEgresado"
                            >

                                ✏️ Editar
                            </button>


                            <button 
                                class="btn btn-sm btn-danger btn-eliminar"
                                data-id="{{ $egresado->id }}"
                                data-nombre="{{ $egresado->nombre_completo }}"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEliminarEgresado"
                            >
                                🗑 Eliminar
                            </button>
                           @endif
 
                        </td>
                    </tr>
                    

                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            No hay egresados registrados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $egresados->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@if(auth()->user()->esAdmin())

<div class="modal fade" id="modalEgresado" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                        
        <form action="{{ route('egresados.store') }}" method="POST" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Registrar Egresado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body row g-3">

                <div class="col-md-4">
                    <label class="form-label">Matrícula</label>
                    <input type="text" name="matricula" class="form-control" maxlength="8" required>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="nombre_completo" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Carrera</label>
                    <select name="carrera_id" class="form-select" required>
                        <option value="">Seleccione</option>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Generación</label>
                    <select name="generacion_id" class="form-select" required>
                        <option value="">Seleccione</option>
                        @foreach($generaciones as $gen)
                            <option value="{{ $gen->id }}">{{ $gen->periodo }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-6">
                    <label class="form-label">Estatus</label>
                    <select name="estatus_id" class="form-select" required>
                        @foreach($estatuses as $estatus)

                            <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Género</label>
                    <select name="genero" class="form-select" required>
                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Otro</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Domicilio</label>
                    <textarea name="domicilio" class="form-control"></textarea>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </form>
    </div>
</div>

<div class="modal fade" id="modalEditarEgresado" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="formEditarEgresado" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Editar Egresado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body row g-3">


                <div class="col-md-4">
                    <label class="form-label">Matrícula</label>
                    <input type="text" name="matricula" id="edit_matricula" class="form-control" required>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="nombre_completo" id="edit_nombre" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Carrera</label>
                    <select name="carrera_id" id="edit_carrera" class="form-select">
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Generación</label>
                    <select name="generacion_id" id="edit_generacion" class="form-select">
                        @foreach($generaciones as $gen)
                            <option value="{{ $gen->id }}">{{ $gen->periodo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Estatus</label>
                    <select name="estatus_id" id="edit_estatus" class="form-select">
                        @foreach($estatuses as $estatus)
                            <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Género</label>
                    <select name="genero" id="edit_genero" class="form-select">
                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Otro</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="edit_telefono" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" id="edit_correo" class="form-control">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Domicilio</label>
                    <textarea name="domicilio" id="edit_domicilio" class="form-control"></textarea>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalEliminarEgresado" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" id="formEliminarEgresado" class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Eliminar Egresado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>
                    ¿Estás seguro de eliminar al egresado:
                    <strong id="nombreEliminar"></strong>?
                </p>
                <p class="text-danger">
                    ⚠️ Esta acción no se puede deshacer.
                </p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger">Sí, eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

@endif

@endsection

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let modal = new bootstrap.Modal(document.getElementById('modalEgresado'));
        modal.show();
    });
</script>
@endif


<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btnEditar').forEach(btn => {
        btn.addEventListener('click', function () {

            document.getElementById('edit_matricula').value = this.dataset.matricula;
            document.getElementById('edit_nombre').value = this.dataset.nombre;
            document.getElementById('edit_carrera').value = this.dataset.carrera;
            document.getElementById('edit_generacion').value = this.dataset.generacion;
            document.getElementById('edit_estatus').value = this.dataset.estatus;
            document.getElementById('edit_genero').value = this.dataset.genero;
            document.getElementById('edit_telefono').value = this.dataset.telefono;
            document.getElementById('edit_correo').value = this.dataset.correo;
            document.getElementById('edit_domicilio').value = this.dataset.domicilio;

            // acción del formulario
            document.getElementById('formEditarEgresado')
                .action = `/egresados/${this.dataset.id}`;
        });
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-eliminar').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const nombre = this.dataset.nombre;

            document.getElementById('nombreEliminar').textContent = nombre;

            document.getElementById('formEliminarEgresado').action =
                `/egresados/${id}`;
        });
    });
});
</script>


