@extends('layouts.master')
@section('title', 'edit siswa')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <form action="/user/{{ $user->id }}/update1" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukan Untuk Nama" value="{{ $user->nama }}">
                                    </div>
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Ganti Foto Profil</label>
                                        <input type="file" class="form-control" name="foto" accept="image/*">
                                    </div>
                                    @error('foto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="username" class="form-control" name="username"
                                            placeholder="Masukan Untuk Username" value="{{ $user->username }}">
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-{color} btn-primary">Simpan</button>
                                    <a href="/user/profile" class="btn btn-{color} btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
