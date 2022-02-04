<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function productoscat($categoria){
    $paginar=1;
        
      $marcas=Marca::get();
        $nombre=Categoria::find($categoria);

        $categorias=Categoria::get();
        $productos=Producto::where('idCategoria',$categoria)->where('unidadesDispo','>',0)->simplePaginate(18);
       
        return view('productos.listarcat', ['productos' => $productos,'marcas'=>$marcas, 'categorias'=>$categorias,'nombre'=>$nombre,'categoria'=>$categoria,'paginar'=>$paginar]);
   
    }
    public function filtrarcategorias(Request $request){
       $paginar=0;
       $marcas=Marca::get();
      
        $minimo=0;
        $maximo=1000000;
       
       
       foreach ($marcas as $key => $value) {
        $marca[$key]=$value->idMarca;
     }
    
       
        if(isset($request->idMarca)){
            $marca=$request->idMarca;
             
        }
       
        if(isset($request->maximo)){
            $maximo=$request->maximo;
        }
        if(isset($request->minimo)){
            $minimo=$request->minimo;
        }
      
        $categoria=$request->categoria;
        $nombre=Categoria::find($categoria);
        $categorias=Categoria::get();
        $productos = Producto::latest()->where('unidadesDispo','>',0)->where('idCategoria',$categoria)->whereIn('idMarca',$marca)->where('precioUnidad', '>=',$minimo)->where('precioUnidad', '<=',$maximo)->get();
     return view('productos.listarcat', ['productos' => $productos,'nombre'=>$nombre, 'categorias'=>$categorias,'marcas'=>$marcas,'categoria'=>$categoria,'paginar'=>$paginar]);
    }
    public function ofertas(){
      $paginar=1;
        $marcas=Marca::get();
        $categorias=Categoria::get();
        $productos=Producto::where('oferta',1)->where('unidadesDispo','>',0)->simplePaginate(18);
       
        return view('productos.listarofertas', ['productos' => $productos, 'categorias'=>$categorias,'marcas'=>$marcas,'paginar'=>$paginar]);
   
   
    }
    public function ofertasback(){
      
        
        
        $productos=Producto::where('oferta',1)->get();
       
        return view('ofertas.admin', ['productos' => $productos]);
   
   
    }
    
    
    public function index(){
       $ofertas=Producto::latest()->where('oferta',1)->take(6)->get();
       $categorias=Categoria::get();
       $productos = Producto::latest()->where('unidadesDispo','>',0)
     ->take(6)
     ->get();
        return view('productos.index', ['productos' => $productos,'categorias'=>$categorias,'ofertas'=>$ofertas]);
    }
    public function novedades(){
        $paginar=1;
        $marcas=Marca::get();
        $categorias=Categoria::get();
        $productos = Producto::latest()->where('unidadesDispo','>',0)->simplePaginate(18);
     return view('productos.listarnovedades', ['productos' => $productos, 'categorias'=>$categorias,'marcas'=>$marcas,'paginar'=>$paginar]);
    }
    public function filtrarofertas(Request $request){
        $paginar=0;
        $marcas=Marca::get();
        $categorias=Categoria::get();
        $minimo=0;
        $maximo=1000000;
       foreach ($categorias as $key => $value) {
          $categoria[$key]=$value->idCategoria;
       }
       
       foreach ($marcas as $key => $value) {
        $marca[$key]=$value->idMarca;
     }
    
       
        if(isset($request->idMarca)){
            $marca=$request->idMarca;
             
        }
        if(isset($request->idCategoria)){
            $categoria=$request->idCategoria;
        }
        if(isset($request->maximo)){
            $maximo=$request->maximo;
        }
        if(isset($request->minimo)){
            $minimo=$request->minimo;
        }
      
        
        
        
        $productos=Producto::where('oferta',1)->where('unidadesDispo','>',0)->whereIn('idCategoria',$categoria)->whereIn('idMarca',$marca)->where('precioUnidad', '>=',$minimo)->where('precioUnidad', '<=',$maximo)->get();
    
     
     return view('productos.listarofertas', ['productos' => $productos, 'categorias'=>$categorias,'marcas'=>$marcas,'paginar'=>$paginar]);
    }
    public function filtrarnovedades(Request $request){
        $paginar=0;
        $marcas=Marca::get();
        $categorias=Categoria::get();
        $minimo=0;
        $maximo=1000000;
       foreach ($categorias as $key => $value) {
          $categoria[$key]=$value->idCategoria;
       }
       
       foreach ($marcas as $key => $value) {
        $marca[$key]=$value->idMarca;
     }
    
       
        if(isset($request->idMarca)){
            $marca=$request->idMarca;
             
        }
        if(isset($request->idCategoria)){
            $categoria=$request->idCategoria;
        }
        if(isset($request->maximo)){
            $maximo=$request->maximo;
        }
        if(isset($request->minimo)){
            $minimo=$request->minimo;
        }
        $productos = Producto::latest()->where('unidadesDispo','>',0)->whereIn('idCategoria',$categoria)->whereIn('idMarca',$marca)->where('precioUnidad', '>=',$minimo)->where('precioUnidad', '<=',$maximo)->get();
     return view('productos.listarnovedades', ['productos' => $productos, 'categorias'=>$categorias,'marcas'=>$marcas,'paginar'=>$paginar]);
    }
    
    
    public function show($idproducto){
        $recientes = Producto::latest()
        ->take(3)
        ->get();
        $ofertas=Producto::where('oferta',1)->take(3)->get();
        $categorias=Categoria::get();
        $producto=Producto::find($idproducto);
        $idMarca=$producto->idMarca;
        $marca=Marca::find($idMarca);

        return view('productos.show', ['producto' => $producto, 'categorias'=>$categorias,'recientes'=>$recientes,'ofertas'=>$ofertas,'marca'=>$marca->marca]);
    }
    public function admin(){
        $categorias=Categoria::get();
       $productos=Producto::get();

        return view('productos.admin', ['productos' => $productos, 'categorias'=>$categorias]);
    }
    public function adminDestacado(){
        $productos=Producto::where('destacado',1)->get();

        return view('destacados.admin', ['productos' => $productos]);
    }
    public function adminOfertas(){
        $productos=Producto::where('oferta',1)->get();

        return view('ofertas.admin', ['productos' => $productos]);
    }
    public function create(){
        $marcas=Marca::get();
        $categorias=Categoria::get();
        return view('productos.create',['categorias'=>$categorias,'marcas'=>$marcas]);
    }
    public function createDestacado(){
        $productos=Producto::where('destacado',0)->get();
        return view('destacados.create',['productos'=>$productos]);
    }
    public function createOfertas(){
        $productos=Producto::where('oferta',0)->get();
        return view('ofertas.create',['productos'=>$productos]);
    }

    public function edit($idproducto){
        
        $marcas=Marca::get();
        $categorias=Categoria::get();
        $producto=Producto::find($idproducto);
        return view('productos.edit',['producto'=>$producto,'categorias'=>$categorias,'marcas'=>$marcas]);
    }
    public function delete($idproducto){

         Producto::find($idproducto)->delete();
         return back()->with('success',"Producto eliminado con éxito.");
    }
    public function deleteDestacado($idproducto){

        Producto::find($idproducto)->update(['destacado'=>0]);
        return back()->with('success',"Producto eliminado con éxito.");
   }
     public function deleteOferta($idproducto){

        Producto::find($idproducto)->update(['oferta'=>0]);
        return back()->with('success',"Producto eliminado con éxito.");
   }
   
    public function update(Request $request){
        
        $this->validate($request,['titulo'=>'required','idMarca'=>'required', 'descripcion'=>'required','idCategoria'=>'required', 'precioUnidad'=>'required', 'unidadesDispo'=>'required', 'imagen'=>'required','oferta'=>'required','destacado'=>'required']);
        $producto=Producto::find($request->idProducto);
         $producto->titulo=$request->titulo;
        $producto->idMarca=$request->idMarca;
        $producto->descripcion=$request->descripcion;
         $producto->idCategoria=$request->idCategoria;
        $producto->precioUnidad=$request->precioUnidad;
        $producto->unidadesDispo=$request->unidadesDispo;
        $producto->oferta=$request->oferta;
     $producto->destacado=$request->destacado;
        $producto->estado=$request->estado;
        $archivo=$request->file('imagen');
        
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('imagenes/productos', $nombre);
            $producto->imagen = "/imagenes/productos/".$nombre;
        

        
        $producto->save();
        return redirect()->route('admin.producto')->with('success','Producto actualizado correctamente');
 
    }
    public function store(Request $request){
        $this->validate($request,['titulo'=>'required','idMarca'=>'required', 'descripcion'=>'required','estado'=>'required','idCategoria'=>'required', 'precioUnidad'=>'required', 'unidadesDispo'=>'required', 'imagen'=>'required','oferta'=>'required','destacado'=>'required']);
        $producto=new Producto();
        $producto->titulo=$request->titulo;
        $producto->idMarca=$request->idMarca;
        $producto->descripcion=$request->descripcion;
        $producto->idCategoria=$request->idCategoria;
        $producto->precioUnidad=$request->precioUnidad;
        $producto->unidadesDispo=$request->unidadesDispo;
        $producto->oferta=$request->oferta;
     $producto->destacado=$request->destacado;
        $producto->estado=$request->estado;
        $archivo=$request->file('imagen');
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('imagenes/productos', $nombre);
            $producto->imagen = "/imagenes/productos/".$nombre;
        


        
        $producto->save();
 

        return redirect()->route('admin.producto')->with('success','Producto creado correctamente');
    }
    public function storeDestacado($idProducto){
        Producto::find($idProducto)->update(['destacado'=>1]);
        return back()->with('success',"Producto añadido con éxito.");
    }
    public function storeOferta($idProducto){
        Producto::find($idProducto)->update(['oferta'=>1]);
        return back()->with('success',"Producto añadido con éxito.");
    }
}