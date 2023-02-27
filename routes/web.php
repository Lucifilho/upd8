<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EventController::class,'main']);
Route::get('pages/registrar', [EventController::class,'create']);
Route::post('/pages', [EventController::class, 'store']);

Route::get('pages/editar/{id}', [EventController::class,'edit']);
Route::put('pages/update/{id}', [EventController::class,'update']);
Route::delete('pages/excluir/{id}', [EventController::class,'destroy']);


Route::get('pages/buscar', [EventController::class,'busca']);



