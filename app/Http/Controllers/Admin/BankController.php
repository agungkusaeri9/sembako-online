<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bank::orderBy('name','ASC')->get();

        return view('admin.pages.bank.index',[
            'title' => 'Data Bank',
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
        return view('admin.pages.bank.create',[
            'title' => 'Tambah Bank'
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
            'number' => ['required','numeric'],
            'owner_name' => ['required']
        ]);

        $data = request()->all();
        if(request()->file('logo')){
            $data['logo'] = request()->file('logo')->store('bank','public');
        }else{
            $data['logo'] = NULL;
        }
        Bank::create($data);

        return redirect()->route('admin.banks.index')->with('success','Bank berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Bank::findOrFail($id);
        return view('admin.pages.bank.edit',[
            'title' => 'Edit Bank',
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
            'number' => ['required','numeric'],
            'owner_name' => ['required']
        ]);
        $item = Bank::findOrFail($id);
        $data = request()->all();
        if(request()->file('logo')){
            Storage::disk('public')->delete($item->logo);
            $data['logo'] = request()->file('logo')->store('bank','public');
        }else{
            $data['logo'] = $item->logo;
        }
        $item->update($data);

        return redirect()->route('admin.banks.index')->with('success','Bank berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Bank::findOrFail($id);
        Storage::disk('public')->delete($item->logo);
        $item->delete();

        return redirect()->route('admin.banks.index')->with('success','Bank berhasil dihapus');
    }
}
