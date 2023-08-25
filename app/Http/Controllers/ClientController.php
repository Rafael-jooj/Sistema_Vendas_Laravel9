<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController{
    public function create(){
        return view('Clients.create');
    }
    public function store(Request $request){
        $products = new Client();
        $products->name = $request->name;
        $products->save();

        return redirect('/');
    }
}