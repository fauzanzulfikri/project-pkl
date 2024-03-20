@extends('layouts.master')
@section('title', 'Profil Pengguna')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="profile-picture mb-4">
                                    <img src="{{ asset('assets/images/user/' . Auth::user()->foto) }}"
                                        class="img-fluid rounded-circle" alt="Profil Picture"
                                        style="width: 150px; height: 150px;">
                                </div>
                                <h2 class="mb-3">{{ Auth::user()->nama }}</h2>
                                <p class="text-muted mb-4">{{ Auth::user()->username }}</p>
                                <hr>
                                <table class="table table-sm table-borderless mt-4">
                                    <tbody>
                                        <tr>
                                            <th style="width: 100px;">ID</th>
                                            <td>{{ Auth::user()->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Level</th>
                                            <td>{{ Auth::user()->level }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center mt-3">
                                    <a href="/user/{{ Auth::user()->id }}/editp" class="btn btn-warning btn-{color}">Edit
                                        Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
