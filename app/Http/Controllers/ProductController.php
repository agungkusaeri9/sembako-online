<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->latest()->paginate(12);
        return view('pages.product.index',[
            'title' => 'Semua Produk',
            'products' => $products
        ]);
    }

    public function show($slug)
    {
        $item = Product::where('slug',$slug)->firstOrFail();
        $outhers = Product::where('status',1)->inRandomOrder()->take(8)->get();
        return view('pages.product.show',[
            'title' => $item->name,
            'item' => $item,
            'outhers' => $outhers
        ]);
    }
}
