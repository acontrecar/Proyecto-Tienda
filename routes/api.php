<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::get('products-image/{imageName}', function ($imageName) {
    // $path = storage_path('app/public/productsImage/' . $imageName);

    // if (!file_exists($path)) {
    //     abort(404);
    // }

    // return response()->file($path);

    $isset = Storage::disk('productsImage')->exists($imageName);

    if ($isset) {
        $file = Storage::disk('productsImage')->get($imageName);
        return new Response($file, 200);
    } else {
        $data = [
            'status' => 404,
            'message' => 'Image not found',
        ];
        return response()->json($data, $data['status']);
    }
});

//Rutas de productos
Route::get('products', [ProductController::class, 'index']);
Route::post('products/create', [ProductController::class, 'store'])->middleware('auth:sanctum'); //Esto deberia poder hacerlo solo el admin
Route::post('products/{subcategory_id}/products', [ProductController::class, 'productsBySubCategory']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('products/{id}/size/{size_id}', [ProductController::class, 'showBySize']);


//Rutas de categorias
Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories/create', [CategoryController::class, 'store'])->middleware('auth:sanctum');


//Rutas de subcategorias
Route::get('subcategories', [SubcategoryController::class, 'index']);
Route::post('subcategories/create', [SubcategoryController::class, 'store'])->middleware('auth:sanctum');


//Rutas de products_stock
Route::get('products_stock', [ProductStockController::class, 'index']);
Route::post('products_stock/create', [ProductStockController::class, 'store'])->middleware('auth:sanctum');


//Rutas de orders_details
Route::get('orders_details', [OrderDetailsController::class, 'index']);
Route::post('orders_details/create', [OrderDetailsController::class, 'store'])->middleware('auth:sanctum'); //TODO












//Rutas de orders
// Route::get('orders', [OrderController::class, 'index']);
// Route::post('orders/createOrder', [OrderController::class, 'store'])->middleware('auth:sanctum');
// Route::post('orders/finishOrder', [OrderController::class, 'store'])->middleware('auth:sanctum');
// Route::get('orders/{id}', [OrderController::class, 'show']);
// Route::get('orders/{id}/products', [OrderController::class, 'productsByOrder']);
