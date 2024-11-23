@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-2">Gestión de Citas</h1>
            <p class="lead text-muted">Aquí puedes gestionar las citas registrados en la tienda.</p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.citas.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i>Agregar Nueva Cita
            </a>
        </div>
    </div>

    @if($citas->isEmpty())
        <p class="text-center">No hay citas agendadas.</p>
    @else
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                <th>Fecha y Hora</th>
                                <th>Notas</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $cita)
                                <tr>
                                    <td>{{ $cita->name }}</td>
                                    <td>{{ $cita->email }}</td>
                                    <td>{{ $cita->appointment_time }}</td>
                                    <td>{{ $cita->notes }}</td>
                                    <td>
                                        <a href="{{ route('admin.citas.edit', $cita->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <form action="{{ route('admin.citas.destroy', $cita->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta cita?')">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection