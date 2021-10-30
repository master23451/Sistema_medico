<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table='roles';

    protected $fillable=[
      'id',
      'nombre',
      'descripcion',
      'status',
    ];

    protected $hidden=[
        "created_at",
        "updated_at"
    ];
    
}
