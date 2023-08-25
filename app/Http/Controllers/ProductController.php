<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController{
    public function create(){
        return view('Products.create');
    }
    public function store(Request $request){
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->save();

        return redirect('/');
    }
}