@extends('layouts.master')
@section('title', 'Lapor Kerusakan')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Kerusakan</h4>
                            </div>
                            <div class="card-body">
                                <form action="/laporank/simpan" method="post" id="laporanForm">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_komputer"
                                            placeholder="Masukan Komputer" value="{{ $komputer->id }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal"
                                            placeholder="Masukan Tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi Kerusakan</label>
                                        <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Masukan Deskripsi Kerusakan"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_user"
                                            placeholder="Masukan Nama Pelapor" value="{{ Auth()->User()->id }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

    <script>
        // Ambil form laporan
        const laporanForm = document.getElementById('laporanForm');

        // Tambahkan event listener untuk submit form
        laporanForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default

            // Kirim data laporan menggunakan AJAX
            fetch('/laporank/simpan', {
                method: 'POST',
                body: new FormData(laporanForm),
            })
            .then(response => {
                // Periksa status respons
                if (!response.ok) {
                    throw new Error('Terjadi kesalahan saat mengirim data.');
                }
                // Jika berhasil, tampilkan SweetAlert
                swal("Laporan Anda Ditambahkan!", "Terima kasih telah melaporkan kerusakan", "success")
                .then(() => {
                    // Setelah menekan tombol OK pada SweetAlert,
                    // Redirect ke halaman komputer
                    window.location.href = "/komputer";
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
