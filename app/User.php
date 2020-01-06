<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'correo', 'password', 'id_empresa', 'nombre', 'apellido_materno', 'apellido_materno'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    // Esta variable desactiva los campos created_at y updated_at, de esta forma al momento de realizar inserciones o actualizaciones de la tabla no muestre errores, ya que no existen estos campos
    public $timestamps = false;

    // Esta variable almacena el nombre de la tabla en la bases de datos a la que se accederá
    protected $table = 'usuarios';

    // Variable que almacena el nombre de la llave primaria de la tabla
    protected $primaryKey = 'id_usuario';
}
