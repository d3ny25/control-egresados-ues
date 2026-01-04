<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    protected $table = 'egresados';

    protected $fillable = [
        'matricula',
        'nombre_completo',
        'carrera_id',
        'generacion_id',
        'estatus_id',
        'genero',
        'telefono',
        'correo',
        'domicilio'
    ];


    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }


    public function generacion()
    {
        return $this->belongsTo(Generacion::class);
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class);
    }

}
