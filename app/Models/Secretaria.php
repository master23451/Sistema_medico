<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    protected $primaryKey='id_secretaria';

    protected $table = 'secretaria';

    protected $fillable = [
        "id_secretaria",
        "nombre",
        "apellidos",
        "profile_photo_path",
        "usuario",
        "contra",
        "email",
        "telefono",
        "celular",
        "rol",
        "status",
    ];

    protected $hidden=[
        "created_at",
        "updated_at"
    ];
}
