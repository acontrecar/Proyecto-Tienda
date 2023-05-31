<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Funciones de usuarios
Route::post('users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::post('register', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//Rutas protegidas
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('logout', [UserController::class, 'logout']);
// });


//Rutas de productos
Route::get('products', [ProductController::class, 'index']);
Route::post('products/create', [ProductController::class, 'store'])->middleware('auth:sanctum'); //Esto deberia poder hacerlo solo el admin


//Rutas de categorias
Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories/create', [CategoryController::class, 'store'])->middleware('auth:sanctum');


//Rutas de subcategorias
Route::get('subcategories', [SubcategoryController::class, 'index']);
Route::post('subcategories/create', [SubcategoryController::class, 'store'])->middleware('auth:sanctum');
