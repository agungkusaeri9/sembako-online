<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $count = [
            'product' => Product::count(),
            'transaction' => Transaction::count(),
            'user' =>User::count()
        ];
        $transcations = Transaction::latest()->take(10)->get();
        return view('admin.pages.dashboard',[
            'title' => 'Dashboard',
            'count' => $count,
            'transactions' => $transcations
        ]);
    }
}
