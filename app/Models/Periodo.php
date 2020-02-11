<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
 protected $table = 'periodo';

    protected $fillable = [
      'fe_inicio','h_inicio','h_fin'
  ];

  protected $primaryKey = 'id';

   /**
   * @return object
   */

}
