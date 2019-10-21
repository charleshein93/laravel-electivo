<?php

namespace App\Http\Controllers;

use App\Boleta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BoletaController extends Controller
{

    public function index(){
        $boletas = Boleta::all();
        return view('boletas.index')->with('boletas', $boletas);
    }

    public function nuevo(){
        return view('boletas.nuevo');
    }

    public function guardar(Request $request){
        $this->validate($request, [
           'fecha' => 'required|date',
           'monto' => 'required|numeric'
        ]);

        $bol = new Boleta();
        $bol->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha);
        $bol->monto = $request->monto;
        if(!$bol->save()){
            $request->session()->flash('danger', 'No se pudo crear la Boleta');
            //Session::flash('danger', 'No se pudo crear el Producto');
            return redirect()->back();
        }
        Session::flash('success', 'Boleta ingresada');
        return redirect()->route('boletas.index');
    }

    public function actualizar(Request $request, Boleta $b){
        $this->validate($request, [
            'fecha' => 'date_format:d/m/Y',
            'monto' => 'numeric'
        ]);

        if($request->fecha === null && $request->monto===null){
            Session::flash('warning', 'Nada que actualizar');
            return redirect()->back();
        }
        if($request->fecha != null && $request->fecha!= $b->fecha)
            $b->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha);
        if($request->monto != null && $request->monto!= $b->monto)
            $b->monto = $request->monto;

        if(!$b->save()){
            $request->session()->flash('danger', 'No se pudo actualizar la boleta');
            return redirect()->back();
        }
        Session::flash('success', 'Boleta actualizada');
        return redirect()->route('boletas.index');

    }

    public function modificar(Boleta $b){
        return view('boletas.editar')->with('boleta', $b);
    }

    public function eliminar(Request $r, Boleta $b){
        if($b->delete()){
            Session::flash('danger', 'BOLETA eliminada');
            return redirect()->route('boletas.index');
        }else{
            Session::flash('warning', 'BOLETA no se puede eliminar');
            return redirect()->back();
        }
    }

}
