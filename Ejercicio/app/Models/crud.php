<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class crud extends Model
{
    use HasFactory;

    // Deshabilita los timestamps para que Laravel no busque las columnas `created_at` y `updated_at`.
    public $timestamps = false;

    // Nombre real de la tabla en la BD
    protected $table = 'usuarios';
    // Definir clave primaria
    protected $primaryKey = 'codigo';

    // Si la clave primaria no es autoincremental
    public $incrementing = false;

    // Si el tipo de la clave primaria no es integer (ej. string, uuid, etc.)
    protected $keyType = 'string';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'codigo',
        'nombre',
        'correo'
    ];
}
