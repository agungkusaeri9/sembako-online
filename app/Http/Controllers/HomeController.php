<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $best_seller = Product::inRandomOrder()->take(8)->get();
        return view('pages.home',[
            'title' => 'Selamat datang di toko kami',
            'best_seller' => $best_seller
        ]);
    }
}
