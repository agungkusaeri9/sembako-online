<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $items = Slider::get();
        return view('admin.pages.slider.index',[
            'title' => 'Data Slider',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('admin.pages.slider.create',[
            'title' => 'Tambah Slider'
        ]);
    }

    public function store()
    {
        request()->validate([
            'image' => ['required','image']
        ]);

        Slider::create([
            'image' => request()->file('image')->store('slider','public'),
            'status' => request('status')
        ]);

        return redirect()->route('admin.sliders.index')->with('success','Slider berhasil ditambahkan');
    }

    public function setStatus($id)
    {
        $status = request('status');
        if($status === '0')
        {
            $item = Slider::findOrFail($id);
            $item->update([
                'status' => '1'
            ]);
        }else{
            $item = Slider::findOrFail($id);
            $item->update([
                'status' => '0'
            ]);
        }
        return redirect()->route('admin.sliders.index')->with('success','Status slider berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $item = Slider::findOrFail($id);
        Storage::disk('public')->delete($item->avatar);
        $item->delete();
        return redirect()->route('admin.sliders.index')->with('success','Slider berhasil dihapus');
    }
}
