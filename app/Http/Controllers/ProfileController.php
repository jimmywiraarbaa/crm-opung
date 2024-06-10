<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_profile()
    {
        $title = "Profile";

        $user = Auth::user();
        return view('show_profile', compact('title', 'user'));
    }

    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => ['required', 'string', 'max:13'],
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user->profile_picture = $name;
        }

        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'telp' => $user->telp,
            'profile_picture' => $user->profile_picture,
        ]);

        Alert::toast('Data berhasil diupdate', 'success')
            ->position('top-end')
            ->animation('animate__bounceIn', 'animate__backOutRight')
            ->autoClose(2500);
        return Redirect::back();
    }
}
