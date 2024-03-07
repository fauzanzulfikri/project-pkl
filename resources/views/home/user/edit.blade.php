@extends('layouts.master')
@section('title','edit siswa')
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
                                <form action="/user/{{$user->id}}/update" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukan Untuk Nama" value="{{$user->nama}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Unggah Foto</label>
                                        <input type="file" class="form-control" name="foto" accept="image/*" value="{{$user->foto}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="username" class="form-control" name="username" placeholder="Masukan Untuk Username" value="{{$user->username}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukan Untuk Password" value="{{$user->password}}" required>
                                    </div>
                                    @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <select name="level" class="form-control" value="{{$user->level}}">
                                            <option value="admin">Admin</option>
                                            <option value="pelapor" >Pelapor</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-{color} btn-primary">Simpan</button>
                                    <a href="/user" class="btn btn-{color} btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection