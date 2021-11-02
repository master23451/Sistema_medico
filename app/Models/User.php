<?php

namespace App\Models;

use App\Notifications\UserResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image(){
        if(Auth()->user()->profile_photo_path != ''){

            return Storage::url(Auth()->user()->profile_photo_path);
        }

        return 'https://ui-avatars.com/api/?name='.Auth()->user()->name;
    }

    public function adminlte_desc(){
        $roles=Roles::all();
        $user_rol="";
        foreach ($roles as $rol){
            if($rol->id == Auth()->user()->rol){
                $user_rol=$rol->nombre;
            }
        }
        return $user_rol;
    }

    public function adminlte_profile_url(){

        return 'perfil';
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
}
