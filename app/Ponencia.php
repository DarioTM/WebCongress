<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ponencia extends Model
{
    use SoftDeletes;

    protected $table = 'ponencia';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['iduser', 'titulo', 'video', 'fecha']; 


    // La ponencia tiene un solo usuario que crea la ponencia
    public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
    
    // Una ponencia tiene varias asistencias(userponencia)
    public function AsistenciaPonencia() {
        return $this->hasMany('App\AsistenciaPonencia');
    }
    
}
