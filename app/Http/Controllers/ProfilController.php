<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('profil', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email,' . $id,
            'gender' => 'required',
        ]);

        $user = User::findOrFail($id);

        $photo_path = $request->file('photo_path');

        if ($photo_path) {
            if (
                $user->photo_path && file_exists(storage_path('app/public/' . $user->photo_path))
            ) {
                Storage::delete('public/' . $user->photo_path);
            }

            $photo_path_store = $photo_path->store('images/user', 'public');

            $user->photo_path = $photo_path_store;
        }

        if ($request->new_password) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required_with:new_password_confirmation|confirmed|same:new_password_confirmation',
                'new_password_confirmation' => 'same:new_password'
            ]);

            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return back()->with("error", "Password Lama Tidak Sesuai !");
            }

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("success", "Password berhasil diupdate");
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;
        $user->about = $request->about;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->save();

        return back()->with("success", "Profil berhasil diupdate");
    }
}
