@extends('layouts.master')
@section('title', 'data laporan kerusakan')
@section('content')
    <div class="content-wrapper">
        <secton class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Kerusakan</h4>
                            </div>
                            <div class="card-body">
                                <form action="/laporank/simpan" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_komputer"
                                            placeholder="Masukan Komputer" value="{{ $komputer->id }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal"
                                            placeholder="Masukan Tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi Kerusakan</label>
                                        <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Masukan Deskripsi Kerusakan"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_user"
                                            placeholder="Masukan Nama Pelapor" value="{{ Auth()->User()->id }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-{color} btn-info">Simpan</button>
                                    <button type="reset" class="btn btn-{color} btn-secondary">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </secton>
    </div>
@endsection
