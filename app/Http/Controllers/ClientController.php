<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController{
    public function index(){
        $clients = Client::all();
        return view('Clients.list')->with('clients', $clients);
    }

    public function create(){
        return view('Clients.create');
    }

    public function store(Request $request){
        $products = new Client();
        $products->name = $request->name;
        $products->save();

        return redirect('/');
    }

    public function show(Client $client){
        $clients = Client::where('id', $client->id)->first();
        
        return view('Clients.show')->with('clients', $clients);
    }

    public function update(Request $request, Client $client){
        
        $client->name = $request->input('name');
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Usuário editado com sucesso');
    }

    public function destroy($id){
        $client = Client::find($id);

        if (!$client) {
            return redirect()->route('sales.index')->with('error', 'Cliente não excluído.');
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente excluido com sucesso.');
    }
}