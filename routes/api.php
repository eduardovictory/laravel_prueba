<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TipificadoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//tipos
Route::get('gettipificador', [TipificadoresController::class, 'get']);
Route::post('newtipificador', [TipificadoresController::class, 'create']);

Route::get('/renderizar_lupa', [TipificadoresController::class, 'getLupaPopup'])->name('renderizar_lupa');

//prod
Route::get('getproductos', [ProductosController::class, 'getProductosApi']);

//pedido
Route::get('getpedidos', [ProductosController::class, 'getPedidosAPI']);


//llamar componente desde la vista
Route::get('/renderizar_componente', function (Request $request) {

    $comp = $request->input('componente');
    $data = $request->input('data');


    $ruta = resource_path("views/components/{$comp}.php");

    if (File::exists($ruta)) {

        if ($data) {
            $componente = View::file($ruta, $data)->render();
        } else {
            $componente = View::file($ruta)->render();
        }
    } else {
        return response()->json(
            "No se encontro el archivo '$ruta'",
            404
        );
    }

    return $componente;
})->name('renderizar_componente');
