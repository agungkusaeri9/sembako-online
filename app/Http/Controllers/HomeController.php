<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $best_seller = Product::inRandomOrder()->take(8)->get();
        $lainnya = Product::inRandomOrder()->take(8)->get();
        $sliders = Slider::where('status','1')->get();
        return view('pages.home',[
            'title' => 'Selamat datang di toko kami',
            'best_seller' => $best_seller,
            'lainnya' => $lainnya,
            'sliders' => $sliders
        ]);
    }
}
