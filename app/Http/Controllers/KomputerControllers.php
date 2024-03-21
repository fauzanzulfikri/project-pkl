<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komputer;

class KomputerControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komputer = Komputer::all();
        return view('home.Komputer.index',compact(['komputer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.Komputer.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Komputer::create([
            'nomor_komputer'=>$request->nomor_komputer,
            'posisi'=>$request->posisi,
            'status'=>'success',
            $request->except('_token'),
        ]);
        return redirect('/komputer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $komputer = Komputer::find($id);
        return response()->json($komputer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
{
    $komputer = Komputer::find($request->id);
    
    // Pastikan komputer ditemukan
    if ($komputer) {
        // Perbarui atribut-atribut komputer sesuai data yang dikirimkan melalui formulir
        $komputer->update([
            'nomor_komputer' => $request->nomor_komputer,
            'posisi' => $request->posisi,
            'status' => $request->status,
        ]);
        
        // Redirect kembali ke halaman data komputer
        return redirect('/komputer');
    }
    
    // Jika komputer tidak ditemukan, redirect kembali dengan pesan kesalahan
    return redirect('/komputer')->with('error', 'Komputer tidak ditemukan.');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komputer = Komputer::find($id);
        $komputer->delete();
        return redirect('/komputer');
    }
}
