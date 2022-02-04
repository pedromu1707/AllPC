<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Pedido;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function admin(){
        $usuarios = User::get();

        return view('users.index', ['usuarios' => $usuarios]);
    }
    public function create(){
        $usuarios=User::get();
        return view('users.create',['usuarios'=>$usuarios]);
    }
    public function edit($id){
        
        $usuario=User::find($id);
        return view('users.edit',['usuario'=>$usuario]);
        
    }
    public function passwordEdit(Request $request){

        
        $this->validate($request, [
            'password_old' => 'required','password_1' => 'required|min:5','password_2' => 'required|same:password_1'
        ]);
        // Note la regla de validación "confirmed", que solicitará que usted agregue un campo extra llamado password_confirm

        $cliente = Auth::user();
        $passworantigua=$cliente->password;
        if (Hash::check($request->password_old, Auth::user()->password)){
            
            $cliente->password=Hash::make($request->password_1);
            $cliente->update();
            return redirect()->route('index')->with('correcto','Contraseña modificada correctamente');
        }  
        return back()->with('error',"La contraseña antigua es incorrecta");

        
        } 
    
    public function delete($id){
     
         User::find($id)->delete();
        return redirect()->route('admin.usuario')->with('correcto','Usuario eliminado correctamente');
    }
   
    public function update(Request $request, $id){
        $this->validate($request, [ 'nombre' => 'required','password' => 'required|min:8','confirm-password' => 'required|same:password','rol'=>'required'     ]);
        $usuario = User::find($id);
        $usuario->name=$request->nombre;
        $usuario->is_admin=$request->rol;
        $usuario->password=Hash::make($request->password);
        $usuario->update();


        return redirect()->route('admin.usuario')->with('correcto','Usuario actualizado correctamente');
 
    }
    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required','password' => 'required|min:8','confirm-password' => 'required|same:password','email'=>'required|unique:users,email','rol'=>'required'
        ]);
        User::create([
            'name' => $request['nombre'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_admin'=>$request['rol'],
        ]);
        return redirect()->route('admin.usuario');
        
    }
    public function perfil(){
        $categorias=Categoria::get();
        return view('users.perfil',['categorias'=>$categorias]);
        
    }
    public function pedidos(){
        $categorias=Categoria::get();
        $pedidos=Pedido::where('idCliente',Auth::user()->id)->simplepaginate(10);
        return view('users.pedidos',['categorias'=>$categorias,'pedidos'=>$pedidos]);
        
    }
    public function deseos(){
        
        $categorias=Categoria::get();
        return view('users.deseos',['categorias'=>$categorias]);
        
    }
}
