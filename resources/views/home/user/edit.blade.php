@extends('layouts.master')
@section('title', 'Edit Siswa')
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
                                <form action="/user/{{ $user->id }}/update" method="post" enctype="multipart/form-data" id="edituForm">
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
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // Ambil form laporan
        const edituForm = document.getElementById('edituForm');

        // Tambahkan event listener untuk submit form
        edituForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default

            // Kirim data laporan menggunakan AJAX
            fetch('/user/{{ $user->id }}/update', {
                    method: 'POST',
                    body: new FormData(edituForm),
                })
                .then(response => {
                    // Periksa status respons
                    if (!response.ok) {
                        throw new Error('Terjadi kesalahan saat mengirim data.');
                    }
                    // Jika berhasil, tampilkan SweetAlert
                    swal("Berhasil!", "User telah diubah!", "success")
                        .then(() => {
                            // Setelah menekan tombol OK pada SweetAlert,
                            // Redirect ke halaman komputer
                            window.location.href = "/user";
                        });
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Jika terjadi kesalahan, tampilkan pesan error
                    swal("Oops!", "Terjadi kesalahan saat mengirim data. Silakan coba lagi.", "error");
                });
        });
        </script>
@endsection
