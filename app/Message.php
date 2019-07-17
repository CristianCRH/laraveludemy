<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //laravel busca automaticamente en el nombre de la tabla en minuscula y en´plural messages
    //si quermos espeifiacr otronombre de tabla
   // protected $table="tanble_name";
	protected $fillable=['name1','email','message'];//proteccion de asignacion masiva
}
