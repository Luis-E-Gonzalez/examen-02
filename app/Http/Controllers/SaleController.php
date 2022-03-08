<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function venta()
    {
        $ventas = Sale::all();
        $productos = Product::all();
        $tiendas = Store::all();
        $usuarios = User::all();

        return view("venta")
            ->with(['ventas' => $ventas])
            ->with(['productos'=>$productos])
            ->with(['tiendas'=>$tiendas])
            ->with(['usuarios'=>$usuarios]);
    }

    public function vender(Request $request)
    {
        $this->validate($request, [
            'store' => 'required',
            'user' => 'required',
            'product' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $query = Sale::create(array(
            'store' => $request->input('store'),
            'user' => $request->input('user'),
            'product' => $request->input('product'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'total' => $request->input('total')
        ));

        return redirect()->route('venta');
    }
}
