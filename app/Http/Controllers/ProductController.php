<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
    
    public function create(){
        return view('product.create');
    }

    public function store(ProductFormRequest $request){
        $data = $request->validated();

        $product = Product::create($data);
        return redirect('/create-product')->with('message','Product Berhasil Ditambahkan');

    }

    
    public function edit($product_id)
    {
        $product = Product::find($product_id);

        return view('product.edit', compact('product'));
    }

    public function update(ProductFormRequest $request, $product_id)
    {
        $data = $request->validated();

        $product = Product::where('id', $product_id)->update([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);
        return redirect('/products')->with('message','Product Berhasil di update');
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id)->delete();
        return redirect('/products')->with('message','Product Berhasil di delete');
    }
}
