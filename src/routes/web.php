<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::get('/', function () {
    $products = Product::all();
    return view('home', ['products' => $products]);
})->name('home');

Route::post('/', function (Request $request) {
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description
    ]);
    $products = Product::all();
    return response()
        ->json(['data' => $products]);
})->middleware('throttle:5');
