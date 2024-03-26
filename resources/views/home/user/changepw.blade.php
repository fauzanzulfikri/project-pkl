@extends('layouts.master')
@section('title', 'Change Password')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ganti Password</h4>
                            </div>
                            <div class="card-body">
                                <form action="/gantipw/{{ Auth()->User()->id }}/update" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="old_password">Password Sebelumnya</label>
                                        <input type="password" class="form-control" name="old_password" id="old_password"
                                            placeholder="Masukan Password Sebelumnya">
                                        @error('old_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">Password Baru</label>
                                        <input type="password" class="form-control" name="new_password" id="new_password"
                                            placeholder="Masukan Password Baru">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" name="new_password_confirmation"
                                            id="new_password_confirmation" placeholder="Konfirmasi Password">
                                        @error('new_password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                    <a href="/user/profile" class="btn btn-secondary">Cancel</a>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
