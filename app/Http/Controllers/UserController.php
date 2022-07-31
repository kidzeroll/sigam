<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('backend.user.index');
    }

    public function create()
    {
        $model = new User();
        return view('backend.user.form', compact('model'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|unique:tb_user,email',
            'password' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'phone' => 'nullable|numeric|min:10',
            'birth_date' => 'nullable|date',
            'about' => 'nullable',
            'address' => 'nullable',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $user = new User();

        $photo_path = $request->file('photo_path');
        if ($photo_path) {
            $photo_path_store     = $photo_path->store('images/user', 'public');
            $user->photo_path    = $photo_path_store;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->birth_date = $request->birth_date;
        $user->about = $request->about;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->save();

        return response()->json(['status' => 'success', 'message' => 'User berhasil ditambah']);
    }

    public function show($id)
    {
        $model = User::findOrFail($id);
        return view('backend.user.show', compact('model'));
    }

    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('backend.user.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|unique:tb_user,email,' . $id,
            'gender' => 'required',
            'role' => 'required',
            'phone' => 'nullable|numeric|min:10',
            'birth_date' => 'nullable|date',
            'about' => 'nullable',
            'address' => 'nullable',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
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

        if (request('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->birth_date = $request->birth_date;
        $user->about = $request->about;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->save();

        return response()->json(['status' => 'success', 'message' => 'User berhasil diupdate']);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->photo_path && file_exists(storage_path('app/public/' . $user->photo_path))) {
            Storage::delete('public/' . $user->photo_path);
        }

        User::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'User berhasil dihapus']);
    }
}
