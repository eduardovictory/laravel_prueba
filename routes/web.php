<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\FormGenericoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TipificadoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('lstusers', [CustomAuthController::class, 'lstUsers'])->name('lstusers');

//tipificador
Route::get('lupa', [TipificadoresController::class, 'getLupa'])->name('lupa');

//prod

// Route::post('/newproducto', function () {
//   echo 1;
//   return;
// });

Route::post('newproducto', [ProductosController::class, 'newProducto'])->name('newproducto');
Route::get('get-productos', [ProductosController::class, 'getProductos'])->name('lstproductos');
Route::get('delete-producto', [ProductosController::class, 'deleteProducto'])->name('delete.producto');



//master detail
Route::get('get-productos-pedido', [ProductosController::class, 'getProductosPedido'])->name('lstproductos_pedido');
Route::get('pedidos', [ProductosController::class, 'getPedidos'])->name('pedidos');
Route::post('newpedido', [ProductosController::class, 'newPedido'])->name('newpedido');
Route::post('updatepedido', [ProductosController::class, 'updatePedido'])->name('updatepedido');
Route::get('deletepedido', [ProductosController::class, 'deletePedido'])->name('deletepedido');


//generico
Route::post('generico-new-update', [FormGenericoController::class, 'genericoNewUpdate'])->name('generico.new');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// //crea todas las rutas basicas (create, update...)
// Route::resource('equipos', EquipoController::class);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');