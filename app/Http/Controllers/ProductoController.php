<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{

    public function guardar(Request $request){
        $this->validate($request, [
           'numero' => 'required|numeric',
           'nombre' => 'required|max:100'
        ]);

        $p = new Producto();
        $p->numero = $request->numero;
        $p->nombre = $request->nombre;
        if(!$p->save()){
            $request->session()->flash('danger', 'No se pudo crear el Producto');
            //Session::flash('danger', 'No se pudo crear el Producto');
            return redirect()->back();
        }
        Session::flash('success', 'Producto creado');
        return redirect()->route('productos.index');
    }

    public function actualizar(Request $request, Producto $p){
        $this->validate($request, [
            'numero' => 'numeric',
            'nombre' => 'max:100'
        ]);

        if($request->numero === null && $request->nombre===null){
            Session::flash('warning', 'Nada que actualizar');
            return redirect()->back();
        }
        if($request->numero != null && $request->numero!= $p->numero)
            $p->numero = $request->numero;
        if($request->nombre != null && $request->nombre!= $p->nombre)
            $p->nombre = $request->nombre;

        if(!$p->save()){
            $request->session()->flash('danger', 'No se pudo actualizar el Producto');
            return redirect()->back();
        }
        Session::flash('success', 'Producto actualizado');
        return redirect()->route('productos.index');

    }

    public function index(){
        $productos = Producto::all();
        return view('productos.index')->with('productos', $productos);
    }

    public function nuevo(){
         return view('productos.nuevo');
    }

    public function modificar(Producto $p){
        return view('productos.editar')->with('producto', $p);
    }



}
