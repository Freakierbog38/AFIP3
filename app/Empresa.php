<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre', 'RFC', 'telefono', 'direccion'. 'giro'
    ];
}
