<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    // 🔗 Relación: UNA carrera tiene MUCHOS egresados
    public function egresados()
    {
        return $this->hasMany(Egresado::class, 'carrera_id');
    }
}
