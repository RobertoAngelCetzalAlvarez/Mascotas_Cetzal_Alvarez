<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{    

    protected $table='mascotas';
    //clave primaria de la tabla
    protected $primaryKey='id_mascota';
    //especificamos relaciones
    public $with=['especie'];
    //define si la llave primaria es o no un numero autoincrementable
    // la clave primaria es numerica
    public $incrementing=true;

    //activar o desactivar etiquetas de tiempo
    // Lista de campos que van a recibir valor
    public $timestamps=true;

    public $fillable=[
        'nombre',
        'edad',
        'peso',
        'genero',
        'id_propietario',
        'id_especie'
    ];

    public function especie()
    {
        return $this->belongsTo(Especie::class,'id_especie','id_especie');
    }
}
