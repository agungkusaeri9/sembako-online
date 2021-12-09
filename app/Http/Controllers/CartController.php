<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store()
    {
        request()->validate([
            'product_id' => ['required','numeric'],
            'qty' => ['required','numeric']
        ]);

        auth()->user()->carts()->create([
            'product_id' => request('product_id'),
            'qty' => request('qty'),
            'description' => request('description')
        ]);

        return redirect()->back()->with('success','Produk berhasil ditambahkan ke keranjang');
    }
}
