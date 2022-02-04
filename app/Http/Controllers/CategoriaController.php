<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /*public function index(){
        $categorias = Categoria::get();

        return view('layouts.app', ['categorias' => $categorias]);
    }*/
    public function admin(){
        $categorias = Categoria::get();

        return view('categorias.admin', ['categorias' => $categorias]);
    }
    public function create(){
        return view('categorias.create');
    }
    public function store(Request $request){
        $this->validate($request,['titulo'=>'required','descripcion'=>'required']);
        Categoria::create($request->all());
        return redirect()->route('admin.categoria')->with('success','Categoria creada correctamente');
    }
    public function edit($idcategoria){
        $categoria=Categoria::find($idcategoria);
        return view('categorias.edit',compact('categoria'));
    }
    public function update(Request $request, $id){
        $this->validate($request,['titulo'=>'required', 'descripcion'=>'required']);
        Categoria::find($id)->update($request->all());
        return redirect()->route('admin.categoria')->with('success','Categoria actualizada correctamente');
 
    }
    public function delete($idcategoria){
     
         Categoria::find($idcategoria)->delete();
        return redirect()->route('admin.categoria')->with('success','Categoria eliminada correctamente');
    }
 
}
