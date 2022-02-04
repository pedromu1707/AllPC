<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Cupon;

use Cart;

class CartController extends Controller
{
    
    public $contador=0;
    public function comprobar(Request $request){
       
        $cuponactivo="";
        $total=Cart::getTotal();
        $cupon = Cupon::where('cupon', '=', $request->cupon)->get()->first();
       $cuponactivo="";
       
       if(!empty($cupon)){
        
        $minimo=$cupon->minimo;
      
        if($total>$minimo){
        $cupondescuento=$cupon->descuento;
        
        
        
        $descuento = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 12.5%',
            'type' => 'tax',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => $cupondescuento,
            'attributes' => array( // attributes field is optional
                'description' => 'Value added tax',
                'more_data' => 'more data here'
            )
        ));
        session(['cupon' => $request->cupon]);
        session(['tienecupon' => 'si']);
        session(['total' => $total]);
        

        
        
        Cart::condition($descuento);
       
        
    }
   $categorias=Categoria::get();
    $destacados=Producto::where('destacado',1)->simplePaginate(3);
       }
       
       return redirect()->back();

        
    
        
          
        
    }
    public function direccion(){
        $categorias=Categoria::get();
        return view('cart.direccion', ['categorias'=>$categorias]);
     
    }
    public function envio(Request $request){
        
        $this->validate($request,['nombre'=>'required', 'apellido'=>'required','calle'=>'required', 'numero'=>'required','ciudad'=>'required','cp'=>'required','pais'=>'required','telefono'=>'required','email'=>'required']);
        session(['direccion' => "$request->nombre $request->apellido $request->calle $request->numero $request->ciudad $request->cp $request->pais $request->telefono $request->email"]);
        $categorias=Categoria::get();
        return view('cart.envio', ['categorias'=>$categorias]);
       
     
    }
    public function pago(Request $request){
        $this->validate($request,['envio'=>'required']);
        session(['envio' => $request->envio]);
        $categorias=Categoria::get();
        return view('cart.pago', ['categorias'=>$categorias]);
     
    }
    public function revision(Request $request){
        $this->validate($request,['pago'=>'required']);
        session(['pago' => $request->pago]);
        //Cart::clearCartConditions();
        $categorias=Categoria::get();
        return view('cart.revision', ['categorias'=>$categorias]);
     
    }

    public function add(Request $request){
        session()->forget('total');
        $producto = Producto::find($request->idProducto);
        if($producto->unidadesDispo>=$request->unidades){
            Cart::add(
                $producto->idProducto, 
                $producto->titulo, 
                $producto->precioUnidad,
                $request->unidades,
                array("imagen"=>$producto->imagen)
                
            );
                $productoalmacen=Producto::find($request->idProducto);
               
                $unidadesalmacen=$productoalmacen->unidadesDispo;
               
                $unidadesresta=$unidadesalmacen-$request->unidades;
   
                $productos = Producto::where('idProducto', $request->idProducto);
                $productos->update(['unidadesDispo'=>$unidadesresta]);
            return back()->with('correcto',"$producto->titulo ¡se ha agregado con éxito al carrito!");
        }
        return back()->with('error',"$producto->titulo No hay unidades suficientes. Solo quedan ".$producto->unidadesDispo);
   
    }

    public function show()

    {  
       
        
        if(!session('total')){
            Cart::clearCartConditions();

        }
            
        
        
        
        
        $productos=Producto::where('destacado',1)->where('unidadesDispo','>',0)->simplePaginate(3);
        $categorias=Categoria::get();
            return view('cart.show', ['categorias'=>$categorias,'destacados'=>$productos]);
     
    
    }
    public function total() {
        return array_sum(array_column($this->items, 'precio'));
    }

    public function removeitem(Request $request) {
        session()->forget('total');
        Cart::remove([
        'id' => $request->id,
        ]);
        $productoalmacen=Producto::find($request->id);
$unidadesalmacen=$productoalmacen->unidadesDispo;
$unidadessuma=$unidadesalmacen+$request->cantidad;

$productos = Producto::where('idProducto', $request->id);
$productos->update(['unidadesDispo'=>$unidadessuma]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }
    public function clear(){
        foreach(Cart::getContent() as $data){
            
            $productopedido=$data->id;
            $unidadespedido=$data->quantity;
            $productoalmacen=Producto::find($data->id);
            $unidadesalmacen=$productoalmacen->unidadesDispo;
            $unidadessuma=$unidadesalmacen+$unidadespedido;
            
            $productos = Producto::where('idProducto', $data->id);
            $productos->update(['unidadesDispo'=>$unidadessuma]);
                    
            
                    }

        Cart::clear();
        session()->forget('total');
        return back()->with('success',"Carrito vaciado correctamentes");
    }

}
