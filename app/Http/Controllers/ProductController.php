<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $post = Product::create($data);
        return response()->json($post, 201);
    }


    public function edit(string $id)
    {
        $data = Product::find($id);
        return response()->json($data,200);

    }


    public function update(Request $request, string $id)
    {
        Product::where('id', $id)->update($request->all());
        return response()->json('Product updated', 200);
    }

    public function find($id){
        $product = Product::findOrFail($id);
        return response($product);
        //  ->json($product,201);
    }



    public function destroy(string $id)
    {
        $item = Product::find($id);
        if (!$item) return response()->json('There is no such a product', 404);

        $item->deleted_at = now();
        $item->save();

        return response()->json($id.' Product deleted', 200);
    }
}
