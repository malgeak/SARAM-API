<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuarios";
    protected $fillable = [
        'Nombre', 'Apellidos', 'Correo','Contrasena', 'Edad', 'Direccion',
         'Telefono', 'Tipo_sangre', 'Alergias', 'Religion', 'Informacion_adicional',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Contrasena',
    ];
    
    public function Motos(){
        return $this->hasMany('App\Moto');
    }
}
