@extends('layouts.master')
@section('title', 'Edit Laporan Kerusakan')
@section('content')
    <div class="content-wrapper">
        <secton class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Kerusakan</h4>
                            </div>
                            <div class="card-body">
                                <form action="/laporank/{{ $laporankerusakan->id }}/update" method="post" id="editlkForm">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_komputer"
                                            placeholder="Masukan Komputer" value="{{ $laporankerusakan->id_komputer }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal"
                                            placeholder="Masukan Tanggal" value="{{ $laporankerusakan->tanggal }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi Kerusakan</label>
                                        <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Masukan Deskripsi Kerusakan"
                                            required>{{ $laporankerusakan->deskripsi }}</textarea><br>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id_user"
                                                placeholder="Masukan Nama Pelapor" value="{{ $laporankerusakan->id_user }}"
                                                required>
                                        </div>
                                        <button type="submit" class="btn btn-{color} btn-info">Simpan</button>
                                        <a href="/laporank" class="btn btn-{color} btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </secton>
    </div>
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // Ambil form laporan
        const editlkForm = document.getElementById('editlkForm');

        // Tambahkan event listener untuk submit form
        editlkForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default

            // Kirim data laporan menggunakan AJAX
            fetch('/laporank/{{ $laporankerusakan->id }}/update', {
                    method: 'POST',
                    body: new FormData(editlkForm),
                })
                .then(response => {
                    // Periksa status respons
                    if (!response.ok) {
                        throw new Error('Terjadi kesalahan saat mengirim data.');
                    }
                    // Jika berhasil, tampilkan SweetAlert
                    swal("Berhasil!", "Laporan kerusakan telah diubah!", "success")
                        .then(() => {
                            // Setelah menekan tombol OK pada SweetAlert,
                            // Redirect ke halaman komputer
                            window.location.href = "/laporank";
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
