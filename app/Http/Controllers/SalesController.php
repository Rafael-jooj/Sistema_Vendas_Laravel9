<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleProduct;

class SalesController{
    public function index(){
        $sales = Sale::all();
        return view('Sales.list')->with('sales', $sales);
    }
    public function create(){
        return view('Sales.create');
    }
    public function store(Request $request){
        
        $sale = new Sale();
        $sale->client_id = $request->client_id;
        $sale->save();

        $saleId = $sale->id;

        $productIds = $request->input('product_id');
        $quantities = $request->input('quantity');
        $prices = $request->input('price');

        for ($i = 0; $i < count($productIds); $i++) {
            $saleProduct = new SaleProduct();
            $saleProduct->sale_id = $saleId;
            $saleProduct->product_id = $productIds[$i];
            $saleProduct->quantity = $quantities[$i];
            $saleProduct->price = $prices[$i];
            $saleProduct->save();
        }

        return redirect('/create-sale')->with('success', 'Venda criada com sucesso!');
    }
}