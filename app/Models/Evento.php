<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table='eventos';

    static $rules=[
        'title'=>'required',
        'nombre'=>'required',
        'apellidos'=>'required',
        'documento'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];
    protected $fillable=['title','nombre','apellidos','documento','start','end'];
}
