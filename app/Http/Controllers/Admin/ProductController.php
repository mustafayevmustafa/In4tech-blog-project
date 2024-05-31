<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.pages.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $valid_product = $request->validated();
        $new_product = Product::create($valid_product);
        return redirect('api/admin/products');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       return view('admin.pages.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $valid_product = $request -> validated();
        $product->update($valid_product);
        return redirect('api/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->deleted_at) $product->deleted_at = null;
        else $product->deleted_at = now();

        $product -> update();
        return redirect('api/admin/products');
    }
}
