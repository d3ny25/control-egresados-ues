<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'activo',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔑 RELACIÓN FALTANTE
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'role_id');
    }

    public function esAdmin(): bool
    {
        return $this->rol && $this->rol->nombre === 'Administrador';
    }
}
