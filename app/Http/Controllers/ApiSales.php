<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class ApiSales extends Controller
{
    public function showAll(){
        $ventas = Sale::all();
        

        return response()->json($ventas);
    }
}
