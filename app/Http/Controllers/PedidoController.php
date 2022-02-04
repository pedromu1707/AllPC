<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use Cart;
use Mail;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{

    public function finalizar(){
        
        $direccion=session('direccion');
        $envio=session('envio');
        $pago=session('pago');
        $articulos="";

        foreach(Cart::getContent() as $data){
$articulos=$articulos. " ".$data->quantity." Unidades del producto: ". $data->name. " con Id ".$data->id;

        

        }
      //calcula el coste de envío
        if(Cart::getTotal()<50){
            $total=Cart::getTotal()+10;
        }
        else{
            $total=Cart::getTotal();
        }
        $pedido = new Pedido();
        $pedido->idCliente = Auth::user()->id;
        $pedido->direccion = $direccion;
        $pedido->metodoEnvio = $envio;
        $pedido->metodoPago = $pago;
        $pedido->total=$total;
        $pedido->articulos=$articulos;
        /*if($archivo=$request->file('img')){
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('uploads/images', $nombre);
            $recipe->image = $nombre;
        }*/
        Mail::send('pedido', array(
        ), function($message){
            $message->from('allpcspain@gmail.com');
            $message->to(Auth::user()->email, 'Admin')->subject("Pedido Confirmado");
        });
        session(['total' => '0']);
        $pedido->save();
        Cart::clear();
       
        return redirect()->route('index');


        
    }
    public function delete($idpedido){

         Pedido::find($idpedido)->delete();
         return back()->with('success',"Pedido eliminado con éxito.");
    }
    public function admin(){
      
       $pedidos=Pedido::get();

        return view('pedidos.admin', ['pedidos' => $pedidos]);
    }
}
