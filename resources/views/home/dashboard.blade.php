@extends('layouts.master')
@section('title', 'MarhasTech Support')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-info text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
            </div>
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white card-medium">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3" style="font-size: 16px;">Jumlah User <i class="mdi mdi-account"></i></h4>
                            <h2 class="mb-5" style="font-size: 22px;">{{ $jumlah_user }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white card-medium">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3" style="font-size: 16px;">Jumlah Komputer <i class="mdi mdi-desktop-mac"></i></h4>
                            <h2 class="mb-5" style="font-size: 22px;">{{ $jumlah_komputer }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white card-medium">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3" style="font-size: 16px;">Jumlah Laporan <i class="mdi mdi-book"></i></h4>
                            <h2 class="mb-5" style="font-size: 22px;">{{ $jumlah_laporan }}</h2>
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Histori Laporan</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable">
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
                                                @if ($lk->Komputer->status !== 'success')
                                                    <tr>
                                                        <td>{{ $lk->id }}</td>
                                                        <td>No. {{ $lk->Komputer->nomor_komputer }} |
                                                            {{ $lk->Komputer->posisi }}
                                                        </td>
                                                        <td>{{ $lk->tanggal }}</td>
                                                        <td>{{ $lk->deskripsi }}</td>
                                                        <td>{{ $lk->User->nama }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
    </div>
    </div>
@endsection
