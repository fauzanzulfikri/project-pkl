<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('home.user.index', compact('user'));
    }

    public function create()
    {
        return view('home.user.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000', 
            'level' => 'required',
        ]);

        $foto = uniqid() . '.' . $request->file('foto')->getClientOriginalExtension();
        $fotoPath = $request->file('foto')->storeAs('public/images/user/', $foto);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'foto' => $foto,
            'level' => $request->level,
        ]);

        return redirect('/user');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('home.user.edit', compact('user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'required|min:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'level' => 'required',
        ]);

        $foto = uniqid() . '.' . $request->file('foto')->getClientOriginalExtension();
        $fotoPath = $request->file('foto')->storeAs('public/images/user/', $foto);

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'foto'=>$foto,
            'level' => $request->level,
        ]);

        return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
