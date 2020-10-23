<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;
use App\Models\BarangModel;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('barang', [apicontroller::class, 'get_all']);
Route::post('barang/tambahbarang', [apicontroller::class, 'insert_data']);
Route::put('/barang/editbarang/{kode_barang}', [apicontroller::class, 'update_data']);
Route::get('/barang/{kode_barang}', [apicontroller::class, 'get_id']);
Route::delete('/barang/{kode_barang}', [apicontroller::class, 'delete_barang']);
