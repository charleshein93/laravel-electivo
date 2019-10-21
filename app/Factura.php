<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "lr_factura";
    protected $primaryKey = 'lr_fac_numero';
    public $incrementing = true;
    public $timestamps = false;

    public $casts = [
        'lr_fac_fecha' => 'date',
        'lr_fac_iva' => 'int',
        'lr_fac_monto' => 'int'
    ];
//////////////////////////////////////////
    public function getFechaAttribute(){
        return $this->lr_fac_fecha;
    }

    public function setFechaAttribute($fecha){
        $this->lr_fac_fecha = $fecha;
    }
//////////////////////////////////////////
    public function getIvaAttribute(){
        return $this->lr_fac_iva;
    }

    public function setIvaAttribute($iva){
        $this->lr_fac_iva = $iva;
    }
////////////////////////////////////////////    
    public function getMontoAttribute(){
        return $this->lr_fac_monto;
    }
    public function setMontoAttribute($monto){
        $this->lr_fac_monto = $monto;
    }

//////////////////////////////////////////
    public function getNumeroAttribute(){
        return $this->lr_fac_numero;
    }

    public function getRouteKeyName(){
        return 'lr_fac_numero';
    }



}
