<?php

namespace App\Http\Controllers;

use App\Factura;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FacturaController extends Controller
{
    public function index(){
        $facturas = Factura::all();
        return view('facturas.index')->with('facturas', $facturas);
    }

    public function nuevo(){
        return view('facturas.nuevo');
    }

    public function guardar(Request $request){
        $this->validate($request, [
           'fecha' => 'required|date',
           'iva' => 'required|numeric',
           'monto' => 'required|numeric'
        ]);

        $fac = new Factura();
        $fac->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha);
        $fac->iva = $request->iva;
        $fac->monto = $request->monto;
        if(!$fac->save()){
            $request->session()->flash('danger', 'No se pudo crear la Factura');
            //Session::flash('danger', 'No se pudo crear el Producto');
            return redirect()->back();
        }
        Session::flash('success', 'Factura ingresada');
        return redirect()->route('facturas.index');
    }

    public function actualizar(Request $request, Factura $f){
        $this->validate($request, [
            'fecha' => 'date_format:d/m/Y',
            'iva' => 'numeric',
            'monto' => 'numeric'
        ]);

        if($request->fecha === null && $request->iva === null && $request->monto===null){
            Session::flash('warning', 'Nada que actualizar');
            return redirect()->back();
        }
        if($request->fecha != null && $request->fecha!= $f->fecha)
            $f->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha);
        if($request->monto != null && $request->monto!= $f->monto)
            $f->monto = $request->monto;
        if($request->iva != null && $request->iva!= $f->iva)
            $f->iva = $request->iva;

        if(!$f->save()){
            $request->session()->flash('danger', 'No se pudo actualizar la factura');
            return redirect()->back();
        }
        Session::flash('success', 'Factura actualizada');
        return redirect()->route('facturas.index');

    }   

    public function modificar(Factura $f){
        return view('facturas.editar')->with('factura', $f);
    }

    public function eliminar(Request $r, Factura $f){
        if($f->delete()){
            Session::flash('danger', 'FACTURA eliminada');
            return redirect()->route('facturas.index');
        }else{
            Session::flash('warning', 'FACTURA no se puede eliminar');
            return redirect()->back();
        }
    }

}
