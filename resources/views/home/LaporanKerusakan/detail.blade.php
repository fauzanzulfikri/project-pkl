@extends('layouts.master')
@section('title', 'Detail Laporan Kerusakan')
@section('content')
    <div class="content-wrapper" style="background-color: #f9f9f9; padding: 20px;">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card"
                            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); transition: 0.3s; border-radius: 15px; margin-bottom: 20px;">
                            <div class="card-body" style="padding: 30px;">
                                <h1 style="color: #333; margin-bottom: 30px; text-align: center;">Detail Laporan Kerusakan
                                </h1>
                                <div style="margin-bottom: 20px;">
                                    <p><i class="fas fa-info-circle icon"
                                            style="font-size: 24px; margin-right: 10px;"></i><strong>Deskripsi:</strong>
                                        {{ $laporan->deskripsi }}</p>
                                    <p><i class="far fa-calendar-alt icon"
                                            style="font-size: 24px; margin-right: 10px;"></i><strong>Tanggal:</strong>
                                        {{ $laporan->tanggal }}</p>
                                    <p><i class="far fa-user icon"
                                            style="font-size: 24px; margin-right: 10px;"></i><strong>Pelapor:</strong>
                                        {{ $laporan->User->nama }}</p>
                                </div>
                                <div style="text-align: center;">
                                    <a href="/komputer" class="btn btn-info" style="padding: 12px 24px;">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
