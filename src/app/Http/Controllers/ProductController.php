<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return response()
            ->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'description' => 'required',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $products = Product::all();
        return response()
            ->json(['message' => "Submitted successfully, update the list with that button. :)"]);
    }
}
