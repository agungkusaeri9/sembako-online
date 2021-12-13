<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        $items = Transaction::where('user_id',auth()->id())->latest()->get();
        return view('pages.transaction.index',[
            'title' => 'Histori Transaksi',
            'items' => $items
        ]);
    }

    public function success($code)
    {
        $transaction = Transaction::where('code',$code)->firstOrFail();
        return view('pages.transaction.success',[
            'title' => 'Transaksi Berhasil',
            'item' => $transaction
        ]);
    }
}
