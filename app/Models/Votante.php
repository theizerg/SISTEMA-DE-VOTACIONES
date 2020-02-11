<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votante extends Model
{
    protected $table = 'votantes';

      protected $fillable = [
        'postulados_id',
        'user_id'
    ];



   
    public function postulado()
    {
        return $this->belongsTo('App\Models\Postulados','postulados_id');
    }

    

}
