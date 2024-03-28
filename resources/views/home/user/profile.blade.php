@extends('layouts.master')
@section('title', 'Profil Pengguna')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="profile-picture mb-4">
                                    <img src="{{ asset('assets/images/user/' . Auth::user()->foto) }}"
                                        class="img-fluid rounded-circle" alt="Profil Picture"
                                        style="width: 150px; height: 150px;">
                                </div>
                                <h2 class="mb-3">{{ Auth::user()->nama }}</h2>
                                <p class="text-muted mb-3">{{ Auth::user()->username }}</p>
                                <hr>
                                <table class="table table-sm table-borderless mx-auto" style="width: 300px;"> <!-- Memposisikan tabel di tengah -->
                                    <tbody>
                                        <tr>
                                            <th style="width: 50%;">ID</th>
                                            <td style="width: 50%;">{{ Auth::user()->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Level</th>
                                            <td>{{ Auth::user()->level }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center mt-4">
                                    <a href="/user/{{ Auth::user()->id }}/editp" class="btn btn-warning btn-sm mr-2">Edit Profil</a>
                                    <a href="/gantipw/{{ Auth::user()->id }}" class="btn btn-info btn-sm">Ganti Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
