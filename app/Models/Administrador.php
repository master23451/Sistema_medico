<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'id_administrador';

    protected $fillable = [
        "id_administrador",
        "nombre",
        "apellidos",
        "profile_photo_path",
        "usuario",
        "contra",
        "email",
        "telefono",
        "celular",
        "sexo",
        "rol",
        "estatus",
    ];

    protected $hidden=[
        "created_at",
        "updated_at"
    ];

}
