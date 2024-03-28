@extends('layouts.master')
@section('title', 'Tambah Siswa')
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
                                <form action="/user/simpan" method="post" enctype="multipart/form-data" id="tambahuForm">
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
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // Ambil form laporan
        const tambahuForm = document.getElementById('tambahuForm');

        // Tambahkan event listener untuk submit form
        tambahuForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default

            // Kirim data laporan menggunakan AJAX
            fetch('/user/simpan', {
                    method: 'POST',
                    body: new FormData(tambahuForm),
                })
                .then(response => {
                    // Periksa status respons
                    if (!response.ok) {
                        throw new Error('Terjadi kesalahan saat mengirim data.');
                    }
                    // Jika berhasil, tampilkan SweetAlert
                    swal("Berhasil!", "User baru telah ditambah!", "success")
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
