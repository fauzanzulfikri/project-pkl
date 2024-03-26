<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanKerusakan;
use App\Models\User;
use App\Models\Komputer;
use Illuminate\Support\Facades\Auth;

class LaporanKerusakanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil level pengguna yang saat ini masuk
        $userLevel = Auth::user()->level;

        // Jika level pengguna adalah admin atau teknisi, maka tampilkan semua data laporan kerusakan
        if ($userLevel == 'admin' || $userLevel == 'teknisi') {
            $laporankerusakan = LaporanKerusakan::all();
        } else {
            // Jika level pengguna adalah pelapor, maka tampilkan hanya data yang dilaporkan oleh pengguna tersebut
            $userId = Auth::id();
            $laporankerusakan = LaporanKerusakan::where('id_user', $userId)->get();
        }

        return view('home.LaporanKerusakan.index', compact('laporankerusakan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $komputer = Komputer::find($id);
        $user = User::all();
        return view('home.LaporanKerusakan.tambah', compact(['user', 'komputer']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LaporanKerusakan::create([
            'id_user' => $request->id_user,
            'id_komputer' => $request->id_komputer,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            $request->except('_token'),
        ]);
        return redirect('/laporank');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $komputer = Komputer::all();
        $user = User::all();
        $laporankerusakan = LaporanKerusakan::find($id);
        return view('home.LaporanKerusakan.edit', compact(['laporankerusakan', 'komputer', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $laporankerusakan = LaporanKerusakan::find($id);
        $laporankerusakan->update([
            'id_user' => $request->id_user,
            'id_komputer' => $request->id_komputer,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            $request->except('_token'),
        ]);
        return redirect('/laporank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporankerusakan = LaporanKerusakan::find($id);
        $laporankerusakan->delete();
        return redirect('/laporank');
    }
    public function cetak()
    {
        $laporankerusakan = LaporanKerusakan::all();
        return view('home.LaporanKerusakan.cetak', compact(['laporankerusakan']));
    }
    public function detail($id)
    {
        $laporan = LaporanKerusakan::where('id_komputer', $id)->firstOrFail();
        return view('home.LaporanKerusakan.detail', compact('laporan'));
    }
}
