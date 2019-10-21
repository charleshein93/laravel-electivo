<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model  {

    protected $table = "LR_BOLETA";
    protected $primaryKey = 'lr_bol_numero';
    public $incrementing = true;
    public $timestamps = false;

    public $casts = [
        'lr_bol_fecha' => 'date',
        'lr_bol_monto' => 'int'
    ];

    public function getFechaAttribute(){
        return $this->lr_bol_fecha;
    }

    public function setFechaAttribute($fecha){
        $this->lr_bol_fecha = $fecha;
    }

    public function getMontoAttribute(){
        return $this->lr_bol_monto;
    }

    public function setMontoAttribute($total){
        $this->lr_bol_monto = $total;
    }

    public function getNumeroAttribute(){
        return $this->lr_bol_numero;
    }

    public function getRouteKeyName(){
        return 'lr_bol_numero';
    }

}
