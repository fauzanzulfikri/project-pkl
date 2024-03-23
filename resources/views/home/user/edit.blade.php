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
                                <h4>Edit Data User</h4>
                            </div>
                            <div class="card-body">
                                <form action="/user/{{ $user->id }}/update" method="post" enctype="multipart/form-data">
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
                                        <label for="">Unggah Foto</label>
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
                                    <div class="form-group">
                                        <label for="">Ganti Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukan Untuk Password">
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <select name="level" class="form-control">
                                            <option
                                                value="admin"{{ old('level', $user->level) == 'admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="pelapor"
                                                {{ old('level', $user->level) == 'pelapor' ? 'selected' : '' }}>Pelapor
                                            </option>
                                            <option value="teknisi"
                                                {{ old('level', $user->level) == 'teknisi' ? 'selected' : '' }}>Teknisi
                                            </option>
                                        </select>
                                    </div>
                                    @error('level')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-{color} btn-info">Simpan</button>
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
