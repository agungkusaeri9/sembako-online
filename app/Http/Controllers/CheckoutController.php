<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __invoke()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'bank_id' => ['required'],
            'courier_id' => ['required']
        ]);

        if(auth()->user()->carts()->count() < 1){
            return redirect()->back();
        }
        $data = request()->all();
        $cart = auth()->user()->carts()->get();
        $data['code'] = rand(1000000,9999999);
        $data['transaction_total'] = $cart->sum('total');
        $transaction = auth()->user()->transactions()->create($data);
        foreach($cart as $c){
            $transaction->details()->create([
                'product_id' => $c->product_id,
                'qty' => $c->qty,
                'total' => $c->total,
                'description' => $c->description
            ]);
        }
        auth()->user()->carts()->delete();
        return redirect()->route('transaction.success',$transaction->code);
    }
}
