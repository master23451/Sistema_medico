<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $primaryKey='id_paciente';

    protected $table='paciente';

    protected $fillable = [
        "id_paciente",
        "nombre",
        "apellidos",
        "expediente",
        "profile_photo_path",
        "usuario",
        "contra",
        "email",
        "telefono",
        "celular",
        "sexo",
        "rol",
        "status",
    ];

    protected $hidden=[
        "created_at",
        "updated_at"
    ];
}
