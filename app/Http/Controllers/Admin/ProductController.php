<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::orderBy('name','ASC')->get();
        return view('admin.pages.product.index',[
            'title' => 'Data Produk',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product.create',[
            'title' => 'Tambah Produk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'price' => ['required','numeric'],
            'unit' => ['required'],
            'status' => ['required','in:0,1'],
            'image' => ['required']
        ]);

        $data = request()->all();
        $data['image'] = request()->file('image')->store('product','public');
        $data['slug'] = Str::slug(request('name'));
        Product::create($data);

        return redirect()->route('admin.products.index')->with('success','Produk berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::findOrFail($id);
        return view('admin.pages.product.show',[
            'title' => 'Detail Produk',
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        return view('admin.pages.product.edit',[
            'title' => 'Edit Produk',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'price' => ['required','numeric'],
            'unit' => ['required'],
            'status' => ['required','in:0,1'],
            'image' => ['image','mimes:jpg,jpeg,png']
        ]);

        $data = request()->all();
        $item = Product::findOrFail($id);
        if(request()->file('image')){
            Storage::disk('public')->delete($item->image);
            $data['image'] = request()->file('image')->store('product','public');
        }else{
            $data['image'] = $item->image;
        }
        $data['slug'] = Str::slug(request('name'));
        $item->update($data);

        return redirect()->route('admin.products.index')->with('success','Produk berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        Storage::disk('public')->delete($item->image);
        $item->delete();
        return redirect()->route('admin.products.index')->with('success','Produk berhasil dihapus');
    }
}
