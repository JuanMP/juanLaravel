<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

//me pide excluir el campo finalmente para que no se intente guardar en la base de datos
protected $guarded = ['_token'];

}
