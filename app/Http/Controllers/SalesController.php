<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;
use App\Models\SaleProduct;
use App\Models\Payment;
use App\Models\Parcela;

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

        $payments = Payment::where('sale_id', $sale->id)->first();

        $parcelas = Parcela::where('sale_id', $sale->id)->get();

        if($sale->client_id != Null){
            $client = Client::find($sale->client_id);
        }
        else{
            $client = (object)['name' => 'Cliente Balcão'];
        }

        return view('Sales.show')->with([
            'sale' => $sale,
            'products' => $products,
            'saleproducts' => $saleproducts,
            'client' => $client,
            'payments' => $payments,
            'parcelas' => $parcelas
        ]);
    }

    // public function create(){
    //     return view('Sales.create');
    // }

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

        $quantityParcelas = $request->input('quantityParcelas');
        if($quantityParcelas == 1){
            $form_pgmt = 'a vista';
        }else{
            $form_pgmt = 'parcelado';
        }
        $totalPrice = $request->input('total-price');


        $payment = new Payment();
        $payment->sale_id = $saleId;
        $payment->price = $totalPrice;
        $payment->type_pay = $form_pgmt;
        $payment->num_parcelas = $quantityParcelas;
        $payment->save();

        $parcelasPrice = $request->input('price_parcela');
        $parcelasDate = $request->input('data_parcela');

        for ($j = 0; $j < count($parcelasPrice); $j++){
            $parcela = new Parcela();
            $parcela->sale_id = $saleId;
            $parcela->data_vencimento = $parcelasDate[$j];
            $parcela->price_parcela = $parcelasPrice[$j];
            $parcela->save();
        }


        return redirect('sales')->with('success', 'Venda criada com sucesso!');
    }

    public function destroy($id){
        $sale = Sale::find($id);

        if (!$sale) {
            return redirect()->route('sales.index')->with('error', 'Venda não encontrada.');
        }

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso.');
    }

    public function edit(Sale $sale){
        return view('Sales.show');
    }

    public function update(Request $request, Parcela $parcela, $sale){

        $parcelasIds = $request->input('payment_parcelas');
        $dates = $request->input('data_parcela');
        $prices = $request->input('price_parcela');

        $parcelas = Parcela::where('sale_id', $sale)->get();
        // dd($parcelas);

        for ($k = 0; $k < count($parcelas); $k++) {
            $parcelaId = $parcelas[$k]->id;
            
            $parcela = Parcela::find($parcelaId);
    
            if ($parcela) {
                $parcela->data_vencimento = $dates[$k];
                $parcela->price_parcela = $prices[$k];
                $parcela->save();
            }
        }

        return redirect()->route('sales.index')->with('success', 'venda editada com sucesso');
    }
}