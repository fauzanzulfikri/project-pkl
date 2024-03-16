@extends('layouts.master')
@section('title','data komputer')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Komputer</h4>
                                <a href="/komputer/tambah" class="btn btn-info btn-{color}">Tambah Data</a>
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
                                                <th>Nomor Komputer</th>
                                                <th>Posisi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($komputer as $k)
                                            <tr>
                                                <td>{{$k->id}}</td>
                                                <td>{{$k->nomor_komputer}}</td>
                                                <td>{{$k->posisi}}</td>
                                                <td>{{$k->status}}</td>
                                                <td>
                                                <a href="/laporank/{{$k->id}}/tambah" class="btn btn-info btn-{color}">Lapor Kerusakan</a>
                                                <a href="/komputer/{{$k->id}}/edit" class="btn btn-warning btn-{color}">Edit</a>
                                                <a href="/komputer/{{$k->id}}/hapus" class="btn btn-danger btn-{color}" onclick="return confirm('Yakin Akan Dihapus?')">Hapus</a>
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