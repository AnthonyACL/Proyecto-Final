@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Empleado</h2>
    <form action="{{ route('employes.update', $employe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $employe->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="salario">Salario:</label>
            <input type="number" class="form-control" id="salario" name="salario" value="{{ $employe->salario }}" required>
        </div>

        <div class="form-group">
            <label for="posicion">Posición:</label>
            <input type="text" class="form-control" id="posicion" name="posicion" value="{{ $employe->posicion }}" required>
        </div>

        <div class="form-group">
    <label for="estado">Estado:</label>
    <select class="form-control" id="estado" name="estado" required>
        <option value="Activo" {{ $employe->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ $employe->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
</div>

        <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
        <a href="{{ route('tables') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
