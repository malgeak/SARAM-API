<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $table = 'motocicleta';
    
    protected $fillable = [
        'ID_usuario', 'Modelo','Marca', 'Cilindraje', 'Placa',
         'ID_saram','img_profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
