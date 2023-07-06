<?php

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
use App\Http\Controllers\ProdutosController;

Route::get('/', [ProdutosController::class, 'index']);
Route::get('/create', [ProdutosController::class, 'create']);
Route::get('/update/{id}', [ProdutosController::class, 'update']);
Route::get('/delete/{id}', [ProdutosController::class, 'delete']);
Route::get('/getCache', [ProdutosController::class, 'getCache']);
Route::get('/forgetCache', [ProdutosController::class, 'forgetCache']);
Route::get('/putCache', [ProdutosController::class, 'putCache']);
Route::get('/hasCache', [ProdutosController::class, 'hasCache']);
Route::get('/flushCache', [ProdutosController::class, 'flushCache']);
Route::get('/tagsCache', [ProdutosController::class, 'tagsCache']);
Route::get('/getTagsCache', [ProdutosController::class, 'getTagsCache']);
Route::get('/flushTagsCache', [ProdutosController::class, 'flushTagsCache']);
Route::get('/final', [ProdutosController::class, 'final']);
Route::get('/hasTagCache', [ProdutosController::class, 'hasTagCache']);
