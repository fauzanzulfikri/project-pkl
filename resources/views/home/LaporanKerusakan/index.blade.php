@extends('layouts.master')
@section('title','data laporan kerusakan')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Kerusakan</h4>
                            </div>
                            <div class="card-body">
                                <div
                                    class="table-responsive"
                                >
                                    <table
                                        class="table table-striped"
                                    >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Komputer</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Pelapor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laporankerusakan as $lk)
                                            <tr>
                                                <td>{{ $lk->id}}</td>
                                                <td>{{ $lk->Komputer->nomor_komputer}} | {{ $lk->Komputer->posisi}}</td>
                                                <td>{{ $lk->tanggal}}</td>
                                                <td>{{ $lk->deskripsi}}</td>
                                                <td>{{ $lk->User->nama}}</td>
                                            
                                            <td>
                                                <a href="/laporank/{{$lk->id}}/edit" class="btn btn-warning btn-{color}">Edit</a>
                                                <a href="/laporank/{{$lk->id}}/hapus" class="btn btn-danger btn-{color}" onclick="returnconfirm('Yakin Akan Dihapus?')">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection