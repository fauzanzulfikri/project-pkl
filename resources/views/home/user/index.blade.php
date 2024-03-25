@extends('layouts.master')
@section('title', 'Kelola Data User')
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
                                <div class="table-responsive">
                                    <table class="table table-striped"id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th></th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $u)
                                                <tr>
                                                    <td>{{ $u->id }}</td>
                                                    <td><img src="assets/images/user/{{ $u->foto }}"
                                                            style="width:100px; height:100px;" alt=""></td>
                                                    <td>{{ $u->nama }}</td>
                                                    <td>{{ $u->username }}</td>
                                                    <td>{{ $u->level }}</td>
                                                    <td>
                                                        <a href="/user/{{ $u->id }}/edit"
                                                            class="btn btn-warning btn-{color}">Edit</a>
                                                        <a href="/user/{{ $u->id }}/hapus"
                                                            class="btn btn-danger btn-{color}"
                                                            onclick="return confirm('Yakin Akan Dihapus?')">Hapus</a>
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
    <!-- Modal trigger button -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Body</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script>

@endsection
