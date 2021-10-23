<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administrador';

    protected $fillable = [
        "id",
        "nombre",
        "apellidos",
        "profile_photo_path",
        "usuario",
        "contra",
        "email",
        "numero_contacto",
        "sexo",
    ];

    protected $hidden=[
        "created_at",
        "updated_at"
    ];

}