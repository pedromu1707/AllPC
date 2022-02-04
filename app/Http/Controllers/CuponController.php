<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupon;

class CuponController extends Controller
{
    public function crear(){
      
        return view('cupones.create');
    }
    public function listar(){
        $cupones = Cupon::get();

        return view('cupones.admin', ['cupones' => $cupones]);
    }
    public function store(Request $request){
        $this->validate($request,['cupon'=>'required','descuento'=>'required','minimo'=>'required']);
        Cupon::create($request->all());
        return redirect()->route('admin.cupon')->with('success','Categoria creada correctamente');
    }
    public function edit($idcupon){
        
      
        
        $cupon=Cupon::find($idcupon);
        return view('cupones.edit',['cupon'=>$cupon]);
    } public function delete($idcupon){

        Cupon::find($idcupon)->delete();
        return back()->with('success',"Cupon eliminado con éxito.");
   }
  
   public function update(Request $request, $id){
       $this->validate($request,['cupon'=>'required', 'descuento'=>'required','minimo'=>'required']);
       Cupon::find($id)->update($request->all());
       return redirect()->route('admin.cupon')->with('success','Cupon actualizado correctamente');

   }
}
