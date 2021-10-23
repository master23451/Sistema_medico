<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctor';

    protected $fillable = [
        "id",
        "id_consultorio",
        "nombre",
        "apellidos",
        "profile_photo_path",
        "usuario",
        "contra",
        "email",
        "numero_contacto",
        "sexo",
        "horarioE",
        "horarioS"
    ];

    protected $hidden=[
        "created_at",
        "updated_at"
    ];
}
