@extends('layouts.master')
@section('title', 'Data Laporan Kerusakan')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Kerusakan</h4>
                                @if (Auth::user()->level !== 'pelapor')
                                <a href="/laporank/cetak" class="btn btn-success btn-{color}" target="_blank"><i class="mdi mdi-file-document"></i>  Cetak</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Komputer</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Pelapor</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laporankerusakan as $lk)
                                                <tr>
                                                    <td>{{ $lk->id }}</td>
                                                    <td>No. {{ $lk->Komputer->nomor_komputer }} | {{ $lk->Komputer->posisi }}
                                                    </td>
                                                    <td>{{ $lk->tanggal }}</td>
                                                    <td>{{ $lk->deskripsi }}</td>
                                                    <td>{{ $lk->User->nama }}</td>

                                                    <td>
                                                        <a href="/laporank/{{ $lk->id }}/edit"
                                                            class="btn btn-warning btn-sm"><span class="mdi mdi-border-color"></span></a>
                                                        <a href="/laporank/{{ $lk->id }}/hapus"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin Akan Dihapus?')"><span class="mdi mdi-delete"></span></a>
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
