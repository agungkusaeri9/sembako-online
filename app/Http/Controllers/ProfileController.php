<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('pages.profile',[
            'title' => 'Profile Saya',
            'user' => $user
        ]);
    }

    public function update()
    {
        $item = User::findOrFail(auth()->id());
        request()->validate([
            'name' => ['required','string','min:3'],
            'username' => ['required','alpha_dash','min:3',Rule::unique('users','username')->ignore($item->id)],
            'email' => ['required',Rule::unique('users','email')->ignore($item->id)],
            'avatar' => ['image','mimes:jpg,jpeg,png']
        ]);

        $data = request()->all();
        if(request()->file('avatar'))
        {
            Storage::disk('public')->delete($item->avatar);
            $data['avatar'] = request()->file('avatar')->store('user','public');
        }else{
            $data['avatar'] = $item->avatar;
        }

        if(request('password'))
        {
            request()->validate([
                'password' => ['min:5']
            ]);
            $data['password'] = bcrypt(request('password'));
        }else{
            $data['password'] = $item->password;
        }
        $item->update($data);

        return redirect()->back()->with('success','Profil berhasil diperbaharui');
    }
}
