<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if ($request->hasFile('foto')) { 
            // Jika ada file foto yang diunggah oleh pengguna
            $file = $request->file('foto');
            $foto = uniqid() . '.' . $file->getClientOriginalExtension(); // Nama file unik
            $file->move(public_path('assets/images/user'), $foto); // Simpan file ke dalam direktori proyek
        } else {
            // Jika pengguna tidak mengunggah foto, atur foto default
            $foto = 'default.png';
        }
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

    public function editp($id)
    {
        $user = User::find($id);
        return view('home.user.editprofile', compact('user'));
    }

    public function editprofile(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
        $foto = $user->foto;
        if ($request->hasFile('foto')) { // Tambahkan kondisi if untuk memeriksa apakah ada file yang diunggah
            $file = $request->file('foto');
            $foto = uniqid() . '.' . $file->getClientOriginalExtension(); // Nama file unik

            $file->move(public_path('assets/images/user'), $foto); // Simpan file ke dalam direktori proyek

            // Hapus foto lama sebelum menyimpan yang baru
            if ($user->foto && $user->foto !== 'default.png') {
                unlink(public_path('assets/images/user/' . $user->foto));
            }

            $user->foto = $foto; // Gunakan $fileName sebagai nama file baru dalam basis data
        }else {
            // Jika tidak ada file yang diunggah, dan ada foto sebelumnya
            if ($user->foto) {
                // Atur foto pengguna ke foto yang ada di data sebelumnya
                $user->foto = $user->foto;
            }
        }

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'foto'=>$foto,
        ]);

        return redirect('/user/profile');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'level' => 'required',
        ]);
        $foto = $user->foto;
        if ($request->hasFile('foto')) { // Tambahkan kondisi if untuk memeriksa apakah ada file yang diunggah
            $file = $request->file('foto');
            $foto = uniqid() . '.' . $file->getClientOriginalExtension(); // Nama file unik

            $file->move(public_path('assets/images/user'), $foto); // Simpan file ke dalam direktori proyek

            // Hapus foto lama sebelum menyimpan yang baru
            if ($user->foto) {
                unlink(public_path('assets/images/user/' . $user->foto));
            }

            $user->foto = $foto; // Gunakan $fileName sebagai nama file baru dalam basis data
        }else {
            // Jika tidak ada file yang diunggah, dan ada foto sebelumnya
            if ($user->foto) {
                // Atur foto pengguna ke foto yang ada di data sebelumnya
                $user->foto = $user->foto;
            }
        }
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'foto'=>$foto,
            'level' => $request->level,
        ]);

        return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->foto && $user->foto !== 'default.png') {
            unlink(public_path('assets/images/user/' . $user->foto));
        }
        $user->delete();
        return redirect('/user');
    }
    public function profile()
    {
        $user = User::all();
        return view('home.user.profile',compact(['user']));
    }
}
