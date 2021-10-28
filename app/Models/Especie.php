<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $table='especies';
    protected $primaryKey='id_especie';
    //define si la llave primaria es o no un numero autoincrementable
    public $incrementing=true;
    public $timestamps=false;

    public $afillable=[
        'id_especie',
        'especie'
    ];
}
