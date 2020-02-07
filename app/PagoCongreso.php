<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;

class PagoCongreso extends Model
{
    use SoftDeletes;

    protected $table = 'pago_congresos';
    
    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['iduser','documento','verificado']; 

    // Un pago tiene solo un usuario
    public function User() {
        
        return $this->belongsTo('App\User', 'iduser');
    }

}
