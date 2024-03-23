@extends('layouts.master')
@section('title', 'tambah siswa')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Data User</h4>
                            </div>
                            <div class="card-body">
                                <form action="/user/simpan" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukan Untuk Nama">
                                    </div>
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Unggah Foto</label>
                                        <input type="file" class="form-control" name="foto" accept="image/*">
                                    </div>
                                    @error('foto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="username" class="form-control" name="username"
                                            placeholder="Masukan Untuk Username">
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukan Untuk Password">
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <select name="level" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="pelapor">Pelapor</option>
                                            <option value="teknisi">Teknisi</option>
                                        </select>
                                    </div>
                                    @error('level')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-{color} btn-info">Simpan</button>
                                    <button type="reset" class="btn btn-{color} btn-secondary">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
