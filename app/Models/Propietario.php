<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    //se enlaza con la tabla que se desea trabajar
    protected $table='propietarios';
    //clave primaria de la tabla
    protected $primaryKey='id_propietario'; 
    // se relaciona
    public $with=['mascotas']; 

        //define si la  llave primaria es o no un numero autoincrementable
    // la clave primaria es numerica
    public $incrementing=true;
    public $timestamps=false;
      public $fillable=[
        'id_propietario',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'genero',
        'edad',
        'direccion',
        'telefono'
    ];
    public function mascotas(){
      return $this->hasMany(Mascota::class,'id_propietario','id_propietario');
    }
}
