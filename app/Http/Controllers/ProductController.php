<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController{
    public function index(){
        $products = Product::all();
        return view('Products.list')->with('products', $products);
    }

    public function create(){
        return view('Products.create');
    }

    public function show(Product $product){
        $products = Product::where('id', $product->id)->first();
        
        return view('Products.show')->with('products', $products);
    }

    public function store(Request $request){
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->save();

        return redirect()->route('products.index');
    }

    public function update(Request $request, Product $product){
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto editado com sucesso');
    }

    public function destroy($id){
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produto não excluído.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluido com sucesso.');
    }
}