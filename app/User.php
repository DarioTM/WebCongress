<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function setPasswordAttribute($password)
{
    $this->attributes['password'] = $password; //quitar hash para poder loguear 
}

    
    
    
    // Un usuario tiene varias asistencias(userponencia)
    public function AsistenciaPonencias() {
        return $this->hasMany('App\AsistenciaPonencia');
    }
    
    public function Ponencias() {
        return $this->hasMany('App\Ponencia');
    }
    
    
    public function Pagos() {
        
        return $this->hasMany('App\PagoCongreso');
    }
    
    

    
    
}
