<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $items = Transaction::with('bank')->latest()->get();
        return view('admin.pages.transaction.index',[
            'title' => 'Data Transaksi',
            'items' => $items
        ]);
    }

    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.transactions.index')->with('success','Transaksi berhasil dihapus');
    }

    public function setStatus($id)
    {
        request()->validate([
            'status' => ['required','in:SUCCESS,FAILED,PENDING']
        ]);
        $status = request('status');
        $item = Transaction::findOrFail($id);
        $item->update([
            'status' => $status
        ]);

        return redirect()->route('admin.transactions.index')->with('success','Transaksi berhasil diupdate');
    }

    public function show($id)
    {
        $item = Transaction::with('details')->findOrFail($id);
        return view('admin.pages.transaction.show',[
            'title' => 'Detail Transaksi',
            'item' => $item
        ]);
    }
}
