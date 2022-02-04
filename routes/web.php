<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
});
Route::get('/lang/{language}', function ($language) {
    
    Session::put('language',$language);

    return redirect()->back();
})->name('language');

Auth::routes(['verify'=> true]);

//Middleware que controla que el usuario sea admin, en este grupo se engloban todas las rutas del backend
Route::group(['middleware' => 'admin'], function () {
Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin'] )->name('admin');
//Productos
Route::get('/admin/producto/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('admin.producto.create');
Route::get('/admin/producto', [App\Http\Controllers\ProductoController::class, 'admin'])->name('admin.producto');
Route::post('/admin/producto/create/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('admin.producto.create.store');
Route::get('/admin/producto/edit/{idProducto}',[App\Http\Controllers\ProductoController::class, 'edit'])->name('admin.producto.edit');
Route::post('/admin/producto/edit/update', [App\Http\Controllers\ProductoController::class, 'update'])->name('admin.producto.edit.update');
Route::get('/admin/producto/delete/{idProducto}',[App\Http\Controllers\ProductoController::class, 'delete'])->name('admin.producto.delete');

//Marcas
Route::get('/admin/marca/create', [App\Http\Controllers\MarcaController::class, 'create'])->name('admin.marca.create');
Route::get('/admin/marca', [App\Http\Controllers\MarcaController::class, 'admin'])->name('admin.marca');
Route::post('/admin/marca/create/store', [App\Http\Controllers\MarcaController::class, 'store'])->name('admin.marca.create.store');
Route::get('/admin/marca/edit/{idProducto}',[App\Http\Controllers\MarcaController::class, 'edit'])->name('admin.marca.edit');
Route::get('/admin/marca/edit/update/{idProducto}', [App\Http\Controllers\MarcaController::class, 'update'])->name('admin.marca.edit.update');
Route::get('/admin/marca/delete/{idProducto}',[App\Http\Controllers\MarcaController::class, 'delete'])->name('admin.marca.delete');


//Destacados
Route::get('/admin/destacado/create', [App\Http\Controllers\ProductoController::class, 'createDestacado'])->name('admin.destacado.create');
Route::get('/admin/destacado', [App\Http\Controllers\ProductoController::class, 'adminDestacado'])->name('admin.destacado');
Route::get('/admin/destacado/create/store/{idProducto}', [App\Http\Controllers\ProductoController::class, 'storeDestacado'])->name('admin.destacado.create.store');
Route::get('/admin/destacado/delete/{idProducto}',[App\Http\Controllers\ProductoController::class, 'deleteDestacado'])->name('admin.destacado.delete');


//Pedidos
Route::get('/admin/pedido', [App\Http\Controllers\PedidoController::class, 'admin'])->name('admin.pedido');
Route::get('/admin/pedido/delete/{idPedido}',[App\Http\Controllers\PedidoController::class, 'delete'])->name('admin.pedido.delete');

//Contactos
Route::get('/admin/contacto', [App\Http\Controllers\ContactoController::class, 'admin'])->name('admin.contacto');
Route::get('/admin/contacto/delete/{idContacto}',[App\Http\Controllers\ContactoController::class, 'delete'])->name('admin.contacto.delete');

    
//Categorias
Route::get('/admin/categoria', [App\Http\Controllers\CategoriaController::class, 'admin'])->name('admin.categoria');
Route::get('/admin/categoria/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('admin.categoria.create');
Route::post('/admin/categoria/create/store', [App\Http\Controllers\CategoriaController::class, 'store'])->name('admin.categoria.create.store');
Route::get('/admin/categoria/edit/{idCategoria}',[App\Http\Controllers\CategoriaController::class, 'edit'])->name('admin.categoria.edit');
Route::get('/admin/categoria/edit/update/{idCategoria}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('admin.categoria.edit.update');
Route::get('/admin/categoria/delete/{idCategoria}',[App\Http\Controllers\CategoriaController::class, 'delete'])->name('admin.categoria.delete');
    
//Ofertas
Route::get('/admin/oferta', [App\Http\Controllers\ProductoController::class, 'ofertasback'])->name('admin.oferta');
Route::get('/admin/oferta/create', [App\Http\Controllers\ProductoController::class, 'createOfertas'])->name('admin.ofertas.create');
Route::get('/admin/oferta', [App\Http\Controllers\ProductoController::class, 'adminOfertas'])->name('admin.ofertas');
Route::get('/admin/oferta/create/store/{idProducto}', [App\Http\Controllers\ProductoController::class, 'storeOferta'])->name('admin.oferta.create.store');
Route::get('/admin/oferta/delete/{idProducto}',[App\Http\Controllers\ProductoController::class, 'deleteOferta'])->name('admin.oferta.delete');

//Cupones
Route::get('/admin/cupon', [App\Http\Controllers\CuponController::class, 'listar'])->name('admin.cupon');
Route::get('/admin/cupon/create', [App\Http\Controllers\CuponController::class, 'crear'])->name('admin.cupon.create');
Route::post('/admin/cupon/create/store', [App\Http\Controllers\CuponController::class, 'store'])->name('admin.cupon.create.store');
Route::get('/admin/cupon/edit/{idCupon}',[App\Http\Controllers\CuponController::class, 'edit'])->name('admin.cupon.edit');
Route::get('/admin/cupon/edit/update/{idCupon}', [App\Http\Controllers\CuponController::class, 'update'])->name('admin.cupon.edit.update');
Route::get('/admin/cupon/delete/{idCupon}',[App\Http\Controllers\CuponController::class, 'delete'])->name('admin.cupon.delete');

//Usuarios

Route::get('/admin/usuario', [App\Http\Controllers\UserController::class, 'admin'])->name('admin.usuario');
Route::get('/admin/usuario/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.usuario.create');
Route::post('/admin/usuario/create/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.usuario.create.store');
Route::get('/admin/usuario/edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('admin.usuario.edit');
Route::get('/admin/usuario/edit/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.usuario.edit.update');
Route::get('/admin/usuario/delete/{id}',[App\Http\Controllers\UserController::class, 'delete'])->name('admin.usuario.delete');



    

});

//Middleware que controla que se esté logueado
Route::group(['middleware' => 'login'], function () {
Route::get('/perfil', [App\Http\Controllers\UserController::class, 'perfil'])->name('perfil')->middleware('web')->middleware(['auth', 'verified']);
Route::get('/pedidos', [App\Http\Controllers\UserController::class, 'pedidos'])->name('pedidos')->middleware('web')->middleware(['auth', 'verified']);
Route::post('/password-edit', [App\Http\Controllers\UserController::class, 'passwordEdit'])->name('password.edit')->middleware('web')->middleware(['auth', 'verified']);
    
});
//Middleware que controla que se esté logueado y haya al menos un artículo en el carrito
Route::group(['middleware' => 'minimo'], function () {
Route::get('/pedido', [App\Http\Controllers\CartController::class, 'direccion'])->name('pedido')->middleware('web')->middleware(['auth', 'verified']);
Route::post('/envio', [App\Http\Controllers\CartController::class, 'envio'])->name('envio')->middleware('web')->middleware(['auth', 'verified']);
Route::post('/pago', [App\Http\Controllers\CartController::class, 'pago'])->name('pago')->middleware('web')->middleware(['auth', 'verified']);
Route::post('/descuento', [App\Http\Controllers\CartController::class, 'descuento'])->name('descuento')->middleware('web')->middleware(['auth', 'verified']);
Route::post('/revision', [App\Http\Controllers\CartController::class, 'revision'])->name('revision')->middleware('web')->middleware(['auth', 'verified']);
Route::get('/finalizar', [App\Http\Controllers\PedidoController::class, 'finalizar'])->name('finalizar')->middleware('web')->middleware(['auth', 'verified']);
Route::get('/paypal/pay', [App\Http\Controllers\PaymentController::class ,'payWithPayPal'])->name('paypal.pay')->middleware(['auth', 'verified']);
Route::get('/paypal/status',[App\Http\Controllers\PaymentController::class, 'payPalStatus'])->name('paypal.status')->middleware(['auth', 'verified']);
});

Route::get('/', [App\Http\Controllers\ProductoController::class, 'index'])->name('index')->middleware('web');



//Carrito
Route::post('/cart-add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('/cart-show',[App\Http\Controllers\CartController::class, 'show'])->name('cart.show')->middleware('web');
Route::get('/cart-clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart-update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart-remove', [App\Http\Controllers\CartController::class, 'removeitem'])->name('cart.remove');
Route::post('/cupon', [App\Http\Controllers\CartController::class, 'comprobar'])->name('cupon');

//Diferentes páginas de categoría y novedades-ofertas
Route::get('/novedades', [App\Http\Controllers\ProductoController::class, 'novedades'])->name('novedades')->middleware('web');
Route::get('/ofertas', [App\Http\Controllers\ProductoController::class, 'ofertas'])->name('ofertas')->middleware('web');
Route::get('/cat-list/{idCategoria}', [App\Http\Controllers\ProductoController::class, 'productoscat'])->name('productoscat')->middleware('web');
Route::post('/filtrar-ofertas', [App\Http\Controllers\ProductoController::class, 'filtrarofertas'])->name('filtrar.ofertas');
Route::post('/filtrar-novedades', [App\Http\Controllers\ProductoController::class, 'filtrarnovedades'])->name('filtrar.novedades');
Route::post('/filtrar-categorias', [App\Http\Controllers\ProductoController::class, 'filtrarcategorias'])->name('filtrar.categorias');

//Pagina detallada del producto
Route::get('/product/{idProducto}', [App\Http\Controllers\ProductoController::class, 'show'])->name('show')->middleware('web');


//Contacto
Route::get('/contacto', [App\Http\Controllers\HelpController::class, 'contacto'])->name('contacto')->middleware('web');
Route::post('/contact-form', [App\Http\Controllers\HelpController::class, 'contactform'])->name('contactform')->middleware('web');

//Sugerencias
Route::get('/sugerencias', [App\Http\Controllers\HelpController::class, 'sugerencia'])->name('sugerencias')->middleware('web');
Route::post('/sugerencias-form', [App\Http\Controllers\HelpController::class, 'sugerenciaform'])->name('sugerenciaform')->middleware('web');
Route::post('/newsletter', [App\Http\Controllers\HelpController::class, 'newsletter'])->name('newsletter');











