@extends('layouts.master')
@section('title','data user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data User</h4>
                                <a href="/user/tambah" class="btn btn-info btn-{color}">Tambah</a>
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
                                                <th></th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $u)
                                            <tr>
                                                <td>{{$u->id}}</td>
                                                <td><img src="{{asset("images/user/$u->foto")}}" style="width:100px; height:100px;" alt=""></td>
                                                <td>{{$u->nama}}</td>
                                                <td>{{$u->username}}</td>
                                                <td>{{$u->level}}</td>
                                                <td>
                                                    <a href="/user/{{$u->id}}/edit" class="btn btn-warning btn-{color}">Edit</a>
                                                    <a href="/user/{{$u->id}}/hapus" class="btn btn-danger btn-{color}">Hapus</a>
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