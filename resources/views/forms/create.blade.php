@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Empleado</h2>
    <form action="{{ route('employes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="salario">Salario:</label>
            <input type="number" class="form-control" id="salario" name="salario" value="{{ old('salario') }}" required>
        </div>

        <div class="form-group">
            <label for="posicion">Posición:</label>
            <input type="text" class="form-control" id="posicion" name="posicion" value="{{ old('posicion') }}" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="Online" {{ old('estado') === 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Offline" {{ old('estado') === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Empleado</button>
        <a href="{{ route('tables') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
