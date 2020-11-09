<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = 'contactos';
    
    protected $fillable = [
        'ID_Usuario', 'Nombre', 'Apellidos', 'Numero_Tel', 'Correo','img_profile',
    ];
}
