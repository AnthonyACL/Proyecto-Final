<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployController extends Controller
{
    // Mostrar todos los empleados
    public function index()
    {
        $employes = Employe::all();
        return view('pages.tables', compact('employes')); //llamada
    }

    // Mostrar formulario para crear un empleado
    public function create()
    {
        return view('employes.create');
    }

    // Almacenar un nuevo empleado
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'salario' => 'required|integer',
            'posicion' => 'required',
            'estado' => 'required',
        ]);

        Employe::create($request->all());
        return redirect()->route('tables')->with('success', 'Empleado creado exitosamente.');
    }

    // Mostrar un empleado específico
    public function show(Employe $employe)
    {
        return view('employes.show', compact('employe'));
    }

    // Mostrar formulario para editar un empleado
    public function edit(Employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    // Actualizar un empleado
    public function update(Request $request, Employe $employe)
    {
        $request->validate([
            'nombre' => 'required',
            'salario' => 'required|integer',
            'posicion' => 'required',
            'estado' => 'required',
        ]);

        $employe->update($request->all());
        return redirect()->route('tables')->with('success', 'Empleado actualizado exitosamente.');
    }

    // Eliminar un empleado
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect()->route('tables')->with('success', 'Empleado eliminado exitosamente.');
    }
}