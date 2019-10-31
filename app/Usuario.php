<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    // Esta variable desactiva los campos created_at y updated_at, de esta forma al momento de realizar inserciones o actualizaciones de la tabla no muestre errores, ya que no existen estos campos
    public $timestamps = false;
}
