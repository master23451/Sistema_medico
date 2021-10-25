<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey='id_doctor';

    protected $table = 'doctor';

    protected $fillable = [
        "id_doctor",
        "id_consultorio",
        "nombre",
        "apellidos",
        "profile_photo_path",
        "usuario",
        "contra",
        "email",
        "telefono",
        "celular",
        "sexo",
        "horarios",
        "rol",
        "status",
    ];

    protected $hidden=[
        "created_at",
        "updated_at"
    ];
}
