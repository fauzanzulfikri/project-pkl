@extends('layouts.master')
@section('title', 'Data Komputer')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Komputer</h4>
                                @if (Auth::user()->level !== 'pelapor')
                                    <a href="/komputer/tambah" class="btn btn-info">Tambah Data</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nomor Komputer</th>
                                                <th>Posisi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($komputer as $k)
                                                <tr>
                                                    <td>{{ $k->id }}</td>
                                                    <td>{{ $k->nomor_komputer }}</td>
                                                    <td>{{ $k->posisi }}</td>
                                                    <td>
                                                        @switch($k->status)
                                                            @case('pending')
                                                                <span class="badge bg-danger">{{ $k->status }}</span>
                                                            @break

                                                            @case('repair')
                                                                <span class="badge bg-primary">{{ $k->status }}</span>
                                                            @break

                                                            @case('success')
                                                                <span class="badge bg-success">{{ $k->status }}</span>
                                                            @break
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        @if ($k->status === 'success')
                                                            <a href="/laporank/{{ $k->id }}/tambah"
                                                                class="btn btn-info">Lapor</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->level !== 'pelapor')
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                data-bs-toggle="modal" data-bs-target="#modalId"
                                                                data-komputer-id="{{ $k->id }}"
                                                                onclick="prepareModal(this)">
                                                                <span class="mdi mdi-border-color"></span>
                                                            </button>
                                                            <a href="/komputer/{{ $k->id }}/hapus"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin Akan Dihapus?')"><span class="mdi mdi-delete"></span></a>
                                                            @if ($k->status !== 'success' && $k->laporankerusakan)
                                                            <a href="/komputer/{{ $k->id }}/detail" class="btn btn-success btn-sm"><i class="mdi mdi-information-variant"></i></a>
                                                            @endif
                                                        @endif
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
    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Komputer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing data -->
                    <form id="editForm" action="/komputer/update" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="editKomputerId">
                        <div class="mb-3">
                            <label for="nomorKomputer" class="form-label">Nomor Komputer</label>
                            <input type="number" class="form-control" id="nomorKomputer" name="nomor_komputer" required>
                        </div>
                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi</label>
                            <select name="posisi" class="form-select" id="posisi">
                                <option value="lab industri">Lab Industri</option>
                                <option value="lab mesin1">Lab Mesin 1</option>
                                <option value="lab mesin2">Lab Mesin 2</option>
                                <option value="lab 4">Lab 4</option>
                                <option value="lab f">Lab F</option>
                                <option value="lab g">Lab G</option>
                                <option value="lab h">Lab H</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option value="pending">Pending</option>
                                <option value="repair">Repair</option>
                                <option value="success">Success</option>
                            </select>
                        </div>
                        <!-- Modal footer with save button -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to prepare modal with data
        function prepareModal(button) {
            var komputerId = $(button).data('komputer-id');
            $.get('/komputer/' + komputerId + '/edit', function(data) {
                console.log(data); // Periksa data yang diterima dari server
                $('#editKomputerId').val(data.id);
                $('#nomorKomputer').val(data.nomor_komputer);
                $('#posisi').val(data.posisi);
                $('#status').val(data.status);
            });
        }

        // Function to close modal after saving changes
        $(document).ready(function() {
            $('#editForm').submit(function(event) {
                event.preventDefault(); // Mencegah pengiriman formulir secara default

                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize();

                // Kirim permintaan AJAX untuk memperbarui data
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response); // Periksa respons dari server

                        // Tutup modal setelah menyimpan perubahan
                        $('#modalId').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Tangani kesalahan jika terjadi
                    }
                });
            });
        });
    </script>
@endsection
