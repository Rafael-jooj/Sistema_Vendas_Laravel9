<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleProduct;

class SalesController{
    public function create(){
        return view('Sales.create');
    }
    public function store(Request $request){

    }
}