<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'cargos';

      protected $fillable = [
        'nb_cargo'
    ];

    protected $primaryKey = 'id_cargos';

     /**
     * @return object
     */
  

}
