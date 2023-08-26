<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;
use App\Models\SaleProduct;
use App\Models\Payment;

class SalesController{
    public function index(){
        $sales = Sale::all();
        $products = Product::all();
        $clients = Client::all();
        return view('Sales.list')->with([
            'sales' => $sales,
            'products' => $products,
            'clients' => $clients,
        ]);
    }

    public function show(Sale $sale){

        $saleproducts = SaleProduct::where('sale_id', $sale->id)->get();

        $productIds = $saleproducts->pluck('product_id');

        $products = Product::whereIn('id', $productIds)->get();

        if($sale->client_id != Null){
            $client = Client::find($sale->client_id);
        }
        else{
            $client = (object)['name' => 'Cliente Balcão'];
        }

        return view('Sales.show')->with([
            'sale' => $sale,
            'products' => $products,
            'client' => $client
        ]);
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

        $totalPrice = 0.00;

        for ($i = 0; $i < count($productIds); $i++) {
            $saleProduct = new SaleProduct();
            $saleProduct->sale_id = $saleId;
            $saleProduct->product_id = $productIds[$i];
            $saleProduct->quantity = $quantities[$i];
            $saleProduct->price = $prices[$i];
            $totalPrice += $saleProduct->price;
            $saleProduct->save();
        }

        $payment = new Payment();
        $payment->sale_id = $saleId;
        $payment->price = $totalPrice;


        return redirect('sales')->with('success', 'Venda criada com sucesso!');
    }
}