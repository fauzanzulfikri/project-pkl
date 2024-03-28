@extends('layouts.master')
@section('title', 'Tambah Data Komputer')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Komputer</h4>
                            </div>
                            <div class="card-body">
                                <form action="/komputer/simpan" method="post" id="tambahkForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nomor Komputer</label>
                                        <input type="number" class="form-control" name="nomor_komputer"
                                            placeholder="Masukan Nomor Komputer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Posisi</label>
                                        <select name="posisi" class="form-control">
                                            <option value="lab industri">Lab Industri</option>
                                            <option value="lab mesin1">Lab Mesin 1</option>
                                            <option value="lab mesin2">Lab Mesin 2</option>
                                            <option value="lab 4">Lab 4</option>
                                            <option value="lab f">Lab F</option>
                                            <option value="lab g">Lab G</option>
                                            <option value="lab h">Lab H</option>
                                        </select>
                                    </div>
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
         const tambahkForm = document.getElementById('tambahkForm');
 
         // Tambahkan event listener untuk submit form
         tambahkForm.addEventListener('submit', function(event) {
             event.preventDefault(); // Mencegah pengiriman formulir secara default
 
             // Kirim data laporan menggunakan AJAX
             fetch('/komputer/simpan', {
                     method: 'POST',
                     body: new FormData(tambahkForm),
                 })
                 .then(response => {
                     // Periksa status respons
                     if (!response.ok) {
                         throw new Error('Terjadi kesalahan saat mengirim data.');
                     }
                     // Jika berhasil, tampilkan SweetAlert
                     swal("Berhasil!", "Komputer baru telah ditambahkan", "success")
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
