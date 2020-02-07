<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsistenciaPonencia extends Model
{
    use SoftDeletes;

    protected $table = 'asistencia_ponencia';
    
    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['iduser', 'idponencia']; 

    // Una asistencia tiene solo un usuario
    public function User() {
        return $this->belongsTo('App\User', 'iduser');
    }

    // Una asistencia tiene solo una ponencia
    public function Ponencia() {
        return $this->belongsTo('App\Ponencia', 'idponencia');
    }
}
