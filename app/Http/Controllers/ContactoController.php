<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{


    public function delete($idcontacto){

         Contacto::find($idcontacto)->delete();
         return back()->with('success',"Contacto eliminado con éxito.");
    }
    public function admin(){
      
       $contactos=Contacto::get();

        return view('contacto.admin', ['contactos' => $contactos]);
    }
}
