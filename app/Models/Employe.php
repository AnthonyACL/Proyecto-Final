<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    // Especificamos la tabla en caso de que el nombre sea distinto al plural de la clase
    protected $table = 'employes';

    // Habilitamos asignación masiva para estos campos
    protected $fillable = [
        'nombre',
        'salario',
        'posicion',
        'estado',
    ];
}
