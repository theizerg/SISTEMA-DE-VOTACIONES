<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use SearchableTrait;
    use SoftDeletes;
    use HasRoles;



    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'status','id_userss','nu_cedula'
    ];

    protected $hidden = [];

    protected $appends = ['full_name'];


    protected $searchable = [
        'columns' => [
          'users.name' => 5,
          'users.last_name' => 5,
        ]
    ];


    /*
    |
    | ** Relationships model **
    |
    */

    public function logins()
    {
        return $this->hasMany('App\Models\Login');
    }

    /*
    |
    | ** Accesors model **
    |
    */

   /* public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }*/







    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Denegado';
    }

    /*
    |
    | ** Mutators model **
    |
    */

    public function setPasswordAttribute($attribute)
    {
        if (! empty($attribute))
        {
           $this->attributes['password'] = strlen($attribute) < 60 ? bcrypt($attribute) : $attribute;
        }
    }

    /*
    |
    | ** Send the custom password reset notification **
    |
    */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
