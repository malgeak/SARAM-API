<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'dispositivos';
    
    protected $fillable = [
        'ID_saram', 'Version',
    ];
    
    protected $hidden = [
        'ID_saram', 'Version',
    ];
}
