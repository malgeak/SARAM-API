<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    
    protected $fillable = [
        'ID_motocicleta', 'Posicion', 'Fecha', 'Hora', 'longitud', 'latitud',
    ];
}
