<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'username.required' => 'Kolom username harus diisi.',
            'username.unique' => 'Username sudah digunakan. Harap pilih username lain.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Password harus terdiri dari minimal 5 karakter.',
            'foto.image' => 'Berkas yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
            'level.required' => 'Kolom level harus diisi.',
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000'
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'username.required' => 'Kolom username harus diisi.',
            'username.unique' => 'Username sudah digunakan. Harap pilih username lain.',
            'foto.image' => 'Berkas yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
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
        } else {
            // Jika tidak ada file yang diunggah, dan ada foto sebelumnya
            if ($user->foto) {
                // Atur foto pengguna ke foto yang ada di data sebelumnya
                $user->foto = $user->foto;
            }
        }

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'foto' => $foto,
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
            'level' => 'required'
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'username.required' => 'Kolom username harus diisi.',
            'username.unique' => 'Username sudah digunakan. Harap pilih username lain.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Password harus terdiri dari minimal 5 karakter.',
            'foto.image' => 'Berkas yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
            'level.required' => 'Kolom level harus diisi.',
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
        } else {
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
            'foto' => $foto,
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
        return view('home.user.profile', compact(['user']));
    }
    public function pw($id)
    {
        $user = User::find($id);
        return view('home.user.changepw', compact(['user']));
    }
    public function gantipw(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:5|confirmed'
        ],[ 'new_password.confirmed' => 'Password tidak sama'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);

        // Periksa apakah password lama yang dimasukkan cocok dengan password yang ada dalam model User
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Password lama yang diberikan tidak cocok dengan password saat ini.'])->withInput();
        }

        // Jika password lama cocok, maka lanjutkan dengan mengganti password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/user/profile');
    }
}
