<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function admin(){
        $marcas = Marca::get();

        return view('marcas.admin', ['marcas' => $marcas]);
    }
    public function create(){
        return view('marcas.create');
    }
    public function store(Request $request){
        $this->validate($request,['marca'=>'required']);
        Marca::create($request->all());
        return redirect()->route('admin.marca')->with('success','Marca creada correctamente');
    }
    public function edit($idMarca){
        $marca=Marca::find($idMarca);
        return view('marcas.edit',compact('marca'));
    }
    public function update(Request $request, $id){
        $this->validate($request,['marca'=>'required']);
        Marca::find($id)->update($request->all());
        return redirect()->route('admin.marca')->with('success','Marca actualizada correctamente');
 
    }
    public function delete($idMarca){
     
         Marca::find($idMarca)->delete();
        return redirect()->route('admin.marca')->with('success','Marca eliminada correctamente');
    }
 
}
