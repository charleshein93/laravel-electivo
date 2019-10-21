<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table = "lr_producto";
    protected $primaryKey = "lr_pro_numero";
    public $timestamps = false;


    public function getNumeroAttribute(){
        return $this->lr_pro_numero;
    }

    public function setNumeroAttribute($numero){
        $this->lr_pro_numero = $numero;
    }

    public function getNombreAttribute(){
        return $this->lr_pro_nombre;
    }

    public function setNombreAttribute($nombre){
        $this->lr_pro_nombre = $nombre;
    }

    public function getRouteKeyName(){
        return 'lr_pro_numero';
    }

}
