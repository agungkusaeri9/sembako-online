<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Cart;
use App\Models\Courier;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\KernelInterface;

class CartController extends Controller
{
    public function index()
    {
        $items = auth()->user()->carts()->get();
        return view('pages.cart.index',[
            'title' => 'Keranjang Saya',
            'items' => $items,
            'banks' => Bank::get(),
            'couriers' => Courier::get()
        ]);
    }

    public function store()
    {
        request()->validate([
            'product_id' => ['required','numeric'],
            'qty' => ['required','numeric']
        ]);

        $cart = Cart::where('product_id',request('product_id'))->where('user_id',auth()->id())->first();
        if($cart)
        {
            $cart->update([
                'qty' => $cart->qty + request('qty'),
                'total' => $cart->total + ($cart->product->price * request('qty'))
            ]);
            return redirect()->back()->with('success','Produk berhasil ditambahkan ke keranjang')->with('success','Produk berhasil disimpan di kerjanjang');
        };

        $product = Product::findOrFail(request('product_id'));
        $total = request('qty') * $product->price;
        auth()->user()->carts()->create([
            'product_id' => request('product_id'),
            'qty' => request('qty'),
            'description' => request('description'),
            'total' => $total
        ]);

        return redirect()->back()->with('success','Produk berhasil ditambahkan ke keranjang')->with('success','Produk berhasil disimpan di kerjanjang');
    }

    public function destroy($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
