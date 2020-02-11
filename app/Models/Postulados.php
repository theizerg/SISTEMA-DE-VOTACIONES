<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulados extends Model
{
    
    protected $table = 'postulados';

      protected $fillable = [
        'nb_nombres',
        'nb_apellidos',
        'nu_cedula',
        'cargos_id'
        

    ];
    
    protected $primaryKey = 'id_postulados';




    public function cargo()
    {
        return $this->belongsTo('App\Models\Cargos','cargos_id');
    }


    public function postulado(){

        return $this->belongsTo('App\Models\Postulantes','postulado_id');
    }
}
