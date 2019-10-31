<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // Esta variable desactiva los campos created_at y updated_at, de esta forma al momento de realizar inserciones o actualizaciones de la tabla no muestre errores, ya que no existen estos campos
    public $timestamps = false;

    // Esta variable se encarga de guardar el nombre de la tabla a la que se consulta
    // Laravel al crear un modelo y su migración por default busca la tabla agregando una s al nombre del modelo, por lo que en este caso buscaría la tabla como 'rols' pero dicha tabla no existe
    protected $table = 'roles';
}
