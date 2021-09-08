<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Product;
use App\Http\Controllers\ProductController;

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

Route::get('/', [function () {
    $products = Product::all();
    return view('home', ['products' => $products]);
}])->name('home');

Route::post('/', [ProductController::class, 'store'])->middleware('throttle:5');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/productsRev', [ProductController::class, 'indexReverse']);
