<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Contacto;
use Mail;

class HelpController extends Controller
{
     public function contacto(){
        $categorias=Categoria::get();
        return view('help.contacto', ['categorias'=>$categorias]);
    }
    public function contactform(Request $request) {

      
        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'asunto'=>'required',
            'mensaje' => 'required'
         ]);

      
        
       
        Mail::send('mail', array(
            'nombre' => $request->get('nombre'),
            'apellidos'=>$request->get('apellidos'),
            'email' => $request->get('email'),
            'asunto' => $request->get('subject'),
            'user_query' => $request->get('mensaje'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('allpcspain@gmail.com', 'Admin')->subject($request->get('asunto'));
        });

        return back()->with('success', 'Nosotros hemos recibido su mensaje, le contactaremos lo antes posible');
    }
    public function sugerencia(){
        $categorias=Categoria::get();
        return view('help.sugerencias', ['categorias'=>$categorias]);
    }
    public function sugerenciaform(Request $request) {

      
        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'asunto'=>'required',
            'mensaje' => 'required'
         ]);

      
        
       
        Mail::send('sugerencias', array(
            'nombre' => $request->get('nombre'),
            'apellidos'=>$request->get('apellidos'),
            'email' => $request->get('email'),
            'asunto' => $request->get('subject'),
            'user_query' => $request->get('mensaje'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('allpcspain@gmail.com', 'Admin')->subject($request->get('asunto'));
        });

        return back()->with('success', 'Nosotros hemos recibido su mensaje, le contactaremos lo antes posible');
    }
    public function newsletter(Request $request) {
        Mail::send('newsletter', array(), function($message) use ($request){
            $message->from($request->email);
            $message->to($request->email, 'Cliente')->subject('Gracias por suscribirte a la Newsletter, este descuento es para tí');
        });
        $contacto=new Contacto();
        $contacto->email=$request->email;
        $contacto->save();
        return back();
    }
}
  


